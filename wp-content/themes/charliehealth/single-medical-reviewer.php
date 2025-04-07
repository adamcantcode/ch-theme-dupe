<?php
get_header();

$name      = get_the_title();
$pronouns  = get_field('pronouns');
$title     = get_field('title');
$creds     = get_field('credentials');
$bio       = get_field('author_page_bio');
$expertise = get_field('areas_of_expertise');

$image = get_the_post_thumbnail_url();

if ($image) {
  $imageID = get_post_thumbnail_id();
  $imageSrcset = wp_get_attachment_image_srcset($imageID, 'featured-large');
  $imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', true);
} else {
  $image = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
  $imageAlt = 'Charlie Health Logo';
}
?>

<section class="section">
  <div class="container">
    <div class="inline-block mb-base5-4">
      <h4><a href="/clinical-content-advisory-council" class="underline">Clinical Content Advisory Council</a></h4>
      <h1>Clinical Reviewer: <?= $name; ?>, <?= $creds; ?> <span class="text-h4-base"><?= $pronouns; ?></span></h1>
    </div>
    <div class="grid lg:grid-cols-[3fr_9fr] gap-base5-8 mb-base5-8 mt-base5-10">
      <div>
        <img src="<?= $image; ?>" srcset="<?= $imageSrcset ?? ''; ?>" alt="<?= $imageAlt; ?>" class="object-cover w-full rounded-circle aspect-square">
      </div>
      <div>
        <h2><?= $title; ?></h2>
        <div>
          <?= $bio; ?>
        </div>
      </div>
    </div>
    <?php if ($expertise) : ?>
      <div class="rounded-md bg-grey-cool p-base5-4 lg:p-[80px]">
        <h3><?= $name; ?>'s clinical areas of expertise</h3>
        <?php $expertise = explode(",", $expertise);  ?>
        <div class="flex flex-wrap justify-start gap-base5-4">
          <?php foreach ($expertise as $item) : ?>
            <div class="flex bg-white rounded-pill p-base5-3 check-list-item">
              <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-base5-2">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3627 18.9406L10.368 18.9459L8.95379 20.3602L2.08594 13.4923L3.50015 12.0781L8.94847 17.5264L21.4964 4.97852L22.9106 6.39273L10.3627 18.9406Z" fill="#161a3d"></path>
              </svg>
              <p class="text-primary text-h4-base"><?= ucfirst(trim($item)); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<section class="section bg-grey-cool">
  <div class="container">
    <div>
      <div class="grid lg:grid-cols-[3fr_9fr] gap-x-sp-5 gap-y-sp-10">
        <div>
          <h4>From the Library</h4>
          <h2>Articles featuring our Clinical Content Advisory Council</h2>
          <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
            <a href="/blog" class="ch-button button-secondary-ch">Read more</a>
          </div>
        </div>
        <div class="grid lg:grid-cols-3 gap-sp-5">
          <?php
          $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
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
  </div>
</section>

<?php
get_footer();
