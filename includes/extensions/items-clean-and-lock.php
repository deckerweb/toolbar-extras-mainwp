<?php

// includes/extensions/items-clean-and-lock

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_clean_and_lock' );
/**
 * Items for plugin:
 *   MainWP Clean and Lock Extension (free, by MainWP)
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
function ddw_tbexmwp_exitems_clean_and_lock() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-cleanlock',
			'parent' => 'group-ext-misc',
			'title'  => esc_attr__( 'Clean and Lock', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Clean-And-Lock-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Clean and Lock', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-cleanlock-setup',
				'parent' => 'mwp-ext-cleanlock',
				'title'  => esc_attr__( 'Setup', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Clean-And-Lock-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Setup', 'toolbar-extras-mainwp' )
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-cleanlock-resources',
					'parent' => 'mwp-ext-cleanlock',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'cleanlock-docs',
					'group-cleanlock-resources',
					'https://mainwp.com/help/category/mainwp-extensions/clean-and-lock/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
