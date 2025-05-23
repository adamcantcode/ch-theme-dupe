<?php
$type = get_field('type');
$count = get_field('count');
$style  = get_field('style');
?>

<?php if ($style === 'latest' || $style === null) : ?>
  <div id="<?= $block['id']; ?>">
    <div class="grid lg:grid-cols-3 gap-x-sp-8 gap-y-sp-10 mb-sp-10">
      <?php
      $args = array(
        'post_type' => $type,
        'posts_per_page' => $count,
        'meta_key'       => 'date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'meta_type'      => 'DATE',
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
            $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
            $featuredImageAltText = 'Charlie Health Logo';
          }
      ?>
          <div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
            <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover lg:h-[220px] h-[150px] w-full">
            <div class="grid p-sp-4">
              <h3><a href="<?= get_the_permalink(); ?>" class="stretched-link"><?= get_the_title(); ?></a></h3>
              <p class="mb-sp-4 text-h5 lg:text-h5-lg"><?= $author->post_title; ?></p>
              <div class="grid items-end justify-start grid-flow-col gap-sp-4">
                <?php
                $tags = get_the_terms(get_the_ID(), 'post_tag');
                ?>
                <?php if ($tags) :  ?>
                  <?php foreach ($tags as $tag) : ?>
                    <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="relative z-[6] inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal"><?= $tag->name; ?></a>
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
<?php elseif ($style === 'custom') :
  $customPosts = get_field('custom_posts'); ?>
  <?php if ($customPosts) : ?>
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
        <div class="relative bg-white rounded-lg group">
          <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
            <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
          </div>
          <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
            <?php $tags = get_the_terms($customPost->ID, 'post_tag'); ?>
            <?php if ($tags) :  ?>
              <?php foreach ($tags as $tag) : ?>
                <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-primary bg-white group-hover:bg-white-hover border border-white z-[6] text-h5-base"><?= $tag->name; ?></a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <div class="grid bg-white rounded-b-lg p-sp-4">
            <h3 class="text-h4-base"><a href="<?= get_the_permalink($customPost->ID); ?>" class="block stretched-link"><?= $customPost->post_title; ?></a></h3>
            <p><?= get_field('by_author', ($customPost->ID))->post_title ?: 'Charlie Health Editorial Team'; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
<?php elseif ($style === 'latest_new') : ?>
  <div id="<?= $block['id']; ?>">
    <div class="grid lg:grid-cols-[3fr_9fr] gap-x-sp-5 gap-y-sp-10">
      <div>
        <h2>From the Library</h2>
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
      <div class="grid lg:grid-cols-3 gap-sp-5">
        <?php
        $args = array(
          'post_type' => $type,
          'posts_per_page' => $count,
          'meta_key'       => 'date',
          'orderby'        => 'meta_value',
          'order'          => 'DESC',
          'meta_type'      => 'DATE',
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
              $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
              $featuredImageAltText = 'Charlie Health Logo';
            }
        ?>
            <div class="relative bg-white rounded-lg group">
              <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
                <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
              </div>
              <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
                <?php $tags = get_the_terms(get_the_ID(), 'post_tag');  ?>
                <?php if ($tags) :  ?>
                  <?php foreach ($tags as $tag) : ?>
                    <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-primary bg-white group-hover:bg-white-hover border border-white z-[6] text-h5-base"><?= $tag->name; ?></a>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <div class="grid bg-white rounded-b-lg p-sp-4">
                <h3 class="text-h4-base"><a href="<?= get_the_permalink(); ?>" class="block stretched-link"><?= get_the_title(); ?></a></h3>
                <p><?= $author->post_title; ?></p>
              </div>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>