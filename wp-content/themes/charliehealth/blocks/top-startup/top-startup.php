<?php
$liImage = get_field('linkedin_image');
$headline = get_field('headline');
$linkedinLink = get_field('linkedin_link');
?>
<section class="section section-xs-bottom bg-primary-100">
  <div class="container">
    <div class="border border-white py-[10px] px-[15px] rounded-[50px] inline-block mb-sp-8">
      <p class="text-[14px] leading-[1.4] mb-0 text-white">Featured</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-sp-5 mb-sp-6">
      <div class="relative flex lg:flex-row flex-col justify-around bg-[#FDF9F5] lg:col-span-6 lg:col-start-4 py-sp-4 px-sp-6 rounded-[6px] group">
        <img src="<?= $liImage['url']; ?>" alt="<?= $liImage['alt']; ?>" class="lg:max-w-[240px]">
        <div class="flex items-center justify-center">
          <p class="max-w-[200px] mb-0 text-center lg:text-[20px] text-[18px] leading-[1.1]"><?= $headline; ?></p>
        </div>
        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute transition-all duration-300 right-sp-6 bottom-sp-4 group-hover:translate-x-sp-1">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
        </svg>
        <a href="<?= $linkedinLink['url']; ?>" target="<?= $linkedinLink['target'] ?>" class="stretched-link"></a>
      </div>
    </div>
  </div>
</section>
<div class="bg-primary-100 lg:pb-sp-16 pb-sp-8">
  <div id="marquee" class="flex lg:gap-[150px] gap-sp-4 w-full overflow-hidden">
    <div class="flex justify-around min-w-full scroll lg:gap-[150px] gap-sp-8 items-center">
      <?php if (have_rows('publications')) :  while (have_rows('publications')) : the_row();  ?>
          <?php
          $image = get_sub_field('image');
          $link = get_sub_field('link');
          ?>
          <div><img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="opacity-30"></div>
      <?php endwhile;
      endif; ?>
    </div>
    <div class="flex justify-around min-w-full scroll lg:gap-[150px] gap-sp-4 items-center">
      <?php if (have_rows('publications')) :  while (have_rows('publications')) : the_row();  ?>
          <?php
          $image = get_sub_field('image');
          $link = get_sub_field('link');
          ?>
          <div><img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="opacity-30"></div>
      <?php endwhile;
      endif; ?>
    </div>
  </div>
</div>

<style>
  @keyframes scroll {
    from {
      transform: translateX(0);
    }

    to {
      transform: translateX(calc(-100% - 1rem));
    }
  }

  .scroll {
    animation: scroll 60s linear infinite;
    animation-direction: normal;
  }

  #marquee:hover * {
    animation-play-state: paused;
  }
</style>