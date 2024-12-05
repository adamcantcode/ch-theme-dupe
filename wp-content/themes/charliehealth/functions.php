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

/** 
 *  Add separate editor styles on BlogPosts and Research Posts
 */
add_action('pre_get_posts', function () {
  global $pagenow, $typenow;

  // Ensure this code only runs in the admin area
  if (!is_admin()) {
    return;
  }

  // Check if we are on the post editing screen
  if ('post-new.php' === $pagenow || 'post.php' === $pagenow) {

    // Add editor styles for specific post types
    $post_types_to_style = ['post', 'research', 'press', 'activities'];
    if (in_array($typenow, $post_types_to_style)) {
      add_editor_style('editor-styles-posts.css');
    }

    $post_types_to_style_tm_aoc = ['treatment-modalities', 'areas-of-care', 'page'];
    if (in_array($typenow, $post_types_to_style_tm_aoc)) {
      // Check for the "Condition Treatment" page template
      if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
        $template_slug = get_page_template_slug($post_id);

        if ('page-condition-treatment.php' === $template_slug) {
          add_editor_style('editor-styles-posts.css');
          add_post_type_support('page', 'excerpt');
        }
      }
    }
  }
});

/** 
 * ACF Settings 
 */

// Allow Options page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}

// Register all ACF blocks via block.json 
function register_acf_blocks()
{
  register_block_type(__DIR__ . '/build/blocks/hero');
  register_block_type(__DIR__ . '/build/blocks/fifty-fifty');
  register_block_type(__DIR__ . '/build/blocks/card-grid');
  register_block_type(__DIR__ . '/build/blocks/buttons');
  register_block_type(__DIR__ . '/build/blocks/testimonial');
  register_block_type(__DIR__ . '/build/blocks/sticky-split');
  register_block_type(__DIR__ . '/build/blocks/faq');
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
  register_block_type(__DIR__ . '/build/blocks/region-map');
  register_block_type(__DIR__ . '/build/blocks/iop-chart');
  register_block_type(__DIR__ . '/build/blocks/iop-schedule');
  register_block_type(__DIR__ . '/build/blocks/callout');
  register_block_type(__DIR__ . '/build/blocks/check-list');
  register_block_type(__DIR__ . '/build/blocks/stats-table');
  register_block_type(__DIR__ . '/build/blocks/image-grid');
  register_block_type(__DIR__ . '/build/blocks/outcomes-chart');
  register_block_type(__DIR__ . '/build/blocks/outcomes-infographic');
  register_block_type(__DIR__ . '/build/blocks/card-hiring');
  register_block_type(__DIR__ . '/build/blocks/collapsible-content');
  register_block_type(__DIR__ . '/build/blocks/testimonial-review');
  // register_block_type(__DIR__ . '/build/blocks/review-testimonial-review');
  register_block_type(__DIR__ . '/build/blocks/testimonial-list');
  register_block_type(__DIR__ . '/build/blocks/posts-list-in-content');
  register_block_type(__DIR__ . '/build/blocks/testimonial-carousel');
  register_block_type(__DIR__ . '/build/blocks/research-list');
  register_block_type(__DIR__ . '/build/blocks/fifty-fifty-grid');
  register_block_type(__DIR__ . '/build/blocks/card-link');
  register_block_type(__DIR__ . '/build/blocks/scrolling-steps');
  register_block_type(__DIR__ . '/build/blocks/approach-grid');
  register_block_type(__DIR__ . '/build/blocks/outcomes-block');
  register_block_type(__DIR__ . '/build/blocks/iop-overview');
  register_block_type(__DIR__ . '/build/blocks/aoc-list');
  register_block_type(__DIR__ . '/build/blocks/fifty-fifty-grid-graph');
  register_block_type(__DIR__ . '/build/blocks/tri-grid');
  register_block_type(__DIR__ . '/build/blocks/features');
  register_block_type(__DIR__ . '/build/blocks/features-cards');
  register_block_type(__DIR__ . '/build/blocks/home-testimonials');
  register_block_type(__DIR__ . '/build/blocks/card-link-home');
  register_block_type(__DIR__ . '/build/blocks/how-it-works');
  register_block_type(__DIR__ . '/build/blocks/our-providers');
  register_block_type(__DIR__ . '/build/blocks/grid-eight-four');
  register_block_type(__DIR__ . '/build/blocks/home-cta');
  register_block_type(__DIR__ . '/build/blocks/values');
  register_block_type(__DIR__ . '/build/blocks/testimonials-careers');
  register_block_type(__DIR__ . '/build/blocks/top-startup');
  register_block_type(__DIR__ . '/build/blocks/comparison-table');
  register_block_type(__DIR__ . '/build/blocks/crisis-resources');
  register_block_type(__DIR__ . '/build/blocks/scrolling-cta');
  register_block_type(__DIR__ . '/build/blocks/steps-list');
  register_block_type(__DIR__ . '/build/blocks/depression-anxiety-graph');
  register_block_type(__DIR__ . '/build/blocks/full-cards');
  register_block_type(__DIR__ . '/build/blocks/job-board-peek');
  register_block_type(__DIR__ . '/build/blocks/check-list-items');
  register_block_type(__DIR__ . '/build/blocks/blue-full-cards');
  register_block_type(__DIR__ . '/build/blocks/child-pages');
  register_block_type(__DIR__ . '/build/blocks/activities');
  register_block_type(__DIR__ . '/build/blocks/gated-content');
  register_block_type(__DIR__ . '/build/blocks/insurance-cost');
  register_block_type(__DIR__ . '/build/blocks/testimonials-slider');
  register_block_type(__DIR__ . '/build/blocks/therapists');
  register_block_type(__DIR__ . '/build/blocks/people-testimonials');
  register_block_type(__DIR__ . '/build/blocks/story');
  register_block_type(__DIR__ . '/build/blocks/bubble-quote');
  register_block_type(__DIR__ . '/build/blocks/press-posts');
  register_block_type(__DIR__ . '/build/blocks/info-accordion');
  register_block_type(__DIR__ . '/build/blocks/conditions');
  register_block_type(__DIR__ . '/build/blocks/partner-testimonial-review');
  register_block_type(__DIR__ . '/build/blocks/gradient-section');
  register_block_type(__DIR__ . '/build/blocks/testimonials-videos');
  register_block_type(__DIR__ . '/build/blocks/testimonials-council-members');
  register_block_type(__DIR__ . '/build/blocks/single-card');
  register_block_type(__DIR__ . '/build/blocks/insurance-providers');
  register_block_type(__DIR__ . '/build/blocks/insurance-tabs');
  register_block_type(__DIR__ . '/build/blocks/bg-text-overlay');
  register_block_type(__DIR__ . '/build/blocks/testimonial-review-employee');
  register_block_type(__DIR__ . '/build/blocks/contact-us');
  register_block_type(__DIR__ . '/build/blocks/locations-hub');
  register_block_type(__DIR__ . '/build/blocks/posts-list-slider');
  register_block_type(__DIR__ . '/build/blocks/pill-list');
  register_block_type(__DIR__ . '/build/blocks/testimonials-videos-no-quote');
  register_block_type(__DIR__ . '/build/blocks/hero-colors');
  register_block_type(__DIR__ . '/build/blocks/testimonials-videos-quotes');
  register_block_type(__DIR__ . '/build/blocks/posts-list-blog');
  register_block_type(__DIR__ . '/build/blocks/blog-hero');
  register_block_type(__DIR__ . '/build/blocks/orbit-image');
  register_block_type(__DIR__ . '/build/blocks/basic-checklist');
  // Referrals
  register_block_type(__DIR__ . '/build/blocks/hero-shapes');
  register_block_type(__DIR__ . '/build/blocks/static-positioned-image');
  register_block_type(__DIR__ . '/build/blocks/referrals-features-cards');
  register_block_type(__DIR__ . '/build/blocks/referrals-testimonials');
  register_block_type(__DIR__ . '/build/blocks/aoc-tmod-list');
  register_block_type(__DIR__ . '/build/blocks/referrals-dropdowns');
  register_block_type(__DIR__ . '/build/blocks/bg-video-bleed');
  register_block_type(__DIR__ . '/build/blocks/continuum-graph');
  register_block_type(__DIR__ . '/build/blocks/referrals-cards');
  register_block_type(__DIR__ . '/build/blocks/referrals-outcomes');
  register_block_type(__DIR__ . '/build/blocks/testimonial-review-provider');
  register_block_type(__DIR__ . '/build/blocks/referrals-testimonials-again');
}
add_action('init', 'register_acf_blocks', 5);

