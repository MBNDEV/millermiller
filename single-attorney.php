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
                        <li><a href="mailto:<?php the_field('af_banner_email') ?>">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/icn-email2.svg" alt=""> EMAIL</a>
                        </li>
                        <li><a href="<?php the_field('af_banner_vcard') ?>" download="vCard - <?= get_the_title(); ?>">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/icn-vcard.svg" alt=""> vCard</a>
                        </li>
                    </ul>
                    <p><?php the_field('af_banner_intro') ?></p>

                </div>
                <div class="cell large-5 align-self-bottom image">
                    <figure>
                        <?php 
                        $profile = get_field('af_banner_profile');
                        if( !empty( $profile ) ): ?>
                            <img src="<?php echo esc_url($profile['url']); ?>" alt="<?php echo esc_attr($profile['alt']); ?>" />
                        <?php else : ?>
                            <?php the_post_thumbnail('full'); ?>
                        <?php endif; ?>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="bio-subhead show-for-large" style="display: none;">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-8 sub-name">
                    <h5 class="wow fadeInUp">attorneys</h5>

                    <?php 
                    $profile = get_field('af_banner_profile');
                    if( !empty( $profile ) ): ?>
                        <img src="<?php echo esc_url($profile['url']); ?>" alt="<?php echo esc_attr($profile['alt']); ?>" />
                    <?php else : ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php endif; ?> 

                    <h2 class="wow fadeInUp" data-wow-delay="0.2s"><?php the_title(); ?></h2>
                </div>
                <div class="cell large-4 align-self-middle sub-ev text-right">
                    <ul class="email-vcard">
                        <li class="wow fadeInUp" data-wow-delay="0.3s">
                            <a href="mailto:<?php the_field('af_banner_email'); ?>">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/icn-email2.svg" alt=""> EMAIL</a>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.3s"><a href="<?php the_field('af_banner_vcard'); ?>">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/icn-vcard.svg" alt=""> vCard</a>
                        </li>
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
                                    
                                    <?php  if( get_field('af_representative_trans_content') ): ?>
                                    <li><a href="#representative-trans">Representative Transactions</a></li>
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

                            <div class="text-center-medium">
                                <h2 class="hbg">Overview</h2>  
                            </div>  

                            <?php the_content(); ?>

                            <?php 
                                $currentAttorney = get_the_ID();
                                $query = new WP_Query( array(
                                    'post_type' => 'attorney-testimony',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'meta_key'      => 'atf_attorney_for',
                                    'meta_value'    => $currentAttorney
                                ));
                                
                            ?>
                            <?php if ($query->have_posts()): ?>
                                <div class="bio-testimonials testi-s1 show-for-large">
                                <div class="testi-slider">
                                    <?php while ($query->have_posts()) : $query->the_post() ?>
                                        <div class="testi-item">
                                            <p><?php the_field('atf_testimony') ?></p>
                                            <h5><?php the_field('atf_author') ?></h5>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                                </div>
                            <?php endif ?>
                            
                            <script>
                                $(function(){
                                    $('.testi-s1 .testi-slider').slick({
                                        dots: false,
                                        adaptiveHeight: true
                                    });
                                });
                            </script>
                            
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
                                <?php 
                                    $ctrWowDelay = 0.2;
                                    foreach( $paITems as $post ):  setup_postdata($post); ?>
                                    <li class="wow fadeInUp" data-wow-delay="<?= $ctrWowDelay ?>s"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php  $ctrWowDelay = $ctrWowDelay + 0.1; endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>


                        <?php if(get_field('fa_bar_admissions_content') != "") : ?>
                        <hr>
                        <div id="bar-admissions" class="bio-bar-admissions offtop" data-magellan-target="bar-admissions">
                            <div class="text-center-medium">
                                <h2 class="hbg">Bar Admissions</h2>
                            </div>
                            <?php the_field('fa_bar_admissions_content'); ?>
                        </div> 
                        <?php endif; ?>


                        <?php if(get_field('fa_professional_affiliations_content') != "") : ?>
                        <hr>
                        <div id="affiliations" class="bio-affiliations offtop" data-magellan-target="affiliations">  
                            <div class="text-center-medium">
                                <h2 class="hbg">Professional Affiliations</h2>
                            </div>
                            <?php the_field('fa_professional_affiliations_content'); ?>
                        </div> 
                        <?php endif; ?>


                        <?php if(get_field('fa_education_content') != "") : ?>
                        <hr>
                        <div id="education" class="bio-education offtop" data-magellan-target="education">
                            <div class="text-center-medium">
                               <h2 class="hbg">Education</h2>
                            </div>
                            <?php the_field('fa_education_content'); ?>
                        </div>
                        <?php endif; ?>


                        <?php if(get_field('fa_honors_and_awards_content') != "") : ?>
                        <hr>
                        <div id="awards" class="bio-awards offtop" data-magellan-target="awards">
                            <div class="text-center-medium">
                                <h2 class="hbg">Honors and Awards</h2>
                            </div>
                            <?php the_field('fa_honors_and_awards_content'); ?>
                        </div>
                        <?php endif; ?>


                        <?php 
                            $apdeItems = get_field('fa_appellate_decisions_items');
                            if( $apdeItems ): ?>
                        <hr>
                        <div id="appellate" class="bio-appellate offtop" data-magellan-target="appellate">
                            <div class="text-center-medium">
                                <h2 class="hbg">Appellate Decisions</h2>
                            </div>
                            <ul>
                                <?php 
                                    $ctrWowDelay = 0.2;
                                foreach( $apdeItems as $post ):  setup_postdata($post); ?>
                                <li class="wow fadeInUp" data-wow-delay="<?= $ctrWowDelay ?>s">
                                    <a href="<?php the_field('aaf_file'); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                                <?php $ctrWowDelay = $ctrWowDelay + 0.1; endforeach;  wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>


                        <?php 
                            $pubItems = get_field('fa_publications_items');
                            if( $pubItems ): ?>
                        <hr>
                        <div id="publications" class="bio-publications offtop" data-magellan-target="publications">

                            <div class="text-center-medium">
                                <h2 class="hbg">Publications</h2>
                            </div>
                            <ul>
                                <?php 
                                $ctrWowDelay = 0.2;
                                foreach( $pubItems as $post ):  setup_postdata($post); ?>
                                <li class="wow fadeInUp" data-wow-delay="<?=  $ctrWowDelay ?>s">
                                <?php if (get_field('apf_file') !="" || get_field('apf_link') != "") { ?>
                                                                          
                                    <a href="<?php if(get_field('apf_file') !=""){the_field('apf_file');} else {the_field('apf_link');} ?>">
                                        <?php the_title(); ?>
                                    </a>

                                <?php } else { ?>
                                    
                                     <?php the_title(); ?>

                                <?php } ?>
                                </li>
                                <?php $ctrWowDelay = $ctrWowDelay + 0.1; endforeach;  wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>


                        <?php 
                            $repCase = get_field('fa_representative_cases_items');
                            if( $repCase ): ?>
                        <hr>
                        <div id="representative" class="bio-representative offtop" data-magellan-target="representative">
                            <div class="text-center-medium">
                                <h2 class="hbg">Representative Cases</h2>
                            </div>
                            <div class="grid-x grid-margin-x rep-case-lists">
                                <?php 
                                    $rcaseCTR = 1;
                                    $ctrWowDelay = 0.2;
                                    foreach( $repCase as $post ):  setup_postdata($post); ?>
                                        <?php if ($rcaseCTR <= 2): ?>
                                            <div class="medium-6 large-6 cell grid-item wow fadeInUp" data-wow-delay="<?= $ctrWowDelay ?>s">
                                                <div class="box grid-x grid-padding-x margin-bottom-2">
                                                    <div class="cell small-6">
                                                        <div class="thumb">
                                                            <?php $controlImageBefore = get_field('crf_before_image'); ?>
                                                            <?php if ($controlImageBefore): ?>
                                                                <img src="<?= esc_url( $controlImageBefore['url'] ); ?>" alt="<?= esc_attr( $controlImageBefore['alt'] ); ?>"  title="<?= esc_attr( $controlImageBefore['alt'] ); ?>">
                                                            <?php else: ?>
                                                                <img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="placeholder" title="placeholder" />
                                                            <?php endif ?>
                                                            
                                                            <span>Before</span>
                                                        </div>
                                                    </div>
                                                    <div class="cell small-6">
                                                        <div class="thumb">
                                                             <?php $controlImageAfter = get_field('crf_after_image'); ?>
                                                            <?php if ($controlImageAfter): ?>
                                                                <img src="<?= esc_url( $controlImageAfter['url'] ); ?>" alt="<?= esc_attr( $controlImageAfter['alt'] ); ?>"  title="<?= esc_attr( $controlImageAfter['alt'] ); ?>">
                                                            <?php else: ?>
                                                                <img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="placeholder" title="placeholder" />
                                                            <?php endif ?>
                                                            
                                                            <span>After</span>
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
                                        <?php endif ?>
                                        <?php 
                                            $rcaseCTR++;
                                            $ctrWowDelay = $ctrWowDelay + 0.2;
                                        ?>
                                    
                                <?php endforeach;  wp_reset_postdata(); ?>
                            </div>
                            <div class="show-for-medium">
                                <a href="/representative-cases?case-attorney=<?= get_the_ID(); ?>" class="button primary round">more representative cases</a>
                            </div>
                        </div>
                        <?php endif; ?>


                        <?php if(get_field('af_representative_trans_content') != "") : ?>
                        <hr>
                        <div id="representative-trans" class="bio-reptrans offtop" data-magellan-target="representative-trans">
                            <div class="text-center-medium">
                                <h2 class="hbg">Representative Transactions</h2>
                            </div>
                            <?php the_field('af_representative_trans_content'); ?>
                        </div>

                        <script>
                            jQuery(function(){
                                jQuery('.bio-reptrans ul li .title').click(function(){
                                    jQuery(this).parent().toggleClass('active');
                                });
                            });
                        </script>
                        <?php endif; ?>


                        <?php 
                            $attrCase = get_field('fa_case_studies_items');
                            if( $attrCase ): ?>
                        <hr>
                        <div id="case-studies" class="bio-case-studies offtop" data-magellan-target="case-studies">
                            <div class="text-center-medium">
                                <h2 class="hbg">Case Studies</h2>
                            </div>
                            <ul class="grid-x grid-margin-x rep-cases">
                                <?php 
                                    $ctrWowDelay = 0.2;
                                foreach( $attrCase as $post ):  setup_postdata($post); ?>
                                <li class="cell medium-6 wow fadeInUp" data-wow-delay="<?= $ctrWowDelay ?>">
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
                                <?php $ctrWowDelay = $ctrWowDelay + 0.2; endforeach;  wp_reset_postdata(); ?>
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

