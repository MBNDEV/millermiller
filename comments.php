
<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	comment_form();
	if ( have_comments() ) :
		?>

		<?php the_comments_navigation(); ?>



		<ul class="comment-list">
			<?php
				// wp_list_comments(
				// 	array(
				// 		'max_depth' => 5,
				// 		'short_ping' => true,
				// 		'avatar_size' => 90,
				// 	)
				// );
			?>
			<?php wp_list_comments('type=comment&callback=html5blankcomments'); // Custom callback in functions.php ?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', '_s' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	
	?>

</div>