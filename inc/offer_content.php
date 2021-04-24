<?php global $current_user; ?>
<div class="trip col-md-4 mb-1 p-1">
    <div class="card text-left trip-card">
        <h4 class="card-title border-bottom mb-0 p-2 trip-card-address">
            <!-- Load point -->
            <?php echo !empty(get_post_meta(get_post()->ID, 'load_point_0', true)) && !empty(get_post_meta(get_post()->ID, 'unload_point_0', true))?__(get_post_meta(get_post()->ID, 'load_point_0', true),'youthful').'<span class="to-icon"> <i class="fas fa-truck-moving"></i> </span>'.__(get_post_meta(get_post()->ID, 'unload_point_0', true),'youthful'):'' /*Unload point*/  ?>

        </h4>
        <h6 class="card-trip-load-date p-1 pl-2 m-0">
            <i class="fas fa-clock"></i>
            <?php echo !empty(get_post_meta(get_post()->ID, 'loadtime', true))?__(get_post_meta(get_post()->ID, 'loadtime', true),'youthful'):'' ?>
        </h6>
        <div class="trip-card-info p-2">
            <table class="w-100">
                <tbody>
                    <tr class="m-1">
                        <th class="p-1 m-1">মালের ধরণ</th>
                        <td class="p-1 float-right m-1">
                            <?php echo !empty(get_post_meta(get_post()->ID, 'typeofgoods', true))? __('<span style="color:#8e8e8e;">'.__(get_post_meta(get_post()->ID, 'typeofgoods', true),'youthful').'</span>','youthful'):'0' ?>
                        </td>
                    </tr>
                    <tr class="m-1">
                        <th class="p-1 m-1">ট্রাকের ধরণ</th>
                        <td class="p-1 float-right m-1">
                            <?php echo !empty(get_post_meta(get_post()->ID, 'typeoftruck', true)) ? __('<span style="color:#8e8e8e;">'.__(get_post_meta(get_post()->ID, 'typeoftruck', true),'youthful').'</span>','youthful'):'0' ?>
                        </td>
                    </tr>
                    <tr class="m-1">
                        <th class="p-1 m-1">পরিমান</th>
                        <td class="p-1 float-right m-1">
                            <?php echo !empty(get_post_meta(get_post()->ID, 'weights', true))? __('<span style="color:#8e8e8e;">'.__(get_post_meta(get_post()->ID, 'weights', true),'youthful').'&nbsp; টন</span>','youthful'):'0'?>
                        </td>
                    </tr>
                    <tr class="m-1">
                        <th class="p-1 m-1">লেবার</th>
                        <td class="p-1 float-right m-1">
                            <?php echo !empty(get_post_meta(get_post()->ID, 'need_laborer', true))? __('<span style="color:#8e8e8e;"> &nbsp;'.__(get_post_meta(get_post()->ID, 'need_laborer', true),'youthful').'</span>'):__('<span style="color:#dc3545;">লাগবেনা</span>','youthful') ?>
                        </td>
                    </tr>
                    <tr class="m-1">
                        <th class="p-1 m-1">বাড়তি লোড পয়েন্ট</th>
                        <td class="p-1 float-right m-1">
                            <?php echo !empty(get_post_meta(get_post()->ID, 'load_point_1', true)) || !empty(get_post_meta(get_post()->ID, 'load_point_2', true))? __('<span style="color:#8e8e8e;">লাগবে</span>'):__('<span style="color:#dc3545;">লাগবেনা</span>') ?>
                        </td>
                    </tr>
                    <tr class="m-1">
                        <th class="p-1 m-1">বাড়তি আনলোড পয়েন্ট</th>
                        <td class="p-1 float-right m-1">
                            <?php echo !empty(get_post_meta(get_post()->ID, 'unload_point_1', true)) || !empty(get_post_meta(get_post()->ID, 'unload_point_2', true))? __('<span style="color:#8e8e8e;">লাগবে</span>'):__('<span style="color:#dc3545;">লাগবেনা</span>') ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
            if(is_user_logged_in(  ) && check_roles(array("partner","driver"))){
                // Check driver status
                $drivers_table = $wpdb->prefix . 'youthful_drivers';
                $status = get_user_meta( $current_user->ID, 'status', true );

                // Checking user active or not
                if($status === 'active'){
                    // Checking number of job in progress
                    global $wpdb;
                    $post_id = get_post()->ID;
                    
                    $pending = $wpdb->get_var("SELECT post_id FROM {$wpdb->prefix}youthful_bids WHERE user_id = $current_user->ID AND bid_status = 'pending' AND post_id = $post_id");
                    // Checking job inprogress
                    if(!empty(my_active_job())){
                        echo ' <button disabled type="button" class="btn btn-success bid_btn bid-full-btn mx-1 mb-1 p-1">বিড করুণ</button>';
                    }
                    else if(!empty($pending)){
                        if($pending){
                            echo ' <button disabled type="button" class="btn bid_btn bid-full-btn mx-1 mb-1 p-1" data-id="'.get_post()->ID.'">অপেক্ষমান</button>';
                        }else{
                            echo ' <button type="button" class="btn btn-success bid_btn bid-full-btn mx-1 mb-1 p-1" data-id="'.get_post()->ID.'" data-client="'.get_post()->post_author.'">বিড করুণ</button>';
                        }
                    }else{
                        echo ' <button type="button" class="btn btn-success bid_btn bid-full-btn mx-1 mb-1 p-1" data-id="'.get_post()->ID.'" data-client="'.get_post()->post_author.'">বিড করুণ</button>';
                    }
                    
                }else{
                    echo '<span class="text-white bg-danger mx-1 mb-1 p-1 text-center">'.__("একাউন্ট গ্রহণযোগ্য নয়!").'</span>';
                }
            }else if(check_roles(array("client"))){
                if(get_post()->post_author == $current_user->ID){
                    echo '<span style="background-color: #f7f7f7!important;" class="text-primary mx-1 mb-1 p-1 text-center">'.__("আমার ট্রিপ").'</span>';
                }
            }
        ?>

    </div>
</div>