add_filter('block_categories_all', function ($categories) {

  $categories[] = array(
    'slug'  => 'custom',
    'title' => 'Custom Blocks'
  );

  return $categories;
});

/**
 * Blacklist blocks
 */
add_filter('allowed_block_types_all', 'ch_blacklist_blocks');

function ch_blacklist_blocks($allowed_blocks)
{
  // get all the registered blocks
  $blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

  // then disable some of them
  unset($blocks['core/legacy-widget']);
  unset($blocks['core/archives']);
  unset($blocks['core/avatar']);
  unset($blocks['core/calendar']);
  unset($blocks['core/categories']);
  unset($blocks['core/comment-author-name']);
  unset($blocks['core/comment-content']);
  unset($blocks['core/comment-date']);
  unset($blocks['core/comment-edit-link']);
  unset($blocks['core/comment-reply-link']);
  unset($blocks['core/comment-template']);
  unset($blocks['core/comments']);
  unset($blocks['core/comments-pagination']);
  unset($blocks['core/comments-pagination-next']);
  unset($blocks['core/comments-pagination-numbers']);
  unset($blocks['core/comments-pagination-previous']);
  unset($blocks['core/comments-title']);
  unset($blocks['core/gallery']);
  unset($blocks['core/home-link']);
  unset($blocks['core/latest-comments']);
  unset($blocks['core/latest-posts']);
  unset($blocks['core/loginout']);
  unset($blocks['core/navigation']);
  unset($blocks['core/navigation-link']);
  unset($blocks['core/navigation-submenu']);
  unset($blocks['core/page-list']);
  unset($blocks['core/pattern']);
  unset($blocks['core/post-author']);
  unset($blocks['core/post-author-biography']);
  unset($blocks['core/post-author-name']);
  unset($blocks['core/post-comments-form']);
  unset($blocks['core/post-content']);
  unset($blocks['core/post-date']);
  unset($blocks['core/post-excerpt']);
  unset($blocks['core/post-featured-image']);
  unset($blocks['core/post-navigation-link']);
  unset($blocks['core/post-template']);
  unset($blocks['core/post-terms']);
  unset($blocks['core/post-title']);
  unset($blocks['core/query']);
  unset($blocks['core/query-no-results']);
  unset($blocks['core/query-pagination']);
  unset($blocks['core/query-pagination-next']);
  unset($blocks['core/query-pagination-numbers']);
  unset($blocks['core/query-pagination-previous']);
  unset($blocks['core/query-title']);
  unset($blocks['core/read-more']);
  unset($blocks['core/rss']);
  unset($blocks['core/search']);
  unset($blocks['core/site-logo']);
  unset($blocks['core/site-tagline']);
  unset($blocks['core/site-title']);
  unset($blocks['core/social-link']);
  unset($blocks['core/tag-cloud']);
  unset($blocks['core/template-part']);
  unset($blocks['core/term-description']);
  unset($blocks['core/button']);
  unset($blocks['core/buttons']);
  unset($blocks['core/media-text']);
  unset($blocks['core/missing']);
  unset($blocks['core/more']);
  unset($blocks['core/nextpage']);
  unset($blocks['core/pullquote']);
  unset($blocks['core/separator']);
  unset($blocks['core/social-links']);
  unset($blocks['core/spacer']);
  unset($blocks['core/verse']);
  unset($blocks['yoast/faq-block']);
  unset($blocks['yoast/how-to-block']);
  unset($blocks['yoast-seo/breadcrumbs']);
  unset($blocks['core/post-comments']);

  // return the new list of allowed blocks
  return array_keys($blocks);
}

