<?php


get_header();
?>
<style>
    .case-lists .case-content p{
        font-size: 15px;
        color: #818181;
    }
    .case-lists .case-content b{
        color: #404040;
    }
    .case-lists .case-content h2{
        font-size: 20px;
        font-weight: bold;
        line-height: 34px;
        margin-bottom: 15px;
    }
    .case-lists .category-lists{
        font-size: 15px;
        color: #214b47;
    }
    .case-lists article{
        margin-bottom: 60px;
    }
    .case-lists .case-thumbnail{
        margin-bottom: 36px;
    }
</style>
<main id="content">
    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg"><?= get_queried_object()->name; ?></h1>
        </div>
    </div>
    <div class="blog-filter">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-middle text-center medium-text-left">
                <div class="cell auto position-relative">
                    <div class="button-dropdown">
                        <a href="javascript:;" class="button-filter">Category</a>
                        <div class="dropdown-lists">
                            <ul>
                                <?php 
                                    $args = array(
                                        'taxonomy' => 'case-studies',
                                        'orderby' => 'name',
                                        'order'   => 'ASC',
                                       
                                    );

                                    $cats = get_categories($args);
                                 ?>
                                 <?php foreach ($cats as $tax): ?>
                                    <li><a href="<?= get_term_link($tax->term_id); ?>"><?= $tax->name ?></a></li>
                                 <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="cell auto">
                    <div class="grid-x align-right">
                        <div class="position-relative">
                            <div class="button-dropdown">
                                <a href="#" class="button-filter display-block padding-horizontal-2">filter by attorney</a>
                                <div class="dropdown-lists full">
                                    <ul>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
                                        <li><a href="#">Lorem ipsum.</a></li>
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
            <div class="grid-x grid-margin-x case-lists">
                <?php 
                    $query = new WP_Query( array(
                        'post_type' => 'case-study',
                        'post_status' => 'publish',
                        'posts_per_page' => 6,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'case-studies',
                                'field'    => 'term_id',
                                'terms'    => get_queried_object()->term_id
                            ),
                        ),
                    ));
                    
                    $countCases = $query->post_count();

                    while ($query->have_posts()) : $query->the_post();
                ?>

                    <div class="cell small-12 medium-4 case-item">
                        <article>
                            <div class="case-thumbnail">
                                <?php $controlThumbnail = get_field('cs_thumbnail'); ?>
                                <img src="<?= esc_url( $controlThumbnail['url'] ); ?>" alt="<?= esc_attr( $controlThumbnail['alt'] ); ?>" title="<?= esc_attr( $controlThumbnail['alt'] ); ?>">
                            </div>
                            <div class="case-content">
                                <div class="category-lists">
                                    <?php 
                                        $controlPostCategory = get_the_terms(get_the_ID(), 'case-studies');
                                        
                                    ?>
                                    <?php if ($controlPostCategory): ?>
                                        <?php 
                                            $postCategoryLength = count($controlPostCategory);
                                            $postCtr = 1;
                                            foreach ($controlPostCategory as $pc): ?>
                                            
                                            <a href="<?= get_term_link($pc->term_id); ?>"><small><?= $pc->name ?><?= $postCtr != $postCategoryLength ? ',' :''; ?></small></a>
                                        <?php $postCtr++; endforeach; ?>
                                    <?php endif ?>
                                   
                                    
                                </div>
                                
                                <h2><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><b>Issue:</b> <?= strip_tags(get_field('cs_issue')) ?></p>
                            </div>
                        </article>
                    </div>

                <?php endwhile; wp_reset_postdata(); ?>
                
            </div>
             <?php if ($countCases > 6): ?>
                <div class="text-center">
                    <div id="post-pagination" style="display: none"><?= paginate_links(); ?></div>
                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="javascript:;" id="loadMorePosts">SEE MORE</a>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>
</main>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    $(function(){
        $('.case-lists').isotope({
            itemSelector: '.case-item',
            percentPosition: true,
            // masonry: {
           //   columnWidth: '.grid-sizer'
            // }
        })
    })
</script>


<?php

get_footer();