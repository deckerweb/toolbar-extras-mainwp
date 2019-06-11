<?php

// includes/extensions/items-sucuri

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_sucuri' );
/**
 * Items for plugin:
 *   MainWP Sucuri Extension (free, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_sucuri() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-sucuri',
			'parent' => 'group-ext-security',
			'title'  => esc_attr__( 'Sucuri Scan', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Sucuri-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Sucuri Scan', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-sucuri-scan',
				'parent' => 'mwp-ext-sucuri',
				'title'  => esc_attr__( 'Scan Now', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Sucuri-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Scan Now', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-sucuri-resources',
					'parent' => 'mwp-ext-sucuri',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'sucuri-docs',
					'group-sucuri-resources',
					'https://mainwp.com/help/category/mainwp-extensions/sucuri/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
