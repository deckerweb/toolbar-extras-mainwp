<?php

// includes/extensions/items-file-uploader

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_file_uploader' );
/**
 * Items for plugin:
 *   MainWP File Uploader Extension (Premium, by MainWP)
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
function ddw_tbexmwp_exitems_file_uploader() {

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-fileuploader',
			'parent' => 'group-ext-actions',
			'title'  => esc_attr__( 'File Uploader', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-File-Uploader-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'File Upload Manager', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-fileuploader-manage',
				'parent' => 'mwp-ext-fileuploader',
				'title'  => esc_attr__( 'Upload File', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-File-Uploader-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'File Upload - Bulk Actions', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-fileuploader-resources',
					'parent' => 'mwp-ext-fileuploader',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'fileuploader-docs',
					'group-fileuploader-resources',
					'https://mainwp.com/help/category/mainwp-extensions/file-uploader/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function


add_action( 'tbexmwp_mainwp_after_installments', 'ddw_tbexmwp_addnew_items_file_upload' );
/**
 * "Add New" items for plugin: File Uploader Extension
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_addnew_items_file_upload() {

	/** Group: New Report */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-tbexmwp-new-file',
			'parent' => 'tbexmwp-addnew'
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'addnew-new-file-upload',
				'parent' => 'group-tbexmwp-new-file',
				'title'  => esc_attr__( 'New File Upload', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-File-Uploader-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New File Upload', 'toolbar-extras-mainwp' )
				)
			)
		);

}  // end function
