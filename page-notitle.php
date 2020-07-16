<?php

/*
Template Name: Page - No Title
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<div class="content-wide" role="main">
		<?php 
		
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		
		the_icon_showcase();

		?>
	</div><!-- #content -->

	<?php the_boxes(); ?>

	<?php the_footer_image(); ?>

<?php

get_footer();

?>