<?php

	namespace BeLazy\Helpers;

	use BeLazy\Helpers\Config;

	class Form
	{
		public static function radio($base, $key, $value, $default, $label)
		{
			$name = Config::get_name($base . "[$key]");

			ob_start();

			$dbvalue = Config::get($base);

			if(isset($dbvalue[$key]))
			{
				checked(Config::get($base)[$key], $value);
			}
			else
			{
				checked($default, $value);
			}

			$checked = ob_get_clean();

			require BE_LAZY_DIR_VIEWS . 'radio.php';
		}
	}