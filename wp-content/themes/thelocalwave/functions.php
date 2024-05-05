<?php

class LocalWave
{
    public $version;

    function __construct()
    {
        $version = '1.0.0';
        add_action('init', [$this, 'navigation_menus']);

        add_action('wp_enqueue_scripts', [$this, 'enqueue_local_wave_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_local_wave_styles']);
    }

    function enqueue_local_wave_scripts()
    {
        wp_register_script('main', get_template_directory_uri() . '/public/main.js', [], $this->version, ['in_footer' => true] );
        wp_enqueue_script('main');
    }

    function enqueue_local_wave_styles()
    {
        wp_register_style('styles', get_template_directory_uri() . '/public/styles.css', [], $this->version, 'all');
        wp_enqueue_style('styles');

        wp_register_style('onest-font', 'https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap', [], '', 'all');
        wp_enqueue_style('onest-font');
    }

    function navigation_menus()
    {
        register_nav_menus([
            'header' => __('Header Menu', 'thelocalwave'),
            'footer' => __('Footer Menu', 'thelocalwave')
        ]);
    }
}

$localwave = new LocalWave();
