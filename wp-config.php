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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tips' );

/** MySQL database username */
define( 'DB_USER', 'tips_admin' );

/** MySQL database password */
define( 'DB_PASSWORD', '10132031' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );


/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'gb={5s}|/5|LNy-?}JQ[s}20SbaSc/g_F=O/-.U3R,5L{ZW0%W>c33zO|}t*Y6|E');
define('SECURE_AUTH_KEY',  'rz6jA|lxtx-HqzNCk}@dA[)T*4@4otQe_<3.F^& ;Aw?<%?<:]7cWQ|vWo%Q~^Rx');
define('LOGGED_IN_KEY',    '2|{+MlA,mDM*;T.t]G!3gu^Fm2$m0n7g l[-{y2k&!dy|hP)ho-prQyim+4x?VNW');
define('NONCE_KEY',        'yyaIF:+7T<7=!qI#,|sk<~,~OhdauFE|M{o0s0H:?k82K!|=C-`3sHOi?}|${D_/');
define('AUTH_SALT',        'A)UkgMg?zL4((4wq%]jYw.][hm.y{,4+#iuxo~0e_b>BQYha|z;+CDxRHd>Ttdcx');
define('SECURE_AUTH_SALT', 'Foy424Sd9>YUxL$&2o$/u/B3a$UvkzB}l`R)EDg6ImX2XP@/~`tVm |WgISBcWN|');
define('LOGGED_IN_SALT',   'g~IsN%=(H[cJ9MvdjW4kB[z,J*W:VqA$@z{EMMK%4%@fE^*s_ShN,~-$>Qm26xI;');
define('NONCE_SALT',       'jiTTiq-CR|9]xrwwmTL~`A]xy-XrQhK$J(pEFwen]O*U:Wv>y|+37s+E$7q%Srf]');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';        
