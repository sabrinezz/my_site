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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '!nL`sl p5D@^=VuOOFun{tb~3rAfte8 Vk1^CBuoBH{BrvWLFwjCmEoq7ske8={@' );
define( 'SECURE_AUTH_KEY',  'jU?X23?S,n$Q}0bDw`qb%y:Q=4BOSI$rC`=b%aGdfQqsWZN]Iu^ HifsN]G{1eV@' );
define( 'LOGGED_IN_KEY',    'WY%mEtIBd+lfn$u`T/.%Jx^1+.emp$fnn B*b*]!?4 2rW^>$gADQdM:mwoirQyF' );
define( 'NONCE_KEY',        ')wD&/=~|e/;g]MI}+(SSEpS!u{^N/vxF4t4ilK*<#Dn.QYF)|nM/8o:C%Xl2@Y//' );
define( 'AUTH_SALT',        'HZYz`HX0#G6?wFj0v.h]Y|7=5q|.5BnO 2qdzgp89Q`:uJ40Ma}^)2tGA[)m&/WB' );
define( 'SECURE_AUTH_SALT', 'E^H8m7Qn?CUOl~jM)JcB9N!W x/P)kbU8fNSG)/5)@$S$-]R-`dek`;NQal&:50=' );
define( 'LOGGED_IN_SALT',   '<Yt{-Gnq@<6jpW$nt-~l1nozC_]?%}pDW};B@;OZ:6KlrZ$d#SGpl[YeMuwL?=fs' );
define( 'NONCE_SALT',       '/:9o]xjF0s>7H5uqcr=dhLpHo|l=8tFb:0`eQ#*s?7&M#2PXBN22&tr-^mZ0N(jH' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
