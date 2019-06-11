<?php

// includes/extensions/items-activity-log

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_activity_log' );
/**
 * Items for plugin:
 *   Activity Log for MainWP (free, by WP White Security)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_activity_log() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-activitylog',
			'parent' => 'group-ext-maintenance',
			'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Activity-Log-Mainwp' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras-mainwp' )
			)
		)
	);

		/**
		 * Hook place for all logging websites
		 * @see ddw_tbexmwp_exitems_activity_logs_websites() below
		 */
		do_action( 'tbexmwp_activitylogs_websites' );

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-activitylog-logs',
				'parent' => 'mwp-ext-activitylog',
				'title'  => esc_attr__( 'All Logs', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Activity-Log-Mainwp' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Logs', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-activitylog-logs-dashboard',
				'parent' => 'mwp-ext-activitylog',
				'title'  => esc_attr__( 'MainWP Dashboard Logs', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Activity-Log-Mainwp&mwpal-site-id=dashboard&paged=1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'MainWP Dashboard Logs', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-activitylog-settings',
				'parent' => 'mwp-ext-activitylog',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mwp-ext-activitylog-settings',
					'parent' => 'group-activitylog-settings',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Activity-Log-Mainwp&tab=settings' ) ),
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
					'id'     => 'group-activitylog-resources',
					'parent' => 'mwp-ext-activitylog',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'support-forum',
					'activitylog-support',
					'group-activitylog-resources',
					'https://wordpress.org/support/plugin/activity-log-mainwp'
				);

				ddw_tbex_resource_item(
					'documentation',
					'activitylog-docs',
					'group-activitylog-resources',
					'https://www.wpsecurityauditlog.com/support-documentation/tag/mainwp-extension/',
					ddw_tbexmwp_string_extension_docs()
				);

				ddw_tbex_resource_item(
					'translations-community',
					'activitylog-translate',
					'group-activitylog-resources',
					'https://translate.wordpress.org/projects/wp-plugins/activity-log-mainwp'
				);

				ddw_tbex_resource_item(
					'github',
					'activitylog-github',
					'group-activitylog-resources',
					'https://github.com/WPWhiteSecurity/activity-log-mainwp'
				);

				ddw_tbex_resource_item(
					'official-site',
					'activitylog-ext-site',
					'group-activitylog-resources',
					'https://www.wpsecurityauditlog.com/activity-log-mainwp-extension/',
					esc_attr__( 'Official Extension Website', 'toolbar-extras-mainwp' )
				);

		}  // end if

}  // end function


add_action( 'tbexmwp_mainwp_after_dashboard', 'ddw_tbexmwp_dashboard_items_activity_log' );
/**
 * Dashboard item for Activity Log for MainWP.
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_dashboard_items_activity_log() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-dashboard-activity-logs',
			'parent' => 'tbexmwp-dashboard',
			'title'  => esc_attr__( 'Activity Logs', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Activity-Log-Mainwp&mwpal-site-id=dashboard&paged=1' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Dashboard Activity Logs', 'toolbar-extras-mainwp' )
			)
		)
	);

}  // end function


add_action( 'tbexmwp_activitylogs_websites', 'ddw_tbexmwp_exitems_activity_logs_websites' );
/**
 * Add a direct per site link to Child Site activity logs for all Child Sites
 *   that are setup for logging.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_get_mainwp_websites()
 * @uses \WSAL\MainWPExtension\Settings
 * @uses ddw_tbexmwp_nodes_activity_logs()
 */
function ddw_tbexmwp_exitems_activity_logs_websites() {

	/** Get MainWP Child Sites (Websites) */
	$websites = ddw_tbexmwp_get_mainwp_websites();

	/** Bail early if no websites setup */
	if ( is_null( $websites ) ) {
		return;
	}

	/**
	 * Iterate through all child sites and add those which are setup for
	 *   Activity Logs
	 */
	foreach ( $websites as $website ) {
		
		$wsal_sites = new \WSAL\MainWPExtension\Settings;
		$wsal_sites = $wsal_sites->get_wsal_child_sites();

		$wsal_sites_keys = array_keys( $wsal_sites );

		$site_id = absint( $website->id );

		/** Only if a Child Site has logging enabled */
		if ( in_array( $site_id, $wsal_sites_keys ) ) {

			/** Setup group for Child Sites */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-activitylog-websites',
					'parent' => 'mwp-ext-activitylog',
				)
			);

			/** Setup "collector item" for the sites */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mwp-ext-activitylog-websites',
					'parent' => 'group-activitylog-websites',
					'title'  => esc_attr__( 'Child Sites', 'toolbar-extras-mainwp' ),
					'href'   => FALSE,
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Child Sites', 'toolbar-extras-mainwp' )
					)
				)
			);

			/** Add all Child Sites with logging */
			ddw_tbexmwp_nodes_activity_logs( $website, 'extension' );

		}  // end if

	}  // end foreach

}  // end function
