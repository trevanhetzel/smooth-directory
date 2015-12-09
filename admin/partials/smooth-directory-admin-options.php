<?php

/**
 * Provide the form for the settings page
 *
 * @link    http://trevan.co
 * @since     1.0.0
 *
 * @package   Smooth_Directory
 * @subpackage  Smooth_Directory/admin/partials
 */

?>

<div class="wrap">
  <h2>Smooth Directory Settings</h2>

  <form method="post" action="options.php">
    <?php settings_fields( 'business_group' ); ?>
    <?php do_settings_sections( 'business_group' ); ?>

    <h3 class="title">Colors</h3>

    <table class="form-table">
      <tbody>
        <tr>
          <th><label for="business_setting_header_bg">Header background</label></th>
          <td><input name="business_setting_header_bg" id="business_setting_header_bg" type="text" class="regular-text" value="<?php echo get_option('business_setting_header_bg'); ?>"></td>
        </tr>
      </tbody>
    </table>

    <?php submit_button(); ?>
  </form>
</div>
