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
			'has_archive' 	=> true,
			'show_in_rest' 	=> true,
			'menu_position' => 20,
			'with_front' => true,
			'supports'		=>	array('title', 'editor', 'page-attributes', 'thumbnail'),
        	'menu_icon' 	=> 'dashicons-editor-paragraph',
		)
	);

	register_taxonomy(  
		'attorneys',
		'attorney',
		array(
			'hierarchical' => true,			
			'has_archive' => true,
			'label' => 'Categories',  			
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


// Register Practice Areas Post Type
function practice_area_post() {
	register_post_type( 'practice-area',
		array(
			'labels' 	=> array(
				'name' => __( 'Practice Areas' ),
				'singular_name' => __('Practice Area')
			),
			'public' 		=> true,
			'has_archive' 	=> true,
			'show_in_rest' 	=> true,
            'menu_position' => 20,
			'supports'		=>	array('title', 'editor', 'page-attributes', 'thumbnail'),
        	'menu_icon' 	=> 'dashicons-editor-paragraph',
		)
	);
	
	register_taxonomy(  
		'practice-areas',
		'practice-area',
		array(
			'hierarchical' => true,			
			'has_archive' => true,
			'label' => 'Categories',  			
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
add_action( 'init', 'practice_area_post' );


// Register case_studies Post Type
function case_studies_post() {
	register_post_type( 'case-study',
		array(
			'labels' 	=> array(
				'name' => __( 'Case Studies' ),
				'singular_name' => __('Case Study')
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
		'case-studies',
		'case-study',
		array(
			'hierarchical' => true,			
			'has_archive' => true,
			'label' => 'Categories',  			
			'query_var' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
            /*'rewrite' => array(
                'slug' => 'case-studies',
                'with_front' => true  
            )*/
		)
	);
}
add_action( 'init', 'case_studies_post' );