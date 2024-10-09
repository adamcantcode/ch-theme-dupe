  <?php
  $stat         = get_field('stat');
  $statDetails  = get_field('stat_details');
  $link         = get_field('link');
  ?>

  <div class="lg:pb-base5-10 pb-sp-6 grid lg:grid-cols-[1fr_2fr] grid-cols-1 relative">
    <div></div>
    <div class="lg:flex">
      <p class="flex-none mb-0 mr-base5-10">Read reviews from:</p>
      <div class="flex flex-wrap gap-y-base5-2 gap-x-base5-5">
        <div class="flex items-center">
          <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-pale-blue-300"></div>
          <p class="mb-0">Corporate</p>
        </div>
        <div class="flex items-center">
          <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-lavender-300"></div>
          <p class="mb-0">Behavioral Health Operations</p>
        </div>
        <div class="flex items-center">
          <div class="flex-[0_0_auto] bg-yellow-300 h-sp-3 w-sp-3 mr-sp-2 rounded-circle"></div>
          <p class="mb-0">Tech</p>
        </div>
        <div class="flex items-center">
          <div class="flex-[0_0_auto] bg-orange-200 h-sp-3 w-sp-3 mr-sp-2 rounded-circle"></div>
          <p class="mb-0">Clinical</p>
        </div>
        <div class="flex items-center">
          <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-grey-demension"></div>
          <p class="mb-0">Clinical Outreach</p>
        </div>
      </div>
    </div>
  </div>
  <div class="grid lg:grid-cols-[1fr_2fr] grid-cols-1 relative lg:gap-x-sp-8">
    <div class="lg:sticky self-start top-[8rem]">
      <p class="lg:text-h1-display text-h1-base"><?= $stat ?></p>
      <div class="grid items-start gap-4 lg:grid-cols-2 lg:block lg:mb-0 mb-base5-4">
        <?php if ($statDetails) : ?>
          <p class="text-h4-base lg:max-w-[250px]"><?= $statDetails; ?></p>
        <?php endif; ?>
        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="ch-button button-secondary"><?= $link['title']; ?></a>
      </div>
    </div>
    <?php if (!is_admin()) : ?>
      <?php
      $args = array(
        'post_type'      => 'employee-testimonial',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) :
        $count = 0;
        $rows = array();

        // Loop through the posts and collect them into an array
        while ($query->have_posts()) : $query->the_post();
          $id     = get_the_ID();
          $rows[] = array(
            'name'       => get_the_title($id),
            'team'       => get_field('team', $id),
            'title'      => get_field('title', $id),
            'vimeo_url'  => preg_replace('/\D/', '', get_field('vimeo_url', $id)),
            'pull_quote' => get_field('pull_quote', $id),
            'reviews_page_display' => get_field('reviews_page_display', $id),
          );
        endwhile;
        shuffle($rows);

      ?>
        <div class="masonry-js">
          <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full grid-sizer"></div>
          <?php foreach ($rows as $row) :  ?>
            <?php
            $count++;

            switch ($row['team']) {
              case 'Corporate':
                $tagBGColor = 'bg-pale-blue-300';
                break;
              case 'Behavioral Health Operations':
                $tagBGColor = 'bg-lavender-300';
                break;
              case 'Tech':
                $tagBGColor = 'bg-yellow-300';
                break;
              case 'Clinical':
                $tagBGColor = 'bg-orange-200';
                break;
              case 'Clinical Outreach':
                $tagBGColor = 'bg-grey-demension';
                break;
              default:
                $tagBGColor = '';
                break;
            }
            ?>
            <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col<?= $count > 6 ? ' noshow' : ''; ?>">
              <span class="relative z-20 self-start no-underline rounded-pill px-sp-4 py-sp-3 text-p-base mb-sp-8 <?= $tagBGColor; ?>"><?= $row['team']; ?></span>
              <?php if ($row['pull_quote']  && ($row['reviews_page_display'] === 'Quote' || $row['reviews_page_display'] === 'Both')) : ?>
                <h3 class="font-heading-serif">“<?= substr($row['pull_quote'], -1) !== '.' ? $row['pull_quote'] .= '.' : $row['pull_quote']; ?>”</h3>
              <?php endif; ?>
              <?php if ($row['vimeo_url'] && ($row['reviews_page_display'] === 'Video' || $row['reviews_page_display'] === 'Both')) : ?>
                <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/<?= $row['vimeo_url']; ?>?loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
                <script src="https://player.vimeo.com/api/player.js"></script>
              <?php endif; ?>
              <h4 class="mb-0"><?= $row['name']; ?></h4>
              <p><?= $row['title']; ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif;
      wp_reset_postdata(); ?>
    <?php else : ?>
      <div class="grid items-center justify-center w-full h-full bg-darker-blue">
        <code class="text-white">NOT VISIBLE IN EDITOR -- CHECK PREVIEW</code>
      </div>
    <?php endif; ?>
    <div class="grid lg:col-start-2">
      <a role="button" class="w-full ch-button button-secondary justify-self-center lg:w-auto load-more-js">Load more</a>
    </div>
  </div>