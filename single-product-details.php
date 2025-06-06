<?php
if (!defined('ABSPATH')) exit;

/* 
Template Name: Template product details 
Template Post Type: post
*/

get_header();

$bg_header_image = get_field('background_top');

?>
<!-- Hero top -->
<section class="d-flex flex-column align-items-center justify-content-center header-image-defeault" style="background-image: url('<?php echo $bg_header_image; ?>')">
    <div class="container">
        <h1 class="playfair-petch-font standard-title-3 fw-bold text-center text-white header-def-title ls-2">
            <span class="d-inline-block icon-text icon-text--white px-4">
                <?php echo esc_html(get_the_title()); ?>
            </span>
        </h1>
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs" class="mb-0 breadcrumbs text-center dosis-font fw-light">', '</p>');
        }
        ?>
    </div>
</section>

<div class="container">
    <?php
    while (have_posts()) : the_post();
        the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'is-wp-theme'));
    endwhile;
    ?>
</div>


<?php get_footer(); ?>