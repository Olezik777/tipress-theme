<?php
/**
 * Template for displaying single department entries.
 *
 * @package Tipress
 */

get_header();

// Определяем текущий язык
$current_lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'ru';
$is_english = ( $current_lang === 'en' );
?>

<main id="primary" class="site-main single-departments">
	<div class="wp-block-group single-template-container">
		<?php tipress_display_breadcrumbs(); ?>
		<div class="ti-columns reverse-mobile single-template-columns">
			<?php if ( ! $is_english ) : ?>
			<div class="ti-column single-template-sidebar">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>
			<div class="ti-column single-template-content"<?php echo $is_english ? ' style="flex-basis: 100%;"' : ''; ?>>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-department' ); ?>>
						<?php if ( ! $is_english ) : ?>
						<header class="entry-header single-template-header">
							<?php the_title( '<h1 class="entry-title" style="text-transform:uppercase;font-style:normal;font-weight:700;">', '</h1>' ); ?>
						</header>
						<?php endif; ?>

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
