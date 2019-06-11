<?php

// includes/extensions/items-broken-links-checker

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_broken_links_checker' );
/**
 * Items for plugin:
 *   MainWP Broken Links Checker Extension (free, by MainWP)
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
function ddw_tbexmwp_exitems_broken_links_checker() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-brokenlinkschecker',
			'parent' => 'group-ext-actions',
			'title'  => esc_attr__( 'Broken Links Checker', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Broken-Links-Checker-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Broken Links Checker', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-brokenlinkschecker-links',
				'parent' => 'mwp-ext-brokenlinkschecker',
				'title'  => esc_attr__( 'Broken Links', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Broken-Links-Checker-Extension&tab=links' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Found Broken Links', 'toolbar-extras-mainwp' ),
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mwp-ext-brokenlinkschecker-links-broken',
					'parent' => 'mwp-ext-brokenlinkschecker-links',
					'title'  => esc_attr__( 'Broken', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Broken-Links-Checker-Extension&filter_id=broken&tab=links' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Found Broken Links', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mwp-ext-brokenlinkschecker-links-redirects',
					'parent' => 'mwp-ext-brokenlinkschecker-links',
					'title'  => esc_attr__( 'Redirects', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Broken-Links-Checker-Extension&filter_id=redirects&tab=links' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Found Broken Links: Redirects', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mwp-ext-brokenlinkschecker-links-dismissed',
					'parent' => 'mwp-ext-brokenlinkschecker-links',
					'title'  => esc_attr__( 'Dismissed', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Broken-Links-Checker-Extension&filter_id=dismissed&tab=links' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Found Broken Links: Dismissed', 'toolbar-extras-mainwp' ),
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'mwp-ext-brokenlinkschecker-links-all',
					'parent' => 'mwp-ext-brokenlinkschecker-links',
					'title'  => esc_attr__( 'All Links', 'toolbar-extras-mainwp' ),
					'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Broken-Links-Checker-Extension&filter_id=all&tab=links' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Found Broken Links: All Links', 'toolbar-extras-mainwp' ),
					)
				)
			);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-brokenlinkschecker-dashboard',
				'parent' => 'mwp-ext-brokenlinkschecker',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Broken-Links-Checker-Extension&tab=dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-brokenlinkschecker-settings',
				'parent' => 'mwp-ext-brokenlinkschecker',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Broken-Links-Checker-Extension&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Broken Link Checker Settings', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-brokenlinkschecker-resources',
					'parent' => 'mwp-ext-brokenlinkschecker',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'brokenlinkschecker-docs',
					'group-brokenlinkschecker-resources',
					'https://mainwp.com/help/category/mainwp-extensions/broken-links-checker/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
