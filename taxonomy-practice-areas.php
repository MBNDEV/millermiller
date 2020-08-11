<?php


get_header();
?>

<main id="content">

    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h6>
                <?php
                    echo get_post(9)->post_title;
                ?>
            </h6>
            <h1 class="hbg"><?php echo single_cat_title( '', false ); ?></h1>
        </div>
    </div>

    <div class="sec-practice">  
        <div class="grid-container">
            <div class="grid-x grid-margin-x practice-areas">
                    
                <?php while (have_posts() ) { the_post(); ?>
                    <div class="cell large-4 medium-6 pa-item">
                        <figure>
                        <a href="<?php the_permalink(); ?>">
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } else {
                                echo '<img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="" />';
                            }
                        ?>
                        </a>
                        </figure>
                        <h4 class="hbg">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <p>
                        <?php
                            $excerpt = get_the_excerpt(); 
                            $excerpt = substr( $excerpt, 0, 165 );
                            $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                            echo $excerpt;
                        ?>
                        </p>

                    </div>  
                                
                <?php }   wp_reset_postdata();  ?>
                    
            </div>
            
            <?php 
                $subscribe = get_post(182);
                echo apply_filters('the_content',$subscribe->post_content);
            ?>
        </div>  
    </div>  

</main>

<?php

get_footer();
