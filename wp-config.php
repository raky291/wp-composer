<?php

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Expose global env function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
$dotenv->required(['WP_HOME', 'DB_NAME', 'DB_USER'])->notEmpty();
$dotenv->required('WP_DEV')->isBoolean();

/**
 * URLs
 */
define('WP_HOME', env('WP_HOME'));
define('WP_SITEURL', WP_HOME . '/wp');

/**
 * Content directory
 */
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');
define('WP_CONTENT_URL', WP_HOME . '/wp-content');

/**
 * Database settings
 */
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ?: 'localhost');
define('DB_CHARSET', env('DB_CHARSET') ?: 'utf8');
define('DB_COLLATE', env('DB_COLLATE') ?: '');
$table_prefix = 'wp_';

/**
 * Authentication unique keys and salts
 */
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

/**
 * Disable file modifications
 */
define('DISALLOW_FILE_MODS', true);

/**
 * Debugging settings
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', env('WP_DEV'));
define('WP_DEBUG_LOG', !env('WP_DEV'));

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/wp/');
}

require_once ABSPATH . 'wp-settings.php';
