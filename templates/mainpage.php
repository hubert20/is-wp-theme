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




<?php echo wp_kses_post($contact_cnt); ?>

<?php get_footer(); ?>