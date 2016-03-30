<?php

/**
 * Plugin Name: Egirna_plugin
 * Plugin URI:  http://egirna.com
 * Description: For xample: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from Hello, Dolly in the upper right of your admin screen on every page
 * Version:     1.1
 * Author:      name @ egirna
 * Author URI:  http://egirna.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Copyright: 2016 egirna (www.egirna.com)
 * Domain Path: egirna_plugin
 */
class egirna_plugin extends WP_Widget
{

    function __construct()
    {

        add_action('init', array($this, 'widget_textdomain'));

        parent::__construct(
            'egirna_plugin',
            __('egirna plugin', 'egirna_plugin'),
            array(
                'classname' => 'egirna_plugin',
                'description' => __('(The Same Description On Above)For xample: This is not just a plugin,
                 it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong:
                 Hello, Dolly. When activated you will randomly see a lyric from Hello,
                 Dolly in the upper right of your admin screen on every page', 'egirna_plugin')
            )
        );

        // Register stylesheets
        add_action('admin_print_styles', array($this, 'register_admin_styles'));
        add_action('wp_enqueue_scripts', array($this, 'register_widget_styles'));

        // Register JavaScript
//        add_action('admin_enqueue_scripts', array($this, 'register_admin_scripts'));
//        add_action('wp_enqueue_scripts', array($this, 'register_widget_scripts'));
    }


    function form($instance)
    {
        $instance = wp_parse_args(
            (array)$instance,
            array(
                'name' => '',
                'channel' => '',
                'position' => 'above',
                'homepage-only' => ''
            )
        );

        include(plugin_dir_path(__FILE__) . '/views/admin.php');
    }


    function update($new_instance, $old_instance)
    {
        $old_instance['name'] = strip_tags(stripslashes($new_instance['name']));
        $old_instance['channel'] = strip_tags(stripslashes($new_instance['channel']));
        $old_instance['position'] = $new_instance['position'];
        $old_instance['homepage-only'] = $new_instance['homepage-only'];

        return $old_instance;
    }


    function widget($args, $instance)
    {
        // allowes to access the values store in $args array
        extract($args, EXTR_SKIP);

        echo $before_widget;

        include(plugin_dir_path(__FILE__) . '/views/widget.php');

        echo $after_widget;
    }

    function widget_textdomain()
    {

        load_plugin_textdomain('egirna_plugin', false, plugin_dir_path(__FILE__) . '/lang/');

    }

    function register_admin_styles()
    {
        wp_enqueue_style('egirna_plugin_admin', plugins_url('egirna-plugin/css/admin.css'));

    }

    function register_widget_styles()
    {

        wp_enqueue_style('egirna_plugin_widget', plugins_url('egirna-plugin/css/widget.css'));
    }

//    function register_admin_scripts()
//    {
//
//        wp_enqueue_scripts('egirna_plugin_admin', plugins_url('egirna-plugin/js/admin.min.js'));
//    }
//
//    function register_widget_scripts()
//    {
//
//        wp_enqueue_scripts('egirna_plugin_widget', plugins_url('egirna-plugin/js/widget.min.js'));
//    }
}

add_action('widgets_init', create_function('', 'register_widget("egirna_plugin");'));