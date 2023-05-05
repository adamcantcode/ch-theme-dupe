<?php get_header(); ?>

<?php
$protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
$domain = $_SERVER['HTTP_HOST'];
$path = $_SERVER['REQUEST_URI'];
$fullUrl = $protocol . $domain . $path;

$author = get_field('author') ?: 'The Charlile Health Team';
$medicalReviewer = get_field('medical_reviewer') ?: '';
$date = get_field('date') ?: '';

$audiences = get_the_terms(get_the_ID(), 'category');
$tags = get_the_terms(get_the_ID(), 'post_tag');

// if (!empty($audiences)) {
//   foreach ($audiences as $audience) {
//     $term_name = $audience->name;
//     $term_slug = $audience->slug;
//     $term_id   = $audience->term_id;
//   }
// }

?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <div id="mainArticleContent" class="relative main-article-content">
    <section class="section">
      <div class="container">
        <div class="mb-sp-4">
          <!-- TODO figure out /blog and make dynamic -->
          <a href="<?= get_post_type_archive_link('post'); ?>" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50" fill="none">
              <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
            </svg>
            <p class="mb-0 ml-sp-2">Back to The Library</p>
          </a>
        </div>
        <div class="grid items-center lg:grid-cols-2 lg:gap-sp-16 gap-sp-8">
          <div>
            <img src="<?= placeHolderImage(525, 525); ?>" alt="" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full">
          </div>
          <div class="">
            <h1 class="text-h2 font-heading-serif"><?= get_the_title(); ?></h1>
            <p class="font-bold">Est. reading time: <span class="js-read-time">5</span> min.</p>
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
              <div class="grid justify-start grid-flow-col gap-sp-4">
                <?php foreach ($audiences as $audience) : ?>
                  <a href="<?= get_term_link($audience->slug, 'category'); ?>" class="px-4 py-3 no-underline rounded-lg text-h6 bg-tag-gray"><?= $audience->name; ?></a>
                <?php endforeach; ?>
              </div>
              <div class="grid justify-start grid-flow-col gap-sp-4">
                <?php foreach ($tags as $tag) : ?>
                  <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="px-4 py-3 no-underline rounded-lg text-h6 bg-tag-gray"><?= $tag->name; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="invisible hidden opacity-0 back-to-top top-sp-16 left-sp-10 mb-sp-16 w-fit">
      <h3><a href="#mainArticleContent">Back to top</a></h3>
    </div>
    <section class="section-xs">
      <div class="container-sm">
        <div class="rounded-md toc-container bg-light-purple">
          <div class="flex cursor-pointer toc-heading lg:p-sp-8 p-sp-4">
            <h3 class="mb-0">Table of Contents</h3>
            <div class="flex items-center ml-auto">
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
  </div>
</main>

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