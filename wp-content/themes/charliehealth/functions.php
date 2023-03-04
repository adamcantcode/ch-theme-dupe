<?php

/**
 * Enqueue styles and scripts
 */
function custom_scripts_and_styles()
{
  $ASSET_INFO = include get_stylesheet_directory() . '/build/theme/index.asset.php';
  wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/build/theme/index.css', array(), $ASSET_INFO['version']);
  wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/build/theme/index.js', $ASSET_INFO['dependencies'], $ASSET_INFO['version']);
}
add_action('wp_enqueue_scripts', 'custom_scripts_and_styles');

// //REMOVE GUTENBERG BLOCK LIBRARY CSS FROM LOADING ON FRONTEND
// function remove_wp_block_library_css()
// {
//   wp_dequeue_style('wp-block-library');
//   wp_dequeue_style('wp-block-library-theme');
//   wp_dequeue_style('global-styles'); // REMOVE THEME.JSON
// }
// add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);

// Add custom css to Gutenberg Editor
add_theme_support('editor-styles');
add_editor_style('/build/theme/index.css');

// ACF options page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}
