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
              const checkButton = document.querySelector(".fsNextButton");

              checkButton.addEventListener("click", function() {
                setTimeout(() => {
                  // Get the width of the progress bar in pixels
                  const progressBarWidth = parseFloat(getComputedStyle(progressBar).width);

                  // Get the width of the parent container in pixels
                  const containerWidth = parseFloat(getComputedStyle(progressBar.parentElement).width);

                  // Calculate the progress percentage
                  const progressPercentage = (progressBarWidth / containerWidth) * 100;

                  if (progressPercentage > 33) {
                    // Do something if progress is greater than 33%
                    console.log("Progress is greater than 33%");
                  }

                  if (progressPercentage > 50) {
                    // Do something if progress is greater than 50%
                    console.log("Progress is greater than 50%");
                  }
                  if (progressPercentage > 66) {
                    // Do something if progress is greater than 50%
                    console.log("Progress is greater than 66%");
                  }

                  // You can add more conditions based on your needs
                }, 1000);
              });
            });
          </script>
          <div style="text-align:right; font-size:x-small;">
          </div>
        </div>
        <div class="relative">
          <div class="absolute opacity-100 mx-sp-16 mt-sp-16">
            <div class="rounded-md p-sp-8 bg-purple-gradient-end">
              <h3>This program saved my lufe</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum ipsam dignissimos dolor quibusdam veniam eligendi aliquam amet cupiditate! Sint corrupti enim assumenda corporis, iste magnam quisquam possimus, provident, dolor dolorum doloribus! Itaque alias eum iste fugiat dicta perspiciatis debitis ratione, fugit totam amet! Fugiat, blanditiis!</p>
              <p>--Elora</p>
            </div>
          </div>
          <div class="absolute opacity-0 mx-sp-16 mt-sp-16">
            <div class="rounded-md p-sp-8 bg-purple-gradient-start">
              <h3>This program saved my lufe</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum ipsam dignissimos dolor quibusdam veniam eligendi aliquam amet cupiditate! Sint corrupti enim assumenda corporis, iste magnam quisquam possimus, provident, dolor dolorum doloribus! Itaque alias eum iste fugiat dicta perspiciatis debitis ratione, fugit totam amet! Fugiat, blanditiis!</p>
              <p>--Elora</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>