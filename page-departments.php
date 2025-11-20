<?php
/**
 * Archive template for the departments custom post type.
 *
 * @package Tipress
 */

get_header();

// Определяем текущий язык (Polylang)
$lang = function_exists( 'pll_current_language' )
    ? pll_current_language()
    : '';

// Базовый slug template part
$tpl_slug = 'departments-list-treatments';

// В зависимости от языка выбираем нужный template part.
// Здесь подставь свои реальные слаги частей шаблона.
if ( $lang ) {
    switch ( $lang ) {
        case 'he': // иврит
            $tpl_slug = 'departments-list-treatments-he';
            break;
        case 'en': // английский
            $tpl_slug = 'departments-list-treatments-en';
            break;
        case 'ru': // русский
            $tpl_slug = 'departments-list-treatments-ru';
            break;
        default:
            // на всякий случай оставляем базовый
            $tpl_slug = 'departments-list-treatments';
            break;
    }
}
?>

<main id="primary" class="site-main archive-departments">
    <div class="wp-block-group single-template-container">
        <?php tipress_display_breadcrumbs(); ?>

        <div class="single-template-content">
            <header class="page-header single-template-header">
                <?php
                // Заголовок архива
                the_archive_title(
                    '<h1 class="page-title" style="text-transform:uppercase;font-style:normal;font-weight:700;">',
                    '</h1>'
                );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header>

            <div class="departments-template-part">
                <?php
                // Выводим нужную "Часть шаблона"
                if ( function_exists( 'block_template_part' ) ) {
                    block_template_part( $tpl_slug );
                } else {
                    // Фоллбек для старых версий WP
                    echo do_blocks(
                        '<!-- wp:template-part {"slug":"' . esc_attr( $tpl_slug ) . '","theme":"tipress"} /-->'
                    );
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
