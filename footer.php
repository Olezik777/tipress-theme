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
		<div class="wp-block-group alignfull has-background-color has-dark-color has-text-color has-background has-link-color footer-top" style="background:linear-gradient(180deg,rgb(255,255,255) 37%,rgb(34,130,194) 38%,rgb(34,130,194) 86%,rgb(245,248,255) 86%);padding-top:32px;padding-right:4%;padding-bottom:20px;padding-left:4%">
			<div class="wp-block-columns">
				<div class="wp-block-column" style="flex-basis:25%">
					<figure class="wp-block-image aligncenter size-full">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/footer1.png' ); ?>" alt="">
					</figure>
					<p class="has-text-align-center has-white-color has-text-color"><strong><?php esc_html_e( 'Работаем без выходных: 24/7', 'tipress' ); ?></strong></p>
				</div>
				<div class="wp-block-column" style="flex-basis:25%">
					<figure class="wp-block-image aligncenter size-full">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/footer2.png' ); ?>" alt="">
					</figure>
					<p class="has-text-align-center has-white-color has-text-color"><strong><?php esc_html_e( 'Обслуживание на трех языках: иврит, русский и английский', 'tipress' ); ?></strong></p>
				</div>
				<div class="wp-block-column" style="flex-basis:50%">
					<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
					<div class="wp-block-group has-green-light-background-color has-background footer-callback" style="border-radius:9px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
						<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:20px;align-items:center">
							<figure class="wp-block-image size-full">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/callcenter.png' ); ?>" alt="">
							</figure>
							<p class="has-text-align-center has-white-color has-text-color">
								<strong><?php esc_html_e( 'Введите ваши данные и врач клиники перезвонит вам в течение часа', 'tipress' ); ?></strong>
							</p>
						</div>
						<div class="wp-block-contact-form-7-contact-form-selector">
							<?php echo do_shortcode( '[contact-form-7 id="48081" title="Callback"]' ); ?>
						</div>
						<div class="policy text_policy">
							<input id="policy-check-3" type="checkbox" value="" class="wpcf7-form-control wpcf7-checkbox" checked>
							<label for="policy-check-3" style="color:#ffffff;font-size:12px;"><?php esc_html_e( 'Соглашаюсь с политикой конфиденциальности. Прошу сохранить врачебную тайну.', 'tipress' ); ?></label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="wp-block-group alignfull has-background-color has-dark-color has-text-color has-background has-link-color footer-middle" style="background-color:#f5f8ff;padding-top:32px;padding-right:4%;padding-bottom:20px;padding-left:4%">
			<div class="wp-block-columns alignwide" style="gap:16px">
				<div class="wp-block-column" style="flex-basis:28%">
					<div class="wp-block-group has-background-color has-text-color footer-about">
						<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:20px;align-items:center">
							<?php
							if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								the_custom_logo();
							}
							?>
							<div class="wp-block-group" style="padding:var(--wp--preset--spacing--20);display:flex;flex-direction:column;gap:var(--wp--preset--spacing--20)">
								<p class="has-black-color has-text-color" style="font-size:32px;font-style:normal;font-weight:600;line-height:1;text-transform:uppercase;margin:0"><?php bloginfo( 'name' ); ?></p>
								<p style="font-style:normal;font-weight:600;text-transform:uppercase;margin:0"><?php esc_html_e( 'Официальный сайт', 'tipress' ); ?></p>
								<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:8px;align-items:center">
									<figure class="wp-block-image size-full" style="margin:0">
										<img src="<?php echo esc_url( $theme_uri . '/assets/images/mini-icons.png' ); ?>" alt="">
									</figure>
									<p class="has-text-color" style="color:#d22f1e;font-size:12px;margin:0"><?php esc_html_e( 'Израиль, Тель-Авив, ул. Вайцман 14', 'tipress' ); ?></p>
								</div>
							</div>
						</div>
						<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
						<div class="wp-block-group">
							<a class="wp-block-hyperlink-group" href="tel:+972528780569">
								<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:12px;align-items:center">
									<figure class="wp-block-image size-full is-resized" style="margin:0">
										<img src="<?php echo esc_url( $theme_uri . '/assets/images/phone-circle.png' ); ?>" alt="" width="36" height="36">
									</figure>
									<p class="has-dark-color has-text-color" style="margin:0">+972-528780569</p>
								</div>
							</a>
							<a class="wp-block-hyperlink-group" href="https://api.whatsapp.com/send?phone=972528780569">
								<div class="wp-block-group" style="display:flex;flex-wrap:nowrap;gap:12px;align-items:center">
									<figure class="wp-block-image size-full is-resized" style="margin:0">
										<img src="<?php echo esc_url( $theme_uri . '/assets/images/whatsapp-social.png' ); ?>" alt="" width="36" height="36">
									</figure>
									<div class="wp-block-group" style="display:flex;flex-direction:column;gap:0">
										<p class="has-text-color" style="color:#00a541;font-size:12px;margin:0">Whatsapp</p>
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
										<p class="has-text-color" style="color:#7d3daf;font-size:12px;margin:0">Viber</p>
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
										<p class="has-dark-color has-text-color" style="font-size:12px;margin:0">Mail</p>
										<p class="has-dark-color has-text-color" style="margin:0"><a href="mailto:doctors@topichilov.com">doctors@topichilov.com</a></p>
									</div>
								</div>
							</a>
						</div>
						<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
						<div class="wp-block-buttons">
							<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="https://test.topichilov.com/contactus/"><?php esc_html_e( 'Связаться с нами', 'tipress' ); ?></a></div>
						</div>
					</div>
				</div>

				<div class="wp-block-column" style="flex-basis:17%">
					<div class="wp-block-group footer-location">
						<div class="wp-block-group" style="border-bottom:1px solid #abb7c27a;padding-bottom:12px;display:flex;flex-direction:column;gap:8px">
							<div style="display:flex;gap:12px;align-items:center">
								<p style="font-style:normal;font-weight:700;margin:0"><?php esc_html_e( 'Москва', 'tipress' ); ?></p>
								<figure class="wp-block-image size-full is-resized" style="margin:0">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/flag-ru.png' ); ?>" alt="" width="17" height="11">
								</figure>
							</div>
							<p style="line-height:1;margin:0"><?php esc_html_e( 'Кутузовский пр-д, 31', 'tipress' ); ?></p>
							<p style="line-height:1;margin:0"><a href="tel:74957773802"><?php esc_html_e( 'Тел: +7 (495) 777-38-02', 'tipress' ); ?></a></p>
						</div>
						<div class="wp-block-group" style="border-bottom:1px solid #abb7c27a;padding-bottom:12px;display:flex;flex-direction:column;gap:8px">
							<div style="display:flex;gap:12px;align-items:center">
								<p style="font-style:normal;font-weight:700;margin:0"><?php esc_html_e( 'Санкт-Петербург', 'tipress' ); ?></p>
								<figure class="wp-block-image size-full is-resized" style="margin:0">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/flag-ru.png' ); ?>" alt="" width="17" height="11">
								</figure>
							</div>
							<p style="line-height:1;margin:0"><?php esc_html_e( 'ул. Фурштатская, 52', 'tipress' ); ?></p>
							<p style="line-height:1;margin:0"><a href="tel:78125787764"><?php esc_html_e( 'Тел: +7 (812) 578-77-64', 'tipress' ); ?></a></p>
						</div>
						<div class="wp-block-group" style="border-bottom:1px solid #abb7c27a;padding-bottom:12px;display:flex;flex-direction:column;gap:8px">
							<div style="display:flex;gap:12px;align-items:center">
								<p style="font-style:normal;font-weight:700;margin:0"><?php esc_html_e( 'Киев', 'tipress' ); ?></p>
								<figure class="wp-block-image size-full is-style-default" style="margin:0">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/flag-ua.png' ); ?>" alt="">
								</figure>
							</div>
							<p style="line-height:1.4;margin:0"><?php esc_html_e( 'ул. Н.Пимоненко, 10', 'tipress' ); ?></p>
							<p style="line-height:1;margin:0"><a href="tel:380443922180"><?php esc_html_e( 'Тел: +38 (044) 392-21-80', 'tipress' ); ?></a></p>
						</div>
					</div>
				</div>

				<div class="wp-block-column" style="flex-basis:15.24%;border-left:1px solid #abb7c27d;padding-left:1rem">
					<div style="height:5px" aria-hidden="true" class="wp-block-spacer"></div>
					<?php
					if ( has_nav_menu( 'footer-one' ) ) {
						wp_nav_menu(
							[
								'theme_location' => 'footer-one',
								'container'      => 'nav',
								'container_class'=> 'footer-menu footer-menu--one',
								'menu_class'     => 'footer-menu__list',
							]
						);
					}
					?>
				</div>

				<div class="wp-block-column" style="flex-basis:15.24%;border-left:1px solid #abb7c27d;padding-left:1rem">
					<div style="height:5px" aria-hidden="true" class="wp-block-spacer"></div>
					<p style="font-size:22px;font-style:normal;font-weight:600;margin:0">
						<a href="https://test.topichilov.com/departments/"><?php esc_html_e( 'Отделения', 'tipress' ); ?></a>
					</p>
					<?php
					if ( has_nav_menu( 'footer-two' ) ) {
						wp_nav_menu(
							[
								'theme_location' => 'footer-two',
								'container'      => 'nav',
								'container_class'=> 'footer-menu footer-menu--two',
								'menu_class'     => 'footer-menu__list',
							]
						);
					}
					?>
				</div>

				<div class="wp-block-column" style="flex-basis:15.24%;border-left:1px solid #abb7c27d;padding-left:1rem">
					<div style="height:5px" aria-hidden="true" class="wp-block-spacer"></div>
					<p style="font-size:22px;font-style:normal;font-weight:600;margin:0">
						<a href="https://test.topichilov.com/departments/oncology/"><?php esc_html_e( 'Онкология', 'tipress' ); ?></a>
					</p>
					<?php
					if ( has_nav_menu( 'footer-three' ) ) {
						wp_nav_menu(
							[
								'theme_location' => 'footer-three',
								'container'      => 'nav',
								'container_class'=> 'footer-menu footer-menu--three',
								'menu_class'     => 'footer-menu__list',
							]
						);
					}
					?>
				</div>
			</div>
		</div>

		<div class="wp-block-group alignfull has-background-color has-dark-color has-text-color has-background has-link-color footer-bottom" style="background-color:#f5f8ff;padding-top:32px;padding-right:4%;padding-bottom:20px;padding-left:4%">
			<p class="has-text-align-center" style="font-size:12px">
				<?php esc_html_e( 'Все материалы, размещенные на данном сайте, носят ознакомительный характер. Они не могут быть использованы как руководство для диагностики или лечения и ни в коем случае не могут заменить консультацию врача. Имеются противопоказания, проконсультируйтесь с врачом.', 'tipress' ); ?>
			</p>
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="background-color:#abb7c242;color:#abb7c242">
			<p class="has-text-align-center" style="font-size:10px">
				<?php
				printf(
					/* translators: %s: privacy policy url */
					esc_html__( 'Официальный сайт клиники Топ Ихилов. Copyright © %1$s %2$s Политика конфиденциальности Ихилов Топ / Медицинский центр Ихилов (Тель-Авив). Все материалы сайта, включая фотоматериалы и дизайн, защищены российским и международным законодательством об авторских и смежных правах. Запрещается копирование или свободное изложение текста, размещенного на сайте, без изменения смыслового содержания.', 'tipress' ),
					date_i18n( 'Y' ),
					'<a href="https://test.topichilov.com/politika-konfidencialnosti/">' . esc_html__( 'Политика конфиденциальности', 'tipress' ) . '</a>'
				);
				?>
			</p>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>

