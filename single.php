<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>
<style>
    .comment-form{
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin:0 -10px;
    }
    .comment-form > p{
        margin-bottom: 20px;
    }
    .comment-form .comment-form-author{
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;

        -ms-flex-order: 1;
        order: 1;
        padding:0 10px;
    }
    .comment-form .comment-form-email{
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
        -ms-flex-order: 2;
        order: 2;
        padding:0 10px;
    }
    .comment-form .comment-form-comment{
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;

        -ms-flex-order: 3;
        order: 3;
        padding:0 10px;
    }
    .comment-form .form-submit{
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;

        -ms-flex-order: 4;
        order: 4;
        padding:0 10px;
        text-align: right;
    }
    .comment-form .form-submit .submit{
        background-color: #214b47;
        color: #fff;
        padding:10px 25px;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: bold;
        border: 0;
        border-radius: 50px;
        transition: all 0.5s ease;
    }
    .comment-form .form-submit .submit:hover{
        background-color: #432b0f;
    }

    .comment-form input[type="text"], 
    .comment-form input[type="email"], 
    .comment-form input[type="password"],
    .comment-form textarea{
        border: 1px solid #707070;
    }

    .comment-form label{
        font-size: 18px;
        font-weight: bold;
    }

    .comments-section{
        padding-left: 80px;
    }

    .comment-form .comment-form-url,
    .comment-form .comment-form-cookies-consent,
    .comment-form .comment-notes,
    .comment-respond .comment-reply-title{
        display: none !important;
    }

    .control-flex{
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
    }

    .comments-section .comment-list{
        list-style: none;
        margin: 0;

    }

    .comments-section .comment-list .says{
        display: none;
    }

    /*find bottom-share-links*/

    .blog-details .bottom-share-links h5{
        margin-bottom: 0;
    }
    .blog-details .bottom-share-links .jssocials{
        margin-left: 20px;
    }
    .blog-details .bottom-share-links .jssocials .jssocials-share-link {
        border-radius: 8px;
    }
</style>
<main id="content">
    <div class="blog-header">
        <?php while ( have_posts() ) : the_post();  ?>
            <div class="grid-x align-stretch">
                <div class="cell small-12 medium-6">
                    <div class="blog-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                </div>
                <div class="cell small-12 medium-6">
                    <div class="blog-hero">
                        <div class="vertical-center-left">
                            <small>news & Resources</small>
                            <h1><?php the_title(); ?></h1>    
                            <p class="blog-date">Posted <?= get_the_date( 'F j, Y' ); ?> at <?php the_time( 'g:i A' ); ?></p>       
                        </div>
                        
                        <div class="categories">
                            <?php 
                                $controlPostCategory = get_the_category(get_the_ID());
                                $postCategoryLength = count($controlPostCategory);
                                $postCtr = 1;

                            ?>
                            <?php foreach ($controlPostCategory as $pc): ?>
                                <?= $pc->name ?><?= $postCtr != $postCategoryLength ? ',' :''; ?>
                            <?php $postCtr++; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <div class="grid-container box-design"></div>
    </div>
    
    <section class="page-content blog-details">
        <div class="grid-container">
            <?php while ( have_posts() ) : the_post();  ?>
                <?php the_content(); ?>
            <?php endwhile; ?>

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
                        $categories = get_the_category( $post_id );

                        if(!empty($categories) && is_wp_error($categories)):
                            foreach ($categories as $category):
                                array_push($cat_ids, $category->term_id);
                            endforeach;
                        endif;

                        $current_post_type = get_post_type($post_id);
                        $query_args = array( 

                            'category__in'   => $cat_ids,
                            'post_type'      => $current_post_type,
                            'post_not_in'    => array($post_id),
                            'posts_per_page'  => '3',
                            'orderby' => 'rand'
                         );

                        $related_cats_post = new WP_Query( $query_args );
                    ?>

                    <?php if ($related_cats_post->have_posts()): ?>
                        
                           <?php while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>

                                <div class="cell large-4 medium-6 small-12">
                                    <article>
                                        <div class="wp-block-image">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                        
                                        <h5><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <small>
                                            <?php 
                                                $controlPostCategory = get_the_category(get_the_ID());
                                                $postCategoryLength = count($controlPostCategory);
                                                $postCtr = 1;

                                            ?>
                                            <?php foreach ($controlPostCategory as $pc): ?>
                                                <?= $pc->name ?><?= $postCtr != $postCategoryLength ? ',' :''; ?>
                                            <?php $postCtr++; endforeach; ?>
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

