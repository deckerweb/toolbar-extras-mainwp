<?php

// includes/admin/admin-extras

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add "Settings" and Custom Menu" links to Plugins page.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_is_toolbar_extras_active()
 * @uses ddw_tbexmwp_is_mainwp_active()
 *
 * @param array $action_links (Default) Array of plugin action links.
 * @return array Modified array of plugin action links.
 */
function ddw_tbexmwp_custom_settings_links( $action_links = [] ) {

	$tbexmwp_links = array();
	
	/** Add settings link only if user can 'manage_options' */
	if ( current_user_can( 'manage_options' ) ) {

		/** If environment is not ready point to plugin manager */
		if ( ( ddw_tbexmwp_is_toolbar_extras_active() && version_compare( TBEX_PLUGIN_VERSION, TBEXMWP_REQUIRED_BASE_PLUGIN_VERSION, '>=' ) )
			&& ! ddw_tbexmwp_is_mainwp_active()
		) {

			$tbexmwp_links[ 'tbexmwp-settings' ] = sprintf(
				'<a href="%s" title="%s"><span class="dashicons-before dashicons-admin-plugins"></span> %s</a>',
				esc_url( admin_url( 'plugins.php?page=toolbar-extras-suggested-plugins' ) ),
				esc_html__( 'First Step: Setup Environment to use the plugin', 'toolbar-extras-mainwp' ),
				esc_attr__( 'First Step: Setup Environment', 'toolbar-extras-mainwp' )
			);

		}  // end if

		/** MainWP & Settings Page links */
		if ( ddw_tbexmwp_is_toolbar_extras_active() && ddw_tbexmwp_is_mainwp_active() ) {

			$tbexmwp_links[ 'tbexmwp-mainwp' ] = sprintf(
				'<a href="%s" title="%s"><span class="dashicons-before dashicons-dashboard"></span> %s</a>',
				esc_url( admin_url( 'admin.php?page=mainwp_tab' ) ),
				esc_html__( 'MainWP Dashboard', 'toolbar-extras-mainwp' ),
				esc_attr__( 'My MainWP', 'toolbar-extras-mainwp' )
			);

			$tbexmwp_links[ 'tbexmwp-settings' ] = sprintf(
				'<a href="%s" title="%s"><span class="dashicons-before dashicons-admin-generic"></span> %s</a>',
				esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=mainwp' ) ),
				esc_html__( 'Toolbar Settings for MainWP', 'toolbar-extras-mainwp' ),
				esc_attr__( 'Toolbar Settings', 'toolbar-extras-mainwp' )
			);

		}  // end if

	}  // end if

	/** Display plugin settings links */
	return apply_filters(
		'tbexmwp/filter/plugins_page/settings_link',
		array_merge( $tbexmwp_links, $action_links ),
		$tbexmwp_links 		// additional param
	);

}  // end function


add_filter( 'plugin_row_meta', 'ddw_tbexmwp_plugin_links', 10, 2 );
/**
 * Add various support links to Plugins page.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_info_link()
 *
 * @param array  $tbexmwp_links (Default) Array of plugin meta links
 * @param string $tbexmwp_file  Path of base plugin file
 * @return array $tbexmwp_links Array of plugin link strings to build HTML markup.
 */
