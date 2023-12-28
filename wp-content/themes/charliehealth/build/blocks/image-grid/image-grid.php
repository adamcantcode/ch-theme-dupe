<div class="grid lg:justify-around justify-items-center items-center grid-cols-2 lg:grid-cols-[unset] lg:grid-flow-col lg:gap-sp-8 gap-sp-2">
  <?php if (have_rows('images')) :
    while (have_rows('images')) : the_row(); ?>
      <img src="<?= get_sub_field('image')['sizes']['card-thumb']; ?>" alt="<?= get_sub_field('image')['alt'] ?>" class="object-contain aspect-video last:col-start-[span_2]">
  <?php endwhile;
  endif; ?>
</div>