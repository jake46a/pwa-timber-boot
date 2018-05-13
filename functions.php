<?php
		add_theme_support( 'post-thumbnails' );
add_image_size( 'featured-large', 990, 330);
add_image_size( 'featured-medium', 750, 250 );
add_image_size( 'featured-small', 570, 190 );
add_image_size( 'featured-iphone', 420, 140 );
add_image_size( 'featured-xs', 360, 120 );

add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
		return array_merge( $sizes, array(
				'featured-large' => __( 'PWA Large' ),
				'featured-medium' => __( 'PWA Medium' ),
				'featured-small' => __( 'PWA Small' ),
				'featured-iphone' => __( 'PWA iPone' ),
				'featured-xs' => __( 'PWA XS' ),
		) );
}

//require_once __DIR__ . '/vendor/autoload.php';

class PwaSite extends Timber\Site {
	public function __construct() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		parent::__construct();
	}

	function register_post_types() {
	//this is where you can register custom post types
}

function register_taxonomies() {
	//this is where you can register custom taxonomies
}

	function add_to_context( $context ) {
		$context['menu'] = new Timber\Menu('main-menu');
		$context['site'] = $this;

		return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

}

new PwaSite();

//sidebars-go here
function pwa_widgets_init() {
register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footersidebar1',
'description' => 'Appears in the footer area 1',
'before_widget' => '<div class="card-header">',
'after_widget' => '</p></div><div class="card-footer"></div>',
'before_title' => '<h3 class="card-title">',
'after_title' => '</h3></div><div class="card-body"<p class="card-text">',
) );

register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footersidebar2',
'description' => 'Appears in the footer area 2',
'before_widget' => '<div class="card-header">',
'after_widget' => '</p></div><div class="card-footer"></div>',
'before_title' => '<h3 class="card-title">',
'after_title' => '</h3></div><div class="card-body"<p class="card-text">',
) );

register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footersidebar3',
'description' => 'Appears in the footer area 3',
'before_widget' => '<div class="card-header">',
'after_widget' => '</p></div><div class="card-footer"></div>',
'before_title' => '<h3 class="card-title">',
'after_title' => '</h3></div><div class="card-body"<p class="card-text">',
) );


register_sidebar( array(
'name' => 'Footer Sidebar 4',
'id' => 'footersidebar4',
'description' => 'Appears in the footer area 4',
'before_widget' => '<div class="card-header">',
'after_widget' => '</p></div><div class="card-footer"></div>',
'before_title' => '<h3 class="card-title">',
'after_title' => '</h3></div><div class="card-body"<p class="card-text">',
) );


register_sidebar( array(
'name' => 'Top Sidebar 1',
'id' => 'topsidebar1',
'description' => 'Appears in the top area 1',
'before_widget' => '<div class="card-header">',
'after_widget' => '</p></div><div class="card-footer"></div>',
'before_title' => '<h3 class="card-title">',
'after_title' => '</h3></div><div class="card-body"<p class="card-text">',
) );

register_sidebar( array(
'name' => 'Top Sidebar 2',
'id' => 'topsidebar2',
'description' => 'Appears in the top area 2',
'before_widget' => '<div class="card-header">',
'after_widget' => '</p></div><div class="card-footer"></div>',
'before_title' => '<h3 class="card-title">',
'after_title' => '</h3></div><div class="card-body"<p class="card-text">',
) );

register_sidebar( array(
'name' => 'Top Sidebar 3',
'id' => 'topsidebar3',
'description' => 'Appears in the top area 3',
'before_widget' => '<div class="card-header">',
'after_widget' => '</p></div><div class="card-footer"></div>',
'before_title' => '<h3 class="card-title">',
'after_title' => '</h3></div><div class="card-body"<p class="card-text">',
) );

register_sidebar( array(
'name' => 'Top Sidebar 4',
'id' => 'topsidebar4',
'description' => 'Appears in the top area 4',
'before_widget' => '<div class="card-header">',
'after_widget' => '</p></div><div class="card-footer"></div>',
'before_title' => '<h3 class="card-title">',
'after_title' => '</h3></div><div class="card-body"<p class="card-text">',
) );

