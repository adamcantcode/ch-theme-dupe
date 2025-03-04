<?php get_header(); ?>

<?php
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

$author                = get_field('by_author');
$medicalReviewer       = get_field('medical_reviewer');
if ($medicalReviewer) {
  if (has_post_thumbnail($medicalReviewer)) {
    $medicalReviewerFeaturedImageID = get_post_thumbnail_id($medicalReviewer->ID);
    $medicalReviewerFeaturedImage = wp_get_attachment_image_src($medicalReviewerFeaturedImageID, 'featured-large');
    $medicalReviewerFeaturedImageAltText = get_post_meta($medicalReviewerFeaturedImageID, '_wp_attachment_image_alt', true);


    $medicalReviewerFeaturedImageUrl = $medicalReviewerFeaturedImage[0];
    $medicalReviewerFeaturedImageAltText = $medicalReviewerFeaturedImageAltText ?: '';
  } else {
    $medicalReviewerFeaturedImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
    $medicalReviewerFeaturedImageAltText = 'Charlie Health Logo';
  }
}
if (has_post_thumbnail($author)) {
  $authorFeaturedImageID = get_post_thumbnail_id($author->ID);
  $authorFeaturedImage = wp_get_attachment_image_src($authorFeaturedImageID, 'featured-large');
  $authorFeaturedImageAltText = get_post_meta($authorFeaturedImageID, '_wp_attachment_image_alt', true);

  $authorFeaturedImageUrl = $authorFeaturedImage[0];
  $authorFeaturedImageAltText = $authorFeaturedImageAltText ?: '';
} else {
  $authorFeaturedImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
  $authorFeaturedImageAltText = 'Charlie Health Logo';
}

$customMedicalReviewer = get_field('custom_medical_review');
$date                  = get_field('date') ?: '';
$updatedDate           = get_field('select_updated_date') ?: '';
$relatedPosts          = get_field('related_posts') ?: '';
$prefooter             = get_field('prefooter_cta') ?: '';
$references            = get_field('references') ?: '';
?>

