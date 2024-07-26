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
define( 'DB_NAME', 'scarlett' );

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

//define('WP_HOME','https://scarlettnetwork.com');
//define('WP_SITEURL','https://scarlettnetwork.com');

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
define( 'AUTH_KEY',         '3wnz#nnFO)uN:}=nBi70![{[7BfC.ox3PnfQr:!fRyDC$Ok,NMBNQ/@zdLZ;?LyC' );
define( 'SECURE_AUTH_KEY',  '+R#60EtETwoTQY3R7^spJhCg_`KembUl9dKQ!<eA2M5%rIScH]e+[;;QR2Ie%sbr' );
define( 'LOGGED_IN_KEY',    '7LkXysjc}JC2q5<&lz9F[ 46;3em%o@!MdCMODgBoMLhA[OBO7Il6RH2=DA9h~Id' );
define( 'NONCE_KEY',        '+ng.mxxwH@Fz[g1%-r} .-r>T@@zSOPR*BGNY81rV9d2qr.t07gFsFQD6=QjFsZ]' );
define( 'AUTH_SALT',        'hSo+aU{G}6cXa%0~@C6i?bdW;aU:gN]m`jd^Zp@9UNEGBS EJ@C2Z1`RfZbS+MJe' );
define( 'SECURE_AUTH_SALT', 'p]KCp$<31C{~C:!/%H4C8[MqH#Nyu97gRf7@)^NnBxP(0],}tG42JDO>UvB4])%7' );
define( 'LOGGED_IN_SALT',   'P6nQ0m,=J-YF-r+>TU;q1bD>kJ_4zn&KG|e$z!Av,!k:h G:rN#+iRS-]{o,m8zU' );
define( 'NONCE_SALT',       'eYlIe`CgHxj=/R91]huNG)y4s%s)F_4w*G<{404@-NO$VYlVT$nks20iT_>l-DZI' );

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
