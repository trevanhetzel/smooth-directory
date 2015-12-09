<?php
if ( $overridden_template = locate_template( 'taxonomy-businesses_category.php' ) ) {
   // locate_template() returns path to file
   // if either the child theme or the parent theme have overridden the template
   load_template( $overridden_template );
 } else {

  get_header();

  echo '<h1 class="entry-title">Businesses</h1>';

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

    if ( have_posts() ) {
      while ( have_posts() ) {
        
      the_post(); ?>
        <li class="smooth-directory__item">
          <?php
          $contact_value = get_post_meta( $post->ID, 'meta_business_contact', true );
          $email_value = get_post_meta( $post->ID, 'meta_business_email', true );
          $description_value = get_post_meta( $post->ID, 'meta_business_description', true );
          $website_value = get_post_meta( $post->ID, 'meta_business_website', true );
          $phone_value = get_post_meta( $post->ID, 'meta_business_phone', true );
          $address_value = get_post_meta( $post->ID, 'meta_business_address', true );
          $city_value = get_post_meta( $post->ID, 'meta_business_city', true );
          $state_value = get_post_meta( $post->ID, 'meta_business_state', true );
          $zip_value = get_post_meta( $post->ID, 'meta_business_zip', true );
          $logo_value = get_post_meta( $post->ID, 'meta_business_logo', true );
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
                echo $logo_value;
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

            <p><?php echo get_post_meta( $post->ID, 'meta_business_description', true ); ?></p>
          </div>
        </li>
        <?php } } ?>
      </ul>
    </div>
  </div>

  get_footer();

}

?>
