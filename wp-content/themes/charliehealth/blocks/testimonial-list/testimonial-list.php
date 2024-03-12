<?php
$style = get_field('style');
$eyebrow = get_field('eyebrow');
$headline = get_field('headline');
$group = get_field('group')
?>
<div class="grid lg:grid-cols-[3fr_4fr] lg:mb-sp-14 mb-sp-8 gap-x-sp-4 lg:items-end">
  <div class="lg:max-w-[75%]">
    <p class="text-h4-base"><?= $eyebrow; ?></p>
    <h2 class="lg:mb-0 !mb-base5-4"><?= $headline; ?></h2>
  </div>
  <div class="lg:justify-self-end">
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
</div>
<?php if ($style === 'feed') : ?>
  <div class="relative grid items-start grid-cols-1 lg:grid-cols-3 gap-sp-8">
    <?php
    $args = array(
      'numberposts' => 3,
      'posts_per_page' => 3,
      'post_type' => 'testimonial',
    );

    if ($group) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'testimonials-group',
          'field' => 'slug',
          'terms' => $group->slug,
        )
      );
    }
    $query = new WP_Query($args);
    ?>
    <?php if ($query->have_posts()) : ?>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php
        $anonymous = get_field('anonymous', get_the_ID());
        if ($anonymous === false) {
          if (empty(get_field('title', get_the_ID()))) {
            $attribution = abbreviateAfterFirstWord(get_field('attribution', get_the_ID()));
          }
          $attribution = get_field('attribution', get_the_ID());
        } else {
          $attribution = 'Charlie Health Alum';
        }
        $pullQuote = get_field('pull-quote', get_the_ID());
        $fullQuote = get_field('full_quote', get_the_ID());
        $title     = get_field('title', get_the_ID());
        $location  = get_field('location', get_the_ID());
        $age       = get_field('age', get_the_ID());
        $group     = get_the_terms(get_the_ID(), 'testimonials-group')[0]->slug;

        switch ($group) {
          case 'young-adult':
            $tagBGColor = 'bg-young-adult';
            $name = 'Young Adult';
            break;
          case 'teen':
            $tagBGColor = 'bg-teen';
            $name = 'Teen';
            break;
          case 'parent':
            $tagBGColor = 'bg-parent';
            $name = 'Parent';
            break;
          default:
            $tagBGColor = '';
            $name = '';
            break;
        }

        ?>
        <div class="w-full rounded-[1rem] lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
          <?php if ($tagBGColor && $age) : ?>
            <span class="relative z-20 self-start no-underline rounded-pill px-sp-4 py-sp-3 text-p-base mb-sp-8 <?= $tagBGColor; ?>"><?= $name; ?></span>
          <?php endif; ?>
          <?php if ($pullQuote) : ?>
            <h3 class="text-h3-base font-heading-serif">“<?= $pullQuote; ?>.”</h3>
          <?php endif; ?>
          <p class="text-p-base noshow lg:block"><?= $fullQuote; ?></p>
          <p class="mb-0 text-p-base">—<?= $attribution; ?></p>
          <?php if ($title) : ?>
            <p class="mb-0 text-p-base"><?= $title; ?></p>
          <?php endif; ?>
          <?php if ($location) : ?>
            <p class="mb-0 text-p-base"><?= $location; ?></p>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  </div>
  <?php else :
  $customPosts = get_field('testimonials');
  $slideNum = 0;
  $showInsurance = get_field('display_insurance', $postID);
  if ($customPosts) : ?>
    <div class="relative">
      <?php if (count($customPosts) <= 3) : ?>
        <div class="relative grid items-start grid-cols-1 lg:grid-cols-3 gap-sp-8">
          <?php foreach ($customPosts as $customPost) : ?>
            <?php
            $postID = $customPost->ID;

            $anonymous = get_field('anonymous', $postID);
            if ($anonymous === false) {
              if (empty(get_field('title', $postID))) {
                $attribution = abbreviateAfterFirstWord(get_field('attribution', $postID));
              }
              $attribution = get_field('attribution', $postID);
            } else {
              $attribution = 'Charlie Health Alum';
            }
            $pullQuote     = get_field('pull-quote', $postID);
            $fullQuote     = get_field('full_quote', $postID);
            $title         = get_field('title', $postID);
            $location      = get_field('location', $postID);
            $insurance     = get_field('insurance', $postID);
            $age           = get_field('age', $postID);
            $group         = get_the_terms($postID, 'testimonials-group')[0]->slug;

            switch ($group) {
              case 'young-adult':
                $tagBGColor = 'bg-young-adult';
                $name = 'Young Adult';
                break;
              case 'teen':
                $tagBGColor = 'bg-teen';
                $name = 'Teen';
                break;
              case 'parent':
                $tagBGColor = 'bg-parent';
                $name = 'Parent';
                break;
              default:
                $tagBGColor = '';
                $name = '';
                break;
            }

            ?>
            <div class="w-full rounded-[1rem] lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
              <?php if ($tagBGColor && $age) : ?>
                <span class="relative z-20 self-start no-underline rounded-pill px-sp-4 py-sp-3 text-p-base mb-sp-8 <?= $tagBGColor; ?>"><?= $name; ?></span>
              <?php endif; ?>
              <?php if ($pullQuote) : ?>
                <p class="text-h3-base font-heading-serif">“<?= $pullQuote; ?>.”</p>
              <?php endif; ?>
              <p class="text-p-base noshow lg:block"><?= $fullQuote; ?></p>
              <div class="relative overflow-hidden transition-all duration-1000 max-h-0 collapsible-content-wrapper lg:noshow">
                <p class="text-p-base"><?= $fullQuote; ?></p>
                <div class="absolute bottom-0 flex justify-center w-full bg-white">
                  <a role="button" class="z-10 normal-case ch-button button-secondary toggle-button-testimonial mb-base5-4">View full quote</a>
                </div>
              </div>
              <?php if ($showInsurance && $insurance) : ?>
                <p class="mb-0 text-p-base">—<?= $attribution; ?>, <?= $insurance; ?> member</p>
              <?php else : ?>
                <p class="mb-0 text-p-base">—<?= $attribution; ?></p>
              <?php endif; ?>
              <?php if ($title) : ?>
                <p class="mb-0 text-p-base"><?= $title; ?></p>
              <?php endif; ?>
              <?php if ($location) : ?>
                <p class="mb-0 text-p-base"><?= $location; ?></p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if (count($customPosts) > 3) : ?>
        <div class="relative lg:mx-sp-16">
          <div class="swiper swiper-testimonial-carousel">
            <div class=" <?= is_admin() ? 'grid items-start grid-cols-1 lg:grid-cols-3 gap-sp-8' : 'swiper-wrapper'; ?>">
              <?php foreach ($customPosts as $customPost) : ?>
                <?php
                $postID = $customPost->ID;
                $slideNum++;

                $anonymous = get_field('anonymous', $postID);
                if ($anonymous === false) {
                  if (empty(get_field('title', $postID))) {
                    $attribution = abbreviateAfterFirstWord(get_field('attribution', $postID));
                  }
                  $attribution = get_field('attribution', $postID);
                } else {
                  $attribution = 'Charlie Health Alum';
                }
                $pullQuote = get_field('pull-quote', $postID);
                $fullQuote = get_field('full_quote', $postID);
                $title     = get_field('title', $postID);
                $location  = get_field('location', $postID);
                $age       = get_field('age', $postID);
                $group     = get_the_terms($postID, 'testimonials-group')[0]->slug;

                switch ($group) {
                  case 'young-adult':
                    $tagBGColor = 'bg-young-adult';
                    $name = 'Young Adult';
                    break;
                  case 'teen':
                    $tagBGColor = 'bg-teen';
                    $name = 'Teen';
                    break;
                  case 'parent':
                    $tagBGColor = 'bg-parent';
                    $name = 'Parent';
                    break;
                  default:
                    $tagBGColor = '';
                    $name = '';
                    break;
                }

                ?>
                <div class="!h-auto swiper-slide">
                  <div class="w-full rounded-[1rem] lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col <?= is_admin() && $slideNum > 3 ? 'noshow' : ''; ?>">
                    <?php if ($tagBGColor && $age) : ?>
                      <span class="relative z-20 self-start no-underline rounded-pill px-sp-4 py-sp-3 text-p-base mb-sp-8 <?= $tagBGColor; ?>"><?= $name; ?></span>
                    <?php endif; ?>
                    <?php if ($pullQuote) : ?>
                      <p class="text-h3-base font-heading-serif">“<?= $pullQuote; ?>.”</p>
                    <?php endif; ?>
                    <p class="text-p-base"><?= $fullQuote; ?></p>
                    <p class="mb-0 text-p-base">—<?= $attribution; ?></p>
                    <?php if ($title) : ?>
                      <p class="mb-0 text-p-base"><?= $title; ?></p>
                    <?php endif; ?>
                    <?php if ($location) : ?>
                      <p class="mb-0 text-p-base"><?= $location; ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="!relative swiper-pagination !bottom-0 p-sp-4"></div>
          </div>
        </div>
        <div class="absolute inset-0 w-full h-full noshow lg:block">
          <div class="absolute -translate-y-1/2 swiper-button-prev-arrow-carousel top-[calc(50%-26px)] left-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
              <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
              <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
            </svg>
          </div>
          <div class="absolute -translate-y-1/2 swiper-button-next-arrow-carousel top-[calc(50%-26px)] right-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
              <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
              <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
            </svg>
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
<?php endif; ?>