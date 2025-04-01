<?php
$heading = get_field('heading');
$calloutCopy = get_field('callout_copy');
$features = get_field('features');
?>

<div class="features-block grid grid-cols-1 lg:gap-sp-5 gap-sp-4 lg:grid-cols-[4fr_1fr_7fr] items-start">
  <div class="features-block-intro [&_*]:text-white">
    <h2><?= $heading; ?></h2>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
  <div></div>
  <div class="features-block-callout">
    <div class="[&_*]:text-white">
      <?= $calloutCopy; ?>
    </div>
    <?php if (have_rows('features')) : ?>
      <div class="grid lg:auto-cols-fr lg:grid-flow-col lg:gap-base5-5 gap-base5-3 lg:mt-base5-6 mt-base5-9">
        <?php
        $bg_classes = ['bg-pale-blue-200', 'bg-lavender-300', 'bg-yellow-300'];
        $icon_paths = [
          'phone' => site_url('/wp-content/themes/charliehealth/resources/images/icons/phone.svg'),
          'rainbow' => site_url('/wp-content/themes/charliehealth/resources/images/icons/rainbow.svg'),
          'person' => site_url('/wp-content/themes/charliehealth/resources/images/icons/person-blue.svg'),
          'clipboard' => site_url('/wp-content/themes/charliehealth/resources/images/icons/clipboard.svg'),
          'alert' => site_url('/wp-content/themes/charliehealth/resources/images/icons/warning.svg'),
          'sun' => site_url('/wp-content/themes/charliehealth/resources/images/icons/sun.svg'),
          'default' => site_url('/wp-content/themes/charliehealth/resources/images/icons/warning.svg')
        ];

        while (have_rows('features')) : the_row();
          $bg = $bg_classes[(get_row_index() - 1) % count($bg_classes)];
          $icon_key = get_sub_field('icon');
          $icon = $icon_paths[$icon_key] ?? $icon_paths['default'];
        ?>
          <div class="<?= $bg; ?> relative rounded-md p-base5-4 flex flex-col feature-card <?= !is_admin() ? 'opacity-0' : ''; ?>">
            <img src="<?= $icon; ?>" alt="icon" class="mb-sp-6 lg:mb-base5-9 max-w-[40px] max-h-[40px]">
            <h3><?= get_sub_field('heading'); ?></h3>
            <p><?= get_sub_field('subheading'); ?></p>
            <?php if (get_sub_field('link')) : ?>
              <a href="<?= get_sub_field('link')['url']; ?>" class="mt-auto ch-button button-primary-ch stretched-link"><?= get_sub_field('link')['title']; ?></a>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</div>