<?php
/**
 * Page content template.
 *
 * @package Tipress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-entry' ); ?>>
	<header class="entry-header" style="border-left:3px solid var(--wp--preset--color--base);padding-left:16px;margin-bottom:var(--wp--preset--spacing--40);">
		<?php the_title( '<h1 class="entry-title" style="text-transform:uppercase;font-style:normal;font-weight:700;">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<?php if ( current_user_can( 'edit_post', get_the_ID() ) ) : ?>
		<footer class="entry-footer">
			<?php edit_post_link( esc_html__( 'Редактировать', 'tipress' ), '<span class="edit-link">', '</span>' ); ?>
		</footer>
	<?php endif; ?>
</article>
