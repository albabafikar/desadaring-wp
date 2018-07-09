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
define('DB_NAME', 'seey4565_db');

/** MySQL database username */
define('DB_USER', 'seey4565_user');

/** MySQL database password */
define('DB_PASSWORD', 'admindaring1');

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
define('AUTH_KEY',         'vn 4VP`je!G}WQw5iXleKFh-8#7~[OhMjpMMl-v7ZLK5//[&@~]/[]$fc?@%?ON+');
define('SECURE_AUTH_KEY',  'NE@nmZ!gh;BT=H~gy#%pd/w--VC[HU4g.bUy:P2>k@Yj>c8x6[nvT_DP!I#Z,|>H');
define('LOGGED_IN_KEY',    '+jzz%`r4IRY^+=L1&}{TTma=?o1y:<4sMhyhz*8?v{DSXi:qTA5hm~N(3MEwv6)-');
define('NONCE_KEY',        ')9yE4t)S7?lq6`vqQ-BS[!Tb(R.y}$Z5B9I(QqIdWD8GUy+Vx#}=WH.=m2Ia6#{S');
define('AUTH_SALT',        'K1HK]i;ju*rj>&z:-KFu[~1!1xd}tdpV3WJV@s~v[4ZpDY)Oz`0,#,T3Bq!_42pc');
define('SECURE_AUTH_SALT', '*bZi]eum6othO#6NDbVj5?S%0npbJ^;vmQ:wf2tn%ZZi?,i:!b/}ec)[B<=&nGv!');
define('LOGGED_IN_SALT',   'gPE&]LF]!y8E9!EVq,_9dVnLo( ?`DC#K9LL:G[RYxvclK>zO4ZUs_}yQd1A|^UB');
define('NONCE_SALT',       'E#{Ob|lB ktu3E+,sc(q-?HKW|4cY;![ hQims-ge4qOX|| ?{U9SIXIW|PfwWF^');

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
