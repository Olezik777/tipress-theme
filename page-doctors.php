<?php
/**
 * Page template for /doctors/ landing with AJAX filter.
 *
 * @package Tipress
 */

get_header();

$lang = function_exists( 'pll_current_language' )
    ? pll_current_language()
    : '';

?>
<main id="primary" class="site-main page-doctors">
  <div class="wp-block-group single-template-container">
    <?php tipress_display_breadcrumbs(); ?>

      <div class="doctors-content">
        <header class="page-header single-template-header">

          <?php
          while ( have_posts() ) :
            the_post();
            if ( get_the_content() ) :
              echo '<div class="page-intro">';
              the_content();
              echo '</div>';
            endif;
          endwhile;
          wp_reset_postdata();
          ?>
        </header>

        <?php
        // термы специализаций
        $specializations = get_terms( array(
          'taxonomy'   => 'specialization',
          'hide_empty' => true,
          'orderby'    => 'name',
          'order'      => 'ASC',
        ) );
        ?>

        <?php if ( ! empty( $specializations ) && ! is_wp_error( $specializations ) ) : ?>
          <nav class="doctors-filter-nav" aria-label="<?php esc_attr_e( 'Doctors specializations', 'tipress' ); ?>">
            <ul class="doctors-filter-nav-list">
              <li><button type="button" class="is-active" data-term="all"><?php _e( 'All doctors', 'tipress' ); ?></button></li>
              <?php foreach ( $specializations as $term ) : ?>
                <li>
                  <button type="button" data-term="<?php echo esc_attr( $term->slug ); ?>">
                    <?php echo esc_html( $term->name ); ?>
                  </button>
                </li>
              <?php endforeach; ?>
            </ul>
          </nav>
        <?php endif; ?>

        <div id="doctors-grid-wrapper"
             class="doctors-grid-wrapper"
             data-term="all"
             data-page="1">
          <?php
          // стартовый вывод: все доктора, страница 1
          echo tipress_render_doctors_grid( 'all', 1, $lang );
          ?>
        </div>

      </div><!-- /.ti-column -->
  </div><!-- /.container -->
</main>

<?php
get_footer();
