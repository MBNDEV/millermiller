<?php
/**
	Template Name: Block - No Subs Template
 */

get_header();
?>

<main id="content">
	<?php
	while ( have_posts() ) : the_post();
		
		the_content();

	endwhile; // End of the loop.
	?>
</main>

<?php

get_footer();
