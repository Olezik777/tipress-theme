<?php

//////////////////////////////////////////////////////////////////
//Constants
//////////////////////////////////////////////////////////////////

if ( !defined( 'THEME_DIR' ) ) {
	define('THEME_DIR', get_template_directory_uri());
}
if ( !defined( 'THEME_PATH' ) ) {
	define('THEME_PATH', get_template_directory());
}
// add_filter( 'should_load_separate_core_block_assets', '__return_true' );

remove_filter('pre_user_description', 'wp_filter_kses');
remove_filter('edit_user_description', 'wp_filter_kses');

//////////////////////////////////////////////////////////////////
// Theme Setup
//////////////////////////////////////////////////////////////////

function tipress_theme_setup() {
	load_theme_textdomain( 'tipress', THEME_PATH . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );

	// Register navigation menus
	// Using separate locations for each language to avoid Polylang auto-combinations
	register_nav_menus(
		[
			'primary'         => __( 'Основное меню', 'tipress' ),
			'footer-short'    => __( 'Футер: короткое меню', 'tipress' ),
			'footer-main-left'  => __( 'Футер: большое меню (левая колонка)', 'tipress' ),
			'footer-main-right' => __( 'Футер: большое меню (правая колонка)', 'tipress' ),
		]
	);
}
add_action( 'after_setup_theme', 'tipress_theme_setup' );

/**
 * Filter Polylang nav menu locations to prevent duplicate combinations
 * This ensures only one menu location per language is shown
 */
add_filter( 'pll_nav_menu_args', function( $args ) {
	// Only show menu locations that match current language
	if ( isset( $args['theme_location'] ) && function_exists( 'pll_current_language' ) ) {
		$current_lang = pll_current_language();
		// Polylang will automatically filter menus by language
		// This filter just ensures clean menu location names
	}
	return $args;
}, 10, 1 );


