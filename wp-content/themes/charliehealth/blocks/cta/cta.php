<?php
$heading = get_field('heading');
$subhead = get_field('subhead');
$link = get_field('link');
$style = get_field('style');

if (empty($link)) {
  $link = [
    'url' => site_url() . '/form',
    'title' => 'Get started',
    'target' => '_blank',
  ];
}

// For BG color
$blockClasses = '';
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
  $blockClasses .= $background . ' ';
} ?>

<?php if ($style === 'value') : ?>
  <div class="flex justify-center rounded-sm lg:p-sp-14 p-sp-10 mb-sp-6 <?= $blockClasses; ?>">
    <div class="flex flex-col items-center justify-center text-center max-w-[37.5rem]">
      <img src="<?= site_url(); ?>/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
      <h2 class="text-darkest-blue lg:text-[2.5rem] text-h2-lg lg:leading-tight mb-sp-5 font-heading-serif"><?= $heading; ?></h2>
      <p class="text-darkest-blue"><?= $subhead; ?></p>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'full') : ?>
  <div class="flex items-center justify-between rounded-md  p-sp-8 <?= $blockClasses; ?>">
    <h2 class="mb-0"><?= $heading; ?></h2>
    <div class="flex gap-x-4">
      <a href="<?= isset($linkUrl) ?: '#'; ?>" class="ch-button button-primary"><?= isset($linkText) ?: 'Get Started'; ?></a>
      <a href="tel:+" class="ch-button button-secondary">1 (555) 555-5555</a>
    </div>
  </div>
<?php endif; ?>