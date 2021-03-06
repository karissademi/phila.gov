<?php
/**
 * Display curated service lists on department homepages
 *
 * @package phila-gov
 */
?>

<?php
  $services_list = rwmb_meta( 'phila_v2_homepage_services' );
  $services = phila_loop_clonable_metabox( $services_list );
?>
<?php if ( !empty( $services ) ) :?>
<div class="row mtl">
  <div class="columns">
    <h2>Services</h2>
    <div class="row collapse inside-border-group break-thirds icon-list" data-equalizer>
      <?php foreach ( $services as $service ) : ?>
        <?php $alt_title = isset( $service['alt_title'] ) ? $service['alt_title'] : ''; ?>
        <div class="inside-border-group-item medium-8 small-12 columns">
          <a href="<?php echo get_permalink( $service['phila_v2_service_page'] ) ?>" class="valign">
            <div class="valign-cell pal phl-l" data-equalizer-watch>
              <div><i class="fa <?php echo $service['phila_v2_icon'] ?> fa-2x" aria-hidden="true"></i></div>
              <?php if( $alt_title == '' ) : ?>
                <div><?php echo get_the_title( $service['phila_v2_service_page'] ) ?> </div>
              <?php else: ?>
                <div><?php echo $service['alt_title'] ?> </div>
              <?php endif; ?>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php $all_services = rwmb_meta( 'phila_v2_service_link' ) ?>
<?php if ( $all_services != '' ) :?>
<div class="row mtm">
  <div class="columns">
    <a class="see-all-right see-all-arrow float-right" href="<?php echo $all_services ?>" aria-label="See all news">
      <div class="valign equal-height">
        <div class="see-all-label phm prxs valign-cell equal">See all</div>
        <div class="valign-cell equal">
          <img style="height:28px" src="<?php echo get_stylesheet_directory_uri() . "/img/see-all-arrow.svg"; ?>" alt="">
        </div>
      </div>
    </a>
  </div>
</div>
<?php endif; ?>
<?php endif; ?>
