  <?php
  $stat = get_field('stat');
  $statDetails = get_field('stat_details');
  $link = get_field('link');
  ?>

  <div class="lg:pb-sp-16 pb-sp-6 noshow lg:grid">
    <div class="flex items-center justify-self-end">
      <p class="inline-block mb-0">Read reviews from:</p>
      <div class="h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-circle bg-teen"></div>
      <p class="mb-0">Teens</p>
      <div class="h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-circle bg-young-adult"></div>
      <p class="mb-0">Young Adults</p>
      <div class="h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-circle bg-parent"></div>
      <p class="mb-0">Parents</p>
    </div>
  </div>
  <div class="grid lg:grid-cols-[1fr,2fr] grid-cols-1 relative lg:gap-x-sp-8">
    <div class="lg:sticky self-start top-[8rem]">
      <p class="font-heading-serif text-h1-display lg:text-h1-display-lg"><?= $stat ?></p>
      <div class="grid items-start grid-cols-2 gap-4 lg:block mb-base5-4">
        <p class="text-h4-base lg:max-w-[250px]"><?= $statDetails; ?></p>
        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="ch-button button-secondary"><?= $link['title']; ?></a>
      </div>
    </div>
    <?php if (!is_admin()) : ?>
      <div class="masonry-js">
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full grid-sizer"></div>
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
          <span class="relative z-20 self-start no-underline rounded-pill px-sp-4 py-sp-3 text-p-base mb-sp-8 bg-lavender-300">corporate</span>
          <h3 class="mb-0">Joe Smith</h3>
          <p>Senior Really Cool Job</p>
          <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/945983486?loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
          <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
          <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/945983486?loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
          <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
          <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/945983486?loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
          <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
          <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/945983486?loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
          <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
          <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/945983486?loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
          <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
      </div>
    <?php else : ?>
      <div class="grid items-center justify-center w-full h-full bg-darker-blue">
        <code class="text-white">NOT VISIBLE IN EDITOR -- CHECK PREVIEW</code>
      </div>
    <?php endif; ?>
    <div class="grid lg:col-start-2 lg:justify-end">
      <a role="button" class="w-full ch-button button-secondary justify-self-center lg:w-auto load-more-js">Load more</a>
    </div>
  </div>