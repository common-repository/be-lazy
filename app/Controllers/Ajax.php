<?php

	namespace BeLazy\Controllers;

	use BeLazy\Helpers\Config;

	class Ajax
	{
		public function __construct()
		{
			add_action('wp_ajax_be_lazy_toggle', [$this, 'toggle']);
		}

		public function toggle()
		{
			$post_id = (int)$_POST['post_id'];
			$value   = (int)$_POST['value'];

			update_post_meta($post_id, Config::get_name('active'), $value);

			wp_die();
		}
	}