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
    <div class="blog-header">
        <div class="medium-fluid"></div>
        <?php while ( have_posts() ) : the_post();  ?>
            <div class="grid-x grid-margin-x align-stretch">
                <div class="cell small-12 medium-6">
                    <div class="blog-thumbnail">
                        <?= get_the_post_thumbnail(get_the_ID(),'full'); ?>
                    </div>
                </div>
                <div class="cell small-12 medium-6">
                    <div class="blog-hero">
                        <div class="vertical-center-left">
                            <div class="breadcrumbs">
                                <a href="/case-studies">case studies</a>
                                <?php 
                                    $controlPostCategory = get_the_terms(get_the_ID(), 'case-studies');
                                    $controlPostCategory = $controlPostCategory[0];
                                ?>
                                <a href="<?= esc_url(get_term_link($controlPostCategory->term_id)) ?>"><?= $controlPostCategory->name ?></a>
                            </div>
                            <h1><?php the_title(); ?></h1>    
                            <div class="content-issue">
                                <h5>Issue:</h5>
                                <?php the_field('cs_issue'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <div class="grid-container box-design"></div>
    </div>
    
    <section class="page-content blog-details">
        <div class="grid-container">
            
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-2">
                    <h2>Goal:</h2>
                </div>
                <div class="cell small-12 medium-10">
                    <?php the_field('cs_goal') ?>
                </div>
            </div>

            <div class="divider"></div>

            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-2">
                    <h2>Success:</h2>
                </div>
                <div class="cell small-12 medium-10">
                    <?php the_field('cs_goal') ?>
                </div>
            </div>

           <div class="bottom-blog-links">
                <ul>
                    <li><a href="javascript:;"><i class="icn-comments"></i> <?= get_comments_number() ?> Comments</a></li>
                    <li><a href="javascript:;" id="printMe"><i class="icn-print"></i> Print</a></li>
                </ul>
            </div>

            <?php while ( have_posts() ) : the_post();  ?>
                <div id="comments" class="comments-section">

                    <div class="bottom-share-links control-flex">
                        <h5>Share this Article:</h5>
                        
                        <div id="jsSocial" style=""></div>
                    </div>

                    <?php comments_template('/comments.php'); ?>

                </div><!-- #comments -->
            <?php endwhile; ?>


            <div class="bottom-related-posts">
                <div class="text-center">
                    <h2 class="hbg">RELATED NEWS & RESOURCES</h2>
                </div>
                <div class="grid-x grid-margin-x blog-lists">
                    
                     <?php 
                        $post_id = get_the_ID();
                        $cat_ids = array();
                        $categories = get_the_terms( $post_id, 'case-studies');


                        if($categories):
                            foreach ($categories as $category):
                                array_push($cat_ids, $category->term_id);
                            endforeach;
                        endif;


                        $current_post_type = get_post_type($post_id);
                        $query_args = array(
                            'post_type'      => $current_post_type,
                            'post_not_in'    => array($post_id),
                            'posts_per_page'  => '3',
                            'orderby' => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'case-studies',
                                    'field'    => 'term_id',
                                    'terms'    => $cat_ids
                                ),
                            ),
                         );

                        $related_cats_post = new WP_Query( $query_args );
                    ?>

                    <?php if ($related_cats_post->have_posts()): ?>
                        
                           <?php while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>

                                <div class="cell large-4 medium-6 small-12">
                                    <article>
                                        <div class="wp-block-image">
                                            <?php $controlThumb = get_field('cs_thumbnail'); ?>
                                            <img src="<?= esc_url($controlThumb['url']) ?>" alt="<?= esc_attr($controlThumb['alt']) ?>" title="<?= esc_attr($controlThumb['alt']) ?>">
                                        </div>
                                        
                                        <h5><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <small>
                                            <?php 
                                                $controlPostCategory = get_the_terms(get_the_ID(), 'case-studies');
                                            ?>
                                            <?php if ($controlPostCategory): ?>
                                                <?php
                                                    $postCategoryLength = count($controlPostCategory);
                                                    $postCtr = 1;
                                                     foreach ($controlPostCategory as $pc): ?>
                                                    <?= $pc->name ?><?= $postCtr != $postCategoryLength ? ',' :''; ?>
                                                <?php $postCtr++; endforeach; ?>
                                            <?php endif ?>
                                        </small>
                                    </article>
                                </div>

                            <?php endwhile; wp_reset_postdata(); ?>
                        
                    <?php endif ?>

                </div>
            </div>
        </div>
    </section>


</main>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<script>
    $(function(){
        $("#jsSocial").jsSocials({
            showLabel: true,
            showCount: false,
            shareIn: "popup",
            shares: [
                {
                    share : "facebook",
                    label : "Share on Facebook",
                    logo: "fa fa-facebook"
                }, 
                {
                    share : "twitter",
                    label : "Tweet this",
                    logo : "fa fa-twitter"
                }, 
                {
                    share : "linkedin",
                    label : "Share on Linkedin",
                    logo : "fa fa-linkedin"
                }
            ]
        });

        $('.bottom-share-links a').click(function(){
            var getSocial = $(this).data('social');
            $('#jsSocial .jssocials-share').each(function(){
                var getClass = $(this).attr('class');
                if (getClass.indexOf(getSocial) > -1) {
                    console.log(getClass);
                    $(this).find('.jssocials-share-link').click();
                }
            });
        });

        $('#printMe').click(function(){
            window.print();
        });
    })
</script>

<?php

get_footer();
