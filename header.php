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
		/* Global Font Family */
		html, body {
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
			margin: 0;
		}
		:root {
                --wp--preset--aspect-ratio--square: 1;
                --wp--preset--aspect-ratio--4-3: 4/3;
                --wp--preset--aspect-ratio--3-4: 3/4;
                --wp--preset--aspect-ratio--3-2: 3/2;
                --wp--preset--aspect-ratio--2-3: 2/3;
                --wp--preset--aspect-ratio--16-9: 16/9;
                --wp--preset--aspect-ratio--9-16: 9/16;
                --wp--preset--color--black: #000000;
                --wp--preset--color--cyan-bluish-gray: #abb8c3;
                --wp--preset--color--white: #ffffff;
                --wp--preset--color--pale-pink: #f78da7;
                --wp--preset--color--vivid-red: #ff0000;
                --wp--preset--color--luminous-vivid-orange: #ff6900;
                --wp--preset--color--luminous-vivid-amber: #fcb900;
                --wp--preset--color--light-green-cyan: #7bdcb5;
                --wp--preset--color--vivid-green-cyan: #00d084;
                --wp--preset--color--pale-cyan-blue: #8ed1fc;
                --wp--preset--color--vivid-cyan-blue: #0693e3;
                --wp--preset--color--vivid-purple: #9b51e0;
                --wp--preset--color--base: #c20f0f;
                --wp--preset--color--dark: #000000;
                --wp--preset--color--contrast: #018be6;
                --wp--preset--color--green: #97bf0d;
                --wp--preset--color--baige: #f5f8ff;
                --wp--preset--color--green-light: #22b6af;
                --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);
                --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);
                --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);
                --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);
                --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);
                --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);
                --wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);
                --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);
                --wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);
                --wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);
                --wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);
                --wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);
                --wp--preset--font-size--small: .825rem;
                --wp--preset--font-size--medium: clamp(0.875rem, 0.875rem + ((1vw - 0.2rem) * 0.256), 1rem);
                --wp--preset--font-size--large: clamp(1.119rem, 1.119rem + ((1vw - 0.2rem) * 1.294), 1.75rem);
                --wp--preset--font-size--x-large: clamp(1.378rem, 1.378rem + ((1vw - 0.2rem) * 1.789), 2.25rem);
                --wp--preset--font-size--xx-large: clamp(1.624rem, 1.624rem + ((1vw - 0.2rem) * 2.31), 2.75rem);
                --wp--preset--font-family--system-font: Arial, "Helvetica Neue", Helvetica, sans-serif;
                --wp--preset--spacing--20: 0.25rem;
                --wp--preset--spacing--30: 0.5rem;
                --wp--preset--spacing--40: 0.75rem;
                --wp--preset--spacing--50: 1rem;
                --wp--preset--spacing--60: 1.25rem;
                --wp--preset--spacing--70: 1.5rem;
                --wp--preset--spacing--80: 1.75rem;
                --wp--preset--spacing--90: 2rem;
                --wp--preset--spacing--100: 2.25rem;
                --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
                --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
                --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
                --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
                --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
                --wp--preset--shadow--sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                --wp--preset--shadow--md: 0 4px 10px 0 rgba( 0, 0, 0, 0.3 );
                --wp--preset--shadow--lg: 0 8px 15px 0 rgba( 0, 0, 0, 0.3 );
            }

		:root :where(.is-layout-flow) > * {
			margin-block-start: var(--wp--preset--spacing--40);
			margin-block-end: 0;
		}
		/* Header Critical Styles - Inline for faster rendering */
		h1 { margin-top: 0; }
		.ti-header {
			background: #fff;
			position: relative;
			z-index: 100;
			box-shadow: 0 0 12px #d3d3d3;
		}

		.ti-header__container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 5px 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 20px;
			flex-wrap: wrap;
		}
		.ti-header__left {
			display: flex;
			flex-direction: row;
			gap: 8px;
			min-width: 0;
			position: relative;
			order: 1;
		}
		.ti-header__lang-switcher {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			width: 40px;
			height: 40px;
			background: #f5f5f5;
			border-radius: 6px;
			border: none;
			cursor: pointer;
			text-decoration: none;
			color: #333;
			transition: background 0.2s;
			position: relative;
		}
		.ti-header__lang-switcher:hover {
			background: #e8e8e8;
		}
		.ti-header__lang-flag {
			width: 24px;
			height: 18px;
			object-fit: cover;
			border-radius: 2px;
		}
		.ti-header__lang-switcher span {
			display: none;
		}
		.ti-header__lang-dropdown {
			position: absolute;
			top: calc(100% + 8px);
			right: 0;
			background: #fff;
			border: 1px solid #ddd;
			border-radius: 6px;
			padding: 8px;
			z-index: 1000;
			min-width: 150px;
			max-width: calc(100vw - 40px);
			box-shadow: 0 4px 12px rgba(0,0,0,0.1);
			opacity: 0;
			visibility: hidden;
			transform: translateY(-10px);
			transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
		}
		.ti-header__lang-dropdown.is-open {
			opacity: 1;
			visibility: visible;
			transform: translateY(0);
		}
		.ti-header__lang-item {
			display: flex;
			align-items: center;
			gap: 8px;
			padding: 6px 12px;
			text-decoration: none;
			color: #333;
			border-radius: 4px;
			transition: background 0.2s;
		}
		.ti-header__lang-item:hover {
			background: #f5f5f5;
		}
		.ti-header__lang-item .ti-header__lang-flag {
			width: 20px;
			height: 14px;
		}
		.ti-header__search {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			width: 40px;
			height: 40px;
			background: #fff;
			border: 1px solid #4a9fd8;
			border-radius: 6px;
			text-decoration: none;
			color: #333;
			transition: border-color 0.2s;
			position: relative;
		}
		.ti-header__search:hover {
			border-color: #2a7fc8;
		}
		.ti-header__search-icon {
			width: 20px;
			height: 20px;
			flex-shrink: 0;
		}
		.ti-header__search span {
			display: none;
		}
		.ti-header__search-form {
			position: absolute;
			top: calc(100% + 8px);
			right: 0;
			background: #fff;
			border: 1px solid #ddd;
			border-radius: 6px;
			padding: 12px;
			z-index: 1000;
			min-width: 300px;
			max-width: calc(100vw - 40px);
			box-shadow: 0 4px 12px rgba(0,0,0,0.1);
			opacity: 0;
			visibility: hidden;
			transform: translateY(-10px);
			transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
		}
		.ti-header__search-form.is-open {
			opacity: 1;
			visibility: visible;
			transform: translateY(0);
		}
		.ti-header__search-form {
			display: flex;
			gap: 8px;
		}
		.ti-header__search-form input {
			flex: 1;
			padding: 8px 12px;
			border: 1px solid #ddd;
			border-radius: 4px;
			font-size: 14px;
			outline: none;
			transition: border-color 0.2s;
		}
		.ti-header__search-form input:focus {
			border-color: #4a9fd8;
		}
		.ti-header__search-form button {
			padding: 8px 16px;
			background: #4a9fd8;
			color: #fff;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 14px;
			transition: background 0.2s;
		}
		.ti-header__search-form button:hover {
			background: #2a7fc8;
		}
		.ti-header__center {
			display: flex;
			align-items: center;
			gap: 16px;
			flex: 1;
			justify-content: center;
			min-width: 0;
		}
		.ti-header__phone-wrapper {
			display: flex;
			align-items: center;
			gap: 8px;
		}
		.ti-header__phone {
			font-size: clamp(14px, 1.8vw, 18px);
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
			width: 30px;
			height: 30px;
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
			width: 17px;
			height: 17px;
			fill: #fff;
		}
		.ti-header__mobile-toggle {
			display: none;
			background: #d22f1e;
			border: none;
			width: 40px;
			height: 40px;
			border-radius: 4px;
			cursor: pointer;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			gap: 5px;
			padding: 0;
			transition: background 0.3s;
			z-index: 1001;
		}
		.ti-header__mobile-toggle:hover {
			background: #b01e0f;
		}
		.ti-header__mobile-toggle span {
			display: block;
			width: 20px;
			height: 3px;
			background: #fff;
			border-radius: 2px;
			transition: all 0.3s ease;
		}
		.ti-header__mobile-toggle.is-active span:nth-child(1) {
			transform: rotate(45deg) translate(7px, 7px);
		}
		.ti-header__mobile-toggle.is-active span:nth-child(2) {
			opacity: 0;
		}
		.ti-header__mobile-toggle.is-active span:nth-child(3) {
			transform: rotate(-45deg) translate(7px, -7px);
		}
		.ti-header__nav-menu {
			display: flex;
			gap: 12px;
			align-items: center;
		}
		.ti-header__menu-list {
			display: flex;
			gap: 12px;
			align-items: center;
			list-style: none;
			margin: 0;
			padding: 0;
		}
		.ti-header__menu-list li {
			margin: 0;
		}
		.ti-header__menu-list a {
			display: flex;
			flex-direction: column;
			align-items: center;
			gap: 4px;
			text-decoration: none;
			color: #333;
			font-size: clamp(12px, 1.5vw, 16px);
			transition: opacity 0.2s;
			text-transform: uppercase;
			font-weight: 600;
		}
		.ti-header__menu-list a:hover {
			opacity: 0.7;
		}
		.ti-header__menu-list .current-menu-item a {
			opacity: 0.7;
			font-weight: 600;
		}
		/* Mobile Sidebar Menu */
		.ti-header__mobile-menu {
			position: fixed;
			top: 0;
			left: -100%;
			width: 320px;
			max-width: 85vw;
			height: 100vh;
			background: #fff;
			box-shadow: 2px 0 15px rgba(0,0,0,0.15);
			z-index: 1000;
			overflow-y: auto;
			transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			padding: 80px 20px 20px;
		}
		.ti-header__mobile-menu.is-open {
			left: 0;
		}
		.ti-header__mobile-menu-overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0,0,0,0.6);
			z-index: 999;
			opacity: 0;
			visibility: hidden;
			transition: opacity 0.3s ease, visibility 0.3s ease;
			backdrop-filter: blur(2px);
		}
		.ti-header__mobile-menu-overlay.is-active {
			opacity: 1;
			visibility: visible;
		}
		.ti-header__mobile-menu-list {
			list-style: none;
			margin: 0;
			padding: 0;
		}
		.ti-header__mobile-menu-list li {
			margin: 0 0 4px 0;
		}
		.ti-header__mobile-menu-list a {
			display: block;
			padding: 14px 16px;
			text-decoration: none;
			color: #333;
			font-size: 16px;
			border-radius: 6px;
			transition: all 0.2s ease;
			font-weight: 500;
		}
		.ti-header__mobile-menu-list a:hover {
			background: #f5f5f5;
			color: #d22f1e;
			transform: translateX(4px);
		}
		.ti-header__mobile-menu-list .current-menu-item a {
			background: #fff5f5;
			color: #d22f1e;
			border-left: 3px solid #d22f1e;
			padding-left: 13px;
		}
		.ti-header__mobile-menu-list .sub-menu {
			list-style: none;
			margin: 0;
			padding: 0 0 0 20px;
		}
		.ti-header__mobile-menu-list .sub-menu a {
			font-size: 14px;
			padding: 10px 16px;
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
			font-size: clamp(20px, 2.5vw, 28px);
			font-weight: 700;
			color: #000;
			line-height: 1.2;
			margin: 0;
		}
		.ti-header__address {
			display: flex;
			align-items: center;
			gap: 4px;
			font-size: clamp(10px, 1.2vw, 12px);
			color: #d22f1e;
			margin: 0;
		}
		.ti-header__address-icon {
			width: 14px;
			height: 14px;
			flex-shrink: 0;
		}
		.ti-header__logo {
			width: 40px;
			height: auto;
			flex-shrink: 0;
		}
		.ti-header__logo img {
			width: 100%;
			height: auto;
			display: block;
		}
		/* LTR Support - Logo on left */
		.ti-header--ltr .ti-header__container {
			flex-direction: row;
		}
		.ti-header--ltr .ti-header__right {
			order: -1;
			flex-direction: row;
		}
		.ti-header--ltr .ti-header__right .ti-header__logo {
			order: -1;
			margin-right: 12px;
		}
		.ti-header--ltr .ti-header__right .ti-header__brand {
			order: 1;
		}
		/* RTL Support */
		.ti-header--rtl .ti-header__container {
			flex-direction: row-reverse;
		}
		.ti-header--rtl .ti-header__left {
			align-items: center;
			order: -1;
			flex-direction: row-reverse;
		}
		.ti-header--rtl .ti-header__phone-wrapper { order: 1; }
		/* Для RTL: при row-reverse порядок DOM элементов автоматически обращается */
		/* DOM: Language, Search, Phone -> Визуально: Phone, Search, Language */
		.ti-header--rtl .ti-header__right {
			align-items: flex-end;
			flex-direction: row-reverse;
		}
		.ti-header--rtl .ti-header__brand {
			align-items: flex-start;
		}
		.ti-header--rtl .ti-header__address {
			flex-direction: row-reverse;
		}
		.ti-header--rtl .ti-header__lang-dropdown {
			left: 0;
			right: auto;
		}
		.ti-header--rtl .ti-header__search-form {
			left: 0;
			right: auto;
		}
		.ti-header--rtl .ti-header__mobile-menu {
			left: auto;
			right: -100%;
		}
		.ti-header--rtl .ti-header__mobile-menu.is-open {
			right: 0;
		}
		.ti-header--rtl .ti-header__menu-list a { font-size: 18px; }

		.sticky-header .ti-header__logo { width: 30px;}
		.sticky-header .ti-header__title { font-size: 18px;}
		.sticky-header .ti-header__phone { font-size: 14px;}
		.sticky-header .ti-header__call-icon { width: 24px; height: 24px;}
		.sticky-header .ti-header__call-icon svg { width: 12px; height: 12px;}
		.sticky-header .ti-header__lang-switcher { width: 32px; height: 32px;}
		.sticky-header .ti-header__lang-switcher img { width: 16px; height: 16px;}
		.sticky-header .ti-header__lang-switcher span { font-size: 14px;}
		/* Tablet Responsive */
		@media (max-width: 1200px) {
			.ti-header__title {
				font-size: clamp(20px, 2.2vw, 26px);
			}
			.ti-header__phone {
				font-size: clamp(14px, 1.6vw, 17px);
			}
			.ti-header__menu-list a {
				font-size: clamp(12px, 1.3vw, 15px);
			}
		}
		@media (max-width: 992px) {
			.ti-header__container {
				flex-wrap: wrap;
				padding: 10px 15px;
			}
			.ti-header__nav-menu {
				gap: 8px;
			}
			.ti-header__menu-list {
				gap: 8px;
			}
			.ti-header__menu-list a {
				font-size: clamp(12px, 1.2vw, 14px);
			}
			.ti-header__title {
				font-size: clamp(18px, 2vw, 24px);
			}
		}
		/* Mobile Responsive */
		@media (max-width: 980px) {
			.ti-header__container {
				padding: 10px 15px;
				position: relative;
			}
			.ti-header__mobile-toggle {
				display: flex;
			}
			.ti-header__nav-menu {
				display: none;
			}
			/* LTR Mobile Layout: Logo left, Phone+Lang center, Toggle right */
			.ti-header--ltr .ti-header__container {
				justify-content: space-between;
			}
			.ti-header--ltr .ti-header__right {
				order: 1;
				width: auto;
				margin-top: 0;
				justify-content: flex-start;
				flex-shrink: 0;
			}
			.ti-header--ltr .ti-header__left {
				order: 2;
				flex: 0 1 auto;
				justify-content: flex-end;
				width: auto;
				margin-top: 0;
				gap: 12px;
				flex-shrink: 0;
				margin-right: 12px;
			}
			.ti-header--ltr .ti-header__left .ti-header__search {
				display: none;
			}
			.ti-header--ltr .ti-header__center {
				order: 3;
				width: auto;
				margin-top: 0;
				justify-content: flex-end;
				flex-shrink: 0;
			}
			.ti-header--ltr .ti-header__mobile-toggle {
				margin-left: 12px;
			}
			/* RTL Mobile Layout: Keep existing structure */
			.ti-header--rtl .ti-header__mobile-toggle {
				display: flex;
				order: 0;
				margin-right: 12px;
			}
			.ti-header--rtl .ti-header__left {
				order: 2;
				flex-direction: row;
				gap: 8px;
				margin-top: 10px;
			}
			.ti-header--rtl .ti-header__center {
				order: 1;
				width: auto;
				margin-top: 0;
				flex: 1;
				justify-content: flex-end;
				align-items: center;
			}
			.ti-header--rtl .ti-header__right {
				order: 2;
				width: auto;
				justify-content: flex-end;
				margin-top: 0;
			}
			.ti-header__phone {
				font-size: clamp(13px, 1.5vw, 16px);
			}
			.ti-header__call-icon {
				width: clamp(26px, 3vw, 30px);
				height: clamp(26px, 3vw, 30px);
			}
			.ti-header__call-icon svg {
				width: clamp(12px, 1.5vw, 15px);
				height: clamp(12px, 1.5vw, 15px);
			}
			.ti-header__title {
				font-size: clamp(18px, 2vw, 22px);
			}
			.ti-header__address {
				font-size: clamp(10px, 1.1vw, 12px);
			}
			.ti-header__logo {
				width: clamp(35px, 4vw, 45px);
			}
			.ti-header__brand {
				display: none;
			}
			.ti-header__lang-switcher {
				width: clamp(36px, 4vw, 40px);
				height: clamp(36px, 4vw, 40px);
			}
		}
		@media (max-width: 480px) {
			.ti-header__container {
				padding: clamp(6px, 1.5vw, 10px) clamp(8px, 2vw, 12px);
			}
			.ti-header__left {
				flex-direction: row;
				gap: clamp(6px, 1.5vw, 8px);
			}
			.ti-header__lang-switcher {
				width: clamp(32px, 4vw, 36px);
				height: clamp(32px, 4vw, 36px);
			}
			.ti-header__search {
				width: clamp(32px, 4vw, 36px);
				height: clamp(32px, 4vw, 36px);
			}
			.ti-header__lang-dropdown {
				max-width: calc(100vw - 40px);
				right: 0;
				left: auto;
			}
			.ti-header--rtl .ti-header__lang-dropdown {
				left: 0;
				right: auto;
			}
			.ti-header__search-form {
				min-width: calc(100vw - 40px);
				max-width: calc(100vw - 40px);
				right: 0;
				left: auto;
			}
			.ti-header--rtl .ti-header__search-form {
				left: 0;
				right: auto;
			}
			.ti-header__phone-wrapper {
				gap: clamp(4px, 1vw, 6px);
			}
			.ti-header__phone {
				font-size: clamp(12px, 1.4vw, 14px);
			}
			.ti-header__call-icon {
				width: clamp(24px, 3vw, 28px);
				height: clamp(24px, 3vw, 28px);
			}
			.ti-header__call-icon svg {
				width: clamp(11px, 1.3vw, 14px);
				height: clamp(11px, 1.3vw, 14px);
			}
			.ti-header__title {
				font-size: clamp(16px, 1.8vw, 18px);
			}
			.ti-header__brand {
				gap: 2px;
			}
		}
	</style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="ti-header<?php echo $is_rtl ? ' ti-header--rtl' : ' ti-header--ltr'; ?>">
	<div class="ti-header__container">
		<!-- Left Section: Language & Search -->
		<div class="ti-header__left">
		<?php
			// Определяем номер телефона в зависимости от языка
			// Получаем текущий язык напрямую из Polylang
			$current_lang_code = function_exists( 'pll_current_language' ) ? pll_current_language() : $current_lang;
			
			// Нормализуем код языка к нижнему регистру для сравнения
			$lang_check = strtolower( trim( $current_lang_code ) );
			
			// Проверяем различные варианты кода иврита
			// 'he' - стандартный код иврита (ISO 639-1)
			// 'iw' - старый код иврита (до 1989 года)
			// Также проверяем варианты с регионом: 'he_IL', 'iw_IL' и т.д.
			$is_hebrew = ( $lang_check === 'he' || $lang_check === 'iw' )
				|| strpos( $lang_check, 'he' ) === 0
				|| strpos( $lang_check, 'iw' ) === 0;
			
			// Если не определили через код, используем RTL как индикатор (иврит - RTL язык)
			if ( ! $is_hebrew && $is_rtl ) {
				$is_hebrew = true;
			}
			
			if ( $is_hebrew ) {
				$phone_number = '03-3760386';
				$phone_tel = 'tel:033760386';
			} else {
				$phone_number = '+972-37621629';
				$phone_tel = 'tel:+97237621629';
			}
			?>
			<div class="ti-header__phone-wrapper">
				<a href="<?php echo esc_attr( $phone_tel ); ?>" class="ti-header__phone-link">
					<span class="ti-header__phone"><?php echo esc_html( $phone_number ); ?></span>
				</a>
				<a href="<?php echo esc_attr( $phone_tel ); ?>" class="ti-header__call-icon" aria-label="<?php echo esc_attr( tipress_pll__( 'Позвонить' ) ); ?>">
					<svg viewBox="0 0 24 24">
						<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
					</svg>
				</a>
			</div>

			<?php if ( function_exists( 'pll_the_languages' ) ) : ?>
				<?php
				$languages = pll_the_languages( [ 'raw' => 1, 'hide_if_empty' => 0 ] );
				$current  = pll_current_language();
				$current_lang_data = isset( $languages[ $current ] ) ? $languages[ $current ] : null;
				?>
				<button class="ti-header__lang-switcher" type="button" aria-label="<?php echo esc_attr( tipress_pll__( 'Выбрать язык' ) ); ?>" aria-expanded="false">
					<?php if ( $current_lang_data && ! empty( $current_lang_data['flag'] ) ) : ?>
						<img src="<?php echo esc_url( $current_lang_data['flag'] ); ?>" alt="" class="ti-header__lang-flag">
					<?php endif; ?>
					<span><?php echo esc_html( $current_lang_data ? $current_lang_data['name'] : strtoupper( $current ) ); ?></span>
				</button>
				<div class="ti-header__lang-dropdown">
					<?php foreach ( $languages as $lang ) : ?>
						<a href="<?php echo esc_url( $lang['url'] ); ?>" class="ti-header__lang-item">
							<?php if ( ! empty( $lang['flag'] ) ) : ?>
								<img src="<?php echo esc_url( $lang['flag'] ); ?>" alt="" class="ti-header__lang-flag">
							<?php endif; ?>
							<span><?php echo esc_html( $lang['name'] ); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			
			<button class="ti-header__search" type="button" aria-label="<?php echo esc_attr( tipress_pll__( 'Поиск' ) ); ?>" aria-expanded="false">
				<svg class="ti-header__search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<circle cx="11" cy="11" r="8"></circle>
					<path d="m21 21-4.35-4.35"></path>
				</svg>
				<span><?php echo esc_html( tipress_pll__( 'Поиск' ) ); ?></span>
			</button>
			<form class="ti-header__search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" name="s" placeholder="<?php echo esc_attr( tipress_pll__( 'Поиск...' ) ); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
				<button type="submit" aria-label="<?php echo esc_attr( tipress_pll__( 'Найти' ) ); ?>">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<circle cx="11" cy="11" r="8"></circle>
						<path d="m21 21-4.35-4.35"></path>
					</svg>
				</button>
			</form>
			
			
		</div>

		<!-- Center Section: Navigation Menu -->
		<div class="ti-header__center">
			<button class="ti-header__mobile-toggle" aria-label="<?php echo esc_attr( tipress_pll__( 'Открыть меню' ) ); ?>" aria-expanded="false">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<nav class="ti-header__nav-menu" aria-label="<?php echo esc_attr( tipress_pll__( 'Основная навигация' ) ); ?>">
				<?php
				// Polylang automatically shows the correct menu for current language
				wp_nav_menu(
					[
						'theme_location' => 'primary',
						'menu_id'        => 'ti-primary-menu',
						'container'      => false,
						'menu_class'     => 'ti-header__menu-list',
						'fallback_cb'    => false,
						'depth'          => 1,
					]
				);
				?>
			</nav>
		</div>

		<!-- Right Section: Brand & Logo -->
		<div class="ti-header__right">
			<div class="ti-header__brand">
				<div class="ti-header__title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="text-decoration:none;color:inherit;">
						<?php bloginfo( 'name' ); ?>
					</a>
				</div>
				<p class="ti-header__address">
					<svg class="ti-header__address-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
						<circle cx="12" cy="10" r="3"></circle>
					</svg>
					<span><?php echo esc_html( tipress_pll__( 'Тель-Авив, ул. Вайцман 14' ) ); ?></span>
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

