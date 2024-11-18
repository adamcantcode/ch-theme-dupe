<?php if (have_rows('cards')): ?>
  <div class="grid lg:grid-cols-3 gap-base5-4">
    <?php while (have_rows('cards')): the_row(); ?>
      <?php
      $icon     = get_sub_field('icon');
      $headline = get_sub_field('headline');
      $subhead  = get_sub_field('subhead');
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
      <div class="<?= $bg; ?> rounded-sm p-base5-4 flex flex-col border border-primary referrals-feature-card <?= !is_admin() ? 'opacity-0' : ''; ?>">
        <img src="<?= site_url("/wp-content/themes/charliehealth/resources/images/icons/$icon"); ?>" alt="icon" class="mb-base5-5 w-base5-8">
        <h3 class="font-heading-serif"><?= $headline; ?></h3>
        <p><?= $subhead; ?></p>
      </div>
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
?>