<?php 

function register_my_menu() { 
    register_nav_menus( 
        array(
         'header-menu' => __( 'Header Menu' ),
         'footer-menu' => __( 'Footer Menu' ) 
         ) 
        ); 
    } 
    add_action( 'init', 'register_my_menu' );

    //gestion du logo sur le thème
    add_theme_support( 'custom-logo' );