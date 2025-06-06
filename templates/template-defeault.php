<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Template defeault */

get_header();

get_template_part('template-parts/header-image');

//Banner shop
$banner_img_desktop = get_field('banner_shop_desktop', 16);
$banner_img_mobile = get_field('banner_shop_mobile', 16);

?>

<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'is-wp-theme'));
endwhile;
?>

<section class="mb-4">
    <div class="container text-center">

    </div>
</section>


<?php get_footer(); ?>