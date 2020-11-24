<?php

// includes/string-switcher

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Build string for given MainWP component handle/key.
 *
 * @since 1.0.0
 *
 * @param string $component String of MainWP component handle/key.
 * @return string Translateable label of MainWP component for display.
 */
function ddw_tbexmwp_string_mainwp_component( $component = '' ) {

	/** Switch the different component types, set labels */
	switch ( sanitize_key( $component ) ) {

		case 'dashboard':
			$label = _x( 'My MainWP', 'MainWP component title', 'toolbar-extras-mainwp' );	// Dashboard
			break;
		case 'updates':
			$label = _x( 'Updates', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;
		case 'addnew':
			$label = _x( 'Add', 'MainWP component title', 'toolbar-extras-mainwp' );	// Add New
			break;
		case 'websites':
			$label = _x( 'Websites', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;
		case 'content':
			$label = _x( 'Content', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;
		case 'plugins':
			$label = _x( 'Plugins', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;
		case 'themes':
			$label = _x( 'Themes', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;
		case 'users':
			$label = _x( 'Users', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;
		case 'extensions':
			$label = _x( 'Extensions', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;
		case 'settings':
			$label = _x( 'Settings', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;
		case 'server':
			$label = _x( 'Server Info', 'MainWP component title', 'toolbar-extras-mainwp' );
			break;

	}  // end switch

	/** Return label string for chosen component */
	return $label;

}  // end function


/**
 * Build settings section string for:
 *   "{MainWP component} - Display?"
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_mainwp_component()
 *
 * @param string $component String of given MainWP component.
 * @param string $markup    Flag string to set optional markup output.
 * @return string Translateable full string for use in settings section.
 */
function ddw_tbexmwp_string_item_display( $component = '', $markup = '' ) {

	$string = sprintf(
		/* translators: %s - Name of MainWP component, for example "Dashboard" */
		__( '%s - Display?', 'toolbar-extras-mainwp' ),
		esc_attr( ddw_tbexmwp_string_mainwp_component( sanitize_key( $component ) ) )
	);

	$output = sprintf(
		'<div class="tbex-setting-field-title">%s</div>',
		$string
	);

	return ( 'class' === sanitize_key( $markup ) ) ? $output : $string;

}  // end function


/**
 * Build settings section string for:
 *   "{MainWP component} - Icon"
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_mainwp_component()
 *
 * @param string $component String of given MainWP component.
 * @return string Translateable full string for use in settings section.
 */
function ddw_tbexmwp_string_item_icon( $component = '' ) {

	return sprintf(
		/* translators: %s - Name of MainWP component, for example "Dashboard" */
		__( '%s - Icon', 'toolbar-extras-mainwp' ),
		esc_attr( ddw_tbexmwp_string_mainwp_component( sanitize_key( $component ) ) )
	);

}  // end function


/**
 * Build settings section string for:
 *   "{MainWP component} - Name"
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_mainwp_component()
 *
 * @param string $component String of given MainWP component.
 * @return string Translateable full string for use in settings section.
 */
function ddw_tbexmwp_string_item_name( $component = '' ) {

	return sprintf(
		/* translators: %s - Name of MainWP component, for example "Dashboard" */
		__( '%s - Name', 'toolbar-extras-mainwp' ),
		esc_attr( ddw_tbexmwp_string_mainwp_component( sanitize_key( $component ) ) )
	);

}  // end function


/**
 * Build settings section string for:
 *   "{MainWP component} - Priority"
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_mainwp_component()
 *
 * @param string $component String of given MainWP component.
 * @return string Translateable full string for use in settings section.
 */
function ddw_tbexmwp_string_item_priority( $component = '' ) {

	return sprintf(
		/* translators: %s - Name of MainWP component, for example "Dashboard" */
		__( '%s - Priority', 'toolbar-extras-mainwp' ),
		esc_attr( ddw_tbexmwp_string_mainwp_component( sanitize_key( $component ) ) )
	);

}  // end function


/**
 * Build settings section description string for:
 *   "Show the {MainWP component} component as top-level Toolbar item."
 *
 * @since 1.0.0
 *
 * @uses ddw_tbexmwp_string_mainwp_component()
 *
 * @param string $component String of handle/key of MainWP component.
 * @return string Translateable string for display in settings section.
 */
function ddw_tbexmwp_string_show_component_toolbar_item( $component = '' ) {

	return sprintf(
		/* translators: %s - Name of MainWP component, for example "Dashboard" */
		__( 'Show the %s component as top-level Toolbar item.', 'toolbar-extras-mainwp' ),
		ddw_tbexmwp_string_mainwp_component( sanitize_key( $component ) )
	);

}  // end function


/**
 * Build MainWP component title for the Websites (Child Sites) component,
 *   including the number of currently maintained sites in MainWP Dashboard.
 *
 * @since 1.0.0
 *
 * @uses MainWP_DB::Instance()->getWebsitesCount()
 *
 * @return string Translateable singular/pluaral string.
 */
function ddw_tbexmwp_string_websites_with_counter() {

	/** Bail early if no MainWP Websites count available */
	if ( ! class_exists( 'MainWP_DB' ) ) {
		return;
	}

	$sites_count = absint( \MainWP\Dashboard\MainWP_DB_Common::Instance()->get_websites_count() );
//	$sites_count = absint( MainWP_DB::Instance()->getWebsitesCount() );

	$title_websites = sprintf(
		/* translators: %s - Count of Child Websites maintained in MainWP Dashboard */
		_nx(
			'%s Website',
			'%s Websites',
			$sites_count,
			'MainWP component title',
			'toolbar-extras-mainwp'
		),
		$sites_count
	);

	return esc_attr( $title_websites );

}  // end function


/**
 * Build string "Websites".
 *
 * @since 1.0.0
 *
 * @return string Translateable string.
 */
function ddw_tbexmwp_string_websites() {

	return esc_attr_x( 'Websites', 'MainWP component title', 'toolbar-extras-mainwp' );

}  // end function


/**
 * Input placeholder string for MainWP component title label.
 *
 * @since 1.0.0
 *
 * @return string Translateable placeholder string for input field.
 */
function ddw_tbexmwp_string_title_placeholder() {

	return esc_attr__( 'Set component Toolbar title', 'toolbar-extras-mainwp' );

}  // end function


/**
 * Build string "Official Extension Documentation".
 *
 * @since 1.0.0
 *
 * @return string Translateable and filterable string.
 */
function ddw_tbexmwp_string_extension_docs() {

	return esc_attr(
		apply_filters(
			'tbexmwp_filter_string_extension_docs',
			__( 'Official Extension Documentation', 'toolbar-extras-mainwp' )
		)
	);

}  // end function
