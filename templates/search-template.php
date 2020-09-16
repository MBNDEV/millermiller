<?php
/**
	Template Name: Search Results Template
 */

get_header();
?>

<main id="content">

	<div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg">Search Results</h1>
        </div>
    </div>

    <div class="grid-container">


 		<div class="grid-x grid-margin-x align-center">

 			<?php 
 				$searchTerm = $_GET['search'];
			    $query = new WP_Query( array(
			    	's' => $searchTerm,
			        'post_type' => array( 'case-study', 'posts' ),
			        'post_status' => 'publish',
			        'posts_per_page' => -1,
			        'orderby' => 'name',
			        'order' => 'ASC',
			    ));
			    while ($query->have_posts()) : $query->the_post();
			?>
    			<div class="cell small-4 medium-4">
    				<p><?php the_title(); ?></p>
    			</div>
    		<?php endwhile; wp_reset_postdata(); ?>
    	</div>
    </div>
	
</main>

<?php

get_footer();
