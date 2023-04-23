<?php
$style = get_field('hero_style');
$breadcrumbs = get_field('hero_breadcrumbs');
$title = get_field('hero_title') ?: get_the_title();
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

if ($style === 'image') {
  $titleClass = 'text-display mb-sp-8 hidden lg:block';
  $gridClass = 'grid lg:grid-cols-2 gap-4 items-center';
  $orderClass = 'order-2 lg:order-1';
  $orderClassTwo = 'order-1 lg:order-2';
} elseif ($style === 'details') {
  $gridClass = 'grid lg:grid-cols-2 gap-4 items-start';
  $titleClass = '';
  $orderClass = 'order-1';
  $orderClassTwo = 'order-1 lg:order-2';
}
// var_dump($style);
?>

<?php if ($breadcrumbs) : ?>
  <?php include_once('includes/breadcrumbs.php'); ?>
<?php endif; ?>
<div class="hero-cta <?= $gridClass; ?>">
  <div class="<?= $orderClass; ?>">
    <h1 class="<?= $titleClass; ?>"><?= $title; ?></h1>
    <?php if ($style === 'image') : ?>
      <div class="flex items-center gap-4 mb-sp-8">
        <?php if ($icon) : ?>
          <!-- TODO Update image -->
          <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/6365881dfdc1335ce5cc9ef8_LogoIcon.webp" alt="" class="w-10">
        <?php endif; ?>
        <h3><?= $subtitle; ?></h3>
      </div>
    <?php endif; ?>
    <?php if ($style === 'image') : ?>
      <?php include('includes/button-group.php'); ?>
    <?php endif; ?>
  </div>
  <?php if ($style === 'image') : ?>
    <h1 class="block text-display lg:hidden"><?php the_title(); ?></h1>
  <?php endif; ?>
  <?php if ($style === 'image' || $style === 'details') : ?>
    <div class="flex flex-col justify-between <?= $orderClassTwo ?: ''; ?>">
      <?php if ($style === 'image') : ?>
        <!-- TODO Update image -->
        <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/63657e4ca50eb97be513e62d_Homepageherp.webp" alt="x" class="object-cover object-top rounded-lg max-h-52 md:max-h-none">
      <?php endif; ?>
      <?php if ($style === 'details') : ?>
        <?php include('includes/details.php');
        ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <?php
  // use inner blocks. can make a TOC button block and inlcude...
  // $allowed_blocks = array('core/image', 'core/paragraph');
  // echo '<InnerBlocks allowedBlocks="' . esc_attr(wp_json_encode($allowed_blocks)) . '" />';
  ?>
</div>
<?php if (have_rows('hero_jump_buttons_jump_buttons')) : ?>
  <div class="mt-sp-6 md:mt-sp-10 lg:mt-sp-14">
    <div>
      <h3>Jump to:</h3>
    </div>
    <div class="flex overflow-auto gap-sp-5 no-scrollbar">
      <?php while (have_rows('hero_jump_buttons_jump_buttons')) : the_row();
        $label = get_sub_field('label');
        $sectionID  = get_sub_field('section_id');
      ?>
        <a href="#<?= $sectionID; ?>" class="ch-button button-secondary whitespace-nowrap"><?= $label; ?></a>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>