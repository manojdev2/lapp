<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
/** The name of the database for WordPress */
define('DB_NAME', 'railway');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', 'YDjlgeUWCisinTjjRWgsPbaBTHCuYQpZ');

/** Database hostname (include port) */
define('DB_HOST', 'switchyard.proxy.rlwy.net:10602');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#G1u->l}#8(!AiT_g+kC4J00Vf3mkAnmdYOU*:zK;X>k(O3#eDpZlGIE{/Bqvghu');
define('SECURE_AUTH_KEY',  'C!5PJjiw:tv]M lj}=S>B)=`ELjD3L8$NZ=Xe/>62|T38;p=C3OFKp;jU`b+hk[W');
define('LOGGED_IN_KEY',    '~K43%Ec6*u8xy3a-qOSS?AscGg5c9Cfr9u^IEu.#BRmob5i[uU3?#,K>2OARXUE1');
define('NONCE_KEY',        ' skMkzVF^zkIUMye*V6cG|1TB*vc}4&={H Dvvu;Kp/]n1V@I*B0bUiFnq.Y0#$E');
define('AUTH_SALT',        '(Y}K*mYV,}r;4|9V`9r);UKt%.7PlA:lan<>|4V?Gje&S;T%doXSkbKc2=UD nd^');
define('SECURE_AUTH_SALT', 'w#jA<G[_>9Sqt//)kQVXqy{_?Yb9)%u{FZ+nNG-5TM}.o{@jZr=:1w$9XFqa~AGw');
define('LOGGED_IN_SALT',   '2asS<;yQ9#8]d<Y~oqB{0Wh:[s$K]a>eDwiIBK&tjy{$4Gs{q1>K/8#$cE^+HgfL');
define('NONCE_SALT',       'mAgpBMW.|w+q. Vc]%aE)8V7`E#<<KBB%r1vKZ6VBZ&*k.2y$!xW6dPudqftPdjh');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */
define('WP_HOME', 'https://lapp-u4pw.onrender.com');
define('WP_SITEURL', 'https://lapp-u4pw.onrender.com');
// Force WordPress to recognize HTTPS behind Railway proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}
/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
