<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Template Form */

get_header();

?>

<section class="position-relative">
    <?php
    while (have_posts()) : the_post();
        the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'is-wp-theme'));
    endwhile;
    ?>
</section>

<section class="position-relative py-4 py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="p-3 p-lg-4 form-border">
                    <?php echo apply_shortcodes('[contact-form-7 id="f9415db" title="Formularz 1"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>