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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'skql1506*' );

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
define( 'AUTH_KEY',         'GsXdp1mk*It_< h-@3il0cR>+ocK:k5VK,Z?Z{61`b6&1NSl.01>>X_Er{B%F?+G' );
define( 'SECURE_AUTH_KEY',  '*Z?=3LD2[>T?9UAFdIR7kAvBWn X<[J#HS$eWS/ `x.aVcay7@{!W:Y&_tZTsR1?' );
define( 'LOGGED_IN_KEY',    '%_vGC?Bi@F3W-P(X^wd_+$Y4e~Ofvq_lL`~/[D63(a@(RFF@?ZZ_O4eAmJXmge<I' );
define( 'NONCE_KEY',        '0zL~J;0|-ivKh]F6}x_u9P^A6kSt?* xBa^$jAyvXi#|[c!OnC/E|@b$a<fr~P3q' );
define( 'AUTH_SALT',        'd;<2FmC/2<<rzf)3rR_|` hwx6:FoHTQ_ie3ha;899NE+3]qn5^y[s9YczLjK?Ao' );
define( 'SECURE_AUTH_SALT', 'D0U?AB|ZB&h?8b4G`L)c8;{t%D4i?:C0:(x[zn{2Js/K8nEg{9)0b10IV }pZ1fr' );
define( 'LOGGED_IN_SALT',   '|V9-8f~4a&=_@{mT*s/)p%wGpV>b`P.tMs;MfY%Gf;Vh~FA%qz+PycIx/6QCG_U+' );
define( 'NONCE_SALT',       'm>^>KbP0|mJX2$#s[TQfk52o}r~t^ |LsiwTfnmJrGnc,kzze+nnE0UmaN5h~4wZ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tbl_';

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
