<?php
// ob_start();
if ( ! function_exists( 'youthfulTheme' ) ) :

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   * @since Youthful Theme 1.0
   */


  /**
   *Youthful scripts
  *@package SCRIPTS 
  */
  require_once("inc/youthful_scripts.php");

  /**
   * Youthful theme activation
   * @package activation
   */
  require_once("inc/youthful_activation.php");

  /**
   * Youthful theme dactivation
   * @package dactivation
   */
  require_once("inc/youthful_dactivation.php");

  /**
   * Youthful setup function
   * @package Main function
   */
  function youthfulTheme() {
    
    define("SITE_URL", get_template_directory_uri());
    date_default_timezone_set('Asia/Dhaka');
    //Upload files
    require_once("inc/youthful_custom_avatar.php");

    // Create proposal
    require_once("inc/youthful_create_proposal.php");

    // Theme options
    require_once("inc/theme_options/theme_options.php");

    /**
     * youthful roles check function
     */
    function check_roles($roles = array()){
      global $current_user;
      $allowed_user = $roles;
      if(array_intersect($allowed_user, $current_user->roles)){
        // return true
        return true;
      }else{
        return false;
      }
    }

    // Make human timestamps
    function time_format($date)
    {
        $create = date_create($date);
        $date_result = date_format($create, 'h:i a - d/m/y');
        return $date_result;
    }

    if(is_admin()){
      require_once(ABSPATH.'wp-admin/includes/post.php');
      //Create dashboard page
      if(!post_exists( "youthful_dashboard","","","" )){
        wp_insert_post( array(
          "post_type" => "page",
          "post_name" => "dashboard",
          "post_status" => "publish",
          "post_title" => "youthful_dashboard"
        ));
      }
      //Create Profile page
      if(!post_exists( "youthful_profile","","","" )){
        wp_insert_post( array(
          "post_type" => "page",
          "post_name" => "profile",
          "post_status" => "publish",
          "post_title" => "youthful_profile"
        ));
      }
      //Create Profile page
      if(!post_exists( "youthful_mytrips","","","" )){
        wp_insert_post( array(
          "post_type" => "page",
          "post_name" => "mytrips",
          "post_status" => "publish",
          "post_title" => "youthful_mytrips"
        ));
      }
    }


    /**
     * Youthful frontend scripts hooks
     */
    add_action( "wp_enqueue_scripts", "youthful_stylesheet");
    add_action( "wp_enqueue_scripts", "youthful_scripts");
    /*
      * Make theme available for translation.
      * Translations can be filed in the /languages/ directory.
      * If you're building a theme based on youthful, use a find and replace
      * to change 'youthful' to the name of your theme in all the template files
      */
    load_theme_textdomain( 'youthful', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
      * Let WordPress manage the document title.
      * By adding theme support, we declare that this theme does not use a
      * hard-coded  tag in the document head, and expect WordPress to
      * provide it for us.
      */
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
        'height' => 60,
        'width'  => 150,
    ));
    function get_logo(){
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        return esc_url($image[0]);
    }
    
    /*
      * Enable support for Post Thumbnails on posts and pages.
      *
      * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
      */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'primary' => __( 'top_menu',      'youthful' ),
        'social'  => __( 'Social Links Menu', 'youthful' ),
    ) );

    /*
      * Switch default core markup for search form, comment form, and comments
      * to output valid HTML5.
      */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
      * Enable support for Post Formats.
      *
      * See: https://codex.wordpress.org/Post_Formats
      */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );


    // Setup the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'youthful_custom_background_args', array(
        'default-color'      => "#f7f7f7",
        'default-attachment' => 'fixed',
    ) ) );

    // Youthful walker navbar
    require_once("inc/youthful_walker_menu.php");
    // Add custom menu for logged-in users
    require_once("inc/navbar_configure.php");

    // Add custom user role
    add_action("wp-admin", function(){
      add_role( "client", "Client", array(
        "read" => true
      ));
      add_role( "driver", "Driver", array(
        "read" => true
      ));
      add_role( "partner", "Partner", array(
        "read" => true
      ));
    });

    // Register Sidebar and footer widgets
    add_action("widgets_init",function(){
      add_theme_support( 'widgets' );
      register_widget("Youthful_Widget_slider");

      register_sidebar(
        array(
          'name'          => __( 'Dashboard Sidebar','youthful' ),
          'id'            => 'dashboard_sidebar',
          'description'   => __( 'This sidebar is no longer available and does not show anywhere on your site.' ),
          'before_widget' => '<div class="dashboard_sidebar">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="card-title widget-title">',
          'after_title'   => '</h3>',
        )
      );
      register_sidebar(
        array(
          'name'          => __( 'Footer_1','youthful' ),
          'id'            => 'footer1_widget',
          'description'   => __( 'This sidebar is no longer available and does not show anywhere on your site.' ),
          'before_widget' => '<div class="card-body footer_widget">',
          'after_widget'  => '</div>',
          'before_title'  => '<h4 class="card-title border-bottom">',
          'after_title'   => '</h4>',
        )
      );
      register_sidebar(
        array(
          'name'          => __( 'Footer_2','youthful' ),
          'id'            => 'footer2_widget',
          'description'   => __( 'This sidebar is no longer available and does not show anywhere on your site.' ),
          'before_widget' => '<div class="card-body footer_widget">',
          'after_widget'  => '</div>',
          'before_title'  => '<h4 class="card-title border-bottom">',
          'after_title'   => '</h4>',
        )
      );
      register_sidebar(
        array(
          'name'          => __( 'Footer_3','youthful' ),
          'id'            => 'footer3_widget',
          'description'   => __( 'This sidebar is no longer available and does not show anywhere on your site.' ),
          'before_widget' => '<div class="card-body footer_widget">',
          'after_widget'  => '</div>',
          'before_title'  => '<h4 class="card-title border-bottom">',
          'after_title'   => '</h4>',
        )
      );
    });

    // Add user rates
    add_action("init",function(){
      global $current_user;
      if(!get_user_meta( $current_user->ID, 'clientfullrates', true )){
        add_user_meta( $current_user->ID, 'clientfullrates', 100 );
      }else{
        if(get_user_meta( $current_user->ID, 'clientfullrates', true ) > 100){
          update_user_meta( $current_user->ID, 'clientfullrates', 100 );
        }
      }
    });
    // Add user rates
    add_action("init",function(){
      global $current_user;
      if(!get_user_meta( $current_user->ID, 'driverfullrates', true )){
        add_user_meta( $current_user->ID, 'driverfullrates', 100 );
      }else{
        if(get_user_meta( $current_user->ID, 'driverfullrates', true ) > 100){
          update_user_meta( $current_user->ID, 'driverfullrates', 100 );
        }
      }
    });

    // offer post types
    add_action("init",function(){
      $offer_labels = array(
            'name'                => _x( 'offers', '', 'youthful' ),
            'singular_name'       => _x( 'offer', '', 'youthful' ),
            'menu_name'           => __( 'Offers', 'youthful' ),
            'all_items'           => __( 'All Offers', 'youthful' ),
            'view_item'           => __( 'View offer', 'youthful' ),
            'add_new_item'        => __( 'Add New offer', 'youthful' ),
            'add_new'             => __( 'Add offer', 'youthful' ),
            'edit_item'           => __( 'Edit offer', 'youthful' ),
            'update_item'         => __( 'Update offer', 'youthful' ),
            'search_items'        => __( 'Search offer', 'youthful' ),
            'not_found'           => __( 'Not found', 'youthful' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'youthful' ),
        );
        $offer_args = array(
            'label'               => __( 'Offers', 'youthful' ),
            'description'         => __( 'This is youthful Offers', 'youthful' ),
            'labels'              => $offer_labels,
            'supports'            => array(''),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 60,
            'menu_icon'           => 'dashicons-calendar-alt',
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post'
        );
        // custom archive page tempate name slug will be here for custom design
        register_post_type( 'offers', $offer_args );
    });

    require_once("inc/offer_meta.php");

    // offer filter
    add_action("wp_ajax_offer_loadmore", "offer_loadmore");
    add_action("wp_ajax_nopriv_offer_loadmore", "offer_loadmore");
    function offer_loadmore(){
      global $wpdb;
      // Geting offer post by that id
      $args = json_decode(stripslashes($_POST['query']),true);
      $args['paged'] = $_POST['page'] + 1;
      $args['post_status'] = 'publish';
      $args['posts_per_page'] = 9;
      $args['posts_offset'] = 0;
      $args['post_type'] = 'offers';
      
      query_posts($args);
      
      if(have_posts()):
        while(have_posts()): the_post();
          require("inc/offer_content.php");
        endwhile;
      else:
        wp_die();
      endif;
      wp_reset_postdata();
      die;
    }

    // Check my job
    function my_job($post_id){
      global $wpdb;
      global $current_user;

      $bidtbl = $wpdb->prefix . 'youthful_bids';

      $bid = $wpdb->get_results("SELECT * FROM $bidtbl WHERE user_id = $current_user->ID AND post_id = $post_id AND bid_status = 'inprogress' || 'bid_status' = 'canceled' || 'bid_status' = 'finished'");
      if($wpdb->num_rows>0){
        return true;
      }
    }

    // My active gig
    function my_active_job(){
      global $wpdb,$current_user;
      $post_id = get_post()->ID;
      
      $bid = $wpdb->get_var("SELECT post_id FROM {$wpdb->prefix}youthful_bids WHERE user_id = $current_user->ID AND bid_status = 'inprogress'");
      if($bid != ""){
        return $bid;
      }
    }

    // My pending gig
    function my_job_bids(){
      global $wpdb,$current_user,$wp_query;
      // Geting offer post by that id
      $args = array(
        'post_status' =>  'publish',
        'post_type' =>  'offers',
        'author'  =>  $current_user->ID,
      );
      
      $posts = get_posts($args);
      if($posts){
        foreach($posts as $post){
          $post_ID = $post->ID;
        }

        $bid = $wpdb->get_var("SELECT bid_id FROM {$wpdb->prefix}youthful_bids WHERE post_id = $post_ID AND bid_status = 'pending'");
        if($bid != ""){
          return true;
        }
      }
    }

    // check all valid job/bid item
    function all_valid_jobs($post_id){
      global $wpdb;
      $bidtbl = $wpdb->prefix . 'youthful_bids';

      $bid = $wpdb->get_results("SELECT * FROM $bidtbl WHERE post_id = $post_id AND bid_status = 'inprogress' || 'bid_status' = 'canceled' || 'bid_status' = 'finished'");
      if($wpdb->num_rows>0){
        return true;
      }
    }

    // Place bid on database
    add_action("wp_ajax_placebidondatabase", "placebidondatabase");
    add_action("wp_ajax_nopriv_placebidondatabase", "placebidondatabase");
    function placebidondatabase(){
      if(!check_ajax_referer('dashboard', 'sequrity')) die ( 'Oops!');
      if(isset($_POST['post_id'])) $post_id = intval($_POST['post_id']);
      if(isset($_POST['client_id'])) $client_id = intval($_POST['client_id']);
      if(isset($_POST['price'])) $price = sanitize_text_field($_POST['price']);
     
      if(!my_job($post_id)){
        global $wpdb,$current_user;

        $bidtbl = $wpdb->prefix . 'youthful_bids';
        $wpdb->insert($bidtbl, array("user_id" => $current_user->ID,"client_id" => $client_id, "post_id" => $post_id,"bid_status" => "pending", "price" => $price), array("%d", "%d","%d", "%s","%s"));
      }

      die;
    }

    // Cancel trip
    add_action("wp_ajax_cancel_trip", "cancel_trip");
    add_action("wp_ajax_nopriv_cancel_trip", "cancel_trip");
    function cancel_trip(){
      if(!check_ajax_referer('profile', 'sequrity')) die ( 'Oops!');
      if(isset($_POST['trip_id'])) $trip_id = intval($_POST['trip_id']);
      if(isset($_POST['user_id'])) $user_id = intval($_POST['user_id']);

      global $wpdb;
      global $current_user;

      $bidtbl = $wpdb->prefix . 'youthful_bids';
      if(check_roles(['client'])){
        $updated = $wpdb->update( $bidtbl, array('bid_status' => 'canceled','actionfrom' => $current_user->ID), array('client_id' => $current_user->ID, 'post_id' => $trip_id, 'user_id' => $user_id), array("%s","%d"), array('%d','%d','%d'));
      }else{
        $updated = $wpdb->update( $bidtbl, array('bid_status' => 'canceled','actionfrom' => $current_user->ID), array('user_id' => $current_user->ID, 'post_id' => $trip_id), array("%s","%d"), array('%d','%d'));
      }

      if($updated){
        if(check_roles(['client'])){
          $clientrates = get_user_meta( $current_user->ID, 'clientfullrates', true );
          if($clientrates > 0 || $clientrates <= 100){
            update_user_meta( $current_user->ID, 'clientfullrates', $clientrates - 10 );
          }
        }else{
          $driverrates = get_user_meta( $current_user->ID, 'driverfullrates', true );
          if($driverrates > 0 || $driverrates <= 100){
            update_user_meta( $current_user->ID, 'driverfullrates', $driverrates - 10 );
          }
        }

        echo 'updated';
        die;
      }
    }


    // Trip approve
    add_action("wp_ajax_tripapproved", "tripapproved");
    add_action("wp_ajax_nopriv_tripapproved", "tripapproved");
    function tripapproved(){
      if(!check_ajax_referer('profile', 'sequrity')) die ( 'Oops!');
      if(isset($_POST['trip_id'])) $trip_id = intval($_POST['trip_id']);
      if(isset($_POST['driver_id'])) $driver_id = intval($_POST['driver_id']);

      global $wpdb;
      global $current_user;

      $bidtbl = $wpdb->prefix . 'youthful_bids';
      if(check_roles(['client'])){
        $updated = $wpdb->update( $bidtbl, array('bid_status' => 'inprogress'), array('user_id' => $driver_id, 'post_id' => $trip_id), array("%s"), array('%d','%d'));
      }

      if($updated){
        $user_meta=get_userdata($driver_id);
        $user_roles=$user_meta->roles;

        if (in_array("driver", $user_roles)){
          $wpdb->query("DELETE FROM $bidtbl WHERE user_id = $driver_id AND bid_status = 'pending'");
        }
        echo 'deleted';
        die;
      }
    }

    // remove trip from cart
    add_action("wp_ajax_removetripfromcart", "removetripfromcart");
    add_action("wp_ajax_nopriv_removetripfromcart", "removetripfromcart");
    function removetripfromcart(){
      if(!check_ajax_referer('profile', 'sequrity')) die ( 'Oops!');
      if(isset($_POST['trip_id'])) $trip_id = intval($_POST['trip_id']);
      if(isset($_POST['client_id'])) $clientid = intval($_POST['client_id']);
      if(isset($_POST['user_id'])) $user_id = intval($_POST['user_id']);

      global $wpdb;
      global $current_user;

      $bidtbl = $wpdb->prefix . 'youthful_bids';
      if(check_roles(['driver','partner'])){
        $updated = $wpdb->query("DELETE FROM $bidtbl WHERE user_id = $current_user->ID AND post_id = $trip_id AND client_id = $clientid");
      }else{
        $updated = $wpdb->query("DELETE FROM $bidtbl WHERE client_id = $current_user->ID AND post_id = $trip_id AND user_id = $user_id");
      }

      if($updated){
        echo 'deleted';
        die;
      }
    }

    // Finished trip
    add_action("wp_ajax_finished_trip", "finished_trip");
    add_action("wp_ajax_nopriv_finished_trip", "finished_trip");
    function finished_trip(){
      if(!check_ajax_referer('profile', 'sequrity')) die ( 'Oops!');
      if(isset($_POST['trip_id'])) $trip_id = intval($_POST['trip_id']);
      if(isset($_POST['client_id'])) $clientid = intval($_POST['client_id']);
      if(isset($_POST['user_id'])) $user_id = intval($_POST['user_id']);

      global $wpdb;
      global $current_user;

      $bidtbl = $wpdb->prefix . 'youthful_bids';
      if(check_roles(['driver','partner'])){
        $updated = $wpdb->update( $bidtbl, array('bid_status' => 'finished','actionfrom' => $current_user->ID), array('user_id' => $current_user->ID,'client_id' => $clientid, 'post_id' => $trip_id), array("%s","%d"), array('%d','%d','%d'));
      }
      else if(check_roles(['client'])){
        $updated = $wpdb->update( $bidtbl, array('bid_status' => 'aweting','actionfrom' => $current_user->ID), array('client_id' => $current_user->ID,'user_id' => $user_id, 'post_id' => $trip_id), array("%s","%d"), array('%d','%d','%d'));
      }

      if($updated){
        if(check_roles(['client'])){
          $clientrates = get_user_meta( $current_user->ID, 'clientfullrates', true );

          if($clientrates >= 0 && $clientrates != 100){
            update_user_meta( $current_user->ID, 'clientfullrates', $clientrates + 2 );
          }
        }else{
          $driverrates = get_user_meta( $current_user->ID, 'driverfullrates', true );

          if($driverrates >= 0 && $driverrates != 100){
            update_user_meta( $current_user->ID, 'driverfullrates', $driverrates + 2 );
          }

          // Work for finishing
          $bidprice = $wpdb->get_var("SELECT price FROM $bidtbl WHERE actionfrom = $current_user->ID");
          if($bidprice){
            $fee = $bidprice * 20 / 100;
            $wpdb->update( $bidtbl, array('latefee' => $fee), array('actionfrom' => $current_user->ID,'user_id' => $current_user->ID, 'post_id' => $trip_id), array("%s"), array('%d','%d','%d'));
          }
        }

        echo 'updated';
        die;
      }
    }

    // Bid window, get item values
    add_action("wp_ajax_get_proposal_places", "get_proposal_places");
    add_action("wp_ajax_nopriv_get_proposal_places", "get_proposal_places");
    function get_proposal_places(){
      global $current_user;
      if(check_roles(array("driver","pertnar")) === true){
        if(isset($_POST['project_id'])){
          $data = array();
          $proposal_id = intval($_POST['project_id']);
          $data['load_point_0'] = get_post_meta( $proposal_id, 'load_point_0', true );
          $data['load_point_1'] = get_post_meta( $proposal_id, 'load_point_1', true );
          $data['load_point_2'] = get_post_meta( $proposal_id, 'load_point_2', true );
          $data['unload_point_0'] = get_post_meta( $proposal_id, 'unload_point_0', true );
          $data['unload_point_1'] = get_post_meta( $proposal_id, 'unload_point_1', true );
          $data['unload_point_2'] = get_post_meta( $proposal_id, 'unload_point_2', true );
          $data['loadtime'] = get_post_meta( $proposal_id, 'loadtime', true );
          $data['post_id'] = $proposal_id;

          echo wp_json_encode(array("success" => $data));
          wp_die();
        }else{
          echo wp_json_encode(array("reload" => "true"));
          wp_die();
        }
      }else{
        echo wp_json_encode(array("error" => "true"));
        wp_die();
      }
      wp_die();
    }

    function userstatus_form_field( $user )
    {
        ?>
        <h3>User status</h3>
        <table class="form-table">
            <tr>
                <th>
                    <label for="status">status</label>
                </th>
                <td>
                    <select name="status" id="userstatus">
                      <?php 
                      if(get_user_meta( $user->ID, 'status', true )){
                        echo '<option selected desabled>'.esc_attr( get_user_meta( $user->ID, 'status', true ) ).'</option>';
                      }
                      ?>
                      <?php
                      if ( current_user_can( ) ) {
                          echo '<option value="deactive">Deactive</option>';
                          echo '<option value="active">Active</option>';
                      }
                      ?>
                    </select>
                    <p class="description">
                        Please set user status.
                    </p>
                </td>
            </tr>
        </table>
        <?php
    }
      
    /**
     * The save action.
     *
     * @param $user_id int the ID of the current user.
     *
     * @return bool Meta ID if the key didn't exist, true on successful update, false on failure.
     */
    function userstatus_update( $user_id )
    {
       // check that the current user have the capability to edit the $user_id
        if ( ! current_user_can( ) ) {
            return false;
        }
        // create/update user meta for the $user_id
        return update_user_meta(
            $user_id,
            'status',
            $_POST['status']
        );
    }
      
    // Add the field to user's own profile editing screen.
    add_action(
        'show_user_profile',
        'userstatus_form_field'
    );
      
    // Add the field to user profile editing screen.
    add_action(
        'edit_user_profile',
        'userstatus_form_field'
    );
      
    // Add the save action to user's own profile editing screen update.
    add_action(
        'personal_options_update',
        'userstatus_update'
    );
      
    // Add the save action to user profile editing screen update.
    add_action(
        'edit_user_profile_update',
        'userstatus_update'
    );

  }

    
  /**
   * Youthful walker subclass
   * @package Youthful walker
   */
  class Youthful_Widget_slider extends WP_Widget{
    public function __construct(){
      parent::__construct("slider_widget", "sidebar_slider", array(
        "description" => "This is sidebar slider"
      ));
    }

    public function widget($args, $instence){
      echo $args["before_widget"];
      // Youthful custom widget
      require_once("inc/youthful_post_widget.php");
      
      echo $args["after_widget"];
    }
  }


endif; // youthfulTheme
add_action( 'after_setup_theme', 'youthfulTheme' );