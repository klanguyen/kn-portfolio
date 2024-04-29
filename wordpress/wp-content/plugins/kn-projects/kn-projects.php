<?php
/**
 * Portfolio Projects Plugin
 *
 * @wordpress-plugin
 * Plugin Name: Portfolio Projects Plugin
 * Description: Showcase projects in portfolio
 * Version: 1.0.0
 * Author: Kayla Nguyen
 * Text Domain: kn-projects
 */

namespace KN\ProjectsPlugin;

require_once __DIR__.'/classes/Singleton.php';
require_once __DIR__.'/classes/ProjectPostType.php';
/**
 * Represents a Project Plugin
 */
class KnProjectPlugin extends Singleton {

    /**
     * @var bool $instance Hold the single instance
     */
    protected static $instance = false;

    // unique to the namespace
    /**
     * A constant holding the text domain of the plugin
     */
    const TEXT_DOMAIN = 'kn-projects';

    /**
     * Projects plugin constructor
     */
    protected function __construct()
    {
        // instantiate singletons
        ProjectPostType::getInstance();

        // create an activation hook so when the plugin is activated, flush permalinks cache
        function activate_plugin(): void
        {
            // manually register post type
            ProjectPostType::getInstance()->registerProjectPostType();

            // refresh the permalink cache
            flush_rewrite_rules();
        }
        register_activation_hook(__FILE__, 'KN\ProjectsPlugin\activate_plugin');
    }
}

KnProjectPlugin::getInstance();
