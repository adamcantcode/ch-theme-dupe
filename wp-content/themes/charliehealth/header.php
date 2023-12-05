<!doctype html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/x-icon" href="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/charlie-health-favicon.ico'); ?>">
  <link rel="icon" type="image/png" href="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/charlie-health-favicon.png'); ?>">
  <link rel="apple-touch-icon" href="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/charlie-health-favicon.png'); ?>">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#212984">
  <!-- CUSTOM HEADER CODE -->
  <?php
  if (wp_get_environment_type() === 'production') {
    include('wp-content/themes/charliehealth/includes/header-code.php');
  }
  ?>
  <!-- END CUSTOM HEADER CODE -->
  <!-- Pagination Meta -->
  <?php if (is_paged() && $wp_query->max_num_pages > 1) : ?>
    <?php if (get_previous_posts_link()) : ?>
      <link rel="prev" href="<?php echo get_previous_posts_page_link(); ?>" />
    <?php endif; ?>
    <?php if (get_next_posts_link()) : ?>
      <link rel="next" href="<?php echo get_next_posts_page_link(); ?>" />
    <?php endif; ?>
  <?php endif; ?>
  <!-- END PAGINATION META -->
  <?php wp_head(); ?>
  <!-- CUSTOM SCHEMA -->
  <?php include('wp-content/themes/charliehealth/includes/schema.php'); ?>
  <!-- END CUSTOM SCHEMA -->
</head>

