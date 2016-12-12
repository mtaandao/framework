<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => 'MN ' . __( 'Recent Posts' ),
	'base' => 'vc_mn_posts',
	'icon' => 'icon-wpb-mn',
	'category' => __( 'Mtaandao Widgets', 'js_composer' ),
	'class' => 'wpb_vc_mn_widget',
	'weight' => - 50,
	'description' => __( 'The most recent posts on your site', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'js_composer' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
			'value' => __( 'Recent Posts' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of posts', 'js_composer' ),
			'description' => __( 'Enter number of posts to display.', 'js_composer' ),
			'param_name' => 'number',
			'value' => 5,
			'admin_label' => true,
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Display post date?', 'js_composer' ),
			'param_name' => 'show_date',
			'value' => array( __( 'Yes', 'js_composer' ) => true ),
			'description' => __( 'If checked, date will be displayed.', 'js_composer' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
		),
	),
);
