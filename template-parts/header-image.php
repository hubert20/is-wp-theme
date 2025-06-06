<?php
$bg_header_image = get_field('bg_header_image');
?>

<section class="d-flex flex-column align-items-center justify-content-center header-image-defeault">
    <div class="container">
        <h1 class="chakra-petch-font standard-title-4 fw-bold text-center text-white header-def-title">
            <?php the_title(); ?>
        </h1>
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs" class="mb-0 breadcrumbs text-center chakra-petch-font fw-bold">', '</p>');
        }
        ?>
    </div>
</section>