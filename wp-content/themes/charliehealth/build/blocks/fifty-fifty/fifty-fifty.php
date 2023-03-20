<?php
$style = get_field('fifty_fifty_style');
$image = get_field('fifty_fifty_image');
$title = get_field('fifty_fifty_title');
$details = get_field('fifty_fifty_details');
$cta = get_field('fifty_fifty_cta');
?>
<div class="grid items-center grid-cols-1 gap-4 md:gap-32 md:grid-cols-2 last:mb-0 md:mb-sp-14 mb-sp-12">
  <?php if ($style === 'slider') : ?>
    <?php if (have_rows('fifty_fifty_slides')) : ?>
      <div>
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php while (have_rows('fifty_fifty_slides')) : the_row();
              $imageUrl = get_sub_field('fifty_fifty_slide_image');
            ?>
              <div class="swiper-slide">
                <img src="<?= $imageUrl['url']; ?>" alt="">
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php else : ?>
    <!-- TODO Update image -->
    <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/63657e4ca50eb97be513e62d_Homepageherp.webp" alt="x" class="object-cover object-top rounded-md max-h-[500px] flex-grow md:order-1 order-2">
  <?php endif; ?>
  <div class="flex-grow order-1 md:order-2">
    <h2><?= $title; ?></h2>
    <?php if ($details) : ?>
      <p class="mb-sp-4"><?= $details; ?></p>
    <?php endif; ?>
    <?php if ($cta) : ?>
      <div class="flex">
        <a href="<?= $cta['url'] ?: '#'; ?>" class="ch-button button-secondary"><?= $cta['title'] ?: 'Learn More'; ?></a>
      </div>
    <?php endif; ?>
  </div>
</div>
<!-- Slider main container -->