// Reformat acf fields in rest api
add_filter('acf/settings/rest_api_format', function () {
  return 'standard';
});

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
 * Sort MEDICAL REVIEWERS for author pages
 */
function filter_posts_by_acf_field_medical($args, $request)
{
  if (isset($request['medical_reviewer'])) {
    $args['meta_query'] = array(
      array(
        'key' => 'medical_reviewer',
        'value' => intval($request['medical_reviewer']),
        'compare' => '=',
      ),
    );
  }
  return $args;
}
add_filter('rest_post_query', 'filter_posts_by_acf_field_medical', 10, 2);

/**
 * Sort AUTHORS for author pages - research
 */
function filter_research_by_acf_field($args, $request)
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
add_filter('rest_research_query', 'filter_research_by_acf_field', 10, 2);

/**
 * Sort MEDICAL REVIEWERS for author pages - research posts
 */
function filter_research_by_acf_field_medical($args, $request)
{
  if (isset($request['medical_reviewer'])) {
    $args['meta_query'] = array(
      array(
        'key' => 'medical_reviewer',
        'value' => intval($request['medical_reviewer']),
        'compare' => '=',
      ),
    );
  }
  return $args;
}
add_filter('rest_research_query', 'filter_research_by_acf_field_medical', 10, 2);

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

