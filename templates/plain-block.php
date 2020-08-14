<?php
/**
	Template Name: Centered Content Template
 */

get_header();
?>

<main id="content">

	<div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg"><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="grid-container">
 		<div class="grid-x grid-margin-x align-center">
    		<div class="cell small-10 medium-8 padding-vertical-3">
				<?php
					while ( have_posts() ) : the_post();
						
						the_content();

					endwhile; // End of the loop.
				?>
    		</div>
    	</div>
    </div>
	
</main>

<?php

get_footer();