function ddw_tbexmwp_plugin_links( $tbexmwp_links, $tbexmwp_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {
		return $tbexmwp_links;
	}

	/** List additional links only for this plugin */
	if ( $tbexmwp_file === TBEXMWP_PLUGIN_BASEDIR . 'toolbar-extras-mainwp.php' ) {

		?>
			<style type="text/css">
				tr[data-plugin="<?php echo $tbexmwp_file; ?>"] .plugin-version-author-uri a.dashicons-before:before {
					font-size: 17px;
					margin-right: 2px;
					opacity: .85;
					vertical-align: sub;
				}
			</style>
		<?php

		/* translators: Plugins page listing */
		$tbexmwp_links[] = ddw_tbex_get_info_link(
			'url_wporg_forum',
			esc_html_x( 'Support', 'Plugins page listing', 'toolbar-extras-mainwp' ),
			'dashicons-before dashicons-sos',
			'mainwp'
		);

		/* translators: Plugins page listing */
		$tbexmwp_links[] = ddw_tbex_get_info_link(
			'url_fb_group',
			esc_html_x( 'Facebook Group', 'Plugins page listing', 'toolbar-extras-mainwp' ),
			'dashicons-before dashicons-facebook'
		);

		/* translators: Plugins page listing */
		$tbexmwp_links[] = ddw_tbex_get_info_link(
			'url_translate',
			esc_html_x( 'Translations', 'Plugins page listing', 'toolbar-extras-mainwp' ),
			'dashicons-before dashicons-translation',
			'mainwp'
		);

		/* translators: Plugins page listing */
		$tbexmwp_links[] = ddw_tbex_get_info_link(
			'url_donate',
			esc_html_x( 'Donate', 'Plugins page listing', 'toolbar-extras-mainwp' ),
			'button dashicons-before dashicons-thumbs-up'
		);

		/* translators: Plugins page listing */
		$tbexmwp_links[] = ddw_tbex_get_info_link(
			'url_newsletter',
			esc_html_x( 'Join our Newsletter', 'Plugins page listing', 'toolbar-extras-mainwp' ),
			'button-primary dashicons-before dashicons-awards'
		);

	}  // end if plugin links

	/** Output the links */
	return apply_filters(
		'tbexmwp/filter/plugins_page/more_links',
		$tbexmwp_links
	);

}  // end function


add_filter( 'admin_footer_text', 'ddw_tbexmwp_admin_footer_tweak' );
/**
 * On the "MainWP" settings tab add footer text to invite for plugin review.
 *
 * @since 1.0.0
 *
 * @uses get_current_screen()
 *
 * @param string $footer_text The content that will be printed.
 * @return string The content that will be printed.
 */
function ddw_tbexmwp_admin_footer_tweak( $footer_text ) {

	/** Current screen logic */
	$current_screen = get_current_screen();
	$is_tbex_screen = array(
		'plugins_page_toolbar-extras-mainwp-suggested-plugins',
		'toplevel_page_mainwp_tab',
		'mainwp_page_UpdatesManage',
	);	

	/** Active settings tab logic */
	$active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_key( wp_unslash( $_GET[ 'tab' ] ) ) : '';

	/** Conditionally set footer text */
	if ( in_array( $current_screen->id, $is_tbex_screen )
		|| ( 'settings_page_toolbar-extras' === $current_screen->id && 'mainwp' === $active_tab )
	) {

		$rating = sprintf(
			/* translators: %s - 5 stars icons */
			'<a href="https://wordpress.org/support/plugin/toolbar-extras-mainwp/reviews/?filter=5#new-post" target="_blank" rel="noopener noreferrer">' . __( '%s rating', 'toolbar-extras-mainwp' ) . '</a>',
			'&#9733;&#9733;&#9733;&#9733;&#9733;'
		);

		$footer_text = sprintf(
			/* translators: 1 - Toolbar Extras for MainWP / 2 - label "5 star rating" */
			__( 'Enjoyed %1$s? Please leave us a %2$s. We really appreciate your support!', 'toolbar-extras' ),
			'<strong>' . __( 'Toolbar Extras for MainWP', 'toolbar-extras-mainwp' ) . '</strong>',
			$rating
		);

	}  // end if

	/** Render footer text */
	return $footer_text;

}  // end function


