<?php
/**
	Template Name: Representative Cases Template
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

            <?php if (isset($_GET['case-attorney'])): ?>

                <?php 
                     $attorney = array(
                        'post_type' => 'attorney',
                        'post_status' => 'publish',
                        'p' => $_GET['case-attorney'],
                        'posts_per_page' => -1,
                    );

                    $uniqueCase = [];

                    $query = new WP_Query( $attorney );
                    while ($query->have_posts()) : $query->the_post();
                        $repCase = get_field('fa_representative_cases_items');

                        foreach( $repCase as $post ):  setup_postdata($post);

                 ?>

                        <?php if (!in_array(get_the_ID(), $uniqueCase)): ?>
                            <?php $uniqueCase[] = get_the_ID(); ?>

                            <div class="medium-6 large-6 cell grid-item">
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

                        
                    <?php endforeach; ?>

                <?php endwhile; wp_reset_postdata(); ?>

            <?php else: ?>

                <?php 
                    $attorney =  array(
                        'post_type' => 'attorney',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                    );

                    $query = new WP_Query( $attorney );
                    while ($query->have_posts()) : $query->the_post();
                 ?>
                    <div class="medium-6 large-6 cell grid-item">
                        <div class="box grid-x grid-padding-x margin-bottom-2">
                            <div class="cell small-6">
                                <div class="thumb">
                                    <?php $controlImageBefore = get_field('crf_before_image'); ?>
                                    <?php if ($controlImageBefore): ?>
                                        <img src="<?= esc_url( $controlImageBefore['url'] ); ?>" alt="<?= esc_attr( $controlImageBefore['alt'] ); ?>"  title="<?= esc_attr( $controlImageBefore['alt'] ); ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/450x242/f0f0f0/cccccc?text=[no+thumnail]" alt="placeholder" title="placeholder" />
                                    <?php endif ?>
                                    
                                    <span><?= get_field('crf_before_image_text') ?></span>
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
                                    
                                    <span><?= get_field('crf_after_image_text'); ?></span>
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



                <?php endwhile; wp_reset_postdata(); ?>
            <?php endif ?>
                    

        </div>
    </div>
    

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
