<?php
/**
	Template Name: Practice Areas Template
 */

get_header();
?>

<main id="content">
	<?php
	while ( have_posts() ) : the_post();
		
	the_content();

	endwhile; // End of the loop.
	?>
    <div class="sec-practice">  
        <div class="grid-container">
        <div class="grid-x grid-margin-x practice-areas">
            <?php
            $paTax = get_terms( 'practice-areas', array(
                'meta_key'			=> 'pac_order_by',
                'orderby'    => 'meta_value',
                'order'      => 'ASC',
                'parent' => 0,
                'hide_empty' => false
            ));
            
            foreach ( $paTax as $paCat ) { ?>

            <div class="cell large-4 medium-6 pa-item">

                <figure>
                    <a href="<?=  get_term_link( $paCat ); ?>"> 
                    <?php if(get_field('pac_thumbnail', $paCat) != "") { ?>
                        <img src="<?php the_field('pac_thumbnail', $paCat); ?>" alt="<?= $paCat->name; ?>">
                    <?php } else { ?>
                       <img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="" />
                    <?php } ?>
                    </a>
                </figure>

                <h4 class="hbg">
                    <a href="<?=  get_term_link( $paCat ); ?>"><?= $paCat->name; ?></a>
                </h4>
                <?php                 
                    $args = array(
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'practice-areas',
                                'field' => 'slug',
                                'terms' => $paCat->slug,
                                'include_children' => false
                            )
                        ),
                        'post_type' => 'practice-area',
                        'orderby' => 'title,'
                    );
                    $products = new WP_Query( $args );

                    echo "<ul>";
                    while ( $products->have_posts() ) { $products->the_post(); ?>

                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                
                        <?php
                    }
                    echo "</ul>"; ?>

            </div>        

            <?php }  ?>
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
