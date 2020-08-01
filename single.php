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
    <section class="page-content">
        <div class="grid-container">
                        <?php
                            while ( have_posts() ) : the_post();
                                the_title();
                                the_content();
                            endwhile; // End of the loop.
                        ?>             
                   
        </div>
    </section>
</main>

<?php

get_footer();

