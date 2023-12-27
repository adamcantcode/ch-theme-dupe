<?php
$link           = get_field('link');
$image          = get_field('image');
$heading        = get_field('heading');
$subheading     = get_field('subheading');
$cardHeading    = get_field('card_heading');
$cardSubheading = get_field('card_subheading');
?>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-sp-5">
  <div>
    <h2 class="lg:!text-[20px] lg:!leading-[1.4]"><span class="lg:text-[56px] text-[48px] lg:leading-[1.4] block"><?= $heading; ?></span><?= $subheading; ?></h2>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
  <div>
    <div class="bg-primary-200 rounded-[16px] grid lg:grid-cols-[1fr_2fr] grid-cols-1 lg:py-sp-12 py-sp-8 px-sp-8 gap-sp-8 items-end relative group">
      <div>
        <img src="<?= $image['url']; ?>" alt="" <?= $image['alt']; ?>" class="rounded-[3px] shadow-[5px_5px_0_white] max-w-[150px] lg:max-w-full">
      </div>
      <div>
        <h3 class="text-white font-heading text-[28px] leading-[1.1] mb-[14px]"><a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="text-white font-heading text-[28px] leading-[1.1] mb-[14px] stretched-link"><?= $cardHeading; ?><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block transition-all duration-300 middle ml-sp-2 group-hover:translate-x-sp-2">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="white" />
            </svg>
          </a></h3>
        <p class="mb-0 text-white text-[14px] leading-[1.4]"><?= $cardSubheading; ?></p>
      </div>
    </div>
  </div>
</div>