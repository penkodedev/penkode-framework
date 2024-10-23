
<?php

//************************* DISABLE dashboard full screen mode **************************
if (is_admin()) {
  function disable_editor_fullscreen_by_default()
  {
    $script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' );
    if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
    wp_add_inline_script('wp-blocks', $script);
  }
  add_action('enqueue_block_editor_assets', 'disable_editor_fullscreen_by_default');
}

//******REMOVE certain PLUGINS UPDATE ***********
function remove_update_notifications($value)
{

  if (isset($value) && is_object($value)) {
    unset($value->response['smart-slider-3/nextend-smart-slider3-pro.php']);
    unset($value->response['akismet/akismet.php']);
  }

  return $value;
}
add_filter('site_transient_update_plugins', 'remove_update_notifications');


//************************* REMOVE Dashboard menu items **************************************
function remove_menus()
{

  //remove_menu_page( 'index.php' ); //**************************//Dashboard Home and Updates
  //remove_menu_page('edit.php'); //*****************************//Posts
  //remove_menu_page('edit.php?post_type=portfolio'); //*********//Portfolio CPT
  remove_menu_page('edit-comments.php'); //**********************//Comments
  //remove_menu_page( 'edit.php?post_type=page' ); //************//Pages
  //remove_menu_page( 'themes.php' ); //*************************//Appearance
  //remove_menu_page( 'plugins.php' ); //************************//Users
  //remove_menu_page( 'tools.php' ); //**************************//Tools
  //remove_menu_page( 'options-general.php' ); //****************//Settings
}
add_action('admin_menu', 'remove_menus');



/*TODO: optimize and comment this funcion to allow remove some dashboard menus due the user role

function remove_dashboard_menus() {
    $menu_items = array(
        //'edit-comments.php' => array('administrator', 'editor', 'author', 'contributor'), 
        'index.php' => array('administrator'),
        'edit.php' => array('administrator'),
        'edit.php?post_type=portfolio' => array('administrator'),
        'edit.php?post_type=page' => array('administrator'),
        'themes.php' => array('administrator'),
        'plugins.php' => array('administrator'),
        'tools.php' => array('administrator'),
        'options-general.php' => array('administrator', 'editor', 'author')
    );

    $current_user = wp_get_current_user();
    $user_roles = $current_user->roles;

    foreach ($menu_items as $menu_slug => $allowed_roles) {
        if (array_intersect($user_roles, $allowed_roles)) {
            remove_menu_page($menu_slug);
        }
    }
}
add_action('admin_menu', 'remove_dashboard_menus');

*/
