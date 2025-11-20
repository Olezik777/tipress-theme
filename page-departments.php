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

// Базовые слаги частей шаблона (дефолт, если спец. версии нет)
$header_slug  = 'departments-header-block';
$links_slug   = 'departments-links-template';
$list_slug    = 'departments-list-treatments';
$middle_slug  = 'departments';
$bottom_slug  = 'departments-bottom-text';

// Подбираем слаги для конкретного языка
if ( $lang ) {
    switch ( $lang ) {
        case 'he': // иврит
            $header_slug = 'departments-header-block-he';
            $links_slug  = 'departments-links-template-he';
            $list_slug   = 'departments-list-treatments-he';
            $middle_slug = 'departments-he';
            $bottom_slug = 'departments-bottom-text-he';
            break;

        case 'en': // английский
            $header_slug = 'departments-header-block___en';
            $links_slug  = 'departments-links-template___en';
            $list_slug   = 'departments-list-treatments___en';
            $middle_slug = 'departments___en';
            $bottom_slug = 'departments-bottom-text___en';
            break;

        case 'ar': // арабский
            $header_slug = 'departments-header-block-ar';
            $links_slug  = 'departments-links-template-ar';
            $list_slug   = 'departments-list-treatments-ar';
            $middle_slug = 'departments-ar';
            $bottom_slug = 'departments-bottom-text-ar';
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

            <?php
            // 0. Верхний header-block
            if ( function_exists( 'block_template_part' ) ) {
                block_template_part( $header_slug );
            } else {
                echo do_blocks(
                    '<!-- wp:template-part {"slug":"' . esc_attr( $header_slug ) . '","theme":"tipress"} /-->'
                );
            }
            ?>

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
            // 1. Навигационные ссылки
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
                // 2. Список лечений
                if ( function_exists( 'block_template_part' ) ) {
                    block_template_part( $list_slug );
                } else {
                    echo do_blocks(
                        '<!-- wp:template-part {"slug":"' . esc_attr( $list_slug ) . '","theme":"tipress"} /-->'
                    );
                }

                // 3. Основной блок departments
                if ( function_exists( 'block_template_part' ) ) {
                    block_template_part( $middle_slug );
                } else {
                    echo do_blocks(
                        '<!-- wp:template-part {"slug":"' . esc_attr( $middle_slug ) . '","theme":"tipress"} /-->'
                    );
                }

                // 4. Нижний текст
                if ( function_exists( 'block_template_part' ) ) {
                    block_template_part( $bottom_slug );
                } else {
                    echo do_blocks(
                        '<!-- wp:template-part {"slug":"' . esc_attr( $bottom_slug ) . '","theme":"tipress"} /-->'
                    );
                }
                ?>
            </div>

        </div><!-- /.single-template-content -->
    </div><!-- /.single-template-container -->
</main>

<?php
get_footer();
