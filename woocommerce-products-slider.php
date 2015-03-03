<?php
/*
Plugin Name: Woocommerce Products Slider
Plugin URI: http://paratheme.com/items/woocommerce-product-slider-for-wordpress/
Description: Fully responsive and mobile ready Carousel Slider for your woo-commerce product. unlimited slider anywhere via short-codes and easy admin setting.
Version: 1.4
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('wcps_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('wcps_plugin_dir', plugin_dir_path( __FILE__ ) );
define('wcps_wp_url', 'https://wordpress.org/plugins/woocommerce-products-slider/' );
define('wcps_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/woocommerce-products-slider' );
define('wcps_pro_url','http://paratheme.com/items/woocommerce-product-slider-for-wordpress/' );
define('wcps_demo_url', 'product-slider.com' );
define('wcps_conatct_url', 'http://paratheme.com/contact/' );
define('wcps_qa_url', 'http://paratheme.com/qa/' );
define('wcps_plugin_name', 'Woocommerce Products Slider' );
define('wcps_share_url', 'https://wordpress.org/plugins/woocommerce-products-slider/' );
define('wcps_tutorial_video_url', '//www.youtube.com/embed/B0sOSp3h9fE?rel=0' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/wcps-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/wcps-functions.php');


//Themes php files

require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/rossi/index.php');



function wcps_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('wcps_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		
		//wp_localize_script('wcps_js', 'wcps_ajax', array( 'wcps_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('wcps_style', wcps_plugin_url.'css/style.css');

		wp_enqueue_script('owl.carousel', plugins_url( '/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_style('owl.carousel', wcps_plugin_url.'css/owl.carousel.css');
		wp_enqueue_style('owl.theme', wcps_plugin_url.'css/owl.theme.css');
		
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wcps_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		//ParaAdmin
		wp_enqueue_style('ParaAdmin', wcps_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		//wp_enqueue_style('ParaIcons', wcps_plugin_url.'ParaAdmin/css/ParaIcons.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
		
		// Style for themes
		wp_enqueue_style('wcps-style-flat', wcps_plugin_url.'themes/flat/style.css');			
		wp_enqueue_style('wcps-style-rossi', wcps_plugin_url.'themes/rossi/style.css');

	}
add_action("init","wcps_init_scripts");



add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' ); // to work upload button
add_filter('widget_text', 'do_shortcode'); //shoer-code support into sidebar.


register_activation_hook(__FILE__, 'wcps_activation');


function wcps_activation()
	{
		$wcps_version= "1.4";
		update_option('wcps_version', $wcps_version); //update plugin version.
		
		$wcps_customer_type= "free"; //customer_type "free"
		update_option('wcps_customer_type', $wcps_customer_type); //update plugin version.

	}


function wcps_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];

			$wcps_themes = get_post_meta( $post_id, 'wcps_themes', true );

			$wcps_display ="";

			if($wcps_themes== "flat")
				{
					$wcps_display.= wcps_body_flat($post_id);
				}
				
			else if($wcps_themes== "rossi")
				{
					$wcps_display.= wcps_body_rossi($post_id);
				}				
				
			else
				{
					$wcps_display.= wcps_body_flat($post_id);
				}				

return $wcps_display;



}

add_shortcode('wcps', 'wcps_display');




add_action('admin_menu', 'wcps_menu_init');

function wcps_menu_settings(){
	include('wcps-settings.php');	
}

function wcps_menu_init() {
	add_submenu_page('edit.php?post_type=wcps', __('Settings','menu-wpt'), __('Settings','menu-wpt'), 'manage_options', 'wcps_menu_settings', 'wcps_menu_settings');	
		

}






?>