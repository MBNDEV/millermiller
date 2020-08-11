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
    
<?php while ( have_posts() ) : the_post(); ?> 
    <div class="bio-header">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-7 copy">
                    <h5>attorneys</h5>
                    <h1><?php the_title(); ?></h1>
                    <ul class="email-vcard">
                        <li><a href="<?php the_field('af_banner_email') ?>">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/icn-email2.svg" alt=""> EMAIL</a>
                        </li>
                        <li><a href="<?php the_field('af_banner_vcard') ?>">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/icn-vcard.svg" alt=""> vCard</a>
                        </li>
                    </ul>
                    <p><?php the_field('af_banner_intro') ?></p>

                </div>
                <div class="cell large-5 align-self-bottom image">
                    <figure><img src="<?php bloginfo('template_url') ?>/assets/img/img-Joseph-Suntum-2.png" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
    <div class="bio-subhead show-for-large">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-8 sub-name">
                    <h5>attorneys</h5>
                    <img src="<?php bloginfo('template_url') ?>/assets/img/img-Joseph-Suntum-2.png" alt="">
                    <h2>Joseph Suntum</h2>
                </div>
                <div class="cell large-4 align-self-middle sub-ev">
                    <ul class="email-vcard">
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/icn-email2.svg" alt=""> EMAIL</a></li>
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/icn-vcard.svg" alt=""> vCard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="bio-content" id="bio">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-4">
                    <aside class="bio-side">
                        <div data-sticky-container>   
                            <div class="bio-menu sticky" data-sticky data-anchor="bio"  data-margin-top="5" data-sticky-on="large">
                                <ul data-magellan>
                                    <li><a href="#overview">Overview</a></li>
                                    
                                    <?php  if( get_field('af_practice_areas_items') ): ?>
                                    <li><a href="#practice-areas">Practice Areas</a></li>
                                    <?php endif; ?>
                                    
                                    <?php  if( get_field('fa_bar_admissions_content') ): ?>
                                    <li><a href="#bar-admissions">Bar Admissions</a></li>
                                    <?php endif; ?>
                                    
                                    <?php  if( get_field('fa_professional_affiliations_content') ): ?>
                                    <li><a href="#affiliations">Professional Affiliations</a></li>
                                    <?php endif; ?>
                                    
                                    <?php  if( get_field('fa_education_content') ): ?>
                                    <li><a href="#education">Education</a></li>
                                    <?php endif; ?>
                                    
                                    <?php  if( get_field('fa_honors_and_awards_content') ): ?>
                                    <li><a href="#awards">Honors and Awards</a></li>
                                    <?php endif; ?>
                                    
                                    <?php  if( get_field('fa_appellate_decisions_items') ): ?>
                                    <li><a href="#appellate">Appellate Decisions</a></li>
                                    <?php endif; ?>
                                    
                                    <?php  if( get_field('fa_publications_items') ): ?>
                                    <li><a href="#publications">Publications</a></li>
                                    <?php endif; ?>
                                    
                                    <?php  if( get_field('fa_representative_cases_items') ): ?>
                                    <li><a href="#representative">Representative Cases</a></li>
                                    <?php endif; ?>
                                    
                                    <?php  if( get_field('fa_case_studies_items') ): ?>
                                    <li><a href="#case-studies">Case Studies</a></li>
                                    <?php endif; ?>
                                    
                                </ul>
                            </div>
                        </div> 
                    </aside>
                </div>
                <div class="cell large-8">
                    <article class="bio-copy">
                        
                        <div id="overview" class="bio-overview offtop" data-magellan-target="overview">
                        
                            <h2 class="hbg">Overview</h2>    

                            <?php the_content(); ?>

                                
                            <div class="bio-testimonials testi-s1 show-for-large">
                                <div class="testi-slider">
                                    <div class="testi-item">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                        <h5>Mr. First Name Last Name</h5>
                                    </div>
                                    <div class="testi-item">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                        <h5>Mr. First Name Last Name</h5>
                                    </div>
                                </div>
                                
                                <script>
                                    $(function(){
                                        $('.testi-s1 .testi-slider').slick({
                                            dots: false
                                        });
                                    });
                                </script>
                            </div>
                        </div>    
                        
                        <?php 
                            $paITems = get_field('af_practice_areas_items');
                            if( $paITems ): ?>
                        <hr>
                        <div id="practice-areas" class="bio-practice-areas offtop" data-magellan-target="practice-areas">
                            
                            <div class="text-center-medium">
                                <h2 class="hbg">Practice Areas</h2>
                            </div>
                            <ul>
                                <?php foreach( $paITems as $post ):  setup_postdata($post); ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>


                        <?php if(get_field('fa_bar_admissions_content') != "") : ?>
                        <hr>
                        <div id="bar-admissions" class="bio-bar-admissions offtop" data-magellan-target="bar-admissions">
                            <h2 class="hbg">Bar Admissions</h2>
                            <?php the_field('fa_bar_admissions_content'); ?>
                        </div> 
                        <?php endif; ?>


                        <?php if(get_field('fa_professional_affiliations_content') != "") : ?>
                        <hr>
                        <div id="affiliations" class="bio-affiliations offtop" data-magellan-target="affiliations">  
                            <h2 class="hbg">Professional Affiliations</h2>
                            <?php the_field('fa_professional_affiliations_content'); ?>
                        </div> 
                        <?php endif; ?>


                        <?php if(get_field('fa_education_content') != "") : ?>
                        <hr>
                        <div id="education" class="bio-education offtop" data-magellan-target="education">
                            <h2 class="hbg">Education</h2>
                            <?php the_field('fa_education_content'); ?>
                        </div>
                        <?php endif; ?>


                        <?php if(get_field('fa_honors_and_awards_content') != "") : ?>
                        <hr>
                        <div id="awards" class="bio-awards offtop" data-magellan-target="awards">
                            <h2 class="hbg">Honors and Awards</h2>
                            <?php the_field('fa_honors_and_awards_content'); ?>
                        </div>
                        <?php endif; ?>


                        <?php 
                            $apdeItems = get_field('fa_appellate_decisions_items');
                            if( $apdeItems ): ?>
                        <hr>
                        <div id="appellate" class="bio-appellate offtop" data-magellan-target="appellate">
                            <h2 class="hbg">Appellate Decisions</h2>
                            <ul>
                                <?php foreach( $apdeItems as $post ):  setup_postdata($post); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                                <?php endforeach;  wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>


                        <?php 
                            $pubItems = get_field('fa_publications_items');
                            if( $pubItems ): ?>
                        <hr>
                        <div id="publications" class="bio-publications offtop" data-magellan-target="publications">
                            <h2 class="hbg">Publications</h2>
                            <ul>
                                <?php foreach( $pubItems as $post ):  setup_postdata($post); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                                <?php endforeach;  wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>


                        <?php 
                            $repCase = get_field('fa_representative_cases_items');
                            if( $repCase ): ?>
                        <hr>
                        <div id="representative" class="bio-representative offtop" data-magellan-target="representative">
                            <h2 class="hbg">Representative Cases</h2>
                            <ul class="grid-x grid-margin-x rep-cases">
                                <?php foreach( $repCase as $post ):  setup_postdata($post); ?>
                                <li class="cell medium-6">
                                    <div class="bio-post">
                                        <figure>
                                        <a class="img" href="<?php the_permalink(); ?>">
                                        <?php
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail();
                                            } else {
                                                echo '<img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="" />';
                                            }
                                        ?>
                                        </a>
                                        </figure>
                                        <h6><a href="">Eminent Domain </a></h6>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php
                                            $excerpt = get_the_excerpt(); 
                                            $excerpt = substr( $excerpt, 0, 165 );
                                            $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                                            echo $excerpt;
                                        ?></p>
                                    </div>
                                </li>
                                <?php endforeach;  wp_reset_postdata(); ?>
                            </ul>
                            <div class="show-for-medium">
                                <a href="" class="button primary round">more representative cases</a>
                            </div>
                        </div>
                        <?php endif; ?>


                        <?php 
                            $attrCase = get_field('fa_case_studies_items');
                            if( $attrCase ): ?>
                        <hr>
                        <div id="case-studies" class="bio-case-studies offtop" data-magellan-target="case-studies">
                            <h2 class="hbg">Case Studies</h2>
                            <ul class="grid-x grid-margin-x rep-cases">
                                <?php foreach( $attrCase as $post ):  setup_postdata($post); ?>
                                <li class="cell medium-6">
                                    <div class="bio-post">
                                        <figure>
                                        <a class="img" href="<?php the_permalink(); ?>">
                                        <?php
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail();
                                            } else {
                                                echo '<img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="" />';
                                            }
                                        ?>
                                        </a>
                                        </figure>
                                        <h6><a href="">Eminent Domain </a></h6>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php
                                            $excerpt = get_the_excerpt(); 
                                            $excerpt = substr( $excerpt, 0, 165 );
                                            $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                                            echo $excerpt;
                                        ?></p>
                                    </div>
                                </li>
                                <?php endforeach;  wp_reset_postdata(); ?>
                            </ul>
                            <div class="show-for-medium">
                                <a href="<?php the_permalink(13) ?>" class="button primary round">More Case Studies</a>
                            </div>
                        </div>
                        <?php endif; ?>

                    </article>
                </div> 
            </div>        
                   
        </div>
    </section>
    <?php endwhile; ?>  
</main>

<?php

get_footer();

