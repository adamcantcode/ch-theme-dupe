<?php
$style = get_field('style');
?>
<?php if (have_rows('cards')): ?>
  <div class="grid lg:grid-cols-3 gap-base5-4">
    <?php while (have_rows('cards')): the_row(); ?>
      <?php
      $headline = get_sub_field('headline');
      ?>
      <?php if ($style === 'dark') : ?>
        <div class="rounded-sm p-base5-4 flex flex-col border border-primary referrals-feature-card justify-center items-center text-center <?= !is_admin() ? 'opacity-0' : ''; ?>">
          <h3 class="font-heading-serif"><?= $headline; ?></h3>
        </div>
      <?php else : ?>
        <div class="rounded-sm p-base5-4 flex flex-col border border-white referrals-feature-card justify-center items-center text-center <?= !is_admin() ? 'opacity-0' : ''; ?>">
          <h3 class="text-white font-heading-serif"><?= $headline; ?></h3>
        </div>
      <?php endif ?>
    <?php endwhile; ?>
  </div>
<?php endif; ?>