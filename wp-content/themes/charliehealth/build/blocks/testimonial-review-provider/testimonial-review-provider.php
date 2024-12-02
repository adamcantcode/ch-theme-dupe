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
        <p class="mb-0">Client</p>
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
    $args = array(
      'post_type'      => array('testimonial', 'provider-testimonial'),
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
          'name'       => get_field('attribution', $id) ?: get_the_title($id),
          'title'      => get_field('title', $id),
          'pull-quote' => get_field('pull-quote', $id),
          'full_quote' => get_field('full_quote', $id),
          'type'       =>  get_post_type($id),
        );
      endwhile;
      shuffle($rows);

    ?>
      <div class="masonry-js">
        <div class="lg:w-[calc(50%-16px)] opacity-0 scale-95 w-full grid-sizer"></div>
        <?php foreach ($rows as $row) :  ?>
          <?php
          $count++;

          if ($row['type'] === 'testimonial') {
            $tagBGColor = 'bg-referrals-blue-300';
            $type = 'Client';
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
    <?php endif;
    wp_reset_postdata(); ?>
  <?php else : ?>
    <div class="grid items-center justify-center w-full h-full bg-darker-blue">
      <code class="text-white">NOT VISIBLE IN EDITOR -- CHECK PREVIEW</code>
    </div>
  <?php endif; ?>
  <div class="grid lg:col-start-2">
    <a role="button" class="w-full ch-button button-secondary-ch justify-self-center lg:w-auto load-more-js">Load more</a>
  </div>
</div>