<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package phila-gov
 */
?>

<article id="post-<?php the_ID(); ?>">
  <div class="row">
    <header class="entry-header small-24 columns">
      <?php the_title( '<h1 class="entry-title contrast">', '</h1>' ); ?>
    </header><!-- .entry-header -->
  </div>
  <div class="row">
    <div data-swiftype-index='true' class="entry-content columns">
        <?php get_template_part('partials/content', 'default');?>
    </div><!-- .entry-content -->
  </div>
</article><!-- #post-## -->
