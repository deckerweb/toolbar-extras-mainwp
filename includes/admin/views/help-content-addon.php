<?php

// includes/admin/views/help-content-addon

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * View: Content of the help tab.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_info_values()
 * @uses ddw_tbex_get_info_link()
 * @uses ddw_tbex_get_info_url()
 * @uses ddw_tbex_coding_years()
 */
function ddw_tbexmwp_help_tab_content() {

	$tbex_info = (array) ddw_tbex_info_values();

	$tbexmwp_space_helper = '<div style="height: 10px;"></div>';

	/** Content: Toolbar Extras for MainWP addon plugin */
	echo '<h3>' . __( 'Plugin', 'toolbar-extras-mainwp' ) . ': ' . __( 'Toolbar Extras for MainWP', 'toolbar-extras-mainwp' ) . ' <small class="tbexmwp-help-version">v' . TBEXMWP_PLUGIN_VERSION . '</small></h3>';


	/** Recommended usage + plugins */
	echo '<p>' . __( 'General recommendation is to use MainWP Dashboard plugin on a single WordPress install which is only used for managing your websites via MainWP. For such a setup this Toolbar Extras Add-On is perfectly suited.', 'toolbar-extras-mainwp' ) . '</p>';

	$plugin_manager = sprintf(
		'<a href="%1$s">%2$s</a>',
		esc_url( admin_url( 'plugins.php?page=toolbar-extras-mainwp-suggested-plugins' ) ),
		__( 'plugins suggestions manager', 'toolbar-extras-mainwp' )
	);

	if ( current_user_can( 'install_plugins' ) ) {

		echo sprintf( 
			'<p>' . __( 'To further protect your Dashboard Site it is recommended to tweak a few more things: completely disable comments, restrict the install to login only, and also to protect the login form itself. These are basic security tasks anyways. Great plugins for that are %1$s, %2$s and %3$s. Easily install and activate them via our %4$s if not already done (or using similar alternatives).', 'toolbar-extras-mainwp' ) . '</p>',
			'<em>Disable Comments</em>',
			'<em>Members</em>',
			'<em>Limit Login Attempts Reloaded</em>',
			$plugin_manager
		);

	}  // end if


	/** Support notice */
	echo sprintf(
		'<p class="description">' . __( 'Please note, the %1$s Add-On plugin is not officially endorsed by %2$s. It is an independently developed solution by the community for the community. Therefore our support is connected to the Add-On itself, to the Toolbar and the things around it, not the inner meanings of %2$s.', 'toolbar-extras-mainwp' ) . '</p>',
		__( 'Toolbar Extras for MainWP', 'toolbar-extras-mainwp' ),
		__( 'MainWP', 'toolbar-extras-mainwp' )
	);

	/** Further help content */
	echo $tbexmwp_space_helper . '<p><h4 style="font-size: 1.1em;">' . __( 'Important plugin links:', 'toolbar-extras-mainwp' ) . '</h4>' .

		ddw_tbex_get_info_link( 'url_plugin', esc_html__( 'Plugin website', 'toolbar-extras-mainwp' ), 'button', 'mainwp' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link(
			'url_plugin_faq',
			esc_html_x( 'FAQ', 'Help tab info', 'toolbar-extras-mainwp' ),
			'button',
			'mainwp'
		) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link(
			'url_wporg_forum',
			esc_html_x( 'Support', 'Help tab info', 'toolbar-extras-mainwp' ),
			'button',
			'mainwp'
		) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link(
			'url_fb_group',
			esc_html_x( 'Facebook Group', 'Help tab info', 'toolbar-extras-mainwp' ),
			'button'
		) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link(
			'url_translate',
			esc_html_x( 'Translations', 'Help tab info', 'toolbar-extras-mainwp' ),
			'button',
			'mainwp'
		) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link(
			'url_donate',
			esc_html_x( 'Donate', 'Help tab info', 'toolbar-extras-mainwp' ),
			'button button-primary'
		) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link(
			'url_newsletter',
			esc_html_x( 'Join our Newsletter', 'Help tab info', 'toolbar-extras-mainwp' ),
			'button button-primary tbex'
		) .

		sprintf(
			'<p><a href="%1$s" target="_blank" rel="nofollow noopener noreferrer" title="%2$s">%2$s</a> &#x000A9; %3$s <a href="%4$s" target="_blank" rel="noopener noreferrer" title="%5$s">%5$s</a></p>',
			ddw_tbex_get_info_url( 'url_license' ),
			esc_attr( $tbex_info[ 'license' ] ),
			ddw_tbex_coding_years( '', 'mainwp' ),
			esc_url( $tbex_info[ 'author_uri' ] ),
			esc_html( $tbex_info[ 'author' ] )
		);

}  // end function
