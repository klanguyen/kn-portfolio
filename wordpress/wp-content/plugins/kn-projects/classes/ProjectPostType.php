<?php

namespace KN\ProjectsPlugin;
/**
 * Represents a Project Post Type
 */
class ProjectPostType extends Singleton
{
    /**
     * A constant holding post type name
     */
    const POST_TYPE = 'project';

    /**
     * @var static $instance Hold the single instance
     */
    protected static $instance;

    /**
     * Project Post Type constructor
     */
    protected function __construct()
    {
        add_action( 'init', [$this, 'registerProjectPostType'], 0 );
    }

    /**
     * @return void Register a custom post type
     */
    function registerProjectPostType() {

        $labels = array(
            'name'                  => _x( 'Projects', 'Post Type General Name', KnProjectPlugin::TEXT_DOMAIN ),
            'singular_name'         => _x( 'Project', 'Post Type Singular Name', KnProjectPlugin::TEXT_DOMAIN ),
            'menu_name'             => __( 'Projects', KnProjectPlugin::TEXT_DOMAIN ),
            'name_admin_bar'        => __( 'Project', KnProjectPlugin::TEXT_DOMAIN ),
            'archives'              => __( 'Project Archives', KnProjectPlugin::TEXT_DOMAIN ),
            'attributes'            => __( 'Project Attributes', KnProjectPlugin::TEXT_DOMAIN ),
            'parent_item_colon'     => __( 'Parent Project:', KnProjectPlugin::TEXT_DOMAIN ),
            'all_items'             => __( 'All Project', KnProjectPlugin::TEXT_DOMAIN ),
            'add_new_item'          => __( 'Add New Project', KnProjectPlugin::TEXT_DOMAIN ),
            'add_new'               => __( 'Add New', KnProjectPlugin::TEXT_DOMAIN ),
            'new_item'              => __( 'New Project', KnProjectPlugin::TEXT_DOMAIN ),
            'edit_item'             => __( 'Edit Project', KnProjectPlugin::TEXT_DOMAIN ),
            'update_item'           => __( 'Update Project', KnProjectPlugin::TEXT_DOMAIN ),
            'view_item'             => __( 'View Project', KnProjectPlugin::TEXT_DOMAIN ),
            'view_items'            => __( 'View Projects', KnProjectPlugin::TEXT_DOMAIN ),
            'search_items'          => __( 'Search Project', KnProjectPlugin::TEXT_DOMAIN ),
            'not_found'             => __( 'Not found', KnProjectPlugin::TEXT_DOMAIN ),
            'not_found_in_trash'    => __( 'Not found in Trash', KnProjectPlugin::TEXT_DOMAIN ),
            'featured_image'        => __( 'Featured Image', KnProjectPlugin::TEXT_DOMAIN ),
            'set_featured_image'    => __( 'Set featured image', KnProjectPlugin::TEXT_DOMAIN ),
            'remove_featured_image' => __( 'Remove featured image', KnProjectPlugin::TEXT_DOMAIN ),
            'use_featured_image'    => __( 'Use as featured image', KnProjectPlugin::TEXT_DOMAIN ),
            'insert_into_item'      => __( 'Insert into project', KnProjectPlugin::TEXT_DOMAIN ),
            'uploaded_to_this_item' => __( 'Uploaded to this project', KnProjectPlugin::TEXT_DOMAIN ),
            'items_list'            => __( 'Projects list', KnProjectPlugin::TEXT_DOMAIN ),
            'items_list_navigation' => __( 'Projects list navigation', KnProjectPlugin::TEXT_DOMAIN ),
            'filter_items_list'     => __( 'Filter projects list', KnProjectPlugin::TEXT_DOMAIN ),
        );
        $args = array(
            'label'                 => __( 'Project', KnProjectPlugin::TEXT_DOMAIN ),
            'description'           => __( 'Projects to show on portfolio', KnProjectPlugin::TEXT_DOMAIN ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-portfolio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'projects',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( static::POST_TYPE, $args );

    }
}
