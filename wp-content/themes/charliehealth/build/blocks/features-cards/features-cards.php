<?php
$features = get_field('features');
?>
<?php if (have_rows('features')) : ?>
  <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-sp-6 gap-sp-3 lg:mt-sp-8 mt-sp-12 [&_*]:!text-primary">
    <?php while (have_rows('features')) : the_row();
      switch (get_row_index()) {
        case 1:
          $bg = 'bg-pale-blue-200';
          break;
        case 2:
          $bg = 'bg-lavender-300';
          break;
        case 3:
          $bg = 'bg-yellow-300';
          break;
        default:
          $bg = 'bg-pale-blue-200';
          break;
      }
      $icon = get_sub_field('icon');
      switch ($icon) {
        case 'phone':
          $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/phone.svg');
          break;
        case 'rainbow':
          $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/rainbow.svg');
          break;
        case 'person':
          $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/person-blue.svg');
          break;
        default:
          $icon = site_url('/wp-content/themes/charliehealth/resources/images/icons/warning.svg');
          break;
      }
    ?>
      <div class="<?= $bg; ?> rounded-[6px] p-sp-5 flex flex-col feature-card <?= !is_admin() ? 'opacity-0' : ''; ?>">
        <img src="<?= $icon; ?>" alt="icon" class="mb-sp-6 lg:mb-sp-12 max-w-[40px] max-h-[40px]">
        <h3><?= get_sub_field('heading'); ?></h3>
        <p><?= get_sub_field('subheading'); ?></p>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>