<!-- Mobile Sidebar Menu -->
<div class="ti-header__mobile-menu-overlay"></div>
<aside class="ti-header__mobile-menu" aria-label="<?php echo esc_attr( tipress_pll__( 'Мобильное меню' ) ); ?>">
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'primary',
			'menu_id'        => 'ti-mobile-menu',
			'container'      => false,
			'menu_class'     => 'ti-header__mobile-menu-list',
			'fallback_cb'    => false,
			'depth'          => 2,
		]
	);
	?>
</aside>

<script>
(function() {
	'use strict';
	
	// Function to adjust dropdown position to stay within viewport
	function adjustDropdownPosition(element, parent) {
		if (!element || !parent) return;
		
		const rect = parent.getBoundingClientRect();
		const dropdownRect = element.getBoundingClientRect();
		const isRTL = document.documentElement.dir === 'rtl' || document.body.classList.contains('rtl');
		
		// Reset positioning
		element.style.left = '';
		element.style.right = '';
		
		if (isRTL) {
			// For RTL: check if dropdown goes off left edge
			if (dropdownRect.left < 20) {
				element.style.left = '0';
				element.style.right = 'auto';
			}
		} else {
			// For LTR: check if dropdown goes off right edge
			if (dropdownRect.right > window.innerWidth - 20) {
				element.style.right = '0';
				element.style.left = 'auto';
				// If still too wide, adjust to fit
				if (dropdownRect.width > window.innerWidth - 40) {
					element.style.maxWidth = (window.innerWidth - 40) + 'px';
				}
			}
		}
	}
	
	// Language switcher toggle
	const langSwitcher = document.querySelector('.ti-header__lang-switcher');
	const langDropdown = document.querySelector('.ti-header__lang-dropdown');
	const searchButton = document.querySelector('.ti-header__search');
	const searchForm = document.querySelector('.ti-header__search-form');
	
	if (langSwitcher && langDropdown) {
		langSwitcher.addEventListener('click', function(e) {
			e.stopPropagation();
			const isOpen = langDropdown.classList.contains('is-open');
			
			// Close search form if open
			if (searchForm && searchForm.classList.contains('is-open')) {
				searchForm.classList.remove('is-open');
				searchButton.setAttribute('aria-expanded', 'false');
			}
			
			if (isOpen) {
				langDropdown.classList.remove('is-open');
				langSwitcher.setAttribute('aria-expanded', 'false');
			} else {
				langDropdown.classList.add('is-open');
				langSwitcher.setAttribute('aria-expanded', 'true');
				// Adjust position after opening
				setTimeout(function() {
					adjustDropdownPosition(langDropdown, langSwitcher);
				}, 10);
			}
		});
		
		// Close on outside click
		document.addEventListener('click', function(e) {
			if (!langSwitcher.contains(e.target) && !langDropdown.contains(e.target)) {
				langDropdown.classList.remove('is-open');
				langSwitcher.setAttribute('aria-expanded', 'false');
			}
		});
		
		// Close on language item click
		const langItems = langDropdown.querySelectorAll('.ti-header__lang-item');
		langItems.forEach(function(item) {
			item.addEventListener('click', function() {
				setTimeout(function() {
					langDropdown.classList.remove('is-open');
					langSwitcher.setAttribute('aria-expanded', 'false');
				}, 100);
			});
		});
	}
	
	// Search form toggle
	if (searchButton && searchForm) {
		searchButton.addEventListener('click', function(e) {
			e.stopPropagation();
			const isOpen = searchForm.classList.contains('is-open');
			
			// Close language dropdown if open
			if (langDropdown && langDropdown.classList.contains('is-open')) {
				langDropdown.classList.remove('is-open');
				langSwitcher.setAttribute('aria-expanded', 'false');
			}
			
			if (isOpen) {
				searchForm.classList.remove('is-open');
				searchButton.setAttribute('aria-expanded', 'false');
			} else {
				searchForm.classList.add('is-open');
				searchButton.setAttribute('aria-expanded', 'true');
				// Adjust position after opening
				setTimeout(function() {
					adjustDropdownPosition(searchForm, searchButton);
					// Focus on input
					const searchInput = searchForm.querySelector('input');
					if (searchInput) {
						searchInput.focus();
					}
				}, 10);
			}
		});
		
		// Close on outside click
		document.addEventListener('click', function(e) {
			if (!searchButton.contains(e.target) && !searchForm.contains(e.target)) {
				searchForm.classList.remove('is-open');
				searchButton.setAttribute('aria-expanded', 'false');
			}
		});
		
		// Close on escape key
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && searchForm.classList.contains('is-open')) {
				searchForm.classList.remove('is-open');
				searchButton.setAttribute('aria-expanded', 'false');
			}
		});
		
		// Adjust position on window resize
		window.addEventListener('resize', function() {
			if (searchForm.classList.contains('is-open')) {
				adjustDropdownPosition(searchForm, searchButton);
			}
		});
	}
	
	// Adjust language dropdown on window resize
	if (langDropdown && langSwitcher) {
		window.addEventListener('resize', function() {
			if (langDropdown.classList.contains('is-open')) {
				adjustDropdownPosition(langDropdown, langSwitcher);
			}
		});
	}
})();
</script>

<div id="content" class="site-content">
