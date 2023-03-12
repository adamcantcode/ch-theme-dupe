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

  <header class="md:fixed sticky z-50 w-screen bg-med-blue <?= is_user_logged_in() ? 'md:top-[32px] top-0' : 'top-0'; ?>">
    <nav class="container relative flex items-center justify-between min-h-[68px] md:min-h-0">
      <div class="nav-logo">
        <a href="#">
          <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/62f68f4ebab2af5c28626d79_wordmark_horizontal_white.svg" alt="ss" class=" w-[160px]">
        </a>
      </div>
      <div class="slide-out overflow-y-scroll md:overflow-y-visible fixed bottom-0 md:top-0 bg-darkest-blue md:bg-transparent md:flex md:relative md:h-auto h-[100vh]<?= is_user_logged_in() ? 'top-[116px]' : 'top-[68px]'; ?>">
        <?php
        if (have_rows('navigation_item', 'option')) :
          while (have_rows('navigation_item', 'option')) : the_row();
            $topLink = get_sub_field('top_link');
            $submenuDetails = get_sub_field('submenu_details');

            // TODO Update and remove the placeholder
            $submenuImage = get_sub_field('submenu_image') ?: 'https://assets-global.website-files.com/62daf9ae3616b86eec143652/62fc0dbd27ef532c3740e981_young-boy-blue-shirt-on-beach.webp';
        ?>
            <div class="relative nav-parent-menu">
              <span class="flex items-center nav-link">
                <?= $topLink; ?>
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-2 fill-current" viewBox="0 0 24 24">
                    <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path>
                  </svg>
                </span>
              </span>
              <?php
              if (have_rows('submenu_items', 'option')) : ?>
                <div class="transition-all duration-300 nav-sub-menu md:absolute top-full bg-darkest-blue md:flex">
                  <div class="flex flex-col">
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
                    <div class="hidden p-8 md:flex-col w-80 sub-menu-info-panel md:flex">
                      <?php if ($submenuImage) : ?>
                        <img src="<?= $submenuImage; ?>" alt="" class="mb-2 rounded">
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
      </div>
      <div class="hidden nav-cta md:block">
        <a href="#" class="ch-button tertiary">Get started</a>
      </div>
      <div class="ml-auto text-gray-500 cursor-pointer open-close md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
          <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
        </svg>
      </div>
    </nav>
  </header>
  <!-- <div id="page" class="site"> -->