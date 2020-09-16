<?php
/**
	Template Name: Case Studies Template
 */

get_header();
?>

<main id="content">
    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg"><?php the_title(); ?></h1>
        </div>
    </div>
	<div class="blog-filter">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-middle text-center medium-text-left">
                <div class="cell auto position-relative">
                    <div class="button-dropdown">
                        <a href="javascript:;" class="button-filter">Categories</a>
                        <div class="dropdown-lists">
                            <ul>

                            	<?php 
                        		   	$args = array(
						               'taxonomy' => 'case-studies',
						               'orderby' => 'name',
						               'order'   => 'ASC'
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
                    <div class="grid-x align-center medium-align-right hide">
                        <div class="position-relative">
                            <div class="button-dropdown">
                                <a href="#" class="button-filter display-block padding-horizontal-2">filter by attorney</a>
                                <div class="dropdown-lists full">
                                    <ul>
                                        <?php
                                            $currentPageID = get_permalink(13);
                                            $query = new WP_Query( array(
                                                'post_type' => 'attorney',
                                                'post_status' => 'publish',
                                                'posts_per_page' => -1,
                                                'orderby' => 'name',
                                                'order' => 'ASC',
                                            ));
                                            while ($query->have_posts()) : $query->the_post();
                                        ?>
                                            <li><a href="<?= $currentPageID ?>?filter-attorney=<?= get_the_ID(); ?>"><?= get_the_title(); ?></a></li>
                                        <?php endwhile; wp_reset_postdata(); ?>
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
            <div class="grid-x grid-margin-x case-lists align-center">
                <div class="cell medium-12">
                    <form action="">
                        <div class="group-fields">
                            <input type="text">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27.007" viewBox="0 0 27 27.007">
                                    <path id="prefix__icn-search" d="M31.184 29.545l-7.509-7.58a10.7 10.7 0 1 0-1.624 1.645l7.46 7.53a1.156 1.156 0 0 0 1.631.042 1.163 1.163 0 0 0 .042-1.637zM15.265 23.7a8.45 8.45 0 1 1 5.977-2.475 8.4 8.4 0 0 1-5.977 2.475z" transform="translate(-4.5 -4.493)" style="fill:#333"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            	<?php 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $query_limit_items = 9;

                    $attorneyQuery = [];

                    if (isset($_GET['filter-attorney'])) {
                        $attorney = $_GET['filter-attorney'];
                        
                        $attorneyQuery = array(
                            'key'       => 'csa_attorney_assign',
                            'value'     => $attorney
                        );
                    }
                    
				    $query = new WP_Query( array(
				        'post_type'     => 'case-study',
				        'post_status'   => 'publish',
				        'posts_per_page' => $query_limit_items,
                        'paged'         => $paged,
                        'meta_query'    => array( $attorneyQuery )
				    ));
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
	            				<p><b>Issue:</b> 
                                    <?php
                                        $sContent = strip_tags(get_field('cs_issue')); 
                                        $sContent = substr( $sContent, 0, 200 );
                                        $sContent = substr( $sContent, 0, strrpos( $sContent, ' ' ) );
                                        echo $sContent;
                                    ?>...<a href="<?= get_the_permalink(); ?>" class="readmore-link">read more →</a></p>
	            			</div>
	            		</article>
	            	</div>

				<?php endwhile;  ?>
            	
            </div>
             <?php if (paginate_links()): ?>
                <div class="text-center">
                    <div id="post-pagination" style="display: none">
                        <?php paginate_links(); ?>
                    </div>
                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="javascript:;" id="loadMorePosts">SEE MORE</a>
                    </div>
                </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>
</main>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
	$(function(){
		// var $caseList_iso =  $('.case-lists').isotope({
		//   	itemSelector: '.case-item',
		//   	percentPosition: true,
		// });

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


<?php

get_footer();