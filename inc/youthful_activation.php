<?php
add_action("after_switch_theme", function(){
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $clients_table = $wpdb->prefix . 'youthful_clients';
    $client_SQL = "CREATE TABLE IF NOT EXISTS `$clients_table` ( 
    `client_id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL ,
    `client_phone` INT(11) NOT NULL ,
    `client_addr` VARCHAR(250) NOT NULL ,
    `client_valid_docs` VARCHAR(500) NOT NULL ,
    PRIMARY KEY (`client_id`)) ENGINE = InnoDB";
    dbDelta($client_SQL); //Action for create youthful_clients table

    $drivers_table = $wpdb->prefix . 'youthful_drivers';
    $driver_SQL = "CREATE TABLE IF NOT EXISTS `$drivers_table` ( 
    `driver_id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL ,
    `driver_phone` INT(11) NOT NULL ,
    `driver_addr` VARCHAR(250) NOT NULL ,
    `driver_valid_docs` VARCHAR(500) NOT NULL ,
    `driver_licences` VARCHAR(500) NOT NULL ,
    `car_number` varchar(50) NOT NULL ,
    `payments` INT(11) NOT NULL ,
    PRIMARY KEY (`driver_id`)) ENGINE = InnoDB";
    dbDelta($driver_SQL); //Action for create youthful_drivers table


    $bid_table = $wpdb->prefix . 'youthful_bids';
    $bid_SQL = "CREATE TABLE IF NOT EXISTS `$bid_table` ( 
    `bid_id` INT NOT NULL AUTO_INCREMENT,
    `post_id` INT(11) NOT NULL ,
    `user_id` INT(11) NOT NULL ,
    `client_id` INT(11) NOT NULL ,
    `actionfrom` INT(11) NOT NULL ,
    `bid_status` VARCHAR(50) NOT NULL ,
    `price` VARCHAR(500) NOT NULL ,
    `latefee` VARCHAR(500) NOT NULL ,
    PRIMARY KEY (`bid_id`)) ENGINE = InnoDB";
    dbDelta($bid_SQL); //Action for create youthful_avatars table

});