<?php

// includes/extensions/items-favorites

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_favorites' );
/**
 * Items for plugin:
 *   MainWP Favorites Extension (free, by MainWP)
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
function ddw_tbexmwp_exitems_favorites() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-favorites',
			'parent' => 'group-ext-misc',
			'title'  => esc_attr__( 'Favorites', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Favorites-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Favorites', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-favorites-plugins',
				'parent' => 'mwp-ext-favorites',
				'title'  => esc_attr__( 'Plugins', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Favorites-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Favorite Plugins', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-favorites-themes',
				'parent' => 'mwp-ext-favorites',
				'title'  => esc_attr__( 'Themes', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Favorites-Extension&tab=theme' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Favorite Themes', 'toolbar-extras-mainwp' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-favorites-settings',
				'parent' => 'mwp-ext-favorites',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Favorites-Extension&tab=setting' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Favorites Settings', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-favorites-resources',
					'parent' => 'mwp-ext-favorites',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'favoritesext-docs',
					'group-favorites-resources',
					'https://mainwp.com/help/category/mainwp-extensions/favorites/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
