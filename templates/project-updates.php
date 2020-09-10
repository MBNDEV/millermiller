<?php
/**
	Template Name: Attorneys Template
 */

get_header();
?>

<main id="content">
	<?php
	while ( have_posts() ) : the_post();
		
		the_content();

	endwhile; // End of the loop.
	?>



        <div class="proj-up-filter blog-filter">
            <div class="grid-container">
                <div class="grid-x grid-margin-x align-middle text-center medium-text-left">
                    <div class="cell auto position-relative">
                        <div class="button-dropdown">
                            <a href="javascript:;" class="button-filter">Filter by County</a>
                            <div class="dropdown-lists">
                                <ul>
                                   <li><a href="#">Anne Arundel County</a></li>
                                   <li><a href="#">Baltimore City</a></li>
                                   <li><a href="#">Howard County</a></li>
                                   <li><a href="#">Montgomery County</a></li>
                                   <li><a href="#">Prince George’s County</a></li>
                                   <li><a href="#">St. Mary’s County</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="attorneys-list">
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                
                </div>
            </div>
        </div>

</main>

<?php

get_footer();
