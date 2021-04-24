<?php
// Hook for upload_avatar
add_action("wp_ajax_upload_avatar", "upload_avatar");
add_action("wp_ajax_nopriv_upload_avatar", "upload_avatar");
function upload_avatar(){
    global $current_user;
        $noncess = $_POST['upload_avatar_nonce'];
        if(wp_verify_nonce( $noncess,  "upload_avatar_val")){

            if(isset($_FILES['user_avatar'])){

            $upload_dir   = wp_upload_dir();
        
            $original_file = $_FILES['user_avatar']['name'];
            $extens = strtolower(pathinfo($original_file,PATHINFO_EXTENSION));

            $avatarName = $current_user->user_login.'_avatar';

            if ( ! empty( $upload_dir['path'] ) ) {
                $avatar_path = $upload_dir['path'].'/youthful_users/'.$current_user->user_login;
                if ( ! file_exists( $avatar_path ) ) {
                    wp_mkdir_p( $avatar_path );
                }
        
                $temp_name = $_FILES['user_avatar']['tmp_name'];
                $targetPath = $avatar_path.'/'.$avatarName.'.'.$extens;

                if(is_uploaded_file($temp_name)) {
                    if(move_uploaded_file($temp_name,$targetPath)) {
                        $avatar_url = $upload_dir['url'].'/youthful_users/'.$current_user->user_login.'/'.$avatarName.'.'.$extens;

                        // Check avatar current avatar has or not
                        $check_has = get_user_meta($current_user->ID, 'user_avatar',true);

                        
                        if($check_has != 0){
                            update_user_meta($current_user->ID, 'user_avatar', $avatar_url);

                            echo wp_json_encode(array("success" =>"updated"));
                            wp_die();
                        }else{
                            add_user_meta($current_user->ID, 'user_avatar', $avatar_url);
                            
                            echo wp_json_encode(array("success" =>"inserted"));
                            wp_die();
                        }
                        wp_die();
                    }
                }
            }
            wp_die();
        }else{
            echo wp_json_encode(array("error" =>"Select your photo!"));
            wp_die();
        }
    }else{
        echo wp_json_encode(array("error" =>"Inavalid request"));
        wp_die();
    }
}