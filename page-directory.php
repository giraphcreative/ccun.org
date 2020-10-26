<?php

/*
Template Name: Directory Listing
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<div class="content-wide" role="main">
		<?php 
		
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				if ( get_cmb_value( 'layout-title-hide' ) != 'on' ) {
					?>
			<h1 class="post-title"><?php the_title(); ?></h1>
					<?php
				}
				the_content();
				?>
				<div class="directory">
					<div class="directory-search">
						<label>Search:</label> <input type="text" name="cu-search" class="cu-search" value="" />
					</div>
					<div class="directory-entries">
					<?php 
					$cus = get_credit_unions();
					if ( !empty( $cus ) ) {
						foreach ( $cus as $cu ) {
						?>
						<div class="entry" data-zipcodes="<?php print $cu->cu_zips ?>">
							<div class="two-third">
								<h4><?php print $cu->cu_name; ?></h4>
								<?php print $cu->cu_address . "<br>" . $cu->cu_city . ", " . $cu->cu_state . " " . $cu->cu_zip; ?><br>
								<?php print $cu->cu_phone; ?>
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
				<?php
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