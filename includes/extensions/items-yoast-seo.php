<?php

// includes/extensions/items-yoast-seo

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_yoast_seo' );
/**
 * Items for plugin:
 *   MainWP WordPress SEO (Yoast) Extension (free, by MainWP)
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
function ddw_tbexmwp_exitems_yoast_seo() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-yoastseo',
			'parent' => 'group-ext-misc',
			'title'  => esc_attr__( 'Yoast SEO', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Wordpress-Seo-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Yoast SEO', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-yoastseo-plugins',
				'parent' => 'mwp-ext-yoastseo',
				'title'  => esc_attr__( 'SEO Dashboard', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Wordpress-Seo-Extension#wpseo_dashboard_tab_lnk' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Yoast SEO Dashboard', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-yoastseo-themes',
				'parent' => 'mwp-ext-yoastseo',
				'title'  => esc_attr__( 'SEO Templates', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Wordpress-Seo-Extension#wpseo_active_tab_lnk' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'SEO Templates', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-yoastseo-resources',
					'parent' => 'mwp-ext-yoastseo',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'yoastseoext-docs',
					'group-yoastseo-resources',
					'https://mainwp.com/help/category/mainwp-extensions/wordpress-seo/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
