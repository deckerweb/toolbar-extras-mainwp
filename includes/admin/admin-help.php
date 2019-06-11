<?php

// includes/admin/admin-help

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


//add_action( 'admin_enqueue_scripts', 'ddw_tbexmwp_register_styles_help_tabs', 20 );
/**
 * Register CSS styles for our help tabs.
 *
 * @since 1.0.0
 */
function ddw_tbexmwp_register_styles_help_tabs() {

	wp_register_style(
		'tbexmwp-help-tabs',
		plugins_url( '/assets/css/tbexmwp-help.css', dirname( dirname( __FILE__ ) ) ),
		array(),
		TBEXMWP_PLUGIN_VERSION,
		'screen'
	);

	wp_enqueue_style( 'tbexmwp-help-tabs' );

}  // end function


add_action( 'load-settings_page_toolbar-extras', 'ddw_tbexmwp_help_tab', 15 );	// Toolbar Extras settings
add_action( 'load-toplevel_page_mainwp_tab', 'ddw_tbexmwp_help_tab', 100 );		// MainWP Dashboard
add_action( 'load-mainwp_page_Settings', 'ddw_tbexmwp_help_tab', 100 );			// MainWP Settings
add_action( 'load-plugins_page_toolbar-extras-mainwp-suggested-plugins', 'ddw_tbexmwp_help_tab', 100 );
/**
 * Build the help tab for this add-on plugin.
 *
 * @since 1.0.0
 *
 * @global object $GLOBALS[ 'tbexmwp_screen' ]
 */
function ddw_tbexmwp_help_tab() {

	$GLOBALS[ 'tbexmwp_screen' ] = get_current_screen();

	/** Check for proper admin screen & permissions */
	if ( ! $GLOBALS[ 'tbexmwp_screen' ]
		|| ! is_super_admin()
	) {
		return;
	}

	/** Add the new help tab */
	$GLOBALS[ 'tbexmwp_screen' ]->add_help_tab(
		array(
			'id'       => 'tbexmwp-addon-help',
			'title'    => esc_html__( 'Add-On: MainWP', 'toolbar-extras-mainwp' ),
			'callback' => apply_filters(
				'tbexmwp/filter/content/help_tab',
				'ddw_tbexmwp_help_tab_content'
			),
		)
	);

	/** Load the actual help content view */
	require_once TBEXMWP_PLUGIN_DIR . 'includes/admin/views/help-content-addon.php';

	/** Add help sidebar from TBEX */
	if ( 'plugins_page_toolbar-extras-mainwp-suggested-plugins' === $GLOBALS[ 'tbexmwp_screen' ]->id ) {

		require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-sidebar.php' );

		$GLOBALS[ 'tbexmwp_screen' ]->set_help_sidebar( ddw_tbex_content_help_sidebar() );

	}  // end if

	/** CSS style tweaks */
	add_action( 'admin_enqueue_scripts', 'ddw_tbexmwp_register_styles_help_tabs', 20 );

}  // end function
