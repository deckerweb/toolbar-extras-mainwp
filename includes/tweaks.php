<?php

// includes/tweaks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_before_admin_bar_render', 'ddw_tbexmwp_maybe_remove_toolbar_items' );
/**
 * Remove original items from Toolbar Extras that are not needed in a MainWP
 *   Dashboard context.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_id_main_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_maybe_remove_toolbar_items() {

	/** Toolbar Extras items/groups */
	if ( ddw_tbexmwp_use_tweak_tbex_build_group() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( ddw_tbex_id_main_item() );
	}

	if ( ddw_tbexmwp_use_tweak_tbex_manage_content() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'tbex-sitegroup-manage-content' );
	}

	if ( ddw_tbexmwp_use_tweak_tbex_wpwidgets() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'wpwidgets' );
	}

	/** WordPress Core items/groups */
	if ( ddw_tbexmwp_use_tweak_wp_comments() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'comments' );
	}

	if ( ddw_tbexmwp_use_tweak_wp_site_group() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'site-name' );
	}

	if ( ddw_tbexmwp_use_tweak_wp_updates() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'updates' );
	}

	if ( ddw_tbexmwp_use_tweak_wp_newcontent() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'new-content' );
	}

}  // end function


add_action( 'admin_menu', 'ddw_tbexmwp_maybe_remove_admin_items', 1000 );
/**
 * ???
 *
 * @since 1.0.0
 */
function ddw_tbexmwp_maybe_remove_admin_items() {

	if ( ! ddw_tbexmwp_use_tweak_blocks_admin_menu() ) {
		return;
	}

	remove_menu_page( 'edit.php?post_type=wp_block' );

}  // end function


/**
 * Array with all MainWP textdomains - base plugin, and all supported extensions.
 *
 * @since 1.0.0
 *
 * @return array Array of all textdomains for MainWP + Add-Ons.
 */
function ddw_tbexmwp_get_mainwp_textdomains() {

	return array(

		/** Main plugin */
		'mainwp',

		/** Official: free extensions */
		'advanced-uptime-monitor-extension',
		'backwpup_extension',
		'mainwp-clean-and-lock-extension',
		'mainwp-sucuri-extension',
		'mainwp-updraftplus-extension',
		'mainwp-vulnerability-checker-extension',
		'mainwp-backupwordpress-extension',
		'backwpup_extension',

		/** Third-party: free extensions */
		'mwp-al-ext',					// third-party
		'activity-log-mainwp',			// third-party
		'wp-image-compress-extension',	// third-party

		/** Official: Premium extensions */
		'mainwp-client-reports-extension',
		'mainwp-article-uploader-extension',
		'bulk_settings_manager_extension',
		'mainwp-branding-extension',
		'mainwp-broken-links-checker-extension',
		'it-l10n-mainwp-backupbuddy',
		'l10n-mainwp-ithemes-security-extension',
		'mainwp-page-speed-extension',
		'rocket',
		'mainwp-staging-extension',
		'mainwp-timecapsule-extension',
		'mainwp-wordfence-extension',

	);

}  // end function


add_action( 'init', 'ddw_tbexmwp_tweak_unload_textdomain_mainwp', 100 );
/**
 * Unload Textdomain for "MainWP" plugin, and its Add-Ons (if active).
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_use_tweak_unload_translations_mainwp()
 * @uses ddw_tbexmwp_get_mainwp_textdomains()
 */
function ddw_tbexmwp_tweak_unload_textdomain_mainwp() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbexmwp_use_tweak_unload_translations_mainwp() ) {
		return;
	}

	$mainwp_textdomains = ddw_tbexmwp_get_mainwp_textdomains();

	foreach ( $mainwp_textdomains as $mainwp_textdomain ) {
		unload_textdomain( $mainwp_textdomain );
	}

}  // end function


add_filter( 'tbex_filter_unloading_textdomains', 'ddw_tbexmwp_tweak_unload_textdomains_mainwp' );
/**
 * Unload Textdomain for "MainWP Dashboard" plugin, plus extensions.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_use_tweak_unload_translations_mainwp()
 * @uses ddw_tbexmwp_get_mainwp_textdomains()
 *
 * @param array $textdomains Array of textdomains.
 * @return array Modified array of textdomains for unloading.
 */
function ddw_tbexmwp_tweak_unload_textdomains_mainwp( $textdomains ) {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbexmwp_use_tweak_unload_translations_mainwp() ) {
		return $textdomains;
	}

	return array_merge( $textdomains, ddw_tbexmwp_get_mainwp_textdomains() );

}  // end function


//add_filter( 'tbex_filter_local_dev_tooltip', 'ddw_tbexmwp_local_dev_tooltip' );
/**
 * When not in local dev environment, AND when MainWP Dashboard is active,
 *   remove the link attribute (tooltip) for the additional toolbar item on the
 *   right, originally for local dev environment.
 *
 * @since 1.0.0
 *
 * @see Toolbar Extras plugin, file: includes/local-dev-environment.php
 *
 * @return string Optionally return empty string.
 */
function ddw_tbexmwp_local_dev_tooltip() {

	if ( ! ddw_tbex_in_local_environment() && ddw_tbexmwp_is_mainwp_active() ) {
		__return_empty_string();
	}

}  // end function
