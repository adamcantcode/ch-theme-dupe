<?php
$heading = get_field('heading');
$subhead = get_field('subhead');
$link = get_field('link');
$style = get_field('style');

if (empty($link)) {
  $link = [
    'url' => site_url('/form'),
    'title' => 'Get started',
    'target' => '_blank',
  ];
}

// For BG color
$blockClasses = '';
/** Default Background */
if ($style === 'value') {
  $background = 'bg-cream';
} elseif ($style === 'full') {
  $background = 'bg-lightest-purple';
} elseif ($style === 'newsletter') {
  $background = 'bg-cream';
} elseif ($style === 'large') {
  $background = '';
} else {
  $background = 'bg-cream';
}
$imgUrl = '/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg';
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
  if ($background === 'bg-darker-blue') {
    $blockClasses .= '[&_*]:text-white ';
    $imgUrl = '/wp-content/themes/charliehealth/resources/images/logos/shield.svg';
  }
}
$blockClasses .= $background . ' ';
?>

<?php if ($style === 'value') : ?>
  <div class="flex justify-center rounded-sm lg:p-sp-14 p-sp-6 mb-sp-6 <?= $blockClasses; ?>">
    <div class="flex flex-col items-center justify-center text-center max-w-[640px]">
      <img src="<?= site_url($imgUrl); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
      <p class="text-h2-base"><?= $heading; ?></p>
      <p class="mb-base5-6"><?= $subhead; ?></p>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'value_image') : ?>
  <div class="grid gap-sp-5 grid-cols-1 lg:grid-cols-[4fr_8fr]">
    <img src="<?= get_field('image')['url']; ?>" alt="<?= get_field('image')['alt']; ?>" class="order-2 lg:order-1">
    <div class="flex justify-center rounded-sm lg:p-sp-14 p-sp-6 mb-sp-6 order-1 lg:order-2 <?= $blockClasses; ?>">
      <div class="flex flex-col items-center justify-center text-center">
        <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
        <p class="text-darkest-blue lg:text-[2.5rem] text-h2-lg lg:leading-tight mb-sp-5 font-heading-serif"><?= $heading; ?></p>
        <p class="text-darkest-blue"><?= $subhead; ?></p>
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'large') : ?>
  <div class="rounded-sm <?= $blockClasses; ?>">
    <p class="text-white lg:text-h1-lg text-h2-lg lg:mb-sp-16 mb-sp-12 font-heading-serif max-w-[850px]"><?= $heading; ?></p>
    <?php if ($subhead) : ?>
      <p class="text-white"><?= $subhead; ?></p>
    <?php endif; ?>
    <div class="flex justify-between">
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] lg:block noshow">
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'video') : ?>
  <section class="relative section-bg-video section">
    <style>
      .vimeo-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
        overflow: hidden;
        /* Behind the overlay and content */
      }

      .vimeo-container iframe {
        width: 100vw;
        height: 56.25vw;
        /* Given a 16:9 aspect ratio, 9/16*100 = 56.25 */
        /* min-height: 100vh; */
        min-width: 177.77vh;
        /* Given a 16:9 aspect ratio, 16/9*100 = 177.77 */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(22, 26, 61, 0.6);
        /* 60% opacity blue overlay */
        z-index: 2;
        /* On top of the video but behind the content */
      }
    </style>
    <!-- Video container with full width and height -->
    <div class="vimeo-container">
      <iframe src="https://player.vimeo.com/video/1019966136?&amp;background=1&amp;autoplay=1&amp;loop=1" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
    </div>

    <!-- Blue overlay -->
    <div class="overlay"></div>

    <!-- Content container -->
    <div class="container relative z-[2]">
      <div class="rounded-sm">
        <p class="text-white lg:text-h1-lg text-h2-lg lg:mb-sp-16 mb-sp-12 font-heading-serif max-w-[850px]">Comprehensive, personalized therapy from home.</p>
        <div class="flex justify-between">
          <div class="flex flex-col lg:flex-wrap lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full justify-start">
            <a href="/form" class="ch-button button-primary inverted" target="_self">Get Started</a>
            <a href="tel:+18664848218" class="ch-button button-secondary inverted" target="_self">1 (866) 484-8218</a>
          </div>
          <img decoding="async" src="https://wpch.local/wp-content/themes/charliehealth/resources/images/logos/shield.svg" alt="Charlie Health shield logo" class="w-[3rem] lg:block noshow">
        </div>
      </div>
    </div>
  </section>
  <script>
    // Get the .section-bg-video element
    const bgVideoSection = document.querySelector('.section-bg-video');

    if (bgVideoSection) {
      // Get the closest parent <section> element (the one we want to remove)
      const parentSection = bgVideoSection.closest('section.bg-primary-black-blue');

      if (parentSection) {
        // Move the .section-bg-video outside its current parent section
        parentSection.parentNode.insertBefore(bgVideoSection, parentSection);

        // Now remove the parent section
        parentSection.remove();
      }
    }
  </script>
