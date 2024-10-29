<?php

	/*
	 * Plugin Name:	Be Lazy
	 * Plugin URI:
	 * Description:
	 * Version:		1.2.1
	 * Author:		Dominik Büchler <dominik.buechler@webtimal.ch>
	 * Author URI:	https://www.webtimal.ch/
	 * License:		GPL-3.0-or-later
	 * License URI: https://www.gnu.org/licenses/gpl-3.0.de.html
	 * Text Domain: be-lazy
	 */

	// Enable PSR-4 autoloading
	require_once __DIR__ . '/vendor/autoload.php';

	// Load configurations
	require_once __DIR__ . '/app/Config/Constants.php';

	// Instantiate main class
	new BeLazy\BeLazy();