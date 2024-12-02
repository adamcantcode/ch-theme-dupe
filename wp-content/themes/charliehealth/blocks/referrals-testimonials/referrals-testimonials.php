<div class="lg:ml-[300px] mb-base5-10 relative z-10">
  <h2>Real stories of hope & healing</h2>
  <div class="lg:flex">
    <div class="flex flex-wrap gap-y-base5-2 gap-x-base5-5">
      <div class="flex items-center">
        <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-referrals-green-400"></div>
        <p class="mb-0">Provider</p>
      </div>
      <div class="flex items-center">
        <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-referrals-blue-300"></div>
        <p class="mb-0">Client</p>
      </div>
    </div>
  </div>
</div>
<div class="h-[1px] bg-primary relative left-1/2 w-screen -ml-[50vw]">
</div>
<div class="absolute -left-[155px] top-base5-10 z-10 noshow lg:block">
  <div class="video-mask-container">
    <div class="video-mask-overlay">
      <iframe src="https://player.vimeo.com/video/1031203133?background=1&autoplay=1&loop=1" allowfullscreen frameborder="0" class="video-iframe"></iframe>
    </div>

    <svg width="384" height="376" viewBox="0 0 384 376">
      <defs>
        <clipPath id="clip-path-mask" clipPathUnits="objectBoundingBox">
          <path d="M0.87,0.003C0.93,0.003,0.985,0.057,0.99,0.12C1,0.423,0.964,0.655,0.835,0.812C0.819,0.831,0.801,0.849,0.785,0.866C0.647,0.987,0.51,0.998,0.504,0.999L0.5,1L0.495,0.999C0.486,0.997,0.306,0.983,0.164,0.812C0.033,0.654,-0.019,0.423,0.006,0.12C0.011,0.057,0.068,0.003,0.13,0.003C0.215,0,0.788,0,0.87,0.003Z" />
        </clipPath>
      </defs>
    </svg>
  </div>

  <style>
    .video-mask-container {
      position: relative;
      width: 384px;
      height: 376px;
      overflow: hidden;
    }

    /* Video Mask Overlay with Clipping */
    .video-mask-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      clip-path: url(#clip-path-mask);
      -webkit-clip-path: url(#clip-path-mask);
    }

    /* Video iframe styling */
    .video-iframe {
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
  <script>
    // Select the element whose parent you want to modify
    const element = document.querySelector('.video-mask-container').parentElement;

    // Set the parent element to position relative
    if (element.parentElement) {
      element.parentElement.style.position = 'relative';
    }
  </script>
</div>
<div class="relative lg:ml-[300px] lg:mb-[130px] mb-base5-10">
  <?php $referralTestimonials = get_field('referrals_testimonials'); ?>
  <?php if ($referralTestimonials) : ?>
    <div class="!overflow-visible swiper swiper-referrals-testimonial">
      <div class="swiper-wrapper">
        <?php foreach ($referralTestimonials as $referralTestimonial) : ?>
          <?php
          $type = $referralTestimonial->post_type;
          if ($type === 'testimonial') {
            $type = '7E87E4';
          } else {
            $type = '8AB682';
          }
          $postID = $referralTestimonial->ID;

          $anonymous = get_field('anonymous', $postID);
          if ($anonymous === false) {
            $attribution = get_field('attribution', $postID) ?: abbreviateAfterFirstWord(get_the_title($postID));
          } else {
            $attribution = 'Charlie Health Provider';
          }
          $pullQuote     = get_field('pull-quote', $postID);
          $fullQuote     = get_field('full_quote', $postID);
          ?>
          <div class="!h-auto swiper-slide pt-base5-6">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 -translate-y-1/2">
              <circle cx="7.5" cy="7.5" r="7.5" fill="#<?= $type ?>" />
            </svg>
            <?php if ($pullQuote) : ?>
              <h3 class="font-heading-serif">“<?= $pullQuote; ?>”</h3>
            <?php endif; ?>
            <p><?= $fullQuote; ?></p>
            <p>—<?= $attribution ?></p>
          </div>
        <?php endforeach;
        ?>
      </div>
    </div>
    <div class="absolute -bottom-base5-5 right-0 w-[50px]">
      <div class="absolute left-0 z-10 lg:bottom-0 swiper-button-prev-testimonial">
        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
        </svg>
      </div>
      <div class="absolute right-0 z-10 lg:bottom-0 swiper-button-next-testimonial">
        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
        </svg>
      </div>
    </div>
  <?php endif; ?>
</div>