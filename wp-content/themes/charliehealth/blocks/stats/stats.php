<?php
$source = get_field('source');
?>

<?php if (have_rows('statistic')) : ?>
  <div class="grid lg:grid-flow-col justify-items-center gap-sp-8 stats-block">
    <?php while (have_rows('statistic')) : the_row(); ?>
      <?php
      $number = get_sub_field('number');
      $label = get_sub_field('label');
      ?>
      <div>
        <div class="overflow-hidden">
          <h3 class="text-center text-h1-lg counter" id="<?= get_row_index(); ?>"><?= $number; ?></h3>
        </div>
        <div class="divider"></div>
        <div class="overflow-hidden">
          <p class="text-center lg:mt-sp-8 mt-sp-4 details"><?= $label; ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>