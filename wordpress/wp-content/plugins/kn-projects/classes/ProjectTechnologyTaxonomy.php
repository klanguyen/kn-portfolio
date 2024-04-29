<?php

namespace KN\ProjectsPlugin;
/**
 * Represents a Project Technology Taxonomy
 */
class ProjectTechnologyTaxonomy extends Singleton
{
    /**
     * A constant holding name of taxonomy
     */
    const TAXONOMY = 'project_technology';

    /**
     * @var static $instance Hold the single instance
     */
    protected static $instance;

    /**
     * Project Technology Taxonomy constructor
     */
    protected function __construct()
    {
        add_action( 'init', [$this, 'registerTaxonomy'], 0 );
    }

    // Register Custom Taxonomy
    function registerTaxonomy() {

        $labels = array(
            'name'                       => _x( 'Project Technologies', 'Taxonomy General Name', KnProjectPlugin::TEXT_DOMAIN ),
            'singular_name'              => _x( 'Project Technology', 'Taxonomy Singular Name', KnProjectPlugin::TEXT_DOMAIN ),
            'menu_name'                  => __( 'Project Technologies', KnProjectPlugin::TEXT_DOMAIN ),
            'all_items'                  => __( 'All Technologies', KnProjectPlugin::TEXT_DOMAIN ),
            'parent_item'                => __( 'Parent Technology', KnProjectPlugin::TEXT_DOMAIN ),
            'parent_item_colon'          => __( 'Parent Technology:', KnProjectPlugin::TEXT_DOMAIN ),
            'new_item_name'              => __( 'New Technology Name', KnProjectPlugin::TEXT_DOMAIN ),
            'add_new_item'               => __( 'Add New Technology', KnProjectPlugin::TEXT_DOMAIN ),
            'edit_item'                  => __( 'Edit Technology', KnProjectPlugin::TEXT_DOMAIN ),
            'update_item'                => __( 'Update Technology', KnProjectPlugin::TEXT_DOMAIN ),
            'view_item'                  => __( 'View Technology', KnProjectPlugin::TEXT_DOMAIN ),
            'separate_items_with_commas' => __( 'Separate technologies with commas', KnProjectPlugin::TEXT_DOMAIN ),
            'add_or_remove_items'        => __( 'Add or remove technologies', KnProjectPlugin::TEXT_DOMAIN ),
            'choose_from_most_used'      => __( 'Choose from the most used', KnProjectPlugin::TEXT_DOMAIN ),
            'popular_items'              => __( 'Popular Technologies', KnProjectPlugin::TEXT_DOMAIN ),
            'search_items'               => __( 'Search Technologies', KnProjectPlugin::TEXT_DOMAIN ),
            'not_found'                  => __( 'Not Found', KnProjectPlugin::TEXT_DOMAIN ),
            'no_terms'                   => __( 'No technologies', KnProjectPlugin::TEXT_DOMAIN ),
            'items_list'                 => __( 'Technologies list', KnProjectPlugin::TEXT_DOMAIN ),
            'items_list_navigation'      => __( 'Technologies list navigation', KnProjectPlugin::TEXT_DOMAIN ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
        );
        register_taxonomy( static::TAXONOMY, array( ProjectPostType::POST_TYPE ), $args );

    }
}
