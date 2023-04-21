<?php
$source = get_field('source');
?>

<?php if (have_rows('statistic')) : ?>
  <div class="grid lg:grid-flow-col justify-items-center gap-sp-8">
    <?php while (have_rows('statistic')) : the_row(); ?>
      <?php
      $number = get_sub_field('number');
      $label = get_sub_field('label');
      ?>
      <div class="lg:w-full">
        <h3 class="text-center text-h1-lg"><?= $number; ?></h3>
        <div class="divider"></div>
        <p class="text-center lg:mt-sp-8 mt-sp-4"><?= $label; ?></p>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>