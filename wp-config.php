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
define( 'DB_NAME', 'amalitech' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qMD<__F]=hX:`$qh!*-?=#Y(:J+)gH0O4R!> cq&PB^L7O&H}cSh/qP)J,BF#NV+' );
define( 'SECURE_AUTH_KEY',  'e=1-i-Sa1&9_9y!xi6St<}v[e!X37bV?Pw3]U- _z~$J Gp4 0zE1NwfMAV%!mz/' );
define( 'LOGGED_IN_KEY',    '_Ye7^w&.JSM-4(3}C*M^SQR&+n?F5E=<i;B(Q/d #2AJ q,RS>><~uBR1Mi)K9uF' );
define( 'NONCE_KEY',        'CU7d. p=]Nh9ui{)otd$6,}pE@1b[GeQ7f H@BhI.utFXRfz,%R3PN&-xxrz_IX ' );
define( 'AUTH_SALT',        '@h,;t:<T!N0*<:M#)Lz|G?p~LL~,WfTPW37dv_MY/Djj<3Xg_&){[)75<?voMO:A' );
define( 'SECURE_AUTH_SALT', '@P9u?t)ol.v>`b[<zXfcdfn?ikb83i+:ZvX<QQ,nP]9f]K[%:K(FY.[v7T!|.dKL' );
define( 'LOGGED_IN_SALT',   'WdPcRl_^7(}8}Z<r]rvmxC3>DNzRMNf-(D<*.DK/=(vA[%;e3/%TtYj0I!e?fx`[' );
define( 'NONCE_SALT',       ':Mli1y`JqKhl*j![F.S3E-Ww9s:Fv8q)A3 HIl(%9~kCe)Ie8:a W1fZwgi~]KK:' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
