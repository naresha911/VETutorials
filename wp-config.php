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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'E:\xampp\htdocs\VETutorials\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'VETutorials');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3}XpjLy_V@|!d43|BF`OsP! &1T[={U*hYmfM![Y|nS5I :`<asnqX=jD+@ed2M7');
define('SECURE_AUTH_KEY',  'uE-eeao5%F#L2~e#Zajvaq{}-:T7ylrZ!a.!Uuv~;QX)O-0bLgsldH.Zvand)`WV');
define('LOGGED_IN_KEY',    '8Y4C>TtK:p5=Lyn+-kxIVt|6}<u/:r9v#(}#{-zXb<51#N4s?FS5~8zY#mc>r[8=');
define('NONCE_KEY',        ';!im-Md~j9d$E9w-{r}JJha(5Ydo@XB{-9oZ,NP>`id*-6z(=&emACu?41}]vO{8');
define('AUTH_SALT',        ':8W:I]g2x[lT>*AF-8wbiv^(2zz(GSmYNl}^3@14WOL$rZ<6I4~WQL;F7e`JZrrr');
define('SECURE_AUTH_SALT', '%SOTrz=G ~Kd`Xd^+She+Ij~X&gA)Wq8 S]$/Ab<?+ek@8<8R]MwvF7QIAnhU=)Y');
define('LOGGED_IN_SALT',   'bLPne9^UrxaUXdYyVH8UJWk9mJm|-sN ^Wy?BP7snIt]7FdG)m:3|-tpsU3ct^3+');
define('NONCE_SALT',       'XNl6I(KJ+j0TP?IZUKZF6jPt$nL9B3va3rcMcE9V$y2]bx8:+Bk?JMShacYip6|B');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
