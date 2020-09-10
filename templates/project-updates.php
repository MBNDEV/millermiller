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
                                   <li><a href="javascript:;">All</a></li>
                                   <li><a href="javascript:;">Anne Arundel County</a></li>
                                   <li><a href="javascript:;">Baltimore City</a></li>
                                   <li><a href="javascript:;">Howard County</a></li>
                                   <li><a href="javascript:;">Montgomery County</a></li>
                                   <li><a href="javascript:;">Prince George’s County</a></li>
                                   <li><a href="javascript:;">St. Mary’s County</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="project-list margin-top-3">
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
                        <div class="cell large-4 medium-6 small-12" data-filter="<?= get_field('county') ?>">
                            <article>
                                <div class="wp-block-image">
                                    <?php if (get_the_post_thumbnail_url()): ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/660x445/214b47/ffffff?text=[no+thumnail]" alt="<?= get_field('county'); ?>" title="<?= get_field('county') ?>" />
                                    <?php endif ?>
                                </div>
                                <h5><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <small>County: <?php the_field('county') ?></small>
                            </article>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>

</main>

<script>
    $(function(){

        $('.proj-up-filter .dropdown-lists a').click(function(){
            var selected = $(this).text().toLowerCase();
            var filterTxt = $('.proj-up-filter .dropdown-lists').find('.button-filter');
            console.log(selected);

            filterElment = $('.project-list .cell');
            if (selected == 'all') {
                filterTxt.text('Filter by County');
                filterElment.show();
            }else{
                filterTxt.text(selected);

                filterElment.each(function(){
                    var itmfilter = $(this).data('filter').toLowerCase();
                    if (itmfilter == selected.toLowerCase()) {
                        $(this).show();
                    }else{
                        $(this).hide();
                    }
                });
            }
        });
    });
</script>

<?php

get_footer();
