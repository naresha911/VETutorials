<?php

/**
 * Add menu to Appearance screen
 *
 * @since SG Grid 1.0
 */
function sggrid_admin_page() {
	add_theme_page( __( 'About theme', 'sg-grid' ), __( 'About SG Grid', 'sg-grid' ), 'edit_theme_options', 'sggrid-page', 'sggrid_about_page');
}
add_action( 'admin_menu', 'sggrid_admin_page' );
 
 /**
 * Add css styles for admin page
 *
 * @since SG Grid 1.0.1
 */
function sggrid_admim_style( $hook ) {
	if ( 'appearance_page_sggrid-page' != $hook ) {
		return;
	}
	wp_enqueue_style( 'sggrid-admin-page-style', get_stylesheet_directory_uri() . '/inc/css/admin-page.css', array(), null );
	wp_enqueue_style( 'sggrid-admin-fonts', '//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038', array(), null );
	
}
add_action( 'admin_enqueue_scripts', 'sggrid_admim_style' );

/**
 * About theme page
 *
 * @since SG Grid 1.0
 */
function sggrid_about_page() {
?>
	<div class="main-wrapper">
		<p class="sg-header"><?php esc_html_e( 'Main Info', 'sg-grid' ); ?></p>
		<ul class="sg-buttons">
			<li><a href="<?php echo esc_url( home_url() . '/wp-admin/customize.php' ); ?>"><?php esc_html_e( 'Theme Options', 'sg-grid' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url() . '/wp-admin/customize.php?autofocus[panel]=widgets' ); ?>"><?php esc_html_e( 'Widgets', 'sg-grid' ); ?></a></li>
			<li><a href="<?php echo __( 'http://wpblogs.ru/themes/how-to-video-sg-window-theme/', 'sg-grid' ); ?>"><?php esc_html_e( 'How to use a theme (Video)', 'sg-grid' ); ?></a></li>
			<li><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/sggrid' ); ?>"><?php esc_html_e( 'Support forum', 'sg-grid' ); ?></a></li>
			<li><a href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/sggrid#postform' ); ?>"><?php esc_html_e( 'Rate on WordPress.org', 'sg-grid' ); ?></a></li>
			<?php if ( ! defined ( 'sg-grid' ) ) : ?>
			<li class="pro"><a href="<?php echo esc_url( 'http://wpblogs.ru/themes/sg-window-pro/' ); ?>"><?php esc_html_e( 'Update to Pro', 'sg-grid' ); ?></a></li>
			<?php endif; ?>
			</li>
		</ul>
		<div class="info-wrapper">
			<div class="icon-image">
				<img src="<?php echo get_stylesheet_directory_uri() . '/screenshot.png'; ?>"/>
			</div><!-- .icon-image -->
			<div class="info">
			<?php if ( ! defined ( 'sg-grid' ) ) : ?>
				<p><?php esc_html_e( 'You are using light version of SG Grid. Update to Pro to have even more features. For Example:', 'sg-grid' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Custom colors;', 'sg-grid' ); ?></li>
					<li><?php esc_html_e( 'Site/content width;', 'sg-grid' ); ?></li>
					<li><?php esc_html_e( 'Boxed/Full width layout;', 'sg-grid' ); ?></li>
					<li><?php esc_html_e( 'WooCommerce layouts;', 'sg-grid' ); ?></li>
					<li><?php esc_html_e( 'Footer text options.', 'sg-grid' ); ?></li>
				</ul>
			<?php else: 

				do_action( 'sgwindow_pro_version' ); 

			endif; ?>

			</div><!-- .info -->
			
		</div><!-- .info-wrapper -->
		<div class="more-info">
			<a href="<?php echo esc_url( 'http://wpblogs.ru/themes/sg-window-pro/' ); ?>"><?php esc_html_e( 'More Info', 'sg-grid' ); ?></a>
		</div><!-- .more-info -->
		
		<a alt="" href="http://wpblogs.ru/themes/blog/theme/sg-window/"><p class="parent-text"><?php esc_html_e( 'Parent theme', 'sg-grid' ); ?></p></a>
		<a  class="parent-img" alt="" href="http://wpblogs.ru/themes/blog/theme/sg-window/"><img src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>"/></a>

	</div><!-- .main-wrapper -->
<?php
}