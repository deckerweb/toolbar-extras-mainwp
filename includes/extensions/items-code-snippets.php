<?php

// includes/extensions/items-code-snippets

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_exitems_code_snippets' );
/**
 * Items for plugin:
 *   MainWP Code Snippets Extension (Premium, by MainWP)
 *
 * @since 1.0.0
 *
 * @uses MainWP_CS_DB::get_instance()
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbexmwp_string_extension_docs()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_exitems_code_snippets() {

	/** Bail early if Extension class doesn't exist */
	if ( ! class_exists( 'MainWP_CS_DB' ) ) {
		return;
	}

	/** Use Extension's hook place */
	add_filter( 'tbexmwp_filter_is_extension', '__return_empty_string' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'mwp-ext-codesnippets',
			'parent' => 'group-ext-actions',
			'title'  => esc_attr__( 'Code Snippets', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Code-Snippets-Extension' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Code Snippets', 'toolbar-extras-mainwp' ),
			)
		)
	);

		$snippets = MainWP_CS_DB::get_instance()->get_codesnippet_by( 'all', null, null, 'title' );

		if ( is_array( $snippets ) && count( $snippets ) > 0 ) {

			foreach ( $snippets as $snippet ) {

				$snippet_id    = absint( $snippet->id );
				$snippet_title = esc_attr( $snippet->title );

				$GLOBALS[ 'wp_admin_bar' ]->add_group(
					array(
						'id'     => 'group-codesnippets-edit-snippet',
						'parent' => 'mwp-ext-codesnippets',
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'mwp-ext-codesnippets-edit-snippet-' . $snippet_id,
							'parent' => 'group-codesnippets-edit-snippet',
							'title'  => $snippet_title,
							'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Code-Snippets-Extension&id=' . $snippet_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Snippet', 'toolbar-extras-mainwp' ) . ': ' . $snippet_title,
							)
						)
					);

			}  // end foreach

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'mwp-ext-codesnippets-manage',
				'parent' => 'mwp-ext-codesnippets',
				'title'  => esc_attr__( 'Manage Snippets', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Code-Snippets-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Snippets - Bulk Actions', 'toolbar-extras-mainwp' ),
				)
			)
		);

		/** Group: Extension's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-codesnippets-resources',
					'parent' => 'mwp-ext-codesnippets',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'codesnippets-docs',
					'group-codesnippets-resources',
					'https://mainwp.com/help/category/mainwp-extensions/code-snippets/',
					ddw_tbexmwp_string_extension_docs()
				);

		}  // end if

}  // end function


add_action( 'tbexmwp_mainwp_after_installments', 'ddw_tbexmwp_addnew_items_code_snippet' );
/**
 * "Add New" items for plugin: Code Snippets Extension
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_addnew_items_code_snippet() {

	/** Group: New Report */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-tbexmwp-new-snippet',
			'parent' => 'tbexmwp-addnew'
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'addnew-new-code-snippet',
				'parent' => 'group-tbexmwp-new-snippet',
				'title'  => esc_attr__( 'New Code Snippet', 'toolbar-extras-mainwp' ),
				'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Mainwp-Code-Snippets-Extension' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Code Snippet', 'toolbar-extras-mainwp' )
				)
			)
		);

}  // end function
