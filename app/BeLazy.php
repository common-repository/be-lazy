<?php

	namespace BeLazy;

	use BeLazy\Helpers\Config;
	use BeLazy\Controllers\Ajax;
	use BeLazy\Controllers\Backend;
	use BeLazy\Controllers\Frontend;

	class BeLazy
	{
		public function __construct()
		{
			Config::register();

			if(defined('DOING_AJAX') && DOING_AJAX)
			{
				new Ajax();
			}
			else
			{
				is_admin() ? new Backend() : new Frontend();
			}

		}
	}
