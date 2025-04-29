<?php get_header(); ?>

<?= the_content(); ?>
<?php if (is_front_page() && get_current_blog_id() === 1) : ?>
  <div class="homepagepopup">
    <div id="homepagePopup" class="bg-[rgba(0,0,0,.7)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade">
      <div class="transition-all duration-300 section-xs">
        <div class="relative rounded-md container-sm bg-cream !max-w-[950px]">
          <div class="absolute top-0 right-0 z-10 cursor-pointer">
            <img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/close-x.svg" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0 invert lg:invert-0">
          </div>
          <div class="grid lg:grid-cols-[1fr_2fr] items-center lg:h-[500px]">
            <div class="relative h-full">
              <img src="https://www.charliehealth.com/wp-content/uploads/2024/08/Clinician_07-1.png.webp" alt="A young adult on a couch contemplating virtual therapy for depression at Charlie Health" class="object-cover w-full h-full lg:rounded-tl-md lg:rounded-tr-none lg:rounded-bl-md rounded-t-md max-h-[20vh] lg:max-h-none">
              <img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg" alt="Charlie Health shield logo" class="w-[2rem] absolute lg:bottom-base5-5 lg:left-base5-5 bottom-base5-3 left-base5-3">
            </div>
            <div class="lg:p-base5-10 p-base5-3">
              <div class="flex flex-col justify-center">
                <p class="text-h1-base lg:text-h1-lg text-h2">Get the treatment you <mark class="bg-yellow-100 rounded-lg">deserve</mark></p>
                <p class="text-h4-base lg:mb-base5-8 mb-base5-5">Need additional support? Charlie Health can help. Get started with virtual intensive treatment now.</p>
                <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full ">
                  <a href="https://www.charliehealth.com/form" class="ch-button button-primary-ch">Get Started</a>
                  <a href="https://referrals.charliehealth.com/referral-form" class="ch-button button-secondary-ch">Make a Client</a>
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

          function handleOpen() {
            if (!getCookie('homepage_popup_exit_intent')) {
              // Trigger campaign in VWO
              window.VWO = window.VWO || [];
              window.VWO.push(['activate', false, [109], true]);

              var modal = document.getElementById('homepagePopup');

              modal.classList.toggle('modal-fade');

              // Trigger VWO Event for Modal Open
              window.VWO = window.VWO || [];
              VWO.event = VWO.event || function() {
                VWO.push(["event"].concat([].slice.call(arguments)))
              };

              VWO.event("modalOpen");
              createCookie('homepage_popup_exit_intent', 'true', 1);
              modal.addEventListener('click', (event) => {
                if (event.target.id === 'homepagePopup') {
                  modal.classList.toggle('modal-fade');

                  // Trigger close event
                  if (event.target.classList.contains('modal-fade')) {

                    window.VWO = window.VWO || [];
                    VWO.event = VWO.event || function() {
                      VWO.push(['event'].concat([].slice.call(arguments)))
                    };
                    VWO.event('modalCLose')
                  }
                }
              });
              const closeButton = modal.querySelector('.modal-close');
              closeButton.addEventListener('click', () => {
                modal.classList.toggle('modal-fade');

                // Trigger close event
                window.VWO = window.VWO || [];
                VWO.event = VWO.event || function() {
                  VWO.push(['event'].concat([].slice.call(arguments)))
                };
                VWO.event('modalCLose')
              });
            }
          }
          let exitIntentShown = false;

          function handleMouseLeave(event) {
            if (!exitIntentShown && event.clientY <= 0 && !document.querySelector('.homepagepopup').classList.contains('noshow')) {
              handleOpen();
              exitIntentShown = true;
            }
          }
          document.addEventListener('mouseleave', handleMouseLeave);
        });
      </script>
    </div>
  </div>
<?php endif; ?>
<?php if (is_front_page() && get_current_blog_id() === 3) : ?>
  <div class="homepagepopup">
    <div id="homepagePopup" class="bg-[rgba(0,0,0,.7)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade">
      <div class="transition-all duration-300 section-xs">
        <div class="relative rounded-md container-sm bg-cream !max-w-[950px]">
          <div class="absolute top-0 right-0 z-10 cursor-pointer">
            <img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/close-x.svg" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0 invert lg:invert-0">
          </div>
          <div class="grid lg:grid-cols-[1fr_2fr] items-center lg:h-[500px]">
            <div class="relative h-full">
              <img src="https://www.charliehealth.com/wp-content/uploads/2024/08/Clinician_07-1.png.webp" alt="A young adult on a couch contemplating virtual therapy for depression at Charlie Health" class="object-cover w-full h-full lg:rounded-tl-md lg:rounded-tr-none lg:rounded-bl-md rounded-t-md max-h-[20vh] lg:max-h-none">
              <img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg" alt="Charlie Health shield logo" class="w-[2rem] absolute lg:bottom-base5-5 lg:left-base5-5 bottom-base5-3 left-base5-3">
            </div>
            <div class="lg:p-base5-10 p-base5-3">
              <div class="flex flex-col justify-center">
                <p class="text-h1-base lg:text-h1-lg text-h2">Refer a client to Charlie Health today</p>
                <p class="text-h4-base lg:mb-base5-10 mb-base5-5">Virtual intensive treatment for individuals in need of more than once-weekly therapy
                </p>
                <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full ">
                  <a href="https://referrals.charliehealth.com/referral-form" class="ch-button button-primary-ch">Refer now</a>
                  <a href="https://referrals.charliehealth.com/intensive-outpatient-program" class="ch-button button-secondary-ch">Learn more</a>
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

          function handleOpen() {
            if (!getCookie('homepage_popup_exit_intent')) {
              // Trigger campaign in VWO
              window.VWO = window.VWO || [];
              window.VWO.push(['activate', false, [109], true]);

              var modal = document.getElementById('homepagePopup');

              modal.classList.toggle('modal-fade');

              // Trigger VWO Event for Modal Open
              window.VWO = window.VWO || [];
              VWO.event = VWO.event || function() {
                VWO.push(["event"].concat([].slice.call(arguments)))
              };

              VWO.event("modalOpen");
              createCookie('homepage_popup_exit_intent', 'true', 1);
              modal.addEventListener('click', (event) => {
                if (event.target.id === 'homepagePopup') {
                  modal.classList.toggle('modal-fade');

                  // Trigger close event
                  if (event.target.classList.contains('modal-fade')) {

                    window.VWO = window.VWO || [];
                    VWO.event = VWO.event || function() {
                      VWO.push(['event'].concat([].slice.call(arguments)))
                    };
                    VWO.event('modalCLose')
                  }
                }
              });
              const closeButton = modal.querySelector('.modal-close');
              closeButton.addEventListener('click', () => {
                modal.classList.toggle('modal-fade');

                // Trigger close event
                window.VWO = window.VWO || [];
                VWO.event = VWO.event || function() {
                  VWO.push(['event'].concat([].slice.call(arguments)))
                };
                VWO.event('modalCLose')
              });
            }
          }
          let exitIntentShown = false;

          function handleMouseLeave(event) {
            if (!exitIntentShown && event.clientY <= 0 && !document.querySelector('.homepagepopup').classList.contains('noshow')) {
              handleOpen();
              exitIntentShown = true;
            }
          }
          document.addEventListener('mouseleave', handleMouseLeave);
        });
      </script>
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>