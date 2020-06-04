<?php
/**
 * Tanawul Bakery functions and definitions
 */

function tanawul_bakery_setup() {
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'tanawul-bakery-featured-image', 2000, 1200, true );
	add_image_size( 'tanawul-bakery-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'left-menu'    => __( 'Left Menu', 'tanawul-bakery' ),
		'right-menu'    => __( 'Right Menu', 'tanawul-bakery' ),
		'responsive-menu'    => __( 'Responsive Menu', 'tanawul-bakery' ),
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );
	
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_editor_style( array( 'assets/css/editor-style.css', tanawul_bakery_fonts_url() ) );
}
add_action( 'after_setup_theme', 'tanawul_bakery_setup' );

/* Theme Font URL */
function tanawul_bakery_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Courgette';
	$font_family[] = 'B612:400,400i,700,700i';
	$font_family[] = 'Kalam:300,400,700';
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';
	$font_family[] = 'Noto Sans:400,400i,700,700i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/**
 * Widget area.
 */
function tanawul_bakery_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'tanawul-bakery' ),
		'id'            => 'sidebox-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'tanawul-bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'tanawul-bakery' ),
		'id'            => 'sidebox-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on Pages and archive pages.', 'tanawul-bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$tanawul_bakery_widget_areas = get_theme_mod('tanawul_bakery_footer_widget', '4');
	for ($i=1; $i<=$tanawul_bakery_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'tanawul-bakery' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'tanawul_bakery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tanawul_bakery_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'tanawul-bakery-fonts', tanawul_bakery_fonts_url(), array(), null );

	//bootstrap
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.css' ));

	// Theme stylesheet.
	wp_enqueue_style( 'tanawul-bakery-basic-style', get_stylesheet_uri() );

	//font-awesome 
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Paragraph
	    $tanawul_bakery_paragraph_color = get_theme_mod('tanawul_bakery_paragraph_color', '');
	    $tanawul_bakery_paragraph_font_family = get_theme_mod('tanawul_bakery_paragraph_font_family', '');
	    $tanawul_bakery_paragraph_font_size = get_theme_mod('tanawul_bakery_paragraph_font_size', '');
	// "a" tag
		$tanawul_bakery_atag_color = get_theme_mod('tanawul_bakery_atag_color', '');
	    $tanawul_bakery_atag_font_family = get_theme_mod('tanawul_bakery_atag_font_family', '');
	// "li" tag
		$tanawul_bakery_li_color = get_theme_mod('tanawul_bakery_li_color', '');
	    $tanawul_bakery_li_font_family = get_theme_mod('tanawul_bakery_li_font_family', '');
	// H1
		$tanawul_bakery_h1_color = get_theme_mod('tanawul_bakery_h1_color', '');
	    $tanawul_bakery_h1_font_family = get_theme_mod('tanawul_bakery_h1_font_family', '');
	    $tanawul_bakery_h1_font_size = get_theme_mod('tanawul_bakery_h1_font_size', '');
	// H2
		$tanawul_bakery_h2_color = get_theme_mod('tanawul_bakery_h2_color', '');
	    $tanawul_bakery_h2_font_family = get_theme_mod('tanawul_bakery_h2_font_family', '');
	    $tanawul_bakery_h2_font_size = get_theme_mod('tanawul_bakery_h2_font_size', '');
	// H3
		$tanawul_bakery_h3_color = get_theme_mod('tanawul_bakery_h3_color', '');
	    $tanawul_bakery_h3_font_family = get_theme_mod('tanawul_bakery_h3_font_family', '');
	    $tanawul_bakery_h3_font_size = get_theme_mod('tanawul_bakery_h3_font_size', '');
	// H4
		$tanawul_bakery_h4_color = get_theme_mod('tanawul_bakery_h4_color', '');
	    $tanawul_bakery_h4_font_family = get_theme_mod('tanawul_bakery_h4_font_family', '');
	    $tanawul_bakery_h4_font_size = get_theme_mod('tanawul_bakery_h4_font_size', '');
	// H5
		$tanawul_bakery_h5_color = get_theme_mod('tanawul_bakery_h5_color', '');
	    $tanawul_bakery_h5_font_family = get_theme_mod('tanawul_bakery_h5_font_family', '');
	    $tanawul_bakery_h5_font_size = get_theme_mod('tanawul_bakery_h5_font_size', '');
	// H6
		$tanawul_bakery_h6_color = get_theme_mod('tanawul_bakery_h6_color', '');
	    $tanawul_bakery_h6_font_family = get_theme_mod('tanawul_bakery_h6_font_family', '');
	    $tanawul_bakery_h6_font_size = get_theme_mod('tanawul_bakery_h6_font_size', '');

		$tanawul_bakery_custom_css ='
			p,span{
			    color:'.esc_html($tanawul_bakery_paragraph_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_paragraph_font_family).';
			    font-size: '.esc_html($tanawul_bakery_paragraph_font_size).';
			}
			a{
			    color:'.esc_html($tanawul_bakery_atag_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_atag_font_family).';
			}
			li{
			    color:'.esc_html($tanawul_bakery_li_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_li_font_family).';
			}
			h1{
			    color:'.esc_html($tanawul_bakery_h1_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_h1_font_family).'!important;
			    font-size: '.esc_html($tanawul_bakery_h1_font_size).'!important;
			}
			h2{
			    color:'.esc_html($tanawul_bakery_h2_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_h2_font_family).'!important;
			    font-size: '.esc_html($tanawul_bakery_h2_font_size).'!important;
			}
			h3{
			    color:'.esc_html($tanawul_bakery_h3_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_h3_font_family).'!important;
			    font-size: '.esc_html($tanawul_bakery_h3_font_size).'!important;
			}
			h4{
			    color:'.esc_html($tanawul_bakery_h4_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_h4_font_family).'!important;
			    font-size: '.esc_html($tanawul_bakery_h4_font_size).'!important;
			}
			h5{
			    color:'.esc_html($tanawul_bakery_h5_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_h5_font_family).'!important;
			    font-size: '.esc_html($tanawul_bakery_h5_font_size).'!important;
			}
			h6{
			    color:'.esc_html($tanawul_bakery_h6_color).'!important;
			    font-family: '.esc_html($tanawul_bakery_h6_font_family).'!important;
			    font-size: '.esc_html($tanawul_bakery_h6_font_size).'!important;
			}
			';
	
	wp_add_inline_style( 'tanawul-bakery-basic-style',$tanawul_bakery_custom_css );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'tanawul-bakery-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$tanawul_bakeryScreenReaderText=array();
	
	// if ( has_nav_menu( 'responsive-menu' ) ) {
		wp_enqueue_script( 'tanawul-bakery-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );

		$tanawul_bakeryScreenReaderText['expand']         = __( 'Expand child menu', 'tanawul-bakery' );
		$tanawul_bakeryScreenReaderText['collapse']       = __( 'Collapse child menu', 'tanawul-bakery' );
		
	// }
	
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	require get_parent_theme_file_path( '/color-option.php' );
	wp_add_inline_style( 'tanawul-bakery-basic-style',$tanawul_bakery_custom_css );

	wp_localize_script( 'tanawul-bakery-skip-link-focus-fix', 'tanawul_bakeryScreenReaderText', $tanawul_bakeryScreenReaderText );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tanawul_bakery_scripts' );

function tanawul_bakery_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'tanawul_bakery_loop_columns');
	if (!function_exists('tanawul_bakery_loop_columns')) {
	function tanawul_bakery_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Excerpt Limit Begin */
function tanawul_bakery_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function tanawul_bakery_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

//footer Link
define('TANAWUL_BAKERY_CREDIT',__('https://www.themeseye.com/wordpress/free-bakery-wordpress-theme/','tanawul-bakery'));

if ( ! function_exists( 'tanawul_bakery_credit' ) ) {
	function tanawul_bakery_credit(){
		echo "<a href=".esc_url(TANAWUL_BAKERY_CREDIT).">".esc_html__('Bakery WordPress Theme','tanawul-bakery')."</a>";
	}
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );