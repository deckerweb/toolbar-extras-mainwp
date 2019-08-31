<?php

// includes/admin/views/settings-tab-mainwp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * 1) All SECTION INFOS callbacks (rendering)
 * -----------------------------------------------------------------------------
 */

/**
 * Tab MainWP - 1st settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbexmwp_settings_section_info_mainwp_items() {

	?>
		<p>
			<?php _e( 'Decide which components of the MainWP Dashboard you want to show as separate top-level items (groups) in the Toolbar.', 'toolbar-extras-mainwp' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab MainWP - 2nd settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbexmwp_settings_section_info_mainwp_tweaks() {

	?>
		<p>
			<?php _e( 'Set which additional WordPress core items should be removed or displayed, plus some other optional tweaks.', 'toolbar-extras-mainwp' ); ?>
		</p>
	<?php

}  // end function



/**
 * 2) All SETTING FIELDS callbacks (rendering)
 * -----------------------------------------------------------------------------
 */

/**
 * Settings field callback function for rendering drop-down select setting for a
 *   Toolbar item based on given option key, plus MainWP component.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 * @uses ddw_tbexmwp_string_show_component_toolbar_item()
 *
 * @param array $args Array of arguments passed in via setting field
 *                    declaration: 'option_key' - string of option key,
 *                    'component' - string of handle/key of MainWP component.
 * @return string Echoing markup for settings field.
 */
function ddw_tbexmwp_settings_cb_item_display( array $args ) {

	/** Sanitize given option key */
	$option_key = sanitize_key( $args[ 'option_key' ] );
	$component  = sanitize_key( $args[ 'component' ] );

	/** Get current option from database */
	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	/** Build the default string */
	$default_string = sprintf(
		__( 'Default: %s', 'toolbar-extras' ),
		'<code>' . ddw_tbex_string_yes() . '</code>'
	);

	/** Build the settings field's output */
	$output = sprintf(
		'<select name="tbex-options-mainwp[%1$s]" id="tbex-options-mainwp-%1$s">
			<option value="yes" %2$s>%3$s</option>
			<option value="no" %4$s>%5$s</option>
		</select>',
		$option_key,
		selected( sanitize_key( $tbexmwp_options[ $option_key ] ), 'yes', FALSE ),
		ddw_tbex_string_yes(),
		selected( sanitize_key( $tbexmwp_options[ $option_key ] ), 'no', FALSE ),
		ddw_tbex_string_no()
	);

	$output .= sprintf(
		'<label for="tbex-options-mainwp[%1$s]">
			<span class="description">%2$s</span>
		</label>',
		$option_key,
		$default_string
	);

	$output .= sprintf(
		'<p class="description">%s</p>',
		ddw_tbexmwp_string_show_component_toolbar_item( $component )
	);

	/** Finally, render settings field */
	echo $output;

}  // end function


/**
 * Settings field callback function for rendering Dashicons picker markup and
 *   logic for a Toolbar item, based on given option key, plus MainWP component.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_component_toolbar_default_icon()
 *
 * @param array $args Array of arguments passed in via setting field
 *                    declaration: 'option_key' - string of option key,
 *                    'default_icon' - string of Dashicons CSS class.
 * @return string Echoing markup for settings field.
 */
