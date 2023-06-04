<!doctype html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/x-icon" href="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/logos/charlie-health-favicon.ico'; ?>">
  <link rel="icon" type="image/png" href="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/logos/charlie-health-favicon.png'; ?>">
  <!-- Apple Touch Icon (at least 200x200px) -->
  <link rel="apple-touch-icon" href="/custom-icon.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#212984">
  <!-- NOTE HEADER CODE -->
  <?php include('wp-content/themes/charliehealth/includes/header-code.php'); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white'); ?>>
  <!-- NOTE Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P8BB2ZV&gtm_auth=LA8d6R6jW3Ly6N7_0RFZIQ&gtm_preview=env-402&gtm_cookies_win=x" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- NOTE End Google Tag Manager (noscript) -->
  <?php wp_body_open(); ?>
  <pre class="fixed left-0 right-0 w-full text-xs text-center text-white top-4 -z-10 opacity-30">Made with ❤️ in Denver</pre>
  <!-- NOTE Rocket Excludes Delay JS -->
  <?php include('includes/rocket-skip-js.php'); ?>
  <header class="fixed z-50 w-screen bg-med-blue <?= is_user_logged_in() ? 'lg:top-[32px] top-[46px]' : 'top-0'; ?>">
    <nav class="section-horizontal">
      <div class="container relative flex items-center justify-between min-h-[68px]">
        <div class="nav-logo">
          <a href="<?= site_url(); ?>">
            <?php include('resources/images/logos/ch-logo.php'); ?>
          </a>
        </div>
        <div class="slide-out flex-none overflow-y-scroll lg:overflow-y-visible fixed bottom-0 lg:top-0 bg-darkest-blue lg:bg-transparent lg:flex lg:relative lg:h-auto h-[calc(100vh-68px)] <?= is_user_logged_in() ? 'top-[116px]' : 'top-[68px]'; ?>">
          <div class="relative block border-b-2 cursor-default lg:noshow nav-parent-menu border-light-blue last:border-0 lg:border-0 border-opacity-20">
            <a href="<?= site_url('/'); ?>" class="static flex items-center nav-link">Home</a>
          </div>
          <?php
          if (have_rows('navigation_item', 'option')) :
            while (have_rows('navigation_item', 'option')) : the_row();
              $topLink = get_sub_field('top_link');
              $submenuDetails = get_sub_field('submenu_details');
              $cols = get_sub_field('columns');

              // TODO Update and remove the placeholder
              $submenuImage = get_sub_field('submenu_image') ?: 'https://assets-global.website-files.com/62daf9ae3616b86eec143652/62fc0dbd27ef532c3740e981_young-boy-blue-shirt-on-beach.webp';
          ?>
              <div class="relative border-b-2 cursor-default nav-parent-menu border-light-blue last:border-0 lg:border-0 border-opacity-20">
                <span class="flex items-center nav-link">
                  <?= $topLink; ?>
                  <span class="ml-auto lg:ml-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-2 fill-current" viewBox="0 0 24 24">
                      <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path>
                    </svg>
                  </span>
                </span>
                <?php
                if (have_rows('submenu_items', 'option')) : ?>
                  <div class="transition-all duration-300 nav-sub-menu lg:absolute top-full bg-darkest-blue lg:flex lg:top-[68px]<?= $cols ? ' columns-center' : '' ?>">
                    <div class="flex flex-col menu-container <?= $cols ? ' lg:columns-2' : '' ?>">
                      <?php
                      while (have_rows('submenu_items', 'option')) : the_row();
                        $sublink = get_sub_field('sublink');
                        $sublinkLink = $sublink['url'];
                        $sublinkTitle = $sublink['title'];
                      ?>
                        <a href="<?= $sublinkLink; ?>" class="nav-link sub-link"><?= $sublinkTitle; ?></a>
                      <?php
                      endwhile;
                      ?>
                    </div>
                    <?php if ($submenuDetails) : ?>
                      <div class="p-8 noshow lg:flex-col w-80 sub-menu-info-panel lg:flex">
                        <?php if ($submenuImage) : ?>
                          <img src="<?= $submenuImage; ?>" alt="" class="mb-2 rounded-sm">
                        <?php endif; ?>
                        <h6 class="text-white"><?= $submenuDetails; ?> <a href="tel:+18662195070" class="text-white text-h6 hover:text-white">Give us a call</a></h6>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php
                else :
                endif;
                ?>
              </div>
          <?php
            endwhile;
          else :
          endif;
          ?>
          <div class="block mobile-ctas lg:noshow">
            <div class="flex justify-center gap-4 px-5 py-8 social">
              <a href="https://www.facebook.com/charliehealth" target="_blank">
                <img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'; ?>" alt="Facebook logo" class="w-[25px] h-[25px] filter-white" />
              </a>
              <a href="https://www.linkedin.com/company/charlie-health/" target="_blank">
                <img src="<?= '/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'; ?>" alt="LinkedIn logo" class="w-[25px] h-[25px] filter-white" />
              </a>
              <a href="https://www.instagram.com/charliehealth/" target="_blank">
                <img src="<?= '/wp-content/themes/charliehealth/resources/images/social-logos/instagram.svg'; ?>" alt="Instagram logo" class="w-[25px] h-[25px] filter-white" />
              </a>
              <a href="https://www.tiktok.com/@charliehealth" target="_blank">
                <img src="<?= '/wp-content/themes/charliehealth/resources/images/social-logos/tik-tok.svg'; ?>" alt="TikTok logo" class="w-[25px] h-[25px] filter-white" />
              </a>
            </div>
            <div class="flex justify-center pb-8">
              <a href="<?= get_field('cta', 'option')['url']; ?>" class="ch-button button-tertiary"><?= get_field('cta', 'option')['title']; ?></a>
            </div>
          </div>
        </div>
        <div class="flex-none noshow nav-cta lg:block">
          <a href="<?= get_field('cta', 'option')['url']; ?>" class="ch-button button-tertiary"><?= get_field('cta', 'option')['title']; ?></a>
        </div>
        <div class="ml-auto text-gray-500 cursor-pointer open-close lg:noshow">
          <button class="ch-button button-nav">Menu</button>
        </div>
      </div>
    </nav>
  </header>
  <!-- <div id="page" class="site"> -->