<?php

function my_custom_admin_scripts() {
	wp_enqueue_script('acf-custom-js', get_template_directory_uri() . '/app/states/UpdateTipologia.js', array('jquery'), null, true);
	wp_localize_script('acf-custom-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('admin_enqueue_scripts', 'my_custom_admin_scripts');