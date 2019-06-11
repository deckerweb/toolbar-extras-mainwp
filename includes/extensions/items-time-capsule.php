<?php

// includes/extensions/items-time-capsule

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_time_capsule' );
/**
 * Items for plugin:
 *   MainWP Time Capsule Extension (Premium, by MainWP)
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
function ddw_tbexmwp_exitems_time_capsule() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-timecapsule',
			'parent' => 'group-ext-backups',
			'title'  => esc_attr__( 'WP Time Capsule', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Timecapsule-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Time Capsule', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-timecapsule-overview',
				'parent' => 'mwp-ext-timecapsule',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Timecapsule-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-timecapsule-general',
				'parent' => 'mwp-ext-timecapsule',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Timecapsule-Extension&tab=general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-timecapsule-backup-options',
				'parent' => 'mwp-ext-timecapsule',
				'title'  => esc_attr__( 'Backup Options', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Timecapsule-Extension&tab=backup_opts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backup Options', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-timecapsule-backup-autoupdates',
				'parent' => 'mwp-ext-timecapsule',
				'title'  => esc_attr__( 'Backup/ Auto Updates', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Timecapsule-Extension&tab=auto' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backup/ Auto Updates', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-timecapsule-vulnerability-updates',
				'parent' => 'mwp-ext-timecapsule',
				'title'  => esc_attr__( 'Vulnerbility Updates', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Timecapsule-Extension&tab=vulns' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Vulnerbility Updates', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-timecapsule-staging',
				'parent' => 'mwp-ext-timecapsule',
				'title'  => esc_attr__( 'Staging', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Timecapsule-Extension&tab=staging_opts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Staging', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-timecapsule-advanced',
				'parent' => 'mwp-ext-timecapsule',
				'title'  => esc_attr__( 'Advanced', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Timecapsule-Extension&tab=adv' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-timecapsule-service',
				'parent' => 'mwp-ext-timecapsule',
				'title'  => esc_attr__( 'My Account', 'toolbar-extras-mainwp' ),
				'href'   => 'https://service.wptimecapsule.com/my-account.php',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'My Account - WP Time Capsule', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-timecapsule-resources',
					'parent' => 'mwp-ext-timecapsule',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'timecapsule-docs',
					'group-timecapsule-resources',
					'https://mainwp.com/help/category/mainwp-extensions/time-capsule/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
