<?php
/**
 * Archive template for the doctors custom post type.
 *
 * @package Tipress
 */

get_header();
?>

<main id="primary" class="site-main archive-doctors">
	<div class="wp-block-group single-template-container">
		<div class="ti-columns reverse-mobile single-template-columns">
			<div class="ti-column single-template-sidebar">
				<?php get_sidebar(); ?>
			</div>
			<div class="ti-column single-template-content">
				<header class="page-header single-template-header">
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

							get_template_part( 'template-parts/content', 'doctors' );

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
