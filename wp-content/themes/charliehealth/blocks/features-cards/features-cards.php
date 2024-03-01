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
    ?>
      <div class="<?= $bg; ?> rounded-[6px] p-sp-5 flex flex-col feature-card opacity-0">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-sp-6 lg:mb-sp-12">
          <path d="M18 27H20.5V29.5H18V27Z" fill="#161A3D" />
          <path d="M20.5 12H18V24H20.5V12Z" fill="#161A3D" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M35.6868 8.98067C36.1614 8.97285 36.5894 9.28269 36.6922 9.74615C37.0574 11.3921 37.25 13.1031 37.25 14.859C37.25 25.7191 29.8833 34.8585 19.8744 37.553C19.7114 37.5969 19.5386 37.5969 19.3756 37.553C9.36668 34.8585 2 25.7191 2 14.859C2 13.103 2.1926 11.392 2.55784 9.7459C2.66067 9.28245 3.08863 8.97261 3.56329 8.98044C3.69471 8.9826 3.8264 8.98369 3.95833 8.98369C9.6553 8.98369 14.8788 6.95649 18.9468 3.5841C19.3391 3.25891 19.9106 3.25891 20.3029 3.58411C24.371 6.95664 29.5946 8.98393 35.2917 8.98393C35.4236 8.98393 35.5553 8.98284 35.6868 8.98067ZM34.0463 11.9551C28.666 11.7059 23.7002 9.85019 19.6248 6.85875C15.5495 9.85005 10.5838 11.7056 5.20374 11.9549C5.06956 12.9024 5 13.8718 5 14.859C5 24.1356 11.1643 31.9799 19.625 34.5056C28.0857 31.9799 34.25 24.1356 34.25 14.859C34.25 13.8719 34.1805 12.9025 34.0463 11.9551Z" fill="#161A3D" />
        </svg>
        <h3><?= get_sub_field('heading'); ?></h3>
        <p><?= get_sub_field('subheading'); ?></p>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>