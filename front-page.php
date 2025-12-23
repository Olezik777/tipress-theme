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
				<!-- Green Header Block with H1 -->
				<div class="hebrew-hero-header">
					<h1 class="hebrew-hero-title">טופ איכילוב</h1>
				</div>

				<!-- Doctors Illustration Section -->
				<div class="hebrew-hero-illustration">
					<div class="hebrew-doctors-image">
						<!-- Doctors illustration placeholder - can be replaced with actual image -->
						<div class="hebrew-doctors-placeholder">
							<!-- Three doctors illustration will be displayed here -->
						</div>
					</div>
				</div>

				<!-- Features Grid -->
				<div class="hebrew-hero-features">
					<!-- Card 1: Second Opinion -->
					<div class="hebrew-feature-card">
						<div class="hebrew-feature-icon">
							<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="30" cy="30" r="30" fill="#E4EDF6"/>
								<circle cx="30" cy="30" r="12" stroke="#5DC68C" stroke-width="2" fill="none"/>
								<path d="M30 18V30L38 38" stroke="#5DC68C" stroke-width="2" stroke-linecap="round"/>
								<path d="M20 30L27 37L40 24" stroke="#5DC68C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
						<p class="hebrew-feature-text">חוות דעת שנייה ממיטב הרופאים של איכילוב</p>
					</div>

					<!-- Card 2: Fast Appointments -->
					<div class="hebrew-feature-card">
						<div class="hebrew-feature-icon">
							<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="30" cy="30" r="30" fill="#E4EDF6"/>
								<circle cx="30" cy="30" r="18" fill="#5DC68C"/>
								<path d="M30 20V30L38 38" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
								<path d="M30 12L30 16M30 44L30 48M12 30L16 30M44 30L48 30" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
							</svg>
						</div>
						<p class="hebrew-feature-text">תורים מהירים - תוך 24-48 שעות לכל מומחה!</p>
					</div>

					<!-- Card 3: Consultation Duration -->
					<div class="hebrew-feature-card">
						<div class="hebrew-feature-icon">
							<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="30" cy="30" r="30" fill="#E4EDF6"/>
								<circle cx="20" cy="25" r="8" fill="#336699" opacity="0.8"/>
								<circle cx="40" cy="25" r="8" fill="#336699" opacity="0.8"/>
								<path d="M20 33C20 37 23 40 27 40C31 40 34 37 34 33M40 33C40 37 43 40 47 40" stroke="#336699" stroke-width="2" stroke-linecap="round"/>
								<path d="M15 35L20 30M45 30L50 35" stroke="#336699" stroke-width="2" stroke-linecap="round"/>
							</svg>
						</div>
						<p class="hebrew-feature-text">כל ייעוץ נמשך כשעה – או יותר, לפי הצורך</p>
					</div>

					<!-- Card 4: Confidentiality -->
					<div class="hebrew-feature-card">
						<div class="hebrew-feature-icon">
							<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="30" cy="30" r="30" fill="#E4EDF6"/>
								<path d="M30 18L35 22L40 18V28C40 35 35 40 30 42C25 40 20 35 20 28V18L25 22L30 18Z" fill="#336699"/>
								<circle cx="30" cy="30" r="3" fill="#FFFFFF"/>
							</svg>
						</div>
						<p class="hebrew-feature-text">סודיות מלאה ואפשרות לייעוץ אנונימי</p>
					</div>
				</div>

				<!-- Blue Description Block -->
				<div class="hebrew-hero-description">
					<p class="hebrew-description-text">מרפאה פרטית מתקדמת, ממוקמת ליד איכילוב. צוות רופאים מומחים, זמינות מיידית, שירות אישי ומקצועי. מענה רפואי כולל למגוון תחומים, ללא המתנות ארוכות.</p>
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
