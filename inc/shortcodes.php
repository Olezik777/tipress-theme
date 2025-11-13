<?php

function enqueue_slick_scripts() {
	// Підключення Slick.js
	wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_slick_scripts');
function modify_slick_css_loading($html, $handle, $href, $media) {
    if ($handle === 'slick-css') {
        return '<link rel="preload" as="style" href="' . $href . '" onload="this.onload=null;this.rel=\'stylesheet\'">';
    }
    return $html;
}
add_filter('style_loader_tag', 'modify_slick_css_loading', 10, 4);

function processText($text, $word_count, $letter_count) {
    // Розбиваємо текст на слова
    $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);

    // Вибираємо задану кількість слів з початку тексту
    $selected_words = array_slice($words, 0, $word_count);

    // Об'єднуємо обрані слова, щоб створити обрізаний текст
    $processed_text = implode(' ', $selected_words);

    // Якщо обрізаний текст має більше символів, ніж $letter_count, обрізаємо і додаємо "..."
    if (mb_strlen($processed_text) > $letter_count) {
        $processed_text = mb_substr($processed_text, 0, $letter_count) . '...';
    }

    return $processed_text;
}

function custom_recent_posts_carousel_shortcode($atts) {
    // Опції за замовчуванням для шорткоду
		$title_st = 'text-align:left;font-style:normal;font-weight:600;text-transform:capitalize;';

    $atts = shortcode_atts(array(
        'category_slug' => '',  // Slug категорії (за замовчуванням - порожній)
        'post_ids' => '', // Рядок з ID постів (за замовчуванням - порожній)
        'slidestoshow' => '', // Значення за замовчуванням для slidesToShow
    ), $atts);

		// For pages slider set the title height 50px
		if (! empty( $atts['post_ids'] ) ) {
			$title_st .= 'min-height:46px';
		}


    // Отримання значення slidesToShow з атрибуту шорткоду
    $slidesToShow = intval($atts['slidestoshow']);
    // $slidesToShow = 4;

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

   if (!empty($atts['post_ids'])) {
        // Перевірка, чи вказані ID сторінок
        if (preg_match('/\d+(,\d+)*/', $atts['post_ids'])) {
            $post_ids = explode(',', $atts['post_ids']);
            $args['post_type'] = 'page'; // Встановлення типу посту на сторінки
            $args['post__in'] = $post_ids;
        } else {
            $post_ids = explode(',', $atts['post_ids']);
            $args['post__in'] = $post_ids;
        }
    }

    // Запит на пости
    $query = new WP_Query($args);

    // Виведення постів у вигляді каруселі з атрибутом slidesToShow
    if ($query->have_posts()) {
        $output = '<div class="post-carousel" data-slides-to-show="' . $slidesToShow . '">';
        $output .= '<ul>';
        while ($query->have_posts()) {
					$query->the_post();
					$post_id = $query->ID;
					$output .= '<li>';
					$output .= '<a href="' . get_permalink() . '" class="initial-color">';
					$output .= '<div class="wp-block-post-featured-image">' . get_the_post_thumbnail($post_id, 'medium') . '</div>';
					$output .= '<p style="'.$title_st.'" class="title line-clamp-31 initial-color">' . processText( get_the_title(), 17, 100 ) . '</p>';
					// $output .= '<p style="'.$title_st.'" class="title line-clamp-31 initial-color">' . get_the_title() . '</p>';
					$output .= '<p class="post-excerpt line-clamp-71 wp-block-post-excerpt__excerpt initial-color">' . processText( get_the_excerpt(), 40, 196 ) . '</p>';
					$output .= '<div class="arrow"><img src="'. get_stylesheet_directory_uri() . '/assets/images/arrow-3.png'  .'" /></div>';
					$output .= '</a>';
					$output .= '</li>';
        }
        $output .= '</ul>';
        $output .= '</div>';
    } else {
        $output = 'Пости не знайдено.';
    }

    // Повернення результату та скрипту Slick.js
    wp_reset_postdata();
    return $output;
}

// Додавання шорткоду
add_shortcode('custom_recent_posts_carousel', 'custom_recent_posts_carousel_shortcode');