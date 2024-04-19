<?php
/*
Template Name: Form Page (one q)
Template Post Type: page
*/
?>

<?php get_header(); ?>

<div class="section">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-sp-8">
      <div>
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/self_serve_admissions_copy"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/self_serve_admissions_copy" title="Online Form">Online Form - [PROD] Charlie Health Intake Form - one q</a></noscript>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            const progressBar = document.querySelector('.fsProgress');
            const originalElement = document.querySelector('.field-auto-capture');
            const clonedElement = originalElement.cloneNode(true);

            clonedElement.classList.remove(clonedElement.classList);

            progressBar.insertAdjacentElement('afterend', clonedElement);

            clonedElement.style.display = 'none';
            clonedElement.style.padding = "0";

            const clonedChildElement = clonedElement.querySelector('.field-auto-capture__message__text');
            clonedChildElement.classList.remove(clonedChildElement.classList);

            clonedChildElement.innerText = "By entering your phone number and email address in this form, you agree to receive text messages and emails from us. Standard message and data rates may apply.";

            clonedChildElement.style.lineHeight = 1.1;
            clonedChildElement.style.textAlign = "left";
            
            console.log(clonedElement);

            document.querySelector('.fsPagination').addEventListener('click', function() {
              setTimeout(() => {
                if (document.querySelector('#fsPage5736068-4').classList.contains('fsHiddenPage')) {
                  setTimeout(() => {
                    clonedElement.style.display = 'none';
                  }, 300);
                } else {
                  clonedElement.style.display = 'block';
                }
              }, 300);
            })

            originalElement.remove();

            // Scroll to top on button click
            const formButtons = document.querySelectorAll('form button');

            formButtons.forEach(button => {
              button.addEventListener('click', () => {
                setTimeout(() => {
                  window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                  });
                }, 300);
              });
            });
          });
        </script>
        <p>If you’d prefer to speak with our team directly, please call <a href="tel:+18664848218">1 (866) 484-8218</a></p>
      </div>
      <div class="grid items-center">
        <img src="https://www.charliehealth.com/wp-content/uploads/2023/11/Device_Laptop.png.webp" alt="Illustration of Charlie Health client using laptop for Virtual IOP Therapy">
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>