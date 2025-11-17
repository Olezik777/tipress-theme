<?php
/**
 * Template for displaying single doctor entries.
 *
 * @package Tipress
 */

get_header();
?>

<main id="primary" class="site-main single-doctors">
	<div class="wp-block-group single-template-container">
		<div class="ti-columns reverse-mobile single-template-columns">
			<div class="ti-column single-template-sidebar">
				<?php get_sidebar(); ?>
			</div>
			<div class="ti-column single-template-content">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-doctor' ); ?>>
						<header class="entry-header single-template-header">
							<?php the_title( '<h1 class="entry-title" style="text-transform:uppercase;font-style:normal;font-weight:700;">', '</h1>' ); ?>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div>

						<footer class="entry-footer">
							<?php wp_link_pages(); ?>
						</footer>
					</article>
					<?php
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
?>
