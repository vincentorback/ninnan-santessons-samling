<?php

/**
 * Custom chapter post
 */
add_action('init', 'chapter_register');

function chapter_register() {

  $labels = array(
    'name' => __('Kapitel'),
    'id' => ('chapter'),
    'singular_name' => __('Kapitel'),
    'add_new' => __('Lägg till nytt'),
    'add_new_item' => __('Lägg till nytt chapter'),
    'edit_item' => __('Redigera kapitel'),
    'new_item' => __('Nytt kapitel'),
    'view_item' => __('Visa kapitel'),
    'search_items' => __('Sök kapitel'),
    'not_found' =>  __('Hittade inga kapitel'),
    'not_found_in_trash' => __('Inga kapitel i papperskorgen'),
    'parent_item_colon' => ''

  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => true,
    'has_archive' => __('chapter'),
    'menu_position' => null,
    'supports' => array('title', 'page-attributes'),
    'rewrite' => array( 'slug' => '', 'with_front' => false )
  );

  register_post_type( 'chapter' , $args );
}
