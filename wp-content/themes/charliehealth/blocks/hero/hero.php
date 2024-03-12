<?php
$style          = get_field('hero_style');
$breadcrumbs    = get_field('hero_breadcrumbs');
$title          = get_field('hero_title') ?: get_the_title();
$subtitle       = get_field('hero_subtitle');
$subtitleEditor = get_field('hero_subtitle_editor');
$heroImage      = get_field('hero_image');
$icon           = get_field('hero_icon');

/** NOTE Not sure if we can remove */

// if ($style === 'image') {
//   $titleClass    = 'text-display mb-sp-8 noshow lg:block';
//   $gridClass     = 'grid lg:grid-cols-2 gap-sp-4 items-center';
//   $orderClass    = 'order-2 lg:order-1';
//   $orderClassTwo = 'order-1 lg:order-2';
// } elseif ($style === 'details') {
//   $gridClass     = 'grid lg:grid-cols-2 gap-sp-4 items-start';
//   $titleClass    = '';
//   $orderClass    = 'order-1';
//   $orderClassTwo = 'order-1 lg:order-2';
// }
?>

<?php if ($breadcrumbs) : ?>
  <?php include('includes/breadcrumbs.php'); ?>
<?php endif; ?>
<?php if ($style === 'image') : ?>
  <div class="grid items-center lg:grid-cols-2 lg:gap-sp-16 hero-cta">
    <div class="order-2 lg:order-1 fix-order">
      <h1><?= $title; ?></h1>
      <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 400); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="block object-cover object-top rounded-lg max-h-52 md:max-h-none nolazy lg:noshow mb-sp-4 hero-image-container">
      <div class="flex items-center gap-sp-4 mb-sp-12 mobile-hero-sub">
        <?php if ($icon) : ?>
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health Shield" class="w-10">
        <?php endif; ?>
        <p class="mb-0 text-h4-base font-heading-serif"><?= $subtitle; ?></p>
      </div>
      <div class="hero-image-buttons">
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
    </div>
    <div class="flex flex-col justify-between order-1 lg:order-2">
      <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 400); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover object-top rounded-lg max-h-52 md:max-h-none nolazy noshow lg:block">
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'new_image') : ?>
  <div class="grid items-center lg:grid-cols-2 gap-sp-5">
    <div class="order-2 lg:order-1 mobile-hero-sub">
      <h1><?= $title; ?></h1>
      <?php if ($subtitle) : ?>
        <div class="flex items-center gap-sp-4 mb-sp-10">
          <?php if ($icon) : ?>
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health Shield" class="w-10">
          <?php endif; ?>
          <p class="mb-0 text-h4-base font-heading-serif"><?= $subtitle; ?></p>
        </div>
      <?php endif; ?>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
    <div class="flex flex-col items-center order-1 lg:order-2">
      <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 400); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover object-top nolazy">
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'insurance') : ?>
  <div class="grid items-end lg:grid-cols-[7fr_1fr_4fr] gap-base5-4">
    <div>
      <h1><?= $title; ?></h1>
      <?php if ($subtitleEditor) : ?>
        <?= $subtitleEditor; ?>
      <?php endif; ?>
      <div class="grid items-center grid-cols-[1fr_0.75fr_1.5fr] justify-items-center lg:noshow w-1/2 mb-base5-8 mt-base5-8">
        <svg width="66" height="65" viewBox="0 0 66 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-1/2">
          <path d="M64.8859 7.82136C64.5073 3.71078 61.1342 0.455708 57.0401 0.237419C51.5734 -0.053098 13.7609 -0.053098 8.28945 0.237419C4.20008 0.455708 0.826974 3.71078 0.44675 7.82457C-1.31395 27.1303 2.13488 42.0285 10.7017 52.1019C19.9139 62.9393 31.685 63.9489 32.3713 63.9987L32.6285 64.0195L32.944 64.0051C33.3779 63.9746 42.3691 63.27 50.8082 55.9653L51.3636 55.4742C52.523 54.4245 53.6134 53.2986 54.6278 52.1035C63.1994 42.0398 66.6482 27.1447 64.8859 7.82136ZM4.59923 20.243C4.46975 16.2424 4.59412 12.2374 4.97157 8.25312C5.06325 7.31757 5.50087 6.45239 6.19585 5.83268L28.7142 21.3777L17.8566 28.9216L4.59923 20.243ZM13.7845 31.7513L7.21504 36.3145C6.15713 32.9676 5.42732 29.5224 5.03625 26.0292L13.7845 31.7513ZM32.7579 24.1673L43.401 31.5137L32.5796 38.5407L22.009 31.6293L32.7579 24.1673ZM36.792 21.3665L59.1447 5.83749C59.8347 6.45501 60.2697 7.315 60.3627 8.24509C60.7425 12.2319 60.869 16.2395 60.7413 20.243L47.5755 28.7996L36.792 21.3665ZM60.2996 26.0212C59.915 29.4535 59.2049 32.84 58.1792 36.1331L51.6602 31.6389L60.2996 26.0212ZM52.6573 4.74765L32.75 18.5753L12.7133 4.74605C17.4543 4.67382 25.0587 4.6369 32.6648 4.6369C40.2708 4.6369 47.9179 4.67382 52.6573 4.74765ZM8.91264 40.7332L17.9354 34.4735L28.3656 41.2934L14.9552 50.0089C14.6807 49.7104 14.4077 49.4038 14.1379 49.086C12.0157 46.5679 10.2563 43.7555 8.91264 40.7332ZM32.7026 59.3889H32.69C32.3382 59.3648 25.3758 58.8175 18.4119 53.2399L32.5717 44.0381L46.7993 53.3475C40.113 58.6394 33.4631 59.3263 32.7026 59.3889ZM51.1963 49.0828C50.8923 49.4413 50.5858 49.7863 50.2765 50.1181L36.7857 41.2902L47.4887 34.3387L56.5005 40.5583C55.1457 43.6451 53.3591 46.5163 51.1963 49.0828Z" fill="#161A3D" />
        </svg>
        <div class="h-full w-[1.5px] bg-primary"></div>
        <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 400); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover object-top nolazy">
      </div>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
    <div></div>
    <div class="items-center grid-cols-[1fr_0.75fr_1.5fr] justify-items-center lg:grid noshow">
      <svg width="66" height="65" viewBox="0 0 66 65" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M64.8859 7.82136C64.5073 3.71078 61.1342 0.455708 57.0401 0.237419C51.5734 -0.053098 13.7609 -0.053098 8.28945 0.237419C4.20008 0.455708 0.826974 3.71078 0.44675 7.82457C-1.31395 27.1303 2.13488 42.0285 10.7017 52.1019C19.9139 62.9393 31.685 63.9489 32.3713 63.9987L32.6285 64.0195L32.944 64.0051C33.3779 63.9746 42.3691 63.27 50.8082 55.9653L51.3636 55.4742C52.523 54.4245 53.6134 53.2986 54.6278 52.1035C63.1994 42.0398 66.6482 27.1447 64.8859 7.82136ZM4.59923 20.243C4.46975 16.2424 4.59412 12.2374 4.97157 8.25312C5.06325 7.31757 5.50087 6.45239 6.19585 5.83268L28.7142 21.3777L17.8566 28.9216L4.59923 20.243ZM13.7845 31.7513L7.21504 36.3145C6.15713 32.9676 5.42732 29.5224 5.03625 26.0292L13.7845 31.7513ZM32.7579 24.1673L43.401 31.5137L32.5796 38.5407L22.009 31.6293L32.7579 24.1673ZM36.792 21.3665L59.1447 5.83749C59.8347 6.45501 60.2697 7.315 60.3627 8.24509C60.7425 12.2319 60.869 16.2395 60.7413 20.243L47.5755 28.7996L36.792 21.3665ZM60.2996 26.0212C59.915 29.4535 59.2049 32.84 58.1792 36.1331L51.6602 31.6389L60.2996 26.0212ZM52.6573 4.74765L32.75 18.5753L12.7133 4.74605C17.4543 4.67382 25.0587 4.6369 32.6648 4.6369C40.2708 4.6369 47.9179 4.67382 52.6573 4.74765ZM8.91264 40.7332L17.9354 34.4735L28.3656 41.2934L14.9552 50.0089C14.6807 49.7104 14.4077 49.4038 14.1379 49.086C12.0157 46.5679 10.2563 43.7555 8.91264 40.7332ZM32.7026 59.3889H32.69C32.3382 59.3648 25.3758 58.8175 18.4119 53.2399L32.5717 44.0381L46.7993 53.3475C40.113 58.6394 33.4631 59.3263 32.7026 59.3889ZM51.1963 49.0828C50.8923 49.4413 50.5858 49.7863 50.2765 50.1181L36.7857 41.2902L47.4887 34.3387L56.5005 40.5583C55.1457 43.6451 53.3591 46.5163 51.1963 49.0828Z" fill="#161A3D" />
      </svg>
      <div class="h-full w-[1.5px] bg-primary"></div>
      <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 400); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover object-top nolazy">
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'multi_image') : ?>
  <div class="grid items-center lg:grid-cols-[5fr_7fr] gap-sp-5">
    <div class="order-2 lg:order-1">
      <p class="text-h4-base"><?= $subtitle; ?></p>
      <h1><?= $title; ?></h1>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
    <div class="order-1 h-full lg:order-2">
      <?php $imageOne = get_field('image_one'); ?>
      <img src="<?= $imageOne['url'] ?: placeHolderImage(600, 400); ?>" alt="<?= $imageOne['alt'] ?: 'Placeholder image'; ?>" class="h-[400px] w-full object-cover rounded-sm">
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
      <div class="p-sp-4 lg:p-sp-8">
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
        <img src="<?= $heroImage['url'] ?: placeHolderImage(600, 600); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover w-full h-full rounded-lg nolazy brightness-75">
      </div>
      <h1 class="absolute text-white -translate-y-1/2 top-1/2 lg:left-sp-12 left-sp-8"><?= $title; ?></h1>
    </div>
    <div class="grid items-start lg:gap-sp-16 gap-sp-4 lg:grid-cols-2 mt-sp-12">
      <div class="flex flex-col lg:items-center gap-sp-4 lg:flex-row">
        <?php if ($icon) : ?>
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health Shield" class="w-10">
        <?php endif; ?>
        <p class="mb-0 text-h4-base font-heading-serif"><?= $subtitle; ?></p>
      </div>
      <div class="">
        <?= $subtitleEditor; ?>
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if (have_rows('hero_jump_buttons_jump_buttons')) : ?>
  <div class="grid mt-sp-6 lg:mt-sp-14 gap-base5-4">
    <div>
      <p class="text-h3 lg:text-h3-lg font-heading-serif">Jump to:</p>
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