<?php
/**
 * The header for the classic theme structure.
 *
 * @package Tipress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();

$theme_uri = get_stylesheet_directory_uri();
?>
<header id="masthead" class="site-header">
	<div class="wp-block-group has-baige-background-color has-background site-header__inner" style="padding-top:5px;padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
		<div class="wp-block-group alignwide" style="display:flex;flex-wrap:nowrap;justify-content:space-between;align-items:center">
			<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;align-items:center">
				<div class="site-branding">
					<?php
					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
						the_custom_logo();
					} else {
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="custom-logo-link">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/mini-icons.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						</a>
						<?php
					}
					?>
				</div>

				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);display:flex;flex-direction:column;gap:0">
					<div class="wp-block-spacer" aria-hidden="true" style="height:18px"></div>
					<p class="has-black-color has-text-color" style="font-size:32px;font-style:normal;font-weight:600;line-height:1;text-transform:uppercase"><?php bloginfo( 'name' ); ?></p>
					<p style="font-style:normal;font-weight:600;text-transform:uppercase"><?php esc_html_e( 'Официальный сайт', 'tipress' ); ?></p>
					<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:8px;align-items:center">
						<figure class="wp-block-image size-full" style="margin:0">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/mini-icons.png' ); ?>" alt="">
						</figure>
						<p class="has-text-color" style="color:#d22f1e;font-size:12px;margin:0">
							<?php esc_html_e( 'Израиль, Тель-Авив, ул. Вайцман 14', 'tipress' ); ?>
						</p>
					</div>
				</div>
			</div>
			<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Основное меню', 'tipress' ); ?>">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="menu-toggle__icon" aria-hidden="true"></span>
					<span class="menu-toggle__label"><?php esc_html_e( 'Меню', 'tipress' ); ?></span>
				</button>
				<?php
				wp_nav_menu(
					[
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => false,
					]
				);
				?>
			</nav>
		</div>
	</div>
</header>
<div id="content" class="site-content">

