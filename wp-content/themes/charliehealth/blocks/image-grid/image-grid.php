<div class="grid justify-around grid-cols-2 lg:grid-cols-[unset] lg:grid-flow-col gap-sp-8">
  <?php if (have_rows('images')) :
    while (have_rows('images')) : the_row(); ?>
      <img src="<?= get_sub_field('image')['sizes']['card-thumb']; ?>" alt="<?= get_sub_field('image')['alt'] ?>" class="object-contain aspect-video h-sp-16">
  <?php endwhile;
  endif; ?>
</div>