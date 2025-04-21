<!doctype html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/x-icon" href="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/charlie-health_logo.ico'); ?>">
  <link rel="icon" type="image/png" href="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/charlie-health_logo.png'); ?>">
  <link rel="apple-touch-icon" href="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/charlie-health_logo.png'); ?>">
  <link rel="apple-touch-icon" href="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/apple-touch-icon-120x120-precomposed.png'); ?>">
  <link rel="apple-touch-icon" href="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/apple-touch-icon-120x120.png'); ?>">
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
<?php $blog = 'blog-' . get_current_blog_id(); ?>

<body <?php body_class('bg-white ' . $blog); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P8BB2ZV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php wp_body_open(); ?>
  <!-- <pre class="fixed left-0 right-0 w-full text-xs text-center text-white top-4 -z-10-50 opacity-30">Better care, from anywhere ❤️ Carter Barnhart</pre> -->
  <?php
  // Banner
  $enableBanner = get_field('enable_banner', get_the_ID());
  $enableSitewideBanner = get_field('enable_site_wide', 'option');

  if ($enableBanner) {
    $link = get_field('banner_link', get_the_ID());
    $enableSitewideBanner = false;
  } elseif ($enableSitewideBanner) {
    $enableBanner = true;
    $link = get_field('link', 'option');
  }

  // Nav button
  if (is_main_site()) {
    if (!empty(get_field('get_started', get_the_ID()))) {
      $getStarted = get_field('get_started', get_the_ID());
    } else {
      $getStarted = ['url' => '/form', 'target' => '_self', 'title' => 'Get started'];
    }
    if (get_field('client_login', get_the_ID())) {
      $clientLogin = get_field('client_login', get_the_ID());
    } else {
      $clientLogin = ['url' => 'https://app.charliehealth.com/', 'target' => '_blank', 'title' => 'Client login'];
    }
  } else {
    if (!empty(get_field('get_started', get_the_ID()))) {
      $getStarted = get_field('get_started', get_the_ID());
    } else {
      $getStarted = ['url' => '/referral-form', 'target' => '_self', 'title' => 'Refer a client'];
    }
    if (!empty(get_field('client_login', get_the_ID()))) {
      $clientLogin = get_field('client_login', get_the_ID());
    } else {
      $clientLogin = ['url' => 'mailto:referrals@charliehealth.com', 'target' => '_self', 'title' => 'Email Us'];
    }
  }
  ?>
  <!-- NOT BLOG -->
  <div id="emptyDiv"></div>
  <?php if ($enableBanner) : ?>
    <div class="banner-js z-[9999] w-full fixed bg-primary transition-all <?= is_user_logged_in() && !is_current_user_subscriber() ? ' lg:top-[32px] top-[46px]' : ' top-0'; ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 14 14" class="absolute transition-all -translate-y-1/2 opacity-0 cursor-pointer top-1/2 lg:left-base5-5 left-base5-1 banner-close-btn">
        <g fill="#000000" opacity="1">
          <rect width="1.63633" height="17.4542" x=".34375" y="1.15698" rx=".818166" transform="rotate(-45 .34375 1.15698)" />
          <rect width="1.63633" height="17.4542" x="12.3418" y=".0661621" rx=".818166" transform="rotate(45 12.3418 .0661621)" />
        </g>
      </svg>
      <div class="container transition-all opacity-0">
        <div class="flex items-center justify-center w-full py-base5-1 lg:px-0 px-base5-4">
          <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="inline-block no-underline">
            <p class="mb-0 leading-normal px-sp-2 font-heading"><?= $link['title']; ?></p>
          </a>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 12 10" fill="none" class="flex-none">
            <path d="M11.4419 5.44194C11.686 5.19787 11.686 4.80214 11.4419 4.55806L7.46447 0.580583C7.22039 0.336506 6.82466 0.336506 6.58058 0.580583C6.33651 0.824661 6.33651 1.22039 6.58058 1.46447L10.1161 5L6.58058 8.53553C6.3365 8.77961 6.3365 9.17534 6.58058 9.41942C6.82466 9.6635 7.22039 9.6635 7.46447 9.41942L11.4419 5.44194ZM-5.46392e-08 5.625L11 5.625L11 4.375L5.46392e-08 4.375L-5.46392e-08 5.625Z" fill="#161A3D" />
          </svg>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <header class="fixed z-[100] w-screen bg-darker-blue<?= is_user_logged_in() && !is_current_user_subscriber() ? ' lg:top-[32px] top-[46px]' : ' top-0'; ?>">
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
              <?php if (!empty($url)) : ?>
                <?php if (get_row_index() != count(get_field('navigation_item_new', 'option'))) : ?>
                  <a <?= $url; ?> target="<?= $target; ?>" class="block text-white no-underline px-sp-3 py-sp-6 font-heading hover:text-lavender-200 text-nav-normal ml-sp-4"><?= $title; ?></a>
                <?php endif; ?>
                <?php if (get_row_index() == count(get_field('navigation_item_new', 'option'))) : ?>
                  <a <?= $url; ?> target="<?= $target; ?>" class="flex items-center text-white no-underline px-sp-3 py-sp-6 font-heading hover:text-lavender-200 text-nav-normal ml-sp-4">
                    <?= $title; ?>
                    <svg width="464" height="464" viewBox="0 0 464 464" fill="none" xmlns="http://www.w3.org/2000/svg" style="height:15px;width:15px;margin-left:10px">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M19.25 463.25L444.75 463.25C454.983 463.25 463.25 454.983 463.25 444.75L463.25 236.625C463.25 234.081 461.169 232 458.625 232L426.25 232C423.706 232 421.625 234.081 421.625 236.625L421.625 421.625L42.375 421.625L42.375 42.375L227.375 42.375C229.919 42.375 232 40.2938 232 37.75L232 5.37502C232 2.83126 229.919 0.75002 227.375 0.75002L19.25 0.750002C9.01723 0.750001 0.75004 9.01718 0.750039 19.25L0.750002 444.75C0.750001 454.983 9.01719 463.25 19.25 463.25Z" fill="white"></path>
                      <path d="M351.481 20.9447L381.659 51.1229L307.63 125.21L233.601 199.296C231.809 201.088 231.809 204.037 233.601 205.829L258.114 230.342C259.906 232.134 262.855 232.134 264.647 230.342L338.705 156.284L412.762 82.226L443.056 112.52C445.773 115.237 450.456 113.618 450.919 109.803L463.059 6.08691C463.406 3.08066 460.862 0.594712 457.914 0.941587L354.198 13.0822C353.338 13.188 352.525 13.5331 351.851 14.0783C351.177 14.6234 350.67 15.3466 350.387 16.1658C350.104 16.985 350.056 17.8671 350.25 18.7119C350.443 19.5568 350.87 20.3304 351.481 20.9447Z" fill="white"></path>
                    </svg>
                  </a>
                <?php endif; ?>
              <?php else : ?>
                <a href="javascript:void(0)" role="button" class="block text-white no-underline cursor-default px-sp-3 py-sp-6 font-heading hover:text-lavender-200 text-nav-normal ml-sp-4"><?= $title; ?></a>
              <?php endif; ?>
              <?php if (have_rows('secondary_menu', 'option')) : ?>
                <div class="absolute w-[650px] grid grid-cols-2 opacity-0 invisible secondLevelNav transition-all duration-150 translate-x-1 origin-right pb-[5px]">
                  <div class="flex flex-col px-sp-8 py-sp-5 bg-secondary-soft max-h-[70vh] overflow-y-auto">
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
                      <?php if (have_rows('nested_items', 'option')) : ?>
                        <?php while (have_rows('nested_items', 'option')) : the_row(); ?>
                          <a href="<?= get_sub_field('nested_item')['url']; ?>" target="<?= get_sub_field('nested_item')['target']; ?>" class="no-underline font-heading text-nav-small py-[6px] ml-base5-3 text-white hover:text-lavender-200"><?= get_sub_field('nested_item')['title']; ?></a>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </div>
                  <?php if (have_rows('tertiary_menu', 'option')) : ?>
                    <div class="flex flex-col px-sp-8 pt-[26px] pb-[37px] bg-[#131632] max-h-[70vh] overflow-y-auto">
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
        <div class="relative topLevelNavItem noshow">
          <a href="https://referrals.charliehealth.com/referral-form" target="_blank" class="flex items-center text-white no-underline px-sp-3 py-sp-6 font-heading hover:text-lavender-200 text-nav-normal ml-sp-4">
            Refer a Client
            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 36 36" style="height:20px;width:20px;margin-left:10px">
              <g>
                <path d="M21 12H7a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1ZM8 10h12V7.94H8Z" class="clr-i-outline clr-i-outline-path-1" />
                <path d="M21 14.08H7a1 1 0 0 0-1 1V19a1 1 0 0 0 1 1h11.36L22 16.3v-1.22a1 1 0 0 0-1-1ZM20 18H8v-2h12Z" class="clr-i-outline clr-i-outline-path-2" />
                <path d="M11.06 31.51v-.06l.32-1.39H4V4h20v10.25l2-1.89V3a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v28a1 1 0 0 0 1 1h8a3.44 3.44 0 0 1 .06-.49Z" class="clr-i-outline clr-i-outline-path-3" />
                <path d="m22 19.17-.78.79a1 1 0 0 0 .78-.79Z" class="clr-i-outline clr-i-outline-path-4" />
                <path d="M6 26.94a1 1 0 0 0 1 1h4.84l.3-1.3.13-.55v-.05H8V24h6.34l2-2H7a1 1 0 0 0-1 1Z" class="clr-i-outline clr-i-outline-path-5" />
                <path d="m33.49 16.67-3.37-3.37a1.61 1.61 0 0 0-2.28 0L14.13 27.09 13 31.9a1.61 1.61 0 0 0 1.26 1.9 1.55 1.55 0 0 0 .31 0 1.15 1.15 0 0 0 .37 0l4.85-1.07L33.49 19a1.6 1.6 0 0 0 0-2.27ZM18.77 30.91l-3.66.81.89-3.63L26.28 17.7l2.82 2.82Zm11.46-11.52-2.82-2.82L29 15l2.84 2.84Z" class="clr-i-outline clr-i-outline-path-6" />
                <rect width="36" height="36" fill="none" />
              </g>
            </svg>
          </a>
        </div>
        <div class="flex ml-auto content gap-x-sp-2">
          <a href="<?= $getStarted['url'] ?>" target="<?= $getStarted['target']; ?>" class="ch-button button-tertiary-lavender !rounded-[6px]"><?= $getStarted['title'] ?></a>
          <a href="<?= $clientLogin['url']; ?>" target="<?= $clientLogin['target']; ?>" class="ch-button button-tertiary-lavender inverted !rounded-[6px]"><?= $clientLogin['title']; ?></a>
        </div>
      </div>
      <div class="container flex justify-between lg:noshow py-sp-5">
        <div>
          <a href="<?= site_url(); ?>">
            <?php include('resources/images/logos/charlie-health_shield-title.php'); ?>
          </a>
        </div>
        <div class="noshow">
          <a href="<?= $getStarted['url']; ?>" target="<?= $getStarted['target']; ?>" class="ch-button button-tertiary-lavender !text-[1rem] !rounded-[6px] !py-[12px] !px-[20px]"><?= $getStarted['title']; ?></a>
        </div>
        <div class="flex flex-col items-end justify-between w-sp-8 mobile-menu-js">
          <div class="w-full h-[1.5px] bg-white relative transition-all duration-100 delay-75 top-0 origin-center mt-[-1px]"></div>
          <div class="w-full h-[1.5px] bg-white relative transition-all duration-200 origin-center"></div>
          <div class="w-full h-[1.5px] bg-white relative transition-all duration-100 delay-75 top-0 origin-center"></div>
        </div>
      </div>
      <div class="fixed left-0 flex flex-col invisible w-full overflow-y-scroll transition-all duration-300 opacity-0 pointer-events-none bg-secondary-soft panel-js pt-sp-3">
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
                <?php if (empty($url)) : ?>
                  <a href="javascript:void(0)" role="button" class="w-full leading-snug text-white no-underline py-sp-4 font-heading text-[1.25rem] dropdown-select-js"><?= $title; ?></a>
                  <div class="relative mr-2 transition-all duration-300 open-close-js">
                    <div class="bg-white w-sp-4 h-[1.5px] absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                    <div class="bg-white w-sp-4 h-[1.5px] absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 origin-center rotate-90 transitio duration-300 delay-200"></div>
                  </div>
                <?php else : ?>
                  <a <?= $url; ?> target="<?= $target; ?>" class="w-full leading-snug text-white no-underline py-sp-4 font-heading text-[1.25rem] dropdown-select-js"><?= $title; ?></a>
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
                      <a <?= $url; ?> target="<?= $target; ?>" class="mb-0 text-white no-underline py-sp-4 text-nav-normal"><?= $title; ?></a>
                      <?php if (have_rows('nested_items', 'option')) : ?>
                        <?php while (have_rows('nested_items', 'option')) : the_row(); ?>
                          <a href="<?= get_sub_field('nested_item')['url']; ?>" target="<?= get_sub_field('nested_item')['target']; ?>" class="text-white no-underline font-heading text-nav-small py-sp-4 ml-base5-3 hover:text-lavender-200"><?= get_sub_field('nested_item')['title']; ?></a>
                        <?php endwhile; ?>
                      <?php endif; ?>
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
                          <a <?= $url; ?> target="<?= $target; ?>" class="w-full text-nav-small no-underline py-sp-4 <?= empty($url) ? 'text-lavender-200 hover:text-lavender-200' : 'text-white'; ?> "><?= $title; ?></a>
                        <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
        <?php endwhile;
        endif; ?>
        <div class="noshow">
          <div class="relative flex items-center justify-between w-full px-sp-5 dropdown-item-js">
            <a href="https://referrals.charliehealth.com/referral-form" target="_blank" class="w-full leading-snug text-white no-underline py-sp-4 font-heading text-[1.25rem] dropdown-select-js"> Refer a Client</a>
            <div class="relative">
              <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 36 36" style="height:20px;width:20px;margin-right:-5px">
                <g>
                  <path d="M21 12H7a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1ZM8 10h12V7.94H8Z" class="clr-i-outline clr-i-outline-path-1" />
                  <path d="M21 14.08H7a1 1 0 0 0-1 1V19a1 1 0 0 0 1 1h11.36L22 16.3v-1.22a1 1 0 0 0-1-1ZM20 18H8v-2h12Z" class="clr-i-outline clr-i-outline-path-2" />
                  <path d="M11.06 31.51v-.06l.32-1.39H4V4h20v10.25l2-1.89V3a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v28a1 1 0 0 0 1 1h8a3.44 3.44 0 0 1 .06-.49Z" class="clr-i-outline clr-i-outline-path-3" />
                  <path d="m22 19.17-.78.79a1 1 0 0 0 .78-.79Z" class="clr-i-outline clr-i-outline-path-4" />
                  <path d="M6 26.94a1 1 0 0 0 1 1h4.84l.3-1.3.13-.55v-.05H8V24h6.34l2-2H7a1 1 0 0 0-1 1Z" class="clr-i-outline clr-i-outline-path-5" />
                  <path d="m33.49 16.67-3.37-3.37a1.61 1.61 0 0 0-2.28 0L14.13 27.09 13 31.9a1.61 1.61 0 0 0 1.26 1.9 1.55 1.55 0 0 0 .31 0 1.15 1.15 0 0 0 .37 0l4.85-1.07L33.49 19a1.6 1.6 0 0 0 0-2.27ZM18.77 30.91l-3.66.81.89-3.63L26.28 17.7l2.82 2.82Zm11.46-11.52-2.82-2.82L29 15l2.84 2.84Z" class="clr-i-outline clr-i-outline-path-6" />
                  <rect width="36" height="36" fill="none" />
                </g>
              </svg>
            </div>
          </div>
        </div>
        <div>
          <div class="flex justify-center py-8 gap-x-sp-4 px-sp-5">
            <?php if (is_main_site()) : ?>
              <a href="<?= $clientLogin['url']; ?>" target="<?= $clientLogin['target']; ?>" class="ch-button button-tertiary-lavender inverted !text-[1rem] !rounded-[6px]"><?= $clientLogin['title']; ?></a>
            <?php endif; ?>
            <a href="<?= $getStarted['url']; ?>" target="<?= $getStarted['target']; ?>" class="ch-button button-tertiary-lavender !text-[1rem] !rounded-[6px]"><?= $getStarted['title']; ?></a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main id="primary" class="site-main mt-[60px] lg:mt-[70px]">
    <script>
      // Utility functions to manage cookies
      function setCookie(name, value, hours) {
        const date = new Date();
        date.setTime(date.getTime() + hours * 60 * 60 * 1000); // Convert hours to milliseconds
        const expires = `expires=${date.toUTCString()}`;
        document.cookie = `${name}=${value}; ${expires}; path=/`;
      }

      function getCookie(name) {
        const cookieArr = document.cookie.split(';');
        for (let i = 0; i < cookieArr.length; i++) {
          const cookie = cookieArr[i].trim();
          if (cookie.indexOf(name + '=') === 0) {
            return cookie.substring(name.length + 1);
          }
        }
        return null;
      }

      // Function to check if banner should be shown
      function checkBannerVisibility() {
        const banner = document.querySelector('.banner-js');
        const bannerSVG = document.querySelector('.banner-close-btn');
        const bannerText = document.querySelector('.banner-js .container');
        const bannerCookie = getCookie('hideBanner');

        if (bannerCookie) {
          // Hide the banner if the cookie exists
          if (banner) banner.style.display = 'none';
        } else {
          // Show the banner and set up the close button functionality
          if (banner) {
            banner.style.display = 'block';
            setTimeout(() => {
              banner.classList.remove('bg-primary');
              banner.classList.add('bg-yellow-300');
              bannerSVG.classList.remove('opacity-0');
              bannerText.classList.remove('opacity-0');
            }, 1000);
          };
          setupCloseBannerButton();
        }
      }

      // Function to set the top margin of the header
      function setHeaderMargin() {
        const banner = document.querySelector('.banner-js');
        const header = document.querySelector('header');

        if (banner && header) {
          const bannerHeight = banner.offsetHeight;
          header.style.marginTop = `${bannerHeight}px`;
        } else if (header) {
          header.style.marginTop = '0px';
        }
      }

      // Function to set the top margin of the main element based on the combined height of header and banner-js
      function setMainMargin() {
        const banner = document.querySelector('.banner-js');
        const header = document.querySelector('header');
        const tagList = document.querySelector('.tags-list-js');
        const main = document.querySelector('main');

        if (banner && header && main) {
          const totalHeight = banner.offsetHeight + header.offsetHeight;
          main.style.marginTop = `${totalHeight}px`;
        } else if (header && main && tagList) {
          const totalHeight = header.offsetHeight + tagList.offsetHeight;
          main.style.marginTop = `${totalHeight}px`;
        } else if (header && main) {
          const totalHeight = header.offsetHeight;
          main.style.marginTop = `${totalHeight}px`;
        }
      }

      // Function to set the height of the .panel-js element
      function setPanelHeight() {
        const banner = document.querySelector('.banner-js');
        const header = document.querySelector('header');
        const panel = document.querySelector('.panel-js');

        if (banner && header && panel) {
          const totalHeight = banner.offsetHeight + header.offsetHeight;
          const viewportHeight = window.innerHeight;
          const panelHeight = viewportHeight - totalHeight;
          panel.style.height = `${panelHeight}px`;
        } else if (header && panel) {
          const totalHeight = header.offsetHeight;
          const viewportHeight = window.innerHeight;
          const panelHeight = viewportHeight - totalHeight;
          panel.style.height = `${panelHeight}px`;
        }
      }

      // Function to hide the banner, set a 24-hour cookie, and recalculate margins/heights
      function closeBanner() {
        const banner = document.querySelector('.banner-js');
        if (banner) {
          banner.style.display = 'none'; // Hide the banner
          setCookie('hideBanner', 'true', 24); // Set a cookie for 24 hours
          setHeaderMargin(); // Recalculate margins for the header
          setMainMargin(); // Recalculate margins for the main element
          setPanelHeight(); // Recalculate the panel height
        }
      }

      // Attach the closeBanner functionality to the close button
      function setupCloseBannerButton() {
        const closeButton = document.querySelector('.banner-close-btn'); // Adjust selector as needed
        if (closeButton) {
          closeButton.addEventListener('click', closeBanner);
        }
      }

      function wrapCallout() {
        const topLevel = document.querySelector('.topLevelNavItem');
        if (!topLevel) return;

        const secondLevel = topLevel.querySelector('.secondLevelNav');
        if (!secondLevel) return;

        const allLinks = Array.from(secondLevel.querySelectorAll('a'));
        const nonIndentedLinks = allLinks.filter(a => !a.classList.contains('ml-base5-3'));

        if (nonIndentedLinks.length < 2) return;

        const first = nonIndentedLinks[0];
        const second = nonIndentedLinks[1];

        const wrapper = document.createElement('div');
        wrapper.className = 'bg-primary-100 flex flex-col max-h-[70vh] overflow-y-auto px-base5-4 py-base5-2 rounded-md mb-base5-2';

        // Insert wrapper before the first element
        first.parentNode.insertBefore(wrapper, first);

        // Move all nodes from first to second (inclusive) into wrapper
        let node = first;
        while (node) {
          const next = node.nextSibling;
          wrapper.appendChild(node);
          if (node === second) break;
          node = next;
        }
      }

      // Initial setup
      checkBannerVisibility();
      setHeaderMargin();
      setMainMargin();
      setPanelHeight();
      wrapCallout();

      // Recalculate on load and resize
      window.addEventListener('load', () => {
        setHeaderMargin();
        setMainMargin();
        setPanelHeight();
      });
      window.addEventListener('resize', () => {
        setHeaderMargin();
        setMainMargin();
        setPanelHeight();
      });
    </script>