<body <?php body_class('bg-white'); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P8BB2ZV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <?php wp_body_open(); ?>
  <!-- <pre class="fixed left-0 right-0 w-full text-xs text-center text-white top-4 -z-10-50 opacity-30">Better care, from anywhere ❤️ Carter Barnhart</pre> -->
  <?php
  $enableBanner = get_field('enable_banner', 'options');
  $enableBlogBanner = get_field('enable_blog_banner', 'options');
  if ($enableBanner) {
    $link = get_field('link', 'options');
    $pages = get_field('pages', 'options');
    if ($pages) {
      $currentPage = get_queried_object_id();
      if (in_array($currentPage, $pages)) {
        $displayOnPage = true;
      }
    }
  }
  if ($enableBlogBanner) {
    $link = get_field('link', 'options');
    $isBlogPost = is_single();
  }
  $showBanner = ($enableBanner && $displayOnPage) || ($enableBlogBanner && $isBlogPost) ? true : false;
  ?>
  <!-- NOT BLOG -->
  <?php if ($showBanner) : ?>
    <div class="z-[9999] w-full lg:h-sp-8 h-sp-14 bg-primary-200 flex justify-center items-center fixed<?= is_user_logged_in() ? ' lg:top-[32px] top-[46px]' : ' top-0'; ?>">
      <div class="w-sp-2 h-sp-2 bg-orange-300 rounded-[50%] ml-sp-5 flex-none"></div>
      <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="inline-block">
        <p class="text-white px-sp-2 font-heading text-[14px] leading-normal mb-0"><?= $link['title']; ?></p>
      </a>
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none" class="flex-none mr-sp-5">
        <path d="M11.4419 5.44194C11.686 5.19787 11.686 4.80214 11.4419 4.55806L7.46447 0.580583C7.22039 0.336506 6.82466 0.336506 6.58058 0.580583C6.33651 0.824661 6.33651 1.22039 6.58058 1.46447L10.1161 5L6.58058 8.53553C6.3365 8.77961 6.3365 9.17534 6.58058 9.41942C6.82466 9.6635 7.22039 9.6635 7.46447 9.41942L11.4419 5.44194ZM-5.46392e-08 5.625L11 5.625L11 4.375L5.46392e-08 4.375L-5.46392e-08 5.625Z" fill="white" />
      </svg>
    </div>
  <?php endif; ?>
  <header class="fixed z-[100] w-screen bg-darker-blue<?= $showBanner ? ' lg:mt-sp-8 mt-sp-14' : ''; ?> <?= is_user_logged_in() ? ' lg:top-[32px] top-[46px]' : ' top-0'; ?>">
    <nav class="section-horizontal">
      <div class="container items-center lg:flex noshow">
        <div class="mr-sp-6">
          <a href="<?= site_url(); ?>">
            <?php include('resources/images/logos/charlie-health_shield-title.php'); ?>
          </a>
        </div>
        <?php if (have_rows('navigation_item_new', 'option')) :
          while (have_rows('navigation_item_new', 'option')) : the_row(); ?>
            <?php
            $topLink = get_sub_field('top_level_item');
            $url = $topLink['url'];
            if ($url === '#') {
              $url = '';
            } else {
              $url = "href='$url'";
            }
            $title = $topLink['title'];
            $target = $topLink['target'];
            ?>
            <div class="relative topLevelNavItem">
              <a <?= $url; ?> target="<?= $target; ?>" class="block text-white no-underline px-sp-3 py-sp-6 font-heading hover:text-lavender-200 text-nav-normal ml-sp-4<?= empty($url) ? ' cursor-default' : ''; ?>"><?= $title; ?></a>
              <?php if (have_rows('secondary_menu', 'option')) : ?>
                <div class="absolute w-[555px] grid grid-cols-2 opacity-0 invisible secondLevelNav transition-all duration-150 translate-x-1 origin-right pb-[5px]">
                  <div class="flex flex-col px-sp-8 py-sp-5 bg-secondary-soft">
                    <?php while (have_rows('secondary_menu', 'option')) : the_row(); ?>
                      <?php
                      $secondaryLink = get_sub_field('secondary_menu_item');
                      $url = $secondaryLink['url'];
                      if ($url === '#') {
                        $url = '';
                      } else {
                        $url = "href='$url'";
                      }
                      $title = $secondaryLink['title'];
                      $target = $secondaryLink['target'];
                      ?>
                      <a <?= $url; ?> target="<?= $target; ?>" class="text-white no-underline font-heading text-nav-normal hover:text-lavender-200 py-sp-3"><?= $title; ?></a>
                    <?php endwhile; ?>
                  </div>
                  <?php if (have_rows('tertiary_menu', 'option')) : ?>
                    <div class="flex flex-col px-sp-8 pt-[26px] pb-[37px] bg-[#131632]">
                      <?php while (have_rows('tertiary_menu', 'option')) : the_row(); ?>
                        <?php
                        $topLink = get_sub_field('tertiary_menu_item');
                        $url = $topLink['url'];
                        if ($url === '#') {
                          $url = '';
                        } else {
                          $url = "href='$url'";
                        }
                        $title = $topLink['title'];
                        $target = $topLink['target'];
                        ?>
                        <a <?= $url; ?> target="<?= $target; ?>" class="no-underline font-heading text-nav-small py-[6px] <?= $url === '' ? 'text-lavender-200 mt-sp-3 first:mt-0' : 'text-white hover:text-lavender-200'; ?>"><?= $title; ?></a>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
        <?php endwhile;
        endif; ?>
        <div class="flex ml-auto content gap-x-sp-2">
          <a href="https://app.charliehealth.com/" target="_blank" class="ch-button button-tertiary-lavender inverted !rounded-[6px]">Client Login</a>
          <a href="<?= get_field('cta', 'option')['url']; ?>" class="ch-button button-tertiary-lavender !rounded-[6px]"><?= get_field('cta', 'option')['title']; ?></a>
        </div>
      </div>
      <div class="container flex justify-between lg:noshow py-sp-5">
        <div>
          <a href="<?= site_url(); ?>">
            <?php include('resources/images/logos/charlie-health_shield-title.php'); ?>
          </a>
        </div>
        <div class="flex flex-col items-end justify-between w-sp-8 mobile-menu-js">
          <div class="w-full h-[1.5px] bg-white relative transition-all duration-100 delay-75 top-0 origin-center mt-[-1px]"></div>
          <div class="w-full h-[1.5px] bg-white relative transition-all duration-200 origin-center"></div>
          <div class="w-full h-[1.5px] bg-white relative transition-all duration-100 delay-75 top-0 origin-center"></div>
        </div>
      </div>
      <div class="bg-secondary-soft fixed panel-js <?= $showBanner ? 'h-[calc(100vh-124px)]' : 'h-[calc(100vh-60px)]' ?> w-full left-0 overflow-y-scroll opacity-0 invisible pointer-events-none transition-all duration-300 flex flex-col pt-sp-3">
        <?php if (have_rows('navigation_item_new', 'option')) :
          while (have_rows('navigation_item_new', 'option')) : the_row(); ?>
            <?php
            $topLink = get_sub_field('top_level_item');
            $url = $topLink['url'];
            if ($url === '#') {
              $url = '';
            } else {
              $url = "href='$url'";
            }
            $title = $topLink['title'];
            $target = $topLink['target'];
            ?>
            <div class="">
              <div class="relative flex items-center justify-between w-full px-sp-5 dropdown-item-js">
                <a <?= $url; ?> target="<?= $target; ?>" class="w-full leading-snug text-white no-underline py-sp-4 font-heading text-[1.25rem] dropdown-select-js"><?= $title; ?></a>
                <?php if (empty($url)) : ?>
                  <div class="relative mr-2 transition-all duration-300 open-close-js">
                    <div class="bg-white w-sp-4 h-[1.5px] absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                    <div class="bg-white w-sp-4 h-[1.5px] absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 origin-center rotate-90 transitio duration-300 delay-200"></div>
                  </div>
                <?php else : ?>
                  <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" fill="none" viewBox="0 0 10 18">
                      <path stroke="#fff" stroke-linejoin="round" stroke-width="1.5" d="m1 17 7.29289-7.29289c.39053-.39053.39053-1.02369 0-1.41422L1 .999999" />
                    </svg>
                  </div>
                <?php endif; ?>
              </div>
              <?php if (have_rows('secondary_menu', 'option')) : ?>
                <div class="overflow-hidden transition-all duration-500 px-sp-5 bg-primary max-h-0">
                  <div class="grid dropdown py-sp-4">
                    <?php while (have_rows('secondary_menu', 'option')) : the_row(); ?>
                      <?php
                      $secondaryLink = get_sub_field('secondary_menu_item');
                      $url = $secondaryLink['url'];
                      if ($url === '#') {
                        $url = '';
                      } else {
                        $url = "href='$url'";
                      }
                      $title = $secondaryLink['title'];
                      $target = $secondaryLink['target'];
                      ?>
                      <a <?= $url; ?> target="<?= $target; ?>" class="w-full leading-none text-white text-[1rem] no-underline py-sp-4 font-heading"><?= $title; ?></a>
                    <?php endwhile; ?>
                    <?php if (have_rows('tertiary_menu', 'option')) : ?>
                      <div class="grid gap-x-sp-4 tertiary mt-sp-4">
                        <?php
                        while (have_rows('tertiary_menu', 'option')) : the_row();
                          $topLink = get_sub_field('tertiary_menu_item');
                          $url = $topLink['url'];
                          if ($url === '#') {
                            $url = '';
                          } else {
                            $url = "href='$url'";
                          }
                          $title = $topLink['title'];
                          $target = $topLink['target'];
                        ?>
                          <a <?= $url; ?> target="<?= $target; ?>" class="w-full leading-snug text-[.875rem] no-underline py-sp-4 font-heading <?= empty($url) ? 'text-lavender-200 hover:text-lavender-200' : 'text-white'; ?> "><?= $title; ?></a>
                        <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
        <?php endwhile;
        endif; ?>
        <div class="mt-auto mb-sp-8">
          <div class="flex justify-center py-8 gap-x-sp-4 px-sp-5">
            <a href="https://app.charliehealth.com/" target="_blank" class="ch-button button-tertiary-lavender inverted !text-[1rem] !rounded-[6px]">Client Login</a>
            <a href="<?= get_field('cta', 'option')['url']; ?>" class="ch-button button-tertiary-lavender !text-[1rem] !rounded-[6px]"><?= get_field('cta', 'option')['title']; ?></a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main id="primary" class="site-main <?= $showBanner ? 'lg:mt-[98px] mt-[124px]' : 'mt-[60px]'; ?>">