<div id="progressBar" class="fixed z-20 transition-all duration-700 rounded-r-sm bg-purple-gradient-end h-[5px] left-0"></div>
<div id="mainArticleContent" class="relative z-10 main-article-content">
  <section class="section-bottom section-xs-top">
    <div class="container">
      <div class="grid lg:grid-cols-[5fr_7fr] gap-base5-4">
        <div class="min-w-0">
          <div>
            <h1 class="font-heading-serif text-h2 lg:text-h2-lg"><?= get_the_title(); ?></h1>
            <div class="grid gap-base5-2 mb-base5-5">
              <div class="flex items-center mb-base5-1 gap-base5-2">
                <img src="<?= $authorFeaturedImageUrl; ?>" alt="<?= $authorFeaturedImageAltText; ?>" class="object-cover w-auto h-base5-10 aspect-square shrink-0 rounded-circle">
                <p class="z-10 mb-0 text-[18px]">Written By: <a href="<?= get_the_permalink($author->ID); ?>" class="text-[18px]"><?= $author->post_title; ?></a></p>
              </div>
              <?php if (!empty($medicalReviewer)) : ?>
                <div class="relative flex items-center gap-base5-2 ">
                  <img src="<?= $medicalReviewerFeaturedImageUrl; ?>" alt="<?= $medicalReviewerFeaturedImageAltText; ?>" class="object-cover w-auto h-base5-10 aspect-square shrink-0 rounded-circle">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 left-base5-7">
                    <circle cx="11" cy="11" r="11" fill="white" />
                    <path d="M15.261 8.81075L14.4305 7.98027L9.88638 12.5244L7.91192 10.55L7.08145 11.3804L9.88741 14.1864L10.7179 13.3559L10.7169 13.3549L15.261 8.81075Z" fill="#8F92CD" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0996 10.7734C19.0996 15.1227 15.5739 18.6484 11.2246 18.6484C6.87537 18.6484 3.34961 15.1227 3.34961 10.7734C3.34961 6.42419 6.87537 2.89844 11.2246 2.89844C15.5739 2.89844 19.0996 6.42419 19.0996 10.7734ZM17.9746 10.7734C17.9746 14.5014 14.9525 17.5234 11.2246 17.5234C7.49669 17.5234 4.47461 14.5014 4.47461 10.7734C4.47461 7.04552 7.49669 4.02344 11.2246 4.02344C14.9525 4.02344 17.9746 7.04552 17.9746 10.7734Z" fill="#8F92CD" />
                  </svg>
                  <p class="z-10 mb-0 text-[18px]">Clinically Reviewed By: <a href="<?= get_the_permalink($medicalReviewer->ID); ?>" class="text-[18px]"><?= $medicalReviewer->post_title; ?></a></p>
                </div>
              <?php elseif (!empty($customMedicalReviewer)) : ?>
                <div class="flex items-center gap-base5-2 ">
                  <img src="<?= site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp'); ?>" alt="Charlie Health Logo" class="object-cover w-auto h-base5-10 aspect-square shrink-0 rounded-circle">
                  <p class="z-10 mb-0 text-[18px]">Written By: <a href="<?= $customMedicalReviewer['url']; ?>" class="text-[18px]"><?= $customMedicalReviewer['title']; ?></a></p>
                </div>
              <?php endif; ?>
            </div>
            <div class="flex items-center gap-base5-10 mb-base5-4">
              <?php if (!$updatedDate) : ?>
                <p class="mb-0 text-[18px]"><?= $date; ?></p>
              <?php elseif ($updatedDate) : ?>
                <p class="mb-0 text-[18px]">Updated: <?= $date; ?></p>
              <?php endif; ?>
            </div>
            <p><?= get_the_excerpt(); ?></p>
            <div id="mobileTheContent"></div>
            <p><a href="https://www.charliehealth.com/clinical-content-advisory-council">Learn more about our Clinical Review Process</a></p>
            <div class="lg:noshow">
              <div class="rounded-md bg-grey-cool mt-base5-6 lg:p-base5-6 p-base5-3">
                <h3 class="font-heading-serif">Ready to start your journey?</p>
                  <div class="flex flex-col lg:flex-wrap lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
                    <a href="/form" class="ch-button button-primary-ch">Get Started</a>
                    <a href="tel:+19862060414" class="ch-button button-secondary-ch">1 (986) 206-0414</a>
                  </div>
              </div>
            </div>
          </div>
          <div class="lg:top-[125px] noshow sticky lg:block max-w-[80%]">
            <div class="rounded-md bg-grey-cool mt-base5-6 lg:p-base5-6 p-base5-3">
              <h3 class="font-heading-serif">Ready to start your journey?</h3>
              <div class="flex flex-col lg:flex-wrap lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
                <a href="/form" class="ch-button button-primary-ch">Get Started</a>
                <a href="tel:+19862060414" class="ch-button button-secondary-ch">1 (986) 206-0414</a>
              </div>
            </div>
          </div>
        </div>
        <div class="min-w-0">
          <article id="articleContent">
            <div id="theContent">
              <?php the_content(); ?>
              <?php if ($references) : ?>
                <div class="rounded-md references-container">
                  <div class="flex duration-300 rounded-md cursor-pointer references-heading lg:p-sp-8 p-sp-4 hover:bg-lightest-purple">
                    <p class="mb-0 text-h3-base">References</p>
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
      </div>
    </div>
  </section>
</div>
</section>
<?php if (!$prefooter) : ?>
  <?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
<?php endif; ?>
<?php if ($relatedPosts) : ?>
  <section class="section bg-grey-cool">
    <div class="container">
      <div class="grid lg:grid-cols-[3fr_9fr] gap-x-sp-5 gap-y-sp-10">
        <div>
          <h2>More like this</h2>
          <a href="/blog" class="ch-button button-secondary-ch">Explore more</a>
        </div>
        <div class="grid lg:grid-cols-3 gap-sp-5">
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
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const theContent = document.getElementById("theContent");
    const mobileContainer = document.getElementById("mobileTheContent");
    const desktopContainer = document.getElementById("articleContent");

    function moveContent() {
      if (window.innerWidth < 1024) {
        if (mobileContainer && theContent && theContent.parentNode !== mobileContainer) {
          mobileContainer.appendChild(theContent);
        }
      } else {
        if (desktopContainer && theContent && theContent.parentNode !== desktopContainer) {
          desktopContainer.appendChild(theContent);
        }
      }
    }

    // Run on load
    moveContent();

    // Run on resize
    window.addEventListener("resize", moveContent);
  });
</script>

<?php get_footer(); ?>