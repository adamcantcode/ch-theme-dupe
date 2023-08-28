  <?php
  $stat = get_field('stat');
  $statDetails = get_field('stat_details');
  $link = get_field('link');
  ?>

  <!-- <div class="lg:pb-sp-16 pb-sp-6 noshow lg:grid">
    <div class="flex items-center justify-self-end">
      <p class="inline-block mb-0">Read reviews from:</p>
      <div class="h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-[50%] bg-teen"></div><p class="mb-0">Teens</p>
      <div class="h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-[50%] bg-young-adult"></div><p class="mb-0">Young Adults</p>
      <div class="h-sp-3 w-sp-3 mr-sp-2 ml-sp-8 rounded-[50%] bg-parent"></div><p class="mb-0">Parents</p>
    </div>
  </div> -->
  <div class="grid lg:grid-cols-[1fr,2fr] grid-cols-1 relative lg:gap-x-sp-8">
    <div class="lg:sticky self-start top-[8rem]">
      <p class="lg:text-[9.5rem] text-[4rem] font-heading-serif leading-tight mb-0"><?= $stat ?></p>
      <div class="grid items-start grid-cols-2 gap-4 lg:block">
        <p class="leading-[1.4] lg:max-w-[250px]"><?= $statDetails; ?></p>
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
              $attribution = get_field('attribution', get_the_ID());
            } else {
              $attribution = 'Anonymous';
            }
            $pullQuote = get_field('pull-quote', get_the_ID());
            $fullQuote = get_field('full_quote', get_the_ID());
            $age = get_field('age', get_the_ID());
            $group = get_the_terms(get_the_ID(), 'testimonials-group')[0]->slug;

            switch ($group) {
              case 'young-adult':
                $tagBGColor = 'bg-young-adult';
                break;
              case 'teen':
                $tagBGColor = 'bg-teen';
                break;
              case 'parent':
                $tagBGColor = 'bg-parent';
                break;
              default:
                $tagBGColor = '';
                break;
            }

            ?>
            <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-[1rem] lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col<?= $count > 6 ? ' noshow' : ''; ?>">
              <?php if ($pullQuote) : ?>
                <h3 class="leading-tight mb-sp-2 lg:text-[2rem]">“<?= $pullQuote; ?>.”</h3>
              <?php endif; ?>
              <p class="leading-[1.4] mb-sp-8"><?= $fullQuote; ?></p>
              <p class="mb-0">—<?= $attribution; ?></p>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>
    <?php else : ?>
      <div class="grid items-center justify-center w-full h-full bg-darker-blue">
        <code class="text-white">NOT VISIBLE IN EDITOR -- CHECK PREVIEW</code>
      </div>
    <?php endif; ?>
    <div class="grid lg:col-start-2">
      <a role="button" class="w-full ch-button button-secondary justify-self-center lg:w-auto load-more-js">Load more</a>
    </div>
  </div>