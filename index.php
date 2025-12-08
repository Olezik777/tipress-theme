<?php
/**
 * The main template file.
 *
 * @package Tipress
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="wp-block-group" style="max-width:1100px;margin:0 auto;padding:var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
		<?php tipress_display_breadcrumbs(); ?>
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
				if ( is_home() && ! is_front_page() ) {
					printf(
						'<h1 class="page-title">%s</h1>',
						esc_html( single_post_title( '', false ) )
					);
				} else {
					?>
					<h1 class="page-title"><?php echo esc_html( tipress_pll__( 'Последние публикации' ) ); ?></h1>
					<?php
				}
				?>
			</header>

			<div class="post-list">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_pagination(
					[
						'prev_text' => esc_html( tipress_pll__( 'Назад' ) ),
						'next_text' => esc_html( tipress_pll__( 'Вперед' ) ),
					]
				);
				?>
			</div>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>

<?php
get_sidebar();
get_footer();

