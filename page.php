<?php
/**
 * The template for displaying all pages.
 *
 * @package Tipress
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="wp-block-group" style="max-width:1100px;margin:0 auto;padding:var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
		<?php tipress_display_breadcrumbs(); ?>
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
</main>

<?php
get_sidebar();
get_footer();
