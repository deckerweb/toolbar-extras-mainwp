<?php

// includes/items-mainwp-resources

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_resources', 81 );
/**
 * Items: MainWP Resources (external)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_resources() {

	/** Bail early if no resources display wanted */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** For: Dashboard */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-mainwp-dashboard-resources',
			'parent' => 'tbexmwp-dashboard',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

		ddw_tbex_resource_item(
			'documentation',
			'mainwp-help-docs',
			'group-mainwp-dashboard-resources',
			'https://mainwp.com/help/'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'mainwp-fb-group',
			'group-mainwp-dashboard-resources',
			'https://www.facebook.com/groups/MainWPUsers/'
		);

		ddw_tbex_resource_item(
			'support-contact',
			'mainwp-support-ticket',
			'group-mainwp-dashboard-resources',
			'https://mainwp.com/my-account/get-support/'
		);

		ddw_tbex_resource_item(
			'my-account',
			'mainwp-myaccount',
			'group-mainwp-dashboard-resources',
			'https://mainwp.com/my-account/'
		);

		ddw_tbex_resource_item(
			'github',
			'mainwp-github-dev',
			'group-mainwp-dashboard-resources',
			'https://github.com/mainwp/mainwp'
		);

		ddw_tbex_resource_item(
			'official-site',
			'mainwp-official-site',
			'group-mainwp-dashboard-resources',
			'https://mainwp.com/'
		);

}  // end function