function tipress_widgets_init() {
	register_sidebar(
		[
			'name'          => __( 'Основной сайдбар', 'tipress' ),
			'id'            => 'primary-sidebar',
			'description'   => __( 'Добавьте виджеты, чтобы заменить дефолтный контент сайдбара.', 'tipress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	// Footer Address Widget Area
	register_sidebar(
		[
			'name'          => __( 'Футер: Адрес', 'tipress' ),
			'id'            => 'footer-address',
			'description'   => __( 'Виджет для отображения адреса в футере.', 'tipress' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);

	// Footer Disclaimer Widget Area
	register_sidebar(
		[
			'name'          => __( 'Футер: Текст-дисклеймер', 'tipress' ),
			'id'            => 'footer-disclaimer',
			'description'   => __( 'Виджет для текста-дисклеймера в нижней части футера.', 'tipress' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		]
	);

	// Footer Copyright Widget Area
	register_sidebar(
		[
			'name'          => __( 'Футер: Копирайт', 'tipress' ),
			'id'            => 'footer-copyright',
			'description'   => __( 'Виджет для копирайта в нижней части футера.', 'tipress' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		]
	);
}
add_action( 'widgets_init', 'tipress_widgets_init' );

//////////////////////////////////////////////////////////////////
//Includes
//////////////////////////////////////////////////////////////////

// Include shortcodes.
require THEME_PATH . '/inc/shortcodes.php';

// Include shortcodes.
// require THEME_PATH . '/plugin/Sitemap/Wpc_BasePostModel.php';
// require THEME_PATH . '/plugin/Sitemap/Wpc_PostModel.php';
// require THEME_PATH . '/plugin/Sitemap/Wpc_Pages.php';
// require THEME_PATH . '/plugin/Sitemap/Wpc_Departments.php';

//////////////////////////////////////////////////////////////////
//Styles
//////////////////////////////////////////////////////////////////

function tipress_theme_scripts() {

	// wp_enqueue_style( 'tipress-style', get_template_directory_uri() . '/assets/css/theme-styles.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'tipress-style', get_template_directory_uri() . '/assets/css/theme-styles.css', array(), filemtime(get_template_directory() . '/assets/css/theme-styles.css') );

	wp_enqueue_script( 'tipress-app', get_template_directory_uri() . '/assets/js/app.js', array(), filemtime(get_template_directory() . '/assets/js/app.js'), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'tipress_theme_scripts' );

// Load Gutenberg Editor Styles
function block_editor_styles() {
    wp_enqueue_style(
        'admin-styles',
        get_stylesheet_directory_uri().'/assets/css/style-editor.css',
				array(),
				filemtime(get_template_directory() . '/assets/css/style-editor.css')
    );
}
add_action( 'admin_enqueue_scripts', 'block_editor_styles' );

// Enqueue editor styles.
// add_editor_style( $editor_stylesheet_path );

function copy_all_in_one_seo_meta_to_yoast_seo($post_id) {
	// Перевірка, чи належить тип посту до кастомних постів "doctors" або "departments"
	if (get_post_type($post_id) === 'doctors' || get_post_type($post_id) === 'departments') {
			// Отримання значень мета-заголовка та мета-опису з All in One SEO
			$meta_title = get_post_meta($post_id, '_aioseo_title', true);
			$meta_description = get_post_meta($post_id, '_aioseo_description', true);

			// Оновлення мета-заголовка та мета-опису Yoast SEO
			update_post_meta($post_id, '_yoast_wpseo_title', $meta_title);
			update_post_meta($post_id, '_yoast_wpseo_metadesc', $meta_description);
	}
}
// add_action('save_post', 'copy_all_in_one_seo_meta_to_yoast_seo');



// remove feeds
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Disable core patterns
// add_action( 'after_setup_theme', 'block_course_theme_setup_patterns' );
// function block_course_theme_setup_patterns() {
//     remove_theme_support( 'core-block-patterns' );
// }


add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}



/**
 * Polylang Shortcode - https://wordpress.org/plugins/polylang/
 * Add this code in your functions.php
 * Put shortcode [polylang_langswitcher] to post/page for display flags
 *
 * @return string
 */
function custom_polylang_langswitcher() {
	$output = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$args   = [
			'dropdown'		=> 1,
			'show_flags'	=> 1,
			'show_names'	=> 1,
			'echo'				=> 0,
		];
		$output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
	}

	return $output;
}

add_shortcode( 'langswitcher', 'custom_polylang_langswitcher' );

add_action( 'init', function() {
	register_post_meta( 'post', '_featured', [
		'show_in_rest' => true,
		'single' => true,
		'type' => 'boolean',
	] );

	register_post_meta( 'post', '_notes', [
		'show_in_rest' => true,
		'single' => true,
		'type' => 'string',
	] );
} );


/**
 * Temparary function for updates meta field.
 */
function modify_meta_field_position($post_id) {

    // Перевірка, що це не автозбереження та є правильна перевірка nonce
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    // Перевірка, чи існує значення поля _meta_fields_position в POST-запиті
    if (!isset($_POST['_meta_fields_position']))
        return $post_id;

    // Перевірка прав доступу
    if ('post' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id))
            return $post_id;
    } elseif (!current_user_can('edit_page', $post_id)) {
        return $post_id;
    }

		$_title = get_the_title($post_id);
		$filed_value = explode( ' ', $doc_title , 3);

    // Встановлення значення метаполя
    update_post_meta($post_id, '_meta_fields_position', $filed_value);
}

add_action('save_post', 'modify_meta_field_position');
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * Recent post shortcode
 */

// Функція для відображення останніх постів з певної категорії за її slug
function custom_recent_posts_shortcode1($atts) {
    // Опції за замовчуванням для шорткоду
    $atts = shortcode_atts(array(
        'category_slug' => '',  // Slug категорії (за замовчуванням - порожній)
        'post_ids' => '', // Рядок з ID постів (за замовчуванням - порожній)
    ), $atts);

    // Перевірка, чи вказаний slug категорії
    if (!empty($atts['category_slug'])) {
        $category = get_term_by('slug', $atts['category_slug'], 'category');
        if ($category) {
            $args = array(
                'category__in' => array($category->term_id),
                'posts_per_page' => 6,
            );
        }
    } else {
        $args = array(
            'posts_per_page' => 6,
        );
    }

    // Перевірка, чи вказані ID постів
    if (!empty($atts['post_ids'])) {
        $post_ids = explode(',', $atts['post_ids']);
        $args['post__in'] = $post_ids;
    }

    // Запит на пости
    $query = new WP_Query($args);

    // Виведення постів
    if ($query->have_posts()) {
        $output = '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        $output .= '</ul>';
    } else {
        $output = 'Пости не знайдено.';
    }

    // Повернення результату
    wp_reset_postdata();
    return $output;
}

// Додавання шорткоду
add_shortcode('custom_recent_posts', 'custom_recent_posts_shortcode1');

// Polylang Shortcode - https://wordpress.org/plugins/polylang/
// Add this code in your functions.php
// Put shortcode [polylang] to post/page for display flags

function polylang_shortcode($atts) {
    if (function_exists('pll_current_language')) {
        // Получаем текущий язык
        $current_lang = pll_current_language();

        // Проверяем язык и возвращаем соответствующий HTML
        if ($current_lang == 'ru') {
            return '<div><a onclick="return !window.location(this.href)" href="https://api.whatsapp.com/send?phone=972528780569&amp;text=Здравствуйте!%20Я%20хочу%20узнать%20подробности%20лечения%20в%20клинике%20Ихилов." class="whtsapp">
                    </a></div>';
        } elseif ($current_lang == 'il') {
            return '<div><a onclick="return !window.location(this.href)" href="https://api.whatsapp.com/send?phone=972524375575&amp;" class="whtsapp">
                    </a></div>';
        } elseif ($current_lang == 'en') {
            return '<div><a onclick="return !window.location(this.href)" href="https://api.whatsapp.com/send?phone=972528780569&amp;text=Здравствуйте!%20Я%20хочу%20узнать%20подробности%20лечения%20в%20клинике%20Ихилов." class="whtsapp">
                    </a></div>';
        }
    }

    // Возвращаем пустую строку, если функция не сработала
    return '';
}
add_shortcode('whatsapp_mob', 'polylang_shortcode');


/**
 * Add Virtual spirit chat.
 */
function custom_add_virtual_sporit() {
	if (function_exists('pll_current_language')) {
        // Получаем текущий язык
        $current_lang = pll_current_language();

        // Проверяем условие для страницы с ID = 10 на русском языке
        if ($current_lang == 'ru') {
            ?>
			<script type="text/javascript">
				setTimeout(function(){
					var vsid = "sa24596";
					(function() {
						var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
						vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.virtualspirits.com/vsa/chat-'+vsid+'.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
					})();
				}, 6000);
			</script>
			<?php
        }
    }
	
}
add_action( 'wp_body_open', 'custom_add_virtual_sporit' );



function custom_posts_shortcode($atts) {
    // Получаем текущую рубрику
    $current_category = get_queried_object();

    // Параметры шорткода
    $atts = shortcode_atts(array(
        'posts_per_page' => 10, // Количество постов на странице
    ), $atts, 'custom_posts');

    // Получаем номер текущей страницы
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // Запрос постов из текущей рубрики
    $query = new WP_Query(array(
        'category_name' => $current_category->slug,
        'posts_per_page' => $atts['posts_per_page'],
        'paged' => $paged,
    ));

    // Начинаем вывод
    $output = '<div class="custom-posts">';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<div class="post_item test_888">';
            $output .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            if (has_post_thumbnail()) {
                $output .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail() . '</a>';
            }
            $output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
            $output .= '<a href="' . get_permalink() . '" class="read-more">Читать далее</a>';
            $output .= '</div>'; // .post-item
        }

        // Пагинация
        $big = 999999999; // уникальное число
        $output .= '<div class="custom_pagination">' . paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $query->max_num_pages,
        )) . '</div>';

        wp_reset_postdata();
    } else {
        $output .= '<p>Посты не найдены.</p>';
    }

    $output .= '</div>'; // .custom-posts

    return $output;
}
add_shortcode('custom_posts', 'custom_posts_shortcode');

