<?php
$style  = get_field('style');
$group = get_field('group');
$count = get_field('count');
?>

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
              <span class="relative z-20 self-start no-underline rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 <?= $tagBGColor; ?>"><?= $age; ?> year old</span>
            <?php else : ?>
              <span class="relative z-20 self-start no-underline rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 <?= $tagBGColor; ?>">Parent of a <?= $age; ?>-year-old</span>
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
  <?php else :
  $customPosts = get_field('custom_posts');
  if ($customPosts) : ?>
    <div class="grid lg:grid-cols-3 posts-container gap-x-sp-8 gap-y-sp-10">
      <?php foreach ($customPosts['related_posts'] as $customPost) : ?>
        <?php
        if (has_post_thumbnail($customPost->ID)) {
          $featuredImageID = get_post_thumbnail_id($customPost->ID);
          $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
          $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

          $featuredImageUrl = $featuredImage[0];
          $featuredImageAltText = $featuredImageAltText ?: '';
        } else {
          $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
          $featuredImageAltText = 'Charlie Health Logo';
        }
        ?>
        <div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="<?= get_the_permalink($customPost->ID); ?>" class="stretched-link"><?= $customPost->post_title; ?></a></h3>
            <h5 class="mb-sp-4"><?= $author = get_field('by_author')->post_title ?: 'Charlile Health Editorial Team'; ?></h5>
            <div class="grid items-end justify-start grid-flow-col gap-sp-4">
              <?php $tags = get_the_terms($customPost->ID, 'post_tag'); ?>
              <?php foreach ($tags as $tag) : ?>
                <a href="<?= get_tag_link($tag->term_id); ?>" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal"><?= $tag->name; ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
<?php endif; ?>