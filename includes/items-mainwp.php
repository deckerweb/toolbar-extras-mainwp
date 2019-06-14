<?php

// includes/items-mainwp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_dashboard', ddw_tbexmwp_item_priority( 'dashboard' ) );		// 80
/**
 * Items: MainWP Dashboard
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_dashboard() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'dashboard' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'dashboard' ),	//_x( 'My MainWP', 'MainWP component title', 'toolbar-extras-mainwp' ),
		'mainwp',
		'mwp_item_icon_dashboard',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-dashboard',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=mainwp_tab' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr__( 'My MainWP Dashboard', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-dashboard-start',
				'parent' => 'tbexmwp-dashboard',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mainwp_tab' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Hook place for Extensions */
		do_action( 'tbexmwp_mainwp_after_dashboard' );

		/** Group: for Quick Setup */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbexmwp-setup',
				'parent' => 'tbexmwp-dashboard',
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-dashboard-quick-setup',
				'parent' => 'group-tbexmwp-setup',
				'title'  => esc_attr__( 'MainWP Quick Setup', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'MainWP Quick Setup', 'toolbar-extras-mainwp' ),
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-start',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Start Setup', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Start Setup', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-installation',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Step 1: Installation', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup&step=installation' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 1: Installation', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-system',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Step 2: System Checkup', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup&step=system_check' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 2: System Checkup', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-hosting',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Step 3: Hosting Setup', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup&step=hosting_setup' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 3: Hosting Setup', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-optimization',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Step 4: Optimization', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup&step=optimization' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 4: Optimization', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-notifications',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Step 5: Notifications', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup&step=notification' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 5: Notifications', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-backups',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Step 6: Backups', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup&step=backup' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 6: Backups', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-wpcron-trigger',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Step 7: WP-Cron Trigger', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup&step=uptime_robot' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 7: WP-Cron Trigger', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-dashboard-setup-cleanup',
					'parent' => 'tbexmwp-dashboard-quick-setup',
					'title'  => esc_attr__( 'Step 8: Cleanup', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup&step=hide_wp_menus' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 8: Cleanup', 'toolbar-extras-mainwp' ),
					)
				)
			);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_updates', ddw_tbexmwp_item_priority( 'updates' ) );		// 90
