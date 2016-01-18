<?php
if ( $overridden_template = locate_template( 'archive-businesses.php' ) ) {
	 // locate_template() returns path to file
	 // if either the child theme or the parent theme have overridden the template
	 load_template( $overridden_template );
 } else {

	get_header();

	echo '<h1 class="entry-title">Businesses</h1>';

	$letter = get_query_var( 'letter', '' );
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$business_args = array(
		'post_type' => 'businesses',
		'orderby' => 'title',
		'order' => 'ASC',
		'paged' => $paged,
		'posts_per_page' => 20
	);
	$business_query = new WP_Query( $business_args );
	$big = 999999999; // need an unlikely integer

	if (!$letter) {
		echo '<div class="smooth-pagination"><strong>Pages: </strong>';
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $business_query->max_num_pages
		) );
		echo '</div>';
	}

	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/filter-row.php';

	echo '<ul class="smooth-directory">';

	if ( $letter ) {
		$abc_results = $wpdb->get_results(
			"
			SELECT * FROM $wpdb->posts
			WHERE post_title LIKE '$letter%'
			AND post_type = 'businesses'
			AND post_status = 'publish';
			"
		);

		foreach ( $abc_results as $post ) {
			setup_postdata ( $post ); ?>
			<li class="smooth-directory__item">
				<?php
				$contact_value = get_post_meta( get_the_ID(), 'meta_business_contact', true );
				$email_value = get_post_meta( get_the_ID(), 'meta_business_email', true );
				$description_value = get_post_meta( get_the_ID(), 'meta_business_description', true );
				$website_value = get_post_meta( get_the_ID(), 'meta_business_website', true );
				$phone_value = get_post_meta( get_the_ID(), 'meta_business_phone', true );
				$address_value = get_post_meta( get_the_ID(), 'meta_business_address', true );
				$city_value = get_post_meta( get_the_ID(), 'meta_business_city', true );
				$state_value = get_post_meta( get_the_ID(), 'meta_business_state', true );
				$zip_value = get_post_meta( get_the_ID(), 'meta_business_zip', true );
				?>

				<?php if (get_the_title()) {
					echo '<h3>';
					the_title();
					echo '</h3>';
				} ?>

				<div class="smooth-directory__interior">
					<p>
						<?php
						if (has_post_thumbnail()) {
              the_post_thumbnail('business-thumb');
            }

						if ($contact_value) {
							echo '<strong>';
							echo $contact_value;
							echo '</strong>';
						}

						if ($address_value) {
							echo '<br>';
							echo $address_value;
						}

						if ($city_value) {
							echo '<br>';
							echo $city_value;
						}

						if ($state_value) {
							echo ', ';
							echo $state_value;
						}

						if ($zip_value) {
							echo ' ';
							echo $zip_value;
						}

						if ($phone_value) {
							echo '<br><strong>';
							echo $phone_value;
							echo '</strong>';
						}

						if ($website_value) {
							echo '<br>';
							echo '<a href="' . $website_value . '">' . $website_value . '</a>';
						}

						if ($email_value) {
							echo '<br>';
							echo $email_value;
						}
						?>
					</p>

					<p><?php echo get_post_meta( get_the_ID(), 'meta_business_description', true ); ?></p>
				</div>
			</li>

		<?php }
	} else if ( $business_query->have_posts() ) {
		while ( $business_query->have_posts() ) {

		$business_query->the_post(); ?>
			<li class="smooth-directory__item">
				<?php
				$contact_value = get_post_meta( get_the_ID(), 'meta_business_contact', true );
				$email_value = get_post_meta( get_the_ID(), 'meta_business_email', true );
				$description_value = get_post_meta( get_the_ID(), 'meta_business_description', true );
				$website_value = get_post_meta( get_the_ID(), 'meta_business_website', true );
				$phone_value = get_post_meta( get_the_ID(), 'meta_business_phone', true );
				$address_value = get_post_meta( get_the_ID(), 'meta_business_address', true );
				$city_value = get_post_meta( get_the_ID(), 'meta_business_city', true );
				$state_value = get_post_meta( get_the_ID(), 'meta_business_state', true );
				$zip_value = get_post_meta( get_the_ID(), 'meta_business_zip', true );
				?>

				<?php if (get_the_title()) {
					echo '<h3>';
					the_title();
					echo '</h3>';
				} ?>

				<div class="smooth-directory__interior">
					<p>
						<?php
						if (has_post_thumbnail()) {
              the_post_thumbnail('business-thumb');
            }

						if ($contact_value) {
							echo '<strong>';
							echo $contact_value;
							echo '</strong>';
						}

						if ($address_value) {
							echo '<br>';
							echo $address_value;
						}

						if ($city_value) {
							echo '<br>';
							echo $city_value;
						}

						if ($state_value) {
							echo ', ';
							echo $state_value;
						}

						if ($zip_value) {
							echo ' ';
							echo $zip_value;
						}

						if ($phone_value) {
							echo '<br><strong>';
							echo $phone_value;
							echo '</strong>';
						}

						if ($website_value) {
							echo '<br>';
							echo '<a href="' . $website_value . '">' . $website_value . '</a>';
						}

						if ($email_value) {
							echo '<br>';
							echo $email_value;
						}
						?>
					</p>

					<p><?php echo get_post_meta( get_the_ID(), 'meta_business_description', true ); ?></p>
				</div>
			</li>
	<?php }
	echo '</ul>';

	if (!$letter) {
		echo '<div class="smooth-pagination"><strong>Pages: </strong>';
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $business_query->max_num_pages
		) );
		echo '</div>';
	}
	}

	get_footer();

}

?>
