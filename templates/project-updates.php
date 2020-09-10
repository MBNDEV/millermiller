<?php
/**
	Template Name: Project Updates Template
 */

get_header();
?>

<main id="content">
	<?php
	while ( have_posts() ) : the_post();
		
		the_content();

	endwhile; // End of the loop.
	?>



        <div class="proj-up-filter blog-filter">
            <div class="grid-container">
                <div class="grid-x grid-margin-x align-middle text-center medium-text-left">
                    <div class="cell auto position-relative">
                        <div class="button-dropdown">
                            <a href="javascript:;" class="button-filter">Filter by County</a>
                            <div class="dropdown-lists">
                                <ul>
                                   <li><a href="javascript:;" data-filter="anne-arundel-county">Anne Arundel County</a></li>
                                   <li><a href="javascript:;" data-filter="baltimore-city">Baltimore City</a></li>
                                   <li><a href="javascript:;" data-filter="howard-county">Howard County</a></li>
                                   <li><a href="javascript:;" data-filter="montgomery-county">Montgomery County</a></li>
                                   <li><a href="javascript:;" data-filter="prince-george-county">Prince George’s County</a></li>
                                   <li><a href="javascript:;" data-filter="st-marys-county">St. Mary’s County</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="attorneys-list">
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <?php 
                        $query = new WP_Query( array(
                            'post_type' => 'project-update',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                        ));
                        while ($query->have_posts()) : $query->the_post();
                    ?>
                        <div class="cell large-4 medium-6 small-12">
                            <article>
                                <div class="wp-block-image"></div>
                                <h5><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <small>County: <?php the_field('county') ?></small>
                            </article>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>

</main>

<?php

get_footer();
