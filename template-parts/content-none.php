<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package Tipress
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php echo esc_html( tipress_pll__( 'Ничего не найдено' ) ); ?></h2>
	</header>

	<div class="page-content">
		<p><?php echo esc_html( tipress_pll__( 'К сожалению, ничего не найдено по вашему запросу.' ) ); ?></p>
		<p><?php echo esc_html( tipress_pll__( 'Попробуйте изменить поисковый запрос или использовать другие ключевые слова.' ) ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
