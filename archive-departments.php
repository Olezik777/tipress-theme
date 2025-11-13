<?php
/**
 * Archive template for the departments custom post type.
 *
 * @package Tipress
 */

get_header();
?>

<main id="primary" class="site-main archive-departments">
	<div class="wp-block-group" style="max-width:1100px;margin:0 auto;padding:var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
		<div class="wp-block-columns reverse-mobile">
			<div class="wp-block-column" style="flex-basis:25%;padding-right:12px;">
				<?php get_sidebar(); ?>
			</div>
			<div class="wp-block-column" style="flex-basis:75%;">
				<header class="page-header" style="border-left:3px solid var(--wp--preset--color--base);padding-left:16px;margin-bottom:var(--wp--preset--spacing--40);">
					<?php
					the_archive_title( '<h1 class="page-title" style="text-transform:uppercase;font-style:normal;font-weight:700;">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header>

				<?php if ( have_posts() ) : ?>
					<div class="post-list">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'departments' );

						endwhile;

						the_posts_pagination(
							[
								'prev_text' => esc_html__( 'Назад', 'tipress' ),
								'next_text' => esc_html__( 'Вперед', 'tipress' ),
							]
						);
						?>
					</div>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
?>
