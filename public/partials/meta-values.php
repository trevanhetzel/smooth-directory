<?php

/**
 * A public facing partial for storing meta values in variables
 *
 * @link       http://trevan.co
 * @since      1.0.0
 *
 * @package    Smooth_Directory
 * @subpackage Smooth_Directory/public/partials
 */
?>

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
$logo_value = get_post_meta( get_the_ID(), 'meta_business_logo', true );
?>
