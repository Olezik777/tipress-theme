<?php
/**
 * The header template with simplified structure and custom classes.
 *
 * @package Tipress
 */

$theme_uri = get_stylesheet_directory_uri();
$is_rtl    = is_rtl();
$current_lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'ru';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<style id="ti-header-styles">
		/* Header Critical Styles - Inline for faster rendering */
		.ti-header {
			background: #fff;
			position: relative;
			z-index: 100;
		}
		.ti-header__top-bar {
			background: #d4a574;
			height: 4px;
			width: 100%;
		}
		.ti-header__container {
			max-width: 1400px;
			margin: 0 auto;
			padding: 12px 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 20px;
			flex-wrap: wrap;
		}
		.ti-header__left {
			display: flex;
			flex-direction: column;
			gap: 8px;
			min-width: 0;
		}
		.ti-header__lang-switcher {
			display: inline-flex;
			align-items: center;
			gap: 6px;
			padding: 6px 12px;
			background: #f5f5f5;
			border-radius: 6px;
			border: none;
			cursor: pointer;
			font-size: 14px;
			text-decoration: none;
			color: #333;
			transition: background 0.2s;
		}
		.ti-header__lang-switcher:hover {
			background: #e8e8e8;
		}
		.ti-header__lang-flag {
			width: 20px;
			height: 14px;
			object-fit: cover;
			border-radius: 2px;
		}
		.ti-header__search {
			display: flex;
			align-items: center;
			gap: 8px;
			padding: 8px 12px;
			background: #fff;
			border: 1px solid #4a9fd8;
			border-radius: 6px;
			text-decoration: none;
			color: #333;
			font-size: 14px;
			transition: border-color 0.2s;
		}
		.ti-header__search:hover {
			border-color: #2a7fc8;
		}
		.ti-header__search-icon {
			width: 16px;
			height: 16px;
			flex-shrink: 0;
		}
		.ti-header__center {
			display: flex;
			align-items: center;
			gap: 16px;
			flex: 1;
			justify-content: center;
			min-width: 0;
		}
		.ti-header__phone {
			font-size: 18px;
			font-weight: 700;
			color: #000;
			white-space: nowrap;
		}
		.ti-header__phone-link {
			display: inline-flex;
			align-items: center;
			text-decoration: none;
			color: inherit;
		}
		.ti-header__call-icon {
			width: 40px;
			height: 40px;
			background: #2a7fc8;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			transition: background 0.2s;
			flex-shrink: 0;
		}
		.ti-header__call-icon:hover {
			background: #1e6ba8;
		}
		.ti-header__call-icon svg {
			width: 20px;
			height: 20px;
			fill: #fff;
		}
		.ti-header__nav-icons {
			display: flex;
			gap: 12px;
			align-items: center;
		}
		.ti-header__nav-item {
			display: flex;
			flex-direction: column;
			align-items: center;
			gap: 4px;
			text-decoration: none;
			color: #333;
			font-size: 12px;
			transition: opacity 0.2s;
		}
		.ti-header__nav-item:hover {
			opacity: 0.7;
		}
		.ti-header__nav-icon {
			width: 32px;
			height: 32px;
			background-size: contain;
			background-repeat: no-repeat;
			background-position: center;
		}
		.ti-header__right {
			display: flex;
			align-items: center;
			gap: 16px;
			min-width: 0;
		}
		.ti-header__brand {
			display: flex;
			flex-direction: column;
			gap: 4px;
		}
		.ti-header__title {
			font-size: 28px;
			font-weight: 700;
			color: #000;
			line-height: 1.2;
			margin: 0;
		}
		.ti-header__address {
			display: flex;
			align-items: center;
			gap: 4px;
			font-size: 12px;
			color: #d22f1e;
			margin: 0;
		}
		.ti-header__address-icon {
			width: 14px;
			height: 14px;
			flex-shrink: 0;
		}
		.ti-header__logo {
			width: 80px;
			height: auto;
			flex-shrink: 0;
		}
		.ti-header__logo img {
			width: 100%;
			height: auto;
			display: block;
		}
		/* RTL Support */
		[dir="rtl"] .ti-header__container {
			flex-direction: row-reverse;
		}
		[dir="rtl"] .ti-header__left {
			align-items: flex-end;
		}
		[dir="rtl"] .ti-header__right {
			align-items: flex-start;
		}
		[dir="rtl"] .ti-header__brand {
			align-items: flex-end;
		}
		[dir="rtl"] .ti-header__address {
			flex-direction: row-reverse;
		}
		/* Mobile Responsive */
		@media (max-width: 992px) {
			.ti-header__container {
				flex-wrap: wrap;
				padding: 10px 15px;
			}
			.ti-header__center {
				order: 3;
				width: 100%;
				justify-content: space-between;
				margin-top: 10px;
			}
			.ti-header__nav-icons {
				gap: 8px;
			}
			.ti-header__nav-item {
				font-size: 11px;
			}
			.ti-header__nav-icon {
				width: 28px;
				height: 28px;
			}
			.ti-header__title {
				font-size: 24px;
			}
		}
		@media (max-width: 768px) {
			.ti-header__container {
				flex-direction: column;
				align-items: stretch;
			}
			.ti-header__left,
			.ti-header__center,
			.ti-header__right {
				width: 100%;
			}
			.ti-header__center {
				order: 2;
				margin-top: 0;
			}
			.ti-header__right {
				order: 1;
				justify-content: space-between;
			}
			.ti-header__phone {
				font-size: 16px;
			}
		}
	</style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="ti-header">
	<div class="ti-header__top-bar"></div>
	<div class="ti-header__container">
		<!-- Left Section: Language & Search -->
		<div class="ti-header__left">
			<?php if ( function_exists( 'pll_the_languages' ) ) : ?>
				<?php
				$languages = pll_the_languages( [ 'raw' => 1, 'hide_if_empty' => 0 ] );
				$current  = pll_current_language();
				$current_lang_data = isset( $languages[ $current ] ) ? $languages[ $current ] : null;
				?>
				<button class="ti-header__lang-switcher" type="button" aria-label="<?php esc_attr_e( 'Выбрать язык', 'tipress' ); ?>">
					<?php if ( $current_lang_data && ! empty( $current_lang_data['flag'] ) ) : ?>
						<img src="<?php echo esc_url( $current_lang_data['flag'] ); ?>" alt="" class="ti-header__lang-flag">
					<?php endif; ?>
					<span><?php echo esc_html( $current_lang_data ? $current_lang_data['name'] : strtoupper( $current ) ); ?></span>
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
						<polyline points="3,5 6,8 9,5"></polyline>
					</svg>
				</button>
				<div class="ti-header__lang-dropdown" style="display:none;position:absolute;background:#fff;border:1px solid #ddd;border-radius:6px;padding:8px;z-index:1000;margin-top:40px;">
					<?php foreach ( $languages as $lang ) : ?>
						<a href="<?php echo esc_url( $lang['url'] ); ?>" class="ti-header__lang-item" style="display:flex;align-items:center;gap:8px;padding:6px 12px;text-decoration:none;color:#333;">
							<?php if ( ! empty( $lang['flag'] ) ) : ?>
								<img src="<?php echo esc_url( $lang['flag'] ); ?>" alt="" style="width:20px;height:14px;">
							<?php endif; ?>
							<span><?php echo esc_html( $lang['name'] ); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			
			<a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" class="ti-header__search">
				<svg class="ti-header__search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<circle cx="11" cy="11" r="8"></circle>
					<path d="m21 21-4.35-4.35"></path>
				</svg>
				<span><?php esc_html_e( 'Поиск', 'tipress' ); ?></span>
			</a>
		</div>

		<!-- Center Section: Phone & Navigation Icons -->
		<div class="ti-header__center">
			<a href="tel:033760386" class="ti-header__phone-link">
				<span class="ti-header__phone">03-3760386</span>
			</a>
			<a href="tel:033760386" class="ti-header__call-icon" aria-label="<?php esc_attr_e( 'Позвонить', 'tipress' ); ?>">
				<svg viewBox="0 0 24 24">
					<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
				</svg>
			</a>
			<nav class="ti-header__nav-icons" aria-label="<?php esc_attr_e( 'Быстрая навигация', 'tipress' ); ?>">
				<a href="<?php echo esc_url( home_url( '/contactus/' ) ); ?>" class="ti-header__nav-item">
					<div class="ti-header__nav-icon" style="background-image:url(<?php echo esc_url( $theme_uri . '/assets/images/menu-icons.png' ); ?>);background-position:0 0;"></div>
					<span><?php esc_html_e( 'Связаться', 'tipress' ); ?></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/departments/' ) ); ?>" class="ti-header__nav-item">
					<div class="ti-header__nav-icon" style="background-image:url(<?php echo esc_url( $theme_uri . '/assets/images/menu-icons.png' ); ?>);background-position:-82px 0;"></div>
					<span><?php esc_html_e( 'Отделения', 'tipress' ); ?></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>" class="ti-header__nav-item">
					<div class="ti-header__nav-icon" style="background-image:url(<?php echo esc_url( $theme_uri . '/assets/images/menu-icons.png' ); ?>);background-position:-164px 0;"></div>
					<span><?php esc_html_e( 'Врачи', 'tipress' ); ?></span>
				</a>
			</nav>
		</div>

		<!-- Right Section: Brand & Logo -->
		<div class="ti-header__right">
			<div class="ti-header__brand">
				<h1 class="ti-header__title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="text-decoration:none;color:inherit;">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<p class="ti-header__address">
					<svg class="ti-header__address-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
						<circle cx="12" cy="10" r="3"></circle>
					</svg>
					<span><?php esc_html_e( 'Тель-Авив, ул. Вайцман 14', 'tipress' ); ?></span>
				</p>
			</div>
			<div class="ti-header__logo">
				<?php
				if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/mini-icons.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</header>

<div id="content" class="site-content">
