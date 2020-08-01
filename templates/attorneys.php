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


        <div class="attorneys-categories" data-sticky data-margin-top="-5" data-anchor="content">
            <div class="grid-container">
                <div class="attorneys-menu">
                    <ul class="menu button-group">
                        <li class="current-menu-item"><a class="btn-filter" data-filter="" href="#">All</a></li>
                        <?php 
                           $args = array(
                                'orderby' => 'name',
                                'taxonomy'=>'practice-areas',
                                'parent' => 0,
                                'hide_empty' => false,
                                //'exclude'    => array( 1 )
                            );
                            $categories = get_categories( $args );
                            foreach ( $categories as $category ) {
                                echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name .'</a>('.$category->count.')</li>';

                                //echo '<li><a class="btn-filter" data-filter=".'. strtolower(str_replace(' ','-',$category->name)) . '" href="#">' . $category->name .'</a></li>';
                            }
                        ?>
                        <!-- <li class="blank">don't remove</li> -->
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="attorneys-list">
            <div class="grid-container">
            <div class="grid-x grid-margin-x post-list">
            <?php 
                $args = array(
                    'post_type' => 'attorney',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    //'paged' => 1,
                    'orderby'=>'title',
                    'order'=>'ASC'
                );
                $loop = new WP_Query( $args );
            ?>
            <?php while ( $loop -> have_posts() ) : $loop -> the_post();
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
            <div class="text-center"><span id="attorneyss-loadmore" class="loadmore"><i class="fas fa-chevron-down"></i> load more</span></div>

        </div>
        </div>
    

    <?php 
        $subscribe = get_post(182);
        echo apply_filters('the_content',$subscribe->post_content);
    ?>

</main>

<?php

get_footer();
