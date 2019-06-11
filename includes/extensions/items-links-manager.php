<?php

// includes/extensions/items-links-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_links_manager' );
/**
 * Items for plugin:
 *   MainWP Links Manager Extension (free, by MainWP)
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
function ddw_tbexmwp_exitems_links_manager() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-linksmanager',
			'parent' => 'group-ext-actions',
			'title'  => esc_attr__( 'Links Manager', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Links-Manager-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage External and Internal Links', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-linksmanager-links',
				'parent' => 'mwp-ext-linksmanager',
				'title'  => esc_attr__( 'All Links', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Links-Manager-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Links', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-linksmanager-resources',
					'parent' => 'mwp-ext-linksmanager',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'linksmanagerext-docs',
					'group-linksmanager-resources',
					'https://mainwp.com/help/category/mainwp-extensions/links-manager/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
