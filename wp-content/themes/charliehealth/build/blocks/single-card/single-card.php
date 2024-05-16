<?php
$icon = get_field('icon');
$background = '';
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
}
?>

<div class="<?= $background; ?> rounded-[6px] p-sp-5 flex flex-col h-full">
  <?php if ($icon) : ?>
    <img src="<?= $icon; ?>" alt="icon" class="mb-sp-6 lg:mb-base5-4 max-w-[40px] max-h-[40px]">
  <?php endif; ?>
  <InnerBlocks />
</div>