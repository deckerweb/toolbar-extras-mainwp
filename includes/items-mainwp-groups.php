<?php

// includes/items-mainwp-groups

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_groups', 20 );
/**
 * Optionally display all setup MainWP Groups (to filter/ organize Child Sites).
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_get_mainwp_websites()
 * @uses MainWP_DB::Instance()
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_groups() {

	/** Get MainWP Groups */
	$groups = MainWP_DB::Instance()->getGroupsForManageSites();

	/** Bail early if no groups setup */
	if ( is_null( $groups ) ) {
		return;
	}

	/** Get MainWP Child Sites (Websites) */
	$websites = ddw_tbexmwp_get_mainwp_websites();

	/** Bail early if no websites setup (and therefore no groups results) */
	if ( is_null( $websites ) ) {
		return;
	}

	/** Add (Toolbar) group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-mainwp-groups',
			'parent' => 'tbexmwp-websites'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'my-mainwp-groups',
			'parent' => 'group-mainwp-groups',
			'title'  => esc_attr__( 'My Groups', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ManageGroups' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'My Groups of MainWP Websites (Child Sites)', 'toolbar-extras-mainwp' )
			)
		)
	);

	/** Loop through all Groups */
	foreach ( $groups as $group ) {

		$group_id   = absint( $group->id );
		$group_name = esc_attr( $group->name );

		$group_url = add_query_arg(
			'g',
			$group_id,
			admin_url( 'admin.php?page=managesites' )
		);

		/** Build the Toolbar sub items per Group */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'my-mainwp-groups-' . $group_id,
				'parent' => 'my-mainwp-groups',
				'title'  => $group_name,
				'href'   => esc_url( $group_url ),
				'meta'   => array(
					'class'  => 'tbexmwp-group',
					'target' => '',
					'title'  => $group_name
				)
			)
		);

	}  // end foreach groups

}  // end function
