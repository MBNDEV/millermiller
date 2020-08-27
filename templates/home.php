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

                $delayCtr = 1000;
                $paTax = get_terms( 'practice-areas', array(
                    'meta_key'          => 'pac_order_by',
                    'orderby'    => 'meta_value',
                    'order'      => 'ASC',
                    'parent' => 0,
                    'hide_empty' => false
                ));


                
                foreach ( $paTax as $paCat ) { ?>

                    

                <div class="cell medium-6 large-4 col-item" data-aos="fade-up" data-aos-delay="<?= $delayCtr ?>">

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
                <?php $delayCtr = $delayCtr + 300; ?>      

                <?php }  ?>
            </div>

        </div>
    </section>

    <section class="sec-testimonial">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-6">
                    <h2 class="hbg" data-aos="fade-up" data-aos-delay="1000">Preserving and protecting client rights in Maryland since <strong data-aos="fade-up" data-aos-delay="1300">1946.</strong></h2>
                    <a href="<?php the_permalink(11); ?>" class="button secondary round">meet our attorneys</a>
                </div>
                <div class="cell large-6">
                    <div class="testi-slider">
                        <div class="testi-item">
                            <q>From the moment I picked up the phone and called Miller, Miller & Canby, I knew I was talking to the right people.
                                <cite>Carole Daffron</cite>
                            </q>
                        </div>
                        <div class="testi-item">
                            <q>For more than 30 years, MM&C has helped us reach our objectives in the most effective and cost-efficient manner possible.
                                <cite>Paul Chod, Minkoff Development Corp.</cite>
                            </q>
                        </div>
                        <div class="testi-item">
                            <q>For more than 30 years, MM&C has helped us reach our objectives in the most effective and cost-efficient manner possible.
                                <cite>Paul Chod, Minkoff Development Corp.</cite>
                            </q>
                        </div>
                    </div>
                    <script>
                        $(function(){
                            $('.testi-slider').slick({
                                dots: false,
                                vertical: true,
                                slidesToShow: 2,
                                infinite: true,
                                addaptiveHeight:true
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>   

    <section class="sec-cases">
        <div class="grid-container">
            <h2 class="hbg">Case Studies</h2>
            <div class="cases-slider">
                <div class="cases-item">
                    <figure><img src="<?php bloginfo('template_url'); ?>/assets/img/case-study-1.jpg" alt=""></figure>
                    <h3 data-aos="fade-up" data-aos-delay="1000">Eminent Domain</h3>
                    <h4 data-aos="fade-up" data-aos-delay="1300">Necessity to Take</h4>
                    <p data-aos="fade-up" data-aos-delay="1600"><strong>Issue:</strong> Client owned 2-acre shopping center improved with a grocery store situated close to the roadway. The road needed to be widened to accommodate the construction of the State’s Purple Line Light Rail…</p>
                </div>
                <div class="cases-item">
                    <figure><img src="<?php bloginfo('template_url'); ?>/assets/img/case-study-1.jpg" alt=""></figure>
                    <h3 data-aos="fade-up" data-aos-delay="1000">Litigation</h3>
                    <h4 data-aos="fade-up" data-aos-delay="1300">Breach of Commercial Lease and Appeal</h4>
                    <p data-aos="fade-up" data-aos-delay="1600"><strong>Issue:</strong> Client owned 2-acre shopping center improved with a grocery store situated close to the roadway. The road needed to be widened to accommodate the construction of the State’s Purple Line Light Rail…</p>
                </div>
                <div class="cases-item">
                    <figure><img src="<?php bloginfo('template_url'); ?>/assets/img/case-study-1.jpg" alt=""></figure>
                    <h3 data-aos="fade-up" data-aos-delay="1000">Litigation</h3>
                    <h4 data-aos="fade-up" data-aos-delay="1300">Breach of Commercial Lease and Appeal</h4>
                    <p data-aos="fade-up" data-aos-delay="1600"><strong>Issue:</strong> Client owned 2-acre shopping center improved with a grocery store situated close to the roadway. The road needed to be widened to accommodate the construction of the State’s Purple Line Light Rail…</p>
                </div>
            </div>  

            <div class="text-center">
                <a href="<?php the_permalink(13); ?>" class="button primary round" data-aos="fade-up" data-aos-delay="1900">read more cases</a>
            </div>
            
            <script>
                $(function(){
                    $('.cases-slider').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        dotsClass: 'slick-pager',
                        customPaging: function (slider, i) {
                            //return (i + 1) + '/' + slider.slideCount;
                            if(i < 9) dec = "0"; else  dec = ""; 
                            if(slider.slideCount <= 9) dec2 = "0"; else dec2 = "";
                            return dec+(i + 1) + '<small>/' + dec2 + slider.slideCount + '</small>';
                        }
                    });
                });
            </script>
        </div>
    </section>

    <section class="sec-news">
        <div class="grid-container">
            <div class="text-center">
                <h2 class="hbg">Latest News</h2>
            </div>
            <ul class="news-list clearfix">
                <li>
                    <div class="news-item">
                        <img  src="<?php bloginfo('template_url'); ?>/assets/img/news-1.jpg" alt="">
                        <h3  data-aos="fade-up" data-aos-delay="1000"><a href="#">MM&C Update: Coronavirus COVID-19 Policy</a></h3>
                        <p  data-aos="fade-up" data-aos-delay="1300">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet. Mauris vitae ultricies leo integer malesuada. Ac odio tempor orci dapibus</p>
                    </div>
                </li>
                <li>
                    <div class="news-item">
                        <img  src="<?php bloginfo('template_url'); ?>/assets/img/news-1.jpg" alt="">
                        <h3  data-aos="fade-up" data-aos-delay="1600"><a href="#">MM&C Condemnation Attorney Joseph Suntum Elected Chair of the Owners’ Counsel of America Board</a></h3>
                        <p  data-aos="fade-up" data-aos-delay="1900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                </li>
                <li>
                    <div class="news-item">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/news-1.jpg" alt="">
                        <h3  data-aos="fade-up" data-aos-delay="2100"><a href="#">MM&C Attorney James Thompson Selected 2020 Best Lawyers in America® “Lawyer of The Year”</a></h3>
                        <p  data-aos="fade-up" data-aos-delay="3400">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                </li>
            </ul>
            <div class="text-center">
                <a href="<?php the_permalink(15); ?>" class="button primary round"  data-aos="fade-up" data-aos-delay="3700">more on news &amp; resources</a>
            </div>
        </div>
    </section>

    <section class="sec-clients">
        <div class="grid-container">
            <div class="grid-x grid-margin-x cols2-s4">
                <div class="cell large-6 large-order-2  small-order-2">
                    <figure class="col-image"><img src="<?php bloginfo('template_url'); ?>/assets/img/our-clients.jpg" alt=""></figure>
                </div>
                <div class="cell large-6 large-order-1 small-order-1 align-self-middle col-copy client-matter-text">
                    <h2 class="hbg" data-aos="fade-up" data-aos-delay="1000">Our Clients Matter</h2>
                    <h3 data-aos="fade-up" data-aos-delay="1300">We prove it every day with:</h3><br>
                    <div class="grid-x grid-margin-x">
                        <div class="cell medium-6 large-5">
                            <ul class="check-list">
                                <li data-aos="fade-up" data-aos-delay="1600">Tireless Advocacy</li>
                                <li data-aos="fade-up" data-aos-delay="1900">Creative Problem Solving</li>
                                <li data-aos="fade-up" data-aos-delay="2200">Client Communication</li>
                            </ul>
                        </div>
                        <div class="cell medium-6 large-7">
                            <ul class="check-list">
                                <li data-aos="fade-up" data-aos-delay="2500">Meticulous Attention To Detail</li>
                                <li data-aos="fade-up" data-aos-delay="2800">High Quality, Efficient Work</li>
                                <li data-aos="fade-up" data-aos-delay="3100">Collaboration Among Attorneys And Practice Areas</li>
                            </ul>
                        </div>
                    </div><br>
                    <a href="<?php the_permalink(7); ?>" class="button primary round" data-aos="fade-up" data-aos-delay="3400">more about our firm</a>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-subscribe">
        <div class="grid-container">
            <div class="subscribe-box">
                <h2 data-aos="fade-up" data-aos-delay="1000">Subscribe to our Legal News & Notes Newsletter!</h2>
                <p data-aos="fade-up" data-aos-delay="1300">
                    Receive quarterly emails with the latest legal news and firm highlights directly to your inbox. 
                    <a href="http://eepurl.com/SLx4P" target="_blank" class="button primary round">SUBSCRIBE</a>
                </p>
            </div>
        </div>
    </section>

</main>

<?php

get_footer();
 