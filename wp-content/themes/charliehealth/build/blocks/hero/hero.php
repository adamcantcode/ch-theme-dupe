<?php
$subtitle = get_field('hero_subtitle');
$icon = get_field('hero_icon');
$buttons = get_field('hero_buttons')['button_group_buttons'];
$link = get_field('hero_buttons')['button_group_link'];
$test = get_fields();

// var_dump($subtitle);
// var_dump($icon);
// var_dump($buttons);
// var_dump($link);
// var_dump($test);
// var_dump($block);

if ($block['className'] === 'is-style-image' || empty($block['className'])) {
  $style = 0;
  $titleClass = 'text-display mb-sp-8';
  $gridClass = 'grid lg:grid-cols-2 gap-4 items-center';
} elseif ($block['className'] === 'is-style-details') {
  $style = 1;
  $gridClass = 'grid grid-cols-2 gap-4 items-center';
  $titleClass = '';
} elseif ($block['className'] === 'is-style-cta') {
  $style = 2;
  $gridClass = '';
  $titleClass = '';
}
// var_dump($style);
?>

<div class="hero-cta <?= $gridClass ?: ''; ?>">
  <div class="order-2 lg:order-1">
    <h1 class="<?= $titleClass ?: ''; ?> hidden lg:block"><?php the_title(); ?></h1>
    <div class="flex items-center gap-4 mb-sp-8">
      <?php if ($style === 0) : ?>
        <?php if ($icon) : ?>
          <!-- TODO Update image -->
          <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/6365881dfdc1335ce5cc9ef8_LogoIcon.webp" alt="" class="w-10">
        <?php endif; ?>
        <h3><?= $subtitle; ?></h3>
      <?php endif; ?>
    </div>
    <?php if ($style === 0) : ?>
      <?php include_once('includes/button-group.php'); ?>
    <?php endif; ?>
  </div>
  <h1 class="<?= $titleClass ?: ''; ?> block lg:hidden"><?php the_title(); ?></h1>
  <?php if ($style === 0 || $style === 1) : ?>
    <div class="flex flex-col justify-between order-1 lg:order-2">
      <?php if ($style === 0) : ?>
        <!-- TODO Update image -->
        <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/63657e4ca50eb97be513e62d_Homepageherp.webp" alt="x" class="object-cover object-top rounded-lg max-h-52 md:max-h-none">
      <?php endif; ?>
      <?php if ($style === 1) : ?>
        <?php include_once('includes/details.php'); 
        ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <?php if ($style === 2) : ?>
    <div class="grid grid-cols-[1fr_3fr_3fr] justify-items-center items-center">
      <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/63657e4ca50eb97be513e62d_Homepageherp.webp" alt="x" class="self-stretch object-cover">
      <?php //include_once('includes/cta.php'); 
      ?>
    </div>
  <?php endif; ?>
  <?php
  // use inner blocks. can make a TOC button block and inlcude...
  // $allowed_blocks = array('core/image', 'core/paragraph');
  // echo '<InnerBlocks allowedBlocks="' . esc_attr(wp_json_encode($allowed_blocks)) . '" />';
  ?>
</div>