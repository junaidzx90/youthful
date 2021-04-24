<?php
function youthful_stylesheet(){
    wp_register_style( "bootstrap", get_template_directory_uri()."/dist/css/bootstrap.min.css", array(), 4.0, 'all' );
    wp_enqueue_style("bootstrap");
  
    wp_register_style( "fontawesome", get_template_directory_uri()."/dist/css/fontawesome/fontawesome.min.css", array(), false, 'all' );
    wp_enqueue_style("fontawesome");
  
    wp_register_style( "fontawesome-brands", get_template_directory_uri()."/dist/css/fontawesome/brands.min.css", array(), false, 'all' );
    wp_enqueue_style("fontawesome-brands");
  
    wp_register_style( "fontawesome-solid", get_template_directory_uri()."/dist/css/fontawesome/solid.min.css", array(), false, 'all' );
    wp_enqueue_style("fontawesome-solid");
    
    wp_register_style( "gsdk-bootstrap-wizard", get_template_directory_uri()."/dist/css/gsdk-bootstrap-wizard.css", array(), false, 'all' );
    

    wp_register_style( "slick", get_template_directory_uri()."/assets/slick_slider/slick.css", array(), false, 'all' );

    wp_register_style( "slick-theme", get_template_directory_uri()."/assets/slick_slider/slick-theme.css", array(), false, 'all' );

    wp_register_style( "youthful", get_template_directory_uri()."/style.css", array(), 1.0, 'all' );
    wp_enqueue_style("youthful");
  
    // For profile page
    wp_register_style( "youthful-dashboard", get_template_directory_uri()."/dist/css/dashboard.css", "youthful", 1.0, 'all' );
  
    // For profile page
    wp_register_style( "bootstrap-datetimepicker", get_template_directory_uri()."/assets/datepicker/css/bootstrap-datetimepicker.min.css", array(), false, 'all' );

    wp_register_style( "youthful_profile", get_template_directory_uri()."/dist/css/youthful_profile.css", array(), 1.0, 'all' );
}
  
function youthful_scripts(){
    wp_register_script( "jquery", get_template_directory_uri()."/dist/js/jquery.min.js",array(), false, true );
    wp_enqueue_script("jquery");
  
    wp_register_script( "bootstrap", get_template_directory_uri()."/dist/js/bootstrap.min.js", array("jquery"), 4.0, true );
    wp_enqueue_script("bootstrap");
  
    wp_register_script( "youthful.main", get_template_directory_uri()."/dist/js/youthful.main.js", array("jquery"), 1.0, true );
    wp_enqueue_script("youthful.main");
  
    wp_register_script( "validate", get_template_directory_uri()."/dist/js/jquery.validate.min.js", array("jquery"), 1.0, true );
    
    
    wp_register_script( "jquery.bootstrap.wizard", get_template_directory_uri()."/dist/js/jquery.bootstrap.wizard.js", array("jquery"), 1.0, true );
    
    
    wp_register_script( "gsdk-bootstrap-wizard", get_template_directory_uri()."/dist/js/gsdk-bootstrap-wizard.js", array("jquery"), 1.0, true );
    
  
    wp_register_script( "typed-js", get_template_directory_uri()."/dist/js/typed-js.min.js", array("jquery"), false, true );

    wp_register_script( "slick_slider", get_template_directory_uri()."/assets/slick_slider/slick.js", array("jquery"), false, true );

    wp_register_script( "youthful.home", get_template_directory_uri()."/dist/js/youthful.home.js", array("jquery"), 1.0, true );
    
    // for submit ajax form
    wp_register_script( "jquery.form", get_template_directory_uri()."/dist/js/jquery.form.js", array("jquery"), false, true );

    wp_register_script( "bootstrap-datetimepicker", get_template_directory_uri()."/assets/datepicker/js/bootstrap-datetimepicker.min.js", array("jquery"), false, true );

    wp_register_script( "sweetalert", get_template_directory_uri()."/dist/js/sweetalert.js", array("jquery"), false, true );

    wp_register_script( "youthful.profile", get_template_directory_uri()."/dist/js/youthful.profile.js", array("jquery"), 1.0, true );

    wp_register_script( "page.dashboard", get_template_directory_uri()."/dist/js/page.dashboard.js", array("jquery"), 1.0, true );

    wp_register_script( "offerloadmore", get_template_directory_uri()."/dist/js/offerloadmore.js", array("jquery"), 1.0, true );
}