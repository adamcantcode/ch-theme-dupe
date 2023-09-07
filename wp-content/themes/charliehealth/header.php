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
  <!-- <pre class="fixed left-0 right-0 w-full text-xs text-center text-dark-blue top-4 -z-10-50 opacity-30">Made with ❤️ in Denver</pre> -->
  <!-- Rocket Excludes Delay JS -->
  <?php include('includes/rocket-skip-js.php'); ?>
  <!-- END Rocket Excludes Delay JS -->
  <?php if (!get_field('new_navigation', 'options')) : ?>
    <header class="fixed z-50 w-screen bg-med-blue <?= is_user_logged_in() ? 'lg:top-[32px] top-[46px]' : 'top-0'; ?>">
      <nav class="section-horizontal">
        <div class="container relative flex items-center justify-between min-h-[68px]">
          <div class="nav-logo">
            <a href="<?= site_url(); ?>">
              <?php include('resources/images/logos/ch-logo.php'); ?>
            </a>
          </div>
          <div class="slide-out lg:mx-sp-2 flex-none overflow-y-scroll lg:overflow-y-visible fixed bottom-0 lg:top-0 bg-darkest-blue lg:bg-transparent lg:flex lg:relative lg:h-auto h-[calc(100vh-68px)] <?= is_user_logged_in() ? 'top-[116px]' : 'top-[68px]'; ?>">
            <div class="relative block border-b-2 cursor-default lg:noshow nav-parent-menu border-light-blue last:border-0 lg:border-0 border-opacity-20">
              <a href="<?= site_url('/'); ?>" class="static flex items-center nav-link">Home</a>
            </div>
            <?php
            if (have_rows('navigation_item', 'option')) :
              while (have_rows('navigation_item', 'option')) : the_row();
                $topLink = get_sub_field('top_link');
                $topLinkLink = get_sub_field('top_link_link');
                $submenuDetails = get_sub_field('submenu_details');
                $cols = get_sub_field('columns');

                // TODO Update and remove the placeholder
                $submenuImage = get_sub_field('submenu_image') ?: placeHolderImage(414, 264);
            ?>
                <div class="relative border-b-2 cursor-default nav-parent-menu border-light-blue last:border-0 lg:border-0 border-opacity-20">
                  <span class="relative flex items-center nav-link">
                    <?php if ($topLinkLink) : ?>
                      <a href="<?= $topLinkLink['url']; ?>" target="<?= $topLinkLink['target']; ?>" class="text-white lg:hover:!text-darkest-blue lg:stretched-link no-underline text-lg">
                      <?php endif; ?>
                      <?= $topLink; ?>
                      <?php if ($topLinkLink) : ?>
                      </a>
                    <?php endif; ?>
                    <?php if (have_rows('submenu_items', 'option')) : ?>
                      <span class="ml-auto lg:ml-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-2 fill-current" viewBox="0 0 24 24">
                          <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path>
                        </svg>
                      </span>
                    <?php endif; ?>
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
                          $currentPage = $post->post_name;
                        ?>
                          <a href="<?= $sublinkLink; ?>" class="nav-link sub-link<?= $currentPage === basename($sublinkLink) ? ' active-link' : '' ?>"><?= $sublinkTitle; ?></a>
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
              <div class="flex justify-center py-8 gap-x-sp-4">
                <a href="https://app.charliehealth.com/" target="_blank" class="ch-button button-tertiary inverted text-h3-lg">Client Login</a>
                <a href="<?= get_field('cta', 'option')['url']; ?>" class="ch-button button-tertiary text-h3-lg"><?= get_field('cta', 'option')['title']; ?></a>
              </div>
              <div class="flex justify-center gap-4 px-5 pb-8 social">
                <a href="https://www.facebook.com/charliehealth" target="_blank">
                  <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'); ?>" alt="Facebook logo" class="w-[25px] h-[25px] filter-white" />
                </a>
                <a href="https://www.linkedin.com/company/charlie-health/" target="_blank">
                  <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'); ?>" alt="LinkedIn logo" class="w-[25px] h-[25px] filter-white" />
                </a>
                <a href="https://www.instagram.com/charliehealth/" target="_blank">
                  <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/instagram.svg'); ?>" alt="Instagram logo" class="w-[25px] h-[25px] filter-white" />
                </a>
                <a href="https://www.tiktok.com/@charliehealth" target="_blank">
                  <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/tik-tok.svg'); ?>" alt="TikTok logo" class="w-[25px] h-[25px] filter-white" />
                </a>
              </div>
            </div>
          </div>
          <div class="flex-none noshow nav-cta lg:flex gap-x-sp-2">
            <a href="https://app.charliehealth.com/" target="_blank" class="ch-button button-tertiary inverted">Client Login</a>
            <a href="<?= get_field('cta', 'option')['url']; ?>" class="ch-button button-tertiary"><?= get_field('cta', 'option')['title']; ?></a>
          </div>
          <div class="ml-auto text-gray-500 cursor-pointer open-close lg:noshow">
            <button class="ch-button button-nav">Menu</button>
          </div>
        </div>
      </nav>
    </header>
  <?php else : ?>
    <header class="fixed z-[100] w-screen bg-darker-blue <?= is_user_logged_in() ? 'lg:top-[32px] top-[46px]' : 'top-0'; ?>">
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
                <a <?= $url; ?> target="<?= $target; ?>" class="block text-white no-underline px-sp-4 py-sp-4 font-heading hover:text-lavender-200 text-nav-normal"><?= $title; ?></a>
                <?php if (have_rows('secondary_menu', 'option')) : ?>
                  <div class="absolute w-[500px] grid grid-cols-2 opacity-0 invisible secondLevelNav transition-all duration-300 translate-x-1 origin-right">
                    <div class="flex flex-col p-sp-8 bg-darker-blue-hover">
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
                        <a <?= $url; ?> target="<?= $target; ?>" class="text-white no-underline font-heading text-nav-normal hover:text-lavender-200 mb-sp-6"><?= $title; ?></a>
                      <?php endwhile; ?>
                    </div>
                    <?php if (have_rows('tertiary_menu', 'option')) : ?>
                      <div class="flex flex-col p-sp-8 bg-[#131632]">
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
                          <a <?= $url; ?> target="<?= $target; ?>" class="no-underline font-heading text-nav-small mb-sp-3 <?= $url === '' ? 'text-lavender-200 mt-sp-3 first:mt-0' : 'text-white hover:text-lavender-200'; ?>"><?= $title; ?></a>
                        <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
          <?php endwhile;
          endif; ?>
          <div class="flex ml-auto content gap-x-sp-2">
            <a href="https://app.charliehealth.com/" target="_blank" class="ch-button button-tertiary-lavender inverted">Client Login</a>
            <a href="<?= get_field('cta', 'option')['url']; ?>" class="ch-button button-tertiary-lavender"><?= get_field('cta', 'option')['title']; ?></a>
          </div>
        </div>
        <div class="container flex justify-between lg:noshow py-sp-5">
          <div>
            <a href="<?= site_url(); ?>">
              <?php include('resources/images/logos/charlie-health_shield-title.php'); ?>
            </a>
          </div>
          <div class="flex flex-col justify-between w-sp-8 mobile-menu-js">
            <div class="w-full h-[1.5px] bg-white relative transition-all duration-300 delay-100 top-0 origin-center"></div>
            <div class="w-full h-[1.5px] bg-white relative transition-all duration-500 origin-center"></div>
            <div class="w-full h-[1.5px] bg-white relative transition-all duration-300 delay-100 top-0 origin-center"></div>
          </div>
        </div>
        <div class="bg-secondary-soft fixed panel-js h-[calc(100vh-60px)] w-full left-0 overflow-y-scroll opacity-0 invisible pointer-events-none transition-all duration-300 flex flex-col">
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
                  <a <?= $url; ?> target="<?= $target; ?>" class="w-full leading-snug text-white no-underline py-sp-8 font-heading text-[1.25rem] dropdown-select-js"><?= $title; ?></a>
                  <?php if (empty($url)) : ?>
                    <div class="relative mr-2 transition-all duration-300 open-close-js">
                      <div class="bg-white w-sp-4 h-[1.5px] absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                      <div class="bg-white w-sp-4 h-[1.5px] absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 origin-center rotate-90"></div>
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
                    <div class="grid dropdown py-sp-4 ">
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
                        <div class="grid grid-cols-2 gap-x-sp-4 tertiary mt-sp-12">
                          <div class="flex flex-col">
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
                              <a <?= $url; ?> target="<?= $target; ?>" class="w-full leading-none text-[.875rem] no-underline py-sp-4 font-heading <?= empty($url) ? 'text-lavender-200' : 'text-white'; ?> "><?= $title; ?></a>
                            <?php endwhile; ?>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
          <?php endwhile;
          endif; ?>
          <div class="mt-auto">
            <div class="flex justify-center py-8 gap-x-sp-4 px-sp-5">
              <a href="https://app.charliehealth.com/" target="_blank" class="ch-button button-tertiary-lavender inverted !text-[1rem]">Client Login</a>
              <a href="<?= get_field('cta', 'option')['url']; ?>" class="ch-button button-tertiary-lavender !text-[1rem]"><?= get_field('cta', 'option')['title']; ?></a>
            </div>
            <div class="flex justify-center gap-4 px-5 pb-8 social">
              <a href="https://www.facebook.com/charliehealth" target="_blank">
                <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'); ?>" alt="Facebook logo" class="w-[1rem] h-[1rem] filter-white" />
              </a>
              <a href="https://www.linkedin.com/company/charlie-health/" target="_blank">
                <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'); ?>" alt="LinkedIn logo" class="w-[1rem] h-[1rem] filter-white" />
              </a>
              <a href="https://www.instagram.com/charliehealth/" target="_blank">
                <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/instagram.svg'); ?>" alt="Instagram logo" class="w-[1rem] h-[1rem] filter-white" />
              </a>
              <a href="https://www.tiktok.com/@charliehealth" target="_blank">
                <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/tik-tok.svg'); ?>" alt="TikTok logo" class="w-[1rem] h-[1rem] filter-white" />
              </a>
              <a href="https://twitter.com/charliehealth" target="_blank">
                <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/x.svg'); ?>" alt="Twitter (X) logo" class="w-[1rem] h-[1rem] filter-white" />
              </a>
            </div>
          </div>
        </div>
      </nav>
    </header>
  <?php endif; ?>