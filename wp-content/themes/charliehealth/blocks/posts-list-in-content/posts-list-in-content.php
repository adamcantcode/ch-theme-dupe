<?php
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
              <a href="<?= get_tag_link($tag->term_id); ?>" class="relative z-[6] inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal"><?= $tag->name; ?></a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>