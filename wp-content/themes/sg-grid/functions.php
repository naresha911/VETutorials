<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage SG Grid
 * @since SG Grid 1.0
*/

/**
 * SG Grid setup.
 *
 * @since SG Grid 1.0
 */
 
define( 'SGWINDOWCHILD', 'SGGrid' );
  
function sggrid_setup() {

	$defaults = sgwindow_get_defaults();

	load_child_theme_textdomain( 'sg-grid', get_stylesheet_directory() . '/languages' );
	
	$args = array(
		'default-image'          => '',
		'header-text'            => true,
		'default-text-color'     => sgwindow_text_color( esc_attr( get_theme_mod('color_scheme'), $defaults ['color_scheme'] ) ),
		'width'                  => absint( sgwindow_get_theme_mod( 'size_image' ) ),
		'height'                 => absint( sgwindow_get_theme_mod( 'size_image_height' ) ),
		'flex-height'            => true,
		'flex-width'             => true,
	);
	add_theme_support( 'custom-header', $args );
	
	add_theme_support( 'post-thumbnails' );
	
	remove_action( 'sgwindow_empty_sidebar_top-home', 'sgwindow_the_top_sidebar_widgets', 20 );
	remove_action( 'sgwindow_empty_column_2-portfolio-page', 'sgwindow_right_sidebar_portfolio', 20 );
	remove_action( 'admin_menu', 'sgwindow_admin_page' );
}
add_action( 'after_setup_theme', 'sggrid_setup' );

/**
 * SG Grid Colors.
 *
 * @since SG Grid 1.0
 */
   
function sggrid_setup_colors() {
	
	/* colors */
	global $sgwindow_colors_class;
	
	$section_id = 'main_colors';
	$section_priority = 10;
	$p = 10;
	
	$i = 'link_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Link', 'sg-grid'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#1e73be');
	$sgwindow_colors_class->set_color($i, 1, '#1e73be');
	$sgwindow_colors_class->set_color($i, 2, '#1e73be');
	
	$i = 'heading_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('H1-H6 heading', 'sg-grid'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#000000');
	$sgwindow_colors_class->set_color($i, 1, '#141414');
	$sgwindow_colors_class->set_color($i, 2, '#3f3f3f');
	
	$i = 'heading_link';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('H1-H6 Link', 'sg-grid'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#1e73be');	
	$sgwindow_colors_class->set_color($i, 1, '#1e73be');	
	$sgwindow_colors_class->set_color($i, 2, '#1e73be');
	
	$i = 'description_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Description', 'sg-grid'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#ffffff');	
	$sgwindow_colors_class->set_color($i, 1, '#ffffff');
	$sgwindow_colors_class->set_color($i, 2, '#ffffff');			
	
	$i = 'hover_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Link Hover', 'sg-grid'), $p++, false, 'refresh');
	$sgwindow_colors_class->set_color($i, 0, '#dd3333');
	$sgwindow_colors_class->set_color($i, 1, '#dd3333');
	$sgwindow_colors_class->set_color($i, 2, '#dd3333');

}
add_action( 'after_setup_theme', 'sggrid_setup_colors', 100 );

/**
 * Enqueue parent and child scripts
 *
 * @package WordPress
 * @subpackage SG Grid
 * @since SG Grid 1.0
*/