function ddw_tbexmwp_settings_cb_item_icon( array $args ) {

	/** Sanitize given option key */
	$option_key = sanitize_key( $args[ 'option_key' ] );

	/** Get current option from database */
	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	/** Current icon - for: current string */
	$current_icon = sprintf(
		'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
		$tbexmwp_options[ $option_key ]
	);

	/** Get the default icon */
	$default_icon = sanitize_html_class( $args[ 'default_icon' ] );

	/** Build the "current string" */
	$current_string = sprintf(
		/* translators: %s - a Dashicons CSS class name */
		__( 'Current: %s', 'toolbar-extras-mainwp' ),
		$current_icon
	);

	/** Build the "default string" */
	$default_string = sprintf(
		/* translators: %s - a Dashicons CSS class name */
		__( 'Default: %s', 'toolbar-extras-mainwp' ),
		'<code><span class="dashicons-before dashicons-' . $default_icon . '"></span> dashicons-' . $default_icon . '</code>'
	);

	/** Build the settings field's output */
	$output = sprintf(
		'<input class="regular-text" type="text" id="tbex-options-mainwp-%1$s" name="tbex-options-mainwp[%1$s]" value="%2$s" />
		<button class="button dashicons-picker" type="button" data-target="#tbex-options-mainwp-%1$s" value="%3$s" /><span class="dashicons-before dashicons-plus-alt"></span> %3$s</button>
		<br />',
		$option_key,
		strtolower( sanitize_html_class( $tbexmwp_options[ $option_key ] ) ),
		__( 'Choose Icon', 'toolbar-extras-mainwp' )
	);

	$output .= sprintf(
		'<label for="tbex-options-mainwp[%1$s]">
			<p class="description">
				%2$s
				<br />%3$s
			</p>
		</label>',
		$option_key,
		$current_string,
		$default_string
	);

	/** Finally, render settings field */
	echo $output;

}  // end function


/**
 * Settings field callback function for rendering text input field for a
 *   Toolbar item based on given option key, plus MainWP component.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_mainwp_component()
 * @uses ddw_tbexmwp_string_title_placeholder()
 *
 * @param array $args Array of arguments passed in via setting field
 *                    declaration: 'option_key' - string of option key,
 *                    'component' - string of handle/key of MainWP component.
 * @return string Echoing markup for settings field.
 */
function ddw_tbexmwp_settings_cb_item_name( array $args ) {

	/** Sanitize given option key */
	$option_key = sanitize_key( $args[ 'option_key' ] );

	/** Get current option from database */
	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	/** Build the "default string" */
	$default_string = sprintf(
		__( 'Default: %s', 'toolbar-extras-mainwp' ),
		'<code>' . ddw_tbexmwp_string_mainwp_component( sanitize_key( $args[ 'component' ] ) ) . '</code>'
	);

	/** Build the settings field's output */
	$output = sprintf(
		'<input type="text" class="regular-text" id="tbex-options-mainwp-%1$s" name="tbex-options-mainwp[%1$s]" placeholder="%4$s" value="%2$s" />
		<label for="tbex-options-mainwp[%1$s]">
			<span class="description">%3$s</span>
		</label>',
		$option_key,
		wp_filter_nohtml_kses( $tbexmwp_options[ $option_key ] ),
		$default_string,
		ddw_tbexmwp_string_title_placeholder()
	);

	/** Finally, render settings field */
	echo $output;

}  // end function


/**
 * Settings field callback function for rendering number input field for a
 *   Toolbar item based on given option key, plus priority.
 *
 * @since 1.0.0
 *
 * @param array $args Array of arguments passed in via setting field
 *                    declaration: 'option_key' - string of option key,
 *                    'priority' - integer of default priority for Toolbar item.
 * @return string Echoing markup for settings field.
 */
function ddw_tbexmwp_settings_cb_item_priority( array $args ) {

	/** Sanitize given option key */
	$option_key = sanitize_key( $args[ 'option_key' ] );

	/** Get current option from database */
	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	/** Build the "default string" */
	$default_string = sprintf(
		__( 'Default: %s', 'toolbar-extras-mainwp' ),
		'<code>' . absint( $args[ 'priority' ] ) . '</code>'
	);

	/** Build the settings field's output */
	$output = sprintf(
		'<input type="number" class="small-text" id="tbex-options-mainwp-%1$s" name="tbex-options-mainwp[%1$s]" value="%2$s" step="1" min="0" />
		<label for="tbex-options-mainwp[%1$s]">
			<span class="description">%3$s</span>
		</label>',
		$option_key,
		absint( $tbexmwp_options[ $option_key ] ),
		$default_string
	);

	/** Finally, render settings field */
	echo $output;

}  // end function


