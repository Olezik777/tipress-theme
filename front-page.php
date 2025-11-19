<?php
/**
 * Front page template.
 *
 * @package Tipress
 */

global $post;
get_header();

$theme_uri = get_stylesheet_directory_uri();
?>

<main id="primary" class="site-main front-page">

	<section class="front-content">
		<div class="wp-block-group" style="max-width:1200px;margin:0 auto;padding:var(--wp--preset--spacing--50) var(--wp--preset--spacing--30);">
			<?php
			while ( have_posts() ) :
				the_post();

				the_content();
			endwhile;
			?>
		</div>
	</section>
</main>

<?php
get_footer();
