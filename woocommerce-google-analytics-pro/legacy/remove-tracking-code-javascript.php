<?php // only copy this line if needed

/**
 * Remove the tracking code added by WooCommerce Google Analytics Pro (pre-1.5.1 only)
 *
 * This is usefull if your theme or another plugin is adding the tracking code
 * and you wish to use that instead
 *
 * Note: Only use this code if you're running a version older than v1.5.1
 */
function sv_wc_google_analytics_pro_remove_tracking_code() {

	// check if Google Analytics Pro is active
	if ( ! function_exists( 'wc_google_analytics_pro' ) ) {
		return;
	}

	remove_action( 'wp_head',    array( wc_google_analytics_pro()->get_integration(), 'ga_tracking_code' ), 9 );
	remove_action( 'login_head', array( wc_google_analytics_pro()->get_integration(), 'ga_tracking_code' ), 9 );
}

add_action( 'init', 'sv_wc_google_analytics_pro_remove_tracking_code' );


/**
 * Remove the pageview tracking added by WooCommerce Google Analytics Pro
 *
 * This is usefull if your theme or another plugin is tracking pageviews already
 *
 * Note: Don't add this code if you've not sure if your current Google Analytics
 * solution is tracking pageviews
 */
function sv_wc_google_analytics_pro_remove_pageviews() {

	// check if Google Analytics Pro is active
	if ( ! function_exists( 'wc_google_analytics_pro' ) ) {
		return;
	}

	remove_action( 'wp_head', array( wc_google_analytics_pro()->get_integration(), 'pageview' ) );
}

add_action( 'init', 'sv_wc_google_analytics_pro_remove_pageviews' );
