<?php

// includes/items-mainwp-sites

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbexmwp_items_mainwp_child_sites' );
/**
 * Optionally display all registered Child Sites as sub items of the "Websites"
 *   top-level item.
 *   Optional integration for Activiy Log Extension included.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_get_mainwp_websites()
 * @uses MainWP_Utility::get_favico_url()
 * @uses MainWP_Utility::getNiceURL()
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbexmwp_is_activity_log_mainwp_active()
 * @uses \WSAL\MainWPExtension\Settings (Activiy Log Extension)
 * @uses ddw_tbexmwp_nodes_activity_logs()
 *
 * @global object $GLOBALS[ 'wpdb' ]
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_items_mainwp_child_sites() {

	/** Get MainWP Child Sites (Websites) */
	$websites = ddw_tbexmwp_get_mainwp_websites();

	/** Bail early if no websites setup */
	if ( is_null( $websites ) ) {
		return;
	}

	/** Add group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-mainwp-sites',
			'parent' => 'tbexmwp-websites'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'my-mainwp-sites',
			'parent' => 'group-mainwp-sites',
			'title'  => esc_attr__( 'My Child Sites', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'admin.php?page=managesites' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'My MainWP Websites (Child Sites)', 'toolbar-extras-mainwp' )
			)
		)
	);

	/** Loop through all Child Sites */
	foreach ( $websites as $website ) {
		
		/** Set defaults */
		$favicon_img = '';
		$favicon_url = '';

		/** Valid child sites only */
		if ( $website !== null ) {

			$site_id   = absint( $website->id );
			$site_name = esc_attr( $website->name );

			/** Website favicon specifics */
			if ( 1 == get_option( 'mainwp_use_favicon', 1 ) ) {

				$favicon_url = MainWP_Utility::get_favico_url( $website );
				$favicon_img = sprintf(
					'<img class="ab-icon" src="%s" width="16" height="16" />&nbsp;',
					esc_url( $favicon_url )
				);

			}  // end if

			/** Set favicon + website URL as title */
			$icon_title = sprintf(
				'%1$s<span class="ab-label">%2$s</span>',
				$favicon_img,
				esc_attr( MainWP_Utility::getNiceURL( $website->url ) )
			);

			/** Build the Toolbar sub items per child site */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'my-mainwp-sites-' . $site_id,
					'parent' => 'my-mainwp-sites',
					'title'  => $icon_title,
					'href'   => esc_url( admin_url( 'admin.php?page=managesites&dashboard=' . $site_id ) ),
					'meta'   => array(
						'class'  => 'tbexmwp-childsite',
						'target' => '',
						'title'  => $site_name
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'my-mainwp-sites-' . $site_id . '-manage',
						'parent' => 'my-mainwp-sites-' . $site_id,
						'title'  => esc_attr__( 'Manage in MainWP', 'toolbar-extras-mainwp' ),
						'href'   => esc_url( admin_url( 'admin.php?page=managesites&dashboard=' . $site_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Manage', 'toolbar-extras-mainwp' ) . ': ' . $site_name
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'my-mainwp-sites-' . $site_id . '-wpadmin',
						'parent' => 'my-mainwp-sites-' . $site_id,
						'title'  => esc_attr__( 'Open WP-Admin', 'toolbar-extras-mainwp' ),
						'href'   => esc_url( $website->siteurl . '/wp-admin/' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Open WP-Admin', 'toolbar-extras-mainwp' ) . ': ' . $site_name
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'my-mainwp-sites-' . $site_id . '-visit',
						'parent' => 'my-mainwp-sites-' . $site_id,
						'title'  => esc_attr__( 'Visit Website', 'toolbar-extras-mainwp' ),
						'href'   => esc_url( $website->siteurl ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Visit Website (Frontend)', 'toolbar-extras-mainwp' ) . ': ' . $site_name
						)
					)
				);

				/** For Extension: Activity Log for MainWP */
				if ( ddw_tbexmwp_is_activity_log_mainwp_active() ) {

					$wsal_sites = new \WSAL\MainWPExtension\Settings;
					$wsal_sites = $wsal_sites->get_wsal_child_sites();

					$wsal_sites_keys = array_keys( $wsal_sites );

					/** Only if a Child Site has logging enabled */
					if ( in_array( $site_id, $wsal_sites_keys ) ) {

						/** Setup group for Child Sites */
						$GLOBALS[ 'wp_admin_bar' ]->add_group(
							array(
								'id'     => 'group-mymainwp-' . $site_id . '-logs',
								'parent' => 'my-mainwp-sites-' . $site_id
							)
						);

						/** Add only those Child Sites with logging */
						ddw_tbexmwp_nodes_activity_logs( $website, 'websites' );

					}  // end if WSAL sites check

				}  // end if Activity Log for MainWP check

		}  // end if Websites check

	}  // end foreach child sites

}  // end function
