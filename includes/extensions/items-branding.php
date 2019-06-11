<?php

// includes/extensions/items-branding

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_branding' );
/**
 * Items for plugin:
 *   MainWP Branding Extension (free, by MainWP)
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
function ddw_tbexmwp_exitems_branding() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-branding',
			'parent' => 'group-ext-misc',
			'title'  => esc_attr__( 'Branding', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Branding-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Branding', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-branding-settings',
				'parent' => 'mwp-ext-branding',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Branding-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Branding Settings', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-branding-resources',
					'parent' => 'mwp-ext-branding',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'branding-docs',
					'group-branding-resources',
					'https://mainwp.com/help/category/mainwp-extensions/branding/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