register_sidebar( array(
'name' => 'Custom Sidebar 1',
'id' => 'topsidebarc1',
'description' => 'Appears in the top custom 1',
'before_widget' => '<div class="card-body">',
'after_widget' => '</p></div>',
'before_title' => '<h3 class="card-text">',
'after_title' => '</h3><p class="card-text">',
) );

register_sidebar( array(
'name' => 'Custom Sidebar 2',
'id' => 'topsidebarc2',
'description' => 'Appears in the top custom 2',
'before_widget' => '<div class="card-body">',
'after_widget' => '</p></div>',
'before_title' => '<h3 class="card-text">',
'after_title' => '</h3><p class="card-text">',
) );

}
add_action( 'widgets_init', 'pwa_widgets_init' );

function pwa_scripts() {
wp_enqueue_style( 'pwasite-bootstrap-css', get_template_directory_uri() . '/assets/dist/app.css' );
wp_enqueue_style( 'pwa-style', get_stylesheet_uri() );
    if(get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default') {
        wp_enqueue_style( 'pwa-'.get_theme_mod( 'theme_option_setting' ), get_template_directory_uri() . '/inc/presets/theme-option/'.get_theme_mod( 'theme_option_setting' ).'.css', false, '' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'poppins-lora') {
        wp_enqueue_style( 'pwa-poppins-lora-font', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-merriweather') {
        wp_enqueue_style( 'pwa-montserrat-merriweather-font', '//fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'poppins-poppins') {
        wp_enqueue_style( 'pwa-poppins-font', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'roboto-roboto') {
        wp_enqueue_style( 'pwa-roboto-font', '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'arbutusslab-opensans') {
        wp_enqueue_style( 'pwa-arbutusslab-opensans-font', '//fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'oswald-muli') {
        wp_enqueue_style( 'pwa-oswald-muli-font', '//fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-opensans') {
        wp_enqueue_style( 'pwa-montserrat-opensans-font', '//fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'robotoslab-roboto') {
        wp_enqueue_style( 'pwa-robotoslab-roboto', '//fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i' );
    }
    if(get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default') {
        wp_enqueue_style( 'pwa-'.get_theme_mod( 'preset_style_setting' ), get_template_directory_uri() . '/inc/presets/typography/'.get_theme_mod( 'preset_style_setting' ).'.css', false, '' );
    }
		//wp_deregister_script('jquery');
		wp_enqueue_script('manifest', get_template_directory_uri() . '/assets/dist/manifest.js', array(), array(), null, true);
		wp_enqueue_script('vendor', get_template_directory_uri() . '/assets/dist/vendor.js', array(), array(), null, true);
		wp_enqueue_script('apps', get_template_directory_uri() . '/assets/dist/app.js', array(), array(), null, true);
		//wp_enqueue_script('pwasite-popper', get_template_directory_uri() . '/inc/js/popper.min.js', array() );
		//wp_enqueue_script('pwasite-bootstrapjs', get_template_directory_uri() . '/inc/js/bootstrap.bundle.min.js', array() );


	}

    add_action( 'wp_enqueue_scripts', 'pwa_scripts' );

		remove_action('wp_head', 'wp_generator');
// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


		/* function pwasite_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "pwasite" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "pwasite" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "pwasite" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
		}
		add_filter( 'the_password_form', 'pwasite_password_form' ); */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

add_filter( 'the_seo_framework_robots_meta_array', 'my_robots_adjustments', 10, 1 );
function my_robots_adjustments( $meta = array() ) {

	if ( is_post_type('hourypakage')) {
		$meta['noindex'] = 'noindex';
		$meta['nofollow'] = 'nofollow';
	}

	return $meta;
}

add_filter( 'the_seo_framework_sitemap_exclude_cpt', 'my_sitemap_exclusions' );
function my_sitemap_exclusions() {

    $remove = array(
        'hourypakage'

    );

    return $remove;
}
*/

/**
 * Disable the emoji's
 */
/*function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );*/

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
/*function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}*/

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
/*
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}*/
