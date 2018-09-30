<?php
/*
Plugin Name: True Placements
Description: Placements functionality
Author: [whitepenny]
Author URI: http://www.whitepenny.com
*/


// add_action( 'init', 'sr_placement_cpt' );
//
// function sr_placement_cpt() {
//
//     register_post_type( 'placement', array(
//       'labels' => array(
//         'name' => 'Placements',
//         'singular_name' => 'Placement',
//        ),
//       'description' => 'Placements of Applicants.',
//       'has_archive' => true,
//       'public' => true,
//       'menu_position' => 20,
//       'supports' => array( 'title', 'editor', 'thumbnail' ),
//       'show_in_nav_menus' => true,
//       'capability_type' => 'post',
//       'show_in_rest'       => true,
//       'taxonomies'  => array( 'placement'),
//     ));
// }
//
// add_action('init', 'placement_practices', 0);
//
// function placement_practices() {
//     $labels = array(
//       'name'              => _x( 'Placement Practices', 'taxonomy general name' ),
//       'singular_name'     => _x( 'Placement Practice', 'taxonomy singular name' ),
//       'search_items'      => __( 'Show Placement Practice' ),
//       'all_items'         => __( 'All Placement Practice' ),
//       'parent_item'       => __( 'Parent Placement Practice' ),
//       'parent_item_colon' => __( 'Parent Placement Practice' ),
//       'edit_item'         => __( 'Edit Placement Practice' ),
//       'update_item'       => __( 'Update Placement Practice' ),
//       'add_new_item'      => __( 'Add New Placement Practice' ),
//       'new_item_name'     => __( 'New Placement Practice' ),
//       'menu_name'         => __( 'Placement Practice' ),
//     );
//
//   $args = array(
//     'labels' => $labels,
//   );
//
//   register_taxonomy( 'placement_practice', 'placement', $args );
// }
//
// add_action('init', 'placement_functions', 0);
//
// function placement_functions() {
//     $labels = array(
//       'name'              => _x( 'Placement Functions', 'taxonomy general name' ),
//       'singular_name'     => _x( 'Placement Function', 'taxonomy singular name' ),
//       'search_items'      => __( 'Show Placement Function' ),
//       'all_items'         => __( 'All Placement Function' ),
//       'parent_item'       => __( 'Parent Placement Function' ),
//       'parent_item_colon' => __( 'Parent Placement Function' ),
//       'edit_item'         => __( 'Edit Placement Function' ),
//       'update_item'       => __( 'Update Placement Function' ),
//       'add_new_item'      => __( 'Add New Placement Function' ),
//       'new_item_name'     => __( 'New Placement Function' ),
//       'menu_name'         => __( 'Placement Functions' ),
//     );
//
//   $args = array(
//     'labels' => $labels,
//   );
//
//   register_taxonomy( 'placement_function', 'placement', $args );
// }
//
// add_action('init', 'placement_assets', 0);
//
// function placement_assets() {
//     $labels = array(
//       'name'              => _x( 'Placement Assets', 'taxonomy general name' ),
//       'singular_name'     => _x( 'Placement Asset', 'taxonomy singular name' ),
//       'search_items'      => __( 'Show Placement Asset' ),
//       'all_items'         => __( 'All Placement Asset' ),
//       'parent_item'       => __( 'Parent Placement Asset' ),
//       'parent_item_colon' => __( 'Parent Placement Asset' ),
//       'edit_item'         => __( 'Edit Placement Asset' ),
//       'update_item'       => __( 'Update Placement Asset' ),
//       'add_new_item'      => __( 'Add New Placement Asset' ),
//       'new_item_name'     => __( 'New Placement Asset' ),
//       'menu_name'         => __( 'Placement Asset' ),
//     );
//
//   $args = array(
//     'labels' => $labels,
//   );
//
//   register_taxonomy( 'placement_asset', 'placement', $args );
// }
//
// add_action('init', 'placement_locations', 0);
//
// function placement_locations() {
//     $labels = array(
//       'name'              => _x( 'Placement Locations', 'taxonomy general name' ),
//       'singular_name'     => _x( 'Placement Location', 'taxonomy singular name' ),
//       'search_items'      => __( 'Show Placement Location' ),
//       'all_items'         => __( 'All Placement Location' ),
//       'parent_item'       => __( 'Parent Placement Location' ),
//       'parent_item_colon' => __( 'Parent Placement Location' ),
//       'edit_item'         => __( 'Edit Placement Location' ),
//       'update_item'       => __( 'Update Placement Location' ),
//       'add_new_item'      => __( 'Add New Placement Location' ),
//       'new_item_name'     => __( 'New Placement Location' ),
//       'menu_name'         => __( 'Placement Location' ),
//     );
//
//   $args = array(
//     'labels' => $labels,
//   );
//
//   register_taxonomy( 'placement_location', 'placement', $args );
// }
//
// add_action('init', 'placement_collection', 0);
//
// function placement_collection() {
//     $labels = array(
//       'name'              => _x( 'Placement Collections', 'taxonomy general name' ),
//       'singular_name'     => _x( 'Placement Collection', 'taxonomy singular name' ),
//       'search_items'      => __( 'Show Placement Collection' ),
//       'all_items'         => __( 'All Placement Collection' ),
//       'parent_item'       => __( 'Parent Placement Collection' ),
//       'parent_item_colon' => __( 'Parent Placement Collection' ),
//       'edit_item'         => __( 'Edit Placement Collection' ),
//       'update_item'       => __( 'Update Placement Collection' ),
//       'add_new_item'      => __( 'Add New Placement Collection' ),
//       'new_item_name'     => __( 'New Placement Collection' ),
//       'menu_name'         => __( 'Placement Collection' ),
//     );
//
//   $args = array(
//     'labels' => $labels,
//   );
//
//   register_taxonomy( 'placement_collection', 'placement', $args );
// }
//
// add_action('init', 'placement_quarters', 0);
//
// function placement_quarters() {
//     $labels = array(
//       'name'              => _x( 'Placement Quarters', 'taxonomy general name' ),
//       'singular_name'     => _x( 'Placement Quarter', 'taxonomy singular name' ),
//       'search_items'      => __( 'Show Placement Quarters' ),
//       'all_items'         => __( 'All Placement Quarters' ),
//       'parent_item'       => __( 'Parent Placement Quarter' ),
//       'parent_item_colon' => __( 'Parent Placement Quarter' ),
//       'edit_item'         => __( 'Edit Placement Quarter' ),
//       'update_item'       => __( 'Update Placement Quarter' ),
//       'add_new_item'      => __( 'Add New Placement Quarter' ),
//       'new_item_name'     => __( 'New Placement Quarter' ),
//       'menu_name'         => __( 'Placement Quarters' ),
//     );
//
//   $args = array(
//     'labels' => $labels,
//   );
//
//   register_taxonomy( 'placement_quarters', 'placement', $args );
// }
//
