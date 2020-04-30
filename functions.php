<?php

class Burgosoft {

  function __construct() {
    $this->register_nav_menus();
    $this->add_theme_support();

    add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));

    if (function_exists('acf_add_options_page')) {
      acf_add_options_page();
    }
  }

  function wp_enqueue_scripts() {
    wp_enqueue_style('app', get_template_directory_uri() . '/assets/css/app.css', array(), time());
    wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), time(), true);
  }

  function register_nav_menus() {
    register_nav_menus();
  }

  function add_theme_support() {
    add_theme_support('post-thumbnails');
  }
}

new Burgosoft;