/**
 * Setting (Select): What to display as "Websites" title?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_websites_with_counter()
 * @uses ddw_tbexmwp_string_websites()
 */
function ddw_tbexmwp_settings_cb_mwp_item_title_websites() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	$websites_default = ( 'title_count' === $tbexmwp_options[ 'mwp_item_title_websites' ] ) ? ddw_tbexmwp_string_websites_with_counter() : ddw_tbexmwp_string_websites();

	$select_counter = sprintf(
		/* translators: %s - Counter and Website (1 Website OR 2 Websites) */
		esc_attr__( 'Counter &amp; Title: %s', 'toolbar-extras-mainwp' ),
		ddw_tbexmwp_string_websites_with_counter()
	);

	$select_title = sprintf(
		/* translators: %s - String "Websites" */
		esc_attr__( 'Title only: %s', 'toolbar-extras-mainwp' ),
		ddw_tbexmwp_string_websites()
	);

	?>
		<select name="tbex-options-mainwp[mwp_item_title_websites]" id="tbex-options-mainwp-mwp_item_title_websites">
			<option value="title_count" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_item_title_websites' ] ), 'title_count' ); ?>><?php echo $select_counter; ?></option>
			<option value="title" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_item_title_websites' ] ), 'title' ); ?>><?php echo $select_title; ?></option>
			<option value="custom" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_item_title_websites' ] ), 'custom' ); ?>><?php _e( 'Your own custom name', 'toolbar-extras-mainwp' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[mwp_item_title_websites]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), '<code>' . $websites_default . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display "Child Sites" as sub items for "Websites" top-level
 *   item?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_mwp_list_child_sites() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[mwp_list_child_sites]" id="tbex-options-mainwp-mwp_list_child_sites">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_list_child_sites' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_list_child_sites' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[mwp_list_child_sites]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'Enabling this feature gives you quick jump links for all your currently managed websites within MainWP: go to the site settings in MainWP, or just visit the site\'s own WP-Admin Dashboard, or easily visit the site\'s homepage.', 'toolbar-extras-mainwp' ); ?>
		</p>
		<p class="description">
			<?php _e( 'Note: If you have many child sites set up this will result in a very long list of sub items. In that case you maybe want to disable this feature here.', 'toolbar-extras-mainwp' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Which Admin URL variant for Child Sites?
 *   item?
 *
 * @since 1.1.0
 */
function ddw_tbexmwp_settings_cb_mwp_child_admin_url() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[mwp_child_admin_url]" id="tbex-options-mainwp-mwp_child_admin_url">
			<option value="mainwp" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_child_admin_url' ] ), 'mainwp' ); ?>><?php _e( 'MainWP-generated URL with automatic Admin login', 'toolbar-extras-mainwp' ); ?></option>
			<option value="regularwp" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_child_admin_url' ] ), 'regularwp' ); ?>><?php _e( 'Regular WP-Admin URL', 'toolbar-extras-mainwp' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[mwp_child_admin_url]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), '<code>' . __( 'MainWP-generated URL', 'toolbar-extras-mainwp' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'If you do not want the automatic login feature by MainWP then please set to the regular WP variant and login manually yourself.', 'toolbar-extras-mainwp' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display "Groups" as sub items for "Websites" top-level item?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_mwp_list_groups() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[mwp_list_groups]" id="tbex-options-mainwp-mwp_list_groups">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_list_groups' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_list_groups' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[mwp_list_groups]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'Enabling this feature gives you quick jump links for all groups you have setup within MainWP: this helps filtering your list of websites (child sites).', 'toolbar-extras-mainwp' ); ?>
		</p>
		<p class="description">
			<?php _e( 'Note: If you have many groups set up this will result in a very long list of sub items. In that case you maybe want to disable this feature here.', 'toolbar-extras-mainwp' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display "Statuses" as sub items for "Websites" top-level item?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_mwp_list_statuses() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[mwp_list_statuses]" id="tbex-options-mainwp-mwp_list_statuses">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_list_statuses' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'mwp_list_statuses' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[mwp_list_statuses]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'Enabling this feature gives you quick jump links for all statuses within MainWP: this helps filtering your list of websites (child sites).', 'toolbar-extras-mainwp' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display "Build" group of Toolbar Extras?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_remove_tbex_build_group() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[remove_tbex_build_group]" id="tbex-options-mainwp-remove_tbex_build_group">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_tbex_build_group' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_tbex_build_group' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[remove_tbex_build_group]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display "Manage Content" items of Toolbar Extras?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_remove_tbex_manage_content() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[remove_tbex_manage_content]" id="tbex-options-mainwp-remove_tbex_manage_content">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_tbex_manage_content' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_tbex_manage_content' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[remove_tbex_manage_content]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display "WP Widgets" items of Toolbar Extras?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_remove_tbex_wpwidgets() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[remove_tbex_wpwidgets]" id="tbex-options-mainwp-remove_tbex_wpwidgets">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_tbex_wpwidgets' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_tbex_wpwidgets' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[remove_tbex_wpwidgets]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display "Comments" item of WordPress core?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_remove_wp_comments() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[remove_wp_comments]" id="tbex-options-mainwp-remove_wp_comments">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wp_comments' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wp_comments' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[remove_wp_comments]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display "Site" group of WordPress core?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_remove_wp_site_group() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[remove_wp_site_group]" id="tbex-options-mainwp-remove_wp_site_group">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wp_site_group' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wp_site_group' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[remove_wp_site_group]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display "Updates" item of WordPress core?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_remove_wp_updates() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[remove_wp_updates]" id="tbex-options-mainwp-remove_wp_updates">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wp_updates' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wp_updates' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[remove_wp_updates]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display "New Content" group of WordPress core?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_remove_wp_newcontent() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[remove_wp_newcontent]" id="tbex-options-mainwp-remove_wp_newcontent">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wp_newcontent' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wp_newcontent' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[remove_wp_newcontent]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display "Blocks" left-hand admin menu?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_remove_wpblocks_admin_menu() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[remove_wpblocks_admin_menu]" id="tbex-options-mainwp-remove_wpblocks_admin_menu">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wpblocks_admin_menu' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'remove_wpblocks_admin_menu' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[remove_wpblocks_admin_menu]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Unload the MainWP translations? (including all Add-Ons)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_unload_td_mainwp() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[unload_td_mainwp]" id="tbex-options-mainwp-unload_td_mainwp">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'unload_td_mainwp' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'unload_td_mainwp' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[unload_td_mainwp]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak unloads the translations for MainWP Dashboard, plus all current active MainWP Add-Ons. So all strings fall back to their English default strings.', 'toolbar-extras-mainwp' ); ?>
		</p>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - text domain strings, for example 'mainwp' */
				__( 'Effected text domains: %s', 'toolbar-extras-mainwp' ),
				'<code>mainwp</code>, ' . __( 'plus those from active add-ons', 'toolbar-extras-mainwp' )
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Unload the Toolbar Extras for MainWP translations?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_yes()
 * @uses ddw_tbex_string_no()
 */
function ddw_tbexmwp_settings_cb_unload_td_tbexmwp() {

	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	?>
		<select name="tbex-options-mainwp[unload_td_tbexmwp]" id="tbex-options-mainwp-unload_td_tbexmwp">
			<option value="yes" <?php selected( sanitize_key( $tbexmwp_options[ 'unload_td_tbexmwp' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbexmwp_options[ 'unload_td_tbexmwp' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-mainwp[unload_td_tbexmwp]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras-mainwp' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak unloads the translations for Toolbar Extras for MainWP Add-On, so it falls back to the English default strings.', 'toolbar-extras-mainwp' ); ?>
		</p>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - a text domain string, 'toolbar-extras-mainwp' */
				__( 'Effected text domain: %s', 'toolbar-extras-mainwp' ),
				'<code>toolbar-extras-mainwp</code>'
			); ?>
		</p>
	<?php

}  // end function
