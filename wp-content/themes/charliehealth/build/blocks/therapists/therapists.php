<?php if (have_rows('therapists')) : ?>
  <div class="grid lg:grid-cols-3 gap-base5-4">
    <?php while (have_rows('therapists')) : the_row(); ?>
      <?php
      $image = get_sub_field('headshot');
      $name  = get_sub_field('name');
      $title = get_sub_field('title');
      ?>
      <div class="text-center bg-white rounded-lg p-base5-5">
        <img src="<?= $image['url'] ?: placeHolderImage(); ?>" alt="<?= $image['alt']; ?>" class="object-cover rounded-circle aspect-square mb-sp-6">
        <p class="font-heading-serif mb-base5-1"><?= $name; ?></p>
        <p><?= $title; ?></p>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>