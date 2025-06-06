<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function wp_mariolahairstylist_scripts() {
  $style_path = get_template_directory() . '/dist/style.css';
  $script_path = get_template_directory() . '/dist/main.bundle.js';

  $style_ver = file_exists($style_path) ? filemtime($style_path) : null;
  $script_ver = file_exists($script_path) ? filemtime($script_path) : null;

  wp_enqueue_style(
      'wp-mariolahairstylist-css',
      get_template_directory_uri() . '/dist/style.css',
      [],
      $style_ver,
      'all'
  );

  wp_enqueue_style(
      'font-awesome-4',
      'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
      [],
      null
  );

  wp_enqueue_script('jquery');

  wp_enqueue_script(
      'wp-mariolahairstylist-js',
      get_template_directory_uri() . '/dist/main.bundle.js',
      ['jquery'],
      $script_ver,
      true
  );
}
add_action('wp_enqueue_scripts', 'wp_mariolahairstylist_scripts');


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * CSDev - Bootstrap 5 wp_nav_menu walker
 * Supports WP MultiLevel menus
 * Based on https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker
 * Requires additional CSS fixes
 * CSS at https://gist.github.com/cdsaenz/d401330ba9705cfe7c18b19634c83004
 * CHANGE: removed custom display_element. Just call the menu with a $depth of 3 or more.
 */
class bs5_Walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  /**
   * Start Level
   */
  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach ($this->current_item->classes as $class) {
      if (in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    // CSDEV changed sub-menu  for dropdown-submenu
    $submenu = ($depth > 0) ? ' dropdown-submenu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
  }

  /**
   * Start Element
   */
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    // CSDev added dropdown-menu-child-item & at_depth classes
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu-child-item dropdown-menu-end at_depth_' . $depth;
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class   = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';

    if ($args->walker->has_children) {
      // CSDEV added data-bs-auto-close
      $attributes .=  ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"';
    } else {
      $attributes .=  ' class="' . $nav_link_class . $active_class . '"';
    }

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

// register a new menu
register_nav_menu('main-menu', 'Main menu');

/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support('title-tag');

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/

add_theme_support('post-thumbnails');

// Then we'll add our custom images - 890px na 664px size
add_image_size('news-width', 890, 664, true);

// And then we'll add the custom size that spans the width of the blog to the Gutenberg image dropdown
add_filter('image_size_names_choose', 'wpmudev_custom_image_sizes');

function wpmudev_custom_image_sizes($sizes)
{
  return array_merge($sizes, array(
    'news-width' => __('News Width')
  ));
}

add_filter('body_class', 'add_category_to_single');
function add_category_to_single($classes)
{
  if (is_single()) {
    global $post;
    foreach ((get_the_category($post->ID)) as $category) {
      // add category slug to the $classes array
      $classes[] = 'cat-' . $category->category_nicename;
    }
  }
  // return the $classes array
  return $classes;
}

add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  }
  return $title;
});

// Ccrossorigin Font-awsome 4
function add_font_awesome_4_cdn_attributes($html, $handle)
{
  if ('font-awesome-4' === $handle) {
    return str_replace("media='all'", "media='all' integrity='sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=' crossorigin='anonymous'", $html);
  }
  return $html;
}
add_filter('style_loader_tag', 'add_font_awesome_4_cdn_attributes', 10, 2);

add_filter('show_admin_bar', '__return_false');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function wp_mariolahairstylist_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Top toolbar', 'mariolahairstylist-wp-theme'),
    'id' => 'top-toolbar',
    'description' => esc_html__('Add widgets here.', 'mariolahairstylist-wp-theme'),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Bottom menu services', 'mariolahairstylist-wp-theme'),
    'id'            => 'menu-services',
    'description'   => esc_html__('Add widgets here.', 'mariolahairstylist-wp-theme'),
    'before_widget' => '<div id="%1$s" class="bottom-nav-menu widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="bottom-nav-menu__title mb-2 mb-lg-3 font-weight-bold">',
    'after_title'   => '</h5>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Bottom menu about', 'mariolahairstylist-wp-theme'),
    'id'            => 'menu-about',
    'description'   => esc_html__('Add widgets here.', 'mariolahairstylist-wp-theme'),
    'before_widget' => '<div id="%1$s" class="bottom-nav-menu widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="bottom-nav-menu__title mb-2 mb-lg-3 font-weight-bold">',
    'after_title'   => '</h5>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Footer start', 'mariolahairstylist-wp-theme'),
    'id'            => 'footer-start',
    'description'   => esc_html__('Add widgets here.', 'mariolahairstylist-wp-theme'),
    'before_widget' => '<div id="%1$s" class=" widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="bottom-nav-menu__title mb-2 mb-lg-3 font-weight-bold">',
    'after_title'   => '</h5>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Filter cats', 'mariolahairstylist-wp-theme'),
    'id'            => 'filter-cats',
    'description'   => esc_html__('Add widgets here.', 'mariolahairstylist-wp-theme'),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Float btn', 'mariolahairstylist-wp-theme'),
    'id'            => 'float-btn',
    'description'   => esc_html__('Add widgets here.', 'mariolahairstylist-wp-theme'),
    'before_widget' => '<div>',
    'after_widget' => '</div>',
  ));
  register_sidebar(array(
    'name'          => esc_html__('Left sidebar', 'mariolahairstylist-wp-theme'),
    'id'            => 'left-sidebar',
    'description'   => esc_html__('Add widgets here.', 'mariolahairstylist-wp-theme'),
    'before_widget' => '<div id="%1$s" class=" widget %2$s">',
    'after_widget'  => '</div>',
  ));
}

add_action('widgets_init', 'wp_mariolahairstylist_widgets_init');
add_filter('widget_text', 'do_shortcode');

// Remove <p> in block Contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// add_filter('single_template', function ($single) {
//   global $post;

//   if (!$post) {
//     return $single;
//   }

//   $templates = [
//     'szafy-przesuwne' => 'single-product-details.php',
//     'aktualnosci' => 'single-news.php',
//   ];

//   foreach ($templates as $category => $template) {
//     if (in_category($category, $post)) {
//       $template_path = locate_template($template);
//       if ($template_path) {
//         return $template_path;
//       }
//     }
//   }

//   return $single;
// });

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');

  //Opcjonalne dodatkowe wsparcie, np. dla miniatur produktów, galerii itp.
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

add_filter('wpseo_breadcrumb_links', 'custom_remove_category_base_from_breadcrumbs');

function custom_remove_category_base_from_breadcrumbs($links)
{
  foreach ($links as &$link) {
    if (strpos($link['url'], '/category/') !== false) {
      // Usuń fragment 'category' z URL
      $link['url'] = str_replace('/category/', '/', $link['url']);
    }
  }
  return $links;
}

// add_action('wp_head', function() {
//   global $template;
//   echo '<!-- Aktualnie Używany szablon do: ' . basename($template) . ' -->';
// });

// Remove standard sorting before shoop loop
function remove_woocommerce_default_sorting()
{
  remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
}
add_action('init', 'remove_woocommerce_default_sorting');

/**
 * Add defer attribute to specific enqueued scripts
 */
function add_defer_attribute($tag, $handle, $src)
{
    // List of script handles to defer
    $scripts_to_defer = ['my_javascript_file'];

    if (in_array($handle, $scripts_to_defer)) {
        return '<script src="' . esc_url($src) . '" defer></script>' . "\n";
    }

    return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 3);