/**
 * Items: MainWP Updates
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_updates() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'updates' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'updates' ),
		'mainwp',
		'mwp_item_icon_updates',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-updates',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=UpdatesManage' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr_x( 'Updates', 'MainWP component title', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-updates-manage',
				'parent' => 'tbexmwp-updates',
				'title'  => esc_attr__( 'Manage Updates', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=UpdatesManage' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Updates', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-updates-sync-data',
				'parent' => 'tbexmwp-updates',
				'title'  => esc_attr__( 'Sync Child Sites', 'toolbar-extras-mainwp' ),
				'href'   => '#',	// this is needed for the onclick event!
				'meta'   => array(
					'onclick' => 'mainwp_refresh_dashboard();',		// original JS function from MainWP!
					'target'  => '',
					'title'   => esc_attr__( 'Sync Child Sites', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-updates-everything',
				'parent' => 'tbexmwp-updates',
				'title'  => esc_attr__( 'Update Everything', 'toolbar-extras-mainwp' ),
				'href'   => '#',	// this is needed for the onclick event!
				'meta'   => array(
					'onclick' => 'return rightnow_global_upgrade_all();',		// original JS function from MainWP!
					'target'  => '',
					'title'   => esc_attr__( 'Update Everything', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-updates-all-plugins',
				'parent' => 'tbexmwp-updates',
				'title'  => esc_attr__( 'Update All Plugins', 'toolbar-extras-mainwp' ),
				'href'   => '#',	// this is needed for the onclick event!
				'meta'   => array(
					'onclick' => 'return rightnow_plugins_global_upgrade_all();',		// original JS function from MainWP!
					'target'  => '',
					'title'   => esc_attr__( 'Update All Plugins', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-updates-all-themes',
				'parent' => 'tbexmwp-updates',
				'title'  => esc_attr__( 'Update All Themes', 'toolbar-extras-mainwp' ),
				'href'   => '#',	// this is needed for the onclick event!
				'meta'   => array(
					'onclick' => 'return rightnow_themes_global_upgrade_all();',		// original JS function from MainWP!
					'target'  => '',
					'title'   => esc_attr__( 'Update All Themes', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-updates-all-translations',
				'parent' => 'tbexmwp-updates',
				'title'  => esc_attr__( 'Update All Translations', 'toolbar-extras-mainwp' ),
				'href'   => '#',	// this is needed for the onclick event!
				'meta'   => array(
					'onclick' => 'return rightnow_translations_global_upgrade_all();',		// original JS function from MainWP!
					'target'  => '',
					'title'   => esc_attr__( 'Update All Translations', 'toolbar-extras-mainwp' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_add_new', ddw_tbexmwp_item_priority( 'addnew' ) );		// 100
/**
 * Items: MainWP Add New stuff
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_add_new() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'addnew' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'addnew' ),
		'mainwp',
		'mwp_item_icon_addnew',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-addnew',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=managesites&do=new' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr__( 'Add New Stuff', 'toolbar-extras-mainwp' ),
			)
		)
	);

		/** Group: New Sites */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbexmwp-new-sites',
				'parent' => 'tbexmwp-addnew',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-addnew-site',
					'parent' => 'group-tbexmwp-new-sites',
					'title'  => esc_attr__( 'Website (Child Site)', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=managesites&do=new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Website (Child Site)', 'toolbar-extras-mainwp' ),
					)
				)
			);

		/** Group: New Installments */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbexmwp-new-modules',
				'parent' => 'tbexmwp-addnew',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-addnew-plugin',
					'parent' => 'group-tbexmwp-new-modules',
					'title'  => esc_attr__( 'Plugin (Bulk Install)', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=PluginsInstall' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Plugin (Bulk Install)', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-addnew-theme',
					'parent' => 'group-tbexmwp-new-modules',
					'title'  => esc_attr__( 'Theme (Bulk Install)', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ThemesInstall' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Theme (Bulk Install)', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-addnew-extension',
					'parent' => 'group-tbexmwp-new-modules',
					'title'  => esc_attr__( 'MainWP Extension', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=Extensions&leftmenu=1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'MainWP Extension', 'toolbar-extras-mainwp' ),
					)
				)
			);

		/** Hook place for Extensions */
		do_action( 'tbexmwp_mainwp_after_installments' );

		/** Group: New Content */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbexmwp-new-content',
				'parent' => 'tbexmwp-addnew',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-addnew-page',
					'parent' => 'group-tbexmwp-new-content',
					'title'  => esc_attr__( 'Page (Bulk)', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=PageBulkAdd' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Page (Bulk Mode)', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-addnew-post',
					'parent' => 'group-tbexmwp-new-content',
					'title'  => esc_attr__( 'Post (Bulk)', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=PostBulkAdd' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Post (Bulk Mode)', 'toolbar-extras-mainwp' ),
					)
				)
			);

		/** Group: New Users */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbexmwp-new-users',
				'parent' => 'tbexmwp-addnew',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-addnew-user',
					'parent' => 'group-tbexmwp-new-users',
					'title'  => esc_attr__( 'User (Bulk)', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=UserBulkAdd' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Users (Bulk Mode)', 'toolbar-extras-mainwp' ),
					)
				)
			);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_websites', ddw_tbexmwp_item_priority( 'websites' ) );		// 110
