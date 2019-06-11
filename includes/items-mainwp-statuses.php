<?php

// includes/items-mainwp-statuses

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_statuses', 30 );
/**
 * Optionally display all MainWP status (to filter Child Sites).
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_get_mainwp_websites()
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_statuses() {

	/** Get MainWP Child Sites (Websites) */
	$websites = ddw_tbexmwp_get_mainwp_websites();

	/** Bail early if no websites setup (and therefore no statuses results) */
	if ( is_null( $websites ) ) {
		return;
	}

	/** Setup statuses */
	$statuses = array(
		'online'       => __( 'Online', 'toolbar-extras-mainwp' ),
		'offline'      => __( 'Offline', 'toolbar-extras-mainwp' ),
		'disconnected' => __( 'Disconnected', 'toolbar-extras-mainwp' ),
		'update'       => __( 'Available update', 'toolbar-extras-mainwp' ),
	);

	/** Add group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-mainwp-statuses',
			'parent' => 'tbexmwp-websites'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'my-mainwp-statuses',
			'parent' => 'group-mainwp-statuses',
			'title'  => esc_attr__( 'Statuses', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=managesites' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Statuses of MainWP Websites (Child Sites)', 'toolbar-extras-mainwp' )
			)
		)
	);

	/** Loop through all Statuses */
	foreach ( $statuses as $status => $status_label ) {

		$status_url = add_query_arg(
			'status',
			$status,
			admin_url( 'admin.php?page=managesites' )
		);

		/** Build the Toolbar sub items per status */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'my-mainwp-statuses-' . $status,
				'parent' => 'my-mainwp-statuses',
				'title'  => $status_label,
				'href'   => esc_url( $status_url ),
				'meta'   => array(
					'class'  => 'tbexmwp-status',
					'target' => '',
					'title'  => $status_label
				)
			)
		);

	}  // end foreach statuses

}  // end function
