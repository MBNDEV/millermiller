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
                                            'taxonomy' => 'practice-areas'
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
            <?php while ( have_posts() ) : the_post(); 
                    $terms = get_the_terms( $post->ID, 'practice-areas' ); 
             ?>
                <div class="large-3 cell grid-item <?php if($terms) foreach( $terms as $term ) echo strtolower(str_replace(" ","-",$term->name)) . ' '; ?>">
                    <div class="attorneys-item"><figure>
                   <a class="post-link" rel="<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
                    <?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        } else {
                            echo '<img src="https://via.placeholder.com/660x445/020202/111111?text=[no+thumnail]" alt="" />';
                        }
                    ?>
                    </a></figure>
                    <h4><?php the_title(); ?></h4>
                    <?php 

                    if($terms) {
                        foreach( $terms as $term ) {
                            echo $term->name. ', ';
                        }
                    } 

                    ?>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>

                    <div class="grid-sizer"></div>
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
