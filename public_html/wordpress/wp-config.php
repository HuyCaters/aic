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
define('WP_HOME', 'http://localhost:8000');
define('WP_SITEURL', 'http://localhost:8000/wordpress');
/**
 * Login, then go to Setting and Save 
 * https://domain.example/wp-admin
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** Database username */
define('DB_USER', 'wp');

/** Database password */
define('DB_PASSWORD', 'wp1234');

/** Database hostname */
define('DB_HOST', 'db');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'Z,B]az ^Ts( (5/}CT>f<o+HKh*i%}@)[5.+u]F$}|FM4C! M#bo;C)Fz.+TZeO0');
define('SECURE_AUTH_KEY',  'f@8m*QNp1ZFJtSQ~7Ixg|V2`t_aUa2){-&u_AM|5`SZ2Cm&x.A(XbYw=mdoH)HE_');
define('LOGGED_IN_KEY',    'T_y.n9a}]_8OA3v}SU9$.)LouR3l(mBmTE8tGH&sW=%El.nr*+$m,@61Vc5#^+`o');
define('NONCE_KEY',        'QR&U_BN=2gE$W@Z@U;V^U5_^Hee=ualg#~c@~I;nU6asQMDFJ^NB9$.1-u( A%So');
define('AUTH_SALT',        'F1[i1?&kjx0zyWtocK_wBu2[uy=z2(P?9}t}IdWi8ZE?rz</D~8}UZ:1GaMkN<+G');
define('SECURE_AUTH_SALT', 'G **BH:0Q@t3*s[B{)%Hg6Lff@36xE:G Wrp9:BSQ^,Dt}cgq[pbl5m#ss`>0dif');
define('LOGGED_IN_SALT',   '~B-K!>k6L(}h*cPU`ib7y%I-=7%MabV7;K:[lx]:$VNksUzI^_CXZadw9kG3u,jF');
define('NONCE_SALT',       'd9ny&4 c$o6IIkt [dUtnU$wfq(H7Hf-nrBe;k7R};5Q|,!Y-w vKtwT/T%&a@~*');

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true); // wp-content/debug.log
define('WP_DEBUG_DISPLAY', true);
define('WP_ENVIRONMENT_TYPE', 'local');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
