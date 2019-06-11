<?php

// includes/extensions/items-wordfence

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_wordfence' );
/**
 * Items for plugin:
 *   MainWP Wordfence Extension (Premium, by MainWP)
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
function ddw_tbexmwp_exitems_wordfence() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-wordfence',
			'parent' => 'group-ext-security',
			'title'  => esc_attr__( 'Wordfence', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Wordfence-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Wordfence', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wordfence-overview',
				'parent' => 'mwp-ext-wordfence',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Wordfence-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wordfence-options',
				'parent' => 'mwp-ext-wordfence',
				'title'  => esc_attr__( 'Wordfence Options', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Wordfence-Extension&tab=network_setting' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Wordfence Options', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wordfence-live-traffic',
				'parent' => 'mwp-ext-wordfence',
				'title'  => esc_attr__( 'Live Traffic', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Wordfence-Extension&tab=network_traffic' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Live Traffic', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wordfence-blocking',
				'parent' => 'mwp-ext-wordfence',
				'title'  => esc_attr__( 'Blocking', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Wordfence-Extension&tab=network_blocking' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Blocking', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wordfence-firewall',
				'parent' => 'mwp-ext-wordfence',
				'title'  => esc_attr__( 'Firewall', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Wordfence-Extension&tab=network_firewall' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Firewall', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wordfence-scan',
				'parent' => 'mwp-ext-wordfence',
				'title'  => esc_attr__( 'Scan', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Wordfence-Extension&tab=network_scan' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Scan', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wordfence-diagnostics',
				'parent' => 'mwp-ext-wordfence',
				'title'  => esc_attr__( 'Diagnostics', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Wordfence-Extension&tab=diagnostics' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Diagnostics', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wordfence-resources',
					'parent' => 'mwp-ext-wordfence',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'wordfence-docs',
					'group-wordfence-resources',
					'https://mainwp.com/help/category/mainwp-extensions/wordfence/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
