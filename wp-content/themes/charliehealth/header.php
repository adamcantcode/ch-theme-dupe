<!doctype html>
<html <?php language_attributes(); ?> class="bg-med-blue">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollToPlugin.min.js"></script>
</head>

<body <?php body_class('bg-white'); ?>>
  <?php wp_body_open(); ?>
  <pre class="fixed left-0 right-0 w-full text-xs text-center text-white top-4 -z-10 opacity-30">Made with ❤️ in Denver</pre>

  <header class="lg:fixed sticky z-50 w-screen bg-med-blue <?= is_user_logged_in() ? 'lg:top-[32px] top-0' : 'top-0'; ?>">
    <nav class="container relative flex items-center justify-between min-h-[68px] lg:min-h-0">
      <div class="nav-logo">
        <a href="#">
          <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/62f68f4ebab2af5c28626d79_wordmark_horizontal_white.svg" alt="ss" class=" w-[160px]">
        </a>
      </div>
      <div class="slide-out overflow-y-scroll lg:overflow-y-visible fixed bottom-0 lg:top-0 bg-darkest-blue lg:bg-transparent lg:flex lg:relative lg:h-auto h-[calc(100vh-68px)] <?= is_user_logged_in() ? 'top-[116px]' : 'top-[68px]'; ?>">
        <div class="relative block border-b-2 cursor-default lg:hidden nav-parent-menu border-light-blue last:border-0 lg:border-0 border-opacity-20">
          <span class="static flex items-center nav-link">
            Home
          </span>
        </div>
        <?php
        if (have_rows('navigation_item', 'option')) :
          while (have_rows('navigation_item', 'option')) : the_row();
            $topLink = get_sub_field('top_link');
            $submenuDetails = get_sub_field('submenu_details');

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
                <div class="transition-all duration-300 nav-sub-menu lg:absolute top-full bg-darkest-blue lg:flex">
                  <div class="flex flex-col menu-container">
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
                    <div class="hidden p-8 lg:flex-col w-80 sub-menu-info-panel lg:flex">
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
        <div class="block mobile-ctas lg:hidden">
          <div class="flex justify-center gap-4 px-5 py-8 social">
            <a href=""><img src="https://placehold.it/25x25" alt="social"></a>
            <a href=""><img src="https://placehold.it/25x25" alt="social"></a>
            <a href=""><img src="https://placehold.it/25x25" alt="social"></a>
            <a href=""><img src="https://placehold.it/25x25" alt="social"></a>
          </div>
          <div class="flex justify-center pb-8">
            <a href="#" class="ch-button button-tertiary">Get started</a>
          </div>
        </div>
      </div>
      <div class="hidden nav-cta lg:block">
        <a href="#" class="ch-button button-tertiary">Get started</a>
      </div>
      <div class="ml-auto text-gray-500 cursor-pointer open-close lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </div>
    </nav>
  </header>
  <!-- <div id="page" class="site"> -->