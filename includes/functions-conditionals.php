<?php

// includes/functions-conditionals

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * 1st GROUP: Active checks
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Is the Toolbar Extras plugin active or not?
 *
 * @since 1.0.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbexmwp_is_toolbar_extras_active() {

	return defined( 'TBEX_PLUGIN_VERSION' );

}  // end function


/**
 * Is the MainWP Dashboard plugin active or not?
 *
 * @since 1.0.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbexmwp_is_mainwp_active() {

	return defined( 'MAINWP_PLUGIN_URL' );

}  // end function


/**
 * Is the Activity Log for MainWP plugin active or not?
 *
 * @since 1.0.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_tbexmwp_is_activity_log_mainwp_active() {

	return class_exists( '\WSAL\MainWPExtension\Activity_Log' );

}  // end function



/**
 * 2nd GROUP: Display Toolbar items
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Display Resource items at all or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @param string $component String of MainWP component handle/key.
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbexmwp_display_component_items( $component = '' ) {

	$component = sanitize_key( $component );

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'mwp_item_display_' . $component ) );

}  // end function


/**
 * Display "Child Sites" as sub items of "Websites" or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbexmwp_display_child_sites_subitems() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'mwp_list_child_sites' ) );

}  // end function


/**
 * Display "Groups" as sub items of "Websites" or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbexmwp_display_groups_subitems() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'mwp_list_groups' ) );

}  // end function


/**
 * Display "Statuses" as sub items of "Websites" or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if setting is on 'yes', FALSE otherwise.
 */
function ddw_tbexmwp_display_statuses_subitems() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'mwp_list_statuses' ) );

}  // end function



/**
 * 3rd GROUP: Tweaks (Removings etc.)
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

/**
 * Tweak: Remove (Toolbar Extras) "Build" group items from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_tbex_build_group() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'remove_tbex_build_group' ) );

}  // end function


/**
 * Tweak: Remove (Toolbar Extras) "Manage Content" items from the Site Group?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_tbex_manage_content() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'remove_tbex_build_group' ) );

}  // end function


/**
 * Tweak: Remove (Toolbar Extras) "WP Widgets" items from the Site Group?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_tbex_wpwidgets() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'remove_tbex_wpwidgets' ) );

}  // end function


/**
 * Tweak: Remove (WP Core) "Comments" item from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_wp_comments() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'remove_wp_comments' ) );

}  // end function


/**
 * Tweak: Remove (WP Core) "Site" group items from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_wp_site_group() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'remove_wp_site_group' ) );

}  // end function


/**
 * Tweak: Remove (WP Core) "Updates" item from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_wp_updates() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'remove_wp_updates' ) );

}  // end function


/**
 * Tweak: Remove (WP Core) "New Content" group items from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_wp_newcontent() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'remove_wp_newcontent' ) );

}  // end function


/**
 * Tweak: Remove "Blocks" left-hand admin menu?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_blocks_admin_menu() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'remove_wpblocks_admin_menu' ) );

}  // end function


/**
 * Tweak: Unload MainWP / MainWP Add-Ons translations?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_unload_translations_mainwp() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'unload_td_mainwp' ) );

}  // end function


/**
 * Tweak: Unload Toolbar Extras for MainWP translations?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbexmwp_use_tweak_unload_translations_tbexmwp() {

	return ( 'yes' === ddw_tbex_get_option( 'mainwp', 'unload_td_tbexmwp' ) );

}  // end function



//add_action( 'wp', 'ddw_tbexmwp_tweak_unload_textdomain_toolbar_extras_mainwp__test', 10 );
/**
 * Unload Textdomain for "Toolbar Extras for MainWP" plugin.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_use_tweak_unload_translations_tbexmwp()
 */
function ddw_tbexmwp_tweak_unload_textdomain_toolbar_extras_mainwp__test() {

	/** Bail early if tweak shouldn't be used */
	if ( ddw_tbexmwp_use_tweak_unload_translations_tbexmwp() ) {
		unload_textdomain( 'toolbar-extras-mainwp' );
		remove_action( 'init', 'ddw_tbexmwp_load_translations' );
	}

}  // end function
