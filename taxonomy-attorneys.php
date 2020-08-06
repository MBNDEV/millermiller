<?php
/**
	Template Name: Attorneys Template
 */

get_header();
?>

<main id="content">
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
                                            'taxonomy' => 'attorneys',
                                            'parent' => 0,
                                            'pad_counts' => true
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
                    <?php if(have_posts()) { ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="medium-6 large-4 xlarge-3 cell grid-item">
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
                            $practice_areas = get_field('af_practice_areas_practice_areas');
                            if( $practice_areas ): ?>
                                <p class="attorney-pa"><strong>PRACTICE AREAS:</strong><br>
                                <?php foreach( $practice_areas as $post ):  setup_postdata($post); ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>,
                                <?php endforeach; ?>
                                </p>
                            <?php endif; ?>                  
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <?php } else { ?>
                        <div class="cell">
                            <br><br>
                            <h3 class="no-post text-center">No Attorney's Found</h3>
                            <br><br>
                        </div>
                    <?php }  ?>
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
