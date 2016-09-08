<?php
if ( $overridden_template = locate_template( 'single-businesses.php' ) ) {
	 // locate_template() returns path to file
	 // if either the child theme or the parent theme have overridden the template
	 load_template( $overridden_template );
 } else {

	get_header();

	$contact_value = get_post_meta( get_the_ID(), 'meta_business_contact', true );
	$email_value = get_post_meta( get_the_ID(), 'meta_business_email', true );
	$description_value = get_post_meta( get_the_ID(), 'meta_business_description', true );
	$website_value = get_post_meta( get_the_ID(), 'meta_business_website', true );
	$phone_value = get_post_meta( get_the_ID(), 'meta_business_phone', true );
	$address_value = get_post_meta( get_the_ID(), 'meta_business_address', true );
	$city_value = get_post_meta( get_the_ID(), 'meta_business_city', true );
	$state_value = get_post_meta( get_the_ID(), 'meta_business_state', true );
	$zip_value = get_post_meta( get_the_ID(), 'meta_business_zip', true );

	if (get_the_title()) {
		echo '<h1 class="entry-title">';
		the_title();
		echo '</h1>';
	}

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

	echo '<p>' . get_post_meta( get_the_ID(), 'meta_business_description', true ) . '</p>';

	get_footer();

}

?>
