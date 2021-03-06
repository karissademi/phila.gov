<?php
/**
* @since 0.22.0
*
* Shortcode for displaying posts on department homepage
* @param @atts - posts can be set to 1 or 3 in a card-like view
*                list can be set for ul display
*                category can be set to display from a different cat (accepts cat ID)
*
* @package phila-gov_customization
*/

add_action( 'init', 'register_posts_shortcode' );


function latest_posts_shortcode($atts) {
  global $post;
  $a = shortcode_atts( array(
   'posts' => 1,
    0 => 'list',
    'name' => 'Blog posts',
    'category' => '',
 ), $atts );

  if ($a['category'] != ''){
    $current_category = $a['category'];
    $category_slug = get_category($a['category'])->slug;
  } else {
    $category = get_the_category();
    $current_category = $category[0]->cat_ID;
    $category_slug = $category[0]->slug;
  }



   if ( ! is_flag( 'list', $atts ) ){
     if ( $a['posts'] > 4 || $a['posts'] == 2 ){
       $a['posts'] = 3;
     }
   }

  $args = array( 'posts_per_page' => $a['posts'],
  'order'=> 'DESC',
  'orderby' => 'date',
  'post_type'  => 'phila_post',
  'cat' => $current_category,
  );

  $blog_loop = new WP_Query( $args );

  $output = '';

  if( $blog_loop->have_posts() ) {
    $post_counter = 0;

  if ( is_flag ('list', $atts) ) {
    $output .= '<div class="large-24 columns"><h2 class="contrast">' . $a['name'] . '</h2><div class="news"><ul>';
  }else{
    $output .= '<div class="large-24 columns"><h2 class="contrast">' . $a['name'] . '</h2><div class="row equal-height">';
  }

    while( $blog_loop->have_posts() ) : $blog_loop->the_post();
    $post_counter++;

    $desc = phila_get_item_meta_desc( );

    $link = get_permalink();

    $thumbnail = phila_get_thumbnails();
    // echo 'thumbnail' . $thumbnail;

    if ( is_flag( 'list', $atts ) ){
      $output .= '<li class="group mbm pbm">';

      $output .=  get_the_post_thumbnail( $post->ID, 'phila-thumb', 'class= small-thumb mrm' );

      $output .= 	'<span class="entry-date small-text">'. get_the_date() . '</span>';
      $output .= '<a href="' . get_permalink() .'"><h3>' . get_the_title( $post->ID ) . '</h3></a>';
      $output .= '<span class="small-text">' . $desc . '</span>';
      $output .= '</li>';

    }else{

      if($a['posts'] == 3){
        $output .=  '<div class="medium-8 columns">';
      }elseif($a['posts'] == 4){
        $output .=  '<div class="medium-6 columns">';
      }else{
        $output .=  '<div class="medium-24 columns">';
      }

      $output .= '<a href="' . get_permalink() .'" class="card equal">';

      $output .= $thumbnail;

      $output .= '<div class="content-block">';

      $output .=  '<h3>' . get_the_title( $post->ID ) . '</h3>';

      $output .= '<p>' . $desc  . '</p>';

      $output .= '</div></a></div>'; //content-block, columns
    }

    endwhile;

    if ( is_flag( 'list', $atts ) ) {
      $output .= '</ul>';
    }

    $output .= '</div><a class="see-all-right see-all-arrow float-right" href="/posts/'. $category_slug . '" aria-label="See all ' . strtolower($a['name']) . '">
      <div class="valign equal-height">
        <div class="see-all-label phm prxs valign-cell equal">See all</div>
        <div class="valign-cell equal">
          <img style="height:28px" src="' . get_stylesheet_directory_uri() . '/img/see-all-arrow.svg" alt="">
        </div>
      </div>
    </a></div>';

    }else {
      $output .= __( 'Please enter at least one post.', 'phila.gov' );
    }


  wp_reset_postdata();
  return $output;

}

function register_posts_shortcode(){
   add_shortcode( 'recent-posts', 'latest_posts_shortcode' );
}
