<?php
if(have_posts()){
    echo "<h1>post</h1>";
    the_post();
    echo the_title();
    echo "<br>";
    echo the_content( );
    
}