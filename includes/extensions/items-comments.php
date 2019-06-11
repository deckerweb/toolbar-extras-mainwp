<?php

// includes/extensions/items-comments

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_comments' );
/**
 * Items for plugin:
 *   MainWP Comments Extension (Premium, by MainWP)
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
function ddw_tbexmwp_exitems_comments() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-comments',
			'parent' => 'group-ext-actions',
			'title'  => esc_attr__( 'Comments', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Comments-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Comments Bulk Actions', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-comments-manage',
				'parent' => 'mwp-ext-comments',
				'title'  => esc_attr__( 'Manage Comments', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Comments-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Comments - Bulk Actions', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-commentsext-resources',
					'parent' => 'mwp-ext-comments',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'commentsext-docs',
					'group-commentsext-resources',
					'https://mainwp.com/help/category/mainwp-extensions/comments/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function
