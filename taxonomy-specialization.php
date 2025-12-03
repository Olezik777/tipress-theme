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
				<section class="spec-hero-section" style="margin-bottom: var(--wp--preset--spacing--90);">
					<div class="wp-block-group" style="max-width: 1200px; margin: 0 auto; padding: var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
						<?php if ( $hero_image_id ) : ?>
							<div class="spec-hero-image" style="position: relative; margin-bottom: var(--wp--preset--spacing--50); border-radius: 12px; overflow: hidden;">
								<?php echo wp_get_attachment_image( $hero_image_id, 'large', false, [ 'style' => 'width: 100%; height: auto; display: block;' ] ); ?>
								<?php if ( ! empty( $hero_title ) ) : ?>
									<div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, transparent 100%); padding: var(--wp--preset--spacing--70) var(--wp--preset--spacing--50) var(--wp--preset--spacing--50);">
										<h1 class="entry-title" style="text-transform: uppercase; font-style: normal; font-weight: 700; color: #fff; margin: 0; font-size: clamp(1.5rem, 4vw, 3rem); text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
											<?php echo esc_html( $hero_title ); ?>
										</h1>
									</div>
								<?php endif; ?>
							</div>
						<?php else : ?>
							<header class="entry-header" style="margin-bottom: var(--wp--preset--spacing--50);">
								<h1 class="entry-title" style="text-transform: uppercase; font-style: normal; font-weight: 700; margin-bottom: var(--wp--preset--spacing--40);">
									<?php echo esc_html( $hero_title ); ?>
								</h1>
							</header>
						<?php endif; ?>
						
						<?php if ( $hero_doctor ) : ?>
							<div class="spec-hero-doctor" style="margin-bottom: var(--wp--preset--spacing--40); display: flex; align-items: center; gap: var(--wp--preset--spacing--40);">
								<?php if ( has_post_thumbnail( $hero_doctor->ID ) ) : ?>
									<div class="spec-hero-doctor-image" style="flex-shrink: 0;">
										<a href="<?php echo esc_url( get_permalink( $hero_doctor->ID ) ); ?>">
											<?php echo get_the_post_thumbnail( $hero_doctor->ID, 'medium', [ 'style' => 'width: 120px; height: 120px; object-fit: cover; border-radius: 8px;' ] ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="spec-hero-doctor-info">
									<h2 style="margin: 0 0 8px 0; font-size: 1.5rem;">
										<a href="<?php echo esc_url( get_permalink( $hero_doctor->ID ) ); ?>" style="text-decoration: none; color: inherit;">
											<?php echo esc_html( $hero_doctor->post_title ); ?>
										</a>
									</h2>
									<?php if ( ! empty( $hero_doctor_position ) ) : ?>
										<p style="margin: 0; color: #666; font-size: 1rem;">
											<?php echo esc_html( $hero_doctor_position ); ?>
										</p>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
				
				<?php if ( ! empty( $hero_intro ) ) : ?>
					<div class="spec-hero-intro" style="margin-bottom: var(--wp--preset--spacing--50); font-size: 1.125rem; line-height: 1.6;">
						<?php echo wp_kses_post( $hero_intro ); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( ! empty( $hero_benefits ) ) : ?>
					<ul class="spec-hero-benefits" style="list-style: none; padding: 0; margin: 0 0 var(--wp--preset--spacing--50) 0; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--wp--preset--spacing--40);">
						<?php foreach ( $hero_benefits as $benefit ) : ?>
							<li style="padding: var(--wp--preset--spacing--40); background: #f5f8ff; border-radius: 8px; border-left: 3px solid var(--wp--preset--color--base);">
								<?php echo esc_html( $benefit ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				
				<?php if ( ! empty( $hero_cta_label ) && ! empty( $hero_cta_url ) ) : ?>
					<div class="spec-hero-cta" style="margin-top: var(--wp--preset--spacing--50);">
						<a href="<?php echo esc_url( $hero_cta_url ); ?>" class="wp-block-button__link wp-element-button" style="display: inline-block; padding: 12px 24px; background: var(--wp--preset--color--base); color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600;">
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
			<section class="spec-team-section" style="margin-bottom: var(--wp--preset--spacing--90); background: #f9f9f9; padding: var(--wp--preset--spacing--90) var(--wp--preset--spacing--30);">
				<div class="wp-block-group" style="max-width: 1200px; margin: 0 auto;">
					<?php if ( ! empty( $team_title ) ) : ?>
						<h2 class="wp-block-heading" style="text-align: center; margin-bottom: var(--wp--preset--spacing--70); font-size: 2rem; font-weight: 700;">
							<?php echo esc_html( $team_title ); ?>
						</h2>
					<?php endif; ?>
					
					<div class="spec-team-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--wp--preset--spacing--50);">
						<?php foreach ( $team_doctors as $team_doctor_data ) : 
							$team_doctor = $team_doctor_data['post'];
							$team_custom_title = $team_doctor_data['custom_title'];
							?>
							<div class="spec-team-doctor-card wp-block-group has-baige-background-color has-background" style="border-radius: 12px; padding: var(--wp--preset--spacing--50); text-align: center;">
								<?php if ( has_post_thumbnail( $team_doctor->ID ) ) : ?>
									<figure class="wp-block-image aligncenter size-full" style="margin: 0 0 var(--wp--preset--spacing--40) 0;">
										<a href="<?php echo esc_url( get_permalink( $team_doctor->ID ) ); ?>">
											<?php echo get_the_post_thumbnail( $team_doctor->ID, 'medium', [ 'style' => 'border-radius: 8px;' ] ); ?>
										</a>
									</figure>
								<?php endif; ?>
								
								<h3 style="margin: 0 0 8px 0;">
									<a href="<?php echo esc_url( get_permalink( $team_doctor->ID ) ); ?>" style="text-decoration: none; color: inherit;">
										<?php echo esc_html( $team_doctor->post_title ); ?>
									</a>
								</h3>
								
								<?php if ( ! empty( $team_custom_title ) ) : ?>
									<p style="margin: 0; color: #666; font-size: 0.9rem; line-height: 1.4;">
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
			<section class="spec-section-1" style="margin-bottom: var(--wp--preset--spacing--90);">
				<div class="wp-block-group" style="max-width: 1200px; margin: 0 auto; padding: var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
					<?php if ( ! empty( $sec1_title ) ) : ?>
						<h2 class="wp-block-heading" style="margin-bottom: var(--wp--preset--spacing--50); font-size: 2rem; font-weight: 700;">
							<?php echo esc_html( $sec1_title ); ?>
						</h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec1_intro ) ) : ?>
						<div class="spec-sec1-intro" style="margin-bottom: var(--wp--preset--spacing--50); font-size: 1.125rem; line-height: 1.6;">
							<?php echo wp_kses_post( $sec1_intro ); ?>
						</div>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec1_items ) ) : ?>
						<ul class="spec-sec1-items" style="list-style: none; padding: 0; margin: 0; display: grid; gap: var(--wp--preset--spacing--40);">
							<?php foreach ( $sec1_items as $item ) : ?>
								<li style="padding: var(--wp--preset--spacing--40); background: #fff; border-left: 4px solid var(--wp--preset--color--base); border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
									<?php if ( ! empty( $item['url'] ) ) : ?>
										<a href="<?php echo esc_url( $item['url'] ); ?>" style="text-decoration: none; color: inherit; font-weight: 600; font-size: 1.1rem;">
											<?php echo esc_html( $item['text'] ); ?>
										</a>
									<?php else : ?>
										<span style="font-weight: 600; font-size: 1.1rem;">
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
			<section class="spec-section-2" style="margin-bottom: var(--wp--preset--spacing--90); background: #f9f9f9; padding: var(--wp--preset--spacing--90) var(--wp--preset--spacing--30);">
				<div class="wp-block-group" style="max-width: 1200px; margin: 0 auto;">
					<?php if ( ! empty( $sec2_title ) ) : ?>
						<h2 class="wp-block-heading" style="text-align: center; margin-bottom: var(--wp--preset--spacing--50); font-size: 2rem; font-weight: 700;">
							<?php echo esc_html( $sec2_title ); ?>
						</h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec2_intro ) ) : ?>
						<div class="spec-sec2-intro" style="margin-bottom: var(--wp--preset--spacing--70); text-align: center; font-size: 1.125rem; line-height: 1.6;">
							<?php echo wp_kses_post( $sec2_intro ); ?>
						</div>
					<?php endif; ?>
					
					<div class="spec-sec2-columns" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--wp--preset--spacing--70);">
						<?php if ( ! empty( $sec2_left_items ) ) : ?>
							<div class="spec-sec2-left">
								<?php if ( ! empty( $sec2_left_title ) ) : ?>
									<h3 style="margin-bottom: var(--wp--preset--spacing--40); font-size: 1.5rem; font-weight: 700;">
										<?php echo esc_html( $sec2_left_title ); ?>
									</h3>
								<?php endif; ?>
								<ul style="list-style: none; padding: 0; margin: 0;">
									<?php foreach ( $sec2_left_items as $item ) : ?>
										<li style="padding: var(--wp--preset--spacing--30) 0; border-bottom: 1px solid #ddd; display: flex; align-items: flex-start; gap: var(--wp--preset--spacing--30);">
											<span style="color: var(--wp--preset--color--base); font-weight: bold; flex-shrink: 0;">•</span>
											<span><?php echo esc_html( $item ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
						
						<?php if ( ! empty( $sec2_right_items ) ) : ?>
							<div class="spec-sec2-right">
								<?php if ( ! empty( $sec2_right_title ) ) : ?>
									<h3 style="margin-bottom: var(--wp--preset--spacing--40); font-size: 1.5rem; font-weight: 700;">
										<?php echo esc_html( $sec2_right_title ); ?>
									</h3>
								<?php endif; ?>
								<ul style="list-style: none; padding: 0; margin: 0;">
									<?php foreach ( $sec2_right_items as $item ) : ?>
										<li style="padding: var(--wp--preset--spacing--30) 0; border-bottom: 1px solid #ddd; display: flex; align-items: flex-start; gap: var(--wp--preset--spacing--30);">
											<span style="color: var(--wp--preset--color--base); font-weight: bold; flex-shrink: 0;">•</span>
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
			<section class="spec-section-3" style="margin-bottom: var(--wp--preset--spacing--90);">
				<div class="wp-block-group" style="max-width: 1200px; margin: 0 auto; padding: var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
					<?php if ( ! empty( $sec3_title ) ) : ?>
						<h2 class="wp-block-heading" style="margin-bottom: var(--wp--preset--spacing--50); font-size: 2rem; font-weight: 700;">
							<?php echo esc_html( $sec3_title ); ?>
						</h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec3_intro ) ) : ?>
						<div class="spec-sec3-intro" style="margin-bottom: var(--wp--preset--spacing--50); font-size: 1.125rem; line-height: 1.6;">
							<?php echo wp_kses_post( $sec3_intro ); ?>
						</div>
					<?php endif; ?>
					
					<?php if ( ! empty( $sec3_items ) ) : ?>
						<div class="spec-sec3-items" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--wp--preset--spacing--40);">
							<?php foreach ( $sec3_items as $item ) : ?>
								<div style="padding: var(--wp--preset--spacing--50); background: #f5f8ff; border-radius: 8px; border-top: 4px solid var(--wp--preset--color--base);">
									<p style="margin: 0; font-weight: 600; line-height: 1.5;">
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
			<section class="spec-author-section" style="margin-bottom: var(--wp--preset--spacing--90); padding: var(--wp--preset--spacing--50); background: #f9f9f9; border-left: 4px solid var(--wp--preset--color--base); border-radius: 4px;">
				<div class="wp-block-group" style="max-width: 1200px; margin: 0 auto;">
					<?php if ( ! empty( $author_label ) ) : ?>
						<p style="margin: 0 0 8px 0; font-size: 0.9rem; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">
							<?php echo esc_html( $author_label ); ?>
						</p>
					<?php endif; ?>
					
					<?php if ( ! empty( $author_link ) ) : ?>
						<a href="<?php echo esc_url( $author_link ); ?>" style="text-decoration: none; color: inherit;">
							<h3 style="margin: 0; font-size: 1.25rem; font-weight: 700;">
								<?php echo esc_html( $author_name ); ?>
							</h3>
						</a>
					<?php else : ?>
						<h3 style="margin: 0; font-size: 1.25rem; font-weight: 700;">
							<?php echo esc_html( $author_name ); ?>
						</h3>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

		<!-- Taxonomy Description (if any) -->
		<?php if ( ! empty( $term->description ) ) : ?>
			<section class="spec-term-description" style="margin-bottom: var(--wp--preset--spacing--90);">
				<div class="wp-block-group" style="max-width: 1200px; margin: 0 auto; padding: var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
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
			<section class="spec-doctors-archive" style="margin-bottom: var(--wp--preset--spacing--90);">
				<div class="wp-block-group" style="max-width: 1200px; margin: 0 auto; padding: var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
					<h2 class="wp-block-heading" style="margin-bottom: var(--wp--preset--spacing--50); font-size: 2rem; font-weight: 700;">
						<?php echo esc_html( tipress_pll__( 'Врачи специализации' ) ); ?>
					</h2>
					
					<div class="doctors-list" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--wp--preset--spacing--50);">
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