/**
 * Sort POSTS posts by date
 */
function custom_rest_post_query($args, $request)
{
  $args['meta_key'] = 'date';
  $args['orderby'] = 'meta_value title';
  $args['order'] = 'DESC';
  return $args;
}

add_filter('rest_post_query', 'custom_rest_post_query', 10, 2);

function custom_api_search_register_routes()
{
  register_rest_route('search-by-title/v1', '/search', array(
    'methods'  => 'GET',
    'callback' => 'custom_api_search_results',
    'permission_callback' => '__return_true'
  ));
}
add_action('rest_api_init', 'custom_api_search_register_routes');

function custom_api_search_results($request)
{
  $search_term = $request->get_param('term');
  $page = $request->get_param('page');
  $per_page = $request->get_param('per_page');

  // Set default values for page and per_page parameters
  $page = isset($page) ? absint($page) : 1;
  $per_page = isset($per_page) ? absint($per_page) : 6;

  $args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    's'              => $search_term,
    'paged'          => $page,
    'posts_per_page' => $per_page,
  );

  $query = new WP_Query($args);

  $results = array();

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      // Get the featured media (if available)
      $featured_media = null;
      $featured_media_id = get_post_thumbnail_id();
      if ($featured_media_id) {
        $featured_media = wp_get_attachment_image_src($featured_media_id, 'card-thumb');
        if ($featured_media) {
          $featured_media = $featured_media[0];
        }
      }

      // Get the tags of the post
      $tags = wp_get_post_tags(get_the_ID(), array('fields' => 'all'));

      // Get the ACF data of the post
      $acf_data = get_fields();

      $result = array(
        'id'               => get_the_ID(),
        'title'            => get_the_title(),
        'link'        => get_permalink(),
        'tags'             => $tags,
        'acf'              => $acf_data,
        'featured_media'   => $featured_media,
        // Add any additional fields you need
      );

      $results[] = $result;
    }
  }

  wp_reset_postdata();

  $total_pages = $query->max_num_pages;

  $response = array(
    'results'      => $results,
    'total_pages'  => $total_pages,
    'current_page' => $page,
    'per_page'     => $per_page,
  );

  // Set the X-WP-Total header
  $response_headers = array(
    'X-WP-Total' => $query->found_posts,
  );

  // // Add embedded data
  // $response['_embedded'] = array(
  //   'item' => $results,
  // );

  return new WP_REST_Response($response, 200, $response_headers);
}
/**
 * Allow file types
 */

// Allow SVG uploads for administrator users.
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

// Add SVG files mime check.
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

// Allow webp
function allow_webp_upload($mimes)
{
  $mimes['webp'] = 'image/webp';
  return $mimes;
}
add_filter('upload_mimes', 'allow_webp_upload');

// WP ALL IMPORT allow SVG
add_filter('wp_all_import_image_mime_type', 'wpai_image_mime_type', 10, 2);

function wpai_image_mime_type($mime_type, $image_filepath)
{
  if (empty($mime_type) and preg_match('%\W(svg)$%i', basename($image_filepath))) {
    return 'image/svg+xml';
  }
  return $mime_type;
}

/**
 * Rename Category (taxononomy) to Audience
 */