/**
 * Safe Polylang translation function with fallback
 */
if ( ! function_exists( 'tipress_pll__' ) ) {
	function tipress_pll__( $string ) {
		if ( function_exists( 'pll__' ) ) {
			return pll__( $string );
		}
		return $string;
	}
}

add_action('init', function() {
	if ( ! function_exists( 'pll_register_string' ) ) {
		return;
	}
	
	// SEO strings
    pll_register_string('seo_description', 'Описание', 'seo_tags');
	pll_register_string('seo_title', 'Отделения', 'seo_tags');
	pll_register_string('seo_description_doctors', 'Описание Врачи', 'seo_tags');
	pll_register_string('seo_title_doctors', 'Заголовок Врачи', 'seo_tags');
	
	// Header strings
	pll_register_string('Выбрать язык', 'Выбрать язык', 'Header');
	pll_register_string('Поиск', 'Поиск', 'Header');
	pll_register_string('Открыть меню', 'Открыть меню', 'Header');
	pll_register_string('Позвонить', 'Позвонить', 'Header');
	pll_register_string('Основная навигация', 'Основная навигация', 'Header');
	pll_register_string('Мобильное меню', 'Мобильное меню', 'Header');
	pll_register_string('Тель-Авив, ул. Вайцман 14', 'Тель-Авив, ул. Вайцман 14', 'Header');
	
	// Footer strings
	pll_register_string('Телефон', 'Телефон', 'Footer');
	pll_register_string('WhatsApp', 'WhatsApp', 'Footer');
	pll_register_string('Whatsapp', 'Whatsapp', 'Footer');
	pll_register_string('Viber', 'Viber', 'Footer');
	pll_register_string('Email', 'Email', 'Footer');
	pll_register_string('Mail', 'Mail', 'Footer');
	pll_register_string('Короткое меню футера', 'Короткое меню футера', 'Footer');
	pll_register_string('Основное меню футера (левая колонка)', 'Основное меню футера (левая колонка)', 'Footer');
	pll_register_string('Основное меню футера (правая колонка)', 'Основное меню футера (правая колонка)', 'Footer');
	
	// Breadcrumbs strings
	pll_register_string('Хлебные крошки', 'Хлебные крошки', 'Breadcrumbs');
	pll_register_string('Главная', 'Главная', 'Breadcrumbs');
	pll_register_string('Врачи', 'Врачи', 'Breadcrumbs');
	pll_register_string('Отделения', 'Отделения', 'Breadcrumbs');
	pll_register_string('Результаты поиска для: %s', 'Результаты поиска для: %s', 'Breadcrumbs');
	pll_register_string('Страница не найдена', 'Страница не найдена', 'Breadcrumbs');
});

