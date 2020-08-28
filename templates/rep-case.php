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

    <style>
        
    </style>    


    <div class="grid-container">
        <div class="grid-x grid-margin-x rep-case-lists">
            <div class="medium-6 large-6 cell grid-item">
                <div class="box grid-x grid-padding-x margin-bottom-2">
                    <div class="cell small-6">
                        <div class="thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/case-before-1.jpg" alt="">
                            <span>Before</span>
                        </div>
                    </div>
                    <div class="cell small-6">
                        <div class="thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/case-after-1.jpg" alt="">
                            <span>Before</span>
                        </div>
                    </div>
                </div>
                <h2 class="margin-bottom-2">Industrial & Residentially Zoned - Unimproved Property</h2>
                <h3>Montgomery County, MD</h3>
                <ul>
                    <li>Initial Offer:</li>
                    <li>$3,750,000</li>
                </ul>
                <ul>
                    <li>Final Award:</li>
                    <li>$8,545,000</li>
                </ul>
                <p>Montgomery County condemned 82.12 acres of industrial and residentially zoned undeveloped property located in the NW quadrant of I-270 and Rt. 121 for the purpose of the North County Depot Project. </p>
            </div>
            <div class="medium-6 large-6 cell grid-item">
                <div class="box grid-x grid-padding-x margin-bottom-2">
                    <div class="cell small-6">
                        <div class="thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/case-before-1.jpg" alt="">
                            <span>Before</span>
                        </div>
                    </div>
                    <div class="cell small-6">
                        <div class="thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/case-after-1.jpg" alt="">
                            <span>Before</span>
                        </div>
                    </div>
                </div>
                <h2 class="margin-bottom-2">Industrial & Residentially Zoned - Unimproved Property</h2>
                <h3>Montgomery County, MD</h3>
                <ul>
                    <li>Initial Offer:</li>
                    <li>$3,750,000</li>
                </ul>
                <ul>
                    <li>Final Award:</li>
                    <li>$8,545,000</li>
                </ul>
                <p>Montgomery County condemned 82.12 acres of industrial and residentially zoned undeveloped property located in the NW quadrant of I-270 and Rt. 121 for the purpose of the North County Depot Project. </p>
            </div>

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
