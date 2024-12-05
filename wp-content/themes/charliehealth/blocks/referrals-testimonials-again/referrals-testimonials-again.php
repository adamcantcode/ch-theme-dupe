<div>
  <h2>Real stories of hope & healing</h2>
  <div class="lg:flex mb-base5-10">
    <div class="flex flex-wrap gap-y-base5-2 gap-x-base5-5">
      <div class="flex items-center">
        <p class="mb-0 text-white">Read reviews from: </p>
      </div>
      <div class="flex items-center">
        <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-referrals-green-400"></div>
        <p class="mb-0 text-white">Provider</p>
      </div>
      <div class="flex items-center">
        <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-referrals-blue-300"></div>
        <p class="mb-0 text-white">Client</p>
      </div>
    </div>
  </div>
</div>
<div class="relative">
  <?php $referralTestimonials = get_field('referrals_testimonials'); ?>
  <?php if ($referralTestimonials) : ?>
    <div class="swiper swiper-referrals-testimonial-v2 mb-base5-10">
      <div class="swiper-wrapper">
        <?php foreach ($referralTestimonials as $referralTestimonial) : ?>
          <?php
          $type = $referralTestimonial->post_type;
          if ($type === 'testimonial') {
            $pill = 'bg-referrals-blue-300';
            $text = 'Client';
            $bg   = 'bg-gradient-to-b from-referrals-blue-100 to-referrals-blue-200';
          } else {
            $pill = 'bg-referrals-green-400';
            $text = 'Provider';
            $bg   = 'bg-gradient-to-b from-white to-referrals-green-200';
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
          <div class="!h-auto swiper-slide">
            <div class="rounded-md p-base5-6 <?= $bg; ?>">
              <div class="px-4 py-3 no-underline rounded-pill text-p-base inline-block <?= $pill; ?>"><?= $text; ?></div>
              <?php if ($pullQuote) : ?>
                <h3 class="font-heading-serif">“<?= $pullQuote; ?>”</h3>
              <?php endif; ?>
              <p><?= $fullQuote; ?></p>
              <p>—<?= $attribution ?></p>
            </div>
          </div>
        <?php endforeach;
        ?>
      </div>
    </div>
    <div class="absolute -bottom-base5-10 right-0 w-[50px]">
      <div class="absolute z-10 -left-base5-10 lg:bottom-0 swiper-button-prev-testimonial">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-base5-10">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M27.3555 31.6667L15.6888 20L27.3555 8.33332L24.9984 5.9763L10.9748 20L24.9984 34.0237L27.3555 31.6667Z" fill="white" />
        </svg>
      </div>
      <div class="absolute right-0 z-10 lg:bottom-0 swiper-button-next-testimonial">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6445 31.6667L24.3112 20L12.6445 8.33332L15.0016 5.9763L29.0252 20L15.0016 34.0237L12.6445 31.6667Z" fill="white" />
        </svg>
      </div>
    </div>
  <?php endif; ?>
</div>