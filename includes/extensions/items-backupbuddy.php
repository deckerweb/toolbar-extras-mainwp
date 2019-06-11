<?php

// includes/extensions/items-backupbuddy

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_backupbuddy' );
/**
 * Items for plugin:
 *   MainWP Buddy Extension (Premium, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_backupbuddy() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-backupbuddy',
			'parent' => 'group-ext-backups',
			'title'  => esc_attr__( 'BackupBuddy', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Buddy-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'BackupBuddy', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backupbuddy-overview',
				'parent' => 'mwp-ext-backupbuddy',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Buddy-Extension&subpage=dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backupbuddy-backup',
				'parent' => 'mwp-ext-backupbuddy',
				'title'  => esc_attr__( 'Backup', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Buddy-Extension&subpage=backup' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backup', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backupbuddy-remote-destinations',
				'parent' => 'mwp-ext-backupbuddy',
				'title'  => esc_attr__( 'Remote Destinations', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Buddy-Extension&subpage=destinations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Remote Destinations', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backupbuddy-schedules',
				'parent' => 'mwp-ext-backupbuddy',
				'title'  => esc_attr__( 'Schedules', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Buddy-Extension&subpage=scheduling' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Schedules', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backupbuddy-settings',
				'parent' => 'mwp-ext-backupbuddy',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Buddy-Extension&subpage=settings' ) ),
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
					'id'     => 'group-backupbuddy-resources',
					'parent' => 'mwp-ext-backupbuddy',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'backupbuddy-docs',
					'group-backupbuddy-resources',
					'https://mainwp.com/help/category/mainwp-extensions/mainwp-buddy/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
