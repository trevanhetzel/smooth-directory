<?php
if ( $overridden_template = locate_template( 'taxonomy-business_category.php' ) ) {
   // locate_template() returns path to file
   // if either the child theme or the parent theme have overridden the template
   load_template( $overridden_template );
 } else {

  get_header();

  echo '<h1 class="entry-title">Businesses</h1>';

  require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/filter-row.php';

  echo '<ul class="smooth-directory">';

  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>
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

        if (get_the_title()) {
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
              echo $website_value;
            }

            if ($email_value) {
              echo '<br>';
              echo $email_value;
            }
            ?>
          </p>

          <p><?php echo get_post_meta( $post->ID, 'meta_business_description', true ); ?></p>
        </div>
      </li>
      <?php }
    } ?>
    </ul>
    </div>
  </div>

  <?php get_footer();

}

?>
