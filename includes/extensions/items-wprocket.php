<?php

// includes/extensions/items-wprocket

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_wprocket' );
/**
 * Items for plugin:
 *   MainWP Rocket (WP Rocket) Extension (Premium, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_wprocket() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-wprocket',
			'parent' => 'group-ext-performance',
			'title'  => esc_attr__( 'WP Rocket', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Rocket', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-dashboard',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-rocket-dashboard',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'WP Rocket Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'WP Rocket Dashboard (plugin)', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-cache',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'Cache', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=cache' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Basic Cache Options', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-optimization',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'File Optimization', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=optimization' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'File Optimization', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-media',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'Media', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=media' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Media Options', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-preload',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'Preload', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=preload' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Preload Options', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-advanced-rules',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'Advanced Rules', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=adv' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Rules', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-database',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'Database', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=database' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Database Optimization', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-cdn',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'CDN', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=cdn' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'CDN - Content Delivery Network Options', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-varnish',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'Varnish', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=varnish' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Varnish Caching Options', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wprocket-tools',
				'parent' => 'mwp-ext-wprocket',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Rocket-Extension&tab=tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wprocket-resources',
					'parent' => 'mwp-ext-wprocket',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'wprocket-docs',
					'group-wprocket-resources',
					'https://mainwp.com/help/category/mainwp-extensions/rocket/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
