<?php

	// Base directory
	define('BE_LAZY_DIR', dirname(dirname(__DIR__)) . '/');

	// Base URL
	define('BE_LAZY_URL', plugin_dir_url(dirname(__DIR__)));

	// Slug
	const BE_LAZY_SLUG = 'be-lazy';

	// Database compliant slug
	const BE_LAZY_SLUG_DB = 'be_lazy';

	// Plugin version
	const BE_LAZY_VERSION = '1.2.1';

	// View directory
	const BE_LAZY_DIR_VIEWS = BE_LAZY_DIR . 'app/Views/';

	// JavaScript directory
	const BE_LAZY_URL_JS = BE_LAZY_URL . 'assets/js/';

	// Stylesheets directory
	const BE_LAZY_URL_CSS = BE_LAZY_URL . 'assets/css/';

	// Images directory
	const BE_LAZY_URL_IMG = BE_LAZY_URL . 'assets/img/';