//Функция переопределения SEO мета-тегов для Departments
function custom_seo_title_for_departments_aioseo( $title ) {
    // Получаем текущий URL
    $current_url = $_SERVER['REQUEST_URI'];

    // Проверяем, что это страница с URL, содержащим 'departments'
    if (is_post_type_archive('departments')) {
        // Получаем перевод строки 'seo_title' для текущего языка
        $translated_title = pll__('Отделения');
        
        // Если строка перевода существует, возвращаем её в качестве нового заголовка
        if ($translated_title) {
            return $translated_title;
        }
    } elseif (is_post_type_archive('doctors')) {
        // Получаем перевод строки 'seo_title' для архива 'doctors'
        $translated_title = pll__('Заголовок Врачи');
        
        // Если строка перевода существует, возвращаем её в качестве нового заголовка
        if ($translated_title) {
            return $translated_title;
        }
    }

    // Возвращаем оригинальный заголовок, если это не 'departments'
    return $title;
}

// Подключаем функцию к фильтру All in One SEO для изменения заголовка title
add_filter('aioseo_title', 'custom_seo_title_for_departments_aioseo');
// Функция для изменения description
function custom_seo_description_for_departments_aioseo( $description ) {
    // Получаем текущий URL
    $current_url = $_SERVER['REQUEST_URI'];

    // Проверяем, что это страница с URL, содержащим 'departments'
    if (is_post_type_archive('departments')) {
        // Получаем перевод строки 'seo_description' для текущего языка
        $translated_description = pll__('Описание');
        
        // Если строка перевода существует, возвращаем её в качестве нового мета описания
        if ($translated_description) {
            return $translated_description;
        }
    } elseif (is_post_type_archive('doctors')) {
        // Получаем перевод строки 'seo_description' для текущего языка
        $translated_description = pll__('Описание Врачи');
        
        // Если строка перевода существует, возвращаем её в качестве нового мета описания
        if ($translated_description) {
            return $translated_description;
        }
    }

    // Возвращаем оригинальное описание, если это не 'departments'
    return $description;
}

// Подключаем функции к фильтрам All in One SEO для изменения заголовка и описания
add_filter('aioseo_description', 'custom_seo_description_for_departments_aioseo');

add_action('wp_footer', function () {
    // Проверяем, чтобы код выполнялся только на страницах с URL "/il/doctors"
    if (strpos($_SERVER['REQUEST_URI'], '/il/doctors') !== false) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                // Заменяем текст "Врачи" на "רופאים" на всей странице
                $('.breadcrumb-items').html(function (index, html) {
                    return html.replace(/Врачи/g, 'רופאים');
                });
            });
        </script>
        <?php
    }
});


