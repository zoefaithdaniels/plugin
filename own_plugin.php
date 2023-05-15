<?php

/*
 * Plugin Name:       My Own Plugin
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zoe Daniels
 */

 // Remove the admin bar from the front end
 function donate_shortcode( $atts, $content = null) {
    global $post;extract(shortcode_atts(array(
    'account' => 'your-paypal-email-address',
    'for' => $post->post_title,
    'onHover' => '',
    ), $atts));
    if(empty($content)) $content='Make A Donation';
    return '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation for '.$for.'" title="'.$onHover.'">'.$content.'</a>';
    }
    add_shortcode('donate', 'donate_shortcode');

add_action( 'admin_menu', 'wporg_options_page' );
    function wporg_options_page() {
        add_menu_page(
          'Paypal',
          'Paypal Options',
          'manage_options',
          'wporg',
           plugin_dir_path(__FILE__) . 'admin/view.php',
           null,
           20
        );
    }