function sggrid_styles() {
    wp_enqueue_style( 'sgwindow-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'sggrid-style', get_stylesheet_uri(), array( 'sgwindow-style' ) );
	
	wp_enqueue_style( 'sggrid-colors', get_stylesheet_directory_uri() . '/css/scheme-' . esc_attr( sgwindow_get_theme_mod( 'color_scheme' ) ) . '.css', array( 'sggrid-style', 'sgwindow-colors' ) );
}
add_action( 'wp_enqueue_scripts', 'sggrid_styles' );

/**
 * Set defaults
 *
 * @package WordPress
 * @subpackage SG Grid
 * @since SG Grid 1.0
*/

function sggrid_defaults( $defaults ) {

	$defaults['is_show_top_menu'] = '';
	$defaults['body_font'] = 'Open Sans';
	$defaults['heading_font'] = 'Open Sans';
	$defaults['header_font'] = 'Allerta Stencil';
	$defaults['column_background_url'] = get_stylesheet_directory_uri() . '/img/back.jpg';
	$defaults['logotype_url'] =  get_stylesheet_directory_uri() . '/img/logo.png';
	$defaults['post_thumbnail_size'] = '400';
	
	$defaults['width_top_widget_area'] = '1360';
	$defaults['width_content_no_sidebar'] = '1360';	
	$defaults['width_content'] = '1360';
	$defaults['width_main_wrapper'] = '1360';
	$defaults['is_home_footer'] = '1';
	$defaults['front_page_style'] = '1';
	
	/* portfolio: excerpt/content */
	$defaults['portfolio_style'] = 'none';
	
	/* Header Image size */
	$defaults['size_image'] = '1680';
	$defaults['size_image_height'] = '400';
	/* Header Image and top sidebar wrapper */
	$defaults['width_image'] = '1680';
		
	$defaults['width_column_1_left_rate'] = '30';
	$defaults['width_column_1_right_rate'] = '30';
	$defaults['width_column_1_rate'] = '22';
	$defaults['width_column_2_rate'] = '22';
	
	$defaults['single_style'] = 'none';

	$defaults['defined_sidebars']['home'] = array(
											'use' => '1', 
											'callback' => 'is_front_page', 
											'param' => '', 
											'title' => __( 'Home', 'sg-grid' ),
											'sidebar-top' => '1',
											'sidebar-before-footer' => '1',
											'column-1' => '1',
											'column-2' => '1', 
											);

	$defaults['footer_text'] = '<a href="' . 'http://wordpress.org/' . '">' . __( 'Powered by WordPress', 'sg-grid' ). '</a> | ' . __( 'theme ', 'sg-grid' ) . '<a href="' . 'http://wpblogs.ru/themes/blog/theme/sg-grid/' . '">SG Grid</a>';
	
	$defaults['is_defaults_post_thumbnail_background'] = '1';

	return $defaults;

}
add_filter( 'sgwindow_option_defaults', 'sggrid_defaults' );

/** Set theme layout
 *
 * @since SG Grid 1.0
 */
function sggrid_layout( $layout ) {
	
	foreach( $layout as $id => $layouts ) {
		if ( 'layout_home' == $layouts['name'] 
			|| 'layout_blog' == $layouts['name'] 
			|| 'layout_search' == $layouts['name'] 
			|| 'layout_archive' == $layouts['name'] ) {

			$layout[ $id ]['content_val'] = 'flex-layout-4';
			$layout[ $id ]['val'] = 'right-sidebar';
			
		} elseif ( 'layout_portfolio' == $layouts['name'] ) {

			$layout[ $id ]['content_val'] = 'flex-layout-4';
			
		}
	}
	return $layout;
}
add_filter( 'sgwindow_layout', 'sggrid_layout' );

/**
 * Hook widgets into right sidebar at the front page
 *
 * @package WordPress
 * @subpackage SG Grid
 * @since SG Grid 1.0
*/

function sggrid_home_right_column( $layouts ) {

	the_widget( 'WP_Widget_Search', 'title=' );
	the_widget( 'WP_Widget_Categories' );
	the_widget( 'WP_Widget_Tag_Cloud', 'title=' );
	the_widget( 'WP_Widget_Recent_Comments' );
	
}
add_action('sgwindow_empty_column_2-home', 'sggrid_home_right_column', 20);

/**
 * Add widgets to the top sidebar
 *
 * @since SG Grid 1.0
 */
function sggrid_the_top_sidebar_widgets() {
	$icons = sggrid_social_icons();
	
	$defaults = array( 
					'facebook' => '#',
					'twitter' => '#',
					'wordpress' => '#',
					'rss' => '#',
					);
	$params = null;
	
	foreach( $icons as $id => $icon ) {
		$link = get_theme_mod( $id, null);
		if( isset( $link ) && ! empty ( $link ) ) {
			$params .= '&' . $id . '=' . esc_url ( $link );
		}
	}
	if( ! isset( $params ) ) {
	
		foreach( $defaults as $id => $icon ) {
				$params .= '&' . $id . '=' . $icon;
		}
	}
	
	the_widget( 'sgwindow_SocialIcons',
								$params );
								
}
add_action('sgwindow_empty_sidebar_top-home', 'sggrid_the_top_sidebar_widgets', 20);
/**
 * Return array Social Icons List
 *
 * @since SG Grid 1.0
 */
function sggrid_social_icons(){
	$icons = array(
					'facebook' => '',
					'twitter' => '',
					'google' => '',
					'wordpress' => '',
					'blogger' => '',
					'yahoo' => '',
					'youtube' => '',
					'myspace' => '',
					'livejournal' => '',
					'linkedin' => '',
					'friendster' => '',
					'friendfeed' => '',
					'digg' => '',
					'delicious' => '',
					'aim' => '',
					'ask' => '',
					'buzz' => '',
					'tumblr' => '',		
					'flickr' => '',						
					'rss' => '',
				  );

	return $icons;
}
/**
 * Add widgets to the right sidebar on portfolio pages
 *
 * @since SG Grid 1.0
 */
function sggrid_right_sidebar_portfolio() {

	the_widget( 'sgwindow_items_portfolio', 'title='.__('Recent Projects', 'sg-grid').
								'&count=8'.
								'&jetpack-portfolio-type=0'.
								'&columns=column-2'.
								'&is_background=1'.
								'&is_margin_0='.
								'&is_link=1'.
								'&effect_id_0=effect-1');
}
add_action('sgwindow_empty_column_2-portfolio-page', 'sggrid_right_sidebar_portfolio', 20);

//admin page
require get_stylesheet_directory() . '/inc/admin-page.php';