// custom breadcrumbs
function custom_breadcrumbs_shortcode() {
    // Получаем текущий язык с помощью Polylang
    $current_lang = function_exists('pll_current_language') ? pll_current_language() : null;

    // Если язык иврит
    if ($current_lang === 'il') {
        // Для архива типа "doctors"
        if (is_post_type_archive('doctors')) {
            $breadcrumbs = '<ul class="breadcrumbs_custom">';
            $breadcrumbs .= '<li><a href="https://www.topichilov.com/il/">טופ איכילוב</a></li>';
            $breadcrumbs .= '<li>רופאים</li>'; // Заголовок архива
            $breadcrumbs .= '</ul>';
            return $breadcrumbs;
        }

        // Для архива типа "departments"
        if (is_post_type_archive('departments')) {
            $breadcrumbs = '<ul class="breadcrumbs_custom">';
            $breadcrumbs .= '<li><a href="https://www.topichilov.com/il/">טופ איכילוב</a></li>';
            $breadcrumbs .= '<li>מחלקות</li>'; // Заголовок архива
            $breadcrumbs .= '</ul>';
            return $breadcrumbs;
        }

        // Для записи типа "doctors"
        if (!is_archive() && get_post_type() === 'doctors') {
            $post_title = get_the_title();
            $breadcrumbs = '<ul class="breadcrumbs_custom">';
            $breadcrumbs .= '<li><a href="https://www.topichilov.com/il/">טופ איכילוב</a></li>';
            $breadcrumbs .= '<li><a href="https://www.topichilov.com/il/doctors/">רופאים</a></li>';
            $breadcrumbs .= '<li>' . esc_html($post_title) . '</li>';
            $breadcrumbs .= '</ul>';
            return $breadcrumbs;
        }
		
		// Для записи типа "Departments"
        if (!is_archive() && get_post_type() === 'departments') {
            $post_title = get_the_title();
            $breadcrumbs = '<ul class="breadcrumbs_custom">';
            $breadcrumbs .= '<li><a href="https://www.topichilov.com/il/">טופ איכילוב</a></li>';
            $breadcrumbs .= '<li><a href="https://www.topichilov.com/il/departments/">מחלקות</a></li>';
            $breadcrumbs .= '<li>' . esc_html($post_title) . '</li>';
            $breadcrumbs .= '</ul>';
            return $breadcrumbs;
        }
		
		//для всех остальных страниц
		else {
			$post_title = get_the_title();
            $breadcrumbs = '<ul class="breadcrumbs_custom">';
            $breadcrumbs .= '<li><a href="https://www.topichilov.com/il/">טופ איכילוב</a></li>';
            $breadcrumbs .= '<li>' . esc_html($post_title) . '</li>';
            $breadcrumbs .= '</ul>';
            return $breadcrumbs;
		}
    }

    // Вывод другого кода для других языков
    if ($current_lang !== 'il') {
        return '<!-- Custom breadcrumbs for other languages can go here -->';
    }

    return ''; // Если условия не выполняются, ничего не выводим
}

// Регистрируем шорткод [custom_breadcrumbs]
add_shortcode('custom_breadcrumbs', 'custom_breadcrumbs_shortcode');

/**
 * Custom breadcrumbs with Polylang support and Schema markup
 * 
 * @return void
 */
