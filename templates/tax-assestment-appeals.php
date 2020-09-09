<?php
/**
	Template Name: Tax Assestment Appeals
 */

get_header();
?>

<main id="content">
	<?php
	while ( have_posts() ) : the_post();
		
		the_content();

	endwhile; // End of the loop.
	?>


    <div class="grid-container margin-vertical-3">
        <div class="grid-x grid-margin-x rep-case-lists">

            <?php 
                $attorney =  array(
                    'post_type' => 'tax-assestment-appeal',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                );

                $query = new WP_Query( $attorney );

                $countQuery = $query->found_posts;

                //$queryCount = wp_count_posts($query);
                while ($query->have_posts()) : $query->the_post();
             ?>
                <div class="medium-6 large-6 cell grid-item">
                    <div class="box grid-x grid-padding-x margin-bottom-2">
                        <div class="cell small-12">
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
                    </div>
                    <h2 class="margin-bottom-2"><?php the_title(); ?></h2>
                    <h3><?php the_field('crf_location') ?></h3>
                    <ul>
                        <li>Original Assessment:</li>
                        <li><?php the_field('crf_initial_offer') ?></li>
                    </ul>
                    <ul>
                        <li>Assessment After Appeal:</li>
                        <li><?php the_field('crf_final_award') ?></li>
                    </ul>
                    <p><?php the_field('crf_short_description') ?></p>
                </div>

            <?php endwhile; wp_reset_postdata(); ?>

            <?php if ($countQuery >= 6 || count($uniqueCase) >= 6): ?>
                <div class="medoum-12 large-12 cell text-center control-addmore">
                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="javascript:;" id="loadMorePosts">SEE MORE</a>
                    </div>
                </div>
            <?php endif ?>
                    

        </div>
    </div>
    

	<section class="sec-subscribe wow fadeInUp">
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


<script>
    $(function(){
        size_li = $(".rep-case-lists .grid-item").length;
        show_lists = 6;
        $(".rep-case-lists .grid-item:lt(" + show_lists + ")").show();
        $('#loadMorePosts').click(function () {

            show_lists = (show_lists + 6 <= size_li) ? show_lists + 6 : size_li;
            $('.rep-case-lists .grid-item:lt('+ show_lists +')').show();

            var displayedItems = $(".rep-case-lists .grid-item:visible").length;
            if (size_li == displayedItems) {
                $('.control-addmore').hide();
            }
        });


    });
</script>


<?php

get_footer();