function renamce_categoery_to_audience()
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
add_action('init', 'renamce_categoery_to_audience');

/**
 * Remove WP Logo in admin bar
 */
function remove_wp_logo()
{
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'remove_wp_logo', 0);

/**
 * Fix admin sidebar icon styles
 */
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts()
{
  echo '<style>
    #adminmenu .wp-menu-image img[src$=".svg"] {
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

/** 
 * Remove menus depending on site (Main vs Outreach)
 */
function hide_menus_on_multisite()
{
  global $pagenow;
  // Check if it's the admin area and site ID is 3
  if (is_admin() && get_current_blog_id() === 3) {
    // Remove specific menus
    remove_menu_page('edit.php');
    remove_menu_page('edit.php?post_type=areas-of-care');
    remove_menu_page('edit.php?post_type=authors');
    remove_menu_page('edit.php?post_type=medical-reviewer');
    remove_menu_page('edit.php?post_type=press');
    remove_menu_page('edit.php?post_type=referral');
    remove_menu_page('edit.php?post_type=research');
    remove_menu_page('edit.php?post_type=team-members');
    remove_menu_page('edit.php?post_type=treatment-modalities');
    remove_menu_page('edit.php?post_type=activities');
    // remove_menu_page('edit.php?post_type=testimonial');
    remove_menu_page('edit.php?post_type=employee-testimonial');
    // remove_menu_page('edit.php?post_type=partner-testimonial');
    remove_menu_page('edit.php?post_type=outreach-team-member');
    remove_menu_page('edit.php?post_type=insurance');
    remove_menu_page('edit.php?post_type=locations');
    remove_menu_page('edit.php?post_type=event');
    remove_menu_page('edit.php?post_type=region');
  } else {
    remove_menu_page('edit.php?post_type=region');
    // remove_menu_page('edit.php?post_type=outreach-team-member');
    remove_menu_page('edit.php?post_type=event');
  }
}
add_action('admin_menu', 'hide_menus_on_multisite', 999);
/** 
 * Remove comments
 */
add_action('admin_init', function () {
  global $pagenow;

  if ($pagenow === 'edit-comments.php') {
    wp_safe_redirect(admin_url());
    exit;
  }
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  foreach (get_post_types() as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
});
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});
add_action('admin_bar_menu', function () {
  remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
}, 0);

add_filter('custom_menu_order', 'custom_menu_order', 10, 1);

add_filter('menu_order', 'custom_menu_order', 10, 1);

/**
 * Custom menu order for admin sidebar
 */
function custom_menu_order($menu_ord)
{
  if (!$menu_ord) return true;

  return array(
    'index.php', // Dashboard
    'edit.php?post_type=page', // Pages
    'edit.php', // Posts
    'edit.php?post_type=research', // Research
    'edit.php?post_type=activities', // Activites
    'edit.php?post_type=authors', // Authors
    'edit.php?post_type=medical-reviewer', // Medical Reviewer
    'edit.php?post_type=areas-of-care', // Areas of Care
    'edit.php?post_type=treatment-modalities', // Treatment Modalities
    // 'edit.php?post_type=referral', // Referrals
    'edit.php?post_type=employee-testimonial', // Team
    'edit.php?post_type=testimonial', // Testimonials
    'edit.php?post_type=partner-testimonial', // Partner Testimonials
    'edit.php?post_type=provider-testimonial', // Partner Testimonials
    // 'edit.php?post_type=region', // Regions
    'edit.php?post_type=outreach-team-member', // Outreach Members
    'edit.php?post_type=insurance', // Insurance
    'edit.php?post_type=locations', // Locations
    'edit.php?post_type=press', // Press
    // 'edit.php?post_type=event', // Events
    'separator1', // First separator
    'upload.php', // Media
  );
}

/**
 * Remove default image sizes
 */
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

/** 
 * Add custom image sizes
 */
add_action('after_setup_theme', 'wpdocs_theme_setup');
function wpdocs_theme_setup()
{
  add_image_size('featured-large', 800);
  add_image_size('card-thumb', 500);
}

add_filter('wpseo_primary_term_taxonomies', '__return_empty_array');


