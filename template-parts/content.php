<?php
/**
 * Default content template used in archive and index loops.
 *
 * @package Tipress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'loop-item' ); ?> style="margin-bottom:var(--wp--preset--spacing--50);">
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
