<?php

// includes/admin/tbexmwp-settings

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Default values of the plugin's MainWP Add-On options.
 *   Note: Option key for the settings array is 'tbex-options-mainwp' - this is
 *         needed to be compatible with the function ddw_tbex_get_option() in
 *         Toolbar Extras (base plugin).
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_websites_with_counter()
 *
 * @return array strings Parsed args of default options.
 */
function ddw_tbexmwp_default_options_mainwp() {

	/** Set the default values - make them filterable */
	$tbexmwp_default_options = apply_filters(
		'tbexmwp_filter_default_options_mainwp',
		array(

			/** MainWP components as Toolbar items */
			'mwp_item_display_dashboard'   => 'yes',
			'mwp_item_icon_dashboard'      => 'dashicons-dashboard',			// Dashicon \f226
			'mwp_item_name_dashboard'      => esc_attr_x( 'My MainWP', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_dashboard'  => 80,

			'mwp_item_display_updates'     => 'yes',
			'mwp_item_icon_updates'        => 'dashicons-update',				// Dashicon \f463
			'mwp_item_name_updates'        => esc_attr_x( 'Updates', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_updates'    => 90,

			'mwp_item_display_addnew'      => 'yes',
			'mwp_item_icon_addnew'         => 'dashicons-plus-alt',				// Dashicon \f502
			'mwp_item_name_addnew'         => esc_attr_x( 'Add', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_addnew'     => 100,

			'mwp_item_display_websites'    => 'yes',
			'mwp_item_icon_websites'       => 'dashicons-admin-site',			// Dashicon \f319
			'mwp_item_title_websites'      => 'title_count',	// 'title_count' - 'title' - 'custom'
			'mwp_item_name_websites'       => esc_attr_x( 'Websites', 'MainWP component title', 'toolbar-extras-mainwp' ),	//ddw_tbexmwp_string_websites_with_counter(),
			'mwp_item_priority_websites'   => 110,
			'mwp_list_child_sites'         => 'yes',	// on by default (sub items)
			'mwp_list_groups'              => 'yes',	// on by default (sub items)
			'mwp_list_statuses'            => 'yes',	// on by default (sub items)
			'mwp_child_admin_url'          => 'mainwp',	// use MainWP URL variant (including login)

			'mwp_item_display_content'     => 'yes',
			'mwp_item_icon_content'        => 'dashicons-welcome-write-blog',	// Dashicon \f119
			'mwp_item_name_content'        => esc_attr_x( 'Content', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_content'    => 120,

			'mwp_item_display_plugins'     => 'yes',
			'mwp_item_icon_plugins'        => 'dashicons-admin-plugins',		// Dashicon \f106
			'mwp_item_name_plugins'        => esc_attr_x( 'Plugins', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_plugins'    => 130,

			'mwp_item_display_themes'      => 'yes',
			'mwp_item_icon_themes'         => 'dashicons-admin-customizer',		// Dashicon \f540
			'mwp_item_name_themes'         => esc_attr_x( 'Themes', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_themes'     => 140,

			'mwp_item_display_users'       => 'yes',
			'mwp_item_icon_users'          => 'dashicons-groups',				// Dashicon \f307
			'mwp_item_name_users'          => esc_attr_x( 'Users', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_users'      => 150,

			'mwp_item_display_extensions'  => 'yes',
			'mwp_item_icon_extensions'     => 'dashicons-marker',				// Dashicon \f159
			'mwp_item_name_extensions'     => esc_attr_x( 'Extensions', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_extensions' => 160,

			'mwp_item_display_settings'    => 'yes',
			'mwp_item_icon_settings'       => 'dashicons-admin-generic',		// Dashicon \f111
			'mwp_item_name_settings'       => esc_attr_x( 'Settings', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_settings'   => 170,

			'mwp_item_display_server'      => 'yes',
			'mwp_item_icon_server'         => 'dashicons-info',					// Dashicon \f348
			'mwp_item_name_server'         => esc_attr_x( 'Server Info', 'MainWP component title', 'toolbar-extras-mainwp' ),
			'mwp_item_priority_server'     => 180,

			/** Various tweaks */
			'note_for_coloring'            => '',
			'remove_tbex_build_group'      => 'yes',
			'remove_tbex_manage_content'   => 'yes',
			'remove_tbex_wpwidgets'        => 'yes',
			'remove_wp_comments'           => 'yes',
			'remove_wp_site_group'         => 'no',
			'remove_wp_updates'            => 'no',
			'remove_wp_newcontent'         => 'no',
			'remove_wpblocks_admin_menu'   => 'no',
			'unload_td_mainwp'             => 'no',
			'unload_td_tbexmwp'            => 'no',

		)  // end of array
	);

	/** Parse settings default attributes */
	$tbexmwp_defaults = wp_parse_args(
		get_option( 'tbex-options-mainwp' ),
		$tbexmwp_default_options
	);

	/** Return the MainWP settings defaults */
	return $tbexmwp_defaults;

}  // end function


add_action( 'admin_init', 'ddw_tbexmwp_register_settings_mainwp', 10 );
/**
 * Load plugin's settings for settings tab "MainWP".
 *   Note: Option key for the settings array is 'tbex-options-mainwp' - this is
 *         needed to be compatible with the function ddw_tbex_get_option() in
 *         Toolbar Extras (base plugin).
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_default_options_mainwp()
 * @uses ddw_tbex_is_block_editor_active()
 * @uses ddw_tbex_is_block_editor_wanted()
 */
function ddw_tbexmwp_register_settings_mainwp() {

	/** If options do not exist (on first run), update them with default values */
	if ( ! get_option( 'tbex-options-mainwp' ) ) {
		update_option( 'tbex-options-mainwp', ddw_tbexmwp_default_options_mainwp() );
	}

	/** Prepare conditional settings */
	$plugin_inactive = ' plugin-inactive';

	/** Status for "Remove Blocks Admin Menu" setting */
	$status_blocks_admin_menu = ( ddw_tbexmwp_is_toolbar_extras_active() && ( ddw_tbex_is_block_editor_active() && ddw_tbex_is_block_editor_wanted() ) )
		? ' blocks-admin-menu'
		: $plugin_inactive;

	/** Settings args */
	$tbexmwp_settings_args = array( 'sanitize_callback' => 'ddw_tbexmwp_validate_settings_mainwp' );

	/** Register options group for MainWP Add-On tab */
	register_setting(
		'tbexmwp_group_mainwp',
		'tbex-options-mainwp',
		$tbexmwp_settings_args
	);

		/** MainWP: 1st section (the MainWP components) */
		add_settings_section(
			'tbexmwp-section-mainwp-items',
			'<h3 class="tbex-settings-section first">' . __( 'MainWP Components as Toolbar Items', 'toolbar-extras-mainwp' ) . '</h3>',
			'ddw_tbexmwp_settings_section_info_mainwp_items',
			'tbexmwp_group_mainwp'
		);

			/** Dashboard */
			add_settings_field(
				'mwp_item_display_dashboard',
				ddw_tbexmwp_settings_mainwp_component_title( 'dashboard' ) . ddw_tbexmwp_string_item_display( 'dashboard', 'class' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class' => 'tbexmwp-component tbexmwp-setting-mwp-item-display-dashboard tbex-setting-field-first',
					'option_key' => 'mwp_item_display_dashboard',
					'component'  => 'dashboard',
				)
			);

				add_settings_field(
					'mwp_item_icon_dashboard',
					ddw_tbexmwp_string_item_icon( 'dashboard' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-dashboard',
						'option_key'   => 'mwp_item_icon_dashboard',
						'default_icon' => 'dashboard',
					)
				);

				add_settings_field(
					'mwp_item_name_dashboard',
					ddw_tbexmwp_string_item_name( 'dashboard' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-dashboard',
						'option_key' => 'mwp_item_name_dashboard',
						'component'  => 'dashboard',
					)
				);

				add_settings_field(
					'mwp_item_priority_dashboard',
					ddw_tbexmwp_string_item_priority( 'dashboard' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-dashboard tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_dashboard',
						'priority'   => 80,
					)
				);

			/** Updates */
			add_settings_field(
				'mwp_item_display_updates',
				ddw_tbexmwp_settings_mainwp_component_title( 'updates' ) . ddw_tbexmwp_string_item_display( 'updates', 'class' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-updates tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_updates',
					'component'  => 'updates',
				)
			);

				add_settings_field(
					'mwp_item_icon_updates',
					ddw_tbexmwp_string_item_icon( 'updates' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-updates',
						'option_key'   => 'mwp_item_icon_updates',
						'default_icon' => 'update',
					)
				);

				add_settings_field(
					'mwp_item_name_updates',
					ddw_tbexmwp_string_item_name( 'updates' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class' => 'tbexmwp-setting-mwp-item-name-updates',
						'option_key' => 'mwp_item_name_updates',
						'component'  => 'updates',
					)
				);

				add_settings_field(
					'mwp_item_priority_updates',
					ddw_tbexmwp_string_item_priority( 'updates' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-updates tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_updates',
						'priority'   => 90,
					)
				);

			/** Add New */
			add_settings_field(
				'mwp_item_display_addnew',
				ddw_tbexmwp_settings_mainwp_component_title( 'addnew' ) . ddw_tbexmwp_string_item_display( 'addnew', 'class' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-addnew tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_addnew',
					'component'  => 'addnew',
				)
			);

				add_settings_field(
					'mwp_item_icon_addnew',
					ddw_tbexmwp_string_item_icon( 'addnew' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-addnew',
						'option_key'   => 'mwp_item_icon_addnew',
						'default_icon' => 'plus-alt',
					)
				);

				add_settings_field(
					'mwp_item_name_addnew',
					ddw_tbexmwp_string_item_name( 'addnew' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-addnew',
						'option_key' => 'mwp_item_name_addnew',
						'component'  => 'addnew',
					)
				);

				add_settings_field(
					'mwp_item_priority_addnew',
					ddw_tbexmwp_string_item_priority( 'addnew' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-addnew tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_addnew',
						'priority'   => 100,
					)
				);

			/** Websites */
			add_settings_field(
				'mwp_item_display_websites',
				ddw_tbexmwp_settings_mainwp_component_title( 'websites' ) . ddw_tbexmwp_string_item_display( 'websites', 'class' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-websites tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_websites',
					'component'  => 'websites',
				)
			);

				add_settings_field(
					'mwp_item_icon_websites',
					ddw_tbexmwp_string_item_icon( 'websites' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-websites',
						'option_key'   => 'mwp_item_icon_websites',
						'default_icon' => 'admin-site',
					)
				);

				add_settings_field(
					'mwp_item_title_websites',
					__( 'What title to display for the Websites component?', 'toolbar-extras-mainwp' ),
					'ddw_tbexmwp_settings_cb_mwp_item_title_websites',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class' => 'tbexmwp-setting-mwp-item-title-websites',
					)
				);

				add_settings_field(
					'mwp_item_name_websites',
					ddw_tbexmwp_string_item_name( 'websites' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-websites',
						'option_key' => 'mwp_item_name_websites',
						'component'  => 'websites',
					)
				);

				add_settings_field(
					'mwp_item_priority_websites',
					ddw_tbexmwp_string_item_priority( 'websites' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-websites',	// tbex-setting-field-block-bottom
						'option_key' => 'mwp_item_priority_websites',
						'priority'   => 110,
					)
				);

				/** List Child Sites */
				add_settings_field(
					'mwp_list_child_sites',
					__( 'List all Child Sites as sub items of Websites?', 'toolbar-extras-mainwp' ),
					'ddw_tbexmwp_settings_cb_mwp_list_child_sites',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class' => 'tbexmwp-setting-mwp-list-child-sites',
					)
				);

				add_settings_field(
					'mwp_child_admin_url',
					__( 'Choose Admin URL variant for Child Sites', 'toolbar-extras-mainwp' ),
					'ddw_tbexmwp_settings_cb_mwp_child_admin_url',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class' => 'tbexmwp-setting-mwp-child-admin-url',
					)
				);

				/** List Groups */
				add_settings_field(
					'mwp_list_groups',
					__( 'List all Groups as sub items of Websites?', 'toolbar-extras-mainwp' ),
					'ddw_tbexmwp_settings_cb_mwp_list_groups',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class' => 'tbexmwp-setting-mwp-list-groups',
					)
				);

				/** List Statuses */
				add_settings_field(
					'mwp_list_statuses',
					__( 'List all Statuses as sub items of Websites?', 'toolbar-extras-mainwp' ),
					'ddw_tbexmwp_settings_cb_mwp_list_statuses',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class' => 'tbexmwp-setting-mwp-list-statuses tbex-setting-field-block-bottom',
					)
				);

			/** Content */
			add_settings_field(
				'mwp_item_display_content',
				ddw_tbexmwp_settings_mainwp_component_title( 'content' ) . ddw_tbexmwp_string_item_display( 'content', 'class' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-content tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_content',
					'component'  => 'content',
				)
			);

				add_settings_field(
					'mwp_item_icon_content',
					ddw_tbexmwp_string_item_icon( 'content' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-content',
						'option_key'   => 'mwp_item_icon_content',
						'default_icon' => 'welcome-write-blog',
					)
				);

				add_settings_field(
					'mwp_item_name_content',
					ddw_tbexmwp_string_item_name( 'content' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-content',
						'option_key' => 'mwp_item_name_content',
						'component'  => 'content',
					)
				);

				add_settings_field(
					'mwp_item_priority_content',
					ddw_tbexmwp_string_item_priority( 'content' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-content tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_content',
						'priority'   => 120,
					)
				);

			/** Plugins */
			add_settings_field(
				'mwp_item_display_plugins',
				ddw_tbexmwp_settings_mainwp_component_title( 'plugins' ) . ddw_tbexmwp_string_item_display( 'plugins' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-plugins tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_plugins',
					'component'  => 'plugins',
				)
			);

				add_settings_field(
					'mwp_item_icon_plugins',
					ddw_tbexmwp_string_item_icon( 'plugins' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-plugins',
						'option_key'   => 'mwp_item_icon_plugins',
						'default_icon' => 'admin-plugins',
					)
				);

				add_settings_field(
					'mwp_item_name_plugins',
					ddw_tbexmwp_string_item_name( 'plugins' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class' => 'tbexmwp-setting-mwp-item-name-plugins',
						'option_key' => 'mwp_item_name_plugins',
						'component'  => 'plugins',
					)
				);

				add_settings_field(
					'mwp_item_priority_plugins',
					ddw_tbexmwp_string_item_priority( 'plugins' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-plugins tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_plugins',
						'priority'   => 130,
					)
				);

			/** Themes */
			add_settings_field(
				'mwp_item_display_themes',
				ddw_tbexmwp_settings_mainwp_component_title( 'themes' ) . ddw_tbexmwp_string_item_display( 'themes' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-themes tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_themes',
					'component'  => 'themes',
				)
			);

				add_settings_field(
					'mwp_item_icon_themes',
					ddw_tbexmwp_string_item_icon( 'themes' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-themes',
						'option_key'   => 'mwp_item_icon_themes',
						'default_icon' => 'admin-customizer',
					)
				);

				add_settings_field(
					'mwp_item_name_themes',
					ddw_tbexmwp_string_item_name( 'themes' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-themes',
						'option_key' => 'mwp_item_name_themes',
						'component'  => 'themes',
					)
				);

				add_settings_field(
					'mwp_item_priority_themes',
					ddw_tbexmwp_string_item_priority( 'themes' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class' => 'tbexmwp-setting-mwp-item-priority-themes tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_themes',
						'priority'   => 140,
					)
				);

			/** Users */
			add_settings_field(
				'mwp_item_display_users',
				ddw_tbexmwp_settings_mainwp_component_title( 'users' ) . ddw_tbexmwp_string_item_display( 'users' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-users tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_users',
					'component'  => 'users',
				)
			);

				add_settings_field(
					'mwp_item_icon_users',
					ddw_tbexmwp_string_item_icon( 'users' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-users',
						'option_key'   => 'mwp_item_icon_users',
						'default_icon' => 'groups',
					)
				);

				add_settings_field(
					'mwp_item_name_users',
					ddw_tbexmwp_string_item_name( 'users' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-users',
						'option_key' => 'mwp_item_name_users',
						'component'  => 'users',
					)
				);

				add_settings_field(
					'mwp_item_priority_users',
					ddw_tbexmwp_string_item_priority( 'users' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-users tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_users',
						'priority'   => 150,
					)
				);

			/** Extensions */
			add_settings_field(
				'mwp_item_display_extensions',
				ddw_tbexmwp_settings_mainwp_component_title( 'extensions' ) . ddw_tbexmwp_string_item_display( 'extensions' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-extensions tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_extensions',
					'component'  => 'extensions',
				)
			);

				add_settings_field(
					'mwp_item_icon_extensions',
					ddw_tbexmwp_string_item_icon( 'extensions' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-extensions',
						'option_key'   => 'mwp_item_icon_extensions',
						'default_icon' => 'marker',
					)
				);

				add_settings_field(
					'mwp_item_name_extensions',
					ddw_tbexmwp_string_item_name( 'extensions' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-extensions',
						'option_key' => 'mwp_item_name_extensions',
						'component'  => 'extensions',
					)
				);

				add_settings_field(
					'mwp_item_priority_extensions',
					ddw_tbexmwp_string_item_priority( 'extensions' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-extensions tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_extensions',
						'priority'   => 160,
					)
				);

			/** Settings */
			add_settings_field(
				'mwp_item_display_settings',
				ddw_tbexmwp_settings_mainwp_component_title( 'settings' ) . ddw_tbexmwp_string_item_display( 'settings' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-settings tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_settings',
					'component'  => 'settings',
				)
			);

				add_settings_field(
					'mwp_item_icon_settings',
					ddw_tbexmwp_string_item_icon( 'settings' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-settings',
						'option_key'   => 'mwp_item_icon_settings',
						'default_icon' => 'admin-generic',
					)
				);

				add_settings_field(
					'mwp_item_name_settings',
					ddw_tbexmwp_string_item_name( 'settings' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-settings',
						'option_key' => 'mwp_item_name_settings',
						'component'  => 'settings',
					)
				);

				add_settings_field(
					'mwp_item_priority_settings',
					ddw_tbexmwp_string_item_priority( 'settings' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-settings tbex-setting-field-block-bottom',
						'option_key' => 'mwp_item_priority_settings',
						'priority'   => 170,
					)
				);

			/** Server Info */
			add_settings_field(
				'mwp_item_display_server',
				ddw_tbexmwp_settings_mainwp_component_title( 'server' ) . ddw_tbexmwp_string_item_display( 'server' ),
				'ddw_tbexmwp_settings_cb_item_display',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-mainwp-items',
				array(
					'class'      => 'tbexmwp-component tbexmwp-setting-mwp-item-display-server tbex-setting-field-block-top',
					'option_key' => 'mwp_item_display_server',
					'component'  => 'server',
				)
			);

				add_settings_field(
					'mwp_item_icon_server',
					ddw_tbexmwp_string_item_icon( 'server' ),
					'ddw_tbexmwp_settings_cb_item_icon',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'        => 'tbexmwp-setting-mwp-item-icon-server',
						'option_key'   => 'mwp_item_icon_server',
						'default_icon' => 'info',
					)
				);

				add_settings_field(
					'mwp_item_name_server',
					ddw_tbexmwp_string_item_name( 'server' ),
					'ddw_tbexmwp_settings_cb_item_name',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-name-server',
						'option_key' => 'mwp_item_name_server',
						'component'  => 'server',
					)
				);

				add_settings_field(
					'mwp_item_priority_server',
					ddw_tbexmwp_string_item_priority( 'server' ),
					'ddw_tbexmwp_settings_cb_item_priority',
					'tbexmwp_group_mainwp',
					'tbexmwp-section-mainwp-items',
					array(
						'class'      => 'tbexmwp-setting-mwp-item-priority-server',
						'option_key' => 'mwp_item_priority_server',
						'priority'   => 180,
					)
				);

		/** MainWP: 2nd section (various tweaks) */
		add_settings_section(
			'tbexmwp-section-tweaks',
			'<h3 class="tbex-settings-section">' . __( 'Various Tweaks', 'toolbar-extras-mainwp' ) . '</h3>',
			'ddw_tbexmwp_settings_section_info_mainwp_tweaks',
			'tbexmwp_group_mainwp'
		);

			add_settings_field(
				'note_for_coloring',
				__( 'Set background color, icon and special text for Toolbar', 'toolbar-extras-mainwp' ),
				'ddw_tbex_addon_settings_cb_note_for_coloring',		// via base plugin!
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-note-for-coloring' )
			);

			add_settings_field(
				'remove_tbex_build_group',
				sprintf( __( 'Remove %s Group from Toolbar Extras?', 'toolbar-extras-mainwp' ), '<em>' . __( 'Build', 'toolbar-extras-mainwp' ) . '</em>' ),
				'ddw_tbexmwp_settings_cb_remove_tbex_build_group',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-remove-tbex-build-group' )
			);

			add_settings_field(
				'remove_tbex_manage_content',
				__( 'Remove Manage Content items from Toolbar Extras?', 'toolbar-extras-mainwp' ),
				'ddw_tbexmwp_settings_cb_remove_tbex_manage_content',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-remove-tbex-manage-content' )
			);

			add_settings_field(
				'remove_tbex_wpwidgets',
				__( 'Remove WP Widgets items from Toolbar Extras?', 'toolbar-extras-mainwp' ),
				'ddw_tbexmwp_settings_cb_remove_tbex_wpwidgets',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-remove-tbex-wpwidgets' )
			);

			add_settings_field(
				'remove_wp_comments',
				__( 'Remove Comments Item (WordPress default)?', 'toolbar-extras-mainwp' ),
				'ddw_tbexmwp_settings_cb_remove_wp_comments',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-remove-wp-comments' )
			);

			add_settings_field(
				'remove_wp_site_group',
				__( 'Remove Site Group (WordPress default)?', 'toolbar-extras-mainwp' ),
				'ddw_tbexmwp_settings_cb_remove_wp_site_group',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-remove-wp-site-group' )
			);

			add_settings_field(
				'remove_wp_updates',
				__( 'Remove Updates Item (WordPress default)?', 'toolbar-extras-mainwp' ),
				'ddw_tbexmwp_settings_cb_remove_wp_updates',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-remove-wp-updates' )
			);

			add_settings_field(
				'remove_wp_newcontent',
				__( 'Remove New Content Group (WordPress default)?', 'toolbar-extras-mainwp' ),
				'ddw_tbexmwp_settings_cb_remove_wp_newcontent',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-remove-wp-newcontent' )
			);

			add_settings_field(
				'remove_wpblocks_admin_menu',
				/* translators: %s - label, "Blocks" */
				sprintf( __( 'Remove Left-hand %s Admin Menu?', 'toolbar-extras-mainwp' ), '<em>' . __( 'Blocks', 'toolbar-extras-mainwp' ) . '</em>' ),
				'ddw_tbexmwp_settings_cb_remove_wpblocks_admin_menu',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-remove-wpblocks-admin-menu tbex-setting-conditional' . $status_blocks_admin_menu )
			);

			add_settings_field(
				'unload_td_mainwp',
				__( 'Unload all MainWP Translations?', 'toolbar-extras-mainwp' ),
				'ddw_tbexmwp_settings_cb_unload_td_mainwp',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-unload-td-mainwp' )
			);

			add_settings_field(
				'unload_td_tbexmwp',
				__( 'Unload Toolbar Extras for MainWP Add-On Translations?', 'toolbar-extras-mainwp' ),
				'ddw_tbexmwp_settings_cb_unload_td_tbexmwp',
				'tbexmwp_group_mainwp',
				'tbexmwp-section-tweaks',
				array( 'class' => 'tbexmwp-setting-unload-td-tbexmwp' )
			);

}  // end function


/**
 * Validate General settings callback.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_default_options_mainwp()
 *
 * @param mixed $input User entered value of settings field key.
 * @return string(s) Sanitized user inputs ("parsed").
 */
function ddw_tbexmwp_validate_settings_mainwp( $input ) {

	$tbexmwp_default_options = ddw_tbexmwp_default_options_mainwp();

	$parsed = wp_parse_args( $input, $tbexmwp_default_options );

	/** Save empty text fields with default options */
	$textfields = array(
		'mwp_item_name_dashboard',
		'mwp_item_name_updates',
		'mwp_item_name_addnew',
		'mwp_item_name_websites',
		'mwp_item_name_content',
		'mwp_item_name_plugins',
		'mwp_item_name_themes',
		'mwp_item_name_users',
		'mwp_item_name_extensions',
		'mwp_item_name_settings',
		'mwp_item_name_server',
	);

	foreach( $textfields as $textfield ) {
		$parsed[ $textfield ] = wp_filter_nohtml_kses( $input[ $textfield ] );
	}

	/** Save CSS classes sanitized */
	$cssclasses_fields = array(
		'mwp_item_icon_dashboard',
		'mwp_item_icon_updates',
		'mwp_item_icon_addnew',
		'mwp_item_icon_websites',
		'mwp_item_icon_content',
		'mwp_item_icon_plugins',
		'mwp_item_icon_themes',
		'mwp_item_icon_users',
		'mwp_item_icon_extensions',
		'mwp_item_icon_settings',
		'mwp_item_icon_server',
	);

	foreach( $cssclasses_fields as $cssclass ) {
		$parsed[ $cssclass ] = strtolower( sanitize_html_class( $input[ $cssclass ] ) );
	}

	/** Save integer fields */
	$integer_fields = array(
		'mwp_item_priority_dashboard',
		'mwp_item_priority_updates',
		'mwp_item_priority_addnew',
		'mwp_item_priority_websites',
		'mwp_item_priority_content',
		'mwp_item_priority_plugins',
		'mwp_item_priority_themes',
		'mwp_item_priority_users',
		'mwp_item_priority_extensions',
		'mwp_item_priority_settings',
		'mwp_item_priority_server',
	);

	foreach ( $integer_fields as $integer ) {
		$parsed[ $integer ] = absint( $input[ $integer ] );
	}

	/** Save select fields */
	$select_fields = array(
		'mwp_item_display_dashboard',
		'mwp_item_display_updates',
		'mwp_item_display_addnew',
		'mwp_item_display_websites',
		'mwp_item_display_content',
		'mwp_item_display_plugins',
		'mwp_item_display_themes',
		'mwp_item_display_users',
		'mwp_item_display_extensions',
		'mwp_item_display_settings',
		'mwp_item_display_server',
		'mwp_item_title_websites',
		'mwp_child_admin_url',
		'mwp_list_child_sites',
		'mwp_list_groups',
		'mwp_list_statuses',
		'remove_tbex_build_group',
		'remove_tbex_manage_content',
		'remove_tbex_wpwidgets',
		'remove_wp_comments',
		'remove_wp_site_group',
		'remove_wp_updates',
		'remove_wp_newcontent',
		'remove_wpblocks_admin_menu',
		'unload_td_tbexmwp',
		'unload_td_mainwp',
		'note_for_coloring',
	);

	foreach( $select_fields as $select ) {
		$parsed[ $select ] = sanitize_key( $input[ $select ] );
	}

	/** Return the sanitized user input value(s) */
	return $parsed;

}  // end function


add_filter( 'tbex_filter_settings_toggles', 'ddw_tbexmwp_pass_toggable_settings' );
/**
 * Via TBEX Core 'tbex_filter_settings_toggles' filter telling the TBEX admin JS
 *   which from our settings are toggable (to reveal more sub settings).
 *
 * @since 1.0.0
 *
 * @param array $toggles Array that holds all current registered toggles.
 * @return array Modified array of toggles.
 */
function ddw_tbexmwp_pass_toggable_settings( array $toggles ) {

	/** Merge our settings IDs with the TBEX core array */
	$toggles = array_merge(
		(array) $toggles,
		array(
			'dashboard_icon'      => array( '#tbex-options-mainwp-mwp_item_display_dashboard', '.tbexmwp-setting-mwp-item-icon-dashboard', 'yes' ),
			'dashboard_name'      => array( '#tbex-options-mainwp-mwp_item_display_dashboard', '.tbexmwp-setting-mwp-item-name-dashboard', 'yes' ),
			'dashboard_priority'  => array( '#tbex-options-mainwp-mwp_item_display_dashboard', '.tbexmwp-setting-mwp-item-priority-dashboard', 'yes' ),

			'updates_icon'        => array( '#tbex-options-mainwp-mwp_item_display_updates', '.tbexmwp-setting-mwp-item-icon-updates', 'yes' ),
			'updates_name'        => array( '#tbex-options-mainwp-mwp_item_display_updates', '.tbexmwp-setting-mwp-item-name-updates', 'yes' ),
			'updates_priority'    => array( '#tbex-options-mainwp-mwp_item_display_updates', '.tbexmwp-setting-mwp-item-priority-updates', 'yes' ),

			'addnew_icon'         => array( '#tbex-options-mainwp-mwp_item_display_addnew', '.tbexmwp-setting-mwp-item-icon-addnew', 'yes' ),
			'addnew_name'         => array( '#tbex-options-mainwp-mwp_item_display_addnew', '.tbexmwp-setting-mwp-item-name-addnew', 'yes' ),
			'addnew_priority'     => array( '#tbex-options-mainwp-mwp_item_display_addnew', '.tbexmwp-setting-mwp-item-priority-addnew', 'yes' ),

			'websites_icon'       => array( '#tbex-options-mainwp-mwp_item_display_websites', '.tbexmwp-setting-mwp-item-icon-websites', 'yes' ),
			'websites_title'      => array( '#tbex-options-mainwp-mwp_item_display_websites', '.tbexmwp-setting-mwp-item-title-websites', 'yes' ),
			'websites_name'       => array( '#tbex-options-mainwp-mwp_item_title_websites', '.tbexmwp-setting-mwp-item-name-websites', 'custom' ),
			'websites_priority'   => array( '#tbex-options-mainwp-mwp_item_display_websites', '.tbexmwp-setting-mwp-item-priority-websites', 'yes' ),
			'websites_list'       => array( '#tbex-options-mainwp-mwp_item_display_websites', '.tbexmwp-setting-mwp-list-child-sites', 'yes' ),
			'websites_aurl'       => array( '#tbex-options-mainwp-mwp_list_child_sites', '.tbexmwp-setting-mwp-child-admin-url', 'yes' ),
			'groups_list'         => array( '#tbex-options-mainwp-mwp_item_display_websites', '.tbexmwp-setting-mwp-list-groups', 'yes' ),
			'statuses_list'       => array( '#tbex-options-mainwp-mwp_item_display_websites', '.tbexmwp-setting-mwp-list-statuses', 'yes' ),

			'content_icon'        => array( '#tbex-options-mainwp-mwp_item_display_content', '.tbexmwp-setting-mwp-item-icon-content', 'yes' ),
			'content_name'        => array( '#tbex-options-mainwp-mwp_item_display_content', '.tbexmwp-setting-mwp-item-name-content', 'yes' ),
			'content_priority'    => array( '#tbex-options-mainwp-mwp_item_display_content', '.tbexmwp-setting-mwp-item-priority-content', 'yes' ),

			'plugins_icon'        => array( '#tbex-options-mainwp-mwp_item_display_plugins', '.tbexmwp-setting-mwp-item-icon-plugins', 'yes' ),
			'plugins_name'        => array( '#tbex-options-mainwp-mwp_item_display_plugins', '.tbexmwp-setting-mwp-item-name-plugins', 'yes' ),
			'plugins_priority'    => array( '#tbex-options-mainwp-mwp_item_display_plugins', '.tbexmwp-setting-mwp-item-priority-plugins', 'yes' ),

			'themes_icon'         => array( '#tbex-options-mainwp-mwp_item_display_themes', '.tbexmwp-setting-mwp-item-icon-themes', 'yes' ),
			'themes_name'         => array( '#tbex-options-mainwp-mwp_item_display_themes', '.tbexmwp-setting-mwp-item-name-themes', 'yes' ),
			'themes_priority'     => array( '#tbex-options-mainwp-mwp_item_display_themes', '.tbexmwp-setting-mwp-item-priority-themes', 'yes' ),

			'users_icon'          => array( '#tbex-options-mainwp-mwp_item_display_users', '.tbexmwp-setting-mwp-item-icon-users', 'yes' ),
			'users_name'          => array( '#tbex-options-mainwp-mwp_item_display_users', '.tbexmwp-setting-mwp-item-name-users', 'yes' ),
			'users_priority'      => array( '#tbex-options-mainwp-mwp_item_display_users', '.tbexmwp-setting-mwp-item-priority-users', 'yes' ),

			'extensions_icon'     => array( '#tbex-options-mainwp-mwp_item_display_extensions', '.tbexmwp-setting-mwp-item-icon-extensions', 'yes' ),
			'extensions_name'     => array( '#tbex-options-mainwp-mwp_item_display_extensions', '.tbexmwp-setting-mwp-item-name-extensions', 'yes' ),
			'extensions_priority' => array( '#tbex-options-mainwp-mwp_item_display_extensions', '.tbexmwp-setting-mwp-item-priority-extensions', 'yes' ),

			'settings_icon'       => array( '#tbex-options-mainwp-mwp_item_display_settings', '.tbexmwp-setting-mwp-item-icon-settings', 'yes' ),
			'settings_name'       => array( '#tbex-options-mainwp-mwp_item_display_settings', '.tbexmwp-setting-mwp-item-name-settings', 'yes' ),
			'settings_priority'   => array( '#tbex-options-mainwp-mwp_item_display_settings', '.tbexmwp-setting-mwp-item-priority-settings', 'yes' ),

			'server_icon'         => array( '#tbex-options-mainwp-mwp_item_display_server', '.tbexmwp-setting-mwp-item-icon-server', 'yes' ),
			'server_name'         => array( '#tbex-options-mainwp-mwp_item_display_server', '.tbexmwp-setting-mwp-item-name-server', 'yes' ),
			'server_priority'     => array( '#tbex-options-mainwp-mwp_item_display_server', '.tbexmwp-setting-mwp-item-priority-server', 'yes' ),
		)
	);

	/** Return the merged array */
	return $toggles;

}  // end function


//tbex_settings_tab_after_development
add_action( 'tbex_settings_tab_addons', 'ddw_tbexmwp_settings_tab_title_mainwp', 10, 1 );
/**
 * Build markup and logic for the "MainWP" settings tab title.
 *
 * @since 1.0.0
 *
 * @param string $active_tab ID string of current active settings tab.
 * @return string Echoing HTML/ CSS markup, plus strings of settings tab title.
 */
function ddw_tbexmwp_settings_tab_title_mainwp( $active_tab ) {

	$url_mainwp = esc_url(
		add_query_arg(
			array(
				'page' => 'toolbar-extras',
				'tab'  => 'mainwp'
			),
			admin_url( 'options-general.php' )
		)
	);

	?>
		<a href="<?php echo $url_mainwp; ?>" class="dashicons-before dashicons-networking nav-tab <?php echo ( 'mainwp' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
			<?php
				/* translators: Settings tab title in WP-Admin */
				_ex( 'MainWP', 'Plugin settings tab title', 'toolbar-extras-mainwp' );
			?>
		</a>
	<?php

}  // end function


add_action( 'tbex_settings_tab_addon_mainwp', 'ddw_tbexmwp_render_settings_tab_mainwp' );
/**
 * Render the "MainWP" settings tab on the Toolbar Extras settings page.
 *   This will setup all settings sections, settings fields, save button.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_save_changes()
 */
function ddw_tbexmwp_render_settings_tab_mainwp() {

	do_action( 'tbexmwp_before_settings_mainwp_view' );

	require_once TBEXMWP_PLUGIN_DIR . 'includes/admin/views/settings-tab-mainwp.php';

	settings_fields( 'tbexmwp_group_mainwp' );
	do_settings_sections( 'tbexmwp_group_mainwp' );

	do_action( 'tbexmwp_after_settings_mainwp_view' );

	submit_button( ddw_tbex_string_save_changes() );

}  // end function


add_action( 'admin_menu', 'ddw_tbexmwp_add_submenu_for_mainwp' );
/**
 * Add additional admin menu items for MainWP Dashboard v3.x to make Toolbar
 *   settings more accessable.
 *
 *   Info - available MainWP methods:
 *   - public static function add_sub_left_menu( $title, $parent_key, $slug, $href, $icon = '', $desc = '' )
 *   - public static function add_sub_sub_left_menu( $title, $parent_key, $slug, $href, $right = '' )
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_is_mainwp_active()
 * @uses add_submenu_page()
 * @uses MainWP_System::add_sub_left_menu()
 * @uses MainWP_System::add_sub_sub_left_menu()
 */
function ddw_tbexmwp_add_submenu_for_mainwp() {

	/** Bail early if MainWP Dashboard not active */
	if ( ! ddw_tbexmwp_is_mainwp_active() ) {
		return;
	}

	/** Add to MainWP's regular left-hand admin menu */
	$menu_title_tbexmwp = esc_html_x( 'MainWP Toolbar', 'Admin menu title', 'toolbar-extras-mainwp' );
	$menu_title_plugins = esc_html_x( 'MainWP Plugins', 'Admin menu title', 'toolbar-extras-mainwp' );

	add_submenu_page(
		'mainwp_tab',
		$menu_title_tbexmwp,
		$menu_title_tbexmwp,
		'manage_options',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=mainwp' ) )
	);

	add_submenu_page(
		'mainwp_tab',
		$menu_title_plugins,
		$menu_title_plugins,
		'install_plugins',
		esc_url( network_admin_url( 'plugins.php?plugin_status=mwpplugins' ) )
	);

	/**
	 * Add to MainWP's branded extra left-hand admin menu - for Dashboard and
	 *   Extensions submenus.
	 */
	$mainwp_menu_title = esc_html_x( 'Toolbar for MainWP', 'MainWP admin menu title', 'toolbar-extras-mainwp' );

	if ( method_exists( 'MainWP_System', 'add_sub_left_menu' ) ) {

		MainWP_System::add_sub_left_menu(
			$mainwp_menu_title,
			'mainwp_tab',
			'toolbar-extras&tab=mainwp',
			'options-general.php?page=toolbar-extras&tab=mainwp',
			'<i class="fa fa-bars"></i>'
		);

		MainWP_System::add_sub_left_menu(
			$menu_title_plugins,
			'mainwp_tab',
			'plugins&plugin_status=mwpplugins',
			esc_url( network_admin_url( 'plugins.php?plugin_status=mwpplugins' ) ),
			'<i class="fa fa-plug"></i>'
		);

		MainWP_System::add_sub_left_menu(
			$mainwp_menu_title,
			'Extensions',
			'toolbar-extras&tab=mainwp',
			'options-general.php?page=toolbar-extras&tab=mainwp',
			'<i class="fa fa-bars"></i>'
		);

	}  // end if

	/** Add to MainWP Sub-Sub-Menus */
	if ( method_exists( 'MainWP_System', 'add_sub_sub_left_menu' ) ) {

		MainWP_System::add_sub_sub_left_menu(
			esc_attr_x( 'Site Health', 'MainWP admin menu title', 'toolbar-extras-mainwp' ),
			'ServerInformation',
			'sub-site-health',
			esc_url( admin_url( 'site-health.php' ) )
		);

		MainWP_System::add_sub_sub_left_menu(
			esc_attr_x( 'Debug Info', 'MainWP admin menu title', 'toolbar-extras-mainwp' ),
			'ServerInformation',
			'sub-site-health&tab=debug',
			esc_url( admin_url( 'site-health.php?tab=debug' ) )
		);

	}  // end if

}  // end function


add_action( 'admin_menu', 'ddw_tbexmwp_add_toolbar_menu_for_mainwp4' );
/**
 * Add additional admin menu items for MainWP Dashboard v4.x to make Toolbar
 *   settings more accessable.
 *
 * @since 1.1.0
 *
 * @uses MainWP_Menu::add_left_menu()
 * @uses MainWP_Menu::init_subpages_left_menu()
 * @uses MainWP_Menu::is_disable_menu_item()
 *
 * @param array $sub_pages
 */
function ddw_tbexmwp_add_toolbar_menu_for_mainwp4( $sub_pages = array() ) {

	/** Bail early if needed methods don't exist */
	if ( ! method_exists( 'MainWP_Menu', 'add_left_menu' )
		|| ! method_exists( 'MainWP_Menu', 'init_subpages_left_menu' )
		|| ! method_exists( 'MainWP_Menu', 'is_disable_menu_item' )
	) {
		return;
	}

	MainWP_Menu::add_left_menu(
		array(
			'title'		 => __( 'Toolbar Extras', 'toolbar-extras-mainwp' ),
			'parent_key' => 'mainwp_tab',
			'slug'		 => 'Toolbar_Extras',
			'href'		 => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=mainwp' ) ),
			'icon'		 => '<i class="cogs icon"></i>'
		),
		1	// level 1
	);

	$init_sub_subleftmenu = array(
		array(
			'title'		 => __( 'MainWP Toolbar', 'toolbar-extras-mainwp' ),
			'parent_key' => 'Toolbar_Extras',
			'href'		 => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=mainwp' ) ),
			'slug'		 => 'TBEXMWP_MainWP_Toolbar',
			'right'		 => ''
		),
		array(
			'title'		 => __( 'More Toolbar Options', 'toolbar-extras-mainwp' ),
			'parent_key' => 'Toolbar_Extras',
			'href'		 => esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ),
			'slug'		 => 'TBEXMWP_Toolbar_More',
			'right'		 => ''
		),
		array(
			'title'		 => __( 'MainWP Plugins/ Extensions', 'toolbar-extras-mainwp' ),
			'parent_key' => 'Toolbar_Extras',
			'href'		 => esc_url( network_admin_url( 'plugins.php?plugin_status=mwpplugins' ) ),
			'slug'		 => 'TBEXMWP_MainWP_Plugins',
			'right'		 => ''
		),
	);

	MainWP_Menu::init_subpages_left_menu( $sub_pages, $init_sub_subleftmenu, 'Toolbar_Extras', 'Toolbar_Extras' );

	foreach ( $init_sub_subleftmenu as $item ) {

		if ( MainWP_Menu::is_disable_menu_item( 3, $item[ 'slug' ] ) ) {
			continue;
		}

		MainWP_Menu::add_left_menu( $item, 2 );

	}  // end foreach

}  // end function


add_action( 'admin_menu', 'ddw_tbexmwp_maybe_add_submenu_for_activitylog', -1 );
/**
 * Optionally add "Activity Log" extension as sub-sub item for Child Sites
 *   branded MainWP Admin Menu.
 *
 *   Note: We need this as extra hook/function to take advantage of a different
 *         hook priority.
 *
 * @since 1.0.0
 *
 * @see ddw_tbexmwp_add_submenu_for_mainwp()
 *
 * @uses ddw_tbexmwp_is_activity_log_mainwp_active()
 * @uses MainWP_System::add_sub_left_menu()
 */
function ddw_tbexmwp_maybe_add_submenu_for_activitylog() {

	/** Optional, for  extension */
	if ( ! ddw_tbexmwp_is_activity_log_mainwp_active() ) {
		return;
	}

	if ( method_exists( 'MainWP_System', 'add_sub_left_menu' ) ) {

		MainWP_System::add_sub_left_menu(
			esc_attr_x( 'Activity Log', 'MainWP admin menu title', 'toolbar-extras-mainwp' ),
			'childsites_menu',
			'activity-log',
			esc_url( admin_url( 'admin.php?page=Extensions-Activity-Log-Mainwp' ) ),
			'<i class="fa fa-info-circle"></i>'
		);

	}  // end if

}  // end function


add_action( 'tbexmwp_before_settings_mainwp_view', 'ddw_tbexmwp_settings_before_view' );
/**
 * Add-On description and info on settings tab page.
 *
 * @since 1.0.0
 */
function ddw_tbexmwp_settings_before_view() {

	?>
		<div class="tbex-addon-header dashicons-before dashicons-networking">
			<h3 class="tbex-addon-title">
				<?php _e( 'Add-On', 'toolbar-extras-mainwp' ); ?>: <?php _e( 'Toolbar Extras for MainWP', 'toolbar-extras-mainwp' ); ?>
				<span class="tbex-version"><?php echo ( defined( 'TBEXMWP_PLUGIN_VERSION' ) ) ? 'v' . TBEXMWP_PLUGIN_VERSION : ''; ?></span>
			</h3>
			<p class="description">
				<?php echo sprintf(
					__( 'This Add-On brings the components of the %s to your Toolbar, including current active MainWP Add-Ons.', 'toolbar-extras-mainwp' ),
					'<a href="' . esc_url( admin_url( 'admin.php?page=mainwp_tab' ) ) . '">' . __( 'MainWP Dashboard', 'toolbar-extras-mainwp' ) . '</a>'
				); ?>
				<br /><?php _e( 'Below you will find plenty of settings to customize your experience to manage your websites with MainWP even faster.', 'toolbar-extras-mainwp' ); ?>
			</p>
		</div>
	<?php

}  // end function


add_action( 'tbex_plugins_settings_addons', 'ddw_tbexmwp_add_settings_tab_item_mainwp' );
/**
 * This will add the MainWP settings tab link item to Toolbar Extras' own
 *   settings group within the "Site Group".
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbexmwp_add_settings_tab_item_mainwp() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-settings-mainwp',
			'parent' => 'tbex-settings',
			'title'  => esc_attr_x( 'MainWP Add-On', 'For Toolbar Extras Plugin', 'toolbar-extras-mainwp' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=mainwp' ) ),
			'meta'   => array(
				'target' => '',
				/* translators: Title attribute for Toolbar Extras "MainWP Add-On" settings link */
				'title'  => esc_attr_x( 'MainWP Dashboard Add-On for Toolbar Extras', 'For Toolbar Extras Plugin', 'toolbar-extras-mainwp' )
			)
		)
	);

}  // end function


