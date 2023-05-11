<?php
$source = get_field('source');
$style = get_field('style');
?>

<?php if (have_rows('statistic')) : ?>
  <?php if ($style === 'divider') : ?>
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
          <div class="overflow-hidden max-w-[350px]">
            <p class="text-center lg:mt-sp-8 mt-sp-4 details"><?= $label; ?></p>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  <?php if ($style !== 'circles') : ?>
    <div class="grid lg:grid-flow-col justify-items-center gap-sp-8 stats-block-circles">
      <?php while (have_rows('statistic')) : the_row(); ?>
        <?php
        $number = get_sub_field('number');
        $label = get_sub_field('label');
        ?>
        <div class="relative stats-circles">
          <div class="absolute inset-0 grid content-center justify-items-center w-full max-w-[200px] mx-auto text-center">
            <h2 class="text-[2.5rem] mb-sp-4" id="<?= get_row_index(); ?>"><?= $number; ?></h3>
            <p class=""><?= $label; ?></p>
          </div>
          <?= file_get_contents('wp-content/themes/charliehealth/resources/images/utilities/stats-circle.php'); ?>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  <?php if ($source) : ?>
    <a href="<?= $source['url']; ?>" target="<?= $source['target']; ?>">
      <h6 class="mt-sp-8"><?= $source['title']; ?></h6>
    </a>
  <?php endif; ?>
<?php endif; ?>