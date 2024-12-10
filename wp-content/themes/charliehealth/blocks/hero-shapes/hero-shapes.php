<?php
$main_image      = get_field('main_image');
$secondary_image = get_field('secondary_image');
$tertiary_image  = get_field('tertiary_image');
$video           = get_field('vimeo_url');
?>

<div class="grid lg:grid-cols-2 gap-base5-4">
  <div>
    <InnerBlocks />
  </div>
  <div class="relative">
    <div class="lg:absolute w-full lg:-top-[90px] lg:-right-[90px]">
      <?php if ($video) : ?>
        <div class="video-mask-container-v2 noshow lg:block">
          <div class="video-mask-overlay-v2">
            <iframe src="https://player.vimeo.com/video/<?= $video; ?>?background=1&autoplay=1&loop=1" allowfullscreen frameborder="0" class="video-iframe-v2"></iframe>
            <style>
              .video-mask-container-v2 {
                position: relative;
                width: 674px;
                height: 583px;
                overflow: hidden;
              }

              /* Video Mask Overlay with Clipping */
              .video-mask-overlay-v2 {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                clip-path: url(#clip-path-mask-video);
                -webkit-clip-path: url(#clip-path-mask-video);
              }

              /* Video iframe styling */
              .video-iframe-v2 {
                width: 100vw;
                height: 100vh;
                max-width: unset;
                object-fit: cover;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
              }
            </style>
          </div>
        <?php endif; ?>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 674 583">
          <!-- Mask for the first shape -->
          <defs>
            <mask id="mask1">
              <path fill="#fff" d="M5.35275 358.167c0 127.537 72.68665 201.817 187.30725 201.817 86.665 0 138.384-42.045 138.384-114.924 0-99.506-79.675-138.748-234.833-142.953-34.9455 0-64.2997 0-90.85825 1.402v54.658Z"></path>
            </mask>
            <mask id="mask2">
              <path fill="#fff" d="M588.321 160.907C577.629 58.5896 517.037.292236 425.556.292236c-89.106 0-147.321 51.158864-154.45 160.614764H588.321Z"></path>
            </mask>
            <?php if ($tertiary_image) : ?>
              <mask id="mask3">
                <circle cx="60.2677" cy="60.2677" r="60.2677" transform="matrix(-1 0 0 1 120.535 162.875)" fill="#fff"></circle>
              </mask>
            <?php endif; ?>
            <?php if ($secondary_image) : ?>
              <mask id="mask4">
                <circle cx="60.2677" cy="60.2677" r="60.2677" transform="matrix(-1 0 0 1 228.654 461.495)" fill="#fff"></circle>
              </mask>
            <?php endif; ?>
            <?php if ($video) : ?>
              <clipPath id="clip-path-mask-video">
                <path fill="#fff" d="M247.465 82.2639c-30.549 1.629-55.719 25.9201-58.544 56.5951-13.15 144.201 12.584 255.356 76.544 330.457 7.57 8.918 15.706 17.32 24.358 25.153l4.144 3.665c62.971 54.511 130.062 59.77 133.3 59.997l2.354.108 1.919-.156c5.121-.371 92.956-7.905 161.695-88.779 63.925-75.173 89.66-186.351 76.522-330.421-2.837-30.699-28.007-54.9901-58.521-56.6191-40.827-2.168-322.979-2.168-363.771 0Z"></path>
              </clipPath>
            <?php else : ?>
              <mask id="mask5">
                <path fill="#fff" d="M247.465 82.2639c-30.549 1.629-55.719 25.9201-58.544 56.5951-13.15 144.201 12.584 255.356 76.544 330.457 7.57 8.918 15.706 17.32 24.358 25.153l4.144 3.665c62.971 54.511 130.062 59.77 133.3 59.997l2.354.108 1.919-.156c5.121-.371 92.956-7.905 161.695-88.779 63.925-75.173 89.66-186.351 76.522-330.421-2.837-30.699-28.007-54.9901-58.521-56.6191-40.827-2.168-322.979-2.168-363.771 0Z"></path>
              </mask>
            <?php endif; ?>
          </defs>

          <!-- Shapes with masked images -->
          <?php if ($tertiary_image) : ?>
            <line y1="-0.5" x2="160.18" y2="-0.5" transform="matrix(-1 0 0 1 239.452 225.746)" stroke="#161A3D" />
          <?php endif; ?>
          <rect x="0" y="250" width="350" height="350" fill="#FFFFFF" mask="url(#mask1)"></rect>
          <?php if ($secondary_image) : ?>
            <line y1="-0.5" x2="160.18" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 295.913 402.63)" stroke="#161A3D" />
          <?php endif; ?>
          <rect x="250" y="0" width="350" height="350" fill="#FBF1D5" mask="url(#mask2)"></rect>
          <?php if ($tertiary_image) : ?>
            <image href="<?= $tertiary_image['url']; ?>" alt="<?= $tertiary_image['alt']; ?>" x="0" y="158" width="130" height="130" mask="url(#mask3)"></image>
          <?php endif; ?>
          <?php if ($secondary_image) : ?>
            <image href="<?= $secondary_image['url']; ?>" alt="<?= $secondary_image['alt']; ?>" x="104" y="456" width="130" height="130" mask="url(#mask4)"></image>
          <?php endif; ?>
          <?php if ($main_image && !$video) : ?>
            <image href="<?= $main_image['url']; ?>" alt="<?= $main_image['alt']; ?>" x="180" y="70" width="500" height="500" mask="url(#mask5)"></image>
          <?php else : ?>
            <image x="180" y="70" width="500" height="500" mask="url(#mask5)"></image>
          <?php endif; ?>
        </svg>
        <?php if ($video) : ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>