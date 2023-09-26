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

$author = get_field('by_author');
$medicalReviewer = get_field('medical_reviewer');
$date = get_field('date') ?: '';
$updatedDate = get_field('select_updated_date') ?: '';
$relatedPosts = get_field('related_posts') ?: '';
$toc = get_field('toc') ?: '';
$references = get_field('references') ?: '';

$audiences = get_the_terms(get_the_ID(), 'category');
$tags = get_the_terms(get_the_ID(), 'post_tag');

$wordCount = str_word_count(strip_tags(get_the_content()));
$wordsPerMinute = 238;
$readingTime = ceil($wordCount / $wordsPerMinute);

?>

<div id="progressBar" class="fixed z-20 transition-all duration-700 rounded-r-sm bg-purple-gradient-end h-[5px] left-0"></div>
<div id="mainArticleContent" class="relative z-10 main-article-content">
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
      <div class="grid items-center lg:grid-cols-[4.25fr_5fr] lg:gap-[10rem] gap-sp-8">
        <div>
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full aspect-square nolazy">
        </div>
        <div>
          <h1 class="text-h2 lg:text-h1-display font-heading-serif mb-sp-6"><?= get_the_title(); ?></h1>
          <div class="flex items-center mb-sp-6">
            <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22" fill="#46496D" class="inline-block">
              <path d="M352.587-840v-87.413h254.826V-840H352.587Zm83.826 446.696h87.174v-240.718h-87.174v240.718ZM480-65.413q-75.913 0-142.849-29.071-66.937-29.072-117.011-79.055-50.075-49.982-79.173-116.917t-29.098-142.848q0-75.913 29.12-142.837 29.12-66.924 79.185-116.989 50.065-50.066 116.989-79.185 66.924-29.12 142.837-29.12 62.478 0 120.435 20 57.956 20 108.195 58.239l58.87-58.869 61.5 61.5-58.869 58.869q38.239 50.24 58.119 108.077 19.881 57.837 19.881 120.315 0 75.913-29.098 142.848-29.098 66.935-79.173 116.917-50.074 49.983-117.011 79.055Q555.913-65.413 480-65.413Zm0-91q115.043 0 196.087-80.924 81.043-80.924 81.043-195.967 0-115.044-81.043-196.087Q595.043-710.435 480-710.435q-115.043 0-196.087 81.044-81.043 81.043-81.043 196.087 0 115.043 81.043 195.967Q364.957-156.413 480-156.413Zm0-276.891Z" />
            </svg>
            <p class="mb-0 font-bold ml-sp-2"> <?= $readingTime; ?> min.</p>
          </div>
          <p><?= get_the_excerpt(); ?></p>
          <p class="mb-0">By: <a href="<?= site_url('/author/') . $author->post_name; ?>"><?= $author->post_title; ?></a></p>
          <?php if (!empty($medicalReviewer)) : ?>
            <p class="mb-0">Clinically Reviewed By: <a href="<?= site_url('/medical-reviewer/') . $medicalReviewer->post_name; ?>"><?= $medicalReviewer->post_title; ?></a></p>
          <?php endif; ?>
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
          <div class="grid gap-sp-4">
            <div class="grid items-end justify-start grid-flow-col gap-sp-6">
              <?php if ($audiences) : foreach ($audiences as $audience) : ?>
                  <?php
                  switch ($audience->slug) {
                    case 'teens-and-young-adults':
                      $audienceClass = 'teens-and-young-adults';
                      break;
                    case 'families-and-caregivers':
                      $audienceClass = 'families-and-caregivers';
                      break;
                    case 'providers':
                      $audienceClass = 'providers';
                      break;
                    default:
                      $audienceClass = '';
                      break;
                  }
                  ?>
                  <a href="<?= get_term_link($audience->slug, 'category'); ?>" class="px-4 py-3 no-underline rounded-lg text-h6 bg-tag-gray <?= $audienceClass; ?>"><?= $audience->name; ?></a>
              <?php endforeach;
              endif; ?>
            </div>
            <div class="grid items-end justify-start grid-flow-col gap-sp-4">
              <?php if ($tags) : foreach ($tags as $tag) : ?>
                  <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="px-4 py-3 no-underline rounded-lg text-h6 bg-tag-gray hover:bg-bright-teal"><?= $tag->name; ?></a>
              <?php endforeach;
              endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="invisible opacity-0 noshow back-to-top top-[100px] left-sp-10 mb-sp-16 w-fit translate-y-sp-2">
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
  <article id="articleContent" class="section-xs-top">
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
<?php if ($relatedPosts) : ?>
  <section class="section-top">
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
              <h5 class="mb-sp-4"><?= $author = get_field('by_author')->post_title ?: 'Charlile Health Editorial Team'; ?></h5>
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

<section class="section-top">
  <div class="container">
    <div class="divider"></div>
  </div>
</section>
<?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>

<?php get_footer(); ?>