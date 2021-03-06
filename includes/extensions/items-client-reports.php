<?php

// includes/extensions/items-client-reports

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_client_reports' );
/**
 * Items for plugin:
 *   MainWP Client Reports Extension (Premium, by MainWP)
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
function ddw_tbexmwp_exitems_client_reports() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-clientreports',
			'parent' => 'group-ext-actions',
			'title'  => esc_attr__( 'Client Reports', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Client-Reports-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Client Reports', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-clientreports-overview',
				'parent' => 'mwp-ext-clientreports',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Client-Reports-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-clientreports-new',
				'parent' => 'mwp-ext-clientreports',
				'title'  => esc_attr__( 'New Report', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Client-Reports-Extension&action=newreport' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Report', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-clientreports-resources',
					'parent' => 'mwp-ext-clientreports',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'clientreports-docs',
					'group-clientreports-resources',
					'https://mainwp.com/help/category/mainwp-extensions/client-reports/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function


add_action( 'tbexmwp_mainwp_after_installments', 'ddw_tbexmwp_addnew_items_client_report' );
/**
 * "Add New" items for plugin: Client Reports Extension
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_addnew_items_client_report() {

	/** Group: New Report */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-tbexmwp-new-report',
			'parent' => 'tbexmwp-addnew'
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'addnew-new-client-report',
				'parent' => 'group-tbexmwp-new-report',
				'title'  => esc_attr__( 'New Client Report', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Client-Reports-Extension&action=newreport' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Client Report', 'toolbar-extras-mainwp' )
				)
			)
		);

}  // end function
