<?php

// includes/tbexmwp-update-settings

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'plugins_loaded', 'ddw_tbexmwp_addon_check_version' );
/**
 * Update plugin's options to newest version.
 *
 * @since 1.1.0
 */
function ddw_tbexmwp_addon_check_version() {

	/**
	 * Bail early if we already on plugin version 1.4.0 or higher,
	 *   or, if current user has no permission.
	 */
	if ( ! current_user_can( 'manage_options' )
		&& version_compare( get_option( 'tbexmwp-addon-version' ), '1.1.0', '>=' )
	) {
		return;
	}


	/**
	 * Update new options for plugin version 1.1.0 or higher
	 * @since 1.1.0
	 * -------------------------------------------------------------------------
	 */
		$mainwpao_v110 = array(
			'mwp_child_admin_url' => 'mainwp',

		);

		$existing_opt = (array) get_option( 'tbex-options-mainwp' );
		$new_opt      = array();

		if ( ! array_key_exists( 'mwp_child_admin_url', $existing_opt )
		) {
			$new_opt = wp_parse_args( $mainwpao_v110, $existing_opt );
			update_option( 'tbex-options-mainwp', $new_opt );
		}

	/**
	 * After updating all new setting options, update the version setting to the
	 *   latest version number.
	 *
	 * @since 1.1.0
	 */
	if ( TBEXMWP_PLUGIN_VERSION !== get_option( 'tbexmwp-addon-version' ) ) {
		update_option( 'tbexmwp-addon-version', TBEXMWP_PLUGIN_VERSION );
	}

}  // end function
