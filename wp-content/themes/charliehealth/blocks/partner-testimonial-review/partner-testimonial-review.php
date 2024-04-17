  <?php
  $stat = get_field('stat');
  $statDetails = get_field('stat_details');
  $link = get_field('link');
  ?>

  <div class="grid lg:grid-cols-[1fr,2fr] grid-cols-1 relative lg:gap-x-sp-8">
    <div class="lg:sticky self-start top-[8rem]">
      <p class="text-h1-base"><?= $stat ?></p>
      <div class="grid items-start grid-cols-2 gap-4 lg:block">
        <p class="text-h4-base lg:max-w-[255px]"><?= $statDetails; ?></p>
        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="ch-button button-secondary lg:mt-base5-4"><?= $link['title']; ?></a>
      </div>
    </div>
    <?php if (!is_admin()) : ?>
      <div class="masonry-js">
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full grid-sizer"></div>
        <?php
        $args = array(
          'numberposts' => -1,
          'posts_per_page' => -1,
          'post_type' => 'partner-testimonial',
        );
        $query = new WP_Query($args);
        ?>
        <?php if ($query->have_posts()) : ?>
          <?php
          $count = 0;
          ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php
            $count++;
            $attribution = get_field('attribution', get_the_ID()) ?: get_the_title(get_the_ID());
            $attribution = abbreviateAfterFirstWord(get_field('attribution', get_the_ID()));
            $pullQuote   = get_field('pull-quote', get_the_ID());
            $fullQuote   = get_field('full_quote', get_the_ID());
            ?>
            <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col<?= $count > 6 ? ' noshow' : ''; ?>">
              <?php if ($pullQuote) : ?>
                <p class="text-h3-base font-heading-serif">“<?= $pullQuote; ?>.”</p>
              <?php endif; ?>
              <p class="text-p-base"><?= $fullQuote; ?></p>
              <p class="text-p-base">—<?= $attribution; ?></p>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
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