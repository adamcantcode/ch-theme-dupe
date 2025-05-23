<div class="lg:pb-base5-10 pb-sp-6 grid lg:grid-cols-[1fr_2fr] grid-cols-1 relative">
  <div></div>
  <div class="lg:flex">
    <p class="flex-none mb-0 ml-auto mr-base5-10">Read reviews from:</p>
    <div class="flex flex-wrap gap-y-base5-2 gap-x-base5-5">
      <div class="flex items-center">
        <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-referrals-green-400"></div>
        <p class="mb-0">Provider</p>
      </div>
      <div class="flex items-center">
        <div class="flex-[0_0_auto] h-sp-3 w-sp-3 mr-sp-2 rounded-circle bg-referrals-blue-300"></div>
        <p class="mb-0">Alumni</p>
      </div>
    </div>
  </div>
</div>
<div class="grid lg:grid-cols-[1fr_2fr] grid-cols-1 relative lg:gap-x-sp-8">
  <div class="lg:sticky self-start top-[8rem]">
    <InnerBlocks />
  </div>
  <?php if (!is_admin()) : ?>
    <?php
    // Query for 'testimonial' posts
    // Query for 'testimonial' posts
    $args_testimonial = array(
      'post_type'      => 'testimonial',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
    );
    $query_testimonial = new WP_Query($args_testimonial);

    // Query for 'partner-testimonial' posts
    $args_partner_testimonial = array(
      'post_type'      => 'partner-testimonial',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
    );
    $query_partner_testimonial = new WP_Query($args_partner_testimonial);

    $featured_rows = array();
    $testimonial_rows = array();
    $partner_testimonial_rows = array();

    // Collect 'testimonial' posts into an array
    if ($query_testimonial->have_posts()) :
      while ($query_testimonial->have_posts()) : $query_testimonial->the_post();
        $id = get_the_ID();
        $data = array(
          'name'       => get_field('attribution', $id) ?: get_the_title($id),
          'title'      => get_field('title', $id),
          'pull-quote' => get_field('pull-quote', $id),
          'full_quote' => get_field('full_quote', $id),
          'type'       => get_post_type($id),
        );

        if (get_field('feature_on_reviews_page', $id)) {
          $featured_rows[] = $data;
        } else {
          $testimonial_rows[] = $data;
        }
      endwhile;
    endif;

    // Collect 'partner-testimonial' posts into an array
    if ($query_partner_testimonial->have_posts()) :
      while ($query_partner_testimonial->have_posts()) : $query_partner_testimonial->the_post();
        $id = get_the_ID();
        $data = array(
          'name'       => get_field('attribution', $id) ?: get_the_title($id),
          'title'      => get_field('title', $id),
          'pull-quote' => get_field('pull-quote', $id),
          'full_quote' => get_field('full_quote', $id),
          'type'       => get_post_type($id),
        );

        if (get_field('feature_on_reviews_page', $id)) {
          $featured_rows[] = $data;
        } else {
          $partner_testimonial_rows[] = $data;
        }
      endwhile;
    endif;

    // Shuffle the non-featured arrays
    shuffle($testimonial_rows);
    shuffle($partner_testimonial_rows);

    // Merge and alternate the two arrays
    $merged_rows = array();
    $testimonial_count = count($testimonial_rows);
    $partner_count = count($partner_testimonial_rows);
    $max_count = max($testimonial_count, $partner_count);

    for ($i = 0; $i < $max_count; $i++) {
      if (isset($testimonial_rows[$i])) {
        $merged_rows[] = $testimonial_rows[$i];
      }
      if (isset($partner_testimonial_rows[$i])) {
        $merged_rows[] = $partner_testimonial_rows[$i];
      }
    }

    // Final output: Featured testimonials first, then shuffled non-featured
    $final_rows = array_merge($featured_rows, $merged_rows);

    ?>

    <?php if (!empty($final_rows)) : ?>
      <div class="masonry-js">
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full grid-sizer"></div>
        <?php $count = 0; ?>
        <?php foreach ($final_rows as $row) : ?>
          <?php
          $count++;

          // Set background color and type based on post type
          if ($row['type'] === 'testimonial') {
            $tagBGColor = 'bg-referrals-blue-300';
            $type = 'Alumni';
          } else {
            $tagBGColor = 'bg-referrals-green-400';
            $type = 'Provider';
          }
          ?>
          <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full mb-sp-8 rounded-lg lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col<?= $count > 6 ? ' noshow' : ''; ?>">
            <span class="relative z-20 self-start no-underline rounded-pill px-sp-4 py-sp-3 text-p-base mb-sp-8 <?= $tagBGColor; ?>"><?= $type; ?></span>
            <?php if ($row['pull-quote']) : ?>
              <h3 class="font-heading-serif">“<?= $row['pull-quote']; ?>”</h3>
            <?php endif; ?>
            <?php if ($row['full_quote']) : ?>
              <p>“<?= $row['full_quote']; ?>”</p>
            <?php endif; ?>
            <p>—<?= $row['name']; ?></p>
            <?php if ($row['title']) : ?>
              <p><?= $row['title']; ?></p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  <?php else : ?>
    <div class="grid items-center justify-center w-full h-full bg-darker-blue">
      <code class="text-white">NOT VISIBLE IN EDITOR -- CHECK PREVIEW</code>
    </div>
  <?php endif; ?>
  <div class="grid lg:col-start-2">
    <a role="button" class="w-full ch-button button-secondary-ch justify-self-center lg:w-auto load-more-js">Load more</a>
  </div>
</div>