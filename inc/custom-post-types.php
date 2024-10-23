<?php

//*-------------------------------------------------
//*            NEWS Custom Post Type
//*-------------------------------------------------

function news_post_type()
{

  $supports = array(
    'title',          // Post Title
    'editor',         // Content
    'author',         // Author of the Post
    'thumbnail',      // Featured Image
    'excerpt',        // Field for Excerpt
    //'custom-fields',  // Native WordPress Custom fields
    'trackbacks',     // Allow Trackbacks
    'comments',       // Allow Trackbacks
    'revisions',      // Allow Post Revisions
    //'post-formats',   // Allow Post Formats
    'sticky',         // Allow sticky post
    //'page-attributes',// Allow Page Atributes
  );


  $labels = array(
    'name' => __('News', 'textdomain'),
    'singular_name' => __('News', 'textdomain'),
    'menu_name' => __('News', 'textdomain'),
    'add_new' => __('Add News', 'textdomain'),
    'add_new_item' => __('Add New News', 'textdomain'),
    'edit_item' => __('Edit News', 'textdomain'),
    'new_item' => __('New News', 'textdomain'),
    'view_item' => __('View News', 'textdomain'),
    'search_items' => __('Search News', 'textdomain'),
    'not_found' => __('No News found', 'textdomain'),
    'not_found_in_trash' => __('No News found in Trash', 'textdomain'),
    'parent_item_colon' => '',
    'all_items' => __('All News', 'textdomain')
  );


  $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-megaphone', // The icon that appears in the WordPress admin menu
    'rewrite' => array('slug' => 'news'), // URL slug
    'show_in_rest' => true, // Enable Gutenberg editor for this post type
  );

  register_post_type('news', $args);
}
add_action('init', 'news_post_type');


//*-------------------------------------------------
//*            CUSTOM ELEMENTS Post Type
//*-------------------------------------------------

function custom_elements_post_type() {

  $supports = array(
    'title',          // Post Title
    'editor',         // Content
    'thumbnail',      // Featured Image
    //'excerpt',        // Field for Excerpt
    //'custom-fields',  // Native WordPress Custom fields
    //'author',         // Author of the Post
    //'trackbacks',     // Allow Trackbacks
    //'revisions',      // Allow Post Revisions
    //'post-formats',   // Allow Post Formats
    //'page-attributes',// Allow Page Attributes
  );

  $labels = array(
    'name'               => __('Custom Elements', 'textdomain'),
    'singular_name'      => __('Custom Element', 'textdomain'),
    'menu_name'          => __('Custom Elements', 'textdomain'),
    'add_new'            => __('Add Custom Element', 'textdomain'),
    'add_new_item'       => __('Add New Custom Element', 'textdomain'),
    'edit_item'          => __('Edit Custom Element', 'textdomain'),
    'new_item'           => __('New Custom Element', 'textdomain'),
    'view_item'          => __('View Custom Element', 'textdomain'),
    'search_items'       => __('Search Custom Elements', 'textdomain'),
    'not_found'          => __('No Custom Elements found', 'textdomain'),
    'not_found_in_trash' => __('No Custom Elements found in Trash', 'textdomain'),
    'parent_item_colon'  => '',
    'all_items'          => __('All Custom Elements', 'textdomain'),
  );

  $args = array(
    'supports'          => $supports,
    'labels'            => $labels,
    'public'            => true,
    'has_archive'       => true,
    'menu_icon'         => 'dashicons-layout', // The icon that appears in the WordPress admin menu
    'rewrite'           => array('slug' => 'custom-elements'), // URL slug
    'show_in_rest'      => true, // Enable Gutenberg editor for this post type
  );

  register_post_type('custom_elements', $args);
}
add_action('init', 'custom_elements_post_type');

