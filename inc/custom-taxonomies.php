<?php

//*-------------------------------------------------
//*      "Groups" Taxonomy (For Custom Elements CPT)
//*-------------------------------------------------

function register_groups_taxonomy() {
    $labels = array(
        'name'              => __('Groups', 'textdomain'),
        'singular_name'     => __('Group', 'textdomain'),
        'menu_name'         => __('Groups', 'textdomain'),
        'all_items'         => __('All Groups', 'textdomain'),
        'edit_item'         => __('Edit Group', 'textdomain'),
        'view_item'         => __('View Group', 'textdomain'),
        'update_item'       => __('Update Group', 'textdomain'),
        'add_new_item'      => __('Add New Group', 'textdomain'),
        'new_item_name'     => __('New Group Name', 'textdomain'),
        'search_items'      => __('Search Groups', 'textdomain'),
        'not_found'         => __('No groups found', 'textdomain'),
        'not_found_in_trash'=> __('No groups found in Trash', 'textdomain'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,  // Set this to true if you want a hierarchical taxonomy like categories
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true, // Enable Gutenberg editor for this taxonomy
        'rewrite'           => array('slug' => 'groups'),  // Customize the URL slug for your taxonomy
    );

    register_taxonomy('groups', 'custom_elements', $args); // Register taxonomy for the Custom Post Type 'custom_elements'
}

add_action('init', 'register_groups_taxonomy');




//*-------------------------------------------------
//*      "Types" Taxonomy (For News CPT)
//*-------------------------------------------------

function register_types_taxonomy() {
    $labels = array(
        'name' => __('Types', 'textdomain'),
        'singular_name' => __('Type', 'textdomain'),
        'menu_name' => __('Types', 'textdomain'),
        'all_items' => __('All Types', 'textdomain'),
        'edit_item' => __('Edit Type', 'textdomain'),
        'view_item' => __('View Type', 'textdomain'),
        'update_item' => __('Update Type', 'textdomain'),
        'add_new_item' => __('Add New Type', 'textdomain'),
        'new_item_name' => __('New Type Name', 'textdomain'),
        'search_items' => __('Search Types', 'textdomain'),
        'not_found' => __('No types found', 'textdomain'),
        'not_found_in_trash' => __('No types found in Trash', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  // Set this to true if you want a hierarchical taxonomy like categories
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true, // Enable Gutenberg editor for this post type
        'rewrite' => array('slug' => 'types'),  // Customize the URL slug for your taxonomy
    );

    register_taxonomy('types', 'news', $args); // Duplicate this line to ADD Custom Post Types
}

add_action('init', 'register_types_taxonomy');

