<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Mainpage */

get_header();

$hero_bg = get_field('hero_bg');
$hero_title = get_field('hero_title');
$hero_content = get_field('hero_content');
$hero_button_text = get_field('hero_button_text');
$hero_button_url = get_field('hero_button_url');

$intro_title = get_field('intro_title');
$intro_content = get_field('intro_content');

$how_title = get_field('how_title');
$how_steps = get_field('how_steps');
$how_content = get_field('how_content');
$how_button_text = get_field('how_button_text');
$how_button_url = get_field('how_button_url');
$how_icons = get_field('how_icons');

$about_title = get_field('about_title');
$about_cards = get_field('about_cards');

$funds_title = get_field('funds_title');
$funds_intro = get_field('funds_intro');
$funds_items = get_field('funds_items');

$benefits_title = get_field('benefits_title');
$benefits_slides = get_field('benefits_slides');

$join_title = get_field('join_title');
$join_steps = get_field('join_steps');
$join_button_text = get_field('join_button_text');
$join_button_url = get_field('join_button_url');

$why_title = get_field('why_title');

$contact_cnt = get_field('contact_cnt');

$faq_title = get_field('faq_title');
$faq_items = get_field('faq_items');

$hero_bg_url = '';
if (is_array($hero_bg) && !empty($hero_bg['url'])) {
    $hero_bg_url = $hero_bg['url'];
} elseif (is_string($hero_bg)) {
    $hero_bg_url = $hero_bg;
}

?>

