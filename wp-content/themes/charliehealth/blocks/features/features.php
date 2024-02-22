<?php
$heading = get_field('heading');
$calloutCopy = get_field('callout_copy');
$features = get_field('features');
?>

<div class="features-block grid grid-cols-1 lg:gap-sp-5 gap-sp-4 lg:grid-cols-[4fr_1fr_7fr] items-start [&_*]:text-white">
  <div class="features-block-intro">
    <h2><?= $heading; ?></h2>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
  <div></div>
  <div class="features-block-callout">
    <?= $calloutCopy; ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-sp-6 gap-sp-3 lg:mt-sp-8 mt-sp-12 [&_*]:!text-primary">
      <div class="bg-pale-blue-200 rounded-[6px] p-sp-5 flex flex-col feature-card opacity-0">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-sp-6 lg:mb-sp-12">
          <path d="M18 27H20.5V29.5H18V27Z" fill="#161A3D" />
          <path d="M20.5 12H18V24H20.5V12Z" fill="#161A3D" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M35.6868 8.98067C36.1614 8.97285 36.5894 9.28269 36.6922 9.74615C37.0574 11.3921 37.25 13.1031 37.25 14.859C37.25 25.7191 29.8833 34.8585 19.8744 37.553C19.7114 37.5969 19.5386 37.5969 19.3756 37.553C9.36668 34.8585 2 25.7191 2 14.859C2 13.103 2.1926 11.392 2.55784 9.7459C2.66067 9.28245 3.08863 8.97261 3.56329 8.98044C3.69471 8.9826 3.8264 8.98369 3.95833 8.98369C9.6553 8.98369 14.8788 6.95649 18.9468 3.5841C19.3391 3.25891 19.9106 3.25891 20.3029 3.58411C24.371 6.95664 29.5946 8.98393 35.2917 8.98393C35.4236 8.98393 35.5553 8.98284 35.6868 8.98067ZM34.0463 11.9551C28.666 11.7059 23.7002 9.85019 19.6248 6.85875C15.5495 9.85005 10.5838 11.7056 5.20374 11.9549C5.06956 12.9024 5 13.8718 5 14.859C5 24.1356 11.1643 31.9799 19.625 34.5056C28.0857 31.9799 34.25 24.1356 34.25 14.859C34.25 13.8719 34.1805 12.9025 34.0463 11.9551Z" fill="#161A3D" />
        </svg>
        <h3><?= $features[1]['heading']; ?></h3>
        <p><?= $features[1]['subheading']; ?></p>
      </div>
      <div class="bg-lavender-300 rounded-[6px] p-sp-5 flex flex-col feature-card opacity-0">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-sp-6 lg:mb-sp-12">
          <path d="M28 16H12V13.5H28V16Z" fill="#161A3D" />
          <path d="M12 22H28V19.5H12V22Z" fill="#161A3D" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M14 4C14 2.89543 14.8954 2 16 2H24C25.1046 2 26 2.89543 26 4V5H33C34.1046 5 35 5.89543 35 7V35C35 36.1046 34.1046 37 33 37H7C5.89543 37 5 36.1046 5 35V7C5 5.89543 5.89543 5 7 5H14V4ZM16.5 7.5V4.5H23.5V7.5H16.5ZM26 7.5V8C26 9.10457 25.1046 10 24 10H16C14.8954 10 14 9.10457 14 8V7.5H7.5V34.5H32.5V7.5H26Z" fill="#161A3D" />
        </svg>
        <h3><?= $features[0]['heading']; ?></h3>
        <p><?= $features[0]['subheading']; ?></p>
      </div>
      <div class="bg-yellow-300 rounded-[6px] p-sp-5 flex flex-col feature-card opacity-0">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-sp-6 lg:mb-sp-12">
          <path d="M20 12.25C10.7492 12.25 3.25 19.7492 3.25 29H0.75C0.75 18.3685 9.36852 9.75 20 9.75C30.6315 9.75 39.25 18.3685 39.25 29H36.75C36.75 19.7492 29.2508 12.25 20 12.25Z" fill="#161A3D" />
          <path d="M20 16.75C13.2345 16.75 7.75 22.2345 7.75 29H5.25C5.25 20.8538 11.8538 14.25 20 14.25C28.1462 14.25 34.75 20.8538 34.75 29H32.25C32.25 22.2345 26.7655 16.75 20 16.75Z" fill="#161A3D" />
          <path d="M12.25 29C12.25 24.7198 15.7198 21.25 20 21.25C24.2802 21.25 27.75 24.7198 27.75 29H30.25C30.25 23.3391 25.6609 18.75 20 18.75C14.3391 18.75 9.75 23.3391 9.75 29H12.25Z" fill="#161A3D" />
        </svg>
        <h3><?= $features[2]['heading']; ?></h3>
        <p><?= $features[2]['subheading']; ?></p>
      </div>
    </div>
  </div>
</div>