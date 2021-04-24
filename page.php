<?php
if(have_posts()){
    echo "<h1>page</h1>";
    the_post();
    echo the_content( );
}
?>