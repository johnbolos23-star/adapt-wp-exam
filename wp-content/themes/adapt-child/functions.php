<?php


function customEnqueue(){
    wp_enqueue_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css'); 

    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css'); 


    wp_enqueue_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', array('jquery'), true);
    wp_enqueue_script('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js', array('jquery'), true);




    // The core GSAP library
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.14.2/dist/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.14.2/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );

    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom-script.js', array('gsap-js'), false, true );
    wp_enqueue_script( 'testimonial-js', get_stylesheet_directory_uri() . '/js/testimonial.js', array('gsap-js'), false, true );
}
add_action('wp_enqueue_scripts', 'customEnqueue');
