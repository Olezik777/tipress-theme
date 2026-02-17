<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Tipress
 */

if ( is_active_sidebar( 'primary-sidebar' ) ) {
	?>
	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'primary-sidebar' ); ?>
	</aside>
	<?php
	return;
}

$theme_uri = get_stylesheet_directory_uri();
$lang      = function_exists( 'pll_current_language' ) ? pll_current_language() : '';

// URL helpers (с Polylang переводами, если доступны)
$about_url = function_exists( 'tipress_get_first_existing_page_url' )
	? tipress_get_first_existing_page_url( [ 'o-top-ichilov', 'about', 'about-us' ], $lang )
	: home_url( '/o-top-ichilov/' );
$howto_url = function_exists( 'tipress_get_first_existing_page_url' )
	? tipress_get_first_existing_page_url( [ 'kak-k-nam-priehat', 'how-to-get', 'how-to-get-here' ], $lang )
	: home_url( '/kak-k-nam-priehat/' );
$faq_url = function_exists( 'tipress_get_first_existing_page_url' )
	? tipress_get_first_existing_page_url( [ 'voprosy-otvety', 'faq', 'questions-answers' ], $lang )
	: home_url( '/faq/' );
$imta_url = function_exists( 'tipress_get_page_url_by_slug' )
	? tipress_get_page_url_by_slug( 'imta', $lang )
	: home_url( '/imta/' );

// Text helper (Polylang strings if registered)
$t = function( $s ) {
	if ( function_exists( 'tipress_pll__' ) ) {
		return tipress_pll__( $s );
	}
	return $s;
};
?>

<aside id="secondary" class="widget-area default-sidebar">
	<?php get_search_form(); ?>

	<div class="sidebar-links" style="margin-top:30px;margin-bottom:30px">
		<div class="sidebar-link-item" style="border-top:1px solid #d5d5d5;padding:4px 0;display:flex;align-items:center;justify-content:space-between">
			<p class="has-dark-color has-text-color" style="margin:0"><a href="<?php echo esc_url( $about_url ); ?>"><?php echo esc_html( $t( 'О нас' ) ); ?></a></p>
			<figure class="wp-block-image size-full" style="margin:0">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/list1.png' ); ?>" alt="">
			</figure>
		</div>
		<div class="sidebar-link-item" style="border-top:1px solid #d5d5d5;padding:4px 0;display:flex;align-items:center;justify-content:space-between">
			<p class="has-dark-color has-text-color" style="margin:0"><a href="<?php echo esc_url( $howto_url ); ?>"><?php echo esc_html( $t( 'Как к нам приехать?' ) ); ?></a></p>
			<figure class="wp-block-image size-full" style="margin:0">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/list1.png' ); ?>" alt="">
			</figure>
		</div>
		<div class="sidebar-link-item" style="border-top:1px solid #d5d5d5;padding:4px 0;display:flex;align-items:center;justify-content:space-between">
			<p class="has-dark-color has-text-color" style="margin:0"><a href="<?php echo esc_url( $faq_url ); ?>"><?php echo esc_html( $t( 'Вопросы - ответы' ) ); ?></a></p>
			<figure class="wp-block-image size-full" style="margin:0">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/list1.png' ); ?>" alt="">
			</figure>
		</div>
	</div>

	<figure class="wp-block-image aligncenter size-full">
		<a href="<?php echo esc_url( $imta_url ); ?>">
			<img src="<?php echo esc_url( $theme_uri . '/assets/images/certificate_top-ichilov-int_sidebar.jpg' ); ?>" alt="">
		</a>
	</figure>

	<div class="sidebar-section doctors-section" style="border-left:3px solid var(--wp--preset--color--base);padding-left:16px;margin-top:24px;margin-bottom:24px">
		<h2 class="wp-block-heading" style="margin:0"><strong><?php echo esc_html( $t( 'ВРАЧИ ОТДЕЛЕНИЯ' ) ); ?></strong></h2>
	</div>

	<div class="wp-block-group has-border-color has-contrast-border-color contact-box" style="border:2px solid currentColor;border-radius:12px;padding:20px;margin-top:24px">
		<div class="wp-block-group" style="display:flex;flex-direction:column;gap:16px">
			<a class="wp-block-hyperlink-group" href="tel:+972528780569">
				<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:12px;align-items:center">
					<figure class="wp-block-image size-full is-resized" style="margin:0">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/whatsapp-social.png' ); ?>" alt="" width="36" height="36">
					</figure>
					<div class="wp-block-group" style="display:flex;flex-direction:column;gap:0">
						<p class="has-text-color" style="color:#00a541;font-size:12px;margin:0"><?php echo esc_html( $t( 'Whatsapp' ) ); ?></p>
						<p class="has-dark-color has-text-color" style="margin:0">+972-528780569</p>
					</div>
				</div>
			</a>
			<a class="wp-block-hyperlink-group" href="viber://chat?number=%2B972528780569">
				<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:12px;align-items:center">
					<figure class="wp-block-image size-full is-resized" style="margin:0">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/viber-social.png' ); ?>" alt="" width="36" height="36">
					</figure>
					<div class="wp-block-group" style="display:flex;flex-direction:column;gap:0">
						<p class="has-text-color" style="color:#7d3daf;font-size:12px;margin:0"><?php echo esc_html( $t( 'Viber' ) ); ?></p>
						<p class="has-dark-color has-text-color" style="margin:0">+972-528780569</p>
					</div>
				</div>
			</a>
			<a class="wp-block-hyperlink-group" href="mailto:doctors@topichilov.com">
				<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:12px;align-items:center">
					<figure class="wp-block-image size-full is-resized" style="margin:0">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/mail-social.png' ); ?>" alt="" width="36" height="36">
					</figure>
					<div class="wp-block-group" style="display:flex;flex-direction:column;gap:0">
						<p class="has-dark-color has-text-color" style="font-size:12px;margin:0"><?php echo esc_html( $t( 'Mail' ) ); ?></p>
						<p class="has-dark-color has-text-color" style="margin:0"><a href="mailto:doctors@topichilov.com">doctors@topichilov.com</a></p>
					</div>
				</div>
			</a>
		</div>
	</div>
</aside>

