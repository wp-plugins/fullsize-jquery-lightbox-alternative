<?php
/*
Plugin Name: Fullsize jQuery Plugin
Plugin URI: http://www.onigoetz.ch/plugins/wordpress-jquery-fullsize-plugin/
Description: Used to overlay images on the current page. jQuery required
Version: 0.6.1
Author: Stéphane Goetz
Author URI: http://www.onigoetz.ch
*/

/* options page */
$options_page = get_option('siteurl') . '/wp-admin/admin.php?page=fullsize/options.php';


add_action('wp_head', 'fullsize_styles');
register_activation_hook( __FILE__, 'fullsize_install');

add_action('admin_menu', 'fullsize_options_page');





if (!strstr($_SERVER['REQUEST_URI'], 'wp-admin')) { // if we are *not* viewing an admin page, like writing a post or making a page:
	wp_enqueue_script('fullsize', (get_bloginfo('wpurl')."/wp-content/plugins/fullsize-jquery-lightbox-alternative/jquery.fullsize.pack.js"), array('jquery'), '1.0');
}

function fullsize_install(){
    $default_options = array(
        'shadow' => true,
        'zoomInSpeed' => 200,
        'zoomOutSpeed' => 200,
        'fadeInSpeed' => 250,
        'fadeOutSpeed' => 250,
		'leftOffset' => 0,
		'topOffset' => 0,
        'iconOffset' => 8,
        'forceTitleBar' => false,
        'extraTrigger' => '',
        'parentSteps' => 0
    );
    add_option('fullsize_plugin', $default_options);
}

function fullsize_options_page() {
	add_options_page('Fullsize Options', 'Fullsize', 10, 'fullsize-jquery-lightbox-alternative/options.php');
}

function fullsize_styles() {
    $fullsize_path =  get_bloginfo('wpurl')."/wp-content/plugins/fullsize-jquery-lightbox-alternative/";

    $default_options = array(
        'shadow' => true,
        'zoomInSpeed' => 200,
        'zoomOutSpeed' => 200,
        'fadeInSpeed' => 250,
        'fadeOutSpeed' => 250,
		'leftOffset' => 0,
		'topOffset' => 0,
        'iconOffset' => 8,
        'forceTitleBar' => false,
        'extraTrigger' => '',
        'parentSteps' => 0
    );

    $options = get_option('fullsize_plugin');
    $final = array();
    foreach($default_options as $key => $option){
        if($options[$key] != $option){
            $final[$key] = $options[$key];
        }
    }

echo json_encode($final);


	echo '
	<!-- begin fullsize elements -->
	<link rel="stylesheet" href="'.$fullsize_path.'fullsize.css" type="text/css" media="screen" />

    <script type="text/javascript">
    jQuery(document).ready(function(){';
	if(count($final) != 0){
		echo 'jQuery("img").fullsize('.json_encode($final).');';
	} else {
		echo 'jQuery("img").fullsize();';
	}
        
    echo '});
    </script>
	<!-- end fullsize elements -->'."\n";
}