function tipress_display_breadcrumbs() {
	// Не показываем на главной странице
	if ( is_front_page() ) {
		return;
	}

	$is_rtl = is_rtl();
	$breadcrumbs_class = 'ti-breadcrumbs';
	if ( $is_rtl ) {
		$breadcrumbs_class .= ' ti-breadcrumbs--rtl';
	}

	// Получаем текущий язык
	$current_lang = function_exists( 'pll_current_language' ) ? pll_current_language() : null;
	
	// Собираем хлебные крошки
	$breadcrumbs = [];
	
	// Главная страница
	$home_url = function_exists( 'pll_home_url' ) && $current_lang ? pll_home_url( $current_lang ) : home_url( '/' );
	$home_text = tipress_pll__( 'Главная' );
	$breadcrumbs[] = [
		'name' => $home_text,
		'url'  => $home_url,
	];

	// Обрабатываем разные типы страниц
	if ( is_singular() ) {
		$post = get_queried_object();
		$post_type = get_post_type();
		
		// Для кастомных типов постов добавляем архив
		if ( in_array( $post_type, [ 'doctors', 'departments' ] ) ) {
			$archive_url = get_post_type_archive_link( $post_type );
			
			// Получаем перевод URL архива для текущего языка через Polylang
			if ( function_exists( 'pll_translate_url' ) && $current_lang ) {
				$archive_url = pll_translate_url( $archive_url, $current_lang );
			}
			
			$archive_title = '';
			if ( $post_type === 'doctors' ) {
				$archive_title = tipress_pll__( 'Врачи' );
			} elseif ( $post_type === 'departments' ) {
				$archive_title = tipress_pll__( 'Отделения' );
			}
			
			if ( $archive_url && $archive_title ) {
				$breadcrumbs[] = [
					'name' => $archive_title,
					'url'  => $archive_url,
				];
			}
		}
		
		// Для обычных постов добавляем категорию, если есть
		if ( $post_type === 'post' ) {
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
				$category = $categories[0];
				$category_url = get_category_link( $category->term_id );
				// Получаем перевод категории, если доступен
				if ( function_exists( 'pll_get_term' ) && $current_lang ) {
					$translated_term = pll_get_term( $category->term_id, $current_lang );
					if ( $translated_term ) {
						$category_url = get_term_link( $translated_term, 'category' );
						$category = get_term( $translated_term, 'category' );
					}
				}
				
				$breadcrumbs[] = [
					'name' => $category->name,
					'url'  => $category_url,
				];
			}
		}
		
		// Для страниц добавляем родительские страницы
		if ( $post_type === 'page' ) {
			$ancestors = get_post_ancestors( $post->ID );
			if ( ! empty( $ancestors ) ) {
				$ancestors = array_reverse( $ancestors );
				foreach ( $ancestors as $ancestor_id ) {
					$ancestor_url = get_permalink( $ancestor_id );
					// Получаем перевод страницы, если доступен
					if ( function_exists( 'pll_get_post' ) && $current_lang ) {
						$translated_post_id = pll_get_post( $ancestor_id, $current_lang );
						if ( $translated_post_id ) {
							$ancestor_url = get_permalink( $translated_post_id );
							$ancestor_title = get_the_title( $translated_post_id );
						} else {
							$ancestor_title = get_the_title( $ancestor_id );
						}
					} else {
						$ancestor_title = get_the_title( $ancestor_id );
					}
					
					$breadcrumbs[] = [
						'name' => $ancestor_title,
						'url'  => $ancestor_url,
					];
				}
			}
		}
		
		// Текущая страница
		$current_title = get_the_title();
		$current_url = get_permalink();
		
		$breadcrumbs[] = [
			'name' => $current_title,
			'url'  => $current_url,
		];
		
	} elseif ( is_archive() ) {
		if ( is_post_type_archive() ) {
			$post_type = get_post_type();
			$archive_title = '';
			
			if ( $post_type === 'doctors' ) {
				$archive_title = tipress_pll__( 'Врачи' );
			} elseif ( $post_type === 'departments' ) {
				$archive_title = tipress_pll__( 'Отделения' );
			} else {
				$archive_title = post_type_archive_title( '', false );
			}
			
			$archive_url = get_post_type_archive_link( $post_type );
			
			// Получаем перевод URL архива для текущего языка через Polylang
			if ( function_exists( 'pll_translate_url' ) && $current_lang ) {
				$archive_url = pll_translate_url( $archive_url, $current_lang );
			}
			
			$breadcrumbs[] = [
				'name' => $archive_title,
				'url'  => $archive_url,
			];
			
		} elseif ( is_category() ) {
			$category = get_queried_object();
			$category_url = get_category_link( $category->term_id );
			
			// Получаем перевод категории, если доступен
			if ( function_exists( 'pll_get_term' ) && $current_lang ) {
				$translated_term = pll_get_term( $category->term_id, $current_lang );
				if ( $translated_term ) {
					$category_url = get_term_link( $translated_term, 'category' );
					$category = get_term( $translated_term, 'category' );
				}
			}
			
			$breadcrumbs[] = [
				'name' => $category->name,
				'url'  => $category_url,
			];
			
		} elseif ( is_tag() ) {
			$tag = get_queried_object();
			$tag_url = get_tag_link( $tag->term_id );
			
			// Получаем перевод тега, если доступен
			if ( function_exists( 'pll_get_term' ) && $current_lang ) {
				$translated_term = pll_get_term( $tag->term_id, $current_lang );
				if ( $translated_term ) {
					$tag_url = get_term_link( $translated_term, 'post_tag' );
					$tag = get_term( $translated_term, 'post_tag' );
				}
			}
			
			$breadcrumbs[] = [
				'name' => $tag->name,
				'url'  => $tag_url,
			];
			
		} elseif ( is_tax() ) {
			$term = get_queried_object();
			$term_url = get_term_link( $term );
			
			// Получаем перевод термина, если доступен
			if ( function_exists( 'pll_get_term' ) && $current_lang ) {
				$translated_term = pll_get_term( $term->term_id, $current_lang );
				if ( $translated_term ) {
					$term_url = get_term_link( $translated_term, $term->taxonomy );
					$term = get_term( $translated_term, $term->taxonomy );
				}
			}
			
			$breadcrumbs[] = [
				'name' => $term->name,
				'url'  => $term_url,
			];
			
		} else {
			$archive_title = get_the_archive_title();
			$archive_url = get_post_type_archive_link( get_post_type() );
			
			if ( $archive_title ) {
				$breadcrumbs[] = [
					'name' => $archive_title,
					'url'  => $archive_url ? $archive_url : '',
				];
			}
		}
		
	} elseif ( is_search() ) {
		$search_query = get_search_query();
		$breadcrumbs[] = [
			'name' => sprintf( tipress_pll__( 'Результаты поиска для: %s' ), $search_query ),
			'url'  => get_search_link(),
		];
		
	} elseif ( is_404() ) {
		$breadcrumbs[] = [
			'name' => tipress_pll__( 'Страница не найдена' ),
			'url'  => '',
		];
	}

	// Если нет крошек, не выводим ничего
	if ( empty( $breadcrumbs ) ) {
		return;
	}

	// Выводим HTML
	echo '<nav class="' . esc_attr( $breadcrumbs_class ) . '" aria-label="' . esc_attr( tipress_pll__( 'Хлебные крошки' ) ) . '">';
	echo '<ol class="ti-breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">';
	
	$position = 1;
	foreach ( $breadcrumbs as $index => $crumb ) {
		$is_last = ( $index === count( $breadcrumbs ) - 1 );
		$item_class = 'ti-breadcrumbs__item';
		if ( $is_last ) {
			$item_class .= ' ti-breadcrumbs__item--current';
		}
		
		echo '<li class="' . esc_attr( $item_class ) . '" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
		
		if ( $is_last || empty( $crumb['url'] ) ) {
			echo '<span itemprop="name">' . esc_html( $crumb['name'] ) . '</span>';
			echo '<meta itemprop="position" content="' . esc_attr( $position ) . '">';
		} else {
			echo '<a href="' . esc_url( $crumb['url'] ) . '" class="ti-breadcrumbs__link" itemprop="item">';
			echo '<span itemprop="name">' . esc_html( $crumb['name'] ) . '</span>';
			echo '</a>';
			echo '<meta itemprop="position" content="' . esc_attr( $position ) . '">';
		}
		
		echo '</li>';
		$position++;
	}
	
	echo '</ol>';
	echo '</nav>';

	// Выводим JSON-LD Schema разметку
	$schema_items = [];
	$schema_position = 1;
	
	foreach ( $breadcrumbs as $index => $crumb ) {
		$is_last = ( $index === count( $breadcrumbs ) - 1 );
		// Для последнего элемента используем текущий URL, если он пустой
		$item_url = ! empty( $crumb['url'] ) ? $crumb['url'] : '';
		if ( $is_last && empty( $item_url ) ) {
			// Для последнего элемента используем текущий URL страницы
			if ( is_singular() ) {
				$item_url = get_permalink();
			} elseif ( is_archive() ) {
				$item_url = get_pagenum_link();
			} else {
				$item_url = home_url( $_SERVER['REQUEST_URI'] );
			}
		}
		
		$schema_items[] = [
			'@type'    => 'ListItem',
			'position' => $schema_position,
			'name'     => $crumb['name'],
			'item'     => $item_url,
		];
		$schema_position++;
	}
	
	$schema = [
		'@context' => 'https://schema.org',
		'@type'    => 'BreadcrumbList',
		'itemListElement' => $schema_items,
	];
	
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
}


