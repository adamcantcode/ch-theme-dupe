<?php get_header(); ?>

<?php
$protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
$domain = $_SERVER['HTTP_HOST'];
$path = $_SERVER['REQUEST_URI'];
$fullUrl = $protocol . $domain . $path;

if (has_post_thumbnail()) {
  $featuredImageID = get_post_thumbnail_id();
  $featuredImage = wp_get_attachment_image_src($featuredImageID, 'featured-large');
  $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

  $featuredImageUrl = $featuredImage[0];
  $featuredImageAltText = $featuredImageAltText ?: '';
} else {
  $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
  $featuredImageAltText = 'Charlie Health Logo';
}

// $author = get_field('by_author');
// $medicalReviewer = get_field('medical_reviewer');
$date = get_field('date') ?: '';
$updatedDate = get_field('select_updated_date') ?: '';
$relatedPosts = get_field('related_posts') ?: '';
$toc = get_field('toc') ?: '';
// $references = get_field('references') ?: '';

// $tags = get_the_terms(get_the_ID(), 'post_tag');

// $wordCount = str_word_count(strip_tags(get_the_content()));
// $wordsPerMinute = 238;
// $readingTime = ceil($wordCount / $wordsPerMinute);

?>

<div id="progressBar" class="fixed z-20 transition-all duration-700 rounded-r-sm bg-purple-gradient-end h-[5px] left-0"></div>
<div id="mainArticleContent" class="relative z-10 main-article-content">
  <section class="section">
    <div class="container">
      <div class="mb-sp-4">
        <a href="/events" class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50" fill="none">
            <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
          </svg>
          <p class="mb-0 ml-sp-2">Back to Events</p>
        </a>
      </div>
      <div class="grid items-center lg:grid-cols-[4.25fr_5fr] lg:gap-[10rem] gap-sp-8">
        <div>
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full aspect-square nolazy">
        </div>
        <div>
          <h1 class="text-h2 lg:text-h1-display font-heading-serif mb-sp-6"><?= get_the_title(); ?></h1>
          <p><?= get_the_excerpt(); ?></p>
          <?php if (!$updatedDate) : ?>
            <p><?= $date; ?></p>
          <?php elseif ($updatedDate) : ?>
            <p>Updated: <?= $date; ?></p>
          <?php endif; ?>
          <div class="flex items-start">
            <p class="font-heading-serif">Share:</p>
            <a role="button" class="js-share-button ml-sp-4"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/share.svg'); ?>" alt="share icon"></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $fullUrl; ?>" onclick="window.open(this.href,'targetWindow','resizable=yes,width=600,height=300'); return false;" class="ml-sp-4"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'); ?>" alt="Facebook logo">
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $fullUrl; ?>" class="ml-sp-4"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'); ?>" alt="LinkedIn logo"></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="invisible opacity-0 noshow back-to-top top-[100px] left-sp-10 mb-sp-16 w-fit translate-y-sp-2">
    <a href="#mainArticleContent" class="no-underline lg:text-h3-lg text-h3-lg font-heading-serif">Back to top</a>
  </div>
  <?php if ($toc) : ?>
    <section class="section-xs">
      <div class="container-sm">
        <div class="rounded-md toc-container bg-light-purple">
          <div class="flex cursor-pointer toc-heading lg:p-sp-8 p-sp-4">
            <h3 class="mb-0">Table of Contents</h3>
            <div class="flex items-center ml-auto toggle">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="none" viewBox="8 8 8 8" height="12px" width="12px">
                <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </div>
          </div>
          <div class="overflow-hidden transition-all duration-500 ease-in-out toc-content max-h-0">
            <div id="toc" class="flex flex-col items-start pt-0 lg:pt-0 lg:p-sp-8 p-sp-4 gap-sp-1"></div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <style>
    .embed-container {
      position: relative;
      padding-bottom: 56.25%;
      overflow: hidden;
      max-width: 100%;
      height: auto;
    }

    .embed-container iframe,
    .embed-container object,
    .embed-container embed {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
  <?php if (get_field('youtube_video')) : ?>
    <section class="section-bottom">
      <div class="container">
        <div class="embed-container">
          <?= get_field('youtube_video'); ?>
        </div>
        <h6 class="mt-sp-4">This CE was eligible for credit if you attended live and completed post-event evaluation surveys and is shared here strictly for informational purposes.</h6>
      </div>
    </section>
  <?php else : ?>
    <section class="section-bottom">
      <div class="container">
        <h4 class="text-center">Event video coming soon.</h4>
      </div>
    </section>
  <?php endif; ?>
  <?php if (get_the_content()) : ?>
    <section class="section-horizontal">
      <div class="container">
        <div class="divider"></div>
      </div>
    </section>
    <article id="articleContent" class="section">
      <div class="container-sm">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endif; ?>
</div>
<?php if ($relatedPosts) : ?>
  <section class="section-bottom">
    <div class="container">
      <h2>More like this</h2>
      <div class="grid lg:grid-cols-3 posts-container gap-x-sp-8 gap-y-sp-10">
        <?php foreach ($relatedPosts as $post) : ?>
          <?php
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
              <h3><a href="<?= get_the_permalink($post->ID); ?>" class="stretched-link"><?= $post->post_title; ?></a></h3>
              <p class="mb-sp-4 text-h5 lg:text-h5-lg"><?= get_field('by_author', ($relatedPost->ID))->post_title ?: 'Charlie Health Editorial Team'; ?></p>
              <div class="grid items-end justify-start grid-flow-col gap-sp-4">
                <?php $tags = get_the_terms($post->ID, 'post_tag'); ?>
                <?php if ($tags) : ?>
                  <?php foreach ($tags as $tag) : ?>
                    <a href="<?= get_tag_link($tag->term_id); ?>" class="relative z-[6] inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal"><?= $tag->name; ?></a>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>

<?php get_footer(); ?>