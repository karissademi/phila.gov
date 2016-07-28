<?php
/*
 *
 * Partial for rendering Hero Header Content
 *
 */

?>

<?php
  // Set hero-header vars
  $hero_header_image = rwmb_meta( 'phila_hero_header_image', $args = array('type' => 'file_input'));
  $hero_header_alt_text = rwmb_meta( 'phila_hero_header_image_alt_text', $args = array('type' => 'text'));
  $hero_header_credit = rwmb_meta( 'phila_hero_header_image_credit', $args = array('type' => 'text'));

  //TODO: depricate this var and related field
  $hero_header_title = rwmb_meta( 'phila_hero_header_title', $args = array('type' => 'text'));

  $hero_header_title_l1 = rwmb_meta( 'phila_hero_header_title_l1', $args = array('type' => 'text'));
  $hero_header_title_l2 = rwmb_meta( 'phila_hero_header_title_l2', $args = array('type' => 'text'));
  $hero_header_body_copy = rwmb_meta( 'phila_hero_header_body_copy', $args = array('type' => 'textarea'));
  $hero_header_call_to_action_button_url = rwmb_meta( 'phila_hero_header_call_to_action_button_url', $args = array('type' => 'URL'));
  $hero_header_call_to_action_button_text = rwmb_meta( 'phila_hero_header_call_to_action_button_text', $args = array('type' => 'text'));
?>
<div class="emphasis measureline1"><?php echo $hero_header_title_l1; ?></div>
<div class="emphasis measureline2"><?php echo $hero_header_title_l2; ?></div>

<?php if (!$hero_header_image == ''): ?>
<!-- Hero-Header MetaBox Modules -->
<div class="row mtm">
  <div class="small-24 columns">
    <section class="department-header">
      <img id="header-image" class="size-full wp-image-4069" src="<?php echo $hero_header_image; ?>" alt="<?php echo $hero_header_alt_text;?>" width="975" height="431" />
      <?php if (!$hero_header_credit == ''): ?>
        <div class="photo-credit small-text">
          <span><i class="fa fa-camera" aria-hidden="true"></i> Photo by <?php echo $hero_header_credit; ?></span>
        </div>
      <?php endif; ?>
    <?php if (!$hero_header_title == '' || !$hero_header_title_l1 == '' || !$hero_header_title_l2 == '' ): ?>
      <div class="intro row">
        <div class="column">

          <h1>
            <?php if (!$hero_header_title == ''):
                    echo $hero_header_title;
                  else:?>
                    <span class="tagline1">
                      <?php echo $hero_header_title_l1; ?>
                    </span>
                    <span class="tagline2 emphasis">
                      <?php echo $hero_header_title_l2; ?>
                    </span>
            <?php endif;?>
          </h1>
          <?php if (!$hero_header_body_copy == ''): ?>
            <p><?php echo $hero_header_body_copy; ?></p>
          <?php endif; ?>
          <?php if (!$hero_header_call_to_action_button_url == ''): ?>
            <p><a href="<?php echo $hero_header_call_to_action_button_url; ?>" class="button alternate no-margin"><?php echo $hero_header_call_to_action_button_text; ?></a></p>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
    </section>
  </div>
</div>
<?php endif; ?>
