<?php
if ( ! function_exists ( 'scarlett_enqueue_parent_styles' ) ) {
    function scarlett_enqueue_parent_styles() {

        // loading parent style
        wp_register_style(
          'parente2-style',
          get_template_directory_uri() . '/style.css'
        );

        wp_enqueue_style( 'parente2-style' );
        // loading child style
        wp_register_style(
          'childe2-style',
          get_stylesheet_directory_uri() . '/style.css'
        );

        
        

    }
    add_action( 'wp_enqueue_scripts', 'scarlett_enqueue_parent_styles' );
}