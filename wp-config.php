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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'R=ed?C~N#dZ&yOz$<p5vrpkeIrf)^/I*(=/8Wb4E]a-qn+bgz7,Idt0QBklaY+sD' );
define( 'SECURE_AUTH_KEY',   'c!D[<u/byMlg{,NaBBNQH`K>zdWp]i,j 8^QHH~<c=fC!xnWB11cd5Dm{6lx2UwE' );
define( 'LOGGED_IN_KEY',     'aIu@J-QrLAMxDKLv1`?-p[C]6;^N}QBC^)%j:Qjz!+E5qXnVsHZ0miTvib4]h^pm' );
define( 'NONCE_KEY',         ',bCC:uS3LQ05#(GD C@*eG`<5yl=l ?by>[+N!nmsM:ewj(8GsY^xMqvYhIDA#DX' );
define( 'AUTH_SALT',         'skbm4w@[1af{e&q,`U5|CjO${j#)^u7V^X@6r]]}91]^R&Bl5_u|1@/ zgR+6<+]' );
define( 'SECURE_AUTH_SALT',  'h2U2u2A0%}kM:W!,Hw?*O$km_KL)jG_(hrbFj~}hamS%a@]:Z,cN.9xy)Er]fW;t' );
define( 'LOGGED_IN_SALT',    'tt+gQ)65lmGUI@4oRYvs?{UmrYW7-}NauBV&5,*v>?cQ};)BD}q&o(*c6iEaLk/s' );
define( 'NONCE_SALT',        'GY_nYJVtgv4VI)&;sa4M7nVRrbq?vhOjb5W|tkFaS %{JZr=^:b!Eq0N?B-%6[JH' );
define( 'WP_CACHE_KEY_SALT', '>#sGg2$wyaFk@YLF<c6z6 0I}0g:c-HheKPE~d:}fd2QY.Isr<Q^P?-3?M(FIR)G' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
