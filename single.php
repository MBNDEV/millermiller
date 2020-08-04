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
    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg"><?php the_title(); ?></h1>
        </div>

    </div>
    <section class="page-content blog-details">
        <div class="grid-container">
            <?php while ( have_posts() ) : the_post();  ?>
                <div class="featured-image"><?php the_post_thumbnail(); ?></div>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php

get_footer();