/** NOTE Not needed due to WP Engine Settings */
// add_filter( 'xmlrpc_enabled', '__return_false' );

include_once('helpers/helper-functions.php');

/**
 * Only load block js/css if actually on page.
 */
add_filter('should_load_separate_core_block_assets', '__return_true');


/* TEMP COLORS
// $test = 'bg-lightest-teal'
// $test = 'bg-dark-teal'
// $test = 'bg-yellow-200'
// $test = 'bg-primary-black-blue'
// $test = 'bg-darker-blue'
// $test = 'bg-primary-100'
// $test = 'bg-primary-200'
// $test = 'bg-orange-200'
// $test = 'mt-0'
// $test = 'bg-off-white'
// $test = 'bg-grey-warm'
// $test = 'bg-pale-blue-300'
// $test = 'bg-pale-blue-100'
// $test = 'gap-0'
// $test = '!text-[28px]'
// $test = '!text-[20px]'
// $test = 'font-heading-serif lg:text-[40px] text-[32px] leading-[1.1] overflow-y-hidden'
// $test = 'lg:-mb-base5-10'
// $test = 'lg:!-mb-base5-10'
// $test = 'box-decoration-clone'
// $test = 'rounded-md lg:p-base5-7 bg-grey-warm mb-base5-7 p-base5-3'
// $test = 'bg-gradient-to-b from-primary-100 to-primary-200'
// $test = 'bg-gradient-to-b from-primary-200 to-primary'
// $test = 'bg-gradient-to-b from-white to-referrals-green-100'
// $test = 'bg-gradient-to-b from-referrals-blue-100 to-referrals-blue-200'
// $test = 'bg-referrals-green-200'
// $test = 'bg-referrals-green-100'
// $test = '!gap-[100px]'
// $test = '!overflow-visible'

// $test = '!text-h2-lg !text-h2 !font-heading !font-heading-serif !text-h5'
// $test = 'bg-pale-blue-100'
// $test = 'bg-[linear-gradient(315deg,var(--tw-gradient-stops))] from-lavender-100 from-50% to-lavedner-300'
// $test = 'has-color-font-gradient-yellow'
// $test = 'text-referrals-blue-300'

// mobileMenuX[0].classList.add('top-1/2', '-translate-y-1/2');
//     mobileMenuX[1].classList.add('scale-0');
//     mobileMenuX[2].classList.add('-top-1/2', '-translate-y-1/2');
//     setTimeout(() => {
//       mobileMenuX[0].classList.add('rotate-45');
//       mobileMenuX[2].classList.add('-rotate-45');
//     }, 350);
//   };
//   const closeAnimation = () => {
//     mobileMenuX[0].classList.remove('top-1/2', '-translate-y-1/2', 'rotate-45');
//     mobileMenuX[1].classList.remove('scale-0', 'origin-center');
//     mobileMenuX[2].classList.remove(
//       '-top-1/2',
//       '-translate-y-1/2',
//       '-rotate-45'
//     );
//     setTimeout(() => {
//       mobileMenuX[0].classList.remove('rotate-45');
//       mobileMenuX[2].classList.remove('-rotate-45');
//     }, 350);
//   };
//   const openPanel = () => {
//     panel.classList.remove('opacity-0', 'pointer-events-none', 'invisible');
//   };
//   const closePanel = () => {
//     panel.classList.add('opacity-0', 'pointer-events-none', 'invisible');
//   };
*/

// Allow editor access to privacy policy page
add_action('map_meta_cap', 'custom_manage_privacy_options', 1, 4);
function custom_manage_privacy_options($caps, $cap, $user_id, $args)
{
  if (!is_user_logged_in()) return $caps;

  $user_meta = get_userdata($user_id);
  if (array_intersect(['editor', 'administrator'], $user_meta->roles)) {
    if ('manage_privacy_options' === $cap) {
      $manage_name = is_multisite() ? 'manage_network' : 'manage_options';
      $caps = array_diff($caps, [$manage_name]);
    }
  }
  return $caps;
}

