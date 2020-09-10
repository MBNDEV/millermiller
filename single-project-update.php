<?php


get_header();
?>
<main id="content">
    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg"><?php the_field('county'); ?></h1>
        </div>
    </div>
	<section class="page-content project-content">
        <div class="grid-container">
            <?php while ( have_posts() ) : the_post(); ?>

                <h1> <?php the_title(); ?></h1>
                <?php the_content(); ?>


            <?php endwhile;  ?>      
        </div>     
	</section>
</main>

<?php

get_footer();
