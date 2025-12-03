<?php
/**
 * Plugin Name: Topi Doctor Specialization Fields
 * Description: ACF fields for doctor specialization taxonomy pages (урология, онкология, гинекология, etc.)
 * Version: 1.0.0
 * Author: Topi Development
 */

declare(strict_types=1);

/**
 * Register ACF field group for doctor specialization taxonomy
 * 
 * Привязка к таксономии specialization
 * Поля будут доступны при редактировании терминов таксономии specialization
 */
add_action('acf/init', function() {
	// Early return if ACF is not available
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	acf_add_local_field_group([
		'key' => 'topi_doctor_specialization_group',
		'title' => 'Специализация врачей',
		'fields' => get_specialization_fields(),
		'location' => [
			[
				[
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'specialization',
				],
			],
		],
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => 'Поля для терминов таксономии специализаций врачей (урология, онкология, гинекология и т.д.)',
		'show_in_rest' => 1,
	]);
});

/**
 * Get all fields for specialization pages
 * 
 * @return array
 */
function get_specialization_fields(): array {
	$fields = [];

	// TAB 1: Hero
	$fields[] = [
		'key' => 'topi_spec_tab_hero',
		'label' => 'Hero',
		'name' => 'spec_tab_hero',
		'type' => 'tab',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'placement' => 'top',
		'endpoint' => 0,
	];

	// Hero title override
	$fields[] = [
		'key' => 'topi_spec_hero_title',
		'label' => 'Hero title override',
		'name' => 'spec_hero_title',
		'type' => 'text',
		'instructions' => 'Если пусто — использовать заголовок страницы',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Main doctor (post_object)
	$fields[] = [
		'key' => 'topi_spec_hero_doctor',
		'label' => 'Main doctor (post)',
		'name' => 'spec_hero_doctor',
		'type' => 'post_object',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'post_type' => ['vrachi'],
		'taxonomy' => '',
		'allow_null' => 1,
		'multiple' => 0,
		'return_format' => 'id',
		'ui' => 1,
	];

	// Doctor position override
	$fields[] = [
		'key' => 'topi_spec_hero_doctor_position',
		'label' => 'Doctor position (override)',
		'name' => 'spec_hero_doctor_position',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Hero image
	$fields[] = [
		'key' => 'topi_spec_hero_image',
		'label' => 'Hero image',
		'name' => 'spec_hero_image',
		'type' => 'image',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'return_format' => 'id',
		'preview_size' => 'medium',
		'library' => 'all',
		'min_width' => '',
		'min_height' => '',
		'min_size' => '',
		'max_width' => '',
		'max_height' => '',
		'max_size' => '',
		'mime_types' => '',
	];

	// Intro text
	$fields[] = [
		'key' => 'topi_spec_hero_intro',
		'label' => 'Intro text',
		'name' => 'spec_hero_intro',
		'type' => 'wysiwyg',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'tabs' => 'all',
		'toolbar' => 'full',
		'media_upload' => 0,
		'delay' => 0,
	];

	// Benefits 1-5 (fixed fields instead of repeater)
	for ($i = 1; $i <= 5; $i++) {
		$fields[] = [
			'key' => 'topi_spec_hero_benefit_' . $i,
			'label' => 'Benefit #' . $i,
			'name' => 'spec_hero_benefit_' . $i,
			'type' => 'text',
			'instructions' => 'Оставить пустым, если не используется',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		];
	}

	// CTA label
	$fields[] = [
		'key' => 'topi_spec_hero_cta_label',
		'label' => 'CTA label',
		'name' => 'spec_hero_cta_label',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// CTA URL
	$fields[] = [
		'key' => 'topi_spec_hero_cta_url',
		'label' => 'CTA URL',
		'name' => 'spec_hero_cta_url',
		'type' => 'url',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
	];

	// TAB 2: Team
	$fields[] = [
		'key' => 'topi_spec_tab_team',
		'label' => 'Team',
		'name' => 'spec_tab_team',
		'type' => 'tab',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'placement' => 'top',
		'endpoint' => 0,
	];

	// Team section title
	$fields[] = [
		'key' => 'topi_spec_team_title',
		'label' => 'Section title',
		'name' => 'spec_team_title',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => 'Команда врачей',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Team doctors 1-6 (fixed slots)
	for ($i = 1; $i <= 6; $i++) {
		// Doctor post
		$fields[] = [
			'key' => 'topi_spec_team_doctor_' . $i,
			'label' => 'Doctor #' . $i . ' (post)',
			'name' => 'spec_team_doctor_' . $i,
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'post_type' => ['vrachi'],
			'taxonomy' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'id',
			'ui' => 1,
		];

		// Custom title for doctor
		$fields[] = [
			'key' => 'topi_spec_team_doctor_' . $i . '_custom_title',
			'label' => 'Doctor #' . $i . ' custom title',
			'name' => 'spec_team_doctor_' . $i . '_custom_title',
			'type' => 'text',
			'instructions' => 'Если пусто — выводить стандартный title/должность врача',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		];
	}

	// TAB 3: Section 1 - When to visit
	$fields[] = [
		'key' => 'topi_spec_tab_section1',
		'label' => 'Section 1: When to visit',
		'name' => 'spec_tab_section1',
		'type' => 'tab',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'placement' => 'top',
		'endpoint' => 0,
	];

	// Section 1 title
	$fields[] = [
		'key' => 'topi_spec_sec1_title',
		'label' => 'Section title',
		'name' => 'spec_sec1_title',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Section 1 intro
	$fields[] = [
		'key' => 'topi_spec_sec1_intro',
		'label' => 'Intro text',
		'name' => 'spec_sec1_intro',
		'type' => 'wysiwyg',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'tabs' => 'all',
		'toolbar' => 'full',
		'media_upload' => 0,
		'delay' => 0,
	];

	// Section 1 items 1-8 (text + URL)
	for ($i = 1; $i <= 8; $i++) {
		// Item text
		$fields[] = [
			'key' => 'topi_spec_sec1_item_' . $i . '_text',
			'label' => 'Item #' . $i . ' text',
			'name' => 'spec_sec1_item_' . $i . '_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		];

		// Item URL
		$fields[] = [
			'key' => 'topi_spec_sec1_item_' . $i . '_url',
			'label' => 'Item #' . $i . ' URL',
			'name' => 'spec_sec1_item_' . $i . '_url',
			'type' => 'url',
			'instructions' => 'Оставить пустым, если без ссылки',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
		];
	}

	// TAB 4: Section 2 - Second opinion
	$fields[] = [
		'key' => 'topi_spec_tab_section2',
		'label' => 'Section 2: Second opinion',
		'name' => 'spec_tab_section2',
		'type' => 'tab',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'placement' => 'top',
		'endpoint' => 0,
	];

	// Section 2 title
	$fields[] = [
		'key' => 'topi_spec_sec2_title',
		'label' => 'Section title',
		'name' => 'spec_sec2_title',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Section 2 intro
	$fields[] = [
		'key' => 'topi_spec_sec2_intro',
		'label' => 'Intro text',
		'name' => 'spec_sec2_intro',
		'type' => 'wysiwyg',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'tabs' => 'all',
		'toolbar' => 'full',
		'media_upload' => 0,
		'delay' => 0,
	];

	// Left column title
	$fields[] = [
		'key' => 'topi_spec_sec2_left_title',
		'label' => 'Left list title',
		'name' => 'spec_sec2_left_title',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Left column items 1-6
	for ($i = 1; $i <= 6; $i++) {
		$fields[] = [
			'key' => 'topi_spec_sec2_left_item_' . $i,
			'label' => 'Left item #' . $i,
			'name' => 'spec_sec2_left_item_' . $i,
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		];
	}

	// Right column title
	$fields[] = [
		'key' => 'topi_spec_sec2_right_title',
		'label' => 'Right list title',
		'name' => 'spec_sec2_right_title',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Right column items 1-6
	for ($i = 1; $i <= 6; $i++) {
		$fields[] = [
			'key' => 'topi_spec_sec2_right_item_' . $i,
			'label' => 'Right item #' . $i,
			'name' => 'spec_sec2_right_item_' . $i,
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		];
	}

	// TAB 5: Section 3 - Why private
	$fields[] = [
		'key' => 'topi_spec_tab_section3',
		'label' => 'Section 3: Why private',
		'name' => 'spec_tab_section3',
		'type' => 'tab',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'placement' => 'top',
		'endpoint' => 0,
	];

	// Section 3 title
	$fields[] = [
		'key' => 'topi_spec_sec3_title',
		'label' => 'Section title',
		'name' => 'spec_sec3_title',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Section 3 intro
	$fields[] = [
		'key' => 'topi_spec_sec3_intro',
		'label' => 'Intro text',
		'name' => 'spec_sec3_intro',
		'type' => 'wysiwyg',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'tabs' => 'all',
		'toolbar' => 'full',
		'media_upload' => 0,
		'delay' => 0,
	];

	// Section 3 items 1-8
	for ($i = 1; $i <= 8; $i++) {
		$fields[] = [
			'key' => 'topi_spec_sec3_item_' . $i,
			'label' => 'Item #' . $i,
			'name' => 'spec_sec3_item_' . $i,
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		];
	}

	// TAB 6: Author
	$fields[] = [
		'key' => 'topi_spec_tab_author',
		'label' => 'Author',
		'name' => 'spec_tab_author',
		'type' => 'tab',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'placement' => 'top',
		'endpoint' => 0,
	];

	// Author label
	$fields[] = [
		'key' => 'topi_spec_author_label',
		'label' => 'Label',
		'name' => 'spec_author_label',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => 'Автор статьи',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Author name
	$fields[] = [
		'key' => 'topi_spec_author_name',
		'label' => 'Author name',
		'name' => 'spec_author_name',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	];

	// Author link
	$fields[] = [
		'key' => 'topi_spec_author_link',
		'label' => 'Author link (optional)',
		'name' => 'spec_author_link',
		'type' => 'url',
		'instructions' => 'Ссылка на страницу врача или другую страницу',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'default_value' => '',
		'placeholder' => '',
	];

	return $fields;
}

