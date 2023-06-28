<?php
// var_dump($block);

$style = get_field('hero_style');
$breadcrumbs = get_field('hero_breadcrumbs');
$title = get_field('hero_title') ?: get_the_title();
$subtitle = get_field('hero_subtitle');
$subtitleEditor = get_field('hero_subtitle_editor');
$heroImage = get_field('hero_image');
$icon = get_field('hero_icon');

if ($style === 'image') {
  $titleClass = 'text-display mb-sp-8 noshow lg:block';
  $gridClass = 'grid lg:grid-cols-2 gap-sp-4 items-center';
  $orderClass = 'order-2 lg:order-1';
  $orderClassTwo = 'order-1 lg:order-2';
} elseif ($style === 'details') {
  $gridClass = 'grid lg:grid-cols-2 gap-sp-4 items-start';
  $titleClass = '';
  $orderClass = 'order-1';
  $orderClassTwo = 'order-1 lg:order-2';
}
// var_dump($style);
?>

<?php if ($breadcrumbs) : ?>
  <?php include('includes/breadcrumbs.php'); ?>
<?php endif; ?>
<?php if ($style === 'image') : ?>
  <div class="grid items-center lg:grid-cols-2 gap-sp-4 lg:gap-sp-16">
    <div class="order-2 lg:order-1">
      <h1 class="noshow text-display mb-sp-8 lg:block"><?= $title; ?></h1>
      <div class="flex items-center gap-sp-3 mb-sp-8">
        <?php if ($icon) : ?>
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health Shield" class="w-10">
        <?php endif; ?>
        <h3 class="mb-0"><?= $subtitle; ?></h3>
      </div>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
    <h2 class="block text-h1-display lg:noshow"><?= $title; ?></h2>
    <div class="flex flex-col justify-between order-1 lg:order-2">
      <!-- TODO fix image offset bool issue -->
      <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 400); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover object-top rounded-lg max-h-52 md:max-h-none nolazy">
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'details') : ?>
  <div class="grid items-start lg:grid-cols-2 gap-sp-8">
    <div class="order-1">
      <h1 class="mb-0"><?= $title; ?></h1>
    </div>
    <div class="flex flex-col justify-between order-1 lg:order-2">
      <?= $subtitleEditor; ?>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'container') : ?>
  <h1><?= $title; ?></h1>
  <div class="rounded-md border-gradient">
    <div class="grid items-center lg:grid-cols-2">
      <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 600); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover lg:rounded-l-md lg:rounded-tr-none rounded-t-md min-h-full lg:h-[400px] h-[200px] w-full nolazy">
      <div class="p-sp-4 lg:p-sp-8 margin-adjust">
        <?= $subtitleEditor; ?>
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'cover') : ?>
  <div class="">
    <div class="relative lg:h-[500px] h-[200px]">
      <div class="absolute inset-0">
        <img src="<?= $heroImage['url'] ?: placeHolderImage(600, 600); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover w-full h-full rounded-lg nolazy">
      </div>
      <h1 class="absolute text-white -translate-y-1/2 top-1/2 left-sp-8"><?= $title; ?></h1>
    </div>
    <div class="grid items-start lg:gap-sp-16 gap-sp-4 lg:grid-cols-2 mt-sp-12">
      <div class="flex items-center gap-sp-3">
        <?php if ($icon) : ?>
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health Shield" class="w-10">
        <?php endif; ?>
        <h3 class="mb-0"><?= $subtitle; ?></h3>
      </div>
      <div class="">
        <?= $subtitleEditor; ?>
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if (have_rows('hero_jump_buttons_jump_buttons')) : ?>
  <div class="mt-sp-6 md:mt-sp-10 lg:mt-sp-14">
    <div>
      <h3>Jump to:</h3>
    </div>
    <div class="flex overflow-auto gap-sp-5 custom-scroll">
      <?php while (have_rows('hero_jump_buttons_jump_buttons')) : the_row();
        $label = get_sub_field('label');
        $sectionID  = get_sub_field('section_id');
      ?>
        <a href="#<?= $sectionID; ?>" class="ch-button button-secondary whitespace-nowrap"><?= $label; ?></a>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>