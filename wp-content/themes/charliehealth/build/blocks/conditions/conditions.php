<?php
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
  if ($background === 'bg-darker-blue') {
    $background .= ' [&_*]:text-white ';
  }
} else {
  $background = 'bg-darker-blue';
  $background .= ' [&_*]:text-white';
}
?>
<div class="rounded-md <?= $background; ?>">
  <div class="grid items-center lg:grid-cols-[1fr_1.25fr] lg:py-base5-10 lg:px-base5-8 px-base5-4 py-base5-4 gap-base5-4">
    <InnerBlocks />
    <div>
      <p class="text-h4-base mb-base5-5">Other related areas of care may include</p>
      <?php if (have_rows('links')) :  ?>
        <div class="flex gap-base5-3">
          <?php while (have_rows('links')) : the_row(); ?>
            <?php $link = get_sub_field('link'); ?>
            <div class="inline-block">
              <a href="<?= $link['url']; ?>" class="ch-button button-secondary inverted" target="<?= $link['target'] ?>"><?= $link['title']; ?></a>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>