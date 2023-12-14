<?php
/*
Template Name: Form Page
Template Post Type: page
*/
?>

<?php get_header(); ?>

<div class="section">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-sp-8">
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
                  quotes.forEach(quote => {
                    quote.classList.add('opacity-0')
                    quote.classList.remove('opacity-100')
                  });
                  quotes[1].classList.remove('opacity-0');
                  quotes[1].classList.add('opacity-100');
                  quotes[1].classList.remove('opacity-0');
                }

                if (progressPercentage >= 50) {
                  quotes.forEach(quote => {
                    quote.classList.add('opacity-0')
                  });
                  quotes[2].classList.add('opacity-100');
                  quotes[2].classList.remove('opacity-0');
                }
                if (progressPercentage >= 66) {
                  quotes.forEach(quote => {
                    quote.classList.add('opacity-0')
                  });
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
                  quotes.forEach(quote => {
                    quote.classList.add('opacity-0')
                  });
                  quotes[0].classList.add('opacity-100');
                  quotes[0].classList.remove('opacity-0');
                  quotes[1].classList.add('opacity-0');
                  quotes[1].classList.remove('opacity-100');
                }

                if (progressPercentage >= 33) {
                  quotes.forEach(quote => {
                    quote.classList.add('opacity-0')
                  });
                  quotes[1].classList.add('opacity-100');
                  quotes[1].classList.remove('opacity-0');
                  quotes[2].classList.add('opacity-0');
                  quotes[2].classList.remove('opacity-100');
                }

                if (progressPercentage >= 50) {
                  quotes.forEach(quote => {
                    quote.classList.add('opacity-0')
                  });
                  quotes[2].classList.add('opacity-100');
                  quotes[2].classList.remove('opacity-0');
                  quotes[3].classList.add('opacity-0');
                  quotes[3].classList.remove('opacity-100');
                }
                if (progressPercentage >= 66) {
                  quotes.forEach(quote => {
                    quote.classList.add('opacity-0')
                  });
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
      <div class="grid items-center">
        <img src="https://www.charliehealth.com/wp-content/uploads/2023/11/Device_Laptop.png.webp" alt="Illustration of Charlie Health client using laptop for Virtual IOP Therapy">
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>