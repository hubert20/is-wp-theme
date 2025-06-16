<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Mainpage */

get_header();

$contact_cnt = get_field('contact_cnt');

?>

<!-- Main hero -->
<?php get_template_part('template-parts/main-hero'); ?>

<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'is-wp-theme'));
endwhile;
?>

<!-- Dlaczego zostałem Inwestorem Społecznym? Slider Swiper -->
<div class="container py-4 py-lg-5">
    <div class="swiper swiper-container main-swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper px-xl-4">
            <!-- Slides -->
            <?php if (have_rows('slider')) : ?>
                <?php
                while (have_rows('slider')) : the_row();
                    $slider_cnt = get_sub_field('slider_cnt');
                    $slider_person = get_sub_field('slider_person');
                    $slider_img = get_sub_field('slider_img');
                ?>
                    <div class="swiper-slide">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <?php echo wp_kses_post($slider_cnt); ?>
                            </div>
                            <div class="col-11 col-lg-5 text-center">
                                <?php if ($slider_img) : ?>
                                    <div class="slider-person position-relative">
                                        <?php echo wp_kses_post($slider_person); ?>
                                        <img src="<?php echo esc_url($slider_img['url']); ?>" alt="<?php echo esc_attr($slider_img['alt']); ?>" class="img-fluid mx-auto">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
<?php echo wp_kses_post($contact_cnt); ?>

<?php get_footer(); ?>