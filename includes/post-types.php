<?php  


// Register Attorneys Post Type
function attorneys_post() {
	register_post_type( 'attorney',
		array(
			'labels' 	=> array(
				'name' => __( 'Attorneys' ),
				'singular_name' => __('Attorney')
			),
			'public' 		=> true,
			'has_archive' 	=> false,
			'show_in_rest' 	=> true,
            'menu_position' => 20,
			'supports'		=>	array('title', 'editor', 'page-attributes', 'thumbnail'),
        	'menu_icon' 	=> 'dashicons-editor-paragraph',
		)
	);
	register_taxonomy(  
		'practice-areas',
		'attorney',
		array(
			'hierarchical' => true,			
			'has_archive' => true,
			'label' => 'Practice Areas',  			
			'query_var' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
            /*'rewrite' => array(
                'slug' => 'attorneys',
                'with_front' => true  
            )*/
		)
	);
}
add_action( 'init', 'attorneys_post' );