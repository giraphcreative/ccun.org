<?php



// add credit unions menu to dashboard
function cu_admin_menu() {
	add_menu_page(
		__( 'Credit Unions', 'credit-unions' ),
		__( 'Credit Unions', 'credit-unions' ),
		'manage_options',
		'credit-unions',
		'admin_credit_unions',
		'dashicons-location',
		22
	);
}

add_action( 'admin_menu', 'cu_admin_menu' );



// the admin interface to list credit unions and their statistics
function admin_credit_unions() {
	$cus = get_credit_unions();
	?>
	<style>
	.credit-union-listing {
		padding: 0 0 40px;
	}
	.credit-union-listing table {
		border: 1px solid #ccc;
		border-bottom: 0;
	}
	.credit-union-listing th {
		text-align: left;
		background: #ddd;
		padding: 7px 10px;
	}
	.credit-union-listing td {
		background: #eee;
		padding: 7px 10px;
		border-bottom: 1px solid #ccc;
	}
	</style>
	<div class="wrap">
		<h1 class="wp-heading-inline"><?php esc_html_e( 'Credit Union Directory', 'credit-unions' ); ?></h1>
		<hr />
		<p>Below is a complete list of all the credit unions currently in the database.</p>
		<div class="credit-union-listing">
		<table cellspacing=0 border=0 style="width:100%;">
			<tr><th>ID</th><th>CU Info</th><!--<th>Applicable Zipcodes</th>--><th>Website</th></tr>
			<?php
			if ( !empty( $cus ) ) {
				foreach ( $cus as $cu ) {
					?>
			<tr valign="top">
				<td><?php print $cu->cu_id; ?></td>
				<td><strong><?php print $cu->cu_name; ?></strong><br>
					<?php print $cu->cu_address; ?><br>
					<?php print $cu->cu_city; ?>, <?php print $cu->cu_state; ?> <?php print $cu->cu_zip; ?><br>
					<?php print $cu->cu_phone; ?></td>
				<!--<td><?php print $cu->cu_zips; ?></td>-->
				<td><a href="<?php print $cu->cu_website; ?>" target="_blank">Website</a></td>
			</tr>
					<?php
				}
			}
			?>
		</table>
		<p><strong>Total Credit Unions:</strong> <?php print count( $cus ); ?></p>
		</div>
		<h1 class="wp-heading-inline">List Update Information</h1>
		<hr />
		<p>To update the list of credit unions in this table of the database, please provide a file containing the following fields to the developer (<a href="mailto:james@jpederson.com">james@jpederson.com</a>):</p>
		<ul style="list-style-type: disc; padding-left: 30px;">
			<li>name</li>
			<li>address</li>
			<li>city</li>
			<li>state</li>
			<li>zipcode</li>
			<li>phone</li>
			<li>applicable zipcodes (all of the zipcodes for which that CU should show up)</li>
			<li>website</li>
		</ul>
		<a href="<?php bloginfo('template_url') ?>/example/cu-import.csv" class="button action">Example Import File (CSV)</a> <a href="<?php bloginfo('template_url') ?>/example/cu-import.xls" class="button action">Example Import File (XLS)</a>
	</div>
	<?php
}



// select all the credit unions in the table.
function get_credit_unions() {
	global $wpdb;
	return $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}credit_unions ORDER BY `cu_name`;", OBJECT );
}


