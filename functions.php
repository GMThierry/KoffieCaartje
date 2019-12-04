<?php
/**
 * Gravity Media single product webshop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gravity_Media_single_product_webshop
 */

if ( ! function_exists( 'gravity_media_single_product_webshop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gravity_media_single_product_webshop_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Gravity Media single product webshop, use a find and replace
		 * to change 'gravity-media-single-product-webshop' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gravity-media-single-product-webshop', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'gravity-media-single-product-webshop' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gravity_media_single_product_webshop_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gravity_media_single_product_webshop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gravity_media_single_product_webshop_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gravity_media_single_product_webshop_content_width', 640 );
}
add_action( 'after_setup_theme', 'gravity_media_single_product_webshop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gravity_media_single_product_webshop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gravity-media-single-product-webshop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gravity-media-single-product-webshop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gravity_media_single_product_webshop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gravity_media_single_product_webshop_scripts() {
	wp_enqueue_style( 'gravity-media-single-product-webshop-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gravity-media-single-product-webshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gravity-media-single-product-webshop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gravity_media_single_product_webshop_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/*Remove items from cart*/
add_action( 'template_redirect', 'remove_product_from_cart' );
function remove_product_from_cart() {
	if( !is_checkout() ){
		WC()->cart->empty_cart();
	}
}

register_sidebar( array(
'name' => 'Footer Logo',
'id' => 'footer-logo',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Location',
'id' => 'footer-location',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Contact',
'id' => 'footer-contact',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Socials',
'id' => 'footer-socials',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_phone']);
	unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_last_name']);
	return $fields;
}
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
function override_billing_checkout_fields( $fields ) {
	$fields['billing']['billing_first_name']['placeholder'] = 'Volledige naam';
	$fields['billing']['billing_address_1']['placeholder'] = 'Straatnaam';
	$fields['billing']['billing_postcode']['placeholder'] = 'Postcode';
	$fields['billing']['billing_city']['placeholder'] = 'Woonplaats';
	$fields['billing']['billing_email']['placeholder'] = 'E-mailadres';
	return $fields;
}

function uwc_new_address_one_placeholder( $fields ) {
$fields['address_1']['placeholder'] = 'Straat';
$fields['address_2']['placeholder'] = 'Nummer';

	 return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'uwc_new_address_one_placeholder' );


add_filter( 'gettext', function( $translation, $text, $domain ) {
	if ( $domain == 'woocommerce' ) {
		if ( $text == '(includes %s)' ) { $translation = 'incl. BTW'; }
	}
	return $translation;
}, 10, 3 );

add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
  return 'Verzendkosten';
}

/**
 * @snippet       WooCommerce: Redirect to Custom Thank you Page
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=490
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.5
 */

// add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');
function bbloomer_redirectcustom( $order_id ){
    $order = new WC_Order( $order_id );

    $url = '/bedankt';

    if ( $order->status != 'failed' ) {
        wp_redirect($url);
        exit;
    }
}


add_action( 'template_redirect', 'unlisted_jobs_redirect' );
function unlisted_jobs_redirect()
{
    // check if is a 404 error, and it's on your jobs custom post type
    if( is_404() )
    {
        // then redirect to yourdomain.com/jobs/
        wp_redirect( home_url( '/404-error/' ) );
        exit();
    }
}

add_filter('gettext', 'x_translate_text' , 20, 3);
function x_translate_text ( $translated_text, $text, $domain ) {
	$translation = array (
		'I&rsquo;ve read and accept the <a href="%s" target="_blank">terms & conditions</a>' => 'I agree that I meet the <a href="%s" target="_blank">prerequisites</a> (if any) for this class and understand that class fees are non-refundable.',
	);

	if( isset( $translation[$text] ) ) {
		return $translation[$text];
	}
	return $translated_text;
}

// before addto cart, only allow 1 item in a cart
add_filter( 'woocommerce_add_to_cart_validation', 'woo_custom_add_to_cart_before' );
function woo_custom_add_to_cart_before( $cart_item_data ) {
    global $woocommerce;
    $woocommerce->cart->empty_cart();

    // Do nothing with the data and return
    return true;
}

// Disable shop and redirect to home
// function woocommerce_disable_shop_page() {
//     global $post;
//     if (is_shop()):
// 		wp_redirect(home_url());
// 		exit();
//     endif;
// }
// add_action( 'wp', 'woocommerce_disable_shop_page' );

// Disable shop and redirect to home
// function woocommerce_disable_my_account_page() {
//     global $post;
//     if (is_account_page()):
// 		wp_redirect(home_url());
// 		exit();
//     endif;
// }
// add_action( 'wp', 'woocommerce_disable_my_account_page' );
