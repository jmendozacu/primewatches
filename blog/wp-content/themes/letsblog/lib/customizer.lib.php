<?php
/**
* Custom Sanitize Functions
**/
function letsblog_sanitize_checkbox( $input ) {
	if(is_bool($input))
	{
		return $input;
	}
	else
	{
		return false;
	}

}

function letsblog_sanitize_slider( $input ) {	if(is_numeric($input))
	{
		return $input;
	}
	else
	{
		return 0;

	}
}

function letsblog_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/*** Configuration to disable default Wordpress customizer tabs
**/

add_action( 'customize_register', 'letsblog_customize_register' );
function letsblog_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
}

/**
 * Configuration sample for the Kirki Customizer
 */
function kirki_demo_configuration_sample() {

    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => esc_html__( 'Background Color', THEMEDOMAIN ),
        'background-image' => esc_html__( 'Background Image', THEMEDOMAIN ),
        'no-repeat' => esc_html__( 'No Repeat', THEMEDOMAIN ),
        'repeat-all' => esc_html__( 'Repeat All', THEMEDOMAIN ),
        'repeat-x' => esc_html__( 'Repeat Horizontally', THEMEDOMAIN ),
        'repeat-y' => esc_html__( 'Repeat Vertically', THEMEDOMAIN ),
        'inherit' => esc_html__( 'Inherit', THEMEDOMAIN ),
        'background-repeat' => esc_html__( 'Background Repeat', THEMEDOMAIN ),
        'cover' => esc_html__( 'Cover', THEMEDOMAIN ),
        'contain' => esc_html__( 'Contain', THEMEDOMAIN ),
        'background-size' => esc_html__( 'Background Size', THEMEDOMAIN ),
        'fixed' => esc_html__( 'Fixed', THEMEDOMAIN ),
        'scroll' => esc_html__( 'Scroll', THEMEDOMAIN ),
        'background-attachment' => esc_html__( 'Background Attachment', THEMEDOMAIN ),
        'left-top' => esc_html__( 'Left Top', THEMEDOMAIN ),
        'left-center' => esc_html__( 'Left Center', THEMEDOMAIN ),
        'left-bottom' => esc_html__( 'Left Bottom', THEMEDOMAIN ),
        'right-top' => esc_html__( 'Right Top', THEMEDOMAIN ),
        'right-center' => esc_html__( 'Right Center', THEMEDOMAIN ),
        'right-bottom' => esc_html__( 'Right Bottom', THEMEDOMAIN ),
        'center-top' => esc_html__( 'Center Top', THEMEDOMAIN ),
        'center-center' => esc_html__( 'Center Center', THEMEDOMAIN ),
        'center-bottom' => esc_html__( 'Center Bottom', THEMEDOMAIN ),
        'background-position' => esc_html__( 'Background Position', THEMEDOMAIN ),
        'background-opacity' => esc_html__( 'Background Opacity', THEMEDOMAIN ),
        'ON' => esc_html__( 'ON', THEMEDOMAIN ),
        'OFF' => esc_html__( 'OFF', THEMEDOMAIN ),
        'all' => esc_html__( 'All', THEMEDOMAIN ),
        'cyrillic' => esc_html__( 'Cyrillic', THEMEDOMAIN ),
        'cyrillic-ext' => esc_html__( 'Cyrillic Extended', THEMEDOMAIN ),
        'devanagari' => esc_html__( 'Devanagari', THEMEDOMAIN ),
        'greek' => esc_html__( 'Greek', THEMEDOMAIN ),
        'greek-ext' => esc_html__( 'Greek Extended', THEMEDOMAIN ),
        'khmer' => esc_html__( 'Khmer', THEMEDOMAIN ),
        'latin' => esc_html__( 'Latin', THEMEDOMAIN ),
        'latin-ext' => esc_html__( 'Latin Extended', THEMEDOMAIN ),
        'vietnamese' => esc_html__( 'Vietnamese', THEMEDOMAIN ),
        'serif' => _x( 'Serif', 'font style', THEMEDOMAIN ),
        'sans-serif' => _x( 'Sans Serif', 'font style', THEMEDOMAIN ),
        'monospace' => _x( 'Monospace', 'font style', THEMEDOMAIN ),
    );

    $args = array(
        'textdomain'   => THEMEDOMAIN,
    );

    return $args;

}
add_filter( 'kirki/config', 'kirki_demo_configuration_sample' );

/**
 * Create the customizer panels and sections
 */
