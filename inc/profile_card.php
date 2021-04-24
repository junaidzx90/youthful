<?php
// USER AVATAR MYSQL TABLE
global $wpdb;
global $current_user;
$clients_tbl = $wpdb->prefix . 'youthful_clients';

$sql = $wpdb->get_results("SELECT * FROM $clients_tbl WHERE user_id = $current_user->ID");
if($sql){
    foreach($sql as $client){
        $client_id =  $client->client_id;
        $client_phone =  $client->client_phone;
        $client_addr =  $client->client_addr;
    }
}
?>
<div class="profile-card col-md-4 pl-md-0 col-sm-12">
<div class="card text-white py-3">
  <span class="user-role badge badge-success"> 
    <?php
      echo(__($current_user->roles[0]));
    ?>
  </span>
  <div class="profile-image-holder m-auto img-fluid">
  
    <?php
    $avatar = get_user_meta($current_user->ID, 'user_avatar',true);
    
    ?>
    <img
      class="avatar"
      src="<?php echo ($avatar)?$avatar:SITE_URL.'/assets/images/default-avatar.png' ?>"
      alt="avatar"
    />

    <div class="file btn btn-lg btn-primary">

      <form id="avatar_form" enctype="multipart/form-data">
        <input type="hidden" class="upload_avatar_nonce" name="upload_avatar_nonce" value="<?php echo wp_create_nonce( "upload_avatar_val" ) ?>" >
        <input type="file" name="user_avatar" id="file" class="user_avatar" />
        <label class="chnge_btn" for="file">Change</label>
      </form>
      
    </div>
  </div>

  <div class="card-body p-2">
    <h4
      class="card-title text-dark user-name text-center pb-0 mt-1 mb-0"
    >
      <?php 
        echo(__($current_user->display_name));
      ?>
      <small><?php echo (isset($client_id)?__('#'.$client_id):"#null") ?></small>
    </h4>
    <div class="user-info d-block p-2 pl-3">
      <small class="user-info-trip-done">
        <i class="fas fa-check-circle"></i>&nbsp;&nbsp;
        <span class="trip-done badge badge-success">
        <?php
          global $wpdb;
          global $current_user;

          if(check_roles(['client'])){
            $getfinishedcounts = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}youthful_bids WHERE client_id = $current_user->ID AND bid_status = 'finished' AND actionfrom = $current_user->ID");
          }else{
            $getfinishedcounts = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}youthful_bids WHERE user_id = $current_user->ID AND bid_status = 'finished' AND actionfrom = $current_user->ID");
          }
          
          if(!empty($getfinishedcounts)){
            echo intval(count($getfinishedcounts));
          }else{
            echo 0;
          }
        ?>
        </span>
        ট্রিপ সম্পন্য</small
      >
      <small class="user-info-trip-cancel">
        <i class="fas fa-times-circle"></i>&nbsp;&nbsp;
        <span class="trip-cancel badge badge-danger">
        <?php
          global $wpdb;
          global $current_user;

          if(check_roles(['client'])){
            $getcanclcounts = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}youthful_bids WHERE user_id = $current_user->ID AND bid_status = 'canceled' AND actionfrom = $current_user->ID");
          }else{
            $getcanclcounts = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}youthful_bids WHERE user_id = $current_user->ID AND bid_status = 'canceled' AND actionfrom = $current_user->ID");
          }
          if(!empty($getcanclcounts)){
            echo intval(count($getcanclcounts));
          }else{
            echo 0;
          }
        ?>
        </span>
        ট্রিপ বাতিল</small
      >
      <?php
          global $wpdb;
          global $current_user;

          $done = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}youthful_bids WHERE user_id = $current_user->ID AND bid_status = 'finished'");

          $cancel = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}youthful_bids WHERE user_id = $current_user->ID AND bid_status = 'canceled'");

      if(check_roles(['client'])){
        $clientfullrates = get_user_meta( $current_user->ID, 'clientfullrates', true);
      ?>
      <small class="user-info-rattings"
        ><i class="fas fa-star"></i> &nbsp;&nbsp;<span
          class="badge <?php echo ((isset($clientfullrates) && $clientfullrates <= 75) ?" badge-warning":" badge-primary"); echo ((isset($clientfullrates) && $clientfullrates <= 25) ? " badge-danger":""); ?>"
          ><?php echo (isset($clientfullrates)?__($clientfullrates):"null") ?>%</span
        >&nbsp; সম্পন্য হার</small
      >
      <?php 
      }else{
        $driverfullrates = get_user_meta( $current_user->ID, 'driverfullrates', true);
        ?>
        <small class="user-info-rattings"
          ><i class="fas fa-star"></i> &nbsp;&nbsp;<span
            class="badge <?php echo ((isset($driverfullrates) && $driverfullrates <= 75) ?" badge-warning":" badge-primary"); echo ((isset($driverfullrates) && $driverfullrates <= 25) ? " badge-danger":""); ?>"
            ><?php echo (isset($driverfullrates)?__($driverfullrates):"null") ?>%</span
          >&nbsp; সম্পন্য হার</small
        >
        <?php 
      }
      
      ?>
        <!-- For driver -->
        <?php if(check_roles(array("partner","driver")) === true){ ?>
            <small class="user-info-truck">
            <i class="fas fa-truck-moving"></i> &nbsp;&nbsp;
            <span class="not-add-car d-none">যুক্ত নেই</span>
            <span class="not-added">ঢ-574566 &nbsp;
                <i class="fas fa-check-circle text-primary"></i></span>
            </small>
        <?php } ?>
        

      <hr />
      <small class="user-info-email"
        ><i class="fas fa-envelope-open-text"></i>
        &nbsp;&nbsp;<?php echo __($current_user->user_email) ?></small
      >
      <small class="user-info-phone"
        ><i class="fas fa-phone"></i>
        &nbsp;&nbsp;<?php echo (isset($client_phone)?__($client_phone):"+880") ?></small
      >
      <small class="user-info-address"
        ><i class="fas fa-map-marker-alt"></i> &nbsp;&nbsp;<?php echo (isset($client_addr)?__($client_addr):"যুক্ত নেই") ?></small
      >
    </div>
  </div>
</div>
</div>