<?php

class Theme_Settings
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'sky_scripts']);
    }

// Enqueue scripts
    public function wzc_scripts()
    {
        // Enqueue stylesheet and scripts. Use minified for production.
        wp_enqueue_style('sky-styles', get_template_directory_uri() . '/static/css/dist/style.css', false, '0.0.0', 'all');
        wp_enqueue_script('sky-js', get_template_directory_uri() . '/static/js/site.js', array('jquery'), '0.0.0', true);
    }
}
