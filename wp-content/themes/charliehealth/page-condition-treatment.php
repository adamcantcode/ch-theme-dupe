<?php
/*
Template Name: Condition Treatment
Template Post Type: treatment-modalities, areas-of-care, page
*/
?>

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

$date                  = get_field('date') ?: '';
$updatedDate           = get_field('select_updated_date') ?: '';

$wordCount      = str_word_count(strip_tags(get_the_content()));
$wordsPerMinute = 238;
$readingTime    = ceil($wordCount / $wordsPerMinute);
?>

<div id="progressBar" class="fixed z-20 transition-all duration-700 rounded-r-sm bg-purple-gradient-end h-[5px] left-0"></div>
<div id="mainArticleContent" class="relative z-10 main-article-content">
  <section class="section">
    <div class="container">
      <div class="grid lg:grid-cols-[4fr_1fr_7fr]">
        <div class="min-w-0">
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full aspect-square nolazy lg:mb-0 mb-base5-4">
          <div class="lg:top-[125px] noshow sticky lg:block">
            <div class="rounded-md bg-grey-cool mt-base5-6 lg:p-base5-6 p-base5-3">
              <h3 class="font-heading-serif">Personalized intensive therapy from home</h3>
              <p>Ready to start healing?</p>
              <div class="flex flex-col lg:flex-wrap lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
                <a href="/form" class="ch-button button-primary-ch">Get Started</a>
                <a href="tel:+19862060414" class="ch-button button-secondary-ch">1 (986) 206-0414</a>
              </div>
            </div>
          </div>
        </div>
        <div class="min-w-0"></div>
        <div class="min-w-0">
          <article id="articleContent">
            <div>
              <h1 class="font-heading-serif text-h2 lg:text-h2-lg"><?= get_the_title(); ?></h1>
              <div class="flex items-center gap-base5-10 mb-base5-4">
                <div class="flex items-center">
                  <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3906 5.45312V2.3125H15.4062C15.5094 2.3125 15.5938 2.22812 15.5938 2.125V0.8125C15.5938 0.709375 15.5094 0.625 15.4062 0.625H0.59375C0.490625 0.625 0.40625 0.709375 0.40625 0.8125V2.125C0.40625 2.22812 0.490625 2.3125 0.59375 2.3125H2.60938V5.45312C2.60938 7.36328 3.60312 9.04375 5.10312 10C3.60312 10.9563 2.60938 12.6367 2.60938 14.5469V17.6875H0.59375C0.490625 17.6875 0.40625 17.7719 0.40625 17.875V19.1875C0.40625 19.2906 0.490625 19.375 0.59375 19.375H15.4062C15.5094 19.375 15.5938 19.2906 15.5938 19.1875V17.875C15.5938 17.7719 15.5094 17.6875 15.4062 17.6875H13.3906V14.5469C13.3906 12.6367 12.3969 10.9563 10.8969 10C12.3969 9.04375 13.3906 7.36328 13.3906 5.45312ZM11.7031 14.5469V17.6875H4.29688V14.5469C4.29688 13.5578 4.68125 12.6273 5.38203 11.9289C6.08047 11.2281 7.01094 10.8438 8 10.8438C8.98906 10.8438 9.91953 11.2281 10.618 11.9289C11.3188 12.6273 11.7031 13.5578 11.7031 14.5469ZM11.7031 5.45312C11.7031 6.44219 11.3188 7.37266 10.618 8.07109C9.91953 8.77188 8.98906 9.15625 8 9.15625C7.01094 9.15625 6.08047 8.77188 5.38203 8.07109C5.0367 7.7284 4.76293 7.32048 4.57664 6.87105C4.39035 6.42161 4.29525 5.93963 4.29688 5.45312V2.3125H11.7031V5.45312Z" fill="#161A3D" />
                  </svg>
                  <p class="ml-sp-2 text-[18px]"> <?= $readingTime; ?> min.</p>
                </div>
              </div>
              <p class="mb-0"><?= get_the_excerpt(); ?></p>
            </div>
            <div class="divider my-base5-8 bg-grey-demension"></div>
            <div id="theContent">
              <?php the_content(); ?>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
</div>
</section>
<?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
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