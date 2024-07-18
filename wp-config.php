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
define( 'DB_NAME', 'sabrinezz_mydatabase' );

/** Database username */
define( 'DB_USER', 'sabrinezz' );

/** Database password */
define( 'DB_PASSWORD', '27111989zZ' );

/** Database hostname */
define( 'DB_HOST', 'mysql.alwaysdata.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'z&BR7zV%+`zD/M$%.&Bx~.n&Dl.zZT;=L4+!>_)M9GSt)U7#5<g?Oi+DUF#;M1|5' );
define( 'SECURE_AUTH_KEY',  'VgLyChvgA6j>#2]=@i0L!m}AO(xh5Wg]D~H6`/yV`%~3Bo@E9KT;,o|i$6-_>V~`' );
define( 'LOGGED_IN_KEY',    '-T!DHB-{Y`f2]~e~/)|aMLJRO,B.eUO)O(<2b6+90PrC0u!D~rI$|Fk3:9QvP_tR' );
define( 'NONCE_KEY',        'ct5|oEvHF-W:sxtRUdo_wJ;!9_XLs}x1;-=O[jScVXE7XoZXOQ76P0#?M.p!<F5}' );
define( 'AUTH_SALT',        'z0+XB$OJl*#ox_!W~W#L)kwH9m[~H8@%W!Y8*yQ[G1;@c~<6dJm2JY>#~F}|5#tu' );
define( 'SECURE_AUTH_SALT', 'd^>Ijz(RB+J$&pp.8W8Ah$G-[q/oD8&qsM6mWn~!SDB-#y8s?+>[a;A9.|sR4-AK' );
define( 'LOGGED_IN_SALT',   '/s~tXOPIgYulJ^o@iW+`hT$#a|9aym|Zsht3AIHEG^2b:k1G92Ak@km-]H.*;a4w' );
define( 'NONCE_SALT',       'h>8|A*n`qF|V~JMB[G/hCkr__&gi)kSOBZdd6FAK-=K4D8h?A$F}9q&;d#GfZ3Me' );

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