/**
 * Items: MainWP Websites (Child Sites)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_websites() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'websites' ) ) {
		return;
	}

	$title_option = get_option( 'tbex-options-mainwp' );

	$websites_title = ddw_tbexmwp_string_websites_with_counter();

	if ( 'title' === $title_option[ 'mwp_item_title_websites' ] ) {
		$websites_title = ddw_tbexmwp_string_websites();
	} elseif ( 'custom' === $title_option[ 'mwp_item_title_websites' ] ) {
		$websites_title = ddw_tbexmwp_item_name( 'websites' );
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		$websites_title,	//ddw_tbexmwp_item_name( 'websites' ),
		'mainwp',
		'mwp_item_icon_websites',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-websites',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=managesites' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr__( 'Websites (Child Sites)', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-websites-manage',
				'parent' => 'tbexmwp-websites',
				'title'  => esc_attr__( 'Manage Sites', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=managesites' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Websites (Child Sites)', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-websites-add',
				'parent' => 'tbexmwp-websites',
				'title'  => esc_attr__( 'New Website', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=managesites&do=new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Website (Child Site)', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-websites-import',
				'parent' => 'tbexmwp-websites',
				'title'  => esc_attr__( 'Import Sites', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=managesites&do=bulknew' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Websites (Child Sites)', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-websites-test-connection',
				'parent' => 'tbexmwp-websites',
				'title'  => esc_attr__( 'Test Connection', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=managesites&do=test' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Test Connection to a Website (Child Site)', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-websites-groups',
				'parent' => 'tbexmwp-websites',
				'title'  => esc_attr__( 'Groups', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ManageGroups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Groups', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-websites-server-childsites',
				'parent' => 'tbexmwp-websites',
				'title'  => esc_attr__( 'Child Sites Server Info', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ServerInformationChild' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Child Sites Server Info', 'toolbar-extras-mainwp' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_content', ddw_tbexmwp_item_priority( 'content' ) );		// 120
/**
 * Items: MainWP Content - Posts & Pages (Bulk)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_content() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'content' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'content' ),
		'mainwp',
		'mwp_item_icon_content',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-content',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=PageBulkManage' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr__( 'Manage Content - Posts &amp; Pages', 'toolbar-extras-mainwp' ),
			)
		)
	);

		/** Group: Manages Pages */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbexmwp-pages',
				'parent' => 'tbexmwp-content',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-pages-manage',
					'parent' => 'group-tbexmwp-pages',
					'title'  => esc_attr__( 'Manage Pages', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=PageBulkManage' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Manage Pages', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-pages-new',
					'parent' => 'group-tbexmwp-pages',
					'title'  => esc_attr__( 'New Page', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=PageBulkAdd' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Page (Bulk Mode)', 'toolbar-extras-mainwp' ),
					)
				)
			);

		/** Group: Manages Posts */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbexmwp-posts',
				'parent' => 'tbexmwp-content',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-posts-manage',
					'parent' => 'group-tbexmwp-posts',
					'title'  => esc_attr__( 'Manage Posts', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=PostBulkManage' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Manage Posts', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-posts-new',
					'parent' => 'group-tbexmwp-posts',
					'title'  => esc_attr__( 'New Post', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=PostBulkAdd' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add New Post (Bulk Mode)', 'toolbar-extras-mainwp' ),
					)
				)
			);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_plugins', ddw_tbexmwp_item_priority( 'plugins' ) );		// 130
