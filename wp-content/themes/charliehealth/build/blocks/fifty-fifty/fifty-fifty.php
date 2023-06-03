<?php
$style = get_field('fifty_fifty_style');
$image = get_field('fifty_fifty_image');
$title = get_field('fifty_fifty_title');
$details = get_field('fifty_fifty_details');
$cta = get_field('fifty_fifty_cta');
$order = get_field('order');
var_dump($image);

switch ($order) {
  case 'LR':
    $imageOrder = 'md:order-1';
    $detailsOrder = 'md:order-2';
    break;
  case 'RL':
    $imageOrder = 'md:order-2';
    $detailsOrder = 'md:order-1';
    break;
  default:
    $imageOrder = 'md:order-1';
    $detailsOrder = 'md:order-2';
    break;
}
?>
<div class="grid items-center grid-cols-1 gap-4 md:gap-32 md:grid-cols-2 last:mb-0 md:mb-sp-14 mb-sp-12">
  <?php if ($style === 'slider') : ?>
    <?php if (have_rows('fifty_fifty_slides')) : ?>
      <div>
        <div class="swiper swiper-fifty-fifty">
          <div class="items-center swiper-wrapper">
            <?php while (have_rows('fifty_fifty_slides')) : the_row();
              $imageUrl = get_sub_field('fifty_fifty_slide_image');
            ?>
              <div class="swiper-slide">
                <div class="grid items-center justify-center">
                  <img src="<?= $imageUrl['url']; ?>" alt="" class="">
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php else : ?>
    <?php if ($image) : ?>
      <img src="<?= $image['sizes']['featured-large']; ?>" alt="<?= $image['alt']; ?>" class="object-cover object-top rounded-md max-h-[500px] flex-grow <?= $imageOrder; ?>">
    <?php endif; ?>
  <?php endif; ?>
  <div class="flex-grow <?= $detailsOrder; ?>">
    <InnerBlocks />
  </div>
</div>
<!-- Slider main container -->