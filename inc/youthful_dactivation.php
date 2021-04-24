<?php
add_action("switch_theme",function(){
    global $wpdb;
    $drivers_table = $wpdb->prefix . 'youthful_drivers';
    $clients_table = $wpdb->prefix . 'youthful_clients';
    $avatar_table = $wpdb->prefix . 'youthful_avatar';

    $wpdb->query("DROP TABLE IF EXISTS $drivers_table");
    $wpdb->query("DROP TABLE IF EXISTS $clients_table");
    $wpdb->query("DROP TABLE IF EXISTS $avatar_table");
});