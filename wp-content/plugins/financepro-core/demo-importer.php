<?php
add_action( 'plugins_loaded', 'financepro_core_load_demo_importer', 15 );
function financepro_core_load_demo_importer(){
	add_filter( 'plugin_action_links_rt-demo-importer/rt-demo-importer.php', 'financepro_core_importer_add_action_links' );
	add_filter( 'fw:ext:backups-demo:demos', 'financepro_core_importer_backups_demos' );
	add_action( 'fw:ext:backups:tasks:success:id:demo-content-install', 'financepro_core_importer_after_demo_install' );
}

function financepro_core_importer_add_action_links( $links ) {
	$mylinks = array(
		'<a href="' . esc_url( admin_url( 'tools.php?page=fw-backups-demo-content' ) ) . '">'.__( 'Install Demo Contents', 'financepro-core' ).'</a>',
	);
	return array_merge( $links, $mylinks );
}

function financepro_core_importer_backups_demos( $demos ) {
	$demos_array = array(
		'demo1' => array(
			'title' => __( 'Home 1', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/',
		),
		'demo2' => array(
			'title' => __( 'Home 2', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-2/',
		),
		'demo3' => array(
			'title' => __( 'Home 3', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-3/',
		),
		'demo4' => array(
			'title' => __( 'Home 4', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-4/',
		),
		'demo5' => array(
			'title' => __( 'Home 5', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-5/',
		),
		'demo6' => array(
			'title' => __( 'Home 6', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-6/',
		),
		'demo7' => array(
			'title' => __( 'Home 1 (Onepage)', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-1-onepage',
		),
		'demo8' => array(
			'title' => __( 'Home 2 (Onepage)', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-2-onepage/',
		),
		'demo9' => array(
			'title' => __( 'Home 3 (Onepage)', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-3-onepage/',
		),
		'demo10' => array(
			'title' => __( 'Home 4 (Onepage)', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-4-onepage/',
		),
		'demo11' => array(
			'title' => __( 'Home 5 (Onepage)', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-5-onepage/',
		),
		'demo12' => array(
			'title' => __( 'Home 6 (Onepage)', 'financepro-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
			'preview_link' => 'https://radiustheme.com/demo/wordpress/finance/home-6-onepage/',
		),
	);

	$download_url = 'http://radiustheme.com/demo/wordpress/demo-content/finance/';

	foreach ($demos_array as $id => $data) {
		$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
			'url' => $download_url,
			'file_id' => $id,
		));
		$demo->set_title($data['title']);
		$demo->set_screenshot($data['screenshot']);
		$demo->set_preview_link($data['preview_link']);

		$demos[ $demo->get_id() ] = $demo;

		unset($demo);
	}

	return $demos;
}

// Run after demo install
function financepro_core_importer_after_demo_install( $collection ){
	// Update front page id
	$demos = array(
		'demo1' => 2420,
		'demo2' => 2431,
		'demo3' => 2441,
		'demo4' => 2451,
		'demo5' => 2456,
		'demo6' => 2460,
		'demo7' => 2829,
		'demo8' => 2842,
		'demo9' => 2851,
		'demo10' => 2872,
		'demo11' => 2874,
		'demo12' => 2876,
	);

	$data = $collection->to_array();

	foreach( $data['tasks'] as $task ) {
		if( $task['id'] == 'demo:demo-download' ){
			$demo_id = $task['args']['demo_id'];
			$page_id = $demos[$demo_id];
			update_option( 'page_on_front', $page_id );
			flush_rewrite_rules();
			break;
		}
	}

	// Update contact form 7 email
	$cf7ids = array( 2062, 2198, 2199, 2200 );
	foreach ( $cf7ids as $cf7id ) {
		$mail = get_post_meta( $cf7id, '_mail', true );
		$mail['recipient'] = get_option( 'admin_email' );
		if ( class_exists( 'WPCF7_ContactFormTemplate' ) ) {
			$pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
			$replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
			$mail['sender'] = preg_replace($pattern, $replacement, $mail['sender']);
		}
		update_post_meta( $cf7id, '_mail', $mail );		
	}
}