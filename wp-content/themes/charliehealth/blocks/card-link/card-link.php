<?php
$link = get_field('link');
$image = get_field('image');
$subhead = get_field('subhead');
?>
<div class="relative">
  <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="no-underline stretched-link group">
    <div class="rounded-[6px] lg:p-sp-6 px-sp-2 py-sp-6 grid grid-cols-[1fr_2fr] gap-sp-6 bg-primary-100 group-hover:bg-dark-blue relative items-center mt-sp-16 transition-all duration-300">
      <div></div>
      <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="rounded-[3px] shadow-[3px_3px_0px_0px_rgba(255,255,255,1)] absolute left-sp-4 bottom-sp-4 max-w-[85px]">
      <div>
        <h4 class="text-white !mb-sp-2"><?= $link['title']; ?> -></h4>
        <?php if ($subhead) : ?>
          <h5 class="!mb-0 text-white"><?= $subhead; ?></h5>
        <?php endif; ?>
      </div>
    </div>
  </a>
</div>