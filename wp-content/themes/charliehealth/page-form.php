<?php
/*
Template Name: Form Page
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php
function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
$ip = getIPAddress();
?>
<div id="userIP" class="noshow"><?= $ip; ?></div>

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
        <div class="grid-cols-1 duration-500 opacity-100 lg:mx-sp-16 lg:mt-0 mt-sp-4 quote" style="grid-area: 1/1;">
          <div class="rounded-md p-sp-8 bg-young-adult">
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="ml-auto w-sp-10 mb-sp-8">
            <h3 class="lg:text-[41px] text-h2 mb-sp-3 leading-tight">“My daughter was acting like herself again.”</h3>
            <p>I really didn’t know what to do for my daughter before Charlie Health. I’ve always felt I've been alone in this. I felt so helpless. Within her first week, my daughter was acting like herself again. Charlie Health has given my daughter and me lifelong tools to navigate her anxiety and panic attacks. I’m very impressed and very happy.</p>
            <p class="mb-0">—Tasia, parent of 17-year-old</p>
          </div>
        </div>
        <div class="grid-cols-1 duration-500 opacity-0 lg:mx-sp-16 lg:mt-0 mt-sp-4 quote" style="grid-area: 1/1;">
          <div class="rounded-md p-sp-8 bg-parent">
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="ml-auto w-sp-10 mb-sp-8">
            <h3 class="lg:text-[41px] text-h2 mb-sp-3 leading-tight">“So supportive.”</h3>
            <p>I was unsure about going into something virtual, but it was so helpful! I think being in my own space while talking about difficult things added to the safety I felt. The facilitators and staff really truly care about the well-being of group members and are so supportive.</p>
            <p class="mb-0">—Anonymous, 21, young adult</p>
          </div>
        </div>
        <div class="grid-cols-1 duration-500 opacity-0 lg:mx-sp-16 lg:mt-0 mt-sp-4 quote" style="grid-area: 1/1;">
          <div class="rounded-md p-sp-8 bg-[#E07058]">
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="ml-auto w-sp-10 mb-sp-8">
            <h3 class="lg:text-[41px] text-h2 mb-sp-3 leading-tight">“This program saved my life.”</h3>
            <p>Charlie Health has been a very helpful and supportive environment. I really like how much easier it is to get mental healthcare virtually, and the way they tailor your individual experience to your needs and your lived experiences. I would definitely recommend the program to others. It has helped me tremendously as I heal.</p>
            <p class="mb-0">—Andrew, 25, young adult</p>
          </div>
        </div>
        <div class="grid-cols-1 duration-500 opacity-0 lg:mx-sp-16 lg:mt-0 mt-sp-4 quote" style="grid-area: 1/1;">
          <div class="rounded-md p-sp-8 bg-teen">
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="ml-auto w-sp-10 mb-sp-8">
            <h3 class="lg:text-[41px] text-h2 mb-sp-3 leading-tight">“This program saved my life.”</h3>
            <p>When I got to Charlie Health, I did not want to accept any more help. But after my first group session, I was smiling again for the first time in 7 months. I connected and shared with people in ways I had been very closed off to. I loved my time here, and I looked forward to group every day. I love Charlie Health and thank them for getting me out of place I never thought I could.</p>
            <p class="mb-0">—Nia, 15, teen</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>