function letsblog_add_panels_and_sections( $wp_customize ) {

	/**
     * Add panels
     */
    $wp_customize->add_panel( 'general', array(
        'priority'    => 35,
        'title'       => esc_html__( 'General', THEMEDOMAIN ),
    ) ); 
    
    $wp_customize->add_panel( 'menu', array(
        'priority'    => 35,
        'title'       => esc_html__( 'Menu', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'header', array(
        'priority'    => 39,
        'title'       => esc_html__( 'Header', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'sidebar', array(
        'priority'    => 43,
        'title'       => esc_html__( 'Sidebar', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'footer', array(
        'priority'    => 44,
        'title'       => esc_html__( 'Footer', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'blog', array(
        'priority'    => 45,
        'title'       => esc_html__( 'Blog', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'gallery', array(
        'priority'    => 46,
        'title'       => esc_html__( 'Gallery', THEMEDOMAIN ),
    ) );

    /**
     * Add sections
     */
	$wp_customize->add_section( 'logo_favicon', array(
        'title'       => esc_html__( 'Logo & Favicon', THEMEDOMAIN ),
        'priority'    => 34,

    ) );
    
    $wp_customize->add_section( 'general_image', array(
        'title'       => esc_html__( 'Image', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'general_typography', array(
        'title'       => esc_html__( 'Typography', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 47,

    ) );
    
    $wp_customize->add_section( 'general_color', array(
        'title'       => esc_html__( 'Background & Colors', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 48,

    ) );
    
    $wp_customize->add_section( 'general_input', array(
        'title'       => esc_html__( 'Input and Button Elements', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 49,

    ) );
    
    $wp_customize->add_section( 'general_sharing', array(
        'title'       => esc_html__( 'Sharing', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 50,

    ) );
    
    $wp_customize->add_section( 'general_mobile', array(
        'title'       => esc_html__( 'Mobile', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 50,

    ) );
    
    $wp_customize->add_section( 'general_frame', array(
        'title'       => esc_html__( 'Frame', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 51,

    ) );
    
    $wp_customize->add_section( 'general_boxed', array(
        'title'       => esc_html__( 'Boxed Layout', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 52,

    ) );

    $wp_customize->add_section( 'menu_general', array(
        'title'       => esc_html__( 'General', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 36,

    ) );
    
    $wp_customize->add_section( 'menu_typography', array(
        'title'       => esc_html__( 'Typography', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 36,

    ) );
    
    $wp_customize->add_section( 'menu_color', array(
        'title'       => esc_html__( 'Colors', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 37,

    ) );
    
    $wp_customize->add_section( 'menu_background', array(
        'title'       => esc_html__( 'Background', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_submenu', array(
        'title'       => esc_html__( 'Sub Menu', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_megamenu', array(
        'title'       => esc_html__( 'Mega Menu', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_topbar', array(
        'title'       => esc_html__( 'Top Bar', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_sidemenu', array(
        'title'       => esc_html__( 'Side Menu', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 39,

    ) );
    
    $wp_customize->add_section( 'menu_search', array(
        'title'       => esc_html__( 'Side Menu Search', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 40,

    ) );
    
    $wp_customize->add_section( 'header_background', array(
        'title'       => esc_html__( 'Background', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 40,

    ) );
    
    $wp_customize->add_section( 'header_title', array(
        'title'       => esc_html__( 'Page Title', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_title_bg', array(
        'title'       => esc_html__( 'Page Title With Background Image', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_builder_title', array(
        'title'       => esc_html__( 'Content Builder Header', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_tagline', array(
        'title'       => esc_html__( 'Page Tagline & Sub Title', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 42,

    ) );
    
    $wp_customize->add_section( 'sidebar_typography', array(
        'title'       => esc_html__( 'Typography', THEMEDOMAIN ),
        'panel'		  => 'sidebar',
        'priority'    => 43,

    ) );
    
    $wp_customize->add_section( 'sidebar_color', array(
        'title'       => esc_html__( 'Colors', THEMEDOMAIN ),
        'panel'		  => 'sidebar',
        'priority'    => 44,

    ) );
    
    $wp_customize->add_section( 'footer_general', array(
        'title'       => esc_html__( 'General', THEMEDOMAIN ),
        'panel'		  => 'footer',
        'priority'    => 45,

    ) );
    
    $wp_customize->add_section( 'footer_color', array(
        'title'       => esc_html__( 'Colors', THEMEDOMAIN ),
        'panel'		  => 'footer',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'footer_copyright', array(
        'title'       => esc_html__( 'Copyright', THEMEDOMAIN ),
        'panel'		  => 'footer',
        'priority'    => 47,

    ) );
    
    $wp_customize->add_section( 'gallery_sorting', array(
        'title'       => esc_html__( 'Images Sorting', THEMEDOMAIN ),
        'panel'		  => 'gallery',
        'priority'    => 48,

    ) );
    
    $wp_customize->add_section( 'gallery_lightbox', array(
        'title'       => esc_html__( 'Lightbox', THEMEDOMAIN ),
        'panel'		  => 'gallery',
        'priority'    => 49,

    ) );  
    
    $wp_customize->add_section( 'blog_general', array(
        'title'       => esc_html__( 'Layout', THEMEDOMAIN ),
        'panel'		  => 'blog',
        'priority'    => 53,

    ) );
    
    $wp_customize->add_section( 'blog_slider', array(
        'title'       => esc_html__( 'Slider', THEMEDOMAIN ),
        'panel'		  => 'blog',
        'priority'    => 54,

    ) );
    
    $wp_customize->add_section( 'blog_single', array(
        'title'       => esc_html__( 'Single Post', THEMEDOMAIN ),
        'panel'		  => 'blog',
        'priority'    => 55,

    ) );
    
    $wp_customize->add_section( 'blog_typography', array(
        'title'       => esc_html__( 'Typography', THEMEDOMAIN ),
        'panel'		  => 'blog',
        'priority'    => 56,

    ) );

}
add_action( 'customize_register', 'letsblog_add_panels_and_sections' );

/**
 * Register and setting to header section
 */
function letsblog_header_setting( $wp_customize ) {

	//Register Logo Tab Settings
	$wp_customize->add_setting( 'tg_favicon', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
	
    $wp_customize->add_setting( 'tg_retina_logo', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    //End Logo Tab Settings
    
    //Register General Tab Settings
    $wp_customize->add_setting( 'tg_enable_right_click', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_enable_dragging', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_body_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_body_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
	$wp_customize->add_setting( 'tg_header_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_header_font_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h1_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h2_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h3_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h4_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h5_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h6_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_hover_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_h1_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_hr_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_focus_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_button_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End General Tab Settings
    

    //Register Menu Tab Settings
    $wp_customize->add_setting( 'tg_main_menu', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_fixed_menu', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_hover_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_active_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_hover_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_hover_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_megamenu_header_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_megamenu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_social_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_contact_hours', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_contact_number', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_instant', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_input_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_hover_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End Menu Tab Settings
    
    //Register Header Tab Settings
	$wp_customize->add_setting( 'tg_page_header_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_page_header_padding_top', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_header_padding_bottom', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_bg_height', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    //End Header Tab Settings
    
    //Register Copyright Tab Settings
    
    $wp_customize->add_setting( 'tg_footer_sidebar', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
	
	$wp_customize->add_setting( 'tg_footer_social_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
	$wp_customize->add_setting( 'tg_footer_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_hover_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_social_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_text', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_html',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_right_area', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_totop', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    //End Copyright Tab Settings
    
    
    //Begin Gallery Tab Settings
    $wp_customize->add_setting( 'tg_gallery_sort', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_lightbox_enable_caption', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    //End Gallery Tab Settings
    
    
    //Begin Blog Tab Settings
    $wp_customize->add_setting( 'tg_blog_display_full', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_home_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_archive_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_category_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_tag_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_search_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_slider', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_slider_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_slider_cat', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_slider_items', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_header_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_feat_content', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_tags', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_author', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_related', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_title_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_title_font_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_title_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'letsblog_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_date_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_date_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End Blog Tab Settings
    
    
    //Add Live preview
    if ( $wp_customize->is_preview() && ! is_admin() ) {
	    add_action( 'wp_footer', 'letsblog_customize_preview', 21);
	}
}
add_action( 'customize_register', 'letsblog_header_setting' );

/**
 * Create the setting
 */
function letsblog_custom_setting( $controls ) {

	//Default control choices
	$tg_text_transform = array(
	    'none' => 'None',
	    'capitalize' => 'Capitalize',
	    'uppercase' => 'Uppercase',
	    'lowercase' => 'Lowercase',
	);
	
	$tg_text_alignment = array(
	    'left' => 'Left',
	    'center' => 'Center',
	    'right' => 'Right',
	);
	
	$tg_copyright_content = array(
	    'social' => 'Social Icons',
	    'menu' => 'Footer Menu',
	);
	
	$tg_copyright_column = array(
	    '' => 'Hide Footer Sidebar',
	    1 => '1 Column',
	    2 => '2 Column',
	    3 => '3 Column',
	    4 => '4 Column',
	);
	
	$tg_gallery_sort = array(
		'drag' => 'By Drag&drop',
		'post_date' => 'By Newest',
		'post_date_old' => 'By Oldest',
		'rand' => 'By Random',
		'title' => 'By Title',
	);
	
	$tg_blog_layout = array(
		'blog_r' => 'Right Sidebar',
		'blog_l' => 'Left Sidebar',
		'blog_f' => 'Fullwidth',
		'blog_2cols' => 'Grid 2 Columns',
		'blog_3cols' => 'Grid 3 Columns',
		'blog_s' => 'List',
		'blog_r_grid' => 'Full Post + Grid Right Sidebar',
		'blog_l_grid' => 'Full Post + Grid Left Sidebar',
		'blog_f_grid' => 'Full Post + Grid Fullwidth',
		'blog_s_grid' => 'Full Post + List',
	);
	
	$tg_slider_layout = array(
		'slider' => 'Fullwidth',
		'fixed-slider' => 'Fixed Width',
		'3cols-slider' => '3 Columns',
	);
	
	//Get all categories
	$categories_arr = get_categories();
	$tg_categories_select = array();
	$tg_categories_select[''] = '';
	
	foreach ($categories_arr as $cat) {
		$tg_categories_select[$cat->cat_ID] = $cat->cat_name;
	}
	
	//Register Logo Tab Settings
	$controls[] = array(
        'type'     => 'image',
        'setting'  => 'tg_favicon',
        'label'    => esc_html__( 'Favicon', THEMEDOMAIN ),
        'description' => esc_html__('A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image', THEMEDOMAIN ),
        'section'  => 'logo_favicon',
	    'default'  => '',
	    'priority' => 1,
    );
	
	$controls[] = array(
        'type'     => 'image',
        'setting'  => 'tg_retina_logo',
        'label'    => esc_html__( 'Retina Logo', THEMEDOMAIN ),
        'description' => esc_html__('Retina Ready Image logo. It should be 2x size of normal logo. For example 200x60px logo will displays at 100x30px', THEMEDOMAIN ),
        'section'  => 'logo_favicon',
	    'default'  => get_template_directory_uri().'/images/logo@2x.png',
	    'priority' => 2,
    );
    //End Logo Tab Settings
    
    //Register General Tab Settings
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_enable_right_click',
        'label'    => esc_html__( 'Enable Right Click Protection', THEMEDOMAIN ),
        'description' => esc_html__('Check this to disable right click.', THEMEDOMAIN ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_enable_dragging',
        'label'    => esc_html__( 'Enable Image Dragging Protection', THEMEDOMAIN ),
        'description' => esc_html__('Check this to disable dragging on all images.', THEMEDOMAIN ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_body_font',
        'label'    => esc_html__( 'Main Content Font Family', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'body, input[type=text], input[type=email], input[type=url], input[type=password], textarea',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_body_font_size',
        'label'    => esc_html__( 'Main Content Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 14,
        'choices' => array( 'min' => 11, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'body',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_header_font',
        'label'    => esc_html__( 'H1, H2, H3, H4, H5, H6 Font Family', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_header_font_weight',
        'label'    => esc_html__( 'H1, H2, H3, H4, H5, H6 Font Weight', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 400,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h1_size',
        'label'    => esc_html__( 'H1 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 34,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h1',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h2_size',
        'label'    => esc_html__( 'H2 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 30,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h2',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h3_size',
        'label'    => esc_html__( 'H3 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 26,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h3',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h4_size',
        'label'    => esc_html__( 'H4 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 22,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h4',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h5_size',
        'label'    => esc_html__( 'H5 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 18,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h5',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h6_size',
        'label'    => esc_html__( 'H6 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 16,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h6',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_font_color',
        'label'    => esc_html__( 'Page Content Font Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => 'body, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '::selection',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_link_color',
        'label'    => esc_html__( 'Page Content Link Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#be9656',
        'output' => array(
	        array(
	            'element'  => 'a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_hover_link_color',
        'label'    => esc_html__( 'Page Content Hover Link Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'a:hover, a:active, .post_info_comment a i',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_h1_font_color',
        'label'    => esc_html__( 'H1, H2, H3, H4, H5, H6 Font Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 14,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_hr_color',
        'label'    => esc_html__( 'Horizontal Line Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => '#social_share_wrapper, hr, #social_share_wrapper, .post.type-post, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #post_more_wrapper, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, #autocomplete, .page_tagline',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 15,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_input_bg_color',
        'label'    => esc_html__( 'Input and Textarea Background Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], textarea',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_input_font_color',
        'label'    => esc_html__( 'Input and Textarea Font Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#000',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], textarea',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 17,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_input_border_color',
        'label'    => esc_html__( 'Input and Textarea Border Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], textarea',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_input_focus_color',
        'label'    => esc_html__( 'Input and Textarea Focus State Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => 'input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, textarea:focus',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 19,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_button_font',
        'label'    => esc_html__( 'Button Font Family', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 19,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_button_bg_color',
        'label'    => esc_html__( 'Button Background Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#888888',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_button_font_color',
        'label'    => esc_html__( 'Button Font Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 21,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_button_border_color',
        'label'    => esc_html__( 'Button Border Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#888888',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 22,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_mobile_responsive',
        'label'    => esc_html__( 'Enable Responsive Layout', THEMEDOMAIN ),
        'description' => esc_html__('Check this to enable responsive layout for tablet and mobile devices.', THEMEDOMAIN ),
        'section'  => 'general_mobile',
        'default'  => 1,
	    'priority' => 25,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_frame',
        'label'    => esc_html__( 'Enable Frame', THEMEDOMAIN ),
        'description' => esc_html__('Check this to enable frame for site layout', THEMEDOMAIN ),
        'section'  => 'general_frame',
        'default'  => 1,
	    'priority' => 26,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_frame_color',
        'label'    => esc_html__( 'Frame Color', THEMEDOMAIN ),
        'section'  => 'general_frame',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.frame_top, .frame_bottom, .frame_left, .frame_right',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 27,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_boxed',
        'label'    => esc_html__( 'Enable Boxed Layout', THEMEDOMAIN ),
        'description' => esc_html__('Check this to enable boxed layout for site layout', THEMEDOMAIN ),
        'section'  => 'general_boxed',
        'default'  => 0,
	    'priority' => 28,
    );
    //End General Tab Settings

	//Register Menu Tab Settings
	
	$controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_main_menu',
        'label'    => esc_html__( 'Enable Main Menu', THEMEDOMAIN ),
        'description' => esc_html__('Enable this to display main menu.', THEMEDOMAIN ),
        'section'  => 'menu_general',
        'default'  => 1,
	    'priority' => 1,
    );
	
	$controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_fixed_menu',
        'label'    => esc_html__( 'Enable Sticky Menu', THEMEDOMAIN ),
        'description' => esc_html__('Enable this to display main menu fixed when scrolling.', THEMEDOMAIN ),
        'section'  => 'menu_general',
        'default'  => '',
	    'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_menu_font',
        'label'    => esc_html__( 'Menu Font Family', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_menu_font_size',
        'label'    => esc_html__( 'Menu Font Size', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 12,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_menu_weight',
        'label'    => esc_html__( 'Menu Font Weight', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 600,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_menu_font_spacing',
        'label'    => esc_html__( 'Menu Font Spacing', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_menu_transform',
        'label'    => esc_html__( 'Menu Font Text Transform', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_font_color',
        'label'    => esc_html__( 'Menu Font Color', THEMEDOMAIN ),
        'section'  => 'menu_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_hover_font_color',
        'label'    => esc_html__( 'Menu Hover State Font Color', THEMEDOMAIN ),
        'section'  => 'menu_color',
        'default'  => '#b38d51',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_active_font_color',
        'label'    => esc_html__( 'Menu Active State Font Color', THEMEDOMAIN ),
        'section'  => 'menu_color',
        'default'  => '#b38d51',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'background',
        'setting'  => 'tg_menu_bg',
        'label'    => esc_html__( 'Menu Background', THEMEDOMAIN ),
        'section'  => 'menu_background',
	    'default'     => array(
	        'color'    => 'rgba(256,256,256,0.95)',
	        'image'    => '',
	        'repeat'   => 'no-repeat',
	        'size'     => 'cover',
	        'attach'   => 'fixed',
	        'position' => 'left-top',
	        'opacity'  => 100
	    ),
	    'output' => '.top_bar',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_submenu_font_size',
        'label'    => esc_html__( 'SubMenu Font Size', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => 11,
        'choices' => array( 'min' => 10, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_submenu_weight',
        'label'    => esc_html__( 'SubMenu Font Weight', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => 600,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_submenu_font_spacing',
        'label'    => esc_html__( 'SubMenu Font Spacing', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_submenu_transform',
        'label'    => esc_html__( 'Menu Font Text Transform', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_font_color',
        'label'    => esc_html__( 'Sub Menu Font Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_hover_font_color',
        'label'    => esc_html__( 'Sub Menu Hover State Font Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#b38d51',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 14,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_hover_bg_color',
        'label'    => esc_html__( 'Sub Menu Hover State Background Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#f9f9f9',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 15,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_bg_color',
        'label'    => esc_html__( 'Sub Menu Background Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_border_color',
        'label'    => esc_html__( 'Sub Menu Border Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 17,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_megamenu_header_color',
        'label'    => esc_html__( 'Mega Menu Header Font Color', THEMEDOMAIN ),
        'section'  => 'menu_megamenu',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_megamenu_border_color',
        'label'    => esc_html__( 'Mega Menu Border Color', THEMEDOMAIN ),
        'section'  => 'menu_megamenu',
        'default'  => '#eeeeee',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav li.megamenu ul li',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_topbar',
        'label'    => esc_html__( 'Display Top Bar', THEMEDOMAIN ),
        'description' => esc_html__('Enable this option to display top bar above main menu', THEMEDOMAIN ),
        'section'  => 'menu_topbar',
        'default'  => 0,
	    'priority' => 21,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_topbar_bg_color',
        'label'    => esc_html__( 'Top Bar Background Color', THEMEDOMAIN ),
        'section'  => 'menu_topbar',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.above_top_bar',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 22,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_topbar_font_color',
        'label'    => esc_html__( 'Top Bar Menu Font Color', THEMEDOMAIN ),
        'section'  => 'menu_topbar',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#top_menu li a, .top_contact_info, .top_contact_info i, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 23,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'tg_menu_contact_hours',
        'label'    => esc_html__( 'Contact Hours (Optional)', THEMEDOMAIN ),
        'description' => esc_html__('Enter your company contact hours.', THEMEDOMAIN ),
        'section'  => 'menu_contact',
        'default'  => 'Mon-Fri 09.00 - 17.00',
        'transport' 	 => 'postMessage',
	    'priority' => 26,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'tg_menu_contact_number',
        'label'    => esc_html__( 'Contact Phone Number (Optional)', THEMEDOMAIN ),
        'description' => esc_html__('Enter your company contact phone number.', THEMEDOMAIN ),
        'section'  => 'menu_contact',
        'default'  => '1.800.456.6743',
        'transport' => 'postMessage',
	    'priority' => 27,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_topbar_social_link',
        'label'    => esc_html__( 'Open Top Bar Social Icons link in new window', THEMEDOMAIN ),
        'description' => esc_html__('Check this to open top bar social icons link in new window', THEMEDOMAIN ),
        'section'  => 'menu_contact',
        'default'  => 1,
	    'priority' => 28,
    );
        
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_menu_search',
        'label'    => esc_html__( 'Enable Search', THEMEDOMAIN ),
        'description' => esc_html__('Select to display search form in header of side menu', THEMEDOMAIN ),
        'section'  => 'menu_search',
        'default'  => 1,
	    'priority' => 28,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_menu_search_instant',
        'label'    => esc_html__( 'Enable Instant Search', THEMEDOMAIN ),
        'description' => esc_html__('Select to display search result instantly while typing', THEMEDOMAIN ),
        'section'  => 'menu_search',
        'default'  => 1,
	    'priority' => 29,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_search_input_color',
        'label'    => esc_html__( 'Search Input Background Color', THEMEDOMAIN ),
        'section'  => 'menu_search',
        'default'  => '#ebebeb',
        'output' => array(
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 30,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_search_font_color',
        'label'    => esc_html__( 'Search Input Font Color', THEMEDOMAIN ),
        'section'  => 'menu_search',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform input[type=text], .mobile_menu_wrapper #searchform button i',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_sidemenu',
        'label'    => esc_html__( 'Enable Side Menu on Desktop', THEMEDOMAIN ),
        'description' => 'Check this option to enable side menu on desktop',
        'section'  => 'menu_sidemenu',
        'default'  => 1,
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'background',
        'setting'  => 'tg_sidemenu_bg',
        'label'    => esc_html__( 'Side Menu Background', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
	    'default'     => array(
	        'color'    => '#ffffff',
	        'image'    => '',
	        'repeat'   => 'no-repeat',
	        'size'     => 'cover',
	        'attach'   => 'fixed',
	        'position' => 'left-top',
	        'opacity'  => 100
	    ),
	    'output' => '.mobile_menu_wrapper',
	    'priority' => 32,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_sidemenu_font',
        'label'    => esc_html__( 'Side Menu Font Family', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 40,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidemenu_font_size',
        'label'    => esc_html__( 'Side Menu Font Size', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => 13,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 41,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_sidemenu_font_transform',
        'label'    => esc_html__( 'Side Menu Font Text Transform', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 42,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidemenu_font_spacing',
        'label'    => esc_html__( 'Side Menu Font Spacing', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 42,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidemenu_font_color',
        'label'    => esc_html__( 'Side Menu Font Color', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => '#666666',
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, .mobile_menu_wrapper .sidebar_wrapper, #close_mobile_menu i',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 43,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_hover_font_color',
        'label'    => esc_html__( 'Side Menu Hover State Font Color', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:hover, #sub_menu li a:active, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 44,
    );
    //End Menu Tab Settings
    
    //Register Header Tab Settings
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_page_title_img_blur',
        'label'    => esc_html__( 'Add Blur Effect When Scroll', THEMEDOMAIN ),
        'description' => esc_html__('Enable this option to add blur effect to header background image when scrolling pass it', THEMEDOMAIN ),
        'section'  => 'header_background',
        'default'  => '1',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_page_header_bg_color',
        'label'    => esc_html__( 'Page Header Background Color', THEMEDOMAIN ),
        'section'  => 'header_background',
        'default'  => '#f9f9f9',
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_header_padding_top',
        'label'    => esc_html__( 'Page Header Padding Top', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 40,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'padding-top',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_header_padding_bottom',
        'label'    => esc_html__( 'Page Header Padding Bottom', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 40,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'padding-bottom',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_title_font_size',
        'label'    => esc_html__( 'Page Title Font Size', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 36,
        'choices' => array( 'min' => 12, 'max' => 100, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_title_font_weight',
        'label'    => esc_html__( 'Page Title Font Weight', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 400,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .post_caption h1',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_page_title_transform',
        'label'    => esc_html__( 'Page Title Text Transform', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .post_caption h1',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_title_font_spacing',
        'label'    => esc_html__( 'Page Title Font Spacing', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .post_caption h1',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_page_title_font_color',
        'label'    => esc_html__( 'Page Title Font Color', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .post_caption h1',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_title_bg_height',
        'label'    => esc_html__( 'Page Title Background Image Height (in %)', THEMEDOMAIN ),
        'section'  => 'header_title_bg',
        'default'  => 500,
        'choices' => array( 'min' => 100, 'max' => 800, 'step' => 10 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption.hasbg',
	            'property' => 'height',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_page_tagline_font_color',
        'label'    => esc_html__( 'Page Tagline Font Color', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => '.page_tagline',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_tagline_font_size',
        'label'    => esc_html__( 'Page Tagline Font Size', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => 11,
        'choices' => array( 'min' => 10, 'max' => 30, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.page_tagline',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_tagline_font_weight',
        'label'    => esc_html__( 'Page Tagline Font Weight', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => 400,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '.page_tagline',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_tagline_font_spacing',
        'label'    => esc_html__( 'Page Tagline Font Spacing', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => 5,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.page_tagline',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_page_tagline_transform',
        'label'    => esc_html__( 'Page Tagline Text Transform', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '.page_tagline',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    //End Header Tab Settings
    
    //Register Sidebar Tab Settings
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_sidebar_title_font',
        'label'    => esc_html__( 'Widget Title Font Family', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidebar_title_font_size',
        'label'    => esc_html__( 'Widget Title Font Size', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 12,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidebar_title_font_weight',
        'label'    => esc_html__( 'Widget Title Font Weight', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 600,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidebar_title_font_spacing',
        'label'    => esc_html__( 'Widget Title Font Spacing', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 4, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_sidebar_title_transform',
        'label'    => esc_html__( 'Widget Title Text Transform', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidebar_font_color',
        'label'    => esc_html__( 'Sidebar Font Color', THEMEDOMAIN ),
        'section'  => 'sidebar_color',
        'default'  => '#444444',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidebar_link_color',
        'label'    => esc_html__( 'Sidebar Link Color', THEMEDOMAIN ),
        'section'  => 'sidebar_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a, .page_content_wrapper .inner .sidebar_wrapper a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidebar_hover_link_color',
        'label'    => esc_html__( 'Sidebar Hover Link Color', THEMEDOMAIN ),
        'section'  => 'sidebar_color',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:hover, #page_content_wrapper .inner .sidebar_wrapper a:active, .page_content_wrapper .inner .sidebar_wrapper a:hover, .page_content_wrapper .inner .sidebar_wrapper a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidebar_title_color',
        'label'    => esc_html__( 'Sidebar Widget Title Font Color', THEMEDOMAIN ),
        'section'  => 'sidebar_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    //End Sidebar Tab Settings
    
    //Register Footer Tab Settings
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_footer_sidebar',
        'label'    => esc_html__( 'Footer Sidebar Columns', THEMEDOMAIN ),
        'section'  => 'footer_general',
        'default'  => 4,
        'choices'  => $tg_copyright_column,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_footer_social_link',
        'label'    => esc_html__( 'Open Footer Social Icons link in new window', THEMEDOMAIN ),
        'description' => esc_html__('Check this to open footer social icons link in new window', THEMEDOMAIN ),
        'section'  => 'footer_general',
        'default'  => 1,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'background',
        'setting'  => 'tg_footer_bg',
        'label'    => esc_html__( 'Footer Background', THEMEDOMAIN ),
        'section'  => 'footer_color',
	    'default'     => array(
	        'color'    => '#222222',
	        'image'    => '',
	        'repeat'   => 'no-repeat',
	        'size'     => 'cover',
	        'attach'   => 'fixed',
	        'position' => 'center-center',
	        'opacity'  => 100
	    ),
	    'output' => '.footer_bar',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_font_color',
        'label'    => esc_html__( 'Footer Font Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => '#footer, #copyright',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_link_color',
        'label'    => esc_html__( 'Footer Link Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#copyright a, #copyright a:active, #footer a, #footer a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_hover_link_color',
        'label'    => esc_html__( 'Footer Hover Link Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#be9656',
        'output' => array(
	        array(
	            'element'  => '#copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_border_color',
        'label'    => esc_html__( 'Footer Border Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#444444',
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper, .footer_bar',
	            'property' => 'border-color',
	        ),
	        array(
	            'element'  => '#footer .widget_tag_cloud div a',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_social_color',
        'label'    => esc_html__( 'Footer Social Icon Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper .social_wrapper ul li a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'textarea',
        'setting'  => 'tg_footer_copyright_text',
        'label'    => esc_html__( 'Copyright Text', THEMEDOMAIN ),
        'description' => esc_html__('Enter your copyright text.', THEMEDOMAIN ),
        'section'  => 'footer_copyright',
        'default'  => '© Copyright LetsBlog Theme Demo - Theme by ThemeGoods',
        'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_footer_copyright_right_area',
        'label'    => esc_html__( 'Copyright Right Area Content', THEMEDOMAIN ),
        'section'  => 'footer_copyright',
        'default'  => 'social',
        'choices'  => $tg_copyright_content,
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_footer_copyright_totop',
        'label'    => esc_html__( 'Go To Top Button', THEMEDOMAIN ),
        'description' => 'Check this option to enable go to top button at the bottom of page when scrolling',
        'section'  => 'footer_copyright',
        'default'  => 1,
	    'priority' => 7,
    );
    //End Footer Tab Settings
    
    
    //Begin Gallery Tab Settings
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_gallery_sort',
        'label'    => esc_html__( 'Gallery Images Sorting', THEMEDOMAIN ),
        'section'  => 'gallery_sorting',
        'default'  => 'drag',
        'choices'  => $tg_gallery_sort,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_lightbox_enable_caption',
        'label'    => esc_html__( 'Display image caption in lightbox', THEMEDOMAIN ),
        'description' => esc_html__('Check if you want to display image caption under the image in lightbox mode', THEMEDOMAIN ),
        'section'  => 'gallery_lightbox',
        'default'  => 1,
	    'priority' => 2,
    );    
    //End Gallery Tab Settings
    
    
    //Begin Blog Tab Settings
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_display_full',
        'label'    => esc_html__( 'Display Full Blog Post Content', THEMEDOMAIN ),
        'description' => esc_html__('Check this option to display post full content in blog page (excerpt blog grid layout)', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 0,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_home_layout',
        'label'    => esc_html__( 'HomepPage Layout', THEMEDOMAIN ),
        'description' => esc_html__('Select page layout for displaying homepage', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_archive_layout',
        'label'    => esc_html__( 'Archive Page Layout', THEMEDOMAIN ),
        'description' => esc_html__('Select page layout for displaying archive page', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_category_layout',
        'label'    => esc_html__( 'Category Page Layout', THEMEDOMAIN ),
        'description' => esc_html__('Select page layout for displaying category page', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_tag_layout',
        'label'    => esc_html__( 'Tag Page Layout', THEMEDOMAIN ),
        'description' => esc_html__('Select page layout for displaying tag page', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_search_layout',
        'label'    => esc_html__( 'Search Page Layout', THEMEDOMAIN ),
        'description' => esc_html__('Select page layout for displaying search results page', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 'blog_s',
        'choices'  => $tg_blog_layout,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_slider',
        'label'    => esc_html__( 'Display Slider', THEMEDOMAIN ),
        'description' => esc_html__('Check this option to display slider in blog pages', THEMEDOMAIN ),
        'section'  => 'blog_slider',
        'default'  => 0,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_slider_layout',
        'label'    => esc_html__( 'Slider Layout', THEMEDOMAIN ),
        'description' => esc_html__('Select layout for slider posts', THEMEDOMAIN ),
        'section'  => 'blog_slider',
        'default'  => 'slider',
        'choices'  => $tg_slider_layout,
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_slider_cat',
        'label'    => esc_html__( 'Slider Post Category', THEMEDOMAIN ),
        'description' => esc_html__('Select post category filter for slider posts', THEMEDOMAIN ),
        'section'  => 'blog_slider',
        'default'  => '',
        'choices'  => $tg_categories_select,
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_blog_slider_items',
        'label'    => esc_html__( 'Slider Post Items', THEMEDOMAIN ),
        'section'  => 'blog_slider',
        'default'  => 5,
        'choices' => array( 'min' => 1, 'max' => 30, 'step' => 1 ),
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_header_bg',
        'label'    => esc_html__( 'Display Post Header', THEMEDOMAIN ),
        'description' => esc_html__('Check this to display featured image as post header background', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_feat_content',
        'label'    => esc_html__( 'Display Post Featured Content', THEMEDOMAIN ),
        'description' => esc_html__('Check this to display featured content (image or gallery) in single post page', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 0,
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_display_tags',
        'label'    => esc_html__( 'Display Post Tags', THEMEDOMAIN ),
        'description' => esc_html__('Check this option to display post tags on single post page', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_display_author',
        'label'    => esc_html__( 'Display About Author', THEMEDOMAIN ),
        'description' => esc_html__('Check this option to display about author on single post page', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_display_related',
        'label'    => esc_html__( 'Display Related Posts', THEMEDOMAIN ),
        'description' => esc_html__('Check this option to display related posts on single post page', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_title_font',
        'label'    => esc_html__( 'Post Title Font Family', THEMEDOMAIN ),
        'section'  => 'blog_typography',
        'default'  => 'Lustria',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '.post_header:not(.single) h5, body.single-post .post_header_title h1, #post_featured_slider li .slider_image .slide_post h2, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong, #footer ul.sidebar_widget .posts.blog li a, .post_info_comment',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_title_font_transform',
        'label'    => esc_html__( 'Post Title Text Transform', THEMEDOMAIN ),
        'section'  => 'blog_typography',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '.post_header:not(.single) h5, body.single-post .post_header_title h1, #post_featured_slider li .slider_image .slide_post h2, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong, #footer ul.sidebar_widget .posts.blog li a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_blog_title_font_spacing',
        'label'    => esc_html__( 'Post Title Font Spacing', THEMEDOMAIN ),
        'section'  => 'blog_typography',
        'default'  => 1,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.post_header:not(.single) h5, body.single-post .post_header_title h1, #post_featured_slider li .slider_image .slide_post h2, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong, #footer ul.sidebar_widget .posts.blog li a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_date_font',
        'label'    => esc_html__( 'Post Date Font Family', THEMEDOMAIN ),
        'section'  => 'blog_typography',
        'default'  => 'Lustria',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '.post_info_date, .post_attribute, .comment_date, .post-date, #post_featured_slider li .slider_image .slide_post .slide_post_date',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_blog_date_font_color',
        'label'    => esc_html__( 'Post Date Font Color', THEMEDOMAIN ),
        'section'  => 'blog_typography',
        'default'  => '#be9656',
        'output' => array(
	        array(
	            'element'  => '.post_info_date',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.post_info_date:before',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    //End Blog Tab Settings

    return $controls;
}
add_filter( 'kirki/controls', 'letsblog_custom_setting' );


function letsblog_customize_preview()
{
?>
    <script type="text/javascript">
        ( function( $ ) {
        	//Register Logo Tab Settings
        	wp.customize('tg_retina_logo',function( value ) {
                value.bind(function(to) {
                    jQuery('#custom_logo img').attr('src', to );
                });
            });
        	//End Logo Tab Settings
        
			//Register General Tab Settings
            wp.customize('tg_body_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('body, input[type=text], input[type=email], input[type=url], input[type=password], textarea').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_body_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('body').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_header_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('h1, h2, h3, h4, h5, h6, h7, .post_quote_title, label, .portfolio_filter_dropdown, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_header_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('h1, h2, h3, h4, h5, h6, h7').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_h1_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h1').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h2_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h2').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h3_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h3').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h4_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h4').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h5_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h5').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h6_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h6').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('body, a, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a').css('color', to );
                    jQuery('::selection').css('background-color', to );
                });
            });
            
            wp.customize('tg_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('a').css('color', to );
                });
            });
            
            wp.customize('tg_hover_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('a:hover, a:active, .post_info_comment a i').css('color', to );
                });
            });
            
            wp.customize('tg_h1_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('h1, h2, h3, h4, h5, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i').css('color', to );
                });
            });
            
            wp.customize('tg_hr_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#social_share_wrapper, hr, #social_share_wrapper, .post.type-post, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a').css('border-color', to );
                });
            });
            
            wp.customize('tg_input_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], textarea').css('background-color', to );
                });
            });
            
            wp.customize('tg_input_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], textarea').css('color', to );
                });
            });
            
            wp.customize('tg_input_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], textarea').css('border-color', to );
                });
            });
            
            wp.customize('tg_input_focus_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, textarea:focus').css('border-color', to );
                });
            });
            
            wp.customize('tg_button_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('input[type=submit], input[type=button], a.button, .button').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_button_bg_color',function( value ) {
                value.bind(function(to) {
                	jQuery('input[type=submit], input[type=button], a.button, .button').css('background-color', to );
                });
            });
            
            wp.customize('tg_button_font_color',function( value ) {
                value.bind(function(to) {
                	jQuery('input[type=submit], input[type=button], a.button, .button').css('color', to );
                });
            });
            
            wp.customize('tg_button_border_color',function( value ) {
                value.bind(function(to) {
                	jQuery('input[type=submit], input[type=button], a.button, .button, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle:before, h2.widgettitle:before').css('border-color', to );
                });
            });
            
            wp.customize('tg_frame_color',function( value ) {
                value.bind(function(to) {
                	jQuery('.frame_top, .frame_bottom, .frame_left, .frame_right').css('background-color', to );
                });
            });
            //End General Tab Settings
        
        	//Register Menu Tab Settings
        	wp.customize('tg_menu_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_menu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_menu_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_menu_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_menu_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_menu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('color', to );
                });
            });
            
            wp.customize('tg_menu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover').css('color', to );
                });
            });
            
            wp.customize('tg_menu_active_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a, #menu_wrapper div .nav li ul li.current-menu-item a, #menu_wrapper div .nav li.current-menu-parent  ul li.current-menu-item a').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_submenu_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_submenu_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_submenu_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_submenu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active').css('background', to );
                });
            });
            
            wp.customize('tg_submenu_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul').css('background', to );
                });
            });
            
            wp.customize('tg_submenu_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul').css('borderColor', to );
                });
            });
            
            wp.customize('tg_megamenu_header_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active').css('color', to );
                });
            });
            
            wp.customize('tg_megamenu_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav li.megamenu ul li').css('borderColor', to );
                });
            });
            
            wp.customize('tg_topbar_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.above_top_bar').css('background', to );
                });
            });
            
            wp.customize('tg_topbar_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_menu li a, .top_contact_info, .top_contact_info i, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active').css('color', to );
                });
            });
            
            wp.customize('tg_menu_contact_hours',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_contact_hours').html('<i class="fa fa-clock-o"></i>'+to);
                });
            });
            
            wp.customize('tg_menu_contact_number',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_contact_number').html('<i class="fa fa-phone"></i>'+to);
                });
            });
            
            wp.customize('tg_menu_search_input_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_menu_wrapper #searchform').css('background', to );
                });
            });
            
            wp.customize('tg_menu_search_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_menu_wrapper #searchform input[type=text], .mobile_menu_wrapper #searchform button i, #close_mobile_menu i').css('color', to );
                });
            });
            
            wp.customize('tg_sidemenu_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_sidemenu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_sidemenu_font_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_sidemenu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, #close_mobile_menu').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:active, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle').css('color', to );
                });
            });
            //End Menu Tab Settings
            
            
            //Register Header Tab Settings 
        	wp.customize('tg_page_header_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption, .page_caption_bg_content, .overlay_gallery_content').css('background-color', to );
                    jQuery('.page_caption_bg_border, .overlay_gallery_border').css('border-color', to );
                });
            });
            
            wp.customize('tg_page_header_padding_top',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption').css('paddingTop', to+'px' );
                });
            });
            
            wp.customize('tg_page_header_padding_bottom',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption').css('paddingBottom', to+'px' );
                });
            });
            
            wp.customize('tg_page_title_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('color', to );
                });
            });
            
            wp.customize('tg_page_title_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_page_title_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_page_title_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('textTransform', to );
                });
            });
            
            wp.customize('tg_page_title_bg_height',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption.hasbg').css('height', to+'vh' );
                });
            });
            
            wp.customize('tg_page_tagline_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.page_tagline').css('color', to );
                });
            });
            
            wp.customize('tg_page_tagline_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('.page_tagline').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_page_tagline_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('.page_tagline').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_page_tagline_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('.page_tagline').css('textTransform', to );
                });
            });
            
            wp.customize('tg_page_tagline_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('.page_tagline').css('letterSpacing', to+'px' );
                });
            });
        	//End Logo Header Settings
        	
        	//Register Sidebar Tab Settings
            wp.customize('tg_sidebar_title_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_sidebar_title_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_sidebar_title_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_sidebar_title_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('textTransform', to );
                });
            });
            
            wp.customize('tg_sidebar_title_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_sidebar_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper a, .page_content_wrapper .inner .sidebar_wrapper a').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_hover_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper a:hover, #page_content_wrapper .inner .sidebar_wrapper a:active, .page_content_wrapper .inner .sidebar_wrapper a:hover, .page_content_wrapper .inner .sidebar_wrapper a:active').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_title_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('color', to );
                });
            });
            //End Sidebar Tab Settings
            
            //Register Footer Tab Settings
            
            wp.customize('tg_footer_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#footer, #copyright').css('color', to );
                });
            });
            
            wp.customize('tg_footer_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright a, #copyright a:active, #footer a, #footer a:active').css('color', to );
                });
            });
            
            wp.customize('tg_footer_hover_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover').css('color', to );
                });
            });
            
            wp.customize('tg_footer_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.footer_bar_wrapper, .footer_bar').css('borderColor', to );
                });
            });
            
            wp.customize('tg_footer_social_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.footer_bar_wrapper .social_wrapper ul li a').css('color', to );
                });
            });
            
            wp.customize('tg_footer_copyright_text',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright').html( to );
                });
            });
            //End Footer Tab Settings
            
            //Begin Blog Tab Settings
            wp.customize('tg_blog_title_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('.post_header:not(.single) h5, body.single-post .post_header_title h1, #post_featured_slider li .slider_image .slide_post h2, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong, #footer ul.sidebar_widget .posts.blog li a, .post_info_comment').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_blog_title_font_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_header:not(.single) h5, body.single-post .post_header_title h1, #post_featured_slider li .slider_image .slide_post h2, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong, #footer ul.sidebar_widget .posts.blog li a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_blog_title_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_header:not(.single) h5, body.single-post .post_header_title h1, #post_featured_slider li .slider_image .slide_post h2, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong, #footer ul.sidebar_widget .posts.blog li a').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_blog_date_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('.post_info_date, .post_attribute, .comment_date, .post-date, #post_featured_slider li .slider_image .slide_post .slide_post_date').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_blog_date_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_info_date').css('color', to );
                });
            });
            
            wp.customize('tg_blog_date_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_info_date:before').css('borderColor', to );
                });
            });
            //End Blog Tab Settings
            
        } )( jQuery )
    </script>
<?php	
}