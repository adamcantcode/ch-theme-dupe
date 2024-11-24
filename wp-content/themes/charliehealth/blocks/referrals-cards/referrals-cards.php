<?php if (have_rows('cards')): ?>
  <div class="grid lg:grid-cols-3 gap-base5-4">
    <?php while (have_rows('cards')): the_row(); ?>
      <?php
      $headline = get_sub_field('headline');
      ?>
      <div class="rounded-sm p-base5-4 flex flex-col border border-primary referrals-feature-card justify-center items-center text-center <?= !is_admin() ? 'opacity-0' : ''; ?>">
        <h3 class="font-heading-serif"><?= $headline; ?></h3>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>