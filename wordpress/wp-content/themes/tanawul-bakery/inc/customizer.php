<?php
/**
 * Tanawul Bakery: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tanawul_bakery_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'tanawul_bakery_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'tanawul-bakery' ),
	    'description' => __( 'Description of what this panel does.', 'tanawul-bakery' ),
	) );

	// font array
	$tanawul_bakery_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );
    
	//Typography

	$wp_customize->add_section( 'tanawul_bakery_typography', array(
    	'title'      => __( 'Color / Fonts Settings', 'tanawul-bakery' ),
		'panel' => 'tanawul_bakery_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_paragraph_color', array(
		'label' => __('Paragraph Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_paragraph_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( 'Paragraph Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	$wp_customize->add_setting('tanawul_bakery_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_typography',
		'setting'	=> 'tanawul_bakery_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_atag_color', array(
		'label' => __('"a" Tag Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_atag_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( '"a" Tag Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_li_color', array(
		'label' => __('"li" Tag Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_li_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( '"li" Tag Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_h1_color', array(
		'label' => __('H1 Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_h1_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( 'H1 Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('tanawul_bakery_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_h1_font_size',array(
		'label'	=> __('H1 Font Size','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_typography',
		'setting'	=> 'tanawul_bakery_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_h2_color', array(
		'label' => __('h2 Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_h2_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( 'h2 Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('tanawul_bakery_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_h2_font_size',array(
		'label'	=> __('h2 Font Size','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_typography',
		'setting'	=> 'tanawul_bakery_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_h3_color', array(
		'label' => __('h3 Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_h3_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( 'h3 Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('tanawul_bakery_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_h3_font_size',array(
		'label'	=> __('h3 Font Size','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_typography',
		'setting'	=> 'tanawul_bakery_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_h4_color', array(
		'label' => __('h4 Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_h4_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( 'h4 Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('tanawul_bakery_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_h4_font_size',array(
		'label'	=> __('h4 Font Size','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_typography',
		'setting'	=> 'tanawul_bakery_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_h5_color', array(
		'label' => __('h5 Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_h5_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( 'h5 Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('tanawul_bakery_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_h5_font_size',array(
		'label'	=> __('h5 Font Size','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_typography',
		'setting'	=> 'tanawul_bakery_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'tanawul_bakery_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_h6_color', array(
		'label' => __('h6 Color', 'tanawul-bakery'),
		'section' => 'tanawul_bakery_typography',
		'settings' => 'tanawul_bakery_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('tanawul_bakery_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tanawul_bakery_h6_font_family', array(
	    'section'  => 'tanawul_bakery_typography',
	    'label'    => __( 'h6 Fonts','tanawul-bakery'),
	    'type'     => 'select',
	    'choices'  => $tanawul_bakery_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('tanawul_bakery_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_h6_font_size',array(
		'label'	=> __('h6 Font Size','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_typography',
		'setting'	=> 'tanawul_bakery_h6_font_size',
		'type'	=> 'text'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'tanawul_bakery_theme_color_option', array( 
		'panel' => 'tanawul_bakery_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'tanawul-bakery' ) 
	));

  	$wp_customize->add_setting( 'tanawul_bakery_theme_color_first', array(
	    'default' => '#fa605a',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_theme_color_first', array(
  		'label' => __('First Color Option', 'tanawul-bakery'),
	    'description' => __('One can change complete theme color on just one click.', 'tanawul-bakery'),
	    'section' => 'tanawul_bakery_theme_color_option',
	    'settings' => 'tanawul_bakery_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'tanawul_bakery_theme_color_second', array(
	    'default' => '#1a7e83',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_theme_color_second', array(
  		'label' => __('Second Color Option', 'tanawul-bakery'),
	    'description' => __('One can change complete theme color on just one click.', 'tanawul-bakery'),
	    'section' => 'tanawul_bakery_theme_color_option',
	    'settings' => 'tanawul_bakery_theme_color_second',
  	)));

  	//Layout Settings
	$wp_customize->add_section( 'tanawul_bakery_width_layout', array(
    	'title'      => __( 'Layout Settings', 'tanawul-bakery' ),
		'panel' => 'tanawul_bakery_panel_id'
	) );

	$wp_customize->add_setting('tanawul_bakery_loader_setting',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_loader_setting',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','tanawul-bakery'),
       'section' => 'tanawul_bakery_width_layout'
    ));

    $wp_customize->add_setting('tanawul_bakery_preloader_types',array(
        'default' => __('Default','tanawul-bakery'),
        'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_preloader_types',array(
        'type' => 'radio',
        'label' => __('Preloader Option','tanawul-bakery'),
        'section' => 'tanawul_bakery_width_layout',
        'choices' => array(
            'Default' => __('Default','tanawul-bakery'),
            'Circle' => __('Circle','tanawul-bakery'),
            'Two Circle' => __('Two Circle','tanawul-bakery')
        ),
	) );

    $wp_customize->add_setting( 'tanawul_bakery_loader_color_setting', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_loader_color_setting', array(
  		'label' => __('Preloader Color Option', 'tanawul-bakery'),
	    'section' => 'tanawul_bakery_width_layout',
	    'settings' => 'tanawul_bakery_loader_color_setting',
  	)));

  	$wp_customize->add_setting( 'tanawul_bakery_loader_background_color', array(
	    'default' => '#000',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tanawul_bakery_loader_background_color', array(
  		'label' => __('Preloader Background Color Option', 'tanawul-bakery'),
	    'section' => 'tanawul_bakery_width_layout',
	    'settings' => 'tanawul_bakery_loader_background_color',
  	)));

	$wp_customize->add_setting('tanawul_bakery_theme_options',array(
    'default' => __('Default','tanawul-bakery'),
        'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control('tanawul_bakery_theme_options',array(
        'type' => 'select',
        'label' => __('Container Box','tanawul-bakery'),
        'description' => __('Here you can change the Width layout. ','tanawul-bakery'),
        'section' => 'tanawul_bakery_width_layout',
        'choices' => array(
            'Default' => __('Default','tanawul-bakery'),
            'Wide Layout' => __('Wide Layout','tanawul-bakery'),
            'Box Layout' => __('Box Layout','tanawul-bakery'),
        ),
	) );

	// Button Settings
	$wp_customize->add_section( 'tanawul_bakery_button_option', array(
		'title' =>  __( 'Button', 'tanawul-bakery' ),
		'panel' => 'tanawul_bakery_panel_id',
	));

	$wp_customize->add_setting('tanawul_bakery_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_top_bottom_padding',array(
		'label'	=> __('Top and Bottom Padding ','tanawul-bakery'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tanawul_bakery_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tanawul_bakery_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_left_right_padding',array(
		'label'	=> __('Left and Right Padding','tanawul-bakery'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tanawul_bakery_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'tanawul_bakery_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tanawul_bakery_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','tanawul-bakery' ),
		'section'     => 'tanawul_bakery_button_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Sidebar Layout Settings
	$wp_customize->add_section( 'tanawul_bakery_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'tanawul-bakery' ),
		'panel' => 'tanawul_bakery_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('tanawul_bakery_layout_settings',array(
        'default' => __('Right Sidebar','tanawul-bakery'),
        'sanitize_callback' => 'tanawul_bakery_sanitize_choices'	        
	));
	$wp_customize->add_control('tanawul_bakery_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'tanawul-bakery'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'tanawul-bakery'),
        'section' => 'tanawul_bakery_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','tanawul-bakery'),
            'Right Sidebar' => __('Right Sidebar','tanawul-bakery'),
            'One Column' => __('Full Width','tanawul-bakery'),
            'Grid Layout' => __('Grid Layout','tanawul-bakery')
        ),
	));

	//Topbar section
	$wp_customize->add_section('tanawul_bakery_contact_details',array(
		'title'	=> __('Topbar Section','tanawul-bakery'),
		'description'	=> __('Add Header Content here','tanawul-bakery'),
		'priority'	=> null,
		'panel' => 'tanawul_bakery_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'tanawul_bakery_show_hide_topbar',array(
		'default' => 'true',
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('tanawul_bakery_show_hide_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Top Header','tanawul-bakery' ),
        'section' => 'tanawul_bakery_contact_details'
    ));

	$wp_customize->add_setting('tanawul_bakery_contact_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_contact_number',array(
		'label'	=> __('Add Phone Number','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_contact_number',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tanawul_bakery_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tanawul_bakery_email_address',array(
		'label'	=> __('Add Email Address','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_email_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tanawul_bakery_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tanawul_bakery_facebook_url',array(
		'label'	=> __('Add Facebook link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tanawul_bakery_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tanawul_bakery_twitter_url',array(
		'label'	=> __('Add Twitter link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tanawul_bakery_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tanawul_bakery_youtube_url',array(
		'label'	=> __('Add Youtube link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tanawul_bakery_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('tanawul_bakery_linkedin_url',array(
		'label'	=> __('Add Linkedin link','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_contact_details',
		'setting'	=> 'tanawul_bakery_linkedin_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'tanawul_bakery_slider' , array(
    	'title'      => __( 'Slider Settings', 'tanawul-bakery' ),
		'priority'   => null,
		'panel' => 'tanawul_bakery_panel_id'
	) );

	$wp_customize->add_setting('tanawul_bakery_slider_arrows',array(
        'default' => false,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','tanawul-bakery'),
      	'section' => 'tanawul_bakery_slider',
	));

	$wp_customize->add_setting('tanawul_bakery_slider_title',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_slider_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Title','tanawul-bakery'),
       'section' => 'tanawul_bakery_slider'
    ));

    $wp_customize->add_setting('tanawul_bakery_slider_content',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_slider_content',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Content','tanawul-bakery'),
       'section' => 'tanawul_bakery_slider'
    ));

    $wp_customize->add_setting('tanawul_bakery_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Button','tanawul-bakery'),
       'section' => 'tanawul_bakery_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'tanawul_bakery_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'tanawul_bakery_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'tanawul_bakery_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'tanawul-bakery' ),
			'section'  => 'tanawul_bakery_slider',
			'type'     => 'dropdown-pages'
		) );
		
	}

	$wp_customize->add_setting( 'tanawul_bakery_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'tanawul_bakery_slider_speed',array(
		'label' => esc_html__( 'Slider Speed','tanawul-bakery' ),
		'section' => 'tanawul_bakery_slider',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	));

	$wp_customize->add_setting('tanawul_bakery_slider_height_option',array(
		'default'=> __('600','tanawul-bakery'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_slider_height_option',array(
		'label'	=> __('Slider Height Option','tanawul-bakery'),
		'section'=> 'tanawul_bakery_slider',
		'type'=> 'text'
	));

    $wp_customize->add_setting('tanawul_bakery_slider_content_option',array(
    'default' => __('Left','tanawul-bakery'),
        'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control('tanawul_bakery_slider_content_option',array(
        'type' => 'select',
        'label' => __('Slider Content Layout','tanawul-bakery'),
        'section' => 'tanawul_bakery_slider',
        'choices' => array(
            'Center' => __('Center','tanawul-bakery'),
            'Left' => __('Left','tanawul-bakery'),
            'Right' => __('Right','tanawul-bakery'),
        ),
	) );

	$wp_customize->add_setting('tanawul_bakery_slider_button_text',array(
		'default'=> __('Read More','tanawul-bakery'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_slider_button_text',array(
		'label'	=> __('Slider Button Text','tanawul-bakery'),
		'section'=> 'tanawul_bakery_slider',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'tanawul_bakery_slider_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'tanawul_bakery_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','tanawul-bakery' ),
		'section'     => 'tanawul_bakery_slider',
		'type'        => 'range',
		'settings'    => 'tanawul_bakery_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('tanawul_bakery_slider_opacity_color',array(
      'default'              => __('0.6','tanawul-bakery'),
      'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control( 'tanawul_bakery_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','tanawul-bakery' ),
	'section'     => 'tanawul_bakery_slider',
	'type'        => 'select',
	'settings'    => 'tanawul_bakery_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','tanawul-bakery'),
      '0.1' =>  esc_attr('0.1','tanawul-bakery'),
      '0.2' =>  esc_attr('0.2','tanawul-bakery'),
      '0.3' =>  esc_attr('0.3','tanawul-bakery'),
      '0.4' =>  esc_attr('0.4','tanawul-bakery'),
      '0.5' =>  esc_attr('0.5','tanawul-bakery'),
      '0.6' =>  esc_attr('0.6','tanawul-bakery'),
      '0.7' =>  esc_attr('0.7','tanawul-bakery'),
      '0.8' =>  esc_attr('0.8','tanawul-bakery'),
      '0.9' =>  esc_attr('0.9','tanawul-bakery')
	),
	));

	//What We Offer
	$wp_customize->add_section('tanawul_bakery_we_offer',array(
		'title'	=> __('What We Offer Section','tanawul-bakery'),
		'description'	=> __('Add What We Offer sections below.','tanawul-bakery'),
		'panel' => 'tanawul_bakery_panel_id',
	));
	
	$wp_customize->add_setting('tanawul_bakery_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tanawul_bakery_text',array(
		'label'	=> __('Add Text','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_we_offer',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tanawul_bakery_we_offer_title',array( 
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tanawul_bakery_we_offer_title',array(
		'label'	=> __('Section Title','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_we_offer',
		'type'		=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('tanawul_bakery_we_offer_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('tanawul_bakery_we_offer_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','tanawul-bakery'),
		'section' => 'tanawul_bakery_we_offer',
	));

	//404 Page Setting
	$wp_customize->add_section('tanawul_bakery_page_not_found_setting',array(
		'title'	=> __('Page Not Found Settings','tanawul-bakery'),
		'panel' => 'tanawul_bakery_panel_id',
	));	

	$wp_customize->add_setting('tanawul_bakery_page_not_found_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_page_not_found_title',array(
		'label'	=> __('Page Not Found Title','tanawul-bakery'),
		'section'=> 'tanawul_bakery_page_not_found_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tanawul_bakery_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_page_not_found_content',array(
		'label'	=> __('Page Not Found Content','tanawul-bakery'),
		'section'=> 'tanawul_bakery_page_not_found_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('tanawul_bakery_mobile_media',array(
		'title'	=> __('Mobile Media Settings','tanawul-bakery'),
		'panel' => 'tanawul_bakery_panel_id',
	));

	$wp_customize->add_setting('tanawul_bakery_enable_disable_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_enable_disable_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Sidebar','tanawul-bakery'),
       'section' => 'tanawul_bakery_mobile_media'
    ));

	$wp_customize->add_setting('tanawul_bakery_enable_disable_topbar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_enable_disable_topbar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Top Header','tanawul-bakery'),
       'section' => 'tanawul_bakery_mobile_media'
    ));

    $wp_customize->add_setting('tanawul_bakery_enable_disable_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_enable_disable_slider',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider','tanawul-bakery'),
       'section' => 'tanawul_bakery_mobile_media'
    ));

    $wp_customize->add_setting('tanawul_bakery_show_hide_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_show_hide_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider Button','tanawul-bakery'),
       'section' => 'tanawul_bakery_mobile_media'
    ));

    $wp_customize->add_setting('tanawul_bakery_enable_disable_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_enable_disable_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Scroll To Top','tanawul-bakery'),
       'section' => 'tanawul_bakery_mobile_media'
    ));

	//Blog Post
	$wp_customize->add_section('tanawul_bakery_blog_post',array(
		'title'	=> __('Post Settings','tanawul-bakery'),
		'panel' => 'tanawul_bakery_panel_id',
	));	

	$wp_customize->add_setting('tanawul_bakery_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','tanawul-bakery'),
       'section' => 'tanawul_bakery_blog_post'
    ));

    $wp_customize->add_setting('tanawul_bakery_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Comments','tanawul-bakery'),
       'section' => 'tanawul_bakery_blog_post'
    ));

    $wp_customize->add_setting('tanawul_bakery_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Author','tanawul-bakery'),
       'section' => 'tanawul_bakery_blog_post'
    ));

    $wp_customize->add_setting('tanawul_bakery_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','tanawul-bakery'),
       'section' => 'tanawul_bakery_blog_post'
    ));

    $wp_customize->add_setting('tanawul_bakery_single_post_image',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_single_post_image',array(
       'type' => 'checkbox',
       'label' => __('Single Post Featured Image','tanawul-bakery'),
       'section' => 'tanawul_bakery_blog_post'
    ));

    $wp_customize->add_setting('tanawul_bakery_blog_post_layout',array(
        'default' => __('Default','tanawul-bakery'),
        'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
    ));
    $wp_customize->add_control('tanawul_bakery_blog_post_layout',array(
        'type' => 'radio',
        'label' => __('Post Layout Option','tanawul-bakery'),
        'section' => 'tanawul_bakery_blog_post',
        'choices' => array(
            'Default' => __('Default','tanawul-bakery'),
            'Center' => __('Center','tanawul-bakery'),
            'Image and Content' => __('Image and Content','tanawul-bakery'),
        ),
	) );

	$wp_customize->add_setting('tanawul_bakery_blog_description',array(
    	'default'   => __('Post Excerpt','tanawul-bakery'),
        'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control('tanawul_bakery_blog_description',array(
        'type' => 'select',
        'label' => __('Post Description','tanawul-bakery'),
        'section' => 'tanawul_bakery_blog_post',
        'choices' => array(
            'None' => __('None','tanawul-bakery'),
            'Post Excerpt' => __('Post Excerpt','tanawul-bakery'),
            'Post Content' => __('Post Content','tanawul-bakery'),
        ),
	) );

    $wp_customize->add_setting( 'tanawul_bakery_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'tanawul_bakery_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','tanawul-bakery' ),
		'section'     => 'tanawul_bakery_blog_post',
		'type'        => 'number',
		'settings'    => 'tanawul_bakery_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'tanawul_bakery_post_excerpt_suffix', array(
		'default'   => __('{...}','tanawul-bakery'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tanawul_bakery_post_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Indicator','tanawul-bakery' ),
		'section'     => 'tanawul_bakery_blog_post',
		'type'        => 'text',
		'settings'    => 'tanawul_bakery_post_excerpt_suffix',
	) );

	$wp_customize->add_setting('tanawul_bakery_button_text',array(
		'default'=> __('Read More','tanawul-bakery'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_button_text',array(
		'label'	=> __('Add Button Text','tanawul-bakery'),
		'section'=> 'tanawul_bakery_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'tanawul_bakery_pagination_option', array(
        'default'			=> 'Default',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'tanawul_bakery_pagination_option', array(
        'section' => 'tanawul_bakery_blog_post',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'tanawul-bakery' ),
        'choices'		=> array(
            'Default'  => __( 'Default', 'tanawul-bakery' ),
            'next-prev' => __( 'Next / Previous', 'tanawul-bakery' ),
    )));

    // related post setting
    $wp_customize->add_section('tanawul_bakery_related_post_section',array(
		'title'	=> __('Related Post Settings','tanawul-bakery'),
		'panel' => 'tanawul_bakery_panel_id',
	));	

	$wp_customize->add_setting('tanawul_bakery_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tanawul_bakery_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Related Post','tanawul-bakery'),
       'section' => 'tanawul_bakery_related_post_section',
    ));

	$wp_customize->add_setting( 'tanawul_bakery_show_related_post', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'tanawul_bakery_show_related_post', array(
        'section' => 'tanawul_bakery_related_post_section',
        'type' => 'radio',
        'label' => __( 'Show Related Posts', 'tanawul-bakery' ),
        'choices' => array(
            'categories'  => __(' By Categories', 'tanawul-bakery'),
            'tags' => __( ' By Tags', 'tanawul-bakery' ),
    )));

    $wp_customize->add_setting('tanawul_bakery_change_related_post_title',array(
		'default'=> __('Related Posts','tanawul-bakery'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_change_related_post_title',array(
		'label'	=> __('Change Related Post Title','tanawul-bakery'),
		'section'=> 'tanawul_bakery_related_post_section',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('tanawul_bakery_change_related_posts_number',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_change_related_posts_number',array(
		'label'	=> __('Change Related Post Number','tanawul-bakery'),
		'section'=> 'tanawul_bakery_related_post_section',
		'type'=> 'number',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));
	
	//Footer
	$wp_customize->add_section( 'tanawul_bakery_footer' , array(
    	'title'      => __( 'Footer Section', 'tanawul-bakery' ),
		'priority'   => null,
		'panel' => 'tanawul_bakery_panel_id'
	) );

	$wp_customize->add_setting('tanawul_bakery_footer_widget',array(
        'default'           => 4,
        'sanitize_callback' => 'tanawul_bakery_sanitize_choices',
    ));
    $wp_customize->add_control('tanawul_bakery_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer widget area', 'tanawul-bakery'),
        'section'     => 'tanawul_bakery_footer',
        'description' => __('Select the number of footer widget areas and after that, go to Appearance > Widgets and add your widgets in the footer.', 'tanawul-bakery'),
        'choices' => array(
            '1'     => __('One', 'tanawul-bakery'),
            '2'     => __('Two', 'tanawul-bakery'),
            '3'     => __('Three', 'tanawul-bakery'),
            '4'     => __('Four', 'tanawul-bakery')
        ),
    ));

    $wp_customize->add_setting('tanawul_bakery_copyright_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top and Bottom Padding','tanawul-bakery'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tanawul_bakery_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tanawul_bakery_hide_show_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll To Top','tanawul-bakery'),
      	'section' => 'tanawul_bakery_footer',
	));

	$wp_customize->add_setting('tanawul_bakery_footer_options',array(
        'default' => __('Right align','tanawul-bakery'),
        'sanitize_callback' => 'tanawul_bakery_sanitize_choices'
	));
	$wp_customize->add_control('tanawul_bakery_footer_options',array(
        'type' => 'select',
        'label' => __('Scroll To Top','tanawul-bakery'),
        'description' => __('Here you can change the Footer layout. ','tanawul-bakery'),
        'section' => 'tanawul_bakery_footer',
        'choices' => array(
            'Left align' => __('Left align','tanawul-bakery'),
            'Right align' => __('Right align','tanawul-bakery'),
            'Center align' => __('Center align','tanawul-bakery'),
        ),
	) );

	$wp_customize->add_setting('tanawul_bakery_scroll_top_fontsize',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_scroll_top_fontsize',array(
		'label'	=> __('Scroll To Top Font Size','tanawul-bakery'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tanawul_bakery_footer',
		'type'=> 'range'
	));

	$wp_customize->add_setting('tanawul_bakery_scroll_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_scroll_top_bottom_padding',array(
		'label'	=> __('Scroll Top Bottom Padding ','tanawul-bakery'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tanawul_bakery_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tanawul_bakery_scroll_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tanawul_bakery_scroll_left_right_padding',array(
		'label'	=> __('Scroll Left Right Padding','tanawul-bakery'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tanawul_bakery_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'tanawul_bakery_scroll_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tanawul_bakery_scroll_border_radius', array(
		'label'       => esc_html__( 'Scroll To Top Border Radius','tanawul-bakery' ),
		'section'     => 'tanawul_bakery_footer',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('tanawul_bakery_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tanawul_bakery_footer_text',array(
		'label'	=> __('Add Copyright Text','tanawul-bakery'),
		'section'	=> 'tanawul_bakery_footer',
		'setting'	=> 'tanawul_bakery_footer_text',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'tanawul_bakery_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'tanawul_bakery_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'tanawul_bakery_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Tanawul Bakery 1.0
 * @see tanawul-bakery_customize_register()
 *
 * @return void
 */
function tanawul_bakery_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Tanawul Bakery 1.0
 * @see tanawul-bakery_customize_register()
 *
 * @return void
 */
function tanawul_bakery_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function tanawul_bakery_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tanawul_Bakery_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Tanawul_Bakery_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Tanawul_Bakery_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Tanawul Bakery Pro', 'tanawul-bakery' ),
					'pro_text' => esc_html__( 'Go Pro', 'tanawul-bakery' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/bakery-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'tanawul-bakery-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'tanawul-bakery-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Tanawul_Bakery_Customize::get_instance();