<?php

// includes/extensions/items-maintenance

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_maintenance' );
/**
 * Items for plugin:
 *   MainWP Maintenance Extension (free, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_maintenance() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-maintenance',
			'parent' => 'group-ext-maintenance',
			'title'  => esc_attr__( 'Maintenance', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Maintenance-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Maintenance Tasks &amp; Settings', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-maintenance-run-now',
				'parent' => 'mwp-ext-maintenance',
				'title'  => esc_attr__( 'Run Now', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Maintenance-Extension&tab=runnow' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Run Maintenance Tasks Now for selected Child Sites', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-maintenance-new-schedule',
				'parent' => 'mwp-ext-maintenance',
				'title'  => esc_attr__( 'New Schedule', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Maintenance-Extension&tab=new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Setup New Maintenance Schedule', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-maintenanceext-resources',
					'parent' => 'mwp-ext-maintenance',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'maintenanceext-docs',
					'group-maintenanceext-resources',
					'https://mainwp.com/help/category/mainwp-extensions/maintenance/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
