<?php
/**
	Template Name: Search Results Template
 */

get_header();
?>

<main id="content">

	<div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg">Search Results</h1>
        </div>
    </div>

    <div class="grid-container">


 		<div class="grid-x grid-margin-x align-center blog-lists margin-top-3 padding-top-3">

 			<?php 
 				$searchTerm = $_GET['search'];
 				$searchPost = $_GET['type'];
			    $query = new WP_Query( array(
			    	's' => $searchTerm,
			        'post_type' => array( $searchPost ),
			        'post_status' => 'publish',
			        'posts_per_page' => -1,
			        'orderby' => 'name',
			        'order' => 'ASC',
			    ));
			    while ($query->have_posts()) : $query->the_post();
			?>
    			<div class="cell small-4 medium-4">
    				<article class="margin-bottom-3">
                        <div class="wp-block-image">
                        	<?php if (get_the_post_thumbnail()): ?>
		                        <?php the_post_thumbnail(); ?>
		                    <?php elseif (get_field('cs_thumbnail')): ?>
		                     	<?php $controlThumbnail = get_field('cs_thumbnail'); ?>
	            				<img src="<?= esc_url( $controlThumbnail['url'] ); ?>" alt="<?= esc_attr( $controlThumbnail['alt'] ); ?>" title="<?= esc_attr( $controlThumbnail['alt'] ); ?>">
		                    <?php else: ?>
		                        <img width="214" height="87" src="/wp-content/uploads/2020/08/mmc_logo.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="mmc_logo">
		                        
		                    <?php endif ?>
                        </div>
                        <h6><?= get_post_type() == 'case-study' ? 'Case Studdy' : 'News'; ?></h6>
                        <h5><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <?php if (get_the_category(get_the_ID())): ?>
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
                        	
                        <?php endif ?>
                        
                        <?php if (get_field('cs_issue')): ?>
                        	<small><b>Issue:</b> 
                                    <?php
                                        $sContent = strip_tags(get_field('cs_issue')); 
                                        $sContent = substr( $sContent, 0, 200 );
                                        $sContent = substr( $sContent, 0, strrpos( $sContent, ' ' ) );
                                        echo $sContent;
                                    ?>...<a href="<?= get_the_permalink(); ?>" class="readmore-link">read more →</a></small>
                        <?php endif ?>
					</article>
    			</div>
    		<?php endwhile; wp_reset_postdata(); ?>
    	</div>
    </div>
	
</main>

<?php

get_footer();
