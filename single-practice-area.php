<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>
<main id="content">

                    <?php
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; // End of the loop.
                    ?>  
                   
</main>

<?php

get_footer();

