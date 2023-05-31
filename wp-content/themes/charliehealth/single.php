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
  $featuredImageUrl = placeHolderImage(600, 800);
  $featuredImageAltText = 'place holder image';
}

$author = get_field('by_author') ?: 'The Charlile Health Team';
$medicalReviewer = get_field('medical_reviewer') ?: '';
$date = get_field('date') ?: '';
$relatedPosts = get_field('related_posts') ?: '';
$toc = get_field('toc') ?: '';
$references = get_field('references') ?: '';

$audiences = get_the_terms(get_the_ID(), 'category');
$tags = get_the_terms(get_the_ID(), 'post_tag');

$wordCount = str_word_count(strip_tags(get_the_content()));
$wordsPerMinute = 238;
$readingTime = ceil($wordCount / $wordsPerMinute);

?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <div id="progressBar" class="fixed transition-opacity duration-300 bg-gradient-to-r from-purple-gradient-start to-purple-gradient-end"></div>
  <div id="mainArticleContent" class="relative main-article-content">
    <section class="section">
      <div class="container">
        <div class="mb-sp-4">
          <a href="<?= get_post_type_archive_link('post'); ?>" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50" fill="none">
              <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
            </svg>
            <p class="mb-0 ml-sp-2">Back to The Library</p>
          </a>
        </div>
        <div class="grid items-center lg:grid-cols-2 lg:gap-sp-16 gap-sp-8">
          <div>
            <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full aspect-square">
          </div>
          <div class="">
            <h1 class="text-h2 font-heading-serif"><?= get_the_title(); ?></h1>
            <p class="font-bold">Est. reading time: <?= $readingTime; ?> min.</p>
            <p><?= get_the_excerpt(); ?></p>
            <p class="mb-0">By: <a href="<?= site_url('/author/') . $author->post_name; ?>"><?= $author->post_title; ?></a></p>
            <?php if (!empty($medicalReviewer)) : ?>
              <p class="mb-0">Clinically Reviewed By: <a href="<?= site_url('/medical-reviewer/') . $medicalReviewer->post_name; ?>"><?= $medicalReviewer->post_title; ?></a></p>
            <?php endif; ?>
            <p><?= $date ?: get_the_date(); ?></p>
            <div class="flex items-start">
              <p class="font-heading-serif">Share:</p>
              <a role="button" class="js-share-button ml-sp-4"><img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/share.svg'; ?>" alt="share icon"></a>
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $fullUrl; ?>" onclick="window.open(this.href,'targetWindow','resizable=yes,width=600,height=300'); return false;" class="ml-sp-4"><img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'; ?>" alt="Facebook icon">
              </a>
              <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $fullUrl; ?>" class="ml-sp-4"><img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'; ?>" alt="linkedin icon"></a>
            </div>
            <div class="grid gap-sp-4">
              <div class="grid justify-start grid-flow-col gap-sp-4 items-end">
                <?php foreach ($audiences as $audience) : ?>
                  <a href="<?= get_term_link($audience->slug, 'category'); ?>" class="px-4 py-3 no-underline rounded-lg text-h6 bg-tag-gray"><?= $audience->name; ?></a>
                <?php endforeach; ?>
              </div>
              <div class="grid justify-start grid-flow-col gap-sp-4 items-end">
                <?php foreach ($tags as $tag) : ?>
                  <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="px-4 py-3 no-underline rounded-lg text-h6 bg-tag-gray"><?= $tag->name; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="invisible noshow opacity-0 back-to-top top-sp-16 left-sp-10 mb-sp-16 w-fit">
      <h3><a href="#mainArticleContent">Back to top</a></h3>
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
    <section class="section-horizontal">
      <div class="container">
        <div class="divider"></div>
      </div>
    </section>
    <article id="articleContent" class="section">
      <div class="container-sm">
        <?php the_content(); ?>
        <?php if ($references) : ?>
          <div class="divider mb-sp-4"></div>
          <div class="rounded-md references-container">
            <div class="flex duration-300 rounded-md cursor-pointer references-heading lg:p-sp-8 p-sp-4 hover:bg-lightest-purple">
              <h3 class="mb-0">References</h3>
              <div class="flex items-center ml-auto toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="none" viewBox="8 8 8 8" height="12px" width="12px">
                  <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </div>
            </div>
            <div class="overflow-hidden transition-all duration-500 ease-in-out references-content max-h-0">
              <div class="pt-0 lg:pt-0 lg:p-sp-8 p-sp-4 gap-sp-1 mt-sp-4">
                <?= $references; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </article>
  </div>
</main>
<?php if ($relatedPosts) : ?>
  <section class="section">
    <div class="container">
      <div class="grid lg:grid-cols-3 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
        <?php foreach ($relatedPosts as $post) : ?>
          <div class="relative grid overflow-hidden border rounded-sm border-card-border">
            <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
            <div class="grid p-sp-4">
              <h3><a href="<?= get_the_permalink($post->ID); ?>" class="stretched-link"><?= $post->post_title; ?></a></h3>
              <h5 class="mb-sp-4"><?= $author = get_field('by_author')->post_title ?: 'Charlile Health Editorial Team'; ?></h5>
              <div class="grid justify-start grid-flow-col gap-sp-4 items-end">
                <?php $tags = get_the_terms($post->ID, 'post_tag'); ?>
                <?php foreach ($tags as $tag) : ?>
                  <a href="<?= $tag->link; ?>" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray"><?= $tag->name; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="section-bottom">
  <div class="container">
    <?= do_blocks('<!-- wp:acf/divider-block {"name":"acf/divider-block"} /-->'); ?>
  </div>
</section>
<section class="section-horizontal">
  <div class="container">
    <?= do_blocks('<!-- wp:acf/pre-footer-cta-block {"name":"acf/pre-footer-cta-block"} /-->'); ?>
  </div>
</section>
<section class="section">
  <div class="container-sm">
    <?= do_blocks('<!-- wp:block {"ref":458} /-->'); ?>
  </div>
</section>

<?php get_footer(); ?>