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
  <?php if ($style === 'circle') : ?>
    <div class="grid lg:grid-flow-col justify-items-center gap-sp-8 stats-block-circles">
      <?php while (have_rows('statistic')) : the_row(); ?>
        <?php
        $number = get_sub_field('number');
        $label = get_sub_field('label');
        ?>
        <div class="relative stats-circles">
          <div class="absolute inset-0 grid content-center justify-items-center w-full max-w-[200px] mx-auto text-center">
            <h2 class="text-[2.5rem] mb-sp-4 number" id="<?= get_row_index(); ?>"><?= $number; ?></h3>
              <p class=""><?= $label; ?></p>
          </div>
          <div class="js-stats-circle">
            <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" fill="none" viewBox="0 0 300 300">
              <circle cx="150" cy="150" r="145" stroke="#3A5D66" stroke-width="10" class="opacity-0" />
              <circle cx="150" cy="150" r="119.274" stroke="#D2E3EB" stroke-width="15" />
            </svg>
          </div>
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