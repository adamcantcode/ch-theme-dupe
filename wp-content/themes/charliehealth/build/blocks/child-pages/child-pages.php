<div class="grid lg:grid-cols-4 gap-sp-5">
  <?php
  $args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'numberposts'    => -1,
    'post_parent'    => get_the_ID(),
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
      if (has_post_thumbnail()) {
        $featuredImageID = get_post_thumbnail_id();
        $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
        $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

        $featuredImageUrl = $featuredImage[0];
        $featuredImageAltText = $featuredImageAltText ?: '';
      } else {
        $featuredImageUrl = placeHolderImage(600, 800);
        $featuredImageAltText = 'place holder image';
      }
      // $date = get_field('date');
  ?>
      <div class="relative rounded-[6px] overflow-hidden bg-white group not-loaded noshow opacity-0 press-posts-js transition-all duration-500">
        <div class="h-[170px] relative overflow-hidden">
          <div class="absolute inset-0 w-full h-full transition-all duration-300 bg-primary opacity-[.75] group-hover:opacity-0 z-[2]"></div>
          <img src="<?= $featuredImageUrl ?: placeHolderImage(); ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover object-top w-full h-full transition-all duration-300 bg-cover group-hover:scale-105">
        </div>
        <div class="p-sp-4">
          <h3><a href="<?= get_the_permalink() ?>" class="stretched-link hover:text-primary line-clamp-3"><?= get_the_title(); ?></a></h3>
        </div>
      </div>
  <?php wp_reset_postdata();
    endwhile;
  endif;
  ?>
</div>
<div class="flex">
  <a role="button" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto press-load-more-js lg:mt-sp-10 mt-sp-5 mb-sp-5 lg:mb-0">Load more</a>
</div>