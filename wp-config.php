<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'uzitecma');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6CIDm,AdHQDc`BqWS}+6UtwNGs bRmh&o0IB36@z`=V j<}tAczs0KvPqVgytB9v');
define('SECURE_AUTH_KEY',  'Y5oDs*rI?aj30k%f5y[D9@xHoo:^4%`@wn<jL;8]&sXgJmKuy3|x[&!oy%^q]p9d');
define('LOGGED_IN_KEY',    'YH 4`7v;-n)=m,~P+zLLX0jVIJm5~RJg`fbT3F;E#*eq38}-IjPxd]rW[BTuA?Nq');
define('NONCE_KEY',        'nv/l:?M+YxTJJ$293+fjQYS:@%jHMr^k%,[)J=psxJ|tlp)sW5)VK3lL5,*NJvAc');
define('AUTH_SALT',        'Td&&=/]&NyX&rT@1* UiRY!@uixP y.NC?#[^f)em4~.QD:z}RX),&/`&=x21bJ5');
define('SECURE_AUTH_SALT', 'g806%V105?p7275!^}dzn*QC)+{@O#4|A6=ksGL@afj?`ruEzc{@HaVwJ]_-oA9W');
define('LOGGED_IN_SALT',   'MA.DmLCfow8vl3eC:6q3Xcc5fp$6)5vrW@)<*=>UIN Onf0{;Y[ooEB{5uy{QD]1');
define('NONCE_SALT',       '3mF=`8f9UdV(CLtq*XR]t`po~yg>-#s:y.m*>=v2W0U|?s?g0]`r Vqd.i&=~[_?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
