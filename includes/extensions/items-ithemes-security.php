<?php

// includes/extensions/items-ithemes-security

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_ithemes_security' );
/**
 * Items for plugin:
 *   MainWP iThemes Security Extension (Premium, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_ithemes_security() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-ithsec',
			'parent' => 'group-ext-security',
			'title'  => esc_attr__( 'iThemes Security', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Ithemes-Security-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'iThemes Security', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-ithsec-overview',
				'parent' => 'mwp-ext-ithsec',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Ithemes-Security-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-ithsec-settings',
				'parent' => 'mwp-ext-ithsec',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Ithemes-Security-Extension&tab=settings&module_type=all' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-ithsec-logs',
				'parent' => 'mwp-ext-ithsec',
				'title'  => esc_attr__( 'Logs', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Ithemes-Security-Extension&tab=logs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Logs', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-ithsec-resources',
					'parent' => 'mwp-ext-ithsec',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'ithsec-docs',
					'group-ithsec-resources',
					'https://mainwp.com/help/category/mainwp-extensions/ithemes-security/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
