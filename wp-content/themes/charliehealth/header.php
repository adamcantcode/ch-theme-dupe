<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="fixed z-50 w-screen bg-med-blue">
    <nav class="container relative flex items-center justify-between min-h-[70px] md:min-h-0">
      <div class="nav-logo">
        <a href="#">
          <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/62f68f4ebab2af5c28626d79_wordmark_horizontal_white.svg" alt="" class=" w-[160px]">
        </a>
      </div>
      <div class="slide-out fixed bottom-0 md:top-0 bg-darkest-blue md:bg-transparent md:flex md:relative <?= is_user_logged_in() ? 'top-[116px]' : 'top-[70px]' ; ?>">
        <div class="relative nav-parent-menu">
          <a href="#" class="flex items-center nav-link">Service
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-3 fill-current" viewBox="0 0 24 24">
              <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path>
            </svg>
          </a>
          <div class="transition duration-300 nav-sub-menu md:absolute top-full bg-darkest-blue md:flex">
            <div class="flex flex-col">
              <a href="#" class="nav-link sub-link">Technology and Online Addiction</a>
              <a href="#" class="nav-link sub-link">Web Design</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
            </div>
            <div class="hidden p-8 md:flex-col w-80 sub-menu-info-panel md:flex">
              <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/62fc0dbd27ef532c3740e981_young-boy-blue-shirt-on-beach.webp" alt="" class="mb-2 rounded">
              <h6 class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. At deserunt quaerat libero modi corrupti! Debitis?</h6>
            </div>
          </div>
        </div>
        <div class="relative nav-parent-menu">
          <a href="#" class="flex items-center nav-link">Service
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-3 fill-current" viewBox="0 0 24 24">
              <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path>
            </svg>
          </a>
          <div class="transition duration-300 nav-sub-menu md:absolute top-full bg-darkest-blue md:flex">
            <div class="flex flex-col">
              <a href="#" class="nav-link sub-link">Web development</a>
              <a href="#" class="nav-link sub-link">Web Design</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
            </div>
            <div class="hidden p-8 md:flex-col w-80 sub-menu-info-panel md:flex">
              <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/62fc0dbdc5f96dee1834ea7a_son-with-mom-looking-at-phone.webp" alt="" class="mb-2 rounded">
              <h6 class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. At deserunt quaerat libero modi corrupti! Debitis?</h6>
            </div>
          </div>
        </div>
        <div class="relative nav-parent-menu">
          <a href="#" class="flex items-center nav-link">Service
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-3 fill-current" viewBox="0 0 24 24">
              <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path>
            </svg>
          </a>
          <div class="transition duration-300 nav-sub-menu md:absolute top-full bg-darkest-blue md:flex">
            <div class="flex flex-col">
              <a href="#" class="nav-link sub-link">Web development</a>
              <a href="#" class="nav-link sub-link">Web Design</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
            </div>
          </div>
        </div>
        <div class="relative nav-parent-menu">
          <a href="#" class="flex items-center nav-link">Service
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-3 fill-current" viewBox="0 0 24 24">
              <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path>
            </svg>
          </a>
          <div class="transition duration-300 nav-sub-menu md:absolute top-full bg-darkest-blue md:flex">
            <div class="flex flex-col">
              <a href="#" class="nav-link sub-link">Web development</a>
              <a href="#" class="nav-link sub-link">Web Design</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
            </div>
          </div>
        </div>
        <div class="relative nav-parent-menu">
          <a href="#" class="flex items-center nav-link">Service
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-3 fill-current" viewBox="0 0 24 24">
              <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"></path>
            </svg>
          </a>
          <div class="transition duration-300 nav-sub-menu md:absolute top-full bg-darkest-blue md:flex">
            <div class="flex flex-col">
              <a href="#" class="nav-link sub-link">Web development</a>
              <a href="#" class="nav-link sub-link">Web Design</a>
              <a href="#" class="nav-link sub-link">Machine Learning</a>
            </div>
          </div>
        </div>
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