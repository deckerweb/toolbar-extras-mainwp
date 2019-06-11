<?php

// includes/extensions/items-updraftplus

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_updraftplus' );
/**
 * Items for plugin:
 *   MainWP UpdraftPlus Backups Extension (free, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_updraftplus() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-updraftplus',
			'parent' => 'group-ext-backups',
			'title'  => esc_attr__( 'UpdraftPlus Backups', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Updraftplus-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'UpdraftPlus Backups', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-updraftplus-overview',
				'parent' => 'mwp-ext-updraftplus',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Updraftplus-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-updraftplus-scheduled-backups',
				'parent' => 'mwp-ext-updraftplus',
				'title'  => esc_attr__( 'Scheduled Backups', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Updraftplus-Extension&tab=gen_schedules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Scheduled Backups', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-updraftplus-existing-backups',
				'parent' => 'mwp-ext-updraftplus',
				'title'  => esc_attr__( 'Existing Backups', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Updraftplus-Extension&tab=backups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Existing Backups', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-updraftplus-settings',
				'parent' => 'mwp-ext-updraftplus',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Updraftplus-Extension&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-updraftplus-resources',
					'parent' => 'mwp-ext-updraftplus',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'updraftplus-docs',
					'group-updraftplus-resources',
					'https://mainwp.com/help/category/mainwp-extensions/updraftplus-backups/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
