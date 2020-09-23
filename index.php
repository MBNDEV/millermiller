<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>

<main id="content">
    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg">News & Resources</h1>
        </div>

    </div>
    <div class="blog-filter">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-middle text-center medium-text-left">
                <div class="cell auto position-relative">
                    <div class="button-dropdown">
                        <a href="javascript:;" class="button-filter"><?= is_home() || get_the_archive_title()  ? 'By Subject' : single_term_title(); ?></a>
                        <div class="dropdown-lists">
                            <ul>
                                <?php
                                    $categoryLists = get_categories(array(
                                        'hide_empty' => false,
                                        'taxonomy' => 'category'
                                    ));
                                    foreach ($categoryLists as $category):
                                ?>
                                    <li><a href="<?= esc_url(get_category_link( $category->term_id )) ?>"><?= $category->name; ?> (<?= $category->category_count ?>)</a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="cell auto">
                    <div class="grid-x align-right">
                        <div>
                            <a href="/news-resources/" class="button-filter display-block padding-horizontal-2 button-filter-active">Current</a>
                        </div>
                        <div class="position-relative">
                            <div class="button-dropdown">
                                <a href="#" class="button-filter display-block padding-horizontal-2">Archive</a>
                                <div class="dropdown-lists full">
                                    <ul>
                                        <?php wp_get_archives( array( 'type' => 'yearly', 'limit' => 15 ) ); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <section class="page-content">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell medium-12">
                    <form action="/search-results" class="search-form" method="get">
                        <div class="group-fields">
                            <input type="text" name="search" id="saerch">
                            <input type="hidden" name="type" id="type" value="post">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;" viewBox="0 0 27 27.007">
                                    <path id="prefix__icn-search" d="M31.184 29.545l-7.509-7.58a10.7 10.7 0 1 0-1.624 1.645l7.46 7.53a1.156 1.156 0 0 0 1.631.042 1.163 1.163 0 0 0 .042-1.637zM15.265 23.7a8.45 8.45 0 1 1 5.977-2.475 8.4 8.4 0 0 1-5.977 2.475z" transform="translate(-4.5 -4.493)" style="fill:#333"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="grid-x grid-margin-x blog-lists">

                

                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="cell large-4 medium-6 small-12">
                        <article>
                            <div class="wp-block-image">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <?php if (get_the_post_thumbnail()): ?>
                                         <?php the_post_thumbnail(); ?>
                                    <?php else: ?>
                                        <img width="214" height="87" src="/wp-content/uploads/2020/08/mmc_logo.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="mmc_logo">
                                        
                                    <?php endif ?>
                                </a>
                            </div>
                            
                            <h5><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="margin-bottom-0">
                                <?php
                                    $sContent = strip_tags(get_the_content()); 
                                    $sContent = substr( $sContent, 0, 80 );
                                    $sContent = substr( $sContent, 0, strrpos( $sContent, ' ' ) );
                                    echo $sContent;
                                ?>...<a href="<?= get_the_permalink(); ?>" class="readmore-link">read more →</a>
                            </p>
                            <small>
                                <?php 
                                    $controlPostCategory = get_the_category(get_the_ID());
                                    $postCategoryLength = count($controlPostCategory);
                                    $postCtr = 1;
                                ?>
                                <?php foreach ($controlPostCategory as $pc): ?>
                                    <a href="<?php echo get_term_link( $pc->term_id ); ?>"><?= $pc->name ?></a><?= $postCtr != $postCategoryLength ? ',' :''; ?>
                                <?php $postCtr++; endforeach; ?>
                            </small>
                        </article>
                    </div>

                <?php endwhile; ?>
            </div>
            <?php if (paginate_links()): ?>
                <div class="text-center">
                    <div id="post-pagination" style="display: none">
                        <?php  echo paginate_links(); ?>
                    </div>
                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="javascript:;" id="loadMorePosts">SEE MORE</a>
                    </div>
                </div>
            <?php endif ?>
            
        </div>     
    </section>

    <script>
        $(function(){

            var $nextLink = $('#post-pagination .next').attr('href');

            $('#loadMorePosts').click(function(e){
                e.preventDefault();
                
                $.get( $nextLink, function( data ) {
                    var getList = $(data).find('.blog-lists').html();
                    $('.blog-lists').append(getList);
                    $nextLink = $(data).find('#post-pagination .next').attr('href');
                    if (!$nextLink) {
                        $('#loadMorePosts').hide();
                    }
                });

            });
        })
    </script>

    <section class="sec-subscribe">
        <div class="grid-container">
            <div class="subscribe-box">
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
