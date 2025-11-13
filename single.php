<?php
/**
 * The template for displaying single posts.
 *
 * @package Tipress
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="wp-block-group" style="max-width:1100px;margin:0 auto;padding:var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
		<div class="wp-block-columns reverse-mobile">
			<div class="wp-block-column" style="flex-basis:25%;padding-right:12px;">
				<?php get_sidebar(); ?>
			</div>
			<div class="wp-block-column" style="flex-basis:75%;">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header" style="border-left:3px solid var(--wp--preset--color--base);padding-left:16px;margin-bottom:var(--wp--preset--spacing--40);">
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
