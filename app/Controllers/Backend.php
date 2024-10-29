<?php

	namespace BeLazy\Controllers;

	use BeLazy\Helpers\Config;

	class Backend
	{
		public function __construct()
		{
			add_action('admin_enqueue_scripts', [$this, 'enqueue_styles']);
			add_action('admin_enqueue_scripts', [$this, 'enqueue_scripts']);
			add_action('admin_menu', [$this, 'add_menu']);

			foreach(Config::get_post_types() as $post_type)
			{
				$active = Config::get('active');

				if(isset($active[$post_type->name]) && $active[$post_type->name] === '2')
				{
					add_filter('manage_' . $post_type->name . '_posts_columns', [$this, 'add_columns']);
					add_action('manage_' . $post_type->name . '_posts_custom_column', [$this, 'handle_columns'], 10, 2);
				}
			}
		}

		public function enqueue_styles()
		{
			wp_enqueue_style('be-lazy-admin', BE_LAZY_URL_CSS . 'be-lazy-admin.css', [], BE_LAZY_VERSION);
		}

		public function enqueue_scripts()
		{
			wp_enqueue_script('be-lazy-admin', BE_LAZY_URL_JS . 'be-lazy-admin.js', [], BE_LAZY_VERSION, true);
		}

		public function add_menu()
		{
			add_menu_page(
				'Be Lazy',
				'Be Lazy',
				'manage_options',
				BE_LAZY_SLUG,
				[$this, 'show_options_page'],
				BE_LAZY_URL_IMG . '/be-lazy.svg',
				999
			);
		}

		public function show_options_page()
		{
			require_once BE_LAZY_DIR_VIEWS . 'options_page.php';
		}

		public function add_columns($columns)
		{
			$columns[BE_LAZY_SLUG] = __('Be Lazy?', 'be-lazy');

			return $columns;
		}

		public function handle_columns($column, $post_id)
		{
			if($column === BE_LAZY_SLUG)
			{
				$active = get_post_meta($post_id, Config::get_name('active'), true);

				$classes = $active ? 'active' : '';

				echo '<img src="' . BE_LAZY_URL_IMG . 'be-lazy.svg" class="' . $classes . '" data-id="' . $post_id . '">';
			}
		}
	}