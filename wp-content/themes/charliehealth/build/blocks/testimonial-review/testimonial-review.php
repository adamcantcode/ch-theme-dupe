<div>
  <div class="grid lg:grid-cols-[1fr,2fr] grid-cols-1 relative gap-sp-8">
    <div class="lg:sticky self-start top-[8rem]">
      <p class="lg:text-[9.5rem] font-heading-serif leading-tight mb-0">91%</p>
      <p class="leading-tight">of clients would recommend Charlie Health to a friend or loved one.</p>
      <p class="leading-tight">read about it -></p>
    </div>
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
          $attribution = get_field('attribution', get_the_ID());
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
          <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-[1rem] p-sp-8 testimonial-item bg-white flex flex-col<?= $count > 6 ? ' noshow' : ''; ?>">
            <?php if ($tagBGColor && $age) : ?>
              <?php if ($group !== 'parent') : ?>
                <span class="relative z-20 self-start no-underline rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 php <?= $tagBGColor; ?> "><?= $age; ?> year old</span>
                <?php else : ?>
                  <span class="relative z-20 self-start no-underline rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 php <?= $tagBGColor; ?> ">Parent of a <?= $age; ?>-year-old</span>
              <?php endif; ?>
            <?php endif; ?>
            <?php if ($pullQuote) : ?>
              <h3 class="leading-tight mb-sp-2 lg:text-[2rem]">“<?= $pullQuote; ?>”</h3>
            <?php endif; ?>
            <p class="leading-snug mb-sp-8"><?= $fullQuote; ?></p>
            <p class="mb-0">—<?= $attribution; ?></p>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
    <div class="grid lg:col-start-2">
      <a role="button" class="ch-button button-secondary justify-self-center load-more-js">Load more</a>
    </div>
  </div>
</div>