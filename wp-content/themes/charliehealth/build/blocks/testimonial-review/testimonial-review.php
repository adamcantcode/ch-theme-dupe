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
        <?php
        $args = array(
          'numberposts' => -1,
          'posts_per_page' => -1,
          'post_type' => 'testimonial',
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
            $anonymous = get_field('anonymous', get_the_ID());
            if ($anonymous === false) {
              $attribution = get_field('attribution', get_the_ID()) ?: abbreviateAfterFirstWord(get_the_title(get_the_ID()));
            } else {
              $attribution = 'Charlie Health Alum';
            }
            $pullQuote = get_field('pull-quote', get_the_ID());
            $fullQuote = get_field('full_quote', get_the_ID());
            $age = get_field('age', get_the_ID());
            $group = null;
            if (get_the_terms(get_the_ID(), 'testimonials-group')) {
              $group = get_the_terms(get_the_ID(), 'testimonials-group')[0]->slug;
            }

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
            <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col<?= $count > 6 ? ' noshow' : ''; ?>">
              <?php if ($tagBGColor && $age) : ?>
                <span class="relative z-20 self-start no-underline rounded-pill px-sp-4 py-sp-3 text-p-base mb-sp-8 <?= $tagBGColor; ?>"><?= $name; ?></span>
              <?php endif; ?>
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