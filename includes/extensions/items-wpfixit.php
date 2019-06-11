<?php

// includes/extensions/items-wpfixit

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_before_admin_bar_render', 'ddw_tbexmwp_remove_items_wpfixit' );
/**
 * Remove original Toolbar item of the Extension to avoid clutter.
 *   (We rehook the item as sub item elsewhere, see below.)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_remove_items_wpfixit() {

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'mwpfi_page' );

}  // end function


add_action( 'tbexmwp_mainwp_after_dashboard', 'ddw_tbexmwp_items_dashboard_wpfixit' );
/**
 * For: MainWP Dashboard as sub item.
 *
 * @since 1.0.0
 */
function ddw_tbexmwp_items_dashboard_wpfixit() {

	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-mainwp-dashboard-wpfixit',
			'parent' => 'tbexmwp-dashboard'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbexmwp-dashboard-wpfixit',
			'parent' => 'group-mainwp-dashboard-wpfixit',
			'title'  => esc_attr__( 'WP Fix It Support', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mwpfi' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Fix It Support Request', 'toolbar-extras-mainwp' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_wpfixit' );
/**
 * Items for plugin:
 *   WP Fix It Extension (free, by WP Fix It/ MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_wpfixit() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-wpfixit',
			'parent' => 'group-ext-misc',
			'title'  => esc_attr__( 'WP Fix It Support', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=mwpfi' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP Fix It Support Request', 'toolbar-extras-mainwp' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wpfixit-request',
				'parent' => 'mwp-ext-wpfixit',
				'title'  => esc_attr__( 'Support Request', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mwpfi' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Support Request', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wpfixit-plans',
				'parent' => 'mwp-ext-wpfixit',
				'title'  => esc_attr__( 'WP Fix It Plans', 'toolbar-extras-mainwp' ),
				'href'   => 'https://wpfixit.com/fix-my-wordpress-site/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'WP Fix It Plans', 'toolbar-extras-mainwp' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-wpfixit-account',
				'parent' => 'mwp-ext-wpfixit',
				'title'  => esc_attr__( 'My Account', 'toolbar-extras-mainwp' ),
				'href'   => 'https://wpfixit.com/shop/my-account/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'My Account', 'toolbar-extras-mainwp' )
				)
			)
		);

}  // end function
