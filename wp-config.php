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
define( 'DB_NAME', 'demo' );

/** Database username */
define( 'DB_USER', 'blantt' );

/** Database password */
define( 'DB_PASSWORD', 'wang6599' );

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
define( 'AUTH_KEY',         'P`bG,5b5r<`m+N<:&F/rV{S_N-%a9Fan+ZP!Ag%=dQ;KGR$G:42.IV;h h/>_r%E' );
define( 'SECURE_AUTH_KEY',  'O;.)i.kckgqt>>tx${8tb`. Nx^>qo*4I@ZP G@EfU5c~,|4?8=+96;tr8Rj}A8=' );
define( 'LOGGED_IN_KEY',    '/4y4/b#+)$8(~ xTl|#8PHYkzB1v`5}P2M*VQD/S|1VJY}ppor&`nPF4Q&k.ndaN' );
define( 'NONCE_KEY',        'O(r`Xg6K!a3TQ*&_rMgv;hnP/l08 :cLKugF*ZBX/m>ZejI}]%u_3Wm`;r8W:d+T' );
define( 'AUTH_SALT',        'kZ/a:%YY{u7oUp%J1*cZ:/:.n.(wv#DyL)S/8Zd,3;nMYprpU~B>rK93e2}KO&{a' );
define( 'SECURE_AUTH_SALT', '?f/8,xlS4ey=@u$jJVA`%I9gwZ-DZszJU=_1cTPSlR_s+9rV*vt}/mgq9P$i?FVP' );
define( 'LOGGED_IN_SALT',   ',ZkX}udI7:{1e8wzJ]>/,:#?MLbEB.5}IdEsqV8XV6Uz>?*1*A@RIk1s:Nn%&rF*' );
define( 'NONCE_SALT',       'Hy%BbmZH+p6n&g$^,4,fT=_~LuUe1[.e,zrI/0}T(].2OlS#QH2ypb`d_&<7|zmJ' );

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

// 這裡是設定log的顥示
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false); // 禁止直接在畫面顯示錯誤訊息
@ini_set('display_errors', 0);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
