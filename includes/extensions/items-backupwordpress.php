<?php

// includes/extensions/items-backupwordpress

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_backupwordpress' );
/**
 * Items for plugin:
 *   MainWP BackUpWordPress Extension (Premium, by MainWP)
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
function ddw_tbexmwp_exitems_backupwordpress() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-backupwordpress',
			'parent' => 'group-ext-backups',
			'title'  => esc_attr__( 'BackupUpWordPress', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backupwordpress-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'BackupUpWordPress', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backupwordpress-overview',
				'parent' => 'mwp-ext-backupwordpress',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backupwordpress-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backupwordpress-schedules',
				'parent' => 'mwp-ext-backupwordpress',
				'title'  => esc_attr__( 'Schedules', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backupwordpress-Extension&tab=schedules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Schedules', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-backupwordpress-backups',
				'parent' => 'mwp-ext-backupwordpress',
				'title'  => esc_attr__( 'Backups', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Backupwordpress-Extension&tab=backups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backups', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-backupwordpress-resources',
					'parent' => 'mwp-ext-backupwordpress',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'backupwordpress-docs',
					'group-backupwordpress-resources',
					'https://mainwp.com/help/category/mainwp-extensions/backupwordpress/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