/**
 * Добавляем протокол viber
 */
add_filter( 'kses_allowed_protocols', 'add_viber_to_allowed_protocols' );

function add_viber_to_allowed_protocols( $protocols ) {
	$protocols[] = 'viber';

	return $protocols;
}

function replace_h2_with_span_in_gutenberg($block_content, $block) {
    // Проверяем, содержит ли блок нужный класс
    if (!empty($block_content) && strpos($block_content, 'bod-block-popup-wrap') !== false) {
        $block_content = preg_replace('/<h2([^>]*)>(.*?)<\/h2>/', '<span$1 class="modal_title">$2</span>', $block_content);
    }
    return $block_content;
}
add_filter('render_block', 'replace_h2_with_span_in_gutenberg', 10, 2);

//Обьединяем разметку для FAQ аккордеона

add_filter( 'aioseo_connect_lms_request', '__return_false' );



/**
 * Используем локали для hreflang (en-GB, ru-RU, he-IL, ar-AE)
 * + добавляем x-default на дефолтный язык.
 */

// 1) Меняем ключи массива hreflang на локали
// Локали в hreflang (ru-RU, en-GB, he-IL, ar-AE) — ключ берём из первых 2-х букв локали.
add_filter( 'pll_rel_hreflang_attributes', function( $hreflangs ) {

    if ( function_exists( 'pll_languages_list' ) ) {
        $locales = pll_languages_list( [ 'fields' => 'locale' ] ); // ['ru_RU','en_GB','he_IL','ar_AE']

        foreach ( $locales as $loc ) {
            $parts  = explode( '_', $loc, 2 );          // ['he','IL']
            $code   = strtolower( $parts[0] );          // 'he'
            $w3c    = $parts[1] ? $parts[0] . '-' . $parts[1] : $parts[0]; // 'he-IL'
            $w3c    = strtolower( $parts[0] ) . ( $parts[1] ? '-' . strtoupper( $parts[1] ) : '' );

            if ( isset( $hreflangs[ $code ] ) ) {
                $hreflangs[ $w3c ] = $hreflangs[ $code ];
                unset( $hreflangs[ $code ] );
            }
        }
    }

    // x-default на дефолтный язык (если есть ru-RU — возьмём его, иначе первый)
    foreach ( ['ru-RU','en-GB','he-IL','ar-AE','ru','en','he','ar'] as $k ) {
        if ( isset( $hreflangs[ $k ] ) ) { $hreflangs['x-default'] = $hreflangs[ $k ]; break; }
    }
    if ( ! isset( $hreflangs['x-default'] ) ) {
        $first = reset( $hreflangs ); if ( is_string( $first ) ) $hreflangs['x-default'] = $first;
    }

    return $hreflangs;
}, 20 );


