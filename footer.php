<?php
/**
 * The template for displaying the footer.
 *
 * @package Tipress
 */

$theme_uri = get_stylesheet_directory_uri();
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<!-- Callback Form Section -->
		<div class="footer-callback-section">
			<div class="footer-callback-container">
				<?php echo do_shortcode( '[contact-form-7 id="9fc7b4d" title="Callback_he"]' ); ?>
			</div>
		</div>

		<a href="#" class="float-call-me open-popup eng_lang bodmodal-open" aria-label="Call back button" style="cursor: pointer;">
			<div class="call-me-shake"></div>
			<div class="call-me-text"><?php echo esc_html( tipress_pll__( 'Please Call Back' ) ); ?></div>
		</a>

		<!-- Main Footer Content -->
		<div class="footer-main">
			<div class="footer-main-container">
				<div class="footer-columns">
					<!-- Column 1: Logo + Social Media -->
					<div class="footer-column footer-column--logo">
						<div class="footer-logo">
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
										<img src="https://topichilov.co.il/wp-content/uploads/2026/01/logo-ichilov.webp" alt="<?php bloginfo( 'name' ); ?>">
									</a>
									<?php
								}
								?>
							</div>
						</div>
						<div class="footer-social">
							<?php
							// Social media links - можно вынести в настройки темы или использовать виджет
							$phone = '+972-528780569';
							$whatsapp = '972528780569';
							$email = 'doctors@topichilov.com';
							?>
							<a href="tel:<?php echo esc_attr( $phone ); ?>" class="footer-social-link footer-social-link--phone" aria-label="<?php echo esc_attr( tipress_pll__( 'Телефон' ) ); ?>">
								<img src="/wp-content/uploads/2023/12/phone-call.png" alt="" width="36" height="36">
								<span><?php echo esc_html( $phone ); ?></span>
							</a>
							<a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr( $whatsapp ); ?>" class="footer-social-link footer-social-link--whatsapp" aria-label="<?php echo esc_attr( tipress_pll__( 'WhatsApp' ) ); ?>" target="_blank" rel="noopener">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/whatsapp-social.png' ); ?>" alt="" width="36" height="36">
								<div>
									<span class="footer-social-label"><?php echo esc_html( tipress_pll__( 'Whatsapp' ) ); ?></span>
									<span class="footer-social-value"><?php echo esc_html( $phone ); ?></span>
								</div>
							</a>
							<a href="mailto:<?php echo esc_attr( $email ); ?>" class="footer-social-link footer-social-link--email" aria-label="<?php echo esc_attr( tipress_pll__( 'Email' ) ); ?>">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/mail-social.png' ); ?>" alt="" width="36" height="36">
								<div>
									<span class="footer-social-label"><?php echo esc_html( tipress_pll__( 'Mail' ) ); ?></span>
									<span class="footer-social-value"><?php echo esc_html( $email ); ?></span>
								</div>
							</a>
						</div>
					</div>

					<!-- Column 2: Contacts + Address Widget + Short Menu -->
					<div class="footer-column footer-column--contacts">
						<div class="footer-contacts">
							<?php if ( is_active_sidebar( 'footer-address' ) ) : ?>
								<div class="footer-address-widget">
									<?php dynamic_sidebar( 'footer-address' ); ?>
								</div>
							<?php endif; ?>
						</div>
						<?php if ( has_nav_menu( 'footer-short' ) ) : ?>
							<nav class="footer-short-menu" aria-label="<?php echo esc_attr( tipress_pll__( 'Короткое меню футера' ) ); ?>">
								<?php
								wp_nav_menu(
									[
										'theme_location' => 'footer-short',
										'container'      => false,
										'menu_class'     => 'footer-short-menu__list',
										'depth'          => 1,
									]
								);
								?>
							</nav>
						<?php endif; ?>
					</div>

					<!-- Column 3-4: Large Menu in 2 columns -->
					<div class="footer-column footer-column--menu-left">
						<?php if ( has_nav_menu( 'footer-main-left' ) ) : ?>
							<nav class="footer-main-menu" aria-label="<?php echo esc_attr( tipress_pll__( 'Основное меню футера (левая колонка)' ) ); ?>">
								<?php
								wp_nav_menu(
									[
										'theme_location' => 'footer-main-left',
										'container'      => false,
										'menu_class'     => 'footer-main-menu__list',
									]
								);
								?>
							</nav>
						<?php endif; ?>
					</div>

					<div class="footer-column footer-column--menu-right">
						<?php if ( has_nav_menu( 'footer-main-right' ) ) : ?>
							<nav class="footer-main-menu" aria-label="<?php echo esc_attr( tipress_pll__( 'Основное меню футера (правая колонка)' ) ); ?>">
								<?php
								wp_nav_menu(
									[
										'theme_location' => 'footer-main-right',
										'container'      => false,
										'menu_class'     => 'footer-main-menu__list',
									]
								);
								?>
							</nav>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer Bottom: Disclaimer + Copyright -->
		<div class="footer-bottom">
			<div class="footer-bottom-container">
				<?php if ( is_active_sidebar( 'footer-disclaimer' ) ) : ?>
					<div class="footer-disclaimer">
						<?php dynamic_sidebar( 'footer-disclaimer' ); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'footer-copyright' ) ) : ?>
					<div class="footer-copyright">
						<?php dynamic_sidebar( 'footer-copyright' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</footer>

	<!-- Callback Popup Modal -->
	<div role="dialog" aria-modal="true" aria-labelledby="bodModalAriaTitle2" aria-describedby="bodModalAriaContent2" class="bod-block-popup-wrap modal-1" id="callback-popup">
		<div style="background-color:#ffffff;border-radius:10px" class="bod-block-popup size-m fade" data-transition="fade">
			<div id="bodModalAriaTitle2" style="background-color:rgba(0,158,224,1);text-align:center" class="bod-modal-title">
				<button type="button" style="font-size:33px" class="bod-block-title-closer" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<span style="color:rgba(255,255,255,1)" class="modal_title">
					<?php echo esc_html( tipress_pll__( 'Получите консультацию врача' ) ); ?>
				</span>
			</div>
			<div id="bodModalAriaContent2" class="bod-modal-content">
				<div class="wp-block-cover with-text-alignment core-cover" style="padding-top:25px">
					<?php
					$popup_bg = $theme_uri . '/assets/images/popup-bg.png';
					if ( file_exists( get_stylesheet_directory() . '/assets/images/popup-bg.png' ) ) {
						$popup_bg_url = $popup_bg;
					} else {
						$popup_bg_url = '/wp-content/uploads/2023/12/popup-bg.png';
					}
					?>
					<img loading="lazy" decoding="async" width="605" height="284" class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $popup_bg_url ); ?>" data-object-fit="cover">
					<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
					<div class="wp-block-cover__inner-container is-layout-constrained">
						<div class="wp-block-group inner-group has-dark-color has-text-color has-link-color is-layout-constrained" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50)">
							<p class="modal-text has-dark-color has-text-color has-link-color" style="font-size:clamp(14px, 0.875rem + ((1vw - 3.2px) * 0.641), 19px);">
								<?php
								$modal_text = tipress_pll__( 'Введите свой номер телефона, и с Вами свяжется в течение <strong>15 минут</strong> врач-консультант нашей клиники, который расскажет о методах лечения и сообщит <strong>точные цены</strong>.' );
								echo wp_kses_post( $modal_text );
								?>
							</p>
							<div class="wp-block-group is-nowrap is-layout-flex">
								<?php echo do_shortcode( '[contact-form-7 id="3b562cd" title="Callback popup Иврит"]' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
	(function() {
		'use strict';
		
		function initPopup() {
			const popup = document.getElementById('callback-popup');
			if (!popup) return;
			
			const closeButton = popup.querySelector('.bod-block-title-closer');
			
			function openPopup() {
				popup.classList.add('active');
				popup.style.display = 'flex';
				document.body.style.overflow = 'hidden';
			}
			
			function closePopup() {
				popup.classList.remove('active');
				popup.style.display = 'none';
				document.body.style.overflow = '';
			}
			
			// Open popup on button click - using event delegation for dynamically added elements
			document.addEventListener('click', function(e) {
				const target = e.target.closest('.bodmodal-open');
				if (target) {
					e.preventDefault();
					e.stopPropagation();
					openPopup();
				}
			});
			
			// Close popup on close button click
			if (closeButton) {
				closeButton.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					closePopup();
				});
			}
			
			// Close popup on overlay click
			popup.addEventListener('click', function(e) {
				if (e.target === popup) {
					closePopup();
				}
			});
			
			// Close popup on Escape key
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape' && popup.classList.contains('active')) {
					closePopup();
				}
			});
		}
		
		// Initialize when DOM is ready
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initPopup);
		} else {
			initPopup();
		}
	})();
	</script>

	<?php wp_footer(); ?>
</body>
</html>
