<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Template Inwestorzy */

get_header();

$hero_cnt = get_field('hero_cnt');
$bg_hero = get_field('bg_hero');

?>

<div class="container-fluid text-center hero_wrap position-relative d-flex flex-column justify-content-center" style="background-image: url('<?php echo $bg_hero; ?>')">
	<?php echo wp_kses_post($hero_cnt); ?>
</div>

<section class="position-relative">
	<div class="container mb-5">
		<?php
		while (have_posts()) : the_post();
			the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'is-wp-theme'));
		endwhile;
		?>

		<!-- Województwa & Projekt -->
		<div class="row justify-content-center mb-4 mb-lg-5">
			<div class="col-md-6 col-lg-4">
				<div class="row form-group form-group-custom mb-3 mb-lg-0">
					<label class="col-sm-4 control-label align-self-center fw-bold" for="wojewodztwo">Województwo:</label>
					<div class="col-sm-8">
						<select id="wojewodztwoSelect" class="form-select select-list" data-wojewodztwo>
							<option value="wszystkie">Wszystkie województwa</option>
							<option value="dolnoslaskie">Dolnośląskie</option>
							<option value="kujawsko-pomorskie">Kujawsko-pomorskie</option>
							<option value="lubelskie">Lubelskie</option>
							<option value="lubuskie">Lubuskie</option>
							<option value="lodzkie">Łódzkie</option>
							<option value="malopolskie">Małopolskie</option>
							<option value="mazowieckie">Mazowieckie</option>
							<option value="opolskie">Opolskie</option>
							<option value="podkarpackie">Podkarpackie</option>
							<option value="podlaskie">Podlaskie</option>
							<option value="pomorskie">Pomorskie</option>
							<option value="slaskie">Śląskie</option>
							<option value="swietokrzyskie">Świętokrzyskie</option>
							<option value="warminsko-mazurskie">Warmińsko-mazurskie</option>
							<option value="wielkopolskie">Wielkopolskie</option>
							<option value="zachodniopomorskie">Zachodniopomorskie</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="row form-group form-group-custom">
					<label class="col-sm-4 col-lg-3 control-label align-self-center fw-bold" for="projekt">Projekt:</label>
					<div class="col-sm-7">
						<select id="projektSelect" class="form-select select-list" data-projekt>
							<option value="wszystkie">Wszystkie projekty</option>
							<option value="szlachetna-paczka">Szalchetna Paczka</option>
							<option value="akademia-przyszlosci">Akademia Przyszłości</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<p id="wybraneWojewodztwo" class="text-transform text-szp-red text-center fw-bold standard-title-8">Wszystkie województwa</p>

		<!-- Firmy -->
		<div class="firmy overflow-hidden">
			<ul class="dane list-unstyled">
				<?php if (have_rows('inwestorzy')) :
					$counter_val = 0;
				?>
					<?php while (have_rows('inwestorzy')) : the_row();
						$nazwa_inwestora = get_sub_field('nazwa_inwestora');
						$img = get_sub_field('logo_inwestora');
						$rejon_lub_miasto = get_sub_field('rejon_lub_miasto');
						$strona_www_inwestora = get_sub_field('strona_www_inwestora');
						$opis_inwestora = get_sub_field('opis_inwestora');
						$wspierany_projekt = get_sub_field('wspierany_projekt');
						$wojewodztwo = get_sub_field('wojewodztwo');
					?>
						<li id="projekt-<?php echo $counter_val; ?>" class="firma mb-3 bg-white p-4" data-projekt="<?php echo esc_attr($wspierany_projekt['value']); ?>" data-wojewodztwo="<?php echo $wojewodztwo; ?>">
							<div class="row mb-3 align-items-center justify-content-center">
								<div class="col-5 col-sm-6 text-center">
									<div class="row justify-content-center justify-content-lg-end">
										<div class="col-sm-4 text-center">
											<?php echo wp_get_attachment_image($img['ID'], 'medium', false, ['alt' => $nazwa_inwestora, 'class' => 'img-fluid mb-3 mb-lg-0']); ?>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="row">
										<div class="col-sm-10 ps-lg-4">
											<p class="text-dark-blue mb-0 fw-bold standard-title-8 lh-13">
												<?php echo $nazwa_inwestora; ?>
											</p>
											<p class="text-dark-blue">
												<a href="<?php echo $strona_www_inwestora; ?>" class="blue" target="_blank" rel="noopener noreferrer">
													<?php echo $strona_www_inwestora; ?>
												</a>
											</p>
										</div>
										<div class="col-sm-10 ps-lg-4">
											<?php if ($rejon_lub_miasto) : ?>
												<p class="text-dark-blue mb-0 fw-bold lh-13"><?php echo $rejon_lub_miasto; ?></p>
											<?php endif; ?>
											<p class="text-dark-blue mb-0"><small><?php echo esc_attr($wspierany_projekt['label']); ?></small></p>
										</div>
									</div>
								</div>
							</div>
							<?php echo $opis_inwestora; ?>
						</li>
						<?php $counter_val++; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
			<p id="brakWynikow" class="text-center" style="display: none;">Brak wyników spełniających kryteria.</p>
		</div>
		<!-- / Firmy -->
	</div>
</section>
<?php get_footer(); ?>