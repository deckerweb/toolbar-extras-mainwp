<?php

// includes/extensions/items-page-speed

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_page_speed' );
/**
 * Items for plugin:
 *   MainWP Page Speed Extension (Premium, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_page_speed() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-pagespeed',
			'parent' => 'group-ext-performance',
			'title'  => esc_attr__( 'Page Speed', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Page-Speed-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Page Speed', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-pagespeed-dashboard',
				'parent' => 'mwp-ext-pagespeed',
				'title'  => esc_attr__( 'Page Speed Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Page-Speed-Extension&tab=dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Page Speed Bulk Actions', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-pagespeed-settings',
				'parent' => 'mwp-ext-pagespeed',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Page-Speed-Extension&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-pagespeed-resources',
					'parent' => 'mwp-ext-pagespeed',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'pagespeedext-docs',
					'group-pagespeed-resources',
					'https://mainwp.com/help/category/mainwp-extensions/page-speed/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
