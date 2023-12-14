<?php
$link = get_field('link');
$image = get_field('image');
$subhead = get_field('subhead');
?>
<div class="relative">
  <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="no-underline stretched-link group">
    <div class="rounded-[6px] p-sp-4 pt-sp-7 grid grid-cols-[1fr_2fr] gap-sp-4 bg-primary-100 group-hover:bg-dark-blue relative items-center mt-sp-16 transition-all duration-300 lg:max-w-[335px] max-w-full">
      <div></div>
      <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="rounded-[3px] shadow-[3px_3px_0px_0px_rgba(255,255,255,1)] absolute left-sp-4 bottom-sp-4 max-w-[85px]">
      <div>
        <p class="text-white !mb-sp-1"><?= $link['title']; ?></p>
        <?php if ($subhead) : ?>
          <p class="!mb-0 text-white !text-[13px]"><?= $subhead; ?><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block middle ml-sp-2">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="white" />
            </svg>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </a>
</div>