add_filter( 'tbex_filter_user_profile_buttons', 'ddw_tbexmwp_user_profile_button_mainwp' );
/**
 * Add own "MainWP" button to the Toolbar Extras section on the user profile
 *   page.
 *
 * @since 1.0.0
 *
 * @param array $settings_buttons Array of settings buttons.
 * @return array Modified array of settings buttons.
 */
function ddw_tbexmwp_user_profile_button_mainwp( $settings_buttons ) {

	$settings_buttons[ 'mainwp' ] = array(
		'title_attr' => esc_attr__( 'Go to the Toolbar Extras MainWP Add-On settings tab', 'toolbar-extras-mainwp' ),
		'label'      => _x( 'MainWP', 'Plugin settings tab title', 'toolbar-extras-mainwp' ),
		'dashicon'   => 'networking',
	);

	return $settings_buttons;

}  // end function


add_filter( 'tbex_filter_color_items', 'ddw_tbexmwp_add_color_item_mainwp' );
/**
 * Add additional MainWP color item to the color palette of "Local Development
 *   environment".
 *
 * @since 1.0.0
 *
 * @param array $color_items Array holding all color items.
 * @return array Modified array of color items.
 */
function ddw_tbexmwp_add_color_item_mainwp( $color_items ) {

	$color_items[ 'mainwp' ] = array(
		'color' => '#7fb100',
		'name'  => __( 'MainWP Green', 'toolbar-extras-mainwp' ),
	);

	return $color_items;

}  // end function
