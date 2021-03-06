<?php
/*
 *
 * Link to survey
 *
 */

?>
<?php
  $cta_link = rwmb_meta( 'phila_v2_cta_full' );
  $link = phila_cta_full_display( $cta_link );
?>
<?php if ( !empty( $link ) ) :?>
  <div class="row mvxl">
    <div class="columns panel <?php echo (!empty( $link['is_survey'] ) ) ? 'survey' : '' ?>">
      <div class="row equal-height">
        <div class="small-24 medium-16 columns valign equal">
          <div class="valign-cell">
            <?php if ( !empty( $link['title'] ) ) : ?>
              <h3 class="mbn"><?php echo $link['title'] ?></h3>
            <?php endif; ?>
            <?php if ( !empty( $link['description'] ) ) : ?>
              <p class="mts"><?php echo $link['description'] ?></p>
            <?php endif; ?>
          </div>
        </div>
        <?php if ( !empty( $link['url'] ) ) : ?>
        <div class="small-24 medium-8 columns valign equal center">
          <div class="valign-cell">
            <a href="<?php echo $link['url'] ?>" class="button <?php echo ( !empty($link['external']) ) ? 'icon ' : '';?> clearfix float-right">
              <?php if ( !empty( $link['link_text'] ) ) :?>
              <div class="valign">
                <?php if ( $link['external'] == 1 ) :?>
                  <i class="fa fa-external-link" aria-hidden="true"></i>
                  <span class="accessible">External link</span>
                  <?php endif; ?>
                  <div class="button-label valign-cell">
                    <?php echo $link['link_text']?>
                  </div>
                </div>
              <?php endif; ?>
            </a>
          </div>
        </div>
      <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif;?>