/**
 * Items: MainWP Plugins
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_plugins() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'plugins' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'plugins' ),
		'mainwp',
		'mwp_item_icon_plugins',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-plugins',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=PluginsManage' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr_x( 'Plugins', 'MainWP component title', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-plugins-manage',
				'parent' => 'tbexmwp-plugins',
				'title'  => esc_attr__( 'Manage Plugins', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=PluginsManage' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Plugins', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-plugins-install-bulk',
				'parent' => 'tbexmwp-plugins',
				'title'  => esc_attr__( 'Bulk Install', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=PluginsInstall' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Install New Plugins', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-plugins-auto-updates',
				'parent' => 'tbexmwp-plugins',
				'title'  => esc_attr__( 'Auto Updates', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=PluginsAutoUpdate' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Auto Updates', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-plugins-ignored-updates',
				'parent' => 'tbexmwp-plugins',
				'title'  => esc_attr__( 'Ignored Updates', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=PluginsIgnore' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Ignored Plugin Updates', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-plugins-ignored-abandoned',
				'parent' => 'tbexmwp-plugins',
				'title'  => esc_attr__( 'Ignored Abandoned Plugins', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=PluginsIgnoredAbandoned' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Ignored Abandoned Plugins', 'toolbar-extras-mainwp' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_themes', ddw_tbexmwp_item_priority( 'themes' ) );		// 140
/**
 * Items: MainWP Themes
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_themes() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'themes' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'themes' ),
		'mainwp',
		'mwp_item_icon_themes',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-themes',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=ThemesManage' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr_x( 'Themes', 'MainWP component title', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-themes-manage',
				'parent' => 'tbexmwp-themes',
				'title'  => esc_attr__( 'Manage Themes', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ThemesManage' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Themes', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-themes-install-bulk',
				'parent' => 'tbexmwp-themes',
				'title'  => esc_attr__( 'Bulk Install', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ThemesInstall' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Install New Themes', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-themes-auto-updates',
				'parent' => 'tbexmwp-themes',
				'title'  => esc_attr__( 'Auto Updates', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ThemesAutoUpdate' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Auto Updates', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-themes-ignored-updates',
				'parent' => 'tbexmwp-themes',
				'title'  => esc_attr__( 'Ignored Updates', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ThemesIgnore' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Ignored Theme Updates', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-themes-ignored-abandoned',
				'parent' => 'tbexmwp-themes',
				'title'  => esc_attr__( 'Ignored Abandoned Themes', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ThemesIgnoredAbandoned' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Ignored Abandoned Themes', 'toolbar-extras-mainwp' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_users', ddw_tbexmwp_item_priority( 'users' ) );		// 150
/**
 * Items: MainWP Users
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_users() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'users' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'users' ),
		'mainwp',
		'mwp_item_icon_users',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-users',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=UserBulkManage' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr_x( 'Users', 'MainWP component title', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-users-manage',
				'parent' => 'tbexmwp-users',
				'title'  => esc_attr__( 'Manage Users', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=UserBulkManage' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Users', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-users-add-bulk',
				'parent' => 'tbexmwp-users',
				'title'  => esc_attr__( 'Add User', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=UserBulkAdd' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Add New Users', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-users-import',
				'parent' => 'tbexmwp-users',
				'title'  => esc_attr__( 'Import Users', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=BulkImportUsers' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Import Users', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-users-admin-passwords',
				'parent' => 'tbexmwp-users',
				'title'  => esc_attr__( 'Admin Passwords', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=UpdateAdminPasswords' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Admin Passwords', 'toolbar-extras-mainwp' ),
				)
			)
		);

}  // end function


/**
 * Items for "Extensions" component: appear here (default priority: 160)
 * @since 1.0.0
 * @see plugin file: /includes/mainwp-extensions.php
 */


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_settings', ddw_tbexmwp_item_priority( 'settings' ) );		// 170
/**
 * Items: MainWP Settings
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_settings() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'settings' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'settings' ),
		'mainwp',
		'mwp_item_icon_settings',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-settings',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=Settings' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr_x( 'Settings', 'MainWP component title', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-settings-global',
				'parent' => 'tbexmwp-settings',
				'title'  => esc_attr__( 'Global Options', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Global Options', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-settings-dashboard',
				'parent' => 'tbexmwp-settings',
				'title'  => esc_attr__( 'Dashboard Options', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=DashboardOptions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard Options', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-settings-advanced',
				'parent' => 'tbexmwp-settings',
				'title'  => esc_attr__( 'Advanced Options', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=SettingsAdvanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Options', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Tools */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-settings-tools',
				'parent' => 'tbexmwp-settings',
				'title'  => esc_attr__( 'MainWP Tools', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=MainWPTools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'MainWP Tools', 'toolbar-extras-mainwp' ),
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-settings-tools-scan-sites',
					'parent' => 'tbexmwp-settings-tools',
					'title'  => esc_attr__( 'Scan Child Sites', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=MainWP_Child_Scan' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Scan Child Sites', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-settings-tools-quick-setup',
					'parent' => 'tbexmwp-settings-tools',
					'title'  => esc_attr__( 'MainWP Quick Setup', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=mainwp-setup' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'MainWP Quick Setup', 'toolbar-extras-mainwp' ),
					)
				)
			);

		/** Managed Client Reports Responder */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbexmwp-settings-mcr-responder',
				'parent' => 'tbexmwp-settings',
				'title'  => esc_attr__( 'Managed Client Reports Responder', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=SettingsClientReportsResponder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Managed Client Reports Responder', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Toolbar settings (this add-on plugin!) */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-tbexmwp-toolbar-settings',
				'parent' => 'tbexmwp-settings',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-settings-toolbar-mainwp',
					'parent' => 'group-tbexmwp-toolbar-settings',
					'title'  => esc_attr__( 'MainWP Toolbar', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=mainwp' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'MainWP Toolbar', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-settings-toolbar-extras',
					'parent' => 'group-tbexmwp-toolbar-settings',
					'title'  => esc_attr__( 'Toolbar Extras', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Toolbar Extras', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-settings-mainwp-plugins',
					'parent' => 'group-tbexmwp-toolbar-settings',
					'title'  => esc_attr__( 'MainWP Plugins/ Extensions', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( network_admin_url( 'plugins.php?plugin_status=mwpplugins' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Filter MainWP Plugins &amp; Extensions', 'toolbar-extras-mainwp' ),
					)
				)
			);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_server_info', ddw_tbexmwp_item_priority( 'server' ) );		// 180
/**
 * Items: MainWP Server Info
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 * @uses ddw_tbex_is_wp52_install()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_server_info() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'server' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'server' ),
		'mainwp',
		'mwp_item_icon_server',
		'tbexmwp-settings-icon'
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-server',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=ServerInformation' ) ),
			'meta'   => array(
				'target' => '',
				'class'  => 'tbexmwp-toplevel',
				'title'  => esc_attr__( 'Server Information', 'toolbar-extras-mainwp' ),
			)
		)
	);

		/** Group: Server Info - MainWP Dashboard */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-mwpdashboard-server',
				'parent' => 'tbexmwp-server',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-server-info',
					'parent' => 'group-mwpdashboard-server',
					'title'  => esc_attr__( 'Server System Info', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ServerInformation' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Server System Information', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-server-cron',
					'parent' => 'group-mwpdashboard-server',
					'title'  => esc_attr__( 'Cron Schedule', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ServerInformationCron' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Cron - Scheduled Jobs', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-server-error-logs',
					'parent' => 'group-mwpdashboard-server',
					'title'  => esc_attr__( 'Error Logs', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ErrorLog' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Error Logs', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-server-wpconfig',
					'parent' => 'group-mwpdashboard-server',
					'title'  => esc_attr__( 'WP-Config File', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=WPConfig' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'WP-Config File', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-server-htaccess',
					'parent' => 'group-mwpdashboard-server',
					'title'  => esc_attr__( '.htaccess File', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=.htaccess' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( '.htaccess File', 'toolbar-extras-mainwp' ),
					)
				)
			);

		/** Group: Server Info - Child Sites */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-childsites-server',
				'parent' => 'tbexmwp-server',
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbexmwp-server-childsites',
					'parent' => 'group-childsites-server',
					'title'  => esc_attr__( 'Child Sites Server Info', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ServerInformationChild' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Child Sites Server Info', 'toolbar-extras-mainwp' ),
					)
				)
			);

		/** Group: Site Health (for the MainWP Dashboard installation) */
		if ( ddw_tbex_is_wp52_install()
			|| apply_filters( 'tbex_filter_site_health_items', TRUE )
			|| ( ! is_multisite() && current_user_can( 'install_plugins' ) )
			|| ( is_multisite() && current_user_can( 'setup_network' ) )
		) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-sitehealth-dashboard',
					'parent' => 'tbexmwp-server',
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbexmwp-server-sitehealth',
						'parent' => 'group-sitehealth-dashboard',
						'title'  => esc_attr__( 'Site Health Status', 'toolbar-extras-mainwp' ),
						'href'   => esc_url( admin_url( 'site-health.php' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'MainWP Dashboard Installation - Site Health Status', 'toolbar-extras-mainwp' ),
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'tbexmwp-server-sitehealth-status',
							'parent' => 'tbexmwp-server-sitehealth',
							'title'  => esc_attr__( 'Health Status', 'toolbar-extras-mainwp' ),
							'href'   => esc_url( admin_url( 'site-health.php' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'MainWP Dashboard Installation - Site Health Status', 'toolbar-extras-mainwp' ),
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'tbexmwp-server-sitehealth-info',
							'parent' => 'tbexmwp-server-sitehealth',
							'title'  => esc_attr__( 'Debug Info', 'toolbar-extras-mainwp' ),
							'href'   => esc_url( admin_url( 'site-health.php?tab=debug' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'MainWP Dashboard Installation - Debug Info', 'toolbar-extras-mainwp' ),
							)
						)
					);

		}  // end if

}  // end function
