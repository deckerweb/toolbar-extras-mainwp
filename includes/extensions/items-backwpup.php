<?php

// includes/extensions/items-backwpup

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_backwpup' );
/**
 * Items for plugin:
 *   MainWP BackWPup Extension (free, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_backwpup() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-backwpup',
			'parent' => 'group-ext-backups',
			'title'  => esc_attr__( 'BackWPup Backups', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backwpup-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'BackWPup Backups', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backwpup-dashboard',
				'parent' => 'mwp-ext-backwpup',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backwpup-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'BackWPup Dashboard', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backwpup-jobs',
				'parent' => 'mwp-ext-backwpup',
				'title'  => esc_attr__( 'Backup Jobs', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backwpup-Extension&tab=jobs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Existing Backup Jobs', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backwpup-backups',
				'parent' => 'mwp-ext-backwpup',
				'title'  => esc_attr__( 'Existing Backups', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backwpup-Extension&tab=backups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Existing Backups', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backwpup-settings',
				'parent' => 'mwp-ext-backwpup',
				'title'  => esc_attr__( 'Backup Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backwpup-Extension&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backup Settings', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-backwpup-resources',
					'parent' => 'mwp-ext-backwpup',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'backwpup-docs',
					'group-backwpup-resources',
					'https://mainwp.com/help/category/mainwp-extensions/backwpup/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
