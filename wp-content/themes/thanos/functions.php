<?php
//create nav menu
if(function_exists('register_nav_menus')){
    register_nav_menus(array('primary' => 'Header Navigation'));
}

if(function_exists('add_theme_support')){
    add_theme_support('post_thumbnails');
}

if(function_exists('add_image_size')){
    add_image_size('featured', 1280, 500, true);
    add_image_size('post-thumb', 200, 125, true);
}