// Allow Editors and Administrators to add scripts
function add_custom_capability_to_editors($caps, $cap, $user_id)
{
  if ('unfiltered_html' === $cap && user_can($user_id, 'editor')) {
    $caps = array('unfiltered_html');
  }
  return $caps;
}
add_filter('map_meta_cap', 'add_custom_capability_to_editors', 1, 3);
function add_custom_capability_to_admins($caps, $cap, $user_id)
{
  if ('unfiltered_html' === $cap && user_can($user_id, 'administrator')) {
    $caps = array('unfiltered_html');
  }
  return $caps;
}
add_filter('map_meta_cap', 'add_custom_capability_to_admins', 1, 3);

function remove_dashicons_if_not_logged_in()
{
  if (!is_user_logged_in()) {
    wp_deregister_style('dashicons');
    wp_dequeue_style('dashicons');
  }
}
add_action('wp_enqueue_scripts', 'remove_dashicons_if_not_logged_in', 100);

add_filter('wpseo_json_ld_output', '__return_false');

function change_author_name_yoast_meta($name, $presentation)
{
  if (is_singular('post') || is_singular('research')) {
    if (get_field('by_author', get_the_ID())) {
      $name = get_field('by_author', get_the_ID())->post_title;
      return $name;
    }
  }
}

add_filter('wpseo_meta_author', 'change_author_name_yoast_meta', 10, 2);

if (is_singular('post') || is_singular('research')) {
  add_filter('wpseo_enhanced_slack_data', function ($data) {
    if (get_field('by_author', get_the_ID())) {
      $data['Written by'] = get_field('by_author', get_the_ID())->post_title;
      return $data;
    }
  });
}

/**
 * FIX yoast canonical, og:url mismatch
 */
function gb_wpseo_canonical($canonical)
{
  $paged = get_query_var('paged');

  if (isset($paged) && (int) $paged > 0) {
    return trailingslashit($canonical) . 'page/' . $paged;

    return $url;
  }

  return $canonical;
}

add_filter('wpseo_opengraph_url', 'gb_wpseo_canonical');

function remove_schema_pro_breadcrumbs($bool, $post_id, $type)
{
  if ('breadcrumb' == $type) {
    if (is_singular('areas-of-care') || is_singular('treatment-modalities')) {
      return false;
    } else {
      return true;
    }
  } else {
    return true;
  }
}
add_filter('wp_schema_pro_global_schema_enabled',  'remove_schema_pro_breadcrumbs', 20, 3);

// Disable /users rest routes
// add_filter('rest_endpoints', function ($endpoints) {
//   if (isset($endpoints['/wp/v2/users'])) {
//     unset($endpoints['/wp/v2/users']);
//   }
//   if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
//     unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
//   }
//   return $endpoints;
// });

function custom_posts_columns($columns)
{
  $columns['modified_date'] = 'Last Modified';
  return $columns;
}
add_filter('manage_post_posts_columns', 'custom_posts_columns');

function custom_posts_column_content($column_name, $post_id)
{
  if ($column_name === 'modified_date') {
    $post = get_post($post_id);
    $modified_date = get_post_modified_time('Y/m/d \a\t h:i a', true, $post);
    echo $modified_date;
  }
}
add_action('manage_post_posts_custom_column', 'custom_posts_column_content', 10, 2);

function custom_posts_column_sortable($columns)
{
  $columns['modified_date'] = 'modified_date';
  return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'custom_posts_column_sortable');

function custom_posts_column_orderby($query)
{
  if (!is_admin() || !$query->is_main_query()) {
    return;
  }

  $orderby = $query->get('orderby');
  if ($orderby === 'modified_date') {
    $query->set('orderby', 'modified');
  }
}
add_action('pre_get_posts', 'custom_posts_column_orderby');

/**
 * Customize admin bar colors for staging environments
 */
function customize_admin_bar_color_based_on_url()
{
  // Get the current URL
  $current_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

  // Define colors for specific URLs
  $url_colors = array(
    'charliehstg.wpengine.com' => '#6E0000',   // Red color for staging URL
    'charliehdev.wpengine.com' => '#8B8000',   // Green color for development URL
    'wpch.local' => '#023020',   // Green color for local
  );

  // Set default color
  $default_color = '#000000'; // Black color if the URL is not matched

  // Find the matching color for the current URL
  $admin_bar_color = $default_color;
  foreach ($url_colors as $url => $color) {
    if (strpos($current_url, $url) !== false) {
      $admin_bar_color = $color;
      break;
    }
  }

  // Add inline CSS to change admin bar color
  echo '<style type="text/css">
      #wpadminbar {
          background-color: ' . esc_attr($admin_bar_color) . ' !important;
      }
  </style>';
}
add_action('admin_head', 'customize_admin_bar_color_based_on_url');
add_action('wp_head', 'customize_admin_bar_color_based_on_url');

