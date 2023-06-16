<?php
$type = get_field('type');
$count = get_field('count');
$style  = get_field('style');
?>

<?php if ($style !== 'custom') : ?>
  <div id="<?= $block['id']; ?>">
    <div class="grid lg:grid-cols-3 gap-x-sp-8 gap-y-sp-10 mb-sp-10">
      <?php
      $args = array(
        'post_type' => $type,
        'posts_per_page' => $count,
      );

      $query = new WP_Query($args);
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
          $author = get_field('by_author', get_the_ID());
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
      ?>
          <div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
            <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover lg:h-[220px] h-[150px] w-full">
            <div class="grid p-sp-4">
              <h3><a href="<?= get_the_permalink(); ?>" class="stretched-link"><?= get_the_title(); ?></a></h3>
              <h5 class="mb-sp-4"><?= $author->post_title; ?></h5>
              <div class="grid items-end justify-start grid-flow-col gap-sp-4">
                <?php
                $tags = get_the_terms(get_the_ID(), 'post_tag');
                ?>
                <?php if ($tags) :  ?>
                  <?php foreach ($tags as $tag) : ?>
                    <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal"><?= $tag->name; ?></a>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
      <?php endwhile;
        wp_reset_postdata();
      endif; ?>
    </div>
  </div>
  <?php else :
  $customPosts = get_field('custom_posts');
  if ($customPosts) : ?>
    <section class="section-top">
      <div class="container">
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
              $featuredImageUrl = placeHolderImage(600, 800);
              $featuredImageAltText = 'place holder image';
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
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>