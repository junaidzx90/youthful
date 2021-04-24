<?php
/**
*Add Load Points 1
*@package offer
*/

add_action("add_meta_boxes",function(){
    add_meta_box("load_point", "Load Points","load_point_cb","offers","advanced","high");
});

function load_point_cb($post){
    echo '<input type="text" class="widefat" name="load_point_0" placeholder="Load Point 1" value="'.get_post_meta($post->ID, 'load_point_0', true ).'">';
    echo '&nbsp;';
    echo '<input type="text" class="widefat" name="load_point_1" placeholder="Load Point 2" value="'.get_post_meta($post->ID, 'load_point_1', true ).'">';
    echo '&nbsp;';
    echo '<input type="text" class="widefat" name="load_point_2" placeholder="Load Point 3" value="'.get_post_meta($post->ID, 'load_point_2', true ).'">';

    wp_nonce_field( "offer_values", "offer_nonce");
}

add_action( 'save_post',function( $post_id ) {
    if(isset($_POST['load_point_0']) || isset($_POST['load_point_1']) || isset($_POST['load_point_2'])){
        if(wp_verify_nonce( $_POST["offer_nonce"], "offer_values")){
            update_post_meta( $post_id, "load_point_0", $_POST['load_point_0'] );
            update_post_meta( $post_id, "load_point_1", $_POST['load_point_1'] );
            update_post_meta( $post_id, "load_point_2", $_POST['load_point_2'] );
        }
    }
});


/**
 * @package Offer Unload Address
 */

add_action("add_meta_boxes",function(){
    add_meta_box("unload_point", "Unload Points","unload_point_cb","offers","advanced","high");
});

function unload_point_cb($post){
    echo '<input type="text" class="widefat" name="unload_point_0" placeholder="Unload Point 1" value="'.get_post_meta($post->ID, 'unload_point_0', true ).'">';
    echo '&nbsp;';
    echo '<input type="text" class="widefat" name="unload_point_1" placeholder="Unload Point 2" value="'.get_post_meta($post->ID, 'unload_point_1', true ).'">';
    echo '&nbsp;';
    echo '<input type="text" class="widefat" name="unload_point_2" placeholder="Unload Point 3" value="'.get_post_meta($post->ID, 'unload_point_2', true ).'">';

    wp_nonce_field( "unload_values", "unload_nonce");
}

add_action( 'save_post',function( $post_id ) {
    if(isset($_POST['unload_point_0']) || isset($_POST['unload_point_1']) || isset($_POST['unload_point_2'])){
        if(wp_verify_nonce( $_POST["unload_nonce"], "unload_values")){
            update_post_meta( $post_id, "unload_point_0", $_POST['unload_point_0'] );
            update_post_meta( $post_id, "unload_point_1", $_POST['unload_point_1'] );
            update_post_meta( $post_id, "unload_point_2", $_POST['unload_point_2'] );
        }
    }
});

/**
 * @package Load time
 */

add_action("add_meta_boxes",function(){
    add_meta_box("loadtime", "Loading Time","loadtime_cb","offers","side","default");
});

function loadtime_cb($post){
    echo '<input type="text" class="widefat" name="loadtime" placeholder="Loading Time" value="'.get_post_meta($post->ID, 'loadtime', true ).'">';

    wp_nonce_field( "loadtime_values", "loadtime_nonce");

    wp_update_post( array(
    'ID'         => $post->ID,
    'post_title' => get_post_meta($post->ID, 'loadtime', true ).'  ('.get_current_user().')'
    ) );
}

add_action( 'save_post',function( $post_id ) {
    if(isset($_POST['loadtime'])){
        if(wp_verify_nonce( $_POST["loadtime_nonce"], "loadtime_values")){
            update_post_meta( $post_id, "loadtime", $_POST['loadtime'] );
        }
    }
});

/**
 * @package goods info
 */

add_action("add_meta_boxes",function(){
    add_meta_box("goodsinfo", "Goods Information","goodsinfo_cb_cb","offers","side","default");
});

function goodsinfo_cb_cb($post){
    echo '<lable for="need_laborer">Need Laborer</lable>';
    echo '<input type="text" class="widefat" name="need_laborer" placeholder="Need Laborer" value="'.get_post_meta($post->ID, 'need_laborer', true ).'">';
    echo '<br><br>';
    echo '<lable for="typeofgoods">Type of goods</lable>';
    echo '<input type="text" class="widefat" name="typeofgoods" placeholder="Need Laborer" value="'.get_post_meta($post->ID, 'typeofgoods', true ).'">';
    echo '<br><br>';
    echo '<lable for="typeoftruck">Type of truck</lable>';
    echo '<input type="text" class="widefat" name="typeoftruck" placeholder="Need Laborer" value="'.get_post_meta($post->ID, 'typeoftruck', true ).'">';
    echo '<br><br>';
    echo '<lable for="weights">Weights</lable>';
    echo '<input type="text" class="widefat" name="weights" placeholder="Need Laborer" value="'.get_post_meta($post->ID, 'weights', true ).'">';

    wp_nonce_field( "goodsinfo_nonce_values", "goodsinfo_nonce");
}

add_action( 'save_post',function( $post_id ) {
    if(isset($_POST['need_laborer']) || isset($_POST['typeofgoods']) || isset($_POST['typeoftruck'])){
        if(wp_verify_nonce( $_POST["goodsinfo_nonce"], "goodsinfo_nonce_values")){
            update_post_meta( $post_id, "need_laborer", $_POST['need_laborer'] );
            update_post_meta( $post_id, "typeofgoods", $_POST['typeofgoods'] );
            update_post_meta( $post_id, "typeoftruck", $_POST['typeoftruck'] );
            update_post_meta( $post_id, "weights", $_POST['weights'] );
        }
    }
});
