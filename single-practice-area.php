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
    <?php 
        while ( have_posts() ) : the_post(); 

        $terms = get_the_terms($post->ID, 'practice-areas' );
    ?>
    
    <div class="sec-banner spa">
        <figure class="bg">
            <?php 
                $controlBannerImage = get_field('paf_banner');
                $controlBannerImage = $controlBannerImage['banner_image'];
            ?>
            <?php if ($controlBannerImage): ?>
                <img src="<?= esc_url($controlBannerImage['url']) ?>" alt="<?= esc_attr($controlBannerImage['alt']) ?>"  title="<?= esc_attr($controlBannerImage['alt']) ?>">
            <?php elseif (has_post_thumbnail() ): ?>
                <?php the_post_thumbnail(); ?>
            <?php endif ?>
        </figure>
        <div class="grid-container">
            <div class="breadcrumbs wow fadeInUp">
                <a href="<?php the_permalink(9); ?>"><?php echo get_post(9)->post_title; ?></a>
                <a href="<?= get_term_link($terms[0]->term_id); ?>"><?= $terms[0]->name; ?></a>
            </div>   
            <h5 class="wow fadeInUp" data-wow-delay="0.2s">
                <?php if(get_field('paf_banner_sub_title') != "") {
                the_field('paf_banner_sub_title');
            } else {
                echo "Client Focused. Results Driven.";
            } ?>
            </h5>
            <h1 class="hbg wow fadeInUp" data-wow-delay="0.4s">
                <span><?php if(get_field('paf_banner_title') != "") {
                    the_field('paf_banner_title');
                } else {
                    the_title();
                } ?></span>
            </h1>

            <p class="wow fadeInUp" data-wow-delay="0.6s"><?php if(get_field('paf_banner_description') != "") {
                the_field('paf_banner_description');
            } ?></p>
        </div>
    </div>

    <div class="sec-pa-cont">      
        <div class="grid-container">
            <?php the_content(); ?>
        </div>
    </div>  

    <?php $paAttorneys = get_field('paf_attorneys_select');
    if( $paAttorneys ): ?>
    <div class="sec-pa-attr">
        <div class="grid-container">
            <div class="text-center">
                <h2 class="hbg">
                    <?php if(get_field('paf_attorneys_title') != "") {
                        the_field('paf_attorneys_title');
                    } else {
                        echo "Attorneys";
                    } ?>
                </h2>
            </div>
            <ul class="grid-x grid-margin-x">
                <?php 
                    $ctrWowDelay = 2;
                    foreach( $paAttorneys as $post ):  setup_postdata($post); ?>
                    <li class="cell large-4">
                        <div class="attr-item wow fadeInUp" data-wow-delay="0.<?= $ctrWowDelay ?>s">
                            <a class="img" href="<?php the_permalink(); ?>">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="https://via.placeholder.com/170x170/f0f0f0/cccccc?text=[no+thumnail]" alt="" />';
                                }
                            ?>
                            </a>

                            <h4><?php the_title(); ?></h4>
                            <a href="<?php the_permalink(); ?>">View Bio</a>
                        </div>
                    </li>
                    <?php $ctrWowDelay++; ?>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </ul>

            <script>
                $(function(){
                    $('.sec-pa-attr ul').slick({
                        dots: false,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        responsive: [
                            {
                                breakpoint: 1366,
                                settings: {slidesToShow: 2}
                            },
                            {
                                breakpoint: 1024,
                                settings: {slidesToShow: 1}
                            }
                        ]
                    });
                });
            </script>
        </div>
    </div>
    <?php endif; ?>

    <?php $paFaqs = get_field('paf_faqs_select');
    if( $paFaqs ): ?>
    <div class="sec-pa-faqs"> 
        <div class="grid-container">
            <div class="text-center">
                <h2 class="hbg more_on">
                    <span class="lblue">
                        <?php if(get_field('paf_faqs_title') != "") {
                            the_field('paf_faqs_title');
                        } else {
                            echo "FAQs";
                        } ?>
                    </span>
                </h2>
            </div>
            <ul  class="accordion" data-accordion  data-multi-expand="true" data-allow-all-closed="true">
                <?php 
                    $ctrWowDelay = 2;
                    foreach( $paFaqs as $post ):  setup_postdata($post); ?>
                    <li class="accordion-item wow fadeInUp" data-wow-delay="0.<?= $ctrWowDelay ?>s" data-accordion-item>
                        <a href="#" class="accordion-title"><?php the_title(); ?></a>
                        <div class="accordion-content" data-tab-content>
                            <?php the_content(); ?>
                        </div>
                    </li>
                    <?php $ctrWowDelay++; ?>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>   
    <?php endif; ?>



    <?php                 
    $args = array(
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'practice-areas',
                'field' => 'slug',
                'terms' => $terms[0]->slug,
                'include_children' => false
            )
        ),
        'post_type' => 'practice-area',
        'orderby' => 'title,',
        'post__not_in' => array( $post->ID )
    );
    $relPa = new WP_Query( $args ); ?>

        <?php if($relPa->have_posts()): ?>
            <div class="sec-pa-rel">
                <div class="grid-container">
                    <div class="text-center">
                        <h2 class="hbg more_on">
                            <span class="lblue">MORE ON <?php echo $terms[0]->name; ?></span></h2>
                    </div><br>
                
                    
                    <div class="grid-x grid-margin-x practice-areas">        
                    
                        <?php 
                            $ctrWowDelay = 2;
                        while ( $relPa->have_posts() ) { $relPa->the_post(); ?>
                        <div class="cell large-4 medium-6 pa-item wow fadeInUp" data-wow-delay="0.<?= $ctrWowDelay;  ?>s">
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
                            <p class="excerpt">
                                <?php
                                    $excerpt = get_the_excerpt(); 
                                    $excerpt = substr( $excerpt, 0, 165 );
                                    $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                                    echo $excerpt;
                                ?>...<a href="<?= get_the_permalink(); ?>" class="readmore-link">read more →</a>
                            </p>
                        </div>
                        <?php 
                            
                           $ctrWowDelay++;
                        ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php   endwhile;  wp_reset_postdata(); ?> 

    <?php if (get_the_ID() == 277): ?>
        <div class="sec-pa-rel" style="display: none">
            <div class="grid-container">
                <div class="text-center">
                    <h2 class="hbg more_on">
                        <span class="lblue">MORE ON <?php echo $terms[0]->name; ?></span></h2>
                </div>
                <br>
                <div class="grid-x grid-margin-x rep-case-lists">
                    <?php 
                        $query = new WP_Query( array(
                            'post_type' => 'case-representative',
                            'post_status' => 'publish',
                            'posts_per_page' => 2,
                        ));
                        while ($query->have_posts()) : $query->the_post();
                    ?>

                        <div class="medium-6 large-6 cell">
                            <div class="box grid-x grid-padding-x margin-bottom-2">
                                <div class="cell small-6">
                                    <div class="thumb">
                                        <div class="control-thumb">
                                            <?php $controlImageBefore = get_field('crf_before_image'); ?>
                                            <?php if ($controlImageBefore): ?>
                                                <img src="<?= esc_url( $controlImageBefore['sizes']['medium'] ); ?>" alt="<?= esc_attr( $controlImageBefore['alt'] ); ?>"  title="<?= esc_attr( $controlImageBefore['alt'] ); ?>">
                                            <?php else: ?>
                                                <img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="placeholder" title="placeholder" />
                                            <?php endif ?>
                                        </div>
                                        
                                        <span><?= get_field('crf_before_image_text') ?></span>
                                    </div>
                                </div>
                                <div class="cell small-6">
                                    <div class="thumb">
                                        <div class="control-thumb">
                                             <?php $controlImageAfter = get_field('crf_after_image'); ?>
                                            <?php if ($controlImageAfter): ?>
                                                <img src="<?= esc_url( $controlImageAfter['sizes']['medium'] ); ?>" alt="<?= esc_attr( $controlImageAfter['alt'] ); ?>"  title="<?= esc_attr( $controlImageAfter['alt'] ); ?>">
                                            <?php else: ?>
                                                <img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="placeholder" title="placeholder" />
                                            <?php endif ?>
                                        </div>
                                        
                                        <span><?= get_field('crf_after_image_text'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <h2 class="margin-bottom-2"><?php the_title(); ?></h2>
                            <h3><?php the_field('crf_location') ?></h3>
                            <ul>
                                <li>Initial Offer:</li>
                                <li><?php the_field('crf_initial_offer') ?></li>
                            </ul>
                            <ul>
                                <li>Final Award:</li>
                                <li><?php the_field('crf_final_award') ?></li>
                            </ul>
                            <p><?php the_field('crf_short_description') ?></p>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                </div>

                <div class="text-center margin-top-2">
                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="/representative-cases/" id="loadMorePosts">More Representative Cases</a>
                    </div>
                </div>

            </div>
        </div>
    <?php endif ?>

    <div class="sec-subscribe-spa">
        <?php 
            $subscribe = get_post(182);
            echo apply_filters('the_content',$subscribe->post_content);
        ?>
    </div>        
</main>



<?php

get_footer();

