<?php

// includes/extensions/items-uptime-monitor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_uptime_monitor' );
/**
 * Items for plugin:
 *   MainWP Advanced Uptime Monitor Extension (free, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_uptime_monitor() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-upmonitor',
			'parent' => 'group-ext-maintenance',
			'title'  => esc_attr__( 'Advanced Uptime Monitor', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Advanced-Uptime-Monitor-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Advanced Uptime Monitor', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-upmonitor-check',
				'parent' => 'mwp-ext-upmonitor',
				'title'  => esc_attr__( 'Check Uptime', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Advanced-Uptime-Monitor-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Check Uptime', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-upmonitor-uptimerobot',
				'parent' => 'mwp-ext-upmonitor',
				'title'  => esc_attr__( 'Uptime Robot Service', 'toolbar-extras-mainwp' ),
				'href'   => 'https://uptimerobot.com/dashboard#mainDashboard',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Uptime Robot Service', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-upmonitor-resources',
					'parent' => 'mwp-ext-upmonitor',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'upmonitor-docs',
					'group-upmonitor-resources',
					'https://mainwp.com/help/category/mainwp-extensions/advanced-uptime-monitor/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