<?php endif; ?>
<?php if ($style === 'quote') : ?>
  <div <?= $blockClasses; ?>">
    <div class="grid lg:grid-cols-[6fr_1fr_5fr] gap-base5-4 items-center">
      <div>
        <h4>In their words</h4>
        <h2>“<?= $heading; ?>”</h2>
        <p><?= $subhead; ?></p>
      </div>
      <div class="h-full mx-auto">
        <div class="h-full w-[2px] bg-primary"></div>
      </div>
      <div>
        <InnerBlocks />
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'full') : ?>
  <div class="lg:grid lg:grid-cols-2 justify-between rounded-md lg:p-sp-6 p-sp-4 items-center gap-sp-8 flex flex-col lg:flex-row <?= $blockClasses; ?>">
    <div>
      <p class="text-h2-base"><?= $heading; ?></p>
      <?php if ($subhead) : ?>
        <p class="mb-0 mt-sp-4"><?= $subhead; ?></p>
      <?php endif; ?>
    </div>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
<?php endif; ?>
<?php if ($style === 'newsletter') : ?>
  <div class="grid lg:grid-cols-[1.25fr_2fr] rounded-md p-sp-6 gap-base5-4 <?= $blockClasses; ?>">
    <div>
      <h2 class="font-heading"><?= $heading; ?></h2>
    </div>
    <div>
      <?php if ($subhead) : ?>
        <p class="noshow lg:block"><?= $subhead; ?></p>
      <?php endif; ?>
      <div id="newsletterInContent" class="newsletter-revamp">
        <?php include(get_template_directory() . '/includes/newsletter-form.php'); ?>
      </div>
      <h5 class="mt-base5-2">You can unsubscribe anytime.</h5>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'newsletter-large') : ?>
  <div class="grid lg:grid-cols-[7fr_5fr] lg:gap-base5-4 gap-base5-8 items-end [&_*]:text-white">
    <div>
      <h2>From Charlie Health to your inbox</h2>
      <div class="flex items-center gap-base5-4 mb-base5-4">
        <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.87266 5.03906C2.37458 5.03906 1.16016 6.25349 1.16016 7.75156V23.2516C1.16016 24.7496 2.37458 25.9641 3.87266 25.9641H27.1227C28.6207 25.9641 29.8352 24.7496 29.8352 23.2516V7.75156C29.8352 6.25349 28.6207 5.03906 27.1227 5.03906H3.87266ZM3.35599 11.8664L15.4971 16.6827L27.6393 11.866V23.2516C27.6393 23.5369 27.408 23.7682 27.1227 23.7682H3.87266C3.58731 23.7682 3.35599 23.5369 3.35599 23.2516V11.8664ZM27.7685 11.6767V23.2516C27.7685 23.6082 27.4793 23.8974 27.1227 23.8974H3.87266C3.85931 23.8974 3.84606 23.897 3.83292 23.8962C3.84672 23.8971 3.86065 23.8975 3.87467 23.8975H27.1247C27.4814 23.8975 27.7705 23.6084 27.7705 23.2517V11.6759L27.7685 11.6767ZM3.87266 7.2349H27.1227C27.408 7.2349 27.6393 7.46621 27.6393 7.75156V9.50365L15.4971 14.3204L3.35599 9.50413V7.75156C3.35599 7.46622 3.58731 7.2349 3.87266 7.2349ZM27.7685 7.75156V9.59137L15.4979 14.459L27.7705 9.5915V7.75169C27.7705 7.4084 27.5027 7.12767 27.1646 7.10707C27.5017 7.12866 27.7685 7.40896 27.7685 7.75156ZM1.28932 7.75156C1.28932 6.32483 2.44592 5.16823 3.87266 5.16823H27.1227C27.1773 5.16823 27.2316 5.16993 27.2855 5.17328C27.2323 5.17001 27.1787 5.16836 27.1247 5.16836H3.87467C2.44794 5.16836 1.29134 6.32495 1.29134 7.75169V23.2517C1.29134 24.6237 2.36098 25.746 3.71187 25.83C2.36003 25.747 1.28932 24.6243 1.28932 23.2516V7.75156Z" fill="white" />
        </svg>
        <p>Sign up for free and stay up to date on research advancements, mental health tips, mental health in the news, and expertise on managing mental health.</p>
      </div>
      <div id="newsletterInContent" class="newsletter-revamp">
        <?php $rand = random_int(1, 10000); ?>
        <form id="iterable_optin_<?= $rand; ?>" action="//links.iterable.com/lists/publicAddSubscriberForm?publicIdString=f399c731-e9b4-4208-9766-75bbca297d9a" method="POST" class="flex flex-col w-full lg:flex-row gap-base5-2 email">
          <input type="email" name="email" onfocus="if(this.value===this.defaultValue){this.value='';}" onblur="if(this.value===''){this.value=this.defaultValue;}" placeholder="Email" class="w-full bg-white rounded-md px-base5-3 py-base5-2 text-primary placeholder:text-grey-deactivated">
          <input type="submit" value="Subscribe" class="cursor-pointer ch-button button-secondary inverted px-base5-3 py-base5-2 text-[16px]">
        </form>
        <h4 id="responseMessage_<?= $rand; ?>" class="noshow">Thank you for signing up!</h4>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('iterable_optin_<?= $rand; ?>');
            var responseMessage = document.getElementById('responseMessage_<?= $rand; ?>');

            form.addEventListener('submit', function(event) {
              event.preventDefault();

              var formData = new FormData(form);
              var xhr = new XMLHttpRequest();

              xhr.open('POST', form.action, true);
              xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                  form.remove();
                  responseMessage.classList.remove('noshow');
                  form.reset();
                } else {
                  console.error('Submission failed:', xhr.statusText);
                }
              };

              xhr.onerror = function() {
                console.error('Request failed');
              };

              xhr.send(formData);
            });
            var submitButton = form.querySelector('input[type="submit"]');

            submitButton.addEventListener('click', function(event) {
              event.preventDefault(); // Prevent the default form submission
              form.dispatchEvent(new Event('submit', {
                'bubbles': true,
                'cancelable': true
              }));
            });
          });
        </script>
      </div>
      <h5 class="mt-base5-2 text-mini">You can unsubscribe anytime.</h5>
    </div>
    <div class="lg:justify-self-end">
      <svg width="57" height="56" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M56.6097 6.8266C56.2793 3.22984 53.3365 0.381655 49.7646 0.190652C44.9951 -0.0635506 12.0057 -0.0635506 7.23212 0.190652C3.66435 0.381655 0.721492 3.22985 0.389767 6.82941C-1.14636 23.7219 1.86257 36.7579 9.33672 45.5721C17.3738 55.0548 27.6436 55.9382 28.2423 55.9817L28.4667 56L28.742 55.9874C29.1205 55.9607 36.9649 55.3441 44.3276 48.9526L44.8121 48.5228C45.8236 47.6044 46.775 46.6191 47.66 45.5735C55.1382 36.7677 58.1472 23.7346 56.6097 6.8266ZM4.01259 17.6955C3.89962 14.195 4.00813 10.6907 4.33744 7.20439C4.41743 6.38578 4.79923 5.62875 5.40557 5.0865L25.0517 18.6884L15.5789 25.2893L4.01259 17.6955ZM12.0263 27.7653L6.29475 31.7581C5.37179 28.8295 4.73506 25.815 4.39387 22.7585L12.0263 27.7653ZM28.5796 21.1293L37.8651 27.5574L28.424 33.706L19.2018 27.6586L28.5796 21.1293ZM32.0991 18.6786L51.6007 5.09072C52.2027 5.63105 52.5823 6.38353 52.6634 7.19737C52.9948 10.6858 53.1051 14.1925 52.9937 17.6955L41.5072 25.1825L32.0991 18.6786ZM52.6083 22.7515C52.2728 25.7548 51.6533 28.7179 50.7584 31.5994L45.0709 27.667L52.6083 22.7515ZM45.9408 4.13711L28.5727 16.2363L11.0917 4.1357C15.2279 4.0725 21.8625 4.0402 28.4983 4.0402C35.1342 4.0402 41.8059 4.0725 45.9408 4.13711ZM7.77582 35.6245L15.6478 30.1472L24.7475 36.1146L13.0476 43.7407C12.8081 43.4795 12.57 43.2112 12.3346 42.9332C10.4831 40.7298 8.94811 38.2689 7.77582 35.6245ZM28.5314 51.9482H28.5204C28.2134 51.9272 22.1391 51.4482 16.0635 46.5678L28.4171 38.5162L40.83 46.6619C34.9966 51.2923 29.1948 51.8934 28.5314 51.9482ZM44.6662 42.9304C44.401 43.244 44.1335 43.546 43.8637 43.8362L32.0936 36.1118L41.4315 30.0292L49.2938 35.4714C48.1118 38.1724 46.5531 40.6847 44.6662 42.9304Z" fill="white" />
      </svg>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'dbt') : ?>
  <div class="grid lg:grid-cols-[1fr_2fr] rounded-md p-sp-6 lg:gap-sp-8 <?= $blockClasses; ?>">
    <div>
      <h2 class="mb-0"><?= $heading; ?></h2>
    </div>
    <div>
      <?php if ($subhead) : ?>
        <p class="noshow lg:block"><?= $subhead; ?></p>
      <?php endif; ?>
      <div id="newsletterInContent" class="newsletter-revamp">
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/dbt_skills_book"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/dbt_skills_book" title="Online Form">Online Form - DBT [gated]</a></noscript>
        <script>
          var containerDBT = document.currentScript.parentNode; // DBT Guide container
          var elementToCutDBT = containerDBT.querySelector("#fsSubmitButton5462843"); // Submit button
          var destinationElementDBT = containerDBT.querySelector("#fsCell152041959"); // Email container
          var newsletterIDDBT = containerDBT.id; // DBT Guide identifier
          var newsletterLPFieldDBT = containerDBT.querySelector('#field152041960'); // LP URL field
          var newsletterIDFieldDBT = containerDBT.querySelector('#field152041961'); // Type field

          if (elementToCutDBT && destinationElementDBT) {
            var clonedElementDBT = elementToCutDBT.cloneNode(true);
            elementToCutDBT.parentNode.removeChild(elementToCutDBT);
            destinationElementDBT.appendChild(clonedElementDBT);
          }

          newsletterIDFieldDBT.value = newsletterIDDBT;
          newsletterLPFieldDBT.value = window.location.href;
        </script>
      </div>
      <h6>By entering your email you agree to receive marketing communications from Charlie Health. You can unsubscribe anytime.</h6>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'sad') : ?>
  <div class="grid lg:grid-cols-[1fr_2fr] rounded-md p-sp-6 lg:gap-sp-8 <?= $blockClasses; ?>">
    <div>
      <h2 class="mb-0"><?= $heading; ?></h2>
    </div>
    <div>
      <?php if ($subhead) : ?>
        <p class="noshow lg:block"><?= $subhead; ?></p>
      <?php endif; ?>
      <div id="newsletterInContent" class="newsletter-revamp">
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/dbt_skills_book_copy"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/dbt_skills_book_copy" title="Online Form">Online Form - DBT [gated] - COPY</a></noscript>
        <script>
          var containerSAD = document.currentScript.parentNode; // DBT Guide container
          var elementToCutDBT = containerSAD.querySelector("#fsSubmitButton5552306"); // Submit button
          var destinationElementDBT = containerSAD.querySelector("#fsCell155914871"); // Email container
          var newsletterIDDBT = containerSAD.id; // DBT Guide identifier
          var newsletterLPFieldDBT = containerSAD.querySelector('#field155914872'); // LP URL field
          var newsletterIDFieldDBT = containerSAD.querySelector('#field155914873'); // Type field

          if (elementToCutDBT && destinationElementDBT) {
            var clonedElementDBT = elementToCutDBT.cloneNode(true);
            elementToCutDBT.parentNode.removeChild(elementToCutDBT);
            destinationElementDBT.appendChild(clonedElementDBT);
          }

          newsletterIDFieldDBT.value = newsletterIDDBT;
          newsletterLPFieldDBT.value = window.location.href;
        </script>
      </div>
      <h6>By entering your email you agree to receive marketing communications from Charlie Health. You can unsubscribe anytime.</h6>
    </div>
  </div>
<?php endif; ?>