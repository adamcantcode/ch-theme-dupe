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

$author                = get_field('by_author');
$medicalReviewer       = get_field('medical_reviewer');
$customMedicalReviewer = get_field('custom_medical_review');
$date                  = get_field('date') ?: '';
$updatedDate           = get_field('select_updated_date') ?: '';
$relatedPosts          = get_field('related_posts') ?: '';
$toc                   = get_field('toc') ?: '';
$prefooter             = get_field('prefooter_cta') ?: '';
$references            = get_field('references') ?: '';

$audiences = get_the_terms(get_the_ID(), 'category');
$tags      = get_the_terms(get_the_ID(), 'post_tag');

$wordCount      = str_word_count(strip_tags(get_the_content()));
$wordsPerMinute = 238;
$readingTime    = ceil($wordCount / $wordsPerMinute);
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
          <h1 class="font-heading-serif text-h2 lg:text-h2-lg"><?= get_the_title(); ?></h1>
          <?php if (!$updatedDate) : ?>
            <p class="mb-base5-2"><?= $date; ?></p>
          <?php elseif ($updatedDate) : ?>
            <p class="mb-base5-2">Updated: <?= $date; ?></p>
          <?php endif; ?>
          <div class="flex items-center mb-sp-6">
            <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22" fill="#46496D" class="inline-block">
              <path d="M352.587-840v-87.413h254.826V-840H352.587Zm83.826 446.696h87.174v-240.718h-87.174v240.718ZM480-65.413q-75.913 0-142.849-29.071-66.937-29.072-117.011-79.055-50.075-49.982-79.173-116.917t-29.098-142.848q0-75.913 29.12-142.837 29.12-66.924 79.185-116.989 50.065-50.066 116.989-79.185 66.924-29.12 142.837-29.12 62.478 0 120.435 20 57.956 20 108.195 58.239l58.87-58.869 61.5 61.5-58.869 58.869q38.239 50.24 58.119 108.077 19.881 57.837 19.881 120.315 0 75.913-29.098 142.848-29.098 66.935-79.173 116.917-50.074 49.983-117.011 79.055Q555.913-65.413 480-65.413Zm0-91q115.043 0 196.087-80.924 81.043-80.924 81.043-195.967 0-115.044-81.043-196.087Q595.043-710.435 480-710.435q-115.043 0-196.087 81.044-81.043 81.043-81.043 196.087 0 115.043 81.043 195.967Q364.957-156.413 480-156.413Zm0-276.891Z" />
            </svg>
            <p class="mb-0 font-bold ml-sp-2"> <?= $readingTime; ?> min.</p>
          </div>
          <p><?= get_the_excerpt(); ?></p>
          <p class="mb-0">By: <a href="<?= get_the_permalink($author->ID); ?>"><?= $author->post_title; ?></a></p>
          <?php if (!empty($medicalReviewer)) : ?>
            <p class="mb-0">Clinically Reviewed By: <a href="<?= get_the_permalink($medicalReviewer->ID); ?>"><?= $medicalReviewer->post_title; ?></a></p>
            <p><a href="https://www.charliehealth.com/clinical-content-advisory-council">Learn more about our Clinical Review Process</a></p>
          <?php elseif (!empty($customMedicalReviewer)) : ?>
            <p class="mb-0">Clinically Reviewed By: <a href="<?= $customMedicalReviewer['url']; ?>" target="<?= $customMedicalReviewer['target']; ?>"><?= $customMedicalReviewer['title']; ?></a></p>
            <p><a href="https://www.charliehealth.com/clinical-content-advisory-council">Learn more about our Clinical Review Process</a></p>
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
                    case 'for-myself':
                      $audienceClass = 'teens-and-young-adults';
                      break;
                    case 'for-a-loved-one':
                      $audienceClass = 'families-and-caregivers';
                      break;
                    case 'for-providers':
                      $audienceClass = 'providers';
                      break;
                    default:
                      $audienceClass = '';
                      break;
                  }
                  ?>
                  <a href="<?= get_term_link($audience->slug, 'category'); ?>" class="px-4 py-3 no-underline rounded-pill text-p-base bg-tag-gray <?= $audienceClass; ?>"><?= $audience->name; ?></a>
              <?php endforeach;
              endif; ?>
            </div>
            <div class="grid items-end justify-start grid-flow-col gap-sp-4">
              <?php if ($tags) : foreach ($tags as $tag) : ?>
                  <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="px-4 py-3 no-underline rounded-pill text-p-base bg-tag-gray"><?= $tag->name; ?></a>
              <?php endforeach;
              endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="invisible opacity-0 noshow back-to-top top-[150px] left-sp-10 mb-sp-16 w-fit translate-y-base5-3">
    <a href="#mainArticleContent" class="no-underline text-h3-base font-heading-serif">Back to top</a>
  </div>
  <?php if ($toc) : ?>
    <section class="section-xs">
      <div class="container-sm">
        <div class="rounded-md toc-container bg-light-purple">
          <div class="flex cursor-pointer toc-heading lg:p-sp-8 p-sp-4">
            <p class="mb-0 text-h3-base">Table of Contents</p>
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
<?php if (!$prefooter) : ?>
  <?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
