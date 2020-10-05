<?php

/*
Template Name: Homepage
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<?php the_icon_showcase(); ?>
	
	<!--
	<div class="content-wide home-bottom">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>
	</div>
	-->

	<?php the_boxes(); ?>

	<div class="directory home">
		<div class="directory-search">
			<label>Credit Union Search:</label> <input type="text" name="cu-search" class="cu-search" value="" />
		</div>
		<div class="directory-entries">
		<?php 
		$cus = get_credit_unions();
		if ( !empty( $cus ) ) {
			foreach ( $cus as $cu ) {
			?>
			<div class="entry" data-zipcodes="<?php print $cu->cu_zips ?>" style="display: none;">
				<div class="two-third">
					<h4><?php print $cu->cu_name; ?></h4>
					<?php print $cu->cu_address . "<br>" . $cu->cu_city . ", " . $cu->cu_state . " " . $cu->cu_zip; ?>
				</div>
				<div class="third">
					<a href="<?php print $cu->cu_website; ?>" class="btn">Visit Website</a>
				</div>
			</div>
			<?php
			}
		}
		?>
		</div>
	</div>

	<?php the_footer_image(); ?>

<?php

get_footer();

?>