<?php
/**
 * Front page template.
 *
 * @package Tipress
 */

global $post;
get_header();

$theme_uri = get_stylesheet_directory_uri();
$current_lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'ru';
$is_rtl = is_rtl();
$is_hebrew = ( $current_lang === 'he' || $current_lang === 'he_IL' || ( $is_rtl && $current_lang !== 'ar' ) );
?>

<main id="primary" class="site-main front-page">

	<?php if ( $is_hebrew ) : ?>
		<!-- Hebrew Homepage Hero Block -->
		<section class="hebrew-hero-block">
			<div class="hebrew-hero-container">
				<!-- Main Content Grid: Doctors in center, cards around -->
				<div class="hebrew-hero-main-grid">
					<!-- Top Left Card: Fast Appointments -->
					<div class="hebrew-feature-card hebrew-card-top-left">
						<div class="hebrew-feature-icon">
							<img src="https://topichilov.co.il/wp-content/uploads/2025/12/v1.svg" alt="Fast Appointments" />
						</div>
						<p class="hebrew-feature-text">תורים מהירים - תוך 24-48 שעות לכל מומחה!</p>
					</div>

					<!-- Top Right Card: Consultation Duration -->
					<div class="hebrew-feature-card hebrew-card-top-right">
						<div class="hebrew-feature-icon">
							<img src="https://topichilov.co.il/wp-content/uploads/2025/12/v2.svg" alt="Consultation Duration" />
						</div>
						<p class="hebrew-feature-text">כל ייעוץ נמשך כשעה – או יותר, לפי הצורך</p>
					</div>

					<!-- Center: Doctors Illustration -->
					<div class="hebrew-hero-illustration">
						<div class="hebrew-doctors-image">
							<div class="hebrew-doctors-placeholder">
								<!-- Three doctors illustration will be displayed here -->
							</div>
						</div>
					</div>

					<!-- Bottom Left Card: Second Opinion -->
					<div class="hebrew-feature-card hebrew-card-bottom-left">
						<div class="hebrew-feature-icon">
							<img src="https://topichilov.co.il/wp-content/uploads/2025/12/v3.svg" alt="Second Opinion" />
						</div>
						<p class="hebrew-feature-text">חוות דעת שנייה ממיטב הרופאים של איכילוב</p>
					</div>

					<!-- Bottom Right Card: Confidentiality -->
					<div class="hebrew-feature-card hebrew-card-bottom-right">
						<div class="hebrew-feature-icon">
							<img src="https://topichilov.co.il/wp-content/uploads/2025/12/v4.svg" alt="Confidentiality" />
						</div>
						<p class="hebrew-feature-text">סודיות מלאה ואפשרות לייעוץ אנונימי</p>
					</div>
				</div>

				<!-- Bottom Section: Green H1 Block and Blue Description -->
				<div class="hebrew-hero-bottom-section">
					<!-- Green Header Block with H1 -->
					<div class="hebrew-hero-header">
						<h1 class="hebrew-hero-title">טופ איכילוב</h1>
					</div>

					<!-- Blue Description Block -->
					<div class="hebrew-hero-description">
						<p class="hebrew-description-text">מרפאה פרטית מתקדמת, ממוקמת ליד איכילוב. צוות רופאים מומחים, זמינות מיידית, שירות אישי ומקצועי. מענה רפואי כולל למגוון תחומים, ללא המתנות ארוכות.</p>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

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
