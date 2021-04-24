<?php
add_filter('wp_nav_menu_items', 'add_li_to_nav', 10, 2);
function add_li_to_nav($items, $args) {
    remove_filter('wp_nav_menu_items', 'add_li_to_nav', 10, 2);
    if(is_user_logged_in()){
        $myaccount = $items.'<li class="nav-item dropdown">
        <span class="nav-link dropdown-toggle" id="account_meu_dropdown" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          '.__("একাউন্ট","youthful").'
        </span>
        <div class="dropdown-menu" aria-labelledby="account_meu_dropdown">
          
          <a class="dropdown-item" href="'.esc_url(site_url("profile") ).'">'.__("প্রফাইল","youthful").'</a>
          <a class="dropdown-item" href="'.esc_url(site_url("mytrips") ).'">'.__("আমার ট্রিপ","youthful").'</a>
          <a class="dropdown-item" href="#">'.__("সেটিংস","youthful").'</a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-sign-out-alt"></i>
            '.__("লগ-আউট","youthful").'</a>
        </div>
      </li> 
      <div class="ml-auto intraction-info">
        <li class="nav-item d-inline">
          <div class="nav-link noti-info-link">';
            if(check_roles(['client'])){
              if(my_job_bids()){
                $myaccount .= '<span class="online-indicator noti-indi"><i class="fas fa-circle"></i>
                <div class="notification_card">কেউ একজন বিড করেছেন</div>
                </span>';
              }
            }
            $myaccount .= '<span class="intraction-info-icon"><i class="fas fa-bell"></i></span>
            <span class="intraction-info-name">'.__("নটিফিকেশন","youthful").'</span>
          </div>
        </li>
      </div>';
        return $myaccount;
    }else{
      // Log-outed users
      $login = $items.'<li class="nav-item ml-auto login-li">
                      <a class="nav-link login" href="'.esc_url(home_url('/login')).'">
                      <i class="fas fa-sign-in-alt"></i> '.__("লগ-ইন করুণ","youthful").'
                      </a>
                  </li>';
      return $login;
    }
}