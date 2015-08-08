<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/** The name of the database for WordPress */
define('DB_NAME', 'database');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_DEBUG', true);

define('WP_DEBUG_LOG', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't=`}(?u?k*ES]2I|-_AsW~lgIRbGxG&@d+DvlOut|bm|+J##X2>Pwo#M71!.k-M ');
define('SECURE_AUTH_KEY',  'tQ.d,?h2Rv_(w_ent7J9=<_+NC*(vMb4jV0:<3Rtew*bwtf_ XTPvIZY-~~Y+J8A');
define('LOGGED_IN_KEY',    '=|/E|txg|nM-Rx]T#ecq r4x)vic(.D|^1,8SaQ$lbe1ew|;zr&4pk@E>2_aSO6N');
define('NONCE_KEY',        '?:`69!c,[T7;=M%):6LqX#;m@NRR3a!3%@I&zYU46-8)m_?iM*[!+{Dmq*y:I{`~');
define('AUTH_SALT',        'X,s]GiP|3ciTAq:$8<~J}[8-}$U,968`ql.& vTr|t{>VW@G(8 6YC0[aX*N0*+R');
define('SECURE_AUTH_SALT', 'iXGB.M*T*TL/=A(K4v {GP5v4uR&kvcrsvL$W^BkOupW$v@h9E5DQ@5M9RCTBS6k');
define('LOGGED_IN_SALT',   's]E~yh+Pc{H|4[c(jVFfpM8+HY<UEbK@6c0l7bH^v|s08ywO#9}~:[L~`e.|+v3a');
define('NONCE_SALT',       'j<jr!,3a-W0-d^8!5e<J![hq^1{YNP3-=idqxl[pa|tphg3]w4hJQ=Iv^h@:,nre');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
