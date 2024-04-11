<h2 class="text-h4-base font-heading mb-base5-6">Charlie Health in the news</h2>
<div class="grid lg:grid-cols-4 gap-sp-5">
  <?php
  $args = array(
    'post_type'      => 'press',
    'posts_per_page' => 4,
    'numberposts'    => 4,
    'meta_key'       => 'date',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
    'tax_query'      => array(
      array(
        'taxonomy' => 'press-type',
        'field'    => 'slug',
        'terms'    => 'expert-opinion',
      ),
    ),
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
      global $post;
      if (has_post_thumbnail($post->ID)) {
        $featuredImageID = get_post_thumbnail_id($post->ID);
        $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
        $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

        $featuredImageUrl = $featuredImage[0];
        $featuredImageAltText = $featuredImageAltText ?: '';
      } else {
        $featuredImageUrl = placeHolderImage(600, 800);
        $featuredImageAltText = 'place holder image';
      }
      $link = get_field('link', $post->ID);
      $date = get_field('date', $post->ID);
      $bgImage = get_field('bg_image', $post->ID);
  ?>
      <div class="relative rounded-[6px] bg-white group overflow-hidden">
        <div class="h-[170px] relative overflow-hidden">
          <div class="absolute inset-0 w-full h-full transition-all duration-300 bg-primary opacity-[.75] group-hover:opacity-0 z-[2]"></div>
          <img src="<?= $bgImage['url'] ?: placeHolderImage(); ?>" alt="<?= $bgImage['alt']; ?>" class="object-cover object-top w-full h-full transition-all duration-300 bg-cover group-hover:scale-105">
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="absolute inset-0 m-auto max-w-[200px] max-h-[50px] group-hover:opacity-0 transition-all duration-300 z-[3]">
        </div>
        <div class="p-sp-4">
          <p><?= $date; ?></p>
          <h4><a href="<?= $link; ?>" class="stretched-link hover:text-primary line-clamp-3" target="_blank"><?= get_the_title($post->ID); ?></a></h4>
        </div>
      </div>
  <?php wp_reset_postdata();
    endwhile;
  endif;
  ?>
</div>
<div class="flex"><a href="/press" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto expert-load-more-js lg:mt-sp-10 mt-sp-5">View all</a></div>