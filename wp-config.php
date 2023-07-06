<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'zy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'nN2+-YH+Z/1Y{-I(AJ``{e/#<{Jn~mI/=nA?MId#gsW!/t9oq<4XiFDH|=B2DLI5' );
define( 'SECURE_AUTH_KEY',  'de^8t/k!#NjpD40=JS9!A(TZxty.eZ~rlq]]P07^@eVQsSM813#&9RYT?km[ 6B8' );
define( 'LOGGED_IN_KEY',    'O+p=#n9m1L,5=z:gOs]tpi_2HF|3:3f<^rOKDW{}Z1.IRUw$2r_`qkSO8u}_-8JM' );
define( 'NONCE_KEY',        '*R3rzOT3=6pAL}XnuQqL9|rvYu~[xz^N[M<;-WUp[BM__/j?`Ir3M>B*8%Th.CL:' );
define( 'AUTH_SALT',        'V.kX!HYM2g/!NAbmao5N|Pv_vkeD*@ZTc^!|cLI>v[4^iO]&Z;+s..>d@]TS;JFN' );
define( 'SECURE_AUTH_SALT', 'VU;GOI8sN7nYk[/YOJ%XR1$YBVBE{Zh<]!1>eY_hIAv)5Kq@+o%o~,m>~2=ryyyi' );
define( 'LOGGED_IN_SALT',   ']gL=>|2(aw+~{MP)DP}?6~L?!2L%o5k;z5k^VtV9w;o^XDO%En=ob!PmPX%q7rs|' );
define( 'NONCE_SALT',       '}?]%,j[_Gt77qJiOi+jp/v3X,fFOUN3o8fi4Cf$VM7;OL/3qV^,aHK]i.Kw/C++K' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
