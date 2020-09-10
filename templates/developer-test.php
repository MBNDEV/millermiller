<?php
/**
	Template Name: Developer Test Template
 */

get_header();
?>

<main id="content" class="contact-page">
    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg"><?php the_title(); ?></h1>
            <h5>Start working with a law firm that <span>values clients and delivers results.</span></h5>
        </div>
    </div>

    <div class="grid-container margin-vertical-3">

        <div id="photo-search">
            <h2>Search Photos:</h2>
            <form action="<?php the_permalink(); ?>" id="searchform" method="get">
                <div>
                    <label for="s" class="screen-reader-text">Search for:</label>
                    <input type="text" id="search" name="search" value="" />
                    <input type="hidden" name="post_type" value="post">
                    <input type="hidden" name="post_type" value="case-study">
                    <input type="submit" value="Search" id="searchsubmit" />
                </div>
            </form>

            <?php 
                $query = new WP_Query( array(
                    'post_type' => array('post', 'case-study'),
                    's' => 'litigation',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'orderby' => 'name',
                    'order' => 'ASC',
                ));
                
            ?>
            <pre>
                <?php print_r($query) ?>
            </pre>
            
        </div>


    </div>
</main>


<?php

get_footer();