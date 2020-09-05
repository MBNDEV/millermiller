<?php
/**
*	Template Name: Home Template
*/

get_header();
?>


<main id="content">

    <section class="sec-intro">
        <div class="grid-container">
            <hgroup>
                <h1 class="hbg">Experienced Maryland Lawyers</h1>
                <h2>Focusing on 6 Core Practice Areas</h2>
            </hgroup>

            <div class="grid-x grid-margin-x cols3-s2">
                <?php

                $delayCtr = 2;
                $paTax = get_terms( 'practice-areas', array(
                    'meta_key'          => 'pac_order_by',
                    'orderby'    => 'meta_value',
                    'order'      => 'ASC',
                    'parent' => 0,
                    'hide_empty' => false
                ));


                
                foreach ( $paTax as $paCat ) { ?>

                    

                <div class="cell medium-6 large-4 col-item wow fadeInUp" data-wow-delay="0.<?= $delayCtr ?>s">

                    <figure>
                        <a href="<?=  get_term_link( $paCat ); ?>"> 
                        <?php if(get_field('pac_thumbnail', $paCat) != "") { ?>
                            <img src="<?php the_field('pac_thumbnail', $paCat); ?>" alt="<?= $paCat->name; ?>">
                        <?php } else { ?>
                           <img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="" />
                        <?php } ?>
                        </a>
                    </figure>

                    <h3 class="hbg">
                        <a href="<?=  get_term_link( $paCat ); ?>"><?= $paCat->name; ?></a>
                    </h3>
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
                        $paPost = new WP_Query( $args );

                        echo "<ul>";
                        while ( $paPost->have_posts() ) { $paPost->the_post(); ?>

                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    
                            <?php
                        }
                        echo "</ul>"; ?>

                </div>  
                <?php $delayCtr = $delayCtr + 1; ?>      

                <?php }  ?>
            </div>

        </div>
    </section>

    <section class="sec-testimonial">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-6">
                    <h2 class="hbg wow fadeInUp">Preserving and protecting client rights in Maryland since <strong>1946.</strong></h2>
                    <a href="<?php the_permalink(11); ?>" class="button secondary round wow fadeInUp" data-wow-delay="0.2s">meet our attorneys</a>
                </div>
                <div class="cell large-6">
                    <div class="testi-slider">
                        <div class="testi-item wow fadeInUp" data-wow-delay="0.3s">
                            <q>From the moment I picked up the phone and called Miller, Miller & Canby, I knew I was talking to the right people.
                                <cite>Carole Daffron</cite>
                            </q>
                        </div>
                        <div class="testi-item wow fadeInUp" data-wow-delay="0.4s">
                            <q>For more than 30 years, MM&C has helped us reach our objectives in the most effective and cost-efficient manner possible.
                                <cite>Paul Chod, Minkoff Development Corp.</cite>
                            </q>
                        </div>
                        <div class="testi-item wow fadeInUp" data-wow-delay="0.5s">
                            <q>For more than 30 years, MM&C has helped us reach our objectives in the most effective and cost-efficient manner possible.
                                <cite>Paul Chod, Minkoff Development Corp.</cite>
                            </q>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

    <section class="sec-cases">
        <div class="grid-container">
            <h2 class="hbg wow fadeInUp">Case Studies</h2>
            <div class="cases-slider wow fadeInUp" data-wow-delay="0.2s">
                <?php 
                    $ctrDelay = 2;
                     $query = new WP_Query( array(
                        'post_type'     => 'case-study',
                        'post_status'   => 'publish',
                        'posts_per_page' => 4
                    ));
                    while ($query->have_posts()) : $query->the_post();
                 ?>
                    <div class="cases-item">
                        <figure>
                            <?php $controlThumbnail = get_field('cs_thumbnail'); ?>
                            <img src="<?= esc_url( $controlThumbnail['url'] ); ?>" alt="<?= esc_attr( $controlThumbnail['alt'] ); ?>" title="<?= esc_attr( $controlThumbnail['alt'] ); ?>">
                        </figure>
                         <?php 
                            $controlPostCategory = get_the_terms(get_the_ID(), 'case-studies');
                            $controlPostCategory = $controlPostCategory[0];
                        ?>
                        <h3><?= $controlPostCategory->name ?></h3>
                        <h4><?php the_title(); ?></h4>
                        <p>
                            <strong>Issue:</strong>
                            <?php
                                $sContent = strip_tags(get_field('cs_issue')); 
                                $sContent = substr( $sContent, 0, 165 );
                                $sContent = substr( $sContent, 0, strrpos( $sContent, ' ' ) );
                                echo $sContent;
                            ?>...<a href="<?= get_the_permalink(); ?>" class="readmore-link">read more</a>
                        </p>
                    </div>
                <?php endwhile; wp_reset_postdata();  ?>
            </div>  

            <div class="text-center wow fadeInUp"  data-wow-delay="0.2s">
                <a href="<?php the_permalink(13); ?>" class="button primary round">read more cases</a>
            </div>
        </div>
    </section>

    <section class="sec-news">
        <div class="grid-container">
            <div class="text-center">
                <h2 class="hbg wow fadeInUp">Latest News</h2>
            </div>
            <ul class="news-list clearfix">
                 <?php 
                    $ctrDelay = 2;
                     $query = new WP_Query( array(
                        'post_type'     => 'post',
                        'post_status'   => 'publish',
                        'posts_per_page' => 3
                    ));
                    while ($query->have_posts()) : $query->the_post();
                 ?>
                     <li class="wow fadeInUp" data-wow-delay="0.<?= $ctrDelay; ?>s">
                        <div class="news-item">
                            <?php the_post_thumbnail(); ?>
                            <h3><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p>
                                <?php
                                    $sContent = strip_tags(get_the_content()); 
                                    $sContent = substr( $sContent, 0, 165 );
                                    $sContent = substr( $sContent, 0, strrpos( $sContent, ' ' ) );
                                    echo $sContent;
                                ?>...<a href="<?= get_the_permalink(); ?>" class="readmore-link">read more</a>
                            </p>
                        </div>
                    </li>
                <?php $ctrDelay++; endwhile; wp_reset_postdata();  ?>
                 
            </ul>
            <div class="text-center">
                <a href="<?php the_permalink(15); ?>" class="button primary round wow fadeInUp"  data-wow-delay="0.4s">more on news &amp; resources</a>
            </div>
        </div>
    </section>

    <section class="sec-clients">
        <div class="grid-container">
            <div class="grid-x grid-margin-x cols2-s4">
                <div class="cell large-6 large-order-2  small-order-2">
                    <figure class="col-image wow fadeInUp"  data-wow-delay="0.95s">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/our-clients.jpg" alt="">
                    </figure>
                </div>
                <div class="cell large-6 large-order-1 small-order-1 align-self-middle col-copy client-matter-text">
                    <h2 class="hbg wow fadeInUp">Our Clients Matter</h2>
                    <h3 class="wow fadeInUp" data-wow-delay="0.2s">We prove it every day with:</h3><br>
                    <div class="grid-x grid-margin-x">
                        <div class="cell medium-6 large-5">
                            <ul class="check-list">
                                <li class="wow fadeInUp" data-wow-delay="0.3s">Tireless Advocacy</li>
                                <li class="wow fadeInUp" data-wow-delay="0.4s">Creative Problem Solving</li>
                                <li class="wow fadeInUp" data-wow-delay="0.5s">Client Communication</li>
                            </ul>
                        </div>
                        <div class="cell medium-6 large-7">
                            <ul class="check-list">
                                <li class="wow fadeInUp" data-wow-delay="0.6s">Meticulous Attention To Detail</li>
                                <li class="wow fadeInUp" data-wow-delay="0.7s">High Quality, Efficient Work</li>
                                <li class="wow fadeInUp" data-wow-delay="0.8s">Collaboration Among Attorneys And Practice Areas</li>
                            </ul>
                        </div>
                    </div><br>
                    <a href="<?php the_permalink(7); ?>" class="button primary round wow fadeInUp" data-wow-delay="0.9s">more about our firm</a>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-subscribe wow fadeInUp">
        <div class="grid-container">
            <div class="subscribe-box" >
                <h2>Subscribe to our Legal News & Notes Newsletter!</h2>
                <p>
                    Receive quarterly emails with the latest legal news and firm highlights directly to your inbox. 
                    <a href="http://eepurl.com/SLx4P" target="_blank" class="button primary round">SUBSCRIBE</a>
                </p>
            </div>
        </div>
    </section>

</main>

<?php

get_footer();
 