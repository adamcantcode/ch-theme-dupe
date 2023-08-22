<?php
/*
Template Name: Form Page
Template Post Type: page
*/
?>

<?php get_header(); ?>

<main id="primary" class="site-main mt-[68px]">
  <div class="section">
    <div class="container">
      <div class="grid grid-cols-1 lg:grid-cols-2">
        <div>
          <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/test_charlie_health_webform_copy_1"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/test_charlie_health_webform_copy_1" title="Online Form">Online Form - [LIVE] Charlie Health Webform 2.0</a></noscript>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
              const progressBar = document.querySelector(".fsProgressBar");
              const nextButton = document.querySelector(".fsNextButton");
              const prevButton = document.querySelector(".fsPreviousButton");

              nextButton.addEventListener("click", function() {
                setTimeout(() => {
                  const progressBarWidth = parseFloat(getComputedStyle(progressBar).width);
                  const containerWidth = parseFloat(getComputedStyle(progressBar.parentElement).width);
                  const progressPercentage = (progressBarWidth / containerWidth) * 100;
                  const quotes = document.querySelectorAll('.quote');

                  if (progressPercentage >= 33) {
                    quotes[1].classList.add('opacity-100');
                    quotes[1].classList.remove('opacity-0');
                  }

                  if (progressPercentage >= 50) {
                    quotes[2].classList.add('opacity-100');
                    quotes[2].classList.remove('opacity-0');
                  }
                  if (progressPercentage >= 66) {
                    quotes[3].classList.add('opacity-100');
                    quotes[3].classList.remove('opacity-0');
                  }
                }, 100);
              });
              prevButton.addEventListener("click", function() {
                setTimeout(() => {
                  const progressBarWidth = parseFloat(getComputedStyle(progressBar).width);
                  const containerWidth = parseFloat(getComputedStyle(progressBar.parentElement).width);
                  const progressPercentage = (progressBarWidth / containerWidth) * 100;
                  const quotes = document.querySelectorAll('.quote');

                  if (progressPercentage < 33) {
                    console.log("Progress is less than 33%");
                    quotes[0].classList.add('opacity-100');
                    quotes[0].classList.remove('opacity-0');
                    quotes[1].classList.add('opacity-0');
                    quotes[1].classList.remove('opacity-100');
                  }

                  if (progressPercentage >= 33) {
                    console.log("Progress is greater than 33%");
                    quotes[1].classList.add('opacity-100');
                    quotes[1].classList.remove('opacity-0');
                    quotes[2].classList.add('opacity-0');
                    quotes[2].classList.remove('opacity-100');
                  }

                  if (progressPercentage >= 50) {
                    console.log("Progress is greater than 50%");
                    quotes[2].classList.add('opacity-100');
                    quotes[2].classList.remove('opacity-0');
                    quotes[3].classList.add('opacity-0');
                    quotes[3].classList.remove('opacity-100');
                  }
                  if (progressPercentage >= 66) {
                    console.log("Progress is greater than 66%");
                    quotes[3].classList.add('opacity-100');
                    quotes[3].classList.remove('opacity-0');
                  }
                }, 100);
              });
            });
          </script>
          <div style="text-align:right; font-size:x-small;">
          </div>
        </div>
        <div class="grid">
          <div class="grid-cols-1 transition-[1000ms] opacity-100 lg:mx-sp-16 lg:mt-sp-16 mt-sp-4 quote" style="grid-area: 1/1;">
            <div class="rounded-md p-sp-8 bg-purple-gradient-end">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="ml-auto w-sp-10 mb-sp-8">
              <h3 class="lg:text-h2-lg text-h2">“This program saved my life.”</h3>
              <p>I came to CH with so much trauma and undiagnosed mental health issues. I couldn’t see how things could possibly get better for me, but Charlie Health gave me reason to keep going, to keep trying. This program saved my life.</p>
              <p class="mb-0">—Elora</p>
            </div>
          </div>
          <div class="grid-cols-1 transition-[1000ms] opacity-0 lg:mx-sp-16 lg:mt-sp-16 mt-sp-4 quote" style="grid-area: 1/1;">
            <div class="rounded-md p-sp-8 bg-purple-gradient-start">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="ml-auto w-sp-10 mb-sp-8">
              <h3 class="lg:text-h2-lg text-h2">“This program saved my life.”</h3>
              <p>I came to CH with so much trauma and undiagnosed mental health issues. I couldn’t see how things could possibly get better for me, but Charlie Health gave me reason to keep going, to keep trying. This program saved my life.</p>
              <p class="mb-0">—Elora</p>
            </div>
          </div>
          <div class="grid-cols-1 transition-[1000ms] opacity-0 lg:mx-sp-16 lg:mt-sp-16 mt-sp-4 quote" style="grid-area: 1/1;">
            <div class="rounded-md p-sp-8 bg-dark-blue">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="ml-auto w-sp-10 mb-sp-8">
              <h3 class="lg:text-h2-lg text-h2">“This program saved my life.”</h3>
              <p>I came to CH with so much trauma and undiagnosed mental health issues. I couldn’t see how things could possibly get better for me, but Charlie Health gave me reason to keep going, to keep trying. This program saved my life.</p>
              <p class="mb-0">—Elora</p>
            </div>
          </div>
          <div class="grid-cols-1 transition-[1000ms] opacity-0 lg:mx-sp-16 lg:mt-sp-16 mt-sp-4 quote" style="grid-area: 1/1;">
            <div class="rounded-md p-sp-8 bg-dark-teal">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="ml-auto w-sp-10 mb-sp-8">
              <h3 class="lg:text-h2-lg text-h2">“This program saved my life.”</h3>
              <p>I came to CH with so much trauma and undiagnosed mental health issues. I couldn’t see how things could possibly get better for me, but Charlie Health gave me reason to keep going, to keep trying. This program saved my life.</p>
              <p class="mb-0">—Elora</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>