<?php

/**
 * Enqueue styles and scripts
 */
function custom_scripts_and_styles()
{
  $ASSET_INFO = include get_stylesheet_directory() . '/build/theme/index.asset.php';
  wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/build/theme/index.css', array(), $ASSET_INFO['version']);
  wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/build/theme/index.js', array('jquery'), '1.0.0', true);
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

add_theme_support('editor-styles');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

add_editor_style('/build/theme/index.css');

// ACF options page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}


// Register ACF blocks via block.json 
function register_acf_blocks()
{
  register_block_type(__DIR__ . '/build/blocks/hero');
  register_block_type(__DIR__ . '/build/blocks/fifty-fifty');
  register_block_type(__DIR__ . '/build/blocks/card-grid');
  register_block_type(__DIR__ . '/build/blocks/buttons');
  register_block_type(__DIR__ . '/build/blocks/testimonial');
  register_block_type(__DIR__ . '/build/blocks/sticky-split');
  register_block_type(__DIR__ . '/build/blocks/faq');
  // register_block_type(__DIR__ . '/build/blocks/section');
  register_block_type(__DIR__ . '/build/blocks/jump-buttons');
  register_block_type(__DIR__ . '/build/blocks/section-container');
  register_block_type(__DIR__ . '/build/blocks/stats');
  register_block_type(__DIR__ . '/build/blocks/divider');
  register_block_type(__DIR__ . '/build/blocks/cta');
  register_block_type(__DIR__ . '/build/blocks/pre-footer-cta');
}
add_action('init', 'register_acf_blocks', 5);

include_once('helpers/helper-functions.php');

/**
 * Only load block js/css if actually on page.
 */
add_filter('should_load_separate_core_block_assets', '__return_true');

/**
 * Allow SVG uploads for administrator users.
 *
 * @param array $upload_mimes Allowed mime types.
 *
 * @return mixed
 */
add_filter(
  'upload_mimes',
  function ($upload_mimes) {
    // By default, only administrator users are allowed to add SVGs.
    // To enable more user types edit or comment the lines below but beware of
    // the security risks if you allow any user to upload SVG files.
    if (!current_user_can('administrator')) {
      return $upload_mimes;
    }
    $upload_mimes['svg']  = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
  }
);
/**
 * Add SVG files mime check.
 *
 * @param array        $wp_check_filetype_and_ext Values for the extension, mime type, and corrected filename.
 * @param string       $file Full path to the file.
 * @param string       $filename The name of the file (may differ from $file due to $file being in a tmp directory).
 * @param string[]     $mimes Array of mime types keyed by their file extension regex.
 * @param string|false $real_mime The actual mime type or false if the type cannot be determined.
 */
add_filter(
  'wp_check_filetype_and_ext',
  function ($wp_check_filetype_and_ext, $file, $filename, $mimes, $real_mime) {
    if (!$wp_check_filetype_and_ext['type']) {
      $check_filetype  = wp_check_filetype($filename, $mimes);
      $ext             = $check_filetype['ext'];
      $type            = $check_filetype['type'];
      $proper_filename = $filename;
      if ($type && 0 === strpos($type, 'image/') && 'svg' !== $ext) {
        $ext  = false;
        $type = false;
      }
      $wp_check_filetype_and_ext = compact('ext', 'type', 'proper_filename');
    }
    return $wp_check_filetype_and_ext;
  },
  10,
  5
);

add_filter('init', function () {
  global $wp;

  $wp->add_query_var('query');
  $wp->remove_query_var('s');
});


add_filter('request', function ($request) {
  if (isset($_REQUEST['query'])) {
    $request['s'] = $_REQUEST['query'];
  }

  return $request;
});

function remove_page_slug_trailing_slash($redirect_url)
{
  if (is_page('search')) {
    $redirect_url = untrailingslashit($redirect_url);
  }
  return $redirect_url;
}
add_filter('redirect_canonical', 'remove_page_slug_trailing_slash');

// function change_search_url_rewrite()
// {
//   global $wp_rewrite;
//   if (is_search() && !empty($_GET['query'])) {
//     wp_redirect(home_url("search?query=" . urlencode(get_query_var('query'))), 301);
//     exit();
//   } elseif (is_search() && empty($_GET['query'])) {
//     $wp_rewrite->add_rewrite_tag('%query%', '([^/]+)');
//     $wp_rewrite->add_permastruct('search', '/search?query=%query%', false);
//   }
// }
// add_action('template_redirect', 'change_search_url_rewrite');

/**
 * Rename Category to Theme
 *
 */
function be_rename_category_theme()
{

  $singular_name = 'Audience';
  $plural_name = 'Audiences';

  $labels = array(
    'name'          => $plural_name,
    'menu_name'        => $plural_name,
    'singular_name'      => $singular_name,
    'search_items'      => 'Search ' . $plural_name,
    'popular_items'      => 'Popular ' . $plural_name,
    'all_items'        => 'All ' . $plural_name,
    'parent_item'        => 'Parent ' . $singular_name,
    'parent_item_colon'    => 'Parent ' . $singular_name . ':',
    'edit_item'        => 'Edit ' . $singular_name,
    'view_item'        => 'View ' . $singular_name,
    'update_item'        => 'Update ' . $singular_name,
    'add_new_item'      => 'Add New ' . $singular_name,
    'new_item_name'      => 'New ' . $singular_name . ' Name',
    'separate_items_with_commas' => 'Separate ' . $plural_name . ' with commas',
    'add_or_remove_items'    => 'Add or remove ' . $plural_name,
    'back_to_items'      => '← Back to ' . $plural_name,
    'items_list_navigation'   => $plural_name . ' list navigation',
    'items_list'        => $plural_name . ' list',
  );

  global $wp_taxonomies;
  $wp_taxonomies['category']->labels = (object) array_merge((array) $wp_taxonomies['category']->labels, $labels);
}
add_action('init', 'be_rename_category_theme');
