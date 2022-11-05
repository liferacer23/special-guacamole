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
define( 'DB_NAME', 'Gd1B6rmtZ8Qf2M' );

/** Database username */
define( 'DB_USER', 'Gd1B6rmtZ8Qf2M' );

/** Database password */
define( 'DB_PASSWORD', 'gCT1XP1YVuhI3E' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',          'srJPFnxvouFHM|>U$;z+b]ntFAnY?a{s>Y%1PngIqJsKJ5YGOI^*C=&1?oVgD(Y8' );
define( 'SECURE_AUTH_KEY',   'lM!+})i+KVP;EYmR7gCJU$68$R8NDrSS#hHk$KN8jM;sSw3a>rTLaoDJ`gl[Dkc0' );
define( 'LOGGED_IN_KEY',     'qZJA^9SM6E9tEHHw6NMGwyER}RMMm>ZM0ftyF`J8^un-DmW6wrT|r+^XW)Bwx/e+' );
define( 'NONCE_KEY',         '!W6aQ)TC*cS:.uxd=Z3[8v/tw|MCi@9-nMG<{k>j|E[pA`q/wHi0@1^a:+|3dV.!' );
define( 'AUTH_SALT',         'W.^1h#w=evj#4RAMhUU!J1DHSu{4,qJ/a0;[50D%CrwH4M14<iIzn0<Ta7kt37pX' );
define( 'SECURE_AUTH_SALT',  'si?aAx#N K>=9%v5M@=@v~CDAR;/%=< ~XZJ #oS=_up|ETW5H2p/d)PeL8=v[N/' );
define( 'LOGGED_IN_SALT',    'P,h+:^~rd*,!0+:Hb{Tsd+-$2,;.sx+:<Rx4LEDf-4o)y9:F6 k*T=uEA2 .j?}e' );
define( 'NONCE_SALT',        'UMn2L^En/e[~jXq@F?X=bM9AZ+D;6RlU_@^FYfiy%V^H&M&wbqH;q{PUGm]>M+/O' );
define( 'WP_CACHE_KEY_SALT', '2/qd@-AWCl fS9k8>;4Sj)huZCWL0|IWc>Kblc3JQ2gwC!AnX&,AoNwzD7 gSJr.' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
