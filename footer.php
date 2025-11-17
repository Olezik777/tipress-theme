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

		<!-- Main Footer Content -->
		<div class="footer-main">
			<div class="footer-main-container">
				<div class="footer-columns">
					<!-- Column 1: Logo + Social Media -->
					<div class="footer-column footer-column--logo">
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
								<span><?php esc_html_e( 'Тель-Авив, ул. Вайцман 14', 'tipress' ); ?></span>
							</p>
						</div>
						<div class="footer-social">
							<?php
							// Social media links - можно вынести в настройки темы или использовать виджет
							$phone = '+972-528780569';
							$whatsapp = '972528780569';
							$viber = '+972528780569';
							$email = 'doctors@topichilov.com';
							?>
							<a href="tel:<?php echo esc_attr( $phone ); ?>" class="footer-social-link footer-social-link--phone" aria-label="<?php esc_attr_e( 'Телефон', 'tipress' ); ?>">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/phone-circle.png' ); ?>" alt="" width="36" height="36">
								<span><?php echo esc_html( $phone ); ?></span>
							</a>
							<a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr( $whatsapp ); ?>" class="footer-social-link footer-social-link--whatsapp" aria-label="WhatsApp" target="_blank" rel="noopener">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/whatsapp-social.png' ); ?>" alt="" width="36" height="36">
								<div>
									<span class="footer-social-label">Whatsapp</span>
									<span class="footer-social-value"><?php echo esc_html( $phone ); ?></span>
								</div>
							</a>
							<a href="viber://chat?number=%2B<?php echo esc_attr( str_replace( '-', '', $viber ) ); ?>" class="footer-social-link footer-social-link--viber" aria-label="Viber">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/viber-social.png' ); ?>" alt="" width="36" height="36">
								<div>
									<span class="footer-social-label">Viber</span>
									<span class="footer-social-value"><?php echo esc_html( $phone ); ?></span>
								</div>
							</a>
							<a href="mailto:<?php echo esc_attr( $email ); ?>" class="footer-social-link footer-social-link--email" aria-label="<?php esc_attr_e( 'Email', 'tipress' ); ?>">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/mail-social.png' ); ?>" alt="" width="36" height="36">
								<div>
									<span class="footer-social-label">Mail</span>
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
							<nav class="footer-short-menu" aria-label="<?php esc_attr_e( 'Короткое меню футера', 'tipress' ); ?>">
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
							<nav class="footer-main-menu" aria-label="<?php esc_attr_e( 'Основное меню футера (левая колонка)', 'tipress' ); ?>">
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
							<nav class="footer-main-menu" aria-label="<?php esc_attr_e( 'Основное меню футера (правая колонка)', 'tipress' ); ?>">
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

	<?php wp_footer(); ?>
</body>
</html>
