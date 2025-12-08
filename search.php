<?php
/**
 * The template for displaying search results pages.
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
				<h1 class="page-title">
					<?php
					$search_query = get_search_query();
					// Используем строку из Breadcrumbs, так как она уже зарегистрирована там
					printf(
						tipress_pll__( 'Результаты поиска для: %s' ),
						'<span class="search-query">' . esc_html( $search_query ) . '</span>'
					);
					?>
				</h1>
				<?php
				global $wp_query;
				$found_posts = $wp_query->found_posts;
				if ( $found_posts > 0 ) {
					printf(
						'<p class="search-results-count">%s</p>',
						esc_html( sprintf( tipress_pll__( 'Найдено результатов: %d' ), $found_posts ) )
					);
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
			<header class="page-header">
				<h1 class="page-title">
					<?php
					$search_query = get_search_query();
					if ( ! empty( $search_query ) ) {
						printf(
							tipress_pll__( 'Результаты поиска для: %s' ),
							'<span class="search-query">' . esc_html( $search_query ) . '</span>'
						);
					} else {
						echo esc_html( tipress_pll__( 'Результаты поиска' ) );
					}
					?>
				</h1>
			</header>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>

<?php
get_sidebar();
get_footer();

