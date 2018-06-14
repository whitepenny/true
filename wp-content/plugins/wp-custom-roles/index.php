<?php
/*
Plugin Name: [wp] Specifications and Custom Roles
Description: [wp] Specification CPT and Custom Roles
Text Domain: sr-custom-roles
Author: [whitepenny]
Author URI: https://www.whitepenny.com
*/

function sr_add_specification_management_role() {

add_role('specification_manager',
            'Specification Manager',
            array(
                'read' => true,
                'edit_posts' => false,
                'delete_posts' => false,
                'publish_posts' => false,
                'upload_files' => true,
            )
        );
}

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'flush_and_activate' );


function flush_and_activate() {
  sr_add_specification_management_role();
  flush_rewrite_rules();
}

add_action( 'init', 'sr_register_cpt_specifications');

function sr_register_cpt_specifications() {
  $labels = array(
      'name'               => _x( 'Specifications', 'post type general name', 'sr-custom-roles' ),
      'singular_name'      => _x( 'Specification', 'post type singular name', 'sr-custom-roles' ),
      'menu_name'          => _x( 'Specifications', 'admin menu', 'sr-custom-roles' ),
      'name_admin_bar'     => _x( 'Specification', 'add new on admin bar', 'sr-custom-roles' ),
      'add_new'            => _x( 'Add New', 'Specification', 'sr-custom-roles' ),
      'add_new_item'       => __( 'Add New Specification', 'sr-custom-roles' ),
      'new_item'           => __( 'New Specification', 'sr-custom-roles' ),
      'edit_item'          => __( 'Edit Specification', 'sr-custom-roles' ),
      'view_item'          => __( 'View Specification', 'sr-custom-roles' ),
      'all_items'          => __( 'All Specifications', 'sr-custom-roles' ),
      'search_items'       => __( 'Search Specifications', 'sr-custom-roles' ),
      'parent_item_colon'  => __( 'Parent Specifications:', 'sr-custom-roles' ),
      'not_found'          => __( 'No Specifications found.', 'sr-custom-roles' ),
      'not_found_in_trash' => __( 'No Specifications found in Trash.', 'sr-custom-roles' )
    );
     $args = array(
     'label'               => __( 'specifications', 'specifications' ),
     'description'         => __( 'Specifications', 'specifications' ),
     'labels'               => $labels,
     'supports'            => array( 'title', 'comments', 'revisions', ),
     'hierarchical'        => false,
     'public'              => true,
     'show_ui'             => true,
     'has_archive'         => false,
     'rewrite'             => array('slug' => 'specification', 'with_front' => false),
     'capability_type'     => array('specification','specifications'),
     'map_meta_cap'        => true,
     );
     register_post_type( 'specification', $args );
}

add_action('admin_init','specifications_add_role_caps',999);

function specifications_add_role_caps() {

  // Add the roles you'd like to administer the custom post types
  $roles = array('specification_manager','administrator');

  // Loop through each role and assign capabilities
  foreach($roles as $the_role) { 

       $role = get_role($the_role);

               $role->add_cap( 'read' );
               $role->add_cap( 'read_specification');
               $role->add_cap( 'read_private_specifications' );
               $role->add_cap( 'edit_specification' );
               $role->add_cap( 'edit_specifications' );
               $role->add_cap( 'edit_others_specifications' );
               $role->add_cap( 'edit_published_specifications' );
               $role->add_cap( 'publish_specifications' );
               $role->add_cap( 'delete_others_specifications' );
               $role->add_cap( 'delete_private_specifications' );
               $role->add_cap( 'delete_published_specifications' );
  }

}
