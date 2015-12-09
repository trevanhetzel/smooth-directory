<?php

/**
 * A public facing partial for the directory filter row
 *
 * @link       http://trevan.co
 * @since      1.0.0
 *
 * @package    Smooth_Directory
 * @subpackage Smooth_Directory/public/partials
 */
?>

<div class="smooth-filter-row"><div class="smooth-filter-row__letters"><strong>Business Name: </strong>

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

<div class="smooth-filter-row__cat"><strong>Category:</strong>

<?php $taxonomies = array( 
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

echo '</div>'; ?>
