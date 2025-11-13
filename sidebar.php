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
?>

<aside id="secondary" class="widget-area default-sidebar">
	<?php get_search_form(); ?>

	<div class="sidebar-links" style="margin-top:30px;margin-bottom:30px">
		<div class="sidebar-link-item" style="border-top:1px solid #d5d5d5;padding:4px 0;display:flex;align-items:center;justify-content:space-between">
			<p class="has-dark-color has-text-color" style="margin:0"><a href="https://www.topichilov.com/o-top-ichilov/"><?php esc_html_e( 'О нас', 'tipress' ); ?></a></p>
			<figure class="wp-block-image size-full" style="margin:0">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/list1.png' ); ?>" alt="">
			</figure>
		</div>
		<div class="sidebar-link-item" style="border-top:1px solid #d5d5d5;padding:4px 0;display:flex;align-items:center;justify-content:space-between">
			<p class="has-dark-color has-text-color" style="margin:0"><a href="https://www.topichilov.com/kak-k-nam-priehat/"><?php esc_html_e( 'Как к нам приехать?', 'tipress' ); ?></a></p>
			<figure class="wp-block-image size-full" style="margin:0">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/list1.png' ); ?>" alt="">
			</figure>
		</div>
		<div class="sidebar-link-item" style="border-top:1px solid #d5d5d5;padding:4px 0;display:flex;align-items:center;justify-content:space-between">
			<p class="has-dark-color has-text-color" style="margin:0"><a href="https://www.topichilov.com/kak-k-nam-priehat/"><?php esc_html_e( 'Вопросы - ответы', 'tipress' ); ?></a></p>
			<figure class="wp-block-image size-full" style="margin:0">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/list1.png' ); ?>" alt="">
			</figure>
		</div>
	</div>

	<figure class="wp-block-image aligncenter size-full">
		<a href="https://test.topichilov.com/imta/">
			<img src="<?php echo esc_url( $theme_uri . '/assets/images/certificate_top-ichilov-int_sidebar.jpg' ); ?>" alt="">
		</a>
	</figure>

	<div class="sidebar-section doctors-section" style="border-left:3px solid var(--wp--preset--color--base);padding-left:16px;margin-top:24px;margin-bottom:24px">
		<h2 class="wp-block-heading" style="margin:0"><strong><?php esc_html_e( 'ВРАЧИ ОТДЕЛЕНИЯ', 'tipress' ); ?></strong></h2>
	</div>

	<div class="wp-block-group has-baige-background-color has-background doctor-card" style="border-radius:12px;padding:var(--wp--preset--spacing--50);text-align:center">
		<figure class="wp-block-image aligncenter size-full">
			<img src="<?php echo esc_url( $theme_uri . '/assets/images/vrach-3.jpg' ); ?>" alt="<?php esc_attr_e( 'Врач', 'tipress' ); ?>">
		</figure>
		<p class="has-text-align-center has-dark-color has-text-color"><a href="https://tpichilov.loc/doctors/doktor-aleks-levental/"><strong><?php esc_html_e( 'Имя + ФИО', 'tipress' ); ?></strong></a></p>
		<p class="has-text-align-center has-small-font-size" style="line-height:1.2"><?php esc_html_e( '######', 'tipress' ); ?><br><?php esc_html_e( '###### #######', 'tipress' ); ?></p>
		<div class="wp-block-buttons" style="justify-content:center">
			<div class="wp-block-button has-custom-font-size open-popup" style="font-size:12px"><a class="wp-block-button__link has-text-align-center wp-element-button" href="#"><?php esc_html_e( 'ЗАПИСАТЬСЯ НА ПРИЕМ', 'tipress' ); ?></a></div>
		</div>
	</div>

	<div class="wp-block-group has-baige-background-color has-background doctor-card" style="border-radius:12px;padding:var(--wp--preset--spacing--50);text-align:center;margin-top:24px">
		<figure class="wp-block-image aligncenter size-full">
			<img src="<?php echo esc_url( $theme_uri . '/assets/images/vrach-3.jpg' ); ?>" alt="<?php esc_attr_e( 'Врач', 'tipress' ); ?>">
		</figure>
		<p class="has-text-align-center has-dark-color has-text-color"><a href="https://tpichilov.loc/doctors/doktor-aleks-levental/"><strong><?php esc_html_e( 'Имя + ФИО', 'tipress' ); ?></strong></a></p>
		<p class="has-text-align-center has-small-font-size" style="line-height:1.2"><?php esc_html_e( '######', 'tipress' ); ?><br><?php esc_html_e( '###### #######', 'tipress' ); ?></p>
		<div class="wp-block-buttons" style="justify-content:center">
			<div class="wp-block-button has-custom-font-size open-popup" style="font-size:12px"><a class="wp-block-button__link has-text-align-center wp-element-button" href="#"><?php esc_html_e( 'ЗАПИСАТЬСЯ НА ПРИЕМ', 'tipress' ); ?></a></div>
		</div>
	</div>

	<div class="wp-block-group has-border-color has-contrast-border-color contact-box" style="border:2px solid currentColor;border-radius:12px;padding:20px;margin-top:24px">
		<div class="wp-block-group" style="display:flex;flex-direction:column;gap:16px">
			<a class="wp-block-hyperlink-group" href="tel:+972528780569">
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
	</div>
</aside>

