<?php
/**
 * Front page template.
 *
 * @package Tipress
 */

global $post;
get_header();

$theme_uri = get_stylesheet_directory_uri();
?>

<main id="primary" class="site-main front-page">
	<section class="front-hero">
		<div class="wp-block-group" style="max-width:1100px;margin:0 auto;">
			<div class="wp-block-cover is-light has-parallax" style="background-image:url(<?php echo esc_url( $theme_uri . '/assets/images/hero-banner.jpg' ); ?>);background-position:50% 50%;">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
				<div class="wp-block-cover__inner-container">
					<div class="wp-block-columns">
						<div class="wp-block-column" style="flex-basis:50%">
							<p class="has-text-align-left has-large-font-size"><?php esc_html_e( 'Лечение пациентов в крупнейшей клинике Израиля', 'tipress' ); ?></p>
							<p class="has-text-align-left has-xx-large-font-size"><?php esc_html_e( 'Ихилов (Тель-Авив)', 'tipress' ); ?></p>
						</div>
						<div class="wp-block-column" style="flex-basis:50%"></div>
					</div>
				</div>
			</div>
			<h1 class="front-page-title" style="text-transform:uppercase;font-style:normal;font-weight:700;">
				<?php the_title(); ?>
			</h1>
		</div>
	</section>

	<section class="front-content">
		<div class="wp-block-group" style="max-width:1100px;margin:0 auto;padding:var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
			<?php
			while ( have_posts() ) :
				the_post();

				the_content();
			endwhile;
			?>
		</div>
	</section>
</main>

<?php
get_footer();
