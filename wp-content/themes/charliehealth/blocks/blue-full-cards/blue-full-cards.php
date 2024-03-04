<div class="grid grid-cols-1 lg:grid-cols-3 gap-base5-4">
  <?php if (have_rows('cards')) : ?>
    <?php while (have_rows('cards')) : the_row(); ?>
    <div class="rounded-sm bg-primary lg:p-base5-6 p-base5-3">
      <h3 class="text-pale-blue-200"><?= get_sub_field('headline'); ?></h3>
      <h4 class="text-white"><?= get_sub_field('subhead'); ?></h4>
    </div>
  <?php endwhile;
  endif;  ?>
</div>