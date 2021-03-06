<?php  


// Register Attorneys Post Type
function attorneys_post() {
    register_post_type( 'attorney',
        array(
            'labels'    => array(
                'name' => __( 'Attorneys' ),
                'singular_name' => __('Attorney')
            ),
            'public'        => true,
            'has_archive'   => true,
            'show_in_rest'  => true,
            'menu_position' => 20,
            'with_front' => true,
            'supports'      =>  array('title', 'editor', 'page-attributes', 'thumbnail'),
            'menu_icon'     => 'dashicons-editor-paragraph',
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
            'labels'    => array(
                'name' => __( 'Practice Areas' ),
                'singular_name' => __('Practice Area')
            ),
            'public'        => true,
            'has_archive'   => true,
            'show_in_rest'  => true,
            'menu_position' => 20,
            'supports'      =>  array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'),
            'menu_icon'     => 'dashicons-editor-paragraph',
            //'rewrite' => array( 'slug' => 'practice-area', 'with_front' => true ),
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
            //'rewrite' => array('slug' => 'practice-areas')
        )
    );
}
add_action( 'init', 'practice_area_post' );


// Register case_studies Post Type
function case_studies_post() {
    register_post_type( 'case-study',
        array(
            'labels'    => array(
                'name' => __( 'Case Studies' ),
                'singular_name' => __('Case Study')
            ),
            'public'        => true,
            'has_archive'   => false,
            'show_in_rest'  => true,
            'menu_position' => 20,
            'supports'      =>  array('title', 'page-attributes','comments', 'thumbnail'),
            'menu_icon'     => 'dashicons-editor-paragraph',
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


// attorney_testimonials
function attorney_testimonials_post() {
    register_post_type( 
        'attorney-testimony',
        array(
            'labels'    => array(
                'name' => __( 'Attorney Testimonials' ),
                'singular_name' => __('Attorney Testimonial')
            ),
            'public'        => true,
            'has_archive'   => false,
            'show_in_rest'  => false,
            'menu_position' => 20,
            'supports'      =>  array('title', 'page-attributes'),
            'menu_icon'     => 'dashicons-editor-paragraph',
        )
    );
}
add_action( 'init', 'attorney_testimonials_post' );
// attorney_testimonials


// miller miller canby testimonial
function mmc_testimonials_post() {
    register_post_type( 
        'mmc_testimonial',
        array(
            'labels'    => array(
                'name' => __( 'MM&C Testimonials' ),
                'singular_name' => __('MM&C Testimonial')
            ),
            'public'        => true,
            'publicly_queryable' => false,
            'has_archive'   => false,
            'show_in_rest'  => false,
            'menu_position' => 20,
            'supports'      =>  array('title', 'page-attributes'),
            'menu_icon'     => 'dashicons-editor-paragraph',
        )
    );
}
add_action( 'init', 'mmc_testimonials_post' );
// miller miller canby testimonial


// attorney_partners_post
function attorney_appellate_post() {
    register_post_type( 
        'attorney-appellate',
        array(
            'labels'    => array(
                'name' => __( 'Attorney Appellates' ),
                'singular_name' => __('Attorney Appellate')
            ),
            'public'        => true,
            'publicly_queryable' => false,
            'has_archive'   => false,
            'show_in_rest'  => false,
            'menu_position' => 20,
            'supports'      =>  array('title', 'page-attributes'),
            'menu_icon'     => 'dashicons-editor-paragraph',
        )
    );
}
add_action( 'init', 'attorney_appellate_post' );
// attorney_partners_post

// attorney_publication_post
function attorney_publication_post() {
    register_post_type( 
        'attorney-publication',
        array(
            'labels'    => array(
                'name' => __( 'Attorney Publications' ),
                'singular_name' => __('Attorney Publication')
            ),
            'public'        => true,
            'publicly_queryable' => false,
            'has_archive'   => false,
            'show_in_rest'  => false,
            'menu_position' => 20,
            'supports'      =>  array('title', 'page-attributes'),
            'menu_icon'     => 'dashicons-editor-paragraph',
        )
    );
}
add_action( 'init', 'attorney_publication_post' );
// attorney_publication_post

// case_representative_post
function case_representative_post() {
    register_post_type( 
        'case-representative',
        array(
            'labels'    => array(
                'name' => __( 'Case Representatives' ),
                'singular_name' => __('Case Representative')
            ),
            'public'        => true,
            'publicly_queryable' => false,
            'has_archive'   => false,
            'show_in_rest'  => false,
            'menu_position' => 20,
            'supports'      =>  array('title', 'page-attributes'),
            'menu_icon'     => 'dashicons-editor-paragraph',
        )
    );
}
add_action( 'init', 'case_representative_post' );
// case_representative_post

// tax_assestment_appeals
function tax_assestment_appeals() {
    register_post_type( 
        'tax-assestment',
        array(
            'labels'    => array(
                'name' => __( 'Tax Appeals' ),
                'singular_name' => __('Tax Appeal')
            ),
            'public'        => true,
            'publicly_queryable' => false,
            'has_archive'   => false,
            'show_in_rest'  => false,
            'menu_position' => 20,
            'supports'      =>  array('title', 'page-attributes'),
            'menu_icon'     => 'dashicons-editor-paragraph',
        )
    );
}
add_action( 'init', 'tax_assestment_appeals' );
// tax_assestment_appeals



// project update post type
function project_update_post() {
    register_post_type( 'project-update',
        array(
            'labels'    => array(
                'name' => __( 'Project Updates' ),
                'singular_name' => __('Project Update')
            ),
            'public'        => true,
            'has_archive'   => true,
            'show_in_rest'  => true,
            'menu_position' => 20,
            'supports'      =>  array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'),
            'menu_icon'     => 'dashicons-editor-paragraph',
            'rewrite' => array( 'slug' => 'project-update', 'with_front' => true ),
        )
    );
}
add_action( 'init', 'project_update_post' );
// project update post type




// Register faqs Post Type
function faqs_post() {
    register_post_type( 'faq',
        array(
            'labels'    => array(
                'name' => __( 'FAQs' ),
                'singular_name' => __('FAQ')
            ),
            'public'        => true,
            'has_archive'   => false,
            'show_in_rest'  => true,
            'menu_position' => 20,
            'supports'      =>  array('title', 'editor', 'page-attributes', 'thumbnail'),
            'menu_icon'     => 'dashicons-editor-paragraph',
        )
    );
}
add_action( 'init', 'faqs_post' );


function mbn_remove_slugs_post_type($post_link,$post,$leavename){
    if(!in_array($post->post_type,['practice-area']) || $post->post_status!='publish'){
        return $post_link;
    }

    // if($post->post_type=="attorneys"){
    //  return str_replace("/"."attorneys/","/",$post_link);
    // }

    return str_replace("/"."practice-area/","/",$post_link);
}
//add_filter("post_type_link","mbn_remove_slugs_post_type",10,3);
function mbn_parse_request($query){
    
    if(!$query->is_main_query() || count($query->query)!=2 || !isset($query->query['page'])){
        return false;
    }

    if(!empty($query->query['name'])){
        $query->set('post_type',array('post','practice-area','attorney','page'));
    }

}
//add_action('pre_get_posts','mbn_parse_request',10,1);