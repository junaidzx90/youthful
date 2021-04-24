<!DOCTYPE html>
<html lang="en">

  <?php wp_head(); ?>
  <head>
    <meta charset="<?php bloginfo( "charset" ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( "name" ) ?></title>
    <?php
      if(is_user_logged_in(  )){
        echo '<style> #wpadminbar{ position: absolute; display:none;}</style>';
      }
    ?>
  </head>

  <body <?php body_class( "youthful-body" ) ?> >
    <header>
      <?php get_template_part("navbar"); ?>
      <!-- Hero area start -->
      <?php 
        if(is_home(  )){
          get_template_part("banner"); 
        }
      ?>
    </header>
    <section>
