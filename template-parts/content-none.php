<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package Tipress
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Ничего не найдено', 'tipress' ); ?></h2>
	</header>

	<div class="page-content">
		<p><?php esc_html_e( 'К сожалению, ничего не найдено по вашему запросу.', 'tipress' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
