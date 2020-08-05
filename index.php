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
                                        <?php wp_get_archives( array( 'type' => 'yearly', 'limit' => 5 ) ); ?>
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
            <div class="grid-x grid-margin-x blog-lists">

                <?php while ( have_posts() ) : the_post(); ?>

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

                <?php endwhile; ?>
            </div>
            <?php if (wp_count_posts()->publish > 9): ?>
                <div class="text-center">
                    <div id="post-pagination" style="display: none"><?= paginate_links(); ?></div>
                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="javascript:;" id="loadMorePosts">SEE MORE</a>
                    </div>
                </div>
            <?php endif ?>
            
        </div>     
    </section>

    <script>
        $(function(){

            var $current_page = 0;

            $('#loadMorePosts').click(function(){
                $current_page++;
                var $item = $('#post-pagination .page-numbers').eq($current_page);
                if ($item.next().hasClass('next')) {
                    $(this).hide();
                }
                var getLink = $item.attr('href');
                $.get( getLink, function( data ) {
                    var getList = $(data).find('.blog-lists').html();
                    $('.blog-lists').append(getList);
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
