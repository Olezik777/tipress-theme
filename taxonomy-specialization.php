<?php
/**
 * Template for specialization taxonomy archive (урология, онкология, гинекология, etc.)
 * 
 * @package Tipress
 */

get_header();

// Get current taxonomy term
$term = get_queried_object();
$term_id = $term->term_id;
$term_slug = $term->slug;
?>

<main id="primary" class="site-main taxonomy-specialization">
	<div class="wp-block-group single-template-container">
		<?php tipress_display_breadcrumbs(); ?>
		
		<div class="ti-columns reverse-mobile single-template-columns">
			<div class="ti-column single-template-sidebar">
				<?php get_sidebar(); ?>
			</div>
			<div class="ti-column single-template-content">
				<?php
				// Get ACF fields for taxonomy term
				// For taxonomy terms, ACF accepts term object or format: 'taxonomy_term_id'
				// Using term object is more reliable
				$term_field_context = $term;
				?>

				<!-- Hero Section -->
				<?php
				$hero_title = get_field( 'spec_hero_title', $term_field_context );
				$hero_title = ! empty( $hero_title ) ? $hero_title : $term->name;
				$hero_doctor_id = get_field( 'spec_hero_doctor', $term_field_context );
				$hero_doctor_position = get_field( 'spec_hero_doctor_position', $term_field_context );
				$hero_image_id = get_field( 'spec_hero_image', $term_field_context );
				$hero_intro = get_field( 'spec_hero_intro', $term_field_context );
				$hero_cta_label = get_field( 'spec_hero_cta_label', $term_field_context );
				$hero_cta_url = get_field( 'spec_hero_cta_url', $term_field_context );
				
				// Get hero doctor data
				$hero_doctor = null;
				if ( $hero_doctor_id ) {
					$hero_doctor = get_post( $hero_doctor_id );
				}
				
				// Get benefits
				$hero_benefits = [];
				for ( $i = 1; $i <= 5; $i++ ) {
					$benefit = get_field( 'spec_hero_benefit_' . $i, $term_field_context );
					if ( ! empty( $benefit ) ) {
						$hero_benefits[] = $benefit;
					}
				}
				?>
				<section class="spec-hero-section">
					<div class="wp-block-group">
						<?php if ( $hero_image_id ) : ?>
							<div class="spec-hero-image">
								<?php echo wp_get_attachment_image( $hero_image_id, 'large', false ); ?>
								<?php if ( ! empty( $hero_title ) ) : ?>
									<h1 class="entry-title">
										<?php echo esc_html( $hero_title ); ?>
									</h1>
								<?php endif; ?>
							</div>
						<?php else : ?>
							<header class="entry-header">
								<h1 class="entry-title">
									<?php echo esc_html( $hero_title ); ?>
								</h1>
							</header>
						<?php endif; ?>
						
						<?php if ( $hero_doctor ) : ?>
							<div class="spec-hero-doctor">
								<?php if ( has_post_thumbnail( $hero_doctor->ID ) ) : ?>
									<div class="spec-hero-doctor-image">
										<a href="<?php echo esc_url( get_permalink( $hero_doctor->ID ) ); ?>">
											<?php echo get_the_post_thumbnail( $hero_doctor->ID, 'medium' ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="spec-hero-doctor-info">
									<h2>
										<a href="<?php echo esc_url( get_permalink( $hero_doctor->ID ) ); ?>">
											<?php echo esc_html( $hero_doctor->post_title ); ?>
										</a>
									</h2>
									<?php if ( ! empty( $hero_doctor_position ) ) : ?>
										<p>
											<?php echo esc_html( $hero_doctor_position ); ?>
										</p>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
				
						<?php if ( ! empty( $hero_intro ) ) : ?>
							<div class="spec-hero-intro">
								<?php echo wp_kses_post( $hero_intro ); ?>
							</div>
						<?php endif; ?>
						
						<?php if ( ! empty( $hero_benefits ) ) : ?>
							<ul class="spec-hero-benefits">
								<?php foreach ( $hero_benefits as $benefit ) : ?>
									<li>
										<?php echo esc_html( $benefit ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						
						<?php if ( ! empty( $hero_cta_label ) && ! empty( $hero_cta_url ) ) : ?>
							<div class="spec-hero-cta">
								<a href="<?php echo esc_url( $hero_cta_url ); ?>" class="wp-block-button__link wp-element-button">
									<?php echo esc_html( $hero_cta_label ); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</section>

		<!-- Team Section -->
		<?php
		$team_title = get_field( 'spec_team_title', $term_field_context );
		$team_doctors = [];
		for ( $i = 1; $i <= 6; $i++ ) {
			$doctor_id = get_field( 'spec_team_doctor_' . $i, $term_field_context );
			if ( $doctor_id ) {
				$doctor = get_post( $doctor_id );
				if ( $doctor ) {
					$custom_title = get_field( 'spec_team_doctor_' . $i . '_custom_title', $term_field_context );
					$team_doctors[] = [
						'post' => $doctor,
						'custom_title' => $custom_title,
					];
				}
			}
		}
		
		if ( ! empty( $team_doctors ) ) :
			?>
			<section class="spec-team-section">
				<div class="wp-block-group">
					<?php if ( ! empty( $team_title ) ) : ?>
						<h2 class="wp-block-heading">
							<?php echo esc_html( $team_title ); ?>
						</h2>
					<?php endif; ?>
					
					<div class="spec-team-grid">
						<?php foreach ( $team_doctors as $team_doctor_data ) : 
							$team_doctor = $team_doctor_data['post'];
							$team_custom_title = $team_doctor_data['custom_title'];
							?>
							<div class="spec-team-doctor-card wp-block-group has-baige-background-color has-background">
								<?php if ( has_post_thumbnail( $team_doctor->ID ) ) : ?>
									<figure class="wp-block-image aligncenter size-full">
										<a href="<?php echo esc_url( get_permalink( $team_doctor->ID ) ); ?>">
											<?php echo get_the_post_thumbnail( $team_doctor->ID, 'medium' ); ?>
										</a>
									</figure>
								<?php endif; ?>
								
								<h3>
									<a href="<?php echo esc_url( get_permalink( $team_doctor->ID ) ); ?>">
										<?php echo esc_html( $team_doctor->post_title ); ?>
									</a>
								</h3>
								
								<?php if ( ! empty( $team_custom_title ) ) : ?>
									<p>
										<?php echo esc_html( $team_custom_title ); ?>
									</p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!-- Section 1: When to visit -->
		<?php
		$sec1_title = get_field( 'spec_sec1_title', $term_field_context );
		$sec1_intro = get_field( 'spec_sec1_intro', $term_field_context );
		$sec1_items = [];
		for ( $i = 1; $i <= 8; $i++ ) {
			$item_text = get_field( 'spec_sec1_item_' . $i . '_text', $term_field_context );
			$item_url = get_field( 'spec_sec1_item_' . $i . '_url', $term_field_context );
			if ( ! empty( $item_text ) ) {
				$sec1_items[] = [
					'text' => $item_text,
					'url' => $item_url,
				];
			}
		}
		
		if ( ! empty( $sec1_title ) || ! empty( $sec1_intro ) || ! empty( $sec1_items ) ) :
			?>
			<section class="spec-section-1">
				<div class="wp-block-group">
					<?php if ( ! empty( $sec1_title ) ) : ?>
						<h2 class="wp-block-heading">
							<?php echo esc_html( $sec1_title ); ?>
						</h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec1_intro ) ) : ?>
						<div class="spec-sec1-intro">
							<?php echo wp_kses_post( $sec1_intro ); ?>
						</div>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec1_items ) ) : ?>
						<ul class="spec-sec1-items">
							<?php foreach ( $sec1_items as $item ) : ?>
								<li>
									<?php if ( ! empty( $item['url'] ) ) : ?>
										<a href="<?php echo esc_url( $item['url'] ); ?>">
											<?php echo esc_html( $item['text'] ); ?>
										</a>
									<?php else : ?>
										<span>
											<?php echo esc_html( $item['text'] ); ?>
										</span>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

		<!-- Section 2: Second opinion -->
		<?php
		$sec2_title = get_field( 'spec_sec2_title', $term_field_context );
		$sec2_intro = get_field( 'spec_sec2_intro', $term_field_context );
		$sec2_left_title = get_field( 'spec_sec2_left_title', $term_field_context );
		$sec2_right_title = get_field( 'spec_sec2_right_title', $term_field_context );
		$sec2_left_items = [];
		$sec2_right_items = [];
		
		for ( $i = 1; $i <= 6; $i++ ) {
			$left_item = get_field( 'spec_sec2_left_item_' . $i, $term_field_context );
			$right_item = get_field( 'spec_sec2_right_item_' . $i, $term_field_context );
			if ( ! empty( $left_item ) ) {
				$sec2_left_items[] = $left_item;
			}
			if ( ! empty( $right_item ) ) {
				$sec2_right_items[] = $right_item;
			}
		}
		
		if ( ! empty( $sec2_title ) || ! empty( $sec2_intro ) || ! empty( $sec2_left_items ) || ! empty( $sec2_right_items ) ) :
			?>
			<section class="spec-section-2">
				<div class="wp-block-group">
					<?php if ( ! empty( $sec2_title ) ) : ?>
						<h2 class="wp-block-heading">
							<?php echo esc_html( $sec2_title ); ?>
						</h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec2_intro ) ) : ?>
						<div class="spec-sec2-intro">
							<?php echo wp_kses_post( $sec2_intro ); ?>
						</div>
					<?php endif; ?>
					
					<div class="spec-sec2-columns">
						<?php if ( ! empty( $sec2_left_items ) ) : ?>
							<div class="spec-sec2-left">
								<?php if ( ! empty( $sec2_left_title ) ) : ?>
									<h3>
										<?php echo esc_html( $sec2_left_title ); ?>
									</h3>
								<?php endif; ?>
								<ul>
									<?php foreach ( $sec2_left_items as $item ) : ?>
										<li>
											<span>•</span>
											<span><?php echo esc_html( $item ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
						
						<?php if ( ! empty( $sec2_right_items ) ) : ?>
							<div class="spec-sec2-right">
								<?php if ( ! empty( $sec2_right_title ) ) : ?>
									<h3>
										<?php echo esc_html( $sec2_right_title ); ?>
									</h3>
								<?php endif; ?>
								<ul>
									<?php foreach ( $sec2_right_items as $item ) : ?>
										<li>
											<span>•</span>
											<span><?php echo esc_html( $item ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!-- Section 3: Why private -->
		<?php
		$sec3_title = get_field( 'spec_sec3_title', $term_field_context );
		$sec3_intro = get_field( 'spec_sec3_intro', $term_field_context );
		$sec3_items = [];
		for ( $i = 1; $i <= 8; $i++ ) {
			$item = get_field( 'spec_sec3_item_' . $i, $term_field_context );
			if ( ! empty( $item ) ) {
				$sec3_items[] = $item;
			}
		}
		
		if ( ! empty( $sec3_title ) || ! empty( $sec3_intro ) || ! empty( $sec3_items ) ) :
			?>
			<section class="spec-section-3">
				<div class="wp-block-group">
					<?php if ( ! empty( $sec3_title ) ) : ?>
						<h2 class="wp-block-heading">
							<?php echo esc_html( $sec3_title ); ?>
						</h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec3_intro ) ) : ?>
						<div class="spec-sec3-intro">
							<?php echo wp_kses_post( $sec3_intro ); ?>
						</div>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec3_items ) ) : ?>
						<div class="spec-sec3-items">
							<?php foreach ( $sec3_items as $item ) : ?>
								<div>
									<p>
										<?php echo esc_html( $item ); ?>
									</p>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

		<!-- Author Section -->
		<?php
		$author_label = get_field( 'spec_author_label', $term_field_context );
		$author_name = get_field( 'spec_author_name', $term_field_context );
		$author_link = get_field( 'spec_author_link', $term_field_context );
		
		if ( ! empty( $author_name ) ) :
			?>
			<section class="spec-author-section">
				<div class="wp-block-group">
					<?php if ( ! empty( $author_label ) ) : ?>
						<p>
							<?php echo esc_html( $author_label ); ?>
						</p>
					<?php endif; ?>
					
					<?php if ( ! empty( $author_link ) ) : ?>
						<a href="<?php echo esc_url( $author_link ); ?>">
							<h3>
								<?php echo esc_html( $author_name ); ?>
							</h3>
						</a>
					<?php else : ?>
						<h3>
							<?php echo esc_html( $author_name ); ?>
						</h3>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

		<!-- Taxonomy Description (if any) -->
		<?php if ( ! empty( $term->description ) ) : ?>
			<section class="spec-term-description">
				<div class="wp-block-group">
					<div class="entry-content">
						<?php echo wp_kses_post( wpautop( $term->description ) ); ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!-- Doctors Archive (if there are doctors with this specialization) -->
		<?php
		$doctors_query = new WP_Query([
			'post_type' => 'doctors',
			'posts_per_page' => -1,
			'tax_query' => [
				[
					'taxonomy' => 'specialization',
					'field' => 'term_id',
					'terms' => $term_id,
				],
			],
		]);
		
		if ( $doctors_query->have_posts() ) :
			?>
			<section class="spec-doctors-archive">
				<div class="wp-block-group">
					<h2 class="wp-block-heading">
						<?php echo esc_html( tipress_pll__( 'Врачи специализации' ) ); ?>
					</h2>
					
					<div class="doctors-list">
						<?php
						while ( $doctors_query->have_posts() ) :
							$doctors_query->the_post();
							get_template_part( 'template-parts/content', 'doctors' );
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		<?php endif; ?>

			</div>
		</div>
	</div>
</main>

<?php
get_footer();

