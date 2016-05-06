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
define('DB_NAME', 'wordpress_db');

/** MySQL database username */
define('DB_USER', 'wordpress_db');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         'EA2DHukKkS8WUZdrG5n#i3DG#D}wZZ;E4jN3j4FR ;!PAhw[$V#t&gEVTkMIlLxx');
define('SECURE_AUTH_KEY',  'fR6t[^j3nXJr9FCF3FepgFRvU08QvQf>Gc*C|.R9,~/H t_pc!C.qj!q2(D9*u_3');
define('LOGGED_IN_KEY',    'P8KnYVv8Ceo60mDL[5BRU+dc^I>p==!<;b%-pca>6[f-j;MRzv.2D^Ja~37WexfN');
define('NONCE_KEY',        'jxT2b7jZGkQAd3cXJ/kNlarSEGHii-1Y(#/<Pu.39A+P;V4uXcjoZ} N5N~]`^P8');
define('AUTH_SALT',        '~^.5;1hNN;gL#2RkS!sd<=Ik2fY. /lYvSYV^pt6en0NU,ox]q}[z:X$:s2sn<iK');
define('SECURE_AUTH_SALT', '20H`=!X!Yks[D*fG>z7kSX`~@m-xeTParg(zbHUK%`nLZ]Cd$V|x0BTb>9sYf,th');
define('LOGGED_IN_SALT',   'hU)/s>iJtLB1S?V( a4l,cQ8b!1gxB53i8o7B(F)bMxhXbvErIWxR-flteLCchrd');
define('NONCE_SALT',       '2^Hq%bu<6%m7QKAsuYOk Tf3#6mCH}vV!9A7q,VKq_df4I;<;tmQb<D0CGpA;b R');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/*** FTP login settings ***/
define("FTP_HOST", "localhost");
define("FTP_USER", "ftp-user");
define("FTP_PASS", "ftp-password");
define('FS_METHOD', 'direct');





