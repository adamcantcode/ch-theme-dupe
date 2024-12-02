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
$toc                   = get_field('toc') ?: '';
$prefooter             = get_field('prefooter_cta') ?: '';
$references            = get_field('references') ?: '';

// $audiences = get_the_terms(get_the_ID(), 'category');
$tags      = get_the_terms(get_the_ID(), 'post_tag');

$wordCount      = str_word_count(strip_tags(get_the_content()));
$wordsPerMinute = 238;
$readingTime    = ceil($wordCount / $wordsPerMinute);
?>

<div id="progressBar" class="fixed z-20 transition-all duration-700 rounded-r-sm bg-purple-gradient-end h-[5px] left-0"></div>
<div id="mainArticleContent" class="relative z-10 main-article-content">

  <section class="section-top">
    <div class="container">
      <div class="breadcrumbs mb-sp-5 lg:mb-sp-6">
        <?php if (!is_singular('research')) : ?>
          <a href="/blog">The Library</a>
        <?php endif; ?>
        <?php if ($tags[0]->name): ?>
          <span>/</span>
          <a href="<?= get_term_link($tags[0]->term_id, 'post_tag'); ?>"><?= $tags[0]->name; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <section class="section-bottom section-xs-top">
    <div class="container">
      <div class="grid lg:grid-cols-[4fr_1fr_7fr]">
        <div class="min-w-0">
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full aspect-square nolazy lg:mb-0 mb-base5-4">
          <div class="lg:top-[125px] noshow sticky lg:block">
            <?php if ($toc) : ?>
              <div class="rounded-md toc-container bg-lavender-100 mt-base5-6">
                <div class="flex cursor-pointer toc-heading lg:p-base5-6 p-base5-3">
                  <p class="mb-0 text-h3-base">Table of Contents</p>
                  <div class="flex items-center ml-auto toggle">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.175 14.7297L6.61895 14.7297L6.61895 16.3797H15.175L15.175 24.9356L16.825 24.9356L16.825 16.3797H25.3809L25.3809 14.7297L16.825 14.7297L16.825 6.17362L15.175 6.17362L15.175 14.7297Z" fill="#161A3D" />
                    </svg>
                  </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out toc-content max-h-0">
                  <div id="toc" class="flex flex-col items-start pt-0 lg:pt-0 lg:p-sp-8 p-sp-4 gap-sp-1"></div>
                </div>
              </div>
            <?php endif; ?>
            <div class="rounded-md bg-grey-cool mt-base5-6 lg:p-base5-6 p-base5-3">
              <h3 class="font-heading-serif">Personalized intensive therapy from home</h3>
              <p>Ready to start healing?</p>
              <div class="flex flex-col lg:flex-wrap lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
                <a href="/form" class="ch-button button-primary-ch">Get Started</a>
                <a href="tel:+18664848218" class="ch-button button-secondary-ch">1 (866) 484-8218</a>
              </div>
            </div>
          </div>
        </div>
        <div class="min-w-0"></div>
        <div class="min-w-0">
          <article id="articleContent">
            <div>
              <h1 class="font-heading-serif text-h2 lg:text-h2-lg"><?= get_the_title(); ?></h1>
              <div class="flex flex-col lg:flex-row lg:gap-base5-10 gap-base5-2 mb-base5-2">
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
                    <img src="<?= $medicalReviewerFeaturedImageUrl; ?>" alt="<?= $medicalReviewerFeaturedImageAltText; ?>" class="object-cover w-auto h-base5-10 aspect-square shrink-0 rounded-circle">
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
                <div class="flex items-center">
                  <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3906 5.45312V2.3125H15.4062C15.5094 2.3125 15.5938 2.22812 15.5938 2.125V0.8125C15.5938 0.709375 15.5094 0.625 15.4062 0.625H0.59375C0.490625 0.625 0.40625 0.709375 0.40625 0.8125V2.125C0.40625 2.22812 0.490625 2.3125 0.59375 2.3125H2.60938V5.45312C2.60938 7.36328 3.60312 9.04375 5.10312 10C3.60312 10.9563 2.60938 12.6367 2.60938 14.5469V17.6875H0.59375C0.490625 17.6875 0.40625 17.7719 0.40625 17.875V19.1875C0.40625 19.2906 0.490625 19.375 0.59375 19.375H15.4062C15.5094 19.375 15.5938 19.2906 15.5938 19.1875V17.875C15.5938 17.7719 15.5094 17.6875 15.4062 17.6875H13.3906V14.5469C13.3906 12.6367 12.3969 10.9563 10.8969 10C12.3969 9.04375 13.3906 7.36328 13.3906 5.45312ZM11.7031 14.5469V17.6875H4.29688V14.5469C4.29688 13.5578 4.68125 12.6273 5.38203 11.9289C6.08047 11.2281 7.01094 10.8438 8 10.8438C8.98906 10.8438 9.91953 11.2281 10.618 11.9289C11.3188 12.6273 11.7031 13.5578 11.7031 14.5469ZM11.7031 5.45312C11.7031 6.44219 11.3188 7.37266 10.618 8.07109C9.91953 8.77188 8.98906 9.15625 8 9.15625C7.01094 9.15625 6.08047 8.77188 5.38203 8.07109C5.0367 7.7284 4.76293 7.32048 4.57664 6.87105C4.39035 6.42161 4.29525 5.93963 4.29688 5.45312V2.3125H11.7031V5.45312Z" fill="#161A3D" />
                  </svg>
                  <p class="ml-sp-2 text-[18px]"> <?= $readingTime; ?> min.</p>
                </div>
              </div>
              <p><?= get_the_excerpt(); ?></p>
              <div class="grid items-end justify-start grid-flow-col gap-sp-4 mb-base5-4">
                <?php if ($tags) : foreach ($tags as $tag) : ?>
                    <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="px-4 py-3 no-underline rounded-pill bg-lavender-200 hover:bg-lavender-300"><?= $tag->name; ?></a>
                <?php endforeach;
                endif; ?>
              </div>
              <p><a href="https://www.charliehealth.com/clinical-content-advisory-council">Learn more about our Clinical Review Process</a></p>
              <div class="lg:noshow">
                <?php if ($toc) : ?>
                  <div class="rounded-md toc-container bg-lavender-100 mt-base5-6">
                    <div class="flex cursor-pointer toc-heading lg:p-base5-6 p-base5-3">
                      <p class="mb-0 text-h3-base">Table of Contents</p>
                      <div class="flex items-center ml-auto toggle">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.175 14.7297L6.61895 14.7297L6.61895 16.3797H15.175L15.175 24.9356L16.825 24.9356L16.825 16.3797H25.3809L25.3809 14.7297L16.825 14.7297L16.825 6.17362L15.175 6.17362L15.175 14.7297Z" fill="#161A3D" />
                        </svg>
                      </div>
                    </div>
                    <div class="overflow-hidden transition-all duration-500 ease-in-out toc-content max-h-0">
                      <div id="tocMobile" class="flex flex-col items-start pt-0 lg:pt-0 lg:p-sp-8 p-sp-4 gap-sp-1"></div>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="rounded-md bg-grey-cool mt-base5-6 lg:p-base5-6 p-base5-3">
                  <h3 class="font-heading-serif">Personalized intensive therapy from home</h3>
                  <p>Ready to start healing?</p>
                  <div class="flex flex-col lg:flex-wrap lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
                    <a href="/form" class="ch-button button-primary-ch">Get Started</a>
                    <a href="tel:+18664848218" class="ch-button button-secondary-ch">1 (866) 484-8218</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="divider my-base5-8 bg-grey-demension"></div>
            <div id="theContent">
              <?php the_content(); ?>
              <?php if ($references) : ?>
                <div class="divider mb-sp-4"></div>
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
<?php
$newsletterImage = get_field('image', 'option');
$headline = get_field('headline', 'option');
$subhead = get_field('subhead', 'option');
?>
<div id="newsletterPopupBlogPost" class="bg-[rgba(0,0,0,.7)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade">
  <div class="transition-all duration-300 section-xs">
    <div class="relative rounded-md container-sm bg-cream !max-w-[950px]">
      <div class="absolute top-0 right-0 z-10 cursor-pointer">
        <img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/close-x.svg" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0 invert lg:invert-0">
      </div>
      <div class="grid lg:grid-cols-[1fr_2fr] items-center lg:h-[500px]">
        <div class="relative h-full">
          <img src="https://www.charliehealth.com/wp-content/uploads/2024/08/Clinician_07-1.png.webp" alt="A young adult on a couch contemplating virtual therapy for depression at Charlie Health" class="object-cover w-full h-full lg:rounded-tl-md lg:rounded-tr-none lg:rounded-bl-md rounded-t-md max-h-[20vh] lg:max-h-none">
          <img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/logos/shield.svg" alt="Charlie Health shield logo" class="w-[2rem] absolute lg:bottom-base5-5 lg:left-base5-5 bottom-base5-3 left-base5-3">
        </div>
        <div class="lg:p-base5-10 p-base5-3">
          <div class="flex flex-col justify-center">
            <p class="text-h1-base lg:text-h1-lg text-h2">Get the mental health treatment you <mark class="bg-yellow-100 rounded-lg">deserve</mark></p>
            <p class="text-h4-base lg:mb-base5-10 mb-base5-5">Need additional mental health support? Charlie Health can help. Get started with virtual intensive therapy now.</p>
            <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full ">
              <a href="https://www.charliehealth.com/form" class="ch-button button-primary-ch">Get Started</a>
              <a href="https://www.charliehealth.com/intensive-outpatient-iop" class="ch-button button-secondary-ch">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="popupScripts">
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      // Function to create a cookie
      function createCookie(name, value, days) {
        var expires = '';
        if (days) {
          var date = new Date();
          date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
          expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + value + expires + '; path=/';
      }

      // Function to check if the cookie exists
      function getCookie(name) {
        var nameEQ = name + '=';
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
          var cookie = cookies[i];
          while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1, cookie.length);
          }
          if (cookie.indexOf(nameEQ) === 0) {
            return cookie.substring(nameEQ.length, cookie.length);
          }
        }
        return null;
      }

      function handleTiming() {
        if (!getCookie('newsletter_popup')) {
          var modal = document.getElementById('newsletterPopupBlogPost');

          modal.classList.toggle('modal-fade');

          // Trigger VWO Event for Modal Open
          window.VWO = window.VWO || [];
          VWO.event = VWO.event || function() {
            VWO.push(["event"].concat([].slice.call(arguments)))
          };

          VWO.event("modalOpen");
          createCookie('newsletter_popup', 'true', 1);
          modal.addEventListener('click', (event) => {
            if (event.target.id === 'newsletterPopupBlogPost') {
              modal.classList.toggle('modal-fade');
            }
          });
          const closeButton = modal.querySelector('.modal-close');
          closeButton.addEventListener('click', () => {
            modal.classList.toggle('modal-fade');
          });
        }
      }
      setTimeout(() => {
        handleTiming();
      }, 8000);
    });
  </script>

</div>
<?php get_footer(); ?>