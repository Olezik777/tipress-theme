<?php
/**
 * Archive template for the departments custom post type.
 *
 * @package Tipress
 */

get_header();

// Текущий язык Polylang (he, en, ar и т.д.)
$lang = function_exists( 'pll_current_language' )
    ? pll_current_language()
    : '';

// Базовые слаги частей шаблона (по умолчанию)
$links_slug = 'departments-links-template';
$list_slug  = 'departments-list-treatments';

// Подбираем слаги для конкретного языка
if ( $lang ) {
    switch ( $lang ) {
        case 'he': // иврит
            $links_slug = 'departments-links-template-he';
            $list_slug  = 'departments-list-treatments-he';
            break;

        case 'en': // английский
            $links_slug = 'departments-links-template-en';
            $list_slug  = 'departments-list-treatments-en';
            break;

        case 'ar': // арабский
            $links_slug = 'departments-links-template-ar';
            $list_slug  = 'departments-list-treatments-ar';
            break;

        default:
            // остаются дефолтные slugs
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
                the_archive_title(
                    '<h1 class="page-title" style="text-transform:uppercase;font-style:normal;font-weight:700;">',
                    '</h1>'
                );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header>

            <?php
            // 1. Навигационные ссылки (departments-links-template-*)
            if ( function_exists( 'block_template_part' ) ) {
                block_template_part( $links_slug );
            } else {
                echo do_blocks(
                    '<!-- wp:template-part {"slug":"' . esc_attr( $links_slug ) . '","theme":"tipress"} /-->'
                );
            }
            ?>

            <div class="departments-template-part">
                <?php
                // 2. Основной список отделений/лечений (departments-list-treatments-*)
                if ( function_exists( 'block_template_part' ) ) {
                    block_template_part( $list_slug );
                } else {
                    echo do_blocks(
                        '<!-- wp:template-part {"slug":"' . esc_attr( $list_slug ) . '","theme":"tipress"} /-->'
                    );
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
