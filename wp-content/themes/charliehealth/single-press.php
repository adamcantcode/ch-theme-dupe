<?php get_header(); ?>

<?php
$protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
$domain   = $_SERVER['HTTP_HOST'];
$path     = $_SERVER['REQUEST_URI'];
$fullUrl  = $protocol . $domain . $path;

if (has_post_thumbnail()) {
  $featuredImageID      = get_post_thumbnail_id();
  $featuredImage        = wp_get_attachment_image_src($featuredImageID, 'featured-large');
  $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

  $featuredImageUrl     = $featuredImage[0];
  $featuredImageAltText = $featuredImageAltText ?: '';
} else {
  $featuredImageUrl     = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
  $featuredImageAltText = 'Charlie Health Logo';
}

$author          = get_field('by_author');
$medicalReviewer = get_field('medical_reviewer');
$date            = get_field('date') ?: '';
$updatedDate     = get_field('select_updated_date') ?: '';
$relatedPosts    = get_field('related_posts') ?: '';
$toc             = get_field('toc') ?: '';
$prefooter       = get_field('prefooter_cta') ?: '';
$references      = get_field('references') ?: '';

$tags      = get_the_terms(get_the_ID(), 'post_tag');

$wordCount      = str_word_count(strip_tags(get_the_content()));
$wordsPerMinute = 238;
?>

<div id="progressBar" class="fixed z-20 transition-all duration-700 rounded-r-sm bg-purple-gradient-end h-[5px] left-0"></div>
<div id="mainArticleContent" class="relative z-10 main-article-content">
  <section class="section">
    <div class="container">
      <div class="grid items-center lg:grid-cols-[4.25fr_5fr] lg:gap-[10rem] gap-sp-8">
        <div>
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full aspect-square nolazy">
        </div>
        <div>
          <h1 class="text-h2-base"><?= get_the_title(); ?></h1>
          <?php if (get_the_excerpt()) : ?>
            <p><?= get_the_excerpt(); ?></p>
          <?php endif; ?>
          <?php if (!$updatedDate) : ?>
            <p><?= $date; ?></p>
          <?php elseif ($updatedDate) : ?>
            <p>Updated: <?= $date; ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
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
            <p class="mb-0 font-heading-serif text-h3 lg:text-h3-lg">References</p>
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
<?php if (!$prefooter) : ?>
  <?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
<?php endif; ?>
<?= do_blocks('<!-- wp:block {"ref":7353} /-->'); ?>

<?php get_footer(); ?>