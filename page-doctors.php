<?php
/**
 * Page template for /doctors/ landing.
 *
 * @package Tipress
 */

get_header();

// текущий язык для Polylang (если есть)
$lang = function_exists( 'pll_current_language' )
    ? pll_current_language()
    : '';

?>
<main id="primary" class="site-main page-doctors">
  <div class="wp-block-group single-template-container">
    <?php tipress_display_breadcrumbs(); ?>

      <div class="ti-column single-template-content">
        <header class="page-header single-template-header">
          <?php
          // контент самой страницы (описание раздела / SEO-текст)
          while ( have_posts() ) :
            the_post();
            if ( get_the_content() ) :
              echo '<div class="page-intro">';
              the_content();
              echo '</div>';
            endif;
          endwhile;
          // вернём глобальный $post на место для дальнейших WP_Query
          wp_reset_postdata();
          ?>
        </header>

        <?php
        // 1. Получаем все специализации (таксономия specialization)
        $spec_args = array(
          'taxonomy'   => 'specialization',
          'hide_empty' => true,
          'orderby'    => 'name',
          'order'      => 'ASC',
        );

        $specializations = get_terms( $spec_args );

        if ( ! empty( $specializations ) && ! is_wp_error( $specializations ) ) : ?>
          <!-- Навигация по специализациям -->
          <nav class="doctors-spec-nav" aria-label="<?php esc_attr_e( 'Doctors specializations', 'tipress' ); ?>">
            <ul class="doctors-spec-nav-list">
              <?php foreach ( $specializations as $term ) : ?>
                <li>
                  <a href="#spec-<?php echo esc_attr( $term->slug ); ?>">
                    <?php echo esc_html( $term->name ); ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </nav>

          <!-- Секции по специализациям -->
          <?php foreach ( $specializations as $term ) : ?>
            <section id="spec-<?php echo esc_attr( $term->slug ); ?>" class="doctors-spec-section">
              <h2 class="doctors-spec-title">
                <?php echo esc_html( $term->name ); ?>
              </h2>

              <?php
              // врачи по конкретной специализации
              $doctors_by_spec = new WP_Query( array(
                'post_type'      => 'doctors',
                'posts_per_page' => -1,
                'orderby'        => array(
                  'menu_order' => 'ASC',
                  'title'      => 'ASC',
                ),
                'tax_query'      => array(
                  array(
                    'taxonomy' => 'specialization',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                  ),
                ),
                // для Polylang – фильтруем по текущему языку
                'lang'           => $lang ?: null,
              ) );

              if ( $doctors_by_spec->have_posts() ) : ?>
                <div class="doctors-grid">
                  <?php
                  while ( $doctors_by_spec->have_posts() ) :
                    $doctors_by_spec->the_post();

                    // можно переиспользовать существующий шаблон карточки
                    get_template_part( 'template-parts/content', 'doctors' );
                  endwhile;
                  ?>
                </div>
              <?php else : ?>
                <p class="no-doctors">
                  <?php _e( 'Нет врачей с этой специализацией.', 'tipress' ); ?>
                </p>
              <?php
              endif;
              wp_reset_postdata();
              ?>
            </section>
          <?php endforeach; ?>

        <?php endif; ?>

        <!-- Блок "Все врачи" -->
        <section class="doctors-all-section">
          <h2 class="doctors-spec-title">
            <?php _e( 'Все врачи', 'tipress' ); ?>
          </h2>

          <?php
          $all_doctors = new WP_Query( array(
            'post_type'      => 'doctors',
            'posts_per_page' => -1,
            'orderby'        => array(
              'menu_order' => 'ASC',
              'title'      => 'ASC',
            ),
            'lang'           => $lang ?: null,
          ) );

          if ( $all_doctors->have_posts() ) : ?>
            <div class="doctors-grid">
              <?php
              while ( $all_doctors->have_posts() ) :
                $all_doctors->the_post();
                get_template_part( 'template-parts/content', 'doctors' );
              endwhile;
              ?>
            </div>
          <?php else : ?>
            <p class="no-doctors">
              <?php _e( 'Врачи не найдены.', 'tipress' ); ?>
            </p>
          <?php
          endif;
          wp_reset_postdata();
          ?>
        </section>

      </div><!-- /.ti-column -->
  </div><!-- /.container -->
</main>

<?php
get_footer();
