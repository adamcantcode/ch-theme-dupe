<?php if (have_rows('cards')): ?>
  <div class="grid lg:auto-cols-fr lg:grid-flow-col lg:gap-base5-5 gap-base5-3 lg:mt-base5-6 mt-base5-9">
    <?php while (have_rows('cards')): the_row(); ?>
      <?php
      $icon     = get_sub_field('icon');
      $image    = get_sub_field('image');
      $headline = get_sub_field('headline');
      $subhead  = get_sub_field('subhead');
      $link     = get_sub_field('link');
      $bg       = 'transparent';

      switch (get_row_index()) {
        case 1:
          $bg = 'bg-gradient-to-b from-referrals-yellow-100 to-referrals-yellow-200';
          break;
        case 2:
          $bg = 'bg-gradient-to-b from-referrals-blue-100 to-referrals-blue-200';
          break;
        case 3:
          $bg = 'bg-gradient-to-b from-referrals-green-100 to-referrals-green-200';
          break;
        default:
          $bg = 'transparent';
          break;
      }
      ?>
      <?php if (!$image) : ?>
        <div class="<?= $bg; ?> relative rounded-sm p-base5-4 flex flex-col border border-primary referrals-feature-card <?= !is_admin() ? 'opacity-0' : ''; ?>">
          <img src="<?= site_url("/wp-content/themes/charliehealth/resources/images/icons/$icon"); ?>" alt="icon" class="mb-base5-5 w-base5-8">
          <h3 class="font-heading-serif"><?= $headline; ?></h3>
          <p><?= $subhead; ?></p>
          <?php if (get_sub_field('link')) : ?>
            <a href="<?= get_sub_field('link')['url']; ?>" class="mt-auto ch-button button-primary-ch stretched-link"><?= get_sub_field('link')['title']; ?></a>
          <?php endif; ?>
        </div>
      <?php else: ?>
        <div class="<?= $bg; ?> relative rounded-sm p-base5-4 flex flex-col border border-primary text-center referrals-feature-card <?= !is_admin() ? 'opacity-0' : ''; ?>">
          <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="w-full mb-base5-2">
          <h3 class="font-heading-serif mb-base5-2"><?= $headline; ?></h3>
          <p><?= $subhead; ?></p>
          <?php if (get_sub_field('link')) : ?>
            <a href="<?= get_sub_field('link')['url']; ?>" class="mt-auto ch-button button-primary-ch stretched-link"><?= get_sub_field('link')['title']; ?></a>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
<?php
// $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/computer.svg');
// $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/check.svg');
// $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/chat.svg');
// $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/warning.svg');
// $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/clipboard.svg');
// $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/rainbow.svg');
// $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/sun.svg');
?>