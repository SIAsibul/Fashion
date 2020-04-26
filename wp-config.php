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
define( 'DB_NAME', 'fashion' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '12345' );

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
define( 'AUTH_KEY',         '6t=j%7Zt7y)F8o8$-~Z~i&;Q&.lp@[tK_a9yMXvJfS*oBs3dA_ti$QB`c.4-A,/4' );
define( 'SECURE_AUTH_KEY',  'Hm+V/wu/vj4=sG%/^@;4e`=xZCfCz74M XJI[+cK8k0jaxzfr!WerpUqssvs#}&m' );
define( 'LOGGED_IN_KEY',    '(rP>Z6fpU0P[O}?(nw6EHg,2t<gH*C&)Oi=Wn ;@NqF@wpuo`*])X@6G,pkT!bs3' );
define( 'NONCE_KEY',        's1SW( QR<s)$^~LgV@+(=pW=3#F{7duG00Yj<gqaU_:eMZj}uG=[=<4S>{P`<KGs' );
define( 'AUTH_SALT',        '`Z;^e]Y%<|A:VFl% D4!w`OcU8c$18`76jh(#PLtjV P#Zf_^!T5F^;D+cbX]Y!9' );
define( 'SECURE_AUTH_SALT', 'b(.?$m_KXj>gPO},LvSA&HgI=NrnhIZCX]lQ<vJj&+-OzBgI?[,-@KHeKH,X5~-8' );
define( 'LOGGED_IN_SALT',   '@0~mEwX{QYWEcd5$V;OGc:?.=zG}u;GOL5$>|! v!a*B0C>M378C|:^B3[LBaK1^' );
define( 'NONCE_SALT',       'k|QmagCWQccWVG!HtJ=kUi-,TXo)eiybEKxf*E&3+y49wU3TOUIy_mkan<2G;>!R' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fash_';

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
define( 'WP_DEBUG', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
