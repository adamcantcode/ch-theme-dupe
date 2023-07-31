<?php
$style = get_field('style');
$eyebrow = get_field('eyebrow');
$headline = get_field('headline');
$group = get_field('group')
?>
<div class="grid lg:grid-cols-[3fr_4fr] lg:mb-sp-14 mb-sp-8 gap-x-sp-4 lg:items-end">
  <div>
    <h5><?= $eyebrow; ?></h5>
    <h2 class="lg:mb-0"><?= $headline; ?></h2>
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
        <div class="w-full rounded-[1rem] lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
          <?php if ($tagBGColor && $age) : ?>
            <?php if ($group !== 'parent') : ?>
              <span class="relative z-20 self-start no-underline rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 <?= $tagBGColor; ?>"><?= $age; ?>-year-old</span>
            <?php else : ?>
              <span class="relative z-20 self-start no-underline rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 <?= $tagBGColor; ?>">Parent of a <?= $age; ?>-year-old</span>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($pullQuote) : ?>
            <h3 class="leading-tight mb-sp-2 lg:text-[2rem]">“<?= $pullQuote; ?>.”</h3>
          <?php endif; ?>
          <p class="leading-snug mb-sp-8"><?= $fullQuote; ?></p>
          <p class="mb-0">—<?= $attribution; ?></p>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  </div>
  <?php else :
  $customPosts = get_field('testimonials');
  if ($customPosts) : ?>
    <div class="relative grid items-start grid-cols-1 lg:grid-cols-3 gap-sp-8">
      <?php foreach ($customPosts as $customPost) : ?>
        <?php
        $postID = $customPost->ID;

        $anonymous = get_field('anonymous', $postID);
        if ($anonymous === false) {
          $attribution = get_field('attribution', $postID);
        } else {
          $attribution = 'Anonymous';
        }
        $pullQuote = get_field('pull-quote', $postID);
        $fullQuote = get_field('full_quote', $postID);
        $age = get_field('age', $postID);
        $group = get_the_terms($postID, 'testimonials-group')[0]->slug;

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
        <div class="w-full rounded-[1rem] lg:p-sp-8 p-sp-6 testimonial-item bg-white flex flex-col">
          <?php if ($tagBGColor && $age) : ?>
            <?php if ($group !== 'parent') : ?>
              <span class="relative z-20 self-start no-underline rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 <?= $tagBGColor; ?>"><?= $age; ?>-year-old</span>
            <?php else : ?>
              <span class="relative z-20 self-start no-underline rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 <?= $tagBGColor; ?>">Parent of a <?= $age; ?>-year-old</span>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($pullQuote) : ?>
            <h3 class="leading-tight mb-sp-2 lg:text-[2rem]">“<?= $pullQuote; ?>.”</h3>
          <?php endif; ?>
          <p class="leading-snug mb-sp-8"><?= $fullQuote; ?></p>
          <p class="mb-0">—<?= $attribution; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
<?php endif; ?>