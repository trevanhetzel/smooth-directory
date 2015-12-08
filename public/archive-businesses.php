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

  echo '<div class="smooth-filter-row"><div class="smooth-filter-row__letters"><strong>Business Name: </strong>'; ?>

  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=a">A</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=b">B</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=c">C</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=d">D</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=e">E</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=f">F</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=g">G</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=h">H</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=i">I</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=j">J</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=k">K</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=l">L</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=m">M</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=n">N</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=o">O</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=p">P</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=q">Q</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=r">R</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=s">S</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=t">T</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=u">U</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=v">V</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=w">W</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=x">X</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=y">Y</a>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses?letter=z">Z</a>
  <span>|</span>
  <a href="<?php echo esc_url( home_url() ); ?>/businesses">All</a>
  </div>

  <?php echo '<div class="smooth-filter-row__cat"><strong>Category:</strong>';
  $taxonomies = array( 
     'business_category'
  );

  $taxArgs = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'hide_empty'        => true
  ); 

  $taxTerms = get_terms($taxonomies, $taxArgs);

  if ( ! empty( $taxTerms ) && ! is_wp_error( $taxTerms ) ){
    echo '<select id="smooth-filter-cat">';
    foreach ( $taxTerms as $term ) {
      echo '<option value="' . get_term_link($term) . '">' . $term->name . '</option>';
    }
    echo '</select></div>';
  }

  echo '</div>';

  echo '<ul class="smooth-directory">';

  function business_get_featured_image( $logo_value ) {
    $new_logo = $logo_value;
    // Get the file extension. We'll need to append this in a second.
    $img_extension = pathinfo( $new_logo, PATHINFO_EXTENSION );

    // Chop off the file extension.
    $new_logo = preg_replace( '/\\.[^.\\s]{3,4}$/', '', $new_logo );

    // Add the text required to select the proper crop and add our file extension back.
    $new_logo = $new_logo . '-150x100.' . $img_extension;

    // Return the cropped featured image.
    return $new_logo;
  }

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
        $logo_value = get_post_meta( get_the_ID(), 'meta_business_logo', true );

        if ($logo_value) {
          $featured_logo = business_get_featured_image( $logo_value );
        }
        ?>

        <?php if (get_the_title()) { 
          echo '<h3>';
          the_title();
          echo '</h3>';
        } ?>

        <div class="smooth-directory__interior">
          <p>
            <?php
            if ($logo_value) {
              echo '<img src="';
              echo $featured_logo;
              echo '">';
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
        $logo_value = get_post_meta( get_the_ID(), 'meta_business_logo', true );

        if ($logo_value) {
          $featured_logo = business_get_featured_image( $logo_value );
        }
        ?>

        <?php if (get_the_title()) { 
          echo '<h3>';
          the_title();
          echo '</h3>';
        } ?>

        <div class="smooth-directory__interior">
          <p>
            <?php
            if ($logo_value) {
              echo '<img src="';
              echo $featured_logo;
              echo '">';
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
