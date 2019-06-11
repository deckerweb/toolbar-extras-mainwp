<?php

// includes/functions-global

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Helper: Build Toolbar item title with needed HTML/CSS Code for a Dashicon.
 *   The icon is set dynamically via the plugin's settings.
 *
 * @since 1.0.0
 *
 * @param string $icon   Unique identifier for a Dashicon icon.
 * @param string $string Title string of item.
 * @return string HTML markup, including icon plus item title.
 */
function ddw_tbexmwp_item_title_with_dashicon( $icon = '', $string = '' ) {

	$output = sprintf(
		'<span class="dashicons-before dashicons-%1$s ab-icon"></span><span class="ab-label">%2$s</span>',
		sanitize_html_class( $icon ),
		esc_attr( $string )
	);

	return apply_filters(
		'tbexmwp_filter_item_title_with_dashicon',
		$output,
		$icon,		// additional param
		$string		// additional param
	);

}  // end function


/**
 * Get the filterable hook priority for the top-level Toolbar item of a MainWP
 *   component.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @param string $component String of MainWP component handle/key.
 * @return int Hook priority for the top-level Toolbar item.
 */
function ddw_tbexmwp_item_priority( $component = '' ) {

	$component = sanitize_key( $component );

	return absint(
		apply_filters(
			'tbexmwp_filter_item_priority',
			ddw_tbex_get_option( 'mainwp', 'mwp_item_priority_' . $component ),
			$component	// additional param
		)
	);

}  // end function


/**
 * Get the filterable label name for the top-level Toolbar item of a MainWP
 *   component.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 * @uses ddw_tbexmwp_string_websites_with_counter()
 *
 * @param string $component String of MainWP component handle/key.
 * @return string Filterable, translateable string for top-level Toolbar item.
 */
function ddw_tbexmwp_item_name( $component = '' ) {

	$component = sanitize_key( $component );

	$label_name = ddw_tbex_get_option( 'mainwp', 'mwp_item_name_' . $component );
	
	if ( 'websites' === $component ) {
		$label_name = empty( $label_name ) ? ddw_tbexmwp_string_websites_with_counter() : $label_name;
	}

	return esc_attr(
		apply_filters(
			'tbexmwp_filter_item_name',
			$label_name,
			$component	// additional param
		)
	);

}  // end function


/**
 * Build additional MainWP component title/info, to be placed above settings
 *   field title. - Only used for the first (of four) settings field for a
 *   component.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_mainwp_component()
 *
 * @param string $component String of handle/key of MainWP component.
 * @return string Echoing markup, placing above settings field title.
 */
function ddw_tbexmwp_settings_mainwp_component_title( $component = '' ) {

	/** Sanitize given option key */
	$component = sanitize_key( $component );

	/** Get current option from database */
	$tbexmwp_options = get_option( 'tbex-options-mainwp' );

	$output = sprintf(
		'<div class="tbexmwp-component-block" title="%1$s"><span class="dashicons-before %2$s"></span> %3$s</div>',
		esc_attr__( 'MainWP Component', 'toolbar-extras-mainwp' ),
		$tbexmwp_options[ 'mwp_item_icon_' . $component ],
		ddw_tbexmwp_string_mainwp_component( $component )
	);

	/** Return the output */
	return $output;

}  // end function


/**
 * Get all MainWP Child Sites (Websites) that are setup in the MainWP Dashboard.
 *
 * @since 1.0.0
 *
 * @uses MainWP_DB::Instance()
 *
 * @global object $GLOBALS[ 'wpdb' ]
 *
 * @return object $websites All setup MainWP Child Sites (Websites).
 */