add_filter( 'debug_information', 'ddw_tbexmwp_site_health_add_debug_info', 6 );
/**
 * Add additional plugin related info to the Site Health Debug Info section.
 *   (Only relevant for WordPress 5.2 or higher)
 *
 * @link https://make.wordpress.org/core/2019/04/25/site-health-check-in-5-2/
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_debug_diagnostic()
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 * @uses ddw_tbex_string_uninstalled()
 *
 * @param array $debug_info Array holding all Debug Info items.
 * @return array Modified array of Debug Info.
 */
function ddw_tbexmwp_site_health_add_debug_info( $debug_info ) {
	
	/** Add our Debug info */
	$debug_info[ 'toolbar-extras-mainwp' ] = array(
		'label'       => esc_html__( 'Toolbar Extras for MainWP Dashboard', 'toolbar-extras-mainwp' ) . ' (' . esc_html__( 'Add-On Plugin', 'toolbar-extras-mainwp' ) . ')',
		'description' => ddw_tbex_string_debug_diagnostic( 'mainwp' ),
		'fields'      => array(

			/** Add-On values etc. */
			'tbexmwp_plugin_version' => array(
				'label' => __( 'Add-On Plugin version', 'toolbar-extras-mainwp' ),
				'value' => TBEXMWP_PLUGIN_VERSION,
			),
			'tbexmwp_required_base_plugin_version' => array(
				'label' => __( 'Required Base Plugin version', 'toolbar-extras-mainwp' ),
				'value' => TBEXMWP_REQUIRED_BASE_PLUGIN_VERSION,
			),
			'tbexmwp_item_title_websites' => array(
				'label' => __( 'Item title Child Websites', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', 'title_count' )[ 'mwp_item_title_websites' ],
			),
			'tbexmwp_list_child_sites' => array(
				'label' => __( 'For Child Websites, list all Child Sites', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_yes( 'return' ) )[ 'mwp_list_child_sites' ],
			),
			'tbexmwp_list_groups' => array(
				'label' => __( 'For Child Websites, list Groups', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_yes( 'return' ) )[ 'mwp_list_groups' ],
			),
			'tbexmwp_list_statuses' => array(
				'label' => __( 'For Child Websites, list Statuses', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_yes( 'return' ) )[ 'mwp_list_statuses' ],
			),
			'tbexmwp_remove_build_group' => array(
				'label' => __( 'Remove Build Group', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_yes( 'return' ) )[ 'remove_tbex_build_group' ],
			),
			'tbexmwp_remove_manage_content' => array(
				'label' => __( 'Remove Manage Content Items', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_yes( 'return' ) )[ 'remove_tbex_manage_content' ],
			),
			'tbexmwp_remove_wpwidget_items' => array(
				'label' => __( 'Remove WP Widget Items', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_yes( 'return' ) )[ 'remove_tbex_wpwidgets' ],
			),
			'tbexmwp_remove_wpcomments_item' => array(
				'label' => __( 'Remove WP Comments Item', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_yes( 'return' ) )[ 'remove_wp_comments' ],
			),
			'tbexmwp_remove_site_group' => array(
				'label' => __( 'Remove Site Group', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_no( 'return' ) )[ 'remove_wp_site_group' ],
			),
			'tbexmwp_remove_wpupdates_item' => array(
				'label' => __( 'Remove WP Updates Item', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_no( 'return' ) )[ 'remove_wp_updates' ],
			),
			'tbexmwp_remove_wp_newcontent_group' => array(
				'label' => __( 'Remove WP New Content Group', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_no( 'return' ) )[ 'remove_wp_newcontent' ],
			),
			'tbexmwp_remove_wpblocks_admin_menu' => array(
				'label' => __( 'Remove Reusable Blocks Admin Menu', 'toolbar-extras-mainwp' ),
				'value' => get_option( 'tbex-options-mainwp', ddw_tbex_string_no( 'return' ) )[ 'remove_wpblocks_admin_menu' ],
			),

			/** MainWP specific */
			'MAINWP_VERSION' => array(
				'label' => 'MainWP Dashboard: MAINWP_VERSION',
				'value' => ( ! defined( 'MAINWP_VERSION' ) ? ddw_tbex_string_uninstalled() : MAINWP_VERSION ),
			),

		),  // end array
	);

	/** Return modified Debug Info array */
	return $debug_info;

}  // end function


/**
 * Inline CSS fix for Plugins page update messages.
 *
 * @since 1.0.0
 *
 * @see ddw_tbex_plugin_update_message()
 * @see ddw_tbex_multisite_subsite_plugin_update_message()
 */
function ddw_tbexmwp_plugin_update_message_style_tweak() {

	?>
		<style type="text/css">
			.tbexmwp-update-message p:before,
			.update-message.notice p:empty {
				display: none !important;
			}
		</style>
	<?php

}  // end function


add_action( 'in_plugin_update_message-' . TBEXMWP_PLUGIN_BASEDIR . 'toolbar-extras-mainwp.php', 'ddw_tbexmwp_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for regular single site installs, and for Multisite
 *         installs where the plugin is activated Network-wide.
 *
 * @since 1.0.0
 *
 * @param object $data
 * @param object $response
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_tbexmwp_plugin_update_message( $data, $response ) {

	if ( isset( $data[ 'upgrade_notice' ] ) ) {

		ddw_tbexmwp_plugin_update_message_style_tweak();

		printf(
			'<div class="update-message tbexmwp-update-message">%s</div>',
			wpautop( $data[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


add_action( 'after_plugin_row_wp-' . TBEXMWP_PLUGIN_BASEDIR . 'toolbar-extras-mainwp.php', 'ddw_tbexmwp_multisite_subsite_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for Multisite installs where the plugin is
 *         activated on a per site basis.
 *
 * @since 1.0.0
 *
 * @param string $file
 * @param object $plugin
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_tbexmwp_multisite_subsite_plugin_update_message( $file, $plugin ) {

	if ( is_multisite() && version_compare( $plugin[ 'Version' ], $plugin[ 'new_version' ], '<' ) ) {

		$wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );

		ddw_tbexmwp_plugin_update_message_style_tweak();

		printf(
			'<tr class="plugin-update-tr"><td colspan="%s" class="plugin-update update-message notice inline notice-warning notice-alt"><div class="update-message tbexmwp-update-message"><h4 style="margin: 0; font-size: 14px;">%s</h4>%s</div></td></tr>',
			$wp_list_table->get_column_count(),
			$plugin[ 'Name' ],
			wpautop( $plugin[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


/**
 * Optionally tweaking Plugin API results to make more useful recommendations to
 *   the user.
 *
 * @since 1.0.0
 */

add_filter( 'ddwlib_plir/filter/plugins', 'ddw_tbexmwp_register_extra_plugin_recommendations_mainwp' );
/**
 * Register specific plugins for the class "DDWlib Plugin Installer
 *   Recommendations".
 *   Note: The top-level array keys are plugin slugs from the WordPress.org
 *         Plugin Directory.
 *
 * @since 1.0.0
 *
 * @param array $plugins Array holding all plugin recommendations, coming from
 *                       the class and the filter.
 * @return array Filtered and merged array of all plugin recommendations.
 */
function ddw_tbexmwp_register_extra_plugin_recommendations_mainwp( array $plugins ) {
  
	/** Remove our own slug when we are already active :) */
	if ( isset( $plugins[ 'toolbar-extras-mainwp' ] ) ) {
		$plugins[ 'toolbar-extras-mainwp' ] = null;
	}

  	/** Add new keys to recommendations */
  	$plugins[ 'mainwp' ] = array(
		'featured'    => 'yes',
		'recommended' => 'yes',
		'popular'     => 'no',
	);

  	$plugins[ 'disable-comments' ] = array(
		'featured'    => 'yes',
		'recommended' => 'yes',
		'popular'     => 'yes',
	);

	/** Return tweaked array of plugins */
	return $plugins;
  
}  // end function