<?php endif; ?>
<?php if ($relatedPosts) : ?>
  <section class="section bg-grey-cool">
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
          <img src="https://www.charliehealth.com/wp-content/uploads/2024/06/woman-on-couch.png.webp" alt="A young adult on a couch contemplating virtual therapy for depression at Charlie Health" class="object-cover w-full h-full lg:rounded-tl-md lg:rounded-tr-none lg:rounded-bl-md rounded-t-md max-h-[20vh] lg:max-h-none">
          <img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/logos/shield.svg" alt="Charlie Health shield logo" class="w-[2rem] absolute lg:bottom-base5-5 lg:left-base5-5 bottom-base5-3 left-base5-3">
        </div>
        <div class="lg:p-base5-10 p-base5-3">
          <div class="flex flex-col justify-center">
            <p class="text-h1-base lg:text-h1-lg text-h2">Get the mental health treatment you <mark class="bg-yellow-100 rounded-lg">deserve</mark></p>
            <p class="text-h4-base lg:mb-base5-10 mb-base5-5">Need additional mental health support? Charlie Health can help. Get started with virtual intensive therapy now.</p>
            <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full ">
              <a href="https://www.charliehealth.com/form" class="ch-button button-primary">Get Started</a>
              <a href="https://www.charliehealth.com/intensive-outpatient-iop" class="ch-button button-secondary">Learn More</a>
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
      console.log('loaded');
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

      // Function to handle the scroll event
      window.handleScrollVWO = function(event) {
        var scrollPosition =
          window.pageYOffset || document.documentElement.scrollTop;
        var windowHeight = window.innerHeight;
        var scrollThreshold = windowHeight * 2.5; // Adjust this value as needed

        // Check if the user has scrolled past the threshold and the cookie doesn't exist
        if (scrollPosition > scrollThreshold && !getCookie('newsletter_popup')) {
          // Change the class of an element
          var modal = document.getElementById('newsletterPopupBlogPost');
          modal.classList.toggle('modal-fade');

          // Trigger VWO Event for Modal Open
          window.VWO = window.VWO || [];
          VWO.event = VWO.event || function() {
            VWO.push(["event"].concat([].slice.call(arguments)))
          };

          VWO.event("modalOpen");

          // Create the cookie to prevent further pop-ups
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

          // Remove the scroll event listener
          window.removeEventListener('scroll', handleScrollVWO);
        }
      }

      // Attach the scroll event listener
      window.addEventListener('scroll', handleScrollVWO);
    });
  </script>

</div>
<?php get_footer(); ?>