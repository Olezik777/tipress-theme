<?php
/**
 * The template for displaying all pages.
 *
 * @package Tipress
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="wp-block-group single-template-container">
		<?php tipress_display_breadcrumbs(); ?>
		<div class="ti-columns reverse-mobile single-template-columns">
			<div class="ti-column single-template-sidebar">
				<?php get_sidebar(); ?>
			</div>
			<div class="ti-column single-template-content">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile;
				?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
