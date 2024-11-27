<?php
$link = get_field('link');
$image = get_field('image');
$subhead = get_field('subhead');
$bg = 'bg-primary';
$text = 'text-white';
if(get_current_blog_id() === 3) {
  $bg = 'bg-gradient-to-tr from-white to-referrals-yellow-200';
  $text = '';
}
?>
<div class="relative mx-auto w-fit">
  <?php if ($link) : ?>
    <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="inline-block no-underline stretched-link group mt-base5-4">
      <div class="rounded-sm p-base5-3 grid grid-cols-[1fr_2fr] gap-base5-3 relative items-center <?= $bg; ?> max-w-[525px]">
        <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="rounded-sm -my-base5-6">
        <div>
          <h3 class="<?= $text; ?>"><?= $link['title']; ?><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block middle ml-sp-2">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
              </svg></h3>
          <?php if ($subhead) : ?>
            <p class="<?= $text; ?>"><?= $subhead; ?></p>
          <?php endif; ?>
        </div>
      </div>
    </a>
  <?php endif; ?>
</div>