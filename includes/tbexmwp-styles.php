<?php

// includes/tbexmwp-styles

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_head', 'ddw_tbexmwp_addon_styles', 100 );
add_action( 'admin_head', 'ddw_tbexmwp_addon_styles', 100 );
/**
 * Add the needed CSS styles for Toolbar items of "Toolbar Extras for MainWP"
 *   Add-On plugin.
 *
 * @since 1.0.0
 *
 * @return string CSS styling for selected Toolbar items.
 */
function ddw_tbexmwp_addon_styles() {

	/** Add our few CSS styles inline: */
	?>
		<style type="text/css">
			#wpadminbar .tbexmwp-childsite .ab-icon {
				top: 2px;
				vertical-align: bottom;
				width: 16px !important;
				height: 16px !important;
			}

			#wpadminbar .tbexmwp-childsite .ab-icon:before,
			#wpadminbar .tbexmwp-childsite .ab-label {
				color: inherit !important;
			}

			#wpadminbar .tbexmwp-childsite .ab-label {
				margin-right: 15px !important;
				margin-top: -5px !important;
				padding-right: 15px !important;
			}

			/* MainWP Popup Content */
			.mainwp-popup-content td {
				padding-bottom: 5px;
				padding-top: 5px;
			}
			.mainwp-popup-content tr > td:first-child {
				padding-left: 10px;
			}
			.mainwp-popup-content tr:nth-child(even) {
				background-color: #f5f5f5;
			}
			.mainwp-popup-content tr:nth-child(odd) {
				background-color: inherit;
			}
			.mainwp-popup-content tr:hover {
				background-color: #eee;
			}
		</style>
	<?php

}  // end function


add_action( 'wp_enqueue_scripts', 'ddw_tbexmwp_toolbar_mobile_styles' );
add_action( 'admin_enqueue_scripts', 'ddw_tbexmwp_toolbar_mobile_styles' );
/**
 * Toolbar mobile styles.
 *
 * @since 1.0.0
 */
function ddw_tbexmwp_toolbar_mobile_styles() {

	wp_register_style(
		'tbexmwp-mobile',
		plugins_url( '/assets/css/tbexmwp-mobile.css', dirname( __FILE__ ) ),
		array(),
		TBEXMWP_PLUGIN_VERSION,
		'screen'	//'max-width: 782px'
	);

	wp_enqueue_style( 'tbexmwp-mobile' );

}  // end function
