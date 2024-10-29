<?php

	namespace BeLazy\Controllers;

	use BeLazy\Helpers\Config;

	class Frontend
	{
		public function __construct()
		{
			add_action('wp', [$this, 'run']);
		}

		public function run()
		{
			if($this->is_active())
			{
				add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
				add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
				add_filter('the_content', [$this, 'filter_content'], 100);
			}
		}

		public function is_active()
		{
			$active    = Config::get('active');
			$post_type = get_post_type();

			switch(isset($active[$post_type]) ? $active[$post_type] : '')
			{
				case '':
					return true;
				case '1':
					return true;
				case '2':
					return (bool)get_post_meta(get_the_id(), Config::get_name('active'), true);
				default:
					return true;
			}
		}

		public function enqueue_styles()
		{
			wp_enqueue_style('be-lazy', BE_LAZY_URL_CSS . 'be-lazy.css', [], BE_LAZY_VERSION);
		}

		public function enqueue_scripts()
		{
			wp_enqueue_script('be-lazy', BE_LAZY_URL_JS . 'be-lazy.js', [], BE_LAZY_VERSION, true);
		}

		public function filter_content($content)
		{
			$content = preg_replace('~(<img[^>]*) src="~', '\1 data-lazy="', $content);

			$content = preg_replace('~(<img[^>]*) srcset="~', '\1 data-lazy-set="', $content);

			return $content;
		}
	}