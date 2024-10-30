<?php
$block = get_field('block_row');
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
  if ($background === 'bg-darker-blue') {
    $background .= ' [&_*]:text-white ';
    $inverted = true;
  }
} else {
  $background = 'bg-darker-blue';
  $background .= ' [&_*]:text-white';
  $inverted = true;
}
$areasOfCare = $_SERVER['REQUEST_URI'];
// Check if '/areas-of-care/' is in the URL
if (strpos($areasOfCare, '/areas-of-care/') !== false) {
  $areasOfCare = true;
} else {
  $areasOfCare = false;
}

?>
<?php if (!$block) : ?>
  <div class="rounded-md <?= $background; ?>">
    <div class="grid items-center lg:grid-cols-[1fr_1.25fr] lg:py-base5-10 lg:px-base5-8 px-base5-4 py-base5-4 gap-base5-4">
      <InnerBlocks />
      <div>
        <?php if ($areasOfCare) : ?>
          <p class="text-h4-base mb-base5-5">Other related areas of care may include</p>
        <?php endif; ?>
        <?php if (have_rows('links')) :  ?>
          <div class="flex flex-wrap gap-base5-3">
            <?php while (have_rows('links')) : the_row(); ?>
              <?php $link = get_sub_field('link'); ?>
              <?php if ($link) : ?>
                <div class="lg:inline-block flex w-full lg:w-[unset]">
                  <a href="<?= $link['url']; ?>" class="ch-button button-secondary <?= $inverted ? 'inverted' : ''; ?>" target="<?= $link['target'] ?>"><?= $link['title']; ?></a>
                </div>
              <?php endif; ?>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php else : ?>
  <?php if (have_rows('links')) :  ?>
    <div class="flex flex-wrap justify-center gap-base5-3">
      <?php while (have_rows('links')) : the_row(); ?>
        <?php $link = get_sub_field('link'); ?>
        <div class="lg:inline-block flex w-full lg:w-[unset]">
          <a href="<?= $link['url']; ?>" class="ch-button button-secondary <?= $inverted ? 'inverted' : ''; ?>" target="<?= $link['target'] ?>"><?= $link['title']; ?></a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
<?php endif; ?>