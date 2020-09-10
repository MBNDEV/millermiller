<?php


get_header();
?>
<main id="content">
    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg"><?php the_title(); ?></h1>
        </div>
    </div>
	<section class="page-content">
        <div class="grid-container">
            <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile; // End of the loop.
            ?>      
        </div>     
	</section>
</main>

<?php

get_footer();
