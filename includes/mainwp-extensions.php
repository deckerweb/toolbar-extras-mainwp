<?php

// includes/mainwp-extensions

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * 1st GROUP: Actions
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Extension: Client Reports
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_CReport_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-client-reports.php';
}


/**
 * Extension: Broken Links Checker
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Links_Checker_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-broken-links-checker.php';
}


/**
 * Extension: Comments
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Comments_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-comments.php';
}


/**
 * Extension: File Uploader
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Uploader_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-file-uploader.php';
}


/**
 * Extension: Code Snippets
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_CS_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-code-snippets.php';
}


/**
 * Extension: Links Manager
 * @since 1.0.0
 */
if ( class_exists( 'Links_Manager_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-links-manager.php';
}


/**
 * Extension: Clone
 * @since 1.0.0
 */
if ( class_exists( 'MainWPCloneExtension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-clone.php';
}



/**
 * 1st GROUP: Maintenance
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Extension: Advanced Uptime Monitor
 * @since 1.0.0
 */
if ( class_exists( 'Advanced_Uptime_Monitor_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-uptime-monitor.php';
}


/**
 * Extension: Vulnerability Checker
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Vulnerability_Checker_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-vulnerability-checker.php';
}


/**
 * Extension: Sucuri
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Sucuri_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-sucuri.php';
}


/**
 * Extension: Wordfence
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Wordfence_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-wordfence.php';
}


/**
 * Extension: iThemes Security
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_IThemes_Security_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-ithemes-security.php';
}


/**
 * Extension: Activity Log for MainWP (free, by WP White Security)
 * @since 1.0.0
 */
if ( ddw_tbexmwp_is_activity_log_mainwp_active() ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-activity-log.php';
}


/**
 * Extension: Staging
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Staging_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-wpstaging.php';
}


/**
 * Extension: Maintenance
 * @since 1.0.0
 */
if ( class_exists( 'Maintenance_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-maintenance.php';
}



/**
 * GROUP: Backups
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Extension: BackWPup
 * @since 1.0.0
 */
if ( class_exists( 'MainWPBackWPupExtensionActivator' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-backwpup.php';
}


/**
 * Extension: UpdraftPlus
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Updraftplus_Backups_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-updraftplus.php';
}


/**
 * Extension: WP Time Capsule
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_TimeCapsule_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-time-capsule.php';
}


/**
 * Extension: BackupBuddy
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_BackupBuddy_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-backupbuddy.php';
}


/**
 * Extension: BackUpWordPress
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_BackUp_WordPress_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-backupwordpress.php';
}



/**
 * GROUP: Performance
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Extension: Page Speed
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Page_Speed_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-page-speed.php';
}


/**
 * Extension: Rocket
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Rocket_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-wprocket.php';
}


/**
 * Extension: WP Compress
 * @since 1.0.0
 */
if ( class_exists( 'MainWPWPCompressExtensionActivator' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-wpcompress.php';
}



/**
 * GROUP: Misc.
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Extension: WordPress SEO (Yoast)
 * @since 1.0.0
 */
if ( defined( 'WPSEO_VERSION' ) && class_exists( 'Wordpress_Seo_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-yoast-seo.php';
}


/**
 * Extension: Favorites
 * @since 1.0.0
 */
if ( class_exists( 'Favorites_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-favorites.php';
}


/**
 * Extension: WP Fix It
 * @since 1.0.0
 */
if ( class_exists( 'mwpfi_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-wpfixit.php';
}


/**
 * Extension: Clean and Lock
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Clean_And_Lock_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-clean-and-lock.php';
}


/**
 * Extension: Branding
 * @since 1.0.0
 */
if ( class_exists( 'MainWP_Branding_Extension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-branding.php';
}


/**
 * Extension: Google Analytics
 * @since 1.0.0
 */
if ( class_exists( 'MainWPGoogleAnalyticsExtension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-google-analytics.php';
}


/**
 * Extension: Matomo (Piwik)
 * @since 1.0.0
 */
if ( class_exists( 'MainWPPiwikExtension' ) ) {
	require_once TBEXMWP_PLUGIN_DIR . 'includes/extensions/items-matomo.php';
}



/**
 * Add "Extensions" main item and proper hook places/ groups.
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_extensions', ddw_tbexmwp_item_priority( 'extensions' ) );		// 160
/**
 * Items: MainWP Extensions
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_display_component_items()
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbexmwp_item_name()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_extensions() {

	/** Bail early if component display is not wanted */
	if ( ! ddw_tbexmwp_display_component_items( 'extensions' ) ) {
		return;
	}

	/** Bail early if no extension is active */
	if ( ! has_filter( 'tbexmwp_filter_is_extension' ) ) {
		return;
	}

	$title = ddw_tbex_item_title_with_settings_icon(
		ddw_tbexmwp_item_name( 'extensions' ),
		'mainwp',
		'mwp_item_icon_extensions',
		'tbexmwp-settings-icon'
	);

	/** Add the "Extension" main item */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-extensions',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions&leftmenu=1' ) ),
			'meta'   => array(
				'class'  => 'tbexmwp-extensions tbexmwp-toplevel',
				'target' => '',
				'title'  => esc_attr_x( 'Extensions', 'MainWP component title', 'toolbar-extras-mainwp' ),
			)
		)
	);

		/** Set parent ID */
		$tbexmwp_extensions = 'tbexmwp-extensions';

		/** Group Hook Place: Actions */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-ext-actions',
				'parent' => $tbexmwp_extensions,
			)
		);

		/** Group Hook Place: Maintenance Extensions */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-ext-maintenance',
				'parent' => $tbexmwp_extensions,
			)
		);

		/** Group Hook Place: Content */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-ext-content',
				'parent' => $tbexmwp_extensions,
			)
		);

		/** Group Hook Place: Backups */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-ext-backups',
				'parent' => $tbexmwp_extensions,
			)
		);

		/** Group Hook Place: Performance */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-ext-performance',
				'parent' => $tbexmwp_extensions,
			)
		);

		/** Group Hook Place: Security */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-ext-security',
				'parent' => $tbexmwp_extensions,
			)
		);

		/** Group Hook Place: Misc. */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-ext-misc',
				'parent' => $tbexmwp_extensions,
			)
		);

}  // end function
