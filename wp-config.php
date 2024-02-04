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
define( 'DB_NAME', 'zybloom' );

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
define( 'AUTH_KEY',         '[F1syJ8) R8`7:ZntCH<r.TD~gB[)J*3pt>uoPbO$-3nRX9)SxadThds2X]Y)tjQ' );
define( 'SECURE_AUTH_KEY',  'qCr{g4z(oPd] 5wSgjqum&^ZYzOV> ].>L:n@cxrH;wp*M&=,+9yn+.Y)lcO8r[2' );
define( 'LOGGED_IN_KEY',    'm+.A+S4r)[~9`}5G;IOYqP(QE6O*C4zG^KfW=b>R9?H_zKHAE$`M9dSL;fdm1aG[' );
define( 'NONCE_KEY',        'l,1lgu2,_o*i% ~NaKuWPxLU|X^44+EQ]t<aDhS[I).inBC&wULJ6g]<yEz~Nz7R' );
define( 'AUTH_SALT',        'Q%</E2iCMZ4LaFq2a1}YMW}WI*>=e_0#pLNsa)-K$9M7| vJSl]B6r[%f_gUj/D)' );
define( 'SECURE_AUTH_SALT', '2C Je[kC$m& ,IB:5_1q^_iZ*bMxenstlv>h=*upEe8*=:g[)BQ#/ua?#6Dy6Q_7' );
define( 'LOGGED_IN_SALT',   '*n9Kr]l`lhx?YA.aW 87H@hbuH9h#_igV|w]D?oB<7gp>bb8}K;6|ODP4rYyK+5B' );
define( 'NONCE_SALT',       '}G742q3z#>HK_Wto^=jL&o aV,&3OxH9{O=<!}5E[:dKB&mw@1|6@i7P:y?OTY23' );

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
