<?php

// includes/extensions/items-wpstaging

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_wpstaging' );
/**
 * Items for plugin:
 *   MainWP Staging (WP-Staging) Extension (free, by MainWP)
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
function ddw_tbexmwp_exitems_wpstaging() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-wpstaging',
			'parent' => 'group-ext-maintenance',
			'title'  => esc_attr__( 'Staging', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Staging-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP-Staging Manager', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wpstaging-dashboard',
				'parent' => 'mwp-ext-wpstaging',
				'title'  => esc_attr__( 'WP-Staging Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Staging-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'WP-Staging Dashboard', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wpstaging-settings',
				'parent' => 'mwp-ext-wpstaging',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Staging-Extension&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'WP-Staging Settings', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wpstaging-resources',
					'parent' => 'mwp-ext-wpstaging',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'wpstaging-docs',
					'group-wpstaging-resources',
					'https://mainwp.com/help/category/mainwp-extensions/staging/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
