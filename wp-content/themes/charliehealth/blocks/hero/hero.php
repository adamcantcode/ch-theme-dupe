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
      <?php if ($heroImage) : ?>
        <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 400); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="block object-cover object-top rounded-lg nolazy lg:noshow mb-sp-4 hero-image-container">
      <?php endif; ?>
      <div class="flex items-center gap-sp-4 mb-sp-12 mobile-hero-sub">
        <?php if ($icon) : ?>
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health Shield" class="w-10 noshow lg:block mt-base5-1">
        <?php endif; ?>
        <p class="mb-0 text-h4-base font-heading-serif"><?= $subtitle; ?></p>
      </div>
      <div class="hero-image-buttons">
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
    </div>
    <div class="flex flex-col justify-between order-1 lg:order-2">
      <?php if ($heroImage) : ?>
        <img src="<?= $heroImage['sizes']['featured-large'] ?: placeHolderImage(600, 400); ?>" alt="<?= $heroImage['alt'] ?: 'Placeholder image'; ?>" class="object-cover object-top rounded-lg nolazy noshow lg:block">
      <?php endif; ?>
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
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health Shield" class="w-10 mt-base5-1">
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
<?php if ($style === 'treatment') : ?>
  <div class="grid items-start lg:grid-cols-[7fr_5fr] lg:gap-base5-4 gap-base5-8">
    <div class="order-1">
      <h1><?= $title; ?></h1>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
    <div class="relative order-1 lg:order-2 lg:pl-base5-10">
      <div class="absolute bg-gradient-to-b from-[#D6D7F0] to-pale-blue-200 left-0 top-[-145px] w-[500%] pseudo-bg noshow lg:block"></div>
      <svg width="44" height="43" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg" class="relative mb-base5-8">
        <path d="M43.6987 5.24185C43.4437 2.48006 41.172 0.293056 38.4147 0.146393C34.7331 -0.0487978 9.26753 -0.0487978 5.58269 0.146393C2.82862 0.293056 0.556941 2.48006 0.300873 5.24401C-0.884906 18.215 1.43778 28.2248 7.20729 34.9929C13.4114 42.2742 21.3389 42.9525 21.8011 42.986L21.9743 43L22.1868 42.9903C22.479 42.9698 28.5343 42.4964 34.2178 37.5886L34.5918 37.2586C35.3726 36.5534 36.107 35.7968 36.7901 34.9939C42.5629 28.2323 44.8855 18.2248 43.6987 5.24185ZM3.09744 13.5876C3.01024 10.8997 3.094 8.2089 3.3482 5.53194C3.40994 4.90337 3.70467 4.32208 4.17272 3.90571L19.3382 14.35L12.0258 19.4185L3.09744 13.5876ZM9.28347 21.3198L4.85911 24.3857C4.14664 22.137 3.65513 19.8222 3.39176 17.4753L9.28347 21.3198ZM22.0614 16.2243L29.2292 21.1602L21.9413 25.8814L14.8224 21.2378L22.0614 16.2243ZM24.7783 14.3425L39.8322 3.90894C40.2968 4.32384 40.5898 4.90164 40.6524 5.52655C40.9082 8.2052 40.9934 10.8978 40.9074 13.5876L32.0407 19.3366L24.7783 14.3425ZM40.6099 17.4699C40.3509 19.776 39.8727 22.0512 39.1819 24.2638L34.7915 21.2443L40.6099 17.4699ZM35.4631 3.17671L22.0561 12.4672L8.56201 3.17563C11.7549 3.1271 16.8763 3.1023 21.9987 3.1023C27.1212 3.1023 32.2712 3.1271 35.4631 3.17671ZM6.00239 27.3545L12.079 23.1487L19.1033 27.7309L10.0719 33.5866C9.88698 33.386 9.70317 33.1801 9.52147 32.9665C8.09221 31.2747 6.90731 29.3851 6.00239 27.3545ZM22.0242 39.8888H22.0157C21.7788 39.8726 17.0898 39.5049 12.3999 35.7574L21.936 29.575L31.5179 35.8297C27.0149 39.3852 22.5364 39.8468 22.0242 39.8888ZM34.4792 32.9644C34.2744 33.2052 34.068 33.4371 33.8597 33.66L24.774 27.7287L31.9822 23.0582L38.0514 27.237C37.1389 29.3109 35.9357 31.24 34.4792 32.9644Z" fill="#161A3D" />
      </svg>

      <div class="relative">
        <?= $subtitleEditor; ?>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      function setPseudoBgDimensions() {
        const pseudoBg = document.querySelector('.pseudo-bg');
        const parentSection = pseudoBg.closest('section'); // Assuming parent is a section

        if (parentSection) {
          // Set the height of .pseudo-bg to the height of the parent section
          pseudoBg.style.height = `${parentSection.offsetHeight}px`;

          // Get the distance between the left side of the element and the left edge of the screen
          const distanceToLeft = pseudoBg.getBoundingClientRect().left;
          pseudoBg.style.width = `${distanceToLeft}px`;
        }
      }

      // Call the function on page load and window resize
      setPseudoBgDimensions();
      window.addEventListener('resize', setPseudoBgDimensions);
    });
  </script>
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