<?php
/**
 * Page Name: Youthful_dashboard
 */

get_header(); 
wp_enqueue_style("youthful-dashboard");

wp_enqueue_script("page.dashboard");
wp_enqueue_script("offerloadmore");
wp_localize_script("page.dashboard", 'dashboard_ajax_url', array(
  'ajax_url' => admin_url('admin-ajax.php'),
  'sequrity' => wp_create_nonce( 'dashboard' ),
));
// Project loadmore button
wp_localize_script( "offerloadmore", "offer_loadmore_param", array(
    'ajaxurl'      =>  admin_url('admin-ajax.php'),
    'posts'         =>  json_encode($wp_query->query_vars),
    'current_page'  =>  get_query_var('paged') ? get_query_var('paged'): 1,
    'max_page'     =>  $wp_query->max_num_pages
));
?>
<!-- current trips -->
<div class="trips-holder my-5">
  <div class="container">
    <div class="dashboard_sections row mx-0">
      <!-- Content-section -->
      <div class="col-md-8 col-sm-12 p-1" id="current_trips">
        <h3 class="current-trips-title text-left pl-1">
          চলমান <span class="bahak">ট্রিপ</span>
        </h3>

        <div class="form-group p-1">
          <select class="form-control" name="place-search-select">
            <option>চট্টগ্রাম</option>
            <option>ঢাকা</option>
            <option>বরিশাল</option>
          </select>
        </div>
        <div class="trip-wrper d-flex flex-wrap">

          <?php
              global $wpdb;
              // Geting offer post by that id
              $args = array(
                'paged' =>  1,
                'post_status' =>  'publish',
                'posts_per_page' =>  9,
                'post_type' =>  'offers',
              );
              
              query_posts($args);
              
              if(have_posts()):
                while(have_posts()): the_post();
                // Ignore bids post
                if(is_user_logged_in(  )){
                  if(!my_job(get_post()->ID)){
                      require("inc/offer_content.php");
                  }
                }else{
                  if(!all_valid_jobs(get_post()->ID)){
                    require("inc/offer_content.php");
                  }
                }
                endwhile;
              else:
                '';
              endif;
            ?>

          <div class="clearfix"></div>
          <!-- items end -->
        </div>
        <button type="button" class="btn btn-outline-primary loadmore">Load More</button>
      </div>

      <div id="dash_board_sidebar" class="col-md-4 col-sm-12 p-2">
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>
</div>
<!-- Popup form -->
<?php require_once("inc/youthful_bid_form.php"); ?>
<?php get_footer(); ?>