<?php

// includes/plugin-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Optionally include the Toolbar Extras Plugin Manager to manage the required
 *   and suggested plugins.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'ddw_tbex_plugin_manager' ) ) :

	if ( defined( 'TBEX_PLUGIN_DIR' ) ) {
		require_once TBEX_PLUGIN_DIR . 'includes/admin/plugin-manager.php';
	}

endif;


add_filter( 'tbex/filter/plugin_manager', 'ddw_tbexmwp_plugin_manager_mainwp' );
/**
 * Add the required and suggested plugins for Toolbar Extras for MainWP
 *   Dashboard to the plugins array of the Toolbar Extras Plugin Manager.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_pm_badge()
 * @uses ddw_tbex_pmstring_for()
 * @uses ddw_tbex_pmstring_info()
 * @uses ddw_tbex_pmstring_for_general()
 *
 * @param array $plugins Array of plugins for Plugin Manager.
 * @return array Merged and modified array of plugins and their arguments.
 */
function ddw_tbexmwp_plugin_manager_mainwp( $plugins ) {

	$class = 'info';

	$for_mainwp = ddw_tbex_pmstring_for( __( 'Add-On for MainWP', 'toolbar-extras-mainwp' ) );

	$plugins_mainwp = array(
		array(
			'name'    => _x( 'MainWP Dashboard', 'Plugin Name', 'toolbar-extras-mainwp' ),
			'slug'    => 'mainwp',
			'version' => '3.5+',
			'notice' => array(
				'message' => ddw_tbex_pm_badge( 'required' ) . __( 'Required plugin for this Add-On to make any sense', 'toolbar-extras-mainwp' ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'MainWP free Extension: Vulnerability Checker', 'Plugin Name', 'toolbar-extras-mainwp' ),
			'slug'    => 'mainwp-vulnerability-checker-extension',
			'version' => '1.5+',
			'url'     => 'https://mainwp.com/extension/vulnerability-checker/ref/deckerweb/?campaign=tbexmwp',
			'notice'  => array(
				'message' => ddw_tbex_pm_badge( 'recommended' ) .
					$for_mainwp .
					ddw_tbex_pmstring_info( __( 'Highly recommended extension to check your child sites regularly', 'toolbar-extras-mainwp' ) ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'MainWP free Extension: Clean and Lock', 'Plugin Name', 'toolbar-extras-mainwp' ),
			'slug'    => 'mainwp-clean-and-lock-extension',
			'version' => '1.3+',
			'url'     => 'https://mainwp.com/extension/clean-and-lock/ref/deckerweb/?campaign=tbexmwp',
			'notice'  => array(
				'message' => ddw_tbex_pm_badge( 'recommended' ) .
					$for_mainwp .
					ddw_tbex_pmstring_info( __( 'Highly recommended extension to lock up your Dashboard install', 'toolbar-extras-mainwp' ) ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'Activity Log for MainWP', 'Plugin Name', 'toolbar-extras-mainwp' ),
			'slug'    => 'activity-log-mainwp',
			'version' => '1.0.4+',
			'notice'  => array(
				'message' => ddw_tbex_pm_badge( 'recommended' ) .
					$for_mainwp .
					ddw_tbex_pmstring_info( __( 'Highly recommended extension to control activity on your Child Sites', 'toolbar-extras-mainwp' ) ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'Disable Comments', 'Plugin Name', 'toolbar-extras-mainwp' ),
			'slug'    => 'disable-comments',
			'version' => '1.9.0+',
			'notice'  => array(
				'message' => ddw_tbex_pm_badge( 'useful' ) .
					ddw_tbex_pmstring_for( ddw_tbex_pmstring_for_general() ) .
					ddw_tbex_pmstring_info( __( 'Recommended to disable comments on your Dashboard Site to clean up the Admin and for security reasons', 'toolbar-extras-mainwp' ) ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'Members', 'Plugin Name', 'toolbar-extras-mainwp' ),
			'slug'    => 'members',
			'version' => '2.1.0+',
			'notice'  => array(
				'message' => ddw_tbex_pm_badge( 'useful' ) .
					ddw_tbex_pmstring_for( ddw_tbex_pmstring_for_general() ) .
					ddw_tbex_pmstring_info( __( 'Recommended - allows you to make your Dashboard Site only accessable via login', 'toolbar-extras-mainwp' ) ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'Limit Login Attempts Reloaded', 'Plugin Name', 'toolbar-extras-mainwp' ),
			'slug'    => 'limit-login-attempts-reloaded',
			'version' => '2.8.1+',
			'notice'  => array(
				'message' => ddw_tbex_pm_badge( 'useful' ) .
					ddw_tbex_pmstring_for( ddw_tbex_pmstring_for_general() ) .
					ddw_tbex_pmstring_info( __( 'Recommended - hardens security for the login form of your installation', 'toolbar-extras-mainwp' ) ),
				'class'   => $class,
			),
		),

	);  // end array

	/** Merge arrays and return */
	return array_merge( $plugins, $plugins_mainwp );

}  // end function


add_filter( 'show_advanced_plugins', 'ddw_tbexmwp_filter_plugins_mainwp', 90 );
add_filter( 'show_network_active_plugins', 'ddw_tbexmwp_filter_plugins_mainwp', 100 );
/**
 * For new view on Plugins page create the filter logic - this will group/ show
 *   all plugins for MainWP.
 *
 * @since 1.0.0
 *
 * @global object $plugins
 *
 * @param bool $plugin_menu Whether to show advanced menu or not.
 * @return mixed
 */
function ddw_tbexmwp_filter_plugins_mainwp( $plugin_menu ) {

	global $plugins;

	if ( is_array( $plugins ) ) {

		foreach ( $plugins[ 'all' ] as $plugin_slug => $plugin_data ) {

			if ( FALSE !== strpos( $plugin_data[ 'AuthorName' ], 'MainWP' )
				|| FALSE !== strpos( $plugin_data[ 'PluginName' ], 'MainWP' )
				|| FALSE !== strpos( $plugin_data[ 'Description' ], 'MainWP' )
				|| FALSE !== strpos( $plugin_data[ 'AuthorName' ], 'WP Fix It' )
			) {

				$plugins[ 'mwpplugins' ][ $plugin_slug ]             = $plugins[ 'all' ][ $plugin_slug ];
				$plugins[ 'mwpplugins' ][ $plugin_slug ][ 'plugin' ] = $plugin_slug;

				/** replicate the next step. */
				if ( current_user_can( 'update_plugins' ) ) {

					$current = get_site_transient( 'update_plugins' );

					if ( isset( $current->response[ $plugin_slug ] ) ) {
						$plugins[ 'mwpplugins' ][ $plugin_slug ][ 'update' ] = TRUE;
					}

				}  // end if user permission check

			}  // end if Plugin Name/Data check

		}  // end foreach

	}  // end if Array check

	return $plugin_menu;

}  // end function


add_action( 'check_admin_referer', 'ddw_tbexmwp_filter_plugins_mainwp_referer', 10, 2 );
/**
 * Check for proper admin referer to only set "MainWP" view if conditions are
 *   met.
 *
 * @since 1.0.0
 *
 * @global string $status
 *
 * @param string    $action The nonce action.
 * @param false|int $result Result of the nonce.
 */
function ddw_tbexmwp_filter_plugins_mainwp_referer( $action, $result ) {

	if ( ! function_exists( 'get_current_screen' ) ) {
		return;
	}

	$screen = get_current_screen();

	if ( is_object( $screen )
		&& 'plugins' === $screen->base
		&& ! empty( $_REQUEST[ 'plugin_status' ] ) && 'mwpplugins' === sanitize_key( wp_unslash( $_REQUEST[ 'plugin_status' ] ) )
	) {

		global $status;

		$status = 'mwpplugins';

	}  // end if

}  // end function


add_filter( 'views_plugins', 'ddw_tbexmwp_plugins_view_mainwp' );
add_filter( 'views_plugins-network', 'ddw_tbexmwp_plugins_view_mainwp' );
/**
 * Make the "MainWP" view as an default view (menu) and update the view/ menu
 *   name.
 *
 * @since 1.0.0
 *
 * @param string[] $views Array that holds all views.
 * @return mixed
 */
function ddw_tbexmwp_plugins_view_mainwp( $views ) {

	global $status, $plugins;

	if ( ! empty( $plugins[ 'mwpplugins' ] ) ) {

		$class = '';

		if ( 'mwpplugins' === $status ) {
			$class = 'current';
		}

		$views[ 'mwpplugins' ] = sprintf(
			'<a class="%1$s" href="plugins.php?plugin_status=mwpplugins" title="%4$s"> %2$s <span class="count">(%3$s) </span></a>',
			$class,
			esc_attr_x( 'MainWP', 'MainWP plugins filter on Plugins page', 'toolbar-extras-mainwp' ),	// "MainWP"
			absint( count( $plugins[ 'mwpplugins' ] ) ),
			esc_html__( 'Show all MainWP Plugins and Extensions', 'toolbar-extras-mainwp' )
		);
	}

	return $views;

}  // end function


add_filter( 'all_plugins', 'ddw_tbexmwp_prepare_plugins_view_mainwp' );
/**
 * Set the "MainWP" as the main view (menu) when admin click on the "MainWP"
 *   view on Plugins page.
 *
 * @since 1.0.0
 *
 * @global string $status
 *
 * @param array $plugins Array of plugins to display in the list table.
 * @return mixed
 */
function ddw_tbexmwp_prepare_plugins_view_mainwp( $plugins ) {

	global $status;

	if ( isset( $_REQUEST[ 'plugin_status' ] ) && 'mwpplugins' === sanitize_key( wp_unslash( $_REQUEST[ 'plugin_status' ] ) ) ) {
		$status = 'mwpplugins';
	}

	return $plugins;

}  // end function
