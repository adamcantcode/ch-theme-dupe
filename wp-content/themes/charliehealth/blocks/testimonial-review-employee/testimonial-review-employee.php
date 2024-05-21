  <?php
  $stat         = get_field('stat');
  $statDetails  = get_field('stat_details');
  $link         = get_field('link');
  ?>

  <div class="lg:pb-sp-16 pb-sp-6 noshowlg: grid lg:grid-cols-[1fr_2fr] grid-cols-1 relative lg:gap-x-sp-8">
    <div></div>
    <div class="flex">
      <p class="flex-none mb-0">Read reviews from:</p>
      <div class="flex flex-wrap gap-x-sp-8">
        <div class="flex items-center">
          <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-circle bg-pale-blue-300"></div>
          <p class="mb-0">Corporate</p>
        </div>
        <div class="flex items-center">
          <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-circle bg-lavender-300"></div>
          <p class="mb-0">Behavioral Health Operations</p>
        </div>
        <div class="flex items-center">
          <div class="flex-[0_0_auto] bg-yellow-300 h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-circle"></div>
          <p class="mb-0">Tech</p>
        </div>
        <div class="flex items-center">
          <div class="flex-[0_0_auto] bg-orange-200 h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-circle"></div>
          <p class="mb-0">Clinical</p>
        </div>
        <div class="flex items-center">
          <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-circle bg-grey-deactivated"></div>
          <p class="mb-0">Clinical Outreach</p>
        </div>
      </div>
    </div>
  </div>
  <div class="grid lg:grid-cols-[1fr_2fr] grid-cols-1 relative lg:gap-x-sp-8">
    <div class="lg:sticky self-start top-[8rem]">
      <p class="text-h1-base"><?= $stat ?></p>
      <div class="grid items-start grid-cols-2 gap-4 lg:block mb-base5-4">
        <p class="text-h4-base lg:max-w-[250px]"><?= $statDetails; ?></p>
        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="ch-button button-secondary"><?= $link['title']; ?></a>
      </div>
    </div>
    <?php if (!is_admin()) : ?>
      <?php if (have_rows('testimonials')) : ?>
        <div class="masonry-js">
          <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full grid-sizer"></div>
          <?php while (have_rows('testimonials')) : the_row(); ?>
            <?php
            $team = get_sub_field('team');
            $name = get_sub_field('name');
            $title = get_sub_field('title');
            $video = get_sub_field('video_code');
            $quote = get_sub_field('quote');
            ?>
            <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
              <span class="relative z-20 self-start no-underline rounded-pill px-sp-4 py-sp-3 text-p-base mb-sp-8 bg-lavender-300"><?= $team; ?></span>
              <h3 class="mb-0"><?= $name; ?></h3>
              <p><?= $title; ?></p>
              <?php if ($video) : ?>
                <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/<?= $video; ?>?loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
                <script src="https://player.vimeo.com/api/player.js"></script>
              <?php endif; ?>
              <?php if ($quote) : ?>
                <h3>“<?= substr($quote, -1) !== '.' ? $quote .= '.' : $quote; ?>”</h3>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    <?php else : ?>
      <div class="grid items-center justify-center w-full h-full bg-darker-blue">
        <code class="text-white">NOT VISIBLE IN EDITOR -- CHECK PREVIEW</code>
      </div>
    <?php endif; ?>
    <div class="grid lg:col-start-2 lg:justify-end">
      <a role="button" class="w-full ch-button button-secondary justify-self-center lg:w-auto load-more-js">Load more</a>
    </div>
  </div>