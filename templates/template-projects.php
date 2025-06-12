<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Template Projects */

get_header();

$hero_cnt = get_field('hero_cnt');
$bg_hero = get_field('bg_hero');

?>

<div class="container-fluid text-center hero_wrap position-relative d-flex flex-column justify-content-center" style="background-image: url('<?php echo $bg_hero; ?>')">
	<?php echo wp_kses_post($hero_cnt); ?>
</div>

<section class="position-relative">
    <?php
    while (have_posts()) : the_post();
        the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'is-wp-theme'));
    endwhile;
    ?>
</section>

<?php get_footer(); ?>