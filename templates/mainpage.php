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
$intro_button_text = get_field('intro_button_text');
$intro_button_url = get_field('intro_button_url');

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

$heading_allowed_tags = [
    'strong' => [],
    'b' => [],
    'em' => [],
    'i' => [],
    'br' => [],
    'span' => ['class' => true],
];

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
                    <div class="mainpage-hero__media" style="<?php echo $hero_bg_url ? "background-image: url('" . esc_url($hero_bg_url) . "')" : ''; ?>">
                        <img src="<?php echo esc_url(home_url('/wp-content/uploads/2026/03/logos.png')); ?>" alt="Logotypy partnerów" class="mainpage-hero__corner-logo">
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <div class="mainpage-hero__content">
                        <?php if ($hero_title) : ?>
                            <h1 class="mainpage-hero__title font-secondary text-center lh-1 mb-3 mb-lg-5"><?php echo wp_kses((string) $hero_title, $heading_allowed_tags); ?></h1>
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
                <h2 class="mainpage-section-title font-secondary standard-title-5"><?php echo wp_kses((string) $intro_title, $heading_allowed_tags); ?></h2>
            <?php endif; ?>
            <?php if ($intro_content) : ?>
                <div class="mainpage-lead"><?php echo wp_kses_post($intro_content); ?></div>
            <?php endif; ?>
            <?php if ($intro_button_text && $intro_button_url) : ?>
                <a href="<?php echo esc_url($intro_button_url); ?>" class="btn btn-danger rounded-pill px-4 py-2 mt-3"><?php echo esc_html($intro_button_text); ?></a>
            <?php endif; ?>
        </div>
    </section>

    <!-- 3. Jak to działa -->
    <section class="mainpage-how py-5">
        <div class="container">
            <div class="row g-4 g-xl-5">
                <div class="col-lg-6">
                    <?php if ($how_title) : ?>
                        <h2 class="font-secondary mainpage-section-title text-start font-secondary standard-title-5"><?php echo wp_kses((string) $how_title, $heading_allowed_tags); ?></h2>
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
                <div class="col-lg-6 d-flex">
                    <?php if ($how_content) : ?>
                        <div class="mainpage-how__content d-flex justify-content-center flex-column"><?php echo wp_kses_post($how_content); ?></div>
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
        <section class="py-4 py-lg-5">
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
                                        echo wp_get_attachment_image($icon_id, 'medium', false, ['class' => 'img-fluid mb-3 mainpage-icon-card__icon', 'alt' => esc_attr($icon_alt)]);
                                    }
                                    ?>
                                <?php endif; ?>
                                <?php if (!empty($icon_item['text'])) : ?>
                                    <p class="mb-0"><?php echo wp_kses_post($icon_item['text']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($index < count($how_icons) - 1) : ?>
                            <div class="d-none d-md-flex col-md-1 mainpage-icons__arrow-col">
                                <span class="mainpage-icons__arrow" aria-hidden="true"></span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- 5. O Paczce i Akademii -->
    <section class="mainpage-about">
        <?php if ($about_title) : ?>
            <div class="container py-4 py-lg-5">
                <h2 class="font-secondary mainpage-section-title mb-0 standard-title-5"><?php echo wp_kses((string) $about_title, $heading_allowed_tags); ?></h2>
            </div>
        <?php endif; ?>
        <?php if ($about_cards) : ?>
            <div class="container-fluid px-0">
                <div class="row g-0">
                    <?php foreach ($about_cards as $index => $card) : ?>
                        <?php
                        $card_intro = $card['content'] ?? '';
                        $card_stats_title = $card['stats_title'] ?? '';
                        $card_stats = $card['stats_items'] ?? [];
                        $card_footer_note = $card['footer_note'] ?? '';
                        $card_footer_link = $card['footer_link'] ?? '';
                        $side_class = $index % 2 === 0 ? 'mainpage-about__panel--left' : 'mainpage-about__panel--right';
                        ?>
                        <div class="col-lg-6">
                            <div class="mainpage-about__panel <?php echo esc_attr($side_class); ?>">
                                <div class="mainpage-about__inner">
                                    <?php if (!empty($card['title'])) : ?>
                                        <h3 class="mainpage-about__title"><?php echo wp_kses((string) $card['title'], $heading_allowed_tags); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($card_intro)) : ?>
                                        <div class="mainpage-about__content"><?php echo wp_kses_post($card_intro); ?></div>
                                    <?php endif; ?>

                                    <?php if (!empty($card_stats_title)) : ?>
                                        <p class="mainpage-about__stats-title"><?php echo wp_kses_post((string) $card_stats_title, $heading_allowed_tags); ?></p>
                                    <?php endif; ?>

                                    <?php if (!empty($card_stats)) : ?>
                                        <div class="mainpage-about__stats-grid py-4">
                                            <?php foreach ($card_stats as $stat_item) : ?>
                                                <?php
                                                $stat_value = $stat_item['value'] ?? '';
                                                $stat_label = $stat_item['label'] ?? '';
                                                $stat_value_color_class = $side_class === 'mainpage-about__panel--left' ? 'text-white' : 'text-dark';
                                                ?>
                                                <div class="mainpage-about__stat">
                                                    <?php if ($stat_value !== '') : ?>
                                                        <p class="mainpage-about__stat-value <?php echo esc_attr($stat_value_color_class); ?> font-secondary"><?php echo wp_kses((string) $stat_value, $heading_allowed_tags); ?></p>
                                                    <?php endif; ?>
                                                    <?php if ($stat_label !== '') : ?>
                                                        <p class="mainpage-about__stat-label"><?php echo wp_kses((string) $stat_label, $heading_allowed_tags); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($card['button_text']) && !empty($card['button_url'])) : ?>
                                        <a href="<?php echo esc_url($card['button_url']); ?>" class="btn btn-danger rounded-pill px-4 py-2 mt-3"><?php echo esc_html($card['button_text']); ?></a>
                                    <?php endif; ?>
                                    <?php if (!empty($card_footer_note) || !empty($card_footer_link)) : ?>
                                        <p class="mainpage-about__footer-note mt-3 mb-0">
                                            <?php if (!empty($card_footer_note)) : ?>
                                                <span><?php echo esc_html($card_footer_note); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($card_footer_link)) : ?>
                                                <a href="<?php echo esc_url($card_footer_link); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($card_footer_link); ?></a>
                                            <?php endif; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <!-- 6. Na co przeznaczamy środki -->
    <section class="mainpage-funds py-5">
        <div class="container">
            <?php if ($funds_title) : ?>
                <h2 class="mainpage-section-title font-secondary standard-title-5"><?php echo wp_kses((string) $funds_title, $heading_allowed_tags); ?></h2>
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
                <h2 class="mainpage-section-title text-white font-secondary standard-title-5"><?php echo wp_kses((string) $benefits_title, $heading_allowed_tags); ?></h2>
            <?php endif; ?>
            <?php if ($benefits_slides) : ?>
                <div class="swiper js-swiper main-benefits-swiper" data-swiper-type="benefits">
                    <div class="swiper-wrapper">
                        <?php foreach ($benefits_slides as $slide) : ?>
                            <div class="swiper-slide">
                                <div class="main-benefits-swiper__slide">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-lg-6">
                                            <?php if (!empty($slide['image'])) : ?>
                                                <?php
                                                $benefit_image_id = is_array($slide['image']) && !empty($slide['image']['ID']) ? $slide['image']['ID'] : 0;
                                                $benefit_image_alt = is_array($slide['image']) && !empty($slide['image']['alt']) ? $slide['image']['alt'] : '';
                                                if ($benefit_image_id) {
                                                    echo wp_get_attachment_image($benefit_image_id, 'large', false, ['class' => 'img-fluid rounded main-benefits-swiper__image', 'alt' => esc_attr($benefit_image_alt)]);
                                                }
                                                ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="main-benefits-swiper__content">
                                                <?php if (!empty($slide['title'])) : ?>
                                                    <h3 class="h4 mb-3"><?php echo wp_kses((string) $slide['title'], $heading_allowed_tags); ?></h3>
                                                <?php endif; ?>
                                                <?php if (!empty($slide['content'])) : ?>
                                                    <div><?php echo wp_kses_post($slide['content']); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="main-benefits-swiper__controls">
                        <div class="swiper-button-prev" aria-label="Poprzedni slajd"></div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next" aria-label="Następny slajd"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 8. Zostań Inwestorem -->
    <section class="mainpage-join py-5 bg-gray-light">
        <div class="container">
            <?php if ($join_title) : ?>
                <h2 class="mainpage-section-title font-secondary standard-title-5"><?php echo wp_kses((string) $join_title, $heading_allowed_tags); ?></h2>
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
                <h2 class="mainpage-section-title font-secondary standard-title-5"><?php echo wp_kses((string) $why_title, $heading_allowed_tags); ?></h2>
            <?php endif; ?>
            <div class="swiper js-swiper main-story-swiper" data-swiper-type="story">
                <div class="swiper-wrapper px-xl-4">
                    <?php if (have_rows('slider')) : ?>
                        <?php while (have_rows('slider')) : the_row();
                            $slider_cnt = get_sub_field('slider_cnt');
                            $slider_person = get_sub_field('slider_person');
                            $slider_img = get_sub_field('slider_img');
                            $person_name = '';
                            $person_role = '';

                            $slider_person_plain = trim(wp_strip_all_tags(html_entity_decode((string) $slider_person, ENT_QUOTES, 'UTF-8')));
                            if ($slider_person_plain !== '') {
                                $person_lines = preg_split('/\r\n|\r|\n/', $slider_person_plain);
                                if (!empty($person_lines[0])) {
                                    $person_name = trim($person_lines[0]);
                                }
                                if (!empty($person_lines[1])) {
                                    $person_role = trim(implode(' ', array_slice($person_lines, 1)));
                                }

                                // Fallback: if editor content is in one line, treat first 2 words as name.
                                if ($person_role === '') {
                                    $person_words = preg_split('/\s+/', $slider_person_plain);
                                    if (is_array($person_words) && count($person_words) > 2) {
                                        $person_name = trim($person_words[0] . ' ' . $person_words[1]);
                                        $person_role = trim(implode(' ', array_slice($person_words, 2)));
                                    }
                                }
                            }
                        ?>
                            <div class="swiper-slide">
                                <div class="main-story-card">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-lg-4 text-center">
                                            <?php if ($slider_img) : ?>
                                                <img src="<?php echo esc_url($slider_img['url']); ?>" alt="<?php echo esc_attr($slider_img['alt']); ?>" class="img-fluid main-story-card__image">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="main-story-card__content">
                                                <div class="main-story-card__person">
                                                    <?php if ($person_name) : ?>
                                                        <p class="main-story-card__name"><?php echo esc_html($person_name); ?></p>
                                                    <?php endif; ?>
                                                    <?php if ($person_role) : ?>
                                                        <p class="main-story-card__role"><?php echo esc_html($person_role); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="main-story-card__text"><?php echo wp_kses_post($slider_cnt); ?></div>
                                            </div>
                                        </div>
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
    <section class="py-5 bg-gray-light">
        <?php if ($contact_cnt) : ?>
            <?php echo wp_kses_post($contact_cnt); ?>
        <?php endif; ?>
    </section>

    <!-- 11. FAQ -->
    <section class="mainpage-faq py-5 bg-gray-light">
        <div class="container">
            <?php if ($faq_title) : ?>
                <h2 class="mainpage-section-title font-secondary standard-title-5"><?php echo wp_kses((string) $faq_title, $heading_allowed_tags); ?></h2>
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