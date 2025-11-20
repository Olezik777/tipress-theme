<?php
/**
 * Doctors archive loop item.
 *
 * @package Tipress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'loop-item loop-item--doctor' ); ?> style="margin-bottom:var(--wp--preset--spacing--50);display:flex;gap:24px;align-items:flex-start;">
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="loop-thumb" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'medium' ); ?>
		</a>
	<?php endif; ?>
	<div class="loop-body">
		<?php the_title( '<div class="entry-title" style="margin-top:0"><a href="' . esc_url( get_permalink() ) . '">', '</a></div>' ); ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
