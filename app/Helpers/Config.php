<?php

	namespace BeLazy\Helpers;

	class Config
	{
		public static function get_name($option)
		{
			return implode('_', [BE_LAZY_SLUG_DB, $option]);
		}

		public static function register()
		{
			// Active status
			register_setting(BE_LAZY_SLUG, self::get_name('active'));
		}

		public static function get($option)
		{
			return get_option(self::get_name($option));
		}

		public static function get_post_types()
		{
			$post_types = array_merge(['page', 'post'], get_post_types([
				'_builtin' => false,
				'show_ui'  => true
			]));

			$post_types = array_diff($post_types, [
				'elementor_font',
				'elementor_library'
			]);

			return array_map('get_post_type_object', $post_types);
		}
	}