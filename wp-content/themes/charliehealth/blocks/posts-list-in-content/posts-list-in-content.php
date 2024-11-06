<?php
$relatedPost = get_field('related_post');
if ($relatedPost) : ?>
  <div class="grid posts-container gap-x-sp-8 gap-y-sp-10">
    <?php
    if (has_post_thumbnail($relatedPost->ID)) {
      $featuredImageID = get_post_thumbnail_id($relatedPost->ID);
      $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
      $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

      $featuredImageUrl = $featuredImage[0];
      $featuredImageAltText = $featuredImageAltText ?: '';
    } else {
      $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
      $featuredImageAltText = 'Charlie Health Logo';
    }
    ?>
    <div class="relative grid lg:grid-cols-[1fr_2fr] overflow-hidden rounded-sm border-2">
      <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover lg:h-full h-[150px] w-full">
      <div class="grid p-sp-4">
        <h3><a <?php if (!(is_admin())) : ?>href="<?= get_the_permalink($relatedPost->ID); ?>" <?php endif; ?> class="stretched-link"><?= $relatedPost->post_title; ?></a></h3>
        <p class="mb-sp-4 text-h5 lg:text-h5-lg"><?= get_field('by_author', ($relatedPost->ID))->post_title ?: 'Charlie Health Editorial Team'; ?></p>
        <div class="grid items-end justify-start grid-flow-col gap-sp-4">
          <?php $tags = get_the_terms($relatedPost->ID, 'post_tag'); ?>
          <?php if ($tags && !is_wp_error($tags)): ?>
            <?php foreach ($tags as $tag) : ?>
              <a href="<?= get_tag_link($tag->term_id); ?>" class="z-10 no-underline px-base5-3 py-base5-2 rounded-pill bg-lavender-200 hover:bg-lavender-300"><?= $tag->name; ?></a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>