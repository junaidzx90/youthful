<?php
/**
 * Page Name: Youthful_Profile
 */
get_header();
if(!is_user_logged_in()){
  wp_safe_redirect(home_url("/"));
  die;
}else if(check_roles(array("client","partner","driver")) === false){
  wp_safe_redirect(home_url("/"));
  die;
}

wp_enqueue_style("bootstrap-datetimepicker");
wp_enqueue_style("youthful_profile");


wp_enqueue_script("jquery.form");// for submit ajax form
wp_enqueue_script("sweetalert");
wp_enqueue_script("bootstrap-datetimepicker");
wp_enqueue_script("youthful.profile");

if(check_roles(array("client","partner"))){
  wp_enqueue_style("gsdk-bootstrap-wizard");
  wp_enqueue_script("gsdk-bootstrap-wizard");
  wp_enqueue_script("jquery.bootstrap.wizard");
}

wp_localize_script("youthful.profile", 'profile_ajax_url', array(
  'ajax_url' => admin_url('admin-ajax.php'),
  'sequrity' => wp_create_nonce( 'profile' )
));

// Conditionally include profile page
if(check_roles(array("client")) === true){
  require_once("inc/client_profile.php");
}else if(check_roles(array("partner","driver")) === true){
  require_once("inc/driver_profile.php");
}
?>

<?php get_footer(); ?>