<?php
$style = get_field('fifty_fifty_style');
$image = get_field('fifty_fifty_image');
$title = get_field('fifty_fifty_title');
$details = get_field('fifty_fifty_details');
$cta = get_field('fifty_fifty_cta');
$order = get_field('order');

switch ($order) {
  case 'LR':
    $imageOrder = 'lg:order-1';
    $detailsOrder = 'lg:order-2';
    break;
  case 'RL':
    $imageOrder = 'lg:order-2';
    $detailsOrder = 'lg:order-1';
    break;
  default:
    $imageOrder = 'lg:order-1';
    $detailsOrder = 'lg:order-2';
    break;
}
?>
<div class="grid items-center grid-cols-1 gap-4 just lg:gap-32 lg:grid-cols-2 last:mb-0 lg:mb-sp-14 mb-sp-12">
  <?php if ($style === 'slider') : ?>
    <?php if (have_rows('fifty_fifty_slides')) : ?>
      <div class="<?= $imageOrder; ?>">
        <div class="swiper swiper-fifty-fifty">
          <div class="items-center swiper-wrapper">
            <?php while (have_rows('fifty_fifty_slides')) : the_row();
              $sliderImage = get_sub_field('fifty_fifty_slide_image');
            ?>
              <div class="swiper-slide">
                <div class="grid items-center justify-center">
                  <img src="<?= $sliderImage['sizes']['featured-large']; ?>" alt="<?= $sliderImage['alt']; ?>" class="nolazy">
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php else : ?>
    <?php if ($image) : ?>
      <div class="object-cover object-top rounded-md flex-grow <?= $imageOrder; ?>">
        <img src="<?= $image['sizes']['featured-large']; ?>" alt="<?= $image['alt']; ?>">
      </div>
    <?php endif; ?>
  <?php endif; ?>
  <div class="flex-grow <?= $detailsOrder; ?>">
    <InnerBlocks />
  </div>
</div>