function ddw_tbexmwp_get_mainwp_websites() {

	/** Bail early if MainWP classes don't exist */
	if ( ! class_exists( 'MainWP_DB' ) || ! class_exists( 'MainWP_Utility' ) ) {
		return null;
	}

	/**
	 * Necessary MainWP database request to get Child Sites data
	 * @see MainWP class MainWP_System, plugin file: /mainwp/class/class-mainwp-system.php
	 * @since 1.0.0
	 */
	$where         = MainWP_DB::Instance()->getWhereAllowAccessSites( 'wp' );
	$options_extra = MainWP_DB::Instance()->getSQLWebsitesOptionsExtra();
	$websites      = $GLOBALS[ 'wpdb' ]->get_results( 'SELECT wp.id,wp.name,wp.url,wp.siteurl' . $options_extra . ' FROM `' . $GLOBALS[ 'wpdb' ]->prefix . 'mainwp_wp` wp WHERE 1 ' . $where );

	return $websites;

}  // end function


/**
 * Build Toolbar nodes for Child Sites that are setup for logging. This function
 *   allows adding those nodes/items on more than one place, therefore the use
 *   of $context parameter to set different IDs and Parent-IDs per node/item.
 *
 * @since 1.0.0
 *
 * @uses MainWP_Utility::get_favico_url()
 * @uses MainWP_Utility::getNiceURL()
 *
 * @global object $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $website
 * @param string $context Context to display the Toolbar items in.
 * @return object Toolbar node.
 */
function ddw_tbexmwp_nodes_activity_logs( $website, $context = '' ) {

	$site_id     = absint( $website->id );
	$site_name   = esc_attr( $website->name );
	$id          = '';
	$parent      = '';
	$title       = '';
	$title_attr  = '';
	$class       = '';
	$favicon_url = '';
	$favicon_img = '';
	$icon_title  = '';

	/** Get website favicon specifics */
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

	/** Set the values depending on Toolbar context */
	switch ( sanitize_key( $context ) ) {

		case 'websites':
			$id         = 'my-mainwp-sites-' . $site_id . '-auditlogs';
			$parent     = 'group-mymainwp-' . $site_id . '-logs';
			$title      = esc_attr__( 'Activity Logs', 'toolbar-extras-mainwp' );
			$title_attr = $title . ': ' . $site_name;
			break;
		
		case 'extension':
			$id         = 'mwp-ext-activitylog-website-' . $site_id;
			$parent     = 'mwp-ext-activitylog-websites';
			$title      = $icon_title;
			$title_attr = esc_attr__( 'Activity Logs', 'toolbar-extras-mainwp' ) . ': ' . $site_name;
			$class      = 'tbexmwp-childsite';
			break;

		default:
			# code...
			break;

	}  // end switch

	/** Setup the Toolbar node based on the values */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => $id,
			'parent' => $parent,
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=Extensions-Activity-Log-Mainwp&mwpal-site-id=' . $site_id . '&paged=1' ) ),
			'meta'   => array(
				'class'  => $class,
				'title'  => $title_attr
			)
		)
	);

}  // end function


/**
 * Setting internal plugin helper values.
 *
 * @since 1.0.0
 *
 * @return array $tbexmwp_info Array of info values.
 */
function ddw_tbexmwp_info_values() {

	$tbexmwp_info = array(

		'url_translate'     => 'https://translate.wordpress.org/projects/wp-plugins/toolbar-extras-mainwp',
		'url_wporg_faq'     => 'https://wordpress.org/plugins/toolbar-extras-mainwp/#faq',
		'url_wporg_forum'   => 'https://wordpress.org/support/plugin/toolbar-extras-mainwp',
		'url_wporg_review'  => 'https://wordpress.org/support/plugin/toolbar-extras-mainwp/reviews/?filter=5/#new-post',
		'url_snippets'      => 'https://toolbarextras.com/docs-category/custom-code-snippets/',
		'first_code'        => '2018',
		'url_plugin'        => 'https://toolbarextras.com/addons/mainwp-dashboard/',
		'url_plugin_docs'   => 'https://toolbarextras.com/docs-category/mainwp-addon/',
		'url_plugin_faq'    => 'https://toolbarextras.com/docs-category/faqs/',
		'url_github'        => 'https://github.com/deckerweb/toolbar-extras-mainwp',
		'url_github_issues' => 'https://github.com/deckerweb/toolbar-extras-mainwp/issues',

	);  // end of array

	return $tbexmwp_info;

}  // end function
