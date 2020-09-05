<?php
/**
	Template Name: Attorneys Template
 */

get_header();
?>

<main id="content">
	<?php
	while ( have_posts() ) : the_post();
		
		the_content();

	endwhile; // End of the loop.
	?>



        <div class="attorneys-filter blog-filter">
            <div class="grid-container">
                <div class="grid-x grid-margin-x align-middle text-center medium-text-left">
                    <div class="cell auto position-relative">
                        <div class="button-dropdown">
                            <a href="javascript:;" class="button-filter">Filter by Practice Area</a>
                            <div class="dropdown-lists">
                                <ul>
                                    <?php
                                        $attList = get_categories(array(
                                            'hide_empty' => false,
                                            'taxonomy' => 'attorneys'
                                        ));
                                        foreach ($attList as $category):
                                    ?>
                                        <li><a href="<?= esc_url(get_category_link( $category->term_id )) ?>"><?= $category->name; ?> (<?= $category->category_count ?>)</a></li>
                                    <?php endforeach; ?>
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
                    $args = array(
                        'post_type' => 'attorney',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'meta_key' => 'af_last_name',
                        'orderby' => 'meta_value',
                        'order' => 'ASC'
                    );
                    $loop = new WP_Query( $args );
                    $ctrWowDelay = 0.2;
                ?>
                <?php while ( $loop -> have_posts() ) : $loop -> the_post(); ?>
                    <div class="medium-6 large-4 xlarge-3 cell grid-item wow fadeInUp" data-wow-delay="<?= $ctrWowDelay ?>s">
                        <div class="attorney-item">
                            <figure>
                            <a class="post-link" rel="<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
                                <?php 
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    } else {
                                        echo '<img src="https://via.placeholder.com/660x445/020202/111111?text=[no+thumnail]" alt="" />';
                                    }
                                ?>
                            </a>
                            </figure>
                            
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                            <?php 
                            $practice_areas = get_field('af_practice_areas_items');
                            if( $practice_areas ): ?>
                                <p class="attorney-pa"><strong>PRACTICE AREAS:</strong><br>
                                <?php foreach( $practice_areas as $post ):  setup_postdata($post); ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>,
                                <?php endforeach; ?>
                                </p>
                            <?php endif; ?>                  
                        </div>
                    </div>
                    <?php $ctrWowDelay = $ctrWowDelay + 0.1;  ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    

    <?php 
        $subscribe = get_post(182);
        echo apply_filters('the_content',$subscribe->post_content);
    ?>

</main>

<?php

get_footer();
