<?php

/**
 * Provide the view for a metabox
 *
 * @link 		http://slushman.com
 * @since 		1.0.0
 *
 * @package 	Smooth_Directory
 * @subpackage 	Smooth_Directory/admin/partials
 */

// Add a nonce field so we can check for it later.
wp_nonce_field( $this->plugin_name, 'business_meta_box_nonce' );

/*
* Use get_post_meta() to retrieve an existing value
* from the database and use the value for the form.
*/
$contact_value = get_post_meta( $post->ID, 'meta_business_contact', true );
$email_value = get_post_meta( $post->ID, 'meta_business_email', true );
$description_value = get_post_meta( $post->ID, 'meta_business_description', true );
$website_value = get_post_meta( $post->ID, 'meta_business_website', true );
$phone_value = get_post_meta( $post->ID, 'meta_business_phone', true );
$address_value = get_post_meta( $post->ID, 'meta_business_address', true );
$address2_value = get_post_meta( $post->ID, 'meta_business_address2', true );
$city_value = get_post_meta( $post->ID, 'meta_business_city', true );
$state_value = get_post_meta( $post->ID, 'meta_business_state', true );
$zip_value = get_post_meta( $post->ID, 'meta_business_zip', true );
?>

<table class="form-table">
	<tbody>
		<tr>
			<th scope="row">
				<label for="business_contact"><?php _e( 'Contact person', '' ); ?></label>
			</th>
			<td>
				<input type="text" name="business_contact" id="business_contact" value="<?php echo esc_attr( $contact_value ); ?>" class="regular-text ltr">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="business_email"><?php _e( 'Email', '' ); ?></label>
			</th>
			<td>
				<input class="regular-text ltr" type="text" name="business_email" id="business_email" value="<?php echo esc_attr( $email_value ); ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="business_description"><?php _e( 'Description', '' ); ?></label>
			</th>
			<td>
				<textarea class="regular-textarea ltr" name="business_description" id="business_description" rows="4"><?php echo esc_attr( $description_value ); ?></textarea>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="business_website"><?php _e( 'Website', '' ); ?></label>
			</th>
			<td>
				<input class="regular-text ltr" type="text" name="business_website" id="business_website" value="<?php echo esc_attr( $website_value ); ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="business_phone"><?php _e( 'Phone', '' ); ?></label>
			</th>
			<td>
				<input class="regular-text ltr" type="text" name="business_phone" id="business_phone" value="<?php echo esc_attr( $phone_value ); ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="business_address"><?php _e( 'Address', '' ); ?></label>
			</th>
			<td>
				<input class="regular-text ltr" type="text" name="business_address" id="business_address" value="<?php echo esc_attr( $address_value ); ?>">
				<input class="regular-text ltr" type="text" name="business_address2" id="business_address2" value="<?php echo esc_attr( $address2_value ); ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="business_city"><?php _e( 'City', '' ); ?></label>
			</th>
			<td>
				<input class="regular-text ltr" type="text" name="business_city" id="business_city" value="<?php echo esc_attr( $city_value ); ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="business_state"><?php _e( 'State', '' ); ?></label>
			</th>
			<td>
				<input class="regular-text ltr" type="text" name="business_state" id="business_state" value="<?php echo esc_attr( $state_value ); ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="business_zip"><?php _e( 'ZIP', '' ); ?></label>
			</th>
			<td>
				<input class="regular-text ltr" type="text" name="business_zip" id="business_zip" value="<?php echo esc_attr( $zip_value ); ?>">
			</td>
		</tr>
	</tbody>
</table>
