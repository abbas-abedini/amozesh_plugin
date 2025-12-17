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
define( 'DB_NAME', 'amozesh' );

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
define( 'AUTH_KEY',         '?p$V_s`:w3F GL*MJ$4MN1u2wgO{I-*OAXp` g31kK8!T1(e^<CNTOs<Fj2S,cj%' );
define( 'SECURE_AUTH_KEY',  'PEv3b=?KJ,NsYQxk?98 2yc)zw6V+j??lh5B$a&].`A+Wq4B?KU4vr*kyFZ$L{?6' );
define( 'LOGGED_IN_KEY',    'LPbwzX*5*)KR$uO;{r7?[L_(?uik1)k<&3u0<HmiOk>gK6PC!G=^$`Pi5]A>afIe' );
define( 'NONCE_KEY',        'NSd6{.1o(4&3NLupa6,.;Jq%f2#ezwj;2zms.D|?(ASiKS5SiGXdLh:xKdzC0Uf{' );
define( 'AUTH_SALT',        'N%(x^pupxP:BVxV<0QI.;Sxfo13`3?z)oL[<V.R1P#U}>KKW*[[D::2HeK:ad|@D' );
define( 'SECURE_AUTH_SALT', 'A`S^74m8;0wxJyyMJV<`0dm%W<`%fR2wSO0z9F*6OwP@mczo@h;SJ_iSB-=r/_]A' );
define( 'LOGGED_IN_SALT',   ':c|3twCK{e1e]B*i<RcpJb{5P]H{.@ %~xov$B]A35K;x)lgJGt#zngccFFvv$g4' );
define( 'NONCE_SALT',       '5cKHutAAo0*j1W!Q!X#i$LUK$DWGA+^3A}Pg]b^&.m`PX%z=<Da@mpJxs08c{%)*' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