<div class="mainpage-template">
    <!-- 1. Hero -->
    <section class="mainpage-hero">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="mainpage-hero__media" style="<?php echo $hero_bg_url ? "background-image: url('" . esc_url($hero_bg_url) . "')" : ''; ?>"></div>
                </div>
                <div class="col-lg-6">
                    <div class="mainpage-hero__content">
                        <?php if ($hero_title) : ?>
                            <h1 class="mainpage-hero__title"><?php echo esc_html($hero_title); ?></h1>
                        <?php endif; ?>
                        <?php if ($hero_content) : ?>
                            <div class="mainpage-hero__text"><?php echo wp_kses_post($hero_content); ?></div>
                        <?php endif; ?>
                        <?php if ($hero_button_text && $hero_button_url) : ?>
                            <a href="<?php echo esc_url($hero_button_url); ?>" class="btn btn-danger rounded-pill px-4 py-2"><?php echo esc_html($hero_button_text); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Wstęp -->
    <section class="py-5 text-center">
        <div class="container container-narrow">
            <?php if ($intro_title) : ?>
                <h2 class="mainpage-section-title"><?php echo esc_html($intro_title); ?></h2>
            <?php endif; ?>
            <?php if ($intro_content) : ?>
                <div class="mainpage-lead"><?php echo wp_kses_post($intro_content); ?></div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 3. Jak to działa -->
    <section class="mainpage-how py-5">
        <div class="container">
            <div class="row g-4 g-xl-5">
                <div class="col-lg-6">
                    <?php if ($how_title) : ?>
                        <h2 class="mainpage-section-title text-start"><?php echo esc_html($how_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($how_steps) : ?>
                        <ol class="main-number-style-list list-unstyled">
                            <?php foreach ($how_steps as $step) : ?>
                                <?php if (!empty($step['step_text'])) : ?>
                                    <li><?php echo esc_html($step['step_text']); ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ol>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <?php if ($how_content) : ?>
                        <div class="mainpage-how__content"><?php echo wp_kses_post($how_content); ?></div>
                    <?php endif; ?>
                    <?php if ($how_button_text && $how_button_url) : ?>
                        <a href="<?php echo esc_url($how_button_url); ?>" class="btn btn-danger rounded-pill px-4 py-2 mt-3"><?php echo esc_html($how_button_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Ikony -->
    <?php if ($how_icons) : ?>
        <section class="pb-5">
            <div class="container">
                <div class="row g-3 align-items-start justify-content-center mainpage-icons">
                    <?php foreach ($how_icons as $index => $icon_item) : ?>
                        <div class="col-12 col-md-3">
                            <div class="mainpage-icon-card">
                                <?php if (!empty($icon_item['icon'])) : ?>
                                    <?php
                                    $icon_id = is_array($icon_item['icon']) && !empty($icon_item['icon']['ID']) ? $icon_item['icon']['ID'] : 0;
                                    $icon_alt = is_array($icon_item['icon']) && !empty($icon_item['icon']['alt']) ? $icon_item['icon']['alt'] : '';
                                    if ($icon_id) {
                                        echo wp_get_attachment_image($icon_id, 'medium', false, ['class' => 'img-fluid mb-3', 'alt' => esc_attr($icon_alt)]);
                                    }
                                    ?>
                                <?php endif; ?>
                                <?php if (!empty($icon_item['text'])) : ?>
                                    <p class="mb-0"><?php echo esc_html($icon_item['text']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($index < count($how_icons) - 1) : ?>
                            <div class="d-none d-md-flex col-md-1 justify-content-center align-items-center">
                                <span class="mainpage-icons__arrow">&rarr;</span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- 5. O Paczce i Akademii -->
    <section class="mainpage-about py-5">
        <div class="container">
            <?php if ($about_title) : ?>
                <h2 class="mainpage-section-title"><?php echo esc_html($about_title); ?></h2>
            <?php endif; ?>
            <?php if ($about_cards) : ?>
                <div class="row g-4">
                    <?php foreach ($about_cards as $card) : ?>
                        <div class="col-lg-6">
                            <div class="mainpage-about__card">
                                <?php if (!empty($card['title'])) : ?>
                                    <h3 class="mainpage-about__title"><?php echo esc_html($card['title']); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($card['content'])) : ?>
                                    <div class="mainpage-about__content"><?php echo wp_kses_post($card['content']); ?></div>
                                <?php endif; ?>
                                <?php if (!empty($card['button_text']) && !empty($card['button_url'])) : ?>
                                    <a href="<?php echo esc_url($card['button_url']); ?>" class="btn btn-danger rounded-pill px-4 py-2 mt-2"><?php echo esc_html($card['button_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 6. Na co przeznaczamy środki -->
    <section class="mainpage-funds py-5">
        <div class="container">
            <?php if ($funds_title) : ?>
                <h2 class="mainpage-section-title"><?php echo esc_html($funds_title); ?></h2>
            <?php endif; ?>
            <?php if ($funds_intro) : ?>
                <div class="mainpage-lead text-center mb-4"><?php echo wp_kses_post($funds_intro); ?></div>
            <?php endif; ?>
            <?php if ($funds_items) : ?>
                <div class="mainpage-funds__items">
                    <?php foreach ($funds_items as $item) : ?>
                        <article class="mainpage-funds__item">
                            <?php if (!empty($item['label'])) : ?>
                                <p class="mainpage-funds__label"><?php echo esc_html($item['label']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($item['content'])) : ?>
                                <p class="mb-0"><?php echo esc_html($item['content']); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 7. Co zyskujesz -->
    <section class="mainpage-benefits py-5">
        <div class="container">
            <?php if ($benefits_title) : ?>
                <h2 class="mainpage-section-title text-white"><?php echo esc_html($benefits_title); ?></h2>
            <?php endif; ?>
            <?php if ($benefits_slides) : ?>
                <div class="swiper js-swiper main-benefits-swiper" data-swiper-type="benefits">
                    <div class="swiper-wrapper">
                        <?php foreach ($benefits_slides as $slide) : ?>
                            <div class="swiper-slide">
                                <div class="main-benefits-swiper__slide">
                                    <?php if (!empty($slide['image'])) : ?>
                                        <?php
                                        $benefit_image_id = is_array($slide['image']) && !empty($slide['image']['ID']) ? $slide['image']['ID'] : 0;
                                        $benefit_image_alt = is_array($slide['image']) && !empty($slide['image']['alt']) ? $slide['image']['alt'] : '';
                                        if ($benefit_image_id) {
                                            echo wp_get_attachment_image($benefit_image_id, 'large', false, ['class' => 'img-fluid rounded mb-3', 'alt' => esc_attr($benefit_image_alt)]);
                                        }
                                        ?>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['title'])) : ?>
                                        <h3 class="h5 mb-2"><?php echo esc_html($slide['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['content'])) : ?>
                                        <div><?php echo wp_kses_post($slide['content']); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 8. Zostań Inwestorem -->
    <section class="mainpage-join py-5">
        <div class="container">
            <?php if ($join_title) : ?>
                <h2 class="mainpage-section-title"><?php echo esc_html($join_title); ?></h2>
            <?php endif; ?>
            <?php if ($join_steps) : ?>
                <ol class="main-number-style-list list-sm list-unstyled">
                    <?php foreach ($join_steps as $step) : ?>
                        <?php if (!empty($step['step_text'])) : ?>
                            <li><?php echo esc_html($step['step_text']); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
            <?php if ($join_button_text && $join_button_url) : ?>
                <div class="text-center mt-3">
                    <a href="<?php echo esc_url($join_button_url); ?>" class="btn btn-danger rounded-pill px-4 py-2"><?php echo esc_html($join_button_text); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 9. Dlaczego zostałem Inwestorem -->
    <section class="py-5">
        <div class="container">
            <?php if ($why_title) : ?>
                <h2 class="mainpage-section-title"><?php echo esc_html($why_title); ?></h2>
            <?php endif; ?>
            <div class="swiper js-swiper main-story-swiper" data-swiper-type="story">
                <div class="swiper-wrapper px-xl-4">
                    <?php if (have_rows('slider')) : ?>
                        <?php while (have_rows('slider')) : the_row();
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
                                                <img src="<?php echo esc_url($slider_img['url']); ?>" alt="<?php echo esc_attr($slider_img['alt']); ?>" class="img-fluid mx-auto rounded">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- 10. Kontakt (istniejąca sekcja) -->
    <?php if ($contact_cnt) : ?>
        <?php echo wp_kses_post($contact_cnt); ?>
    <?php endif; ?>

    <!-- 11. FAQ -->
    <section class="mainpage-faq py-5">
        <div class="container">
            <?php if ($faq_title) : ?>
                <h2 class="mainpage-section-title"><?php echo esc_html($faq_title); ?></h2>
            <?php endif; ?>
            <?php if ($faq_items) : ?>
                <div class="accordion" id="mainpageFaq">
                    <?php foreach ($faq_items as $index => $faq) : ?>
                        <?php
                        $heading_id = 'faqHeading' . $index;
                        $collapse_id = 'faqCollapse' . $index;
                        ?>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                                <button class="accordion-button <?php echo $index !== 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                    <?php echo esc_html($faq['question'] ?? ''); ?>
                                </button>
                            </h3>
                            <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#mainpageFaq">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post($faq['answer'] ?? ''); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>