<?php
add_action("admin_menu", function(){
    add_menu_page( "theme options", "Youthful Options", "manage_options", "theme-options", "youthful_theme_options", "dashicons-location-alt", 60 );
});

// Theme options main function
function youthful_theme_options(){
    echo '<div id="general_setting_area">';
    echo '<form action="options.php" method="post">';
    settings_fields( "youthful_general_opt" );
    do_settings_sections("theme-options");
    submit_button('Submit','primary','submit');
    echo '</form';
    echo '</div>';
}


// Theme option macanisms
add_action("admin_init", function(){
    add_settings_section( "youthful_general_opt", "General Settings", "", "theme-options" );
    // Money alerts
    add_settings_field("comision_alert","Set money alert info", "money_alert_cb_fn", "theme-options", "youthful_general_opt");
    register_setting( "youthful_general_opt", "comision_alert" );
});

// Money alert
function money_alert_cb_fn(){
    echo '<textarea name="comision_alert" cols="50" rows="2">'.get_option( "comision_alert" ).'</textarea>';
}