<?php
add_action("wp_ajax_create_proposal", "create_proposal");
add_action("wp_ajax_nopriv_create_proposal", "create_proposal");

function create_proposal(){
    
    if(isset($_POST['create_proposal_nonces'])){
        $nonces = $_POST['create_proposal_nonces'];
        if(wp_verify_nonce($nonces, 'proposal_nonces_val')){
            if(isset($_POST['post_id'])){
                $post_id = $_POST['post_id'];
            }
            // LOAD POINT
            if(isset($_POST['load_point_0']) || isset($_POST['load_point_1']) || isset($_POST['load_point_2'])){
                $i = 0;
                $load_points = array();
                while($_POST['load_point_'.$i]){
                    $load_points[$i] = $_POST['load_point_'.$i];
                    $i++;
                }

                $load_point_0 = sanitize_text_field( $load_points[0] );
                $load_point_1 = sanitize_text_field( $load_points[1] );
                $load_point_2 = sanitize_text_field( $load_points[2] );

                if($load_points[0] != ""){
                    $load_point_0 = sanitize_text_field( $load_points[0] );
                }else{
                    $load_point_0 = 0;
                }
                if($load_points[1]  != ""){
                    $load_point_1 = sanitize_text_field( $load_points[1] );
                }else{
                    $load_point_1 = 0;
                }
                if($load_points[2]  != ""){
                    $load_point_2 = sanitize_text_field( $load_points[2] );
                }else{
                    $load_point_2 = 0;
                }
            }
            // UNLOAD POINT 
            if(isset($_POST['unload_point_0']) || isset($_POST['unload_point_1']) || isset($_POST['unload_point_2'])){
                $u = 0;
                $unload_points = array();
                while($_POST['unload_point_'.$u]){
                    $unload_points[$u] = $_POST['unload_point_'.$u];
                    $u++;
                }

                if($unload_points[0] != ""){
                    $unload_point_0 = sanitize_text_field( $unload_points[0] );
                }else{
                    $unload_point_0 = 0;
                }
                if($unload_points[1]  != ""){
                    $unload_point_1 = sanitize_text_field( $unload_points[1] );
                }else{
                    $unload_point_1 = 0;
                }
                if($unload_points[2]  != ""){
                    $unload_point_2 = sanitize_text_field( $unload_points[2] );
                }else{
                    $unload_point_2 = 0;
                }
                
            }
            // LOAD TIME
            if(isset($_POST['load_time'])){
                $_load_time = $_POST['load_time'];
                $load_time = sanitize_text_field( $_load_time );
            }else{
                echo wp_json_encode(array("error" =>"লোডের সময় নির্ধারণ করুণ!"));
                wp_die();
            }


            // need_laborer
            if(isset($_POST['need_laborer'])){
                $need_laborer = intval($_POST['need_laborer']);
            }else{
                $need_laborer = 0;
            }

            // type_of_goods
            if(isset($_POST['type_of_goods'])){
                $_type_of_goods = $_POST['type_of_goods'];
                $type_of_goods = sanitize_text_field( $_type_of_goods );
            }else{
                echo wp_json_encode(array("error" =>"মালের বিবরণ প্রয়োজন!"));
                wp_die();
            }

            // type_of_truck
            if(isset($_POST['type_of_truck'])){
                $_type_of_truck = $_POST['type_of_truck'];
                $type_of_truck = sanitize_text_field( $_type_of_truck );
            }else{
                echo wp_json_encode(array("error" =>"ট্রাকের ধরণ প্রয়োজন!"));
                wp_die();
            }

            // goods_quantity
            if(isset($_POST['goods_quantity'])){
                $_goods_quantity = $_POST['goods_quantity'];
                $goods_quantity = intval( $_goods_quantity );
            }else{
                echo wp_json_encode(array("error" =>"মালের আনুমানিক পরিমান!"));
                wp_die();
            }

            if(!empty($load_point_0) && !empty($load_time) && !empty($unload_point_0) && !empty($type_of_goods) && !empty($type_of_truck) && !empty($goods_quantity) ){
                global $current_user;

                update_post_meta( $post_id, "load_point_0", $load_point_0 );
                update_post_meta( $post_id, "load_point_1", $load_point_1 );
                update_post_meta( $post_id, "load_point_2", $load_point_2 );

                update_post_meta( $post_id, "unload_point_0", $unload_point_0 );
                update_post_meta( $post_id, "unload_point_1", $unload_point_1 );
                update_post_meta( $post_id, "unload_point_2", $unload_point_2 );

                update_post_meta( $post_id, "loadtime", $load_time );
                update_post_meta( $post_id, "need_laborer", $need_laborer );
                update_post_meta( $post_id, "typeofgoods", $type_of_goods );
                update_post_meta( $post_id, "typeoftruck", $type_of_truck );
                update_post_meta( $post_id, "weights", $goods_quantity );

                echo wp_json_encode(array("success" => "new order placed"));
                wp_die();
            }else{
                echo wp_json_encode(array("error" => "সাবমিশণ গ্রহণযোগ্য নয়!"));
                wp_die();
            }
        }else{
            echo wp_json_encode(array("error" => "দুঃখিত!"));
            wp_die();
        }
    }else{
        return;
    }
}