/**
 * Рендер грида врачей (используется и в шаблоне, и в AJAX)
 */
function tipress_render_doctors_grid( $term_slug = 'all', $paged = 1, $lang = '' ) {
    $args = array(
        'post_type'      => 'doctors',
        'posts_per_page' => 20,
        'paged'          => max( 1, (int) $paged ),
        'orderby'        => array(
            'menu_order' => 'ASC',
            'title'      => 'ASC',
        ),
    );

    if ( $term_slug && $term_slug !== 'all' ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'specialization',
                'field'    => 'slug',
                'terms'    => $term_slug,
            ),
        );
    }

    // Polylang: фильтруем по текущему языку
    if ( $lang && function_exists( 'pll_current_language' ) ) {
        $args['lang'] = $lang;
    }

    $q = new WP_Query( $args );

    ob_start();
    ?>

    <div class="doctors-grid">
        <?php if ( $q->have_posts() ) : ?>
            <?php
            while ( $q->have_posts() ) :
                $q->the_post();
                get_template_part( 'template-parts/content', 'doctors' );
            endwhile;
            ?>
        <?php else : ?>
            <p class="no-doctors"><?php _e( 'Врачи не найдены.', 'tipress' ); ?></p>
        <?php endif; ?>
    </div>

    <?php if ( $q->max_num_pages > 1 ) : ?>
        <nav class="doctors-pagination" aria-label="<?php esc_attr_e( 'Doctors pagination', 'tipress' ); ?>">
            <ul>
                <?php
                $current = max( 1, (int) $paged );
                $max     = (int) $q->max_num_pages;

                // prev
                if ( $current > 1 ) {
                    echo '<li><a href="#" data-page="' . ( $current - 1 ) . '" class="prev">&laquo;</a></li>';
                }

                for ( $i = 1; $i <= $max; $i++ ) {
                    $class = $i === $current ? ' class="is-current"' : '';
                    echo '<li><a href="#" data-page="' . $i . '"' . $class . '>' . $i . '</a></li>';
                }

                // next
                if ( $current < $max ) {
                    echo '<li><a href="#" data-page="' . ( $current + 1 ) . '" class="next">&raquo;</a></li>';
                }
                ?>
            </ul>
        </nav>
    <?php endif; ?>

    <?php
    wp_reset_postdata();

    return ob_get_clean();
}

/**
 * AJAX: фильтр врачей
 */
function tipress_ajax_doctors_filter() {
    check_ajax_referer( 'tipress_doctors_filter', 'nonce' );

    $term = isset( $_POST['term'] ) ? sanitize_text_field( $_POST['term'] ) : 'all';
    $page = isset( $_POST['page'] ) ? (int) $_POST['page'] : 1;
    $lang = isset( $_POST['lang'] ) ? sanitize_text_field( $_POST['lang'] ) : '';

    $html = tipress_render_doctors_grid( $term, $page, $lang );

    wp_send_json_success( array(
        'html'  => $html,
        'term'  => $term,
        'page'  => $page,
    ) );
}
add_action( 'wp_ajax_tipress_doctors_filter', 'tipress_ajax_doctors_filter' );
add_action( 'wp_ajax_nopriv_tipress_doctors_filter', 'tipress_ajax_doctors_filter' );

/**
 * Скрипт фильтра для страницы doctors
 */
function tipress_enqueue_doctors_filter_assets() {
    if ( ! is_page( 'doctors' ) ) {
        return;
    }

    wp_enqueue_script(
        'tipress-doctors-filter',
        get_stylesheet_directory_uri() . '/assets/js/doctors-filter.js',
        array( 'jquery' ),
        filemtime( get_stylesheet_directory() . '/assets/js/doctors-filter.js' ),
        true
    );

    wp_localize_script(
        'tipress-doctors-filter',
        'TipressDoctors',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'tipress_doctors_filter' ),
            'lang'     => function_exists( 'pll_current_language' ) ? pll_current_language() : '',
        )
    );
}
add_action( 'wp_enqueue_scripts', 'tipress_enqueue_doctors_filter_assets' );
