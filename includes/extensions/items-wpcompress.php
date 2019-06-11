<?php

// includes/extensions/items-wpcompress

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_content_wpcompress', 200 );
/**
 * For: MainWP Content as sub item.
 *
 * @since 1.0.0
 */
function ddw_tbexmwp_items_content_wpcompress() {

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-mainwp-content-wpcompress',
			'parent' => 'tbexmwp-content'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-content-wpcompress',
			'parent' => 'group-mainwp-content-wpcompress',
			'title'  => esc_attr__( 'WP Compress Media', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Wp-Compress-Mainwp' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Compress Media for better Performance', 'toolbar-extras-mainwp' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_wpcompress' );
/**
 * Items for plugin:
 *   WP Compress for MainWP (free, by WP Compress for MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_wpcompress() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-wpcompress',
			'parent' => 'group-ext-performance',
			'title'  => esc_attr__( 'WP Compress Media', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Wp-Compress-Mainwp' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Compress Media for better Performance', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wpcompress-bulk-install',
				'parent' => 'mwp-ext-wpcompress',
				'title'  => esc_attr__( 'Bulk Install WP Compress', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Wp-Compress-Mainwp' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Bulk Install WP Compress', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wpcompress-customer-dashboard',
				'parent' => 'mwp-ext-wpcompress',
				'title'  => esc_attr__( 'Customer Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => 'https://app.wpcompress.com/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customer Dashboard', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wpcompress-add-website',
				'parent' => 'mwp-ext-wpcompress',
				'title'  => esc_attr__( 'Add Website', 'toolbar-extras-mainwp' ),
				'href'   => 'https://app.wpcompress.com/dashboard/?action=new_contact',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Add Website', 'toolbar-extras-mainwp' )
				)
			)
		);

}  // end function
