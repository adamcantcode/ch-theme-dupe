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

if (
  false !== stristr($_SERVER['REQUEST_URI'], 'post-new.php') && isset($_GET['post_type']) && 'post' === $_GET['post_type']
  || false !== stristr($_SERVER['REQUEST_URI'], 'post.php') && 'post' === get_post_type($_GET['post'])
) {
  add_editor_style('editor-styles-posts.css');
}

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
  register_block_type(__DIR__ . '/build/blocks/large-quote');
  register_block_type(__DIR__ . '/build/blocks/tabs');
  register_block_type(__DIR__ . '/build/blocks/carousel');
  register_block_type(__DIR__ . '/build/blocks/posts-list');
  register_block_type(__DIR__ . '/build/blocks/teams');
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

/**
 * Allow .webp
 */
function allow_webp_upload($mimes)
{
  $mimes['webp'] = 'image/webp';
  return $mimes;
}
add_filter('upload_mimes', 'allow_webp_upload');


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
add_action('admin_init', function () {
  // Redirect any user trying to access comments page
  global $pagenow;

  if ($pagenow === 'edit-comments.php') {
    wp_safe_redirect(admin_url());
    exit;
  }
  // Remove comments metabox from dashboard
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  // Disable support for comments and trackbacks in post types
  foreach (get_post_types() as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
});
// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);
// Remove comments page in menu
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});
// Remove comments links from admin bar
add_action('admin_bar_menu', function () {
  remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
}, 0);

// Get properly formatted acf fields in rest API 🙄
add_filter('acf/settings/rest_api_format', function () {
  return 'standard';
});

add_filter('custom_menu_order', 'ch_menu_order', 10, 1);

add_filter('menu_order', 'ch_menu_order', 10, 1);

function ch_menu_order($menu_ord)
{

  if (!$menu_ord) return true;

  return array(

    'index.php', // Dashboard
    'edit.php?post_type=page', // Pages
    'edit.php', // Posts
    'edit.php?post_type=research', // Research
    'edit.php?post_type=authors', // Authors
    'edit.php?post_type=medical-reviewer', // Medical Reviewer
    'edit.php?post_type=areas-of-care', // Areas of Care
    'edit.php?post_type=treatment-modalities', // Treatment Modalities
    'edit.php?post_type=referral', // Referrals
    'edit.php?post_type=press', // Press
    'edit.php?post_type=team-members', // Team
    'separator1', // First separator
    'edit.php?post_type=region', // Regions
    'edit.php?post_type=outreach-team-member', // Outreach Members
    'separator2', // Second separator
    'upload.php', // Media
  );
}

/**
 * Sort AUTHORS for author pages
 */
function filter_posts_by_acf_field($args, $request)
{
  if (isset($request['by_author'])) {
    $args['meta_query'] = array(
      array(
        'key' => 'by_author',
        'value' => intval($request['by_author']),
        'compare' => '=',
      ),
    );
  }
  return $args;
}
add_filter('rest_post_query', 'filter_posts_by_acf_field', 10, 2);


/**
 * Sort PRESS posts by date
 */
function custom_rest_press_query($args, $request)
{
  $args['meta_key'] = 'date';
  $args['orderby'] = 'meta_value title';
  $args['order'] = 'DESC';
  return $args;
}
add_filter('rest_press_query', 'custom_rest_press_query', 10, 2);


function remove_wp_logo()
{
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'remove_wp_logo', 0);

add_filter('intermediate_image_sizes', 'remove_default_img_sizes', 10, 1);

function remove_default_img_sizes($sizes)
{
  $targets = ['thumbnail', 'medium', 'medium_large', 'large', '1536x1536', '2048x2048'];

  foreach ($sizes as $size_index => $size) {
    if (in_array($size, $targets)) {
      unset($sizes[$size_index]);
    }
  }

  return $sizes;
}

add_action('after_setup_theme', 'wpdocs_theme_setup');
function wpdocs_theme_setup()
{
  add_image_size('featured-large', 600);
  add_image_size('card-thumb', 400);
}

/**
 * SEARCH AND REPLACE FUNCTION FOR IN CONTENT CTAS -> BLOCKS
 */
// function replace_text_with_block()
// {
//   global $wpdb;

//   $search_string = '{{mid-page-cta="/dev-resources/staging"}}'; // Replace with the text you want to search for
//   // $block_name = 'acf/pre-footer-cta-block'; // Replace with your custom block name

//   // Get the block's HTML markup
//   $block_content = '<!-- wp:acf/pre-footer-cta-block {"name":"acf/pre-footer-cta-block","data":{},"mode":"preview"} /-->
//   ';

//   // Run the SQL query to update post content
//   $query = $wpdb->prepare(
//     "UPDATE {$wpdb->posts} SET post_content = REPLACE(post_content, %s, %s) WHERE post_type = %s",
//     $search_string,
//     $block_content,
//     'post'
//   );
//   $wpdb->query($query);
// }
// add_action('init', 'replace_text_with_block');


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts()
{
  echo '<style>
    #adminmenu .wp-menu-image img {
      opacity: 1;
      padding: 8px 0;
      height: 20px;
      width: 34px;
    } 
    #adminmenu div.wp-menu-image {
      display: flex;
      justify-content: center;
    }
    #adminmenu li.menu-top:hover .wp-menu-image img {
      filter: invert(62%) sepia(58%) saturate(367%) hue-rotate(169deg) brightness(98%) contrast(84%);
    }
  </style>';
}


/** NOTE - WP AL IMPORT ALLOW SVG */
add_filter('wp_all_import_image_mime_type', 'wpai_image_mime_type', 10, 2);

function wpai_image_mime_type($mime_type, $image_filepath)
{
  if (empty($mime_type) and preg_match('%\W(svg)$%i', basename($image_filepath))) {
    return 'image/svg+xml';
  }
  return $mime_type;
}