// Increase public post preview nonce life
add_filter('ppp_nonce_life', 'my_nonce_life');
function my_nonce_life()
{
  return 14 * DAY_IN_SECONDS;
}

function fetch_and_store_data_from_api()
{
  // API credentials
  $api_username = 'mztp11ui';
  $api_password = '171wgoyoy1bcx413gfq8';

  // Prepare authentication header
  $auth_header = 'Basic ' . base64_encode($api_username . ':' . $api_password);

  // Request headers
  $headers = array(
    'Authorization' => $auth_header,
  );

  // API endpoint
  $api_url = 'https://sheetdb.io/api/v1/j9noe825wd4sj?sheet=Payor%20Marketing%20Overview';

  // Make the API request
  $response = wp_remote_get($api_url, array('headers' => $headers));

  // Check if the request was successful
  if (is_array($response) && !is_wp_error($response)) {
    // Get the body of the response
    $data = wp_remote_retrieve_body($response);
    $data;
    // Check if data is valid
    if ($data) {
      // Store the data in WordPress
      update_option('my_api_data', $data);
    }
  }
}

// Schedule the function to run once daily
add_action('wp', 'schedule_fetch_and_store_data');
function schedule_fetch_and_store_data()
{
  // 4am
  $dst_in_effect = date('I');
  $hour_utc = $dst_in_effect ? 9 : 8;
  $timestamp = mktime($hour_utc, 0, 0, date('n'), date('j'), date('Y'));
  if (!wp_next_scheduled('fetch_and_store_data_event_10')) {
    wp_schedule_event($timestamp, 'daily', 'fetch_and_store_data_event_10');
  }
}
add_action('fetch_and_store_data_event_10', 'fetch_and_store_data_from_api');

// Hide admin bar if subscriber
add_action('after_setup_theme', 'hide_admin_bar_for_subscribers');

function hide_admin_bar_for_subscribers()
{
  if (is_current_user_subscriber()) {
    show_admin_bar(false);
  }
}

function force_social_title_to_seo_title()
{
  if (is_singular()) {
    global $post;

    // Get the raw Yoast SEO title with variables
    $raw_seo_title = get_post_meta($post->ID, '_yoast_wpseo_title', true);

    // If no custom SEO title is set, use the post title
    if (empty($raw_seo_title)) {
      $raw_seo_title = '%%title%% %%page%% %%sep%% %%sitename%%';
    }

    // Replace the variables with their actual values
    $seo_title = wpseo_replace_vars($raw_seo_title, $post);

    // Set the Facebook Open Graph title
    add_filter('wpseo_opengraph_title', function () use ($seo_title) {
      return $seo_title;
    });

    // Set the Twitter Card title (and X title)
    add_filter('wpseo_twitter_title', function () use ($seo_title) {
      return $seo_title;
    });
  }
}
add_action('wp', 'force_social_title_to_seo_title');
// FIX TUTORLMS YOAST NO NOINDEXING
// Function to set noindex for lessons and quizzes
function noindex_tutor_lms_lesson_and_quiz($robots)
{
  if (is_singular('lesson') || is_singular('tutor_quiz')) {
    return 'noindex, nofollow';
  } else {
    return $robots;
  }
}
add_filter('wpseo_robots', 'noindex_tutor_lms_lesson_and_quiz');

// Function to remove lessons and quizzes from Yoast sitemap
function remove_lesson_and_quiz_from_sitemap($value, $post_type)
{
  $post_type_to_exclude = array('lesson', 'tutor_quiz');
  if (in_array($post_type, $post_type_to_exclude)) return true;
}
add_filter('wpseo_sitemap_exclude_post_type', 'remove_lesson_and_quiz_from_sitemap', 10, 2);