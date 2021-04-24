<?php

$the_user = get_userdata( $author );

echo "<pre>";
print_r($the_user);
echo "</pre>";