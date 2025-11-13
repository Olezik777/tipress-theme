<?php
/**
 * Post content template for loop contexts.
 *
 * @package Tipress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'loop-item loop-item--post' ); ?> style="margin-bottom:var(--wp--preset--spacing--50);">
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="entry-meta" style="font-size:14px;color:#696b6e;">
			<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
		</div>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
