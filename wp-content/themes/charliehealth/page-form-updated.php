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
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/self_serve_admissions_copy_1"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/self_serve_admissions_copy_1" title="Online Form">Online Form - [PROD] Charlie Health Intake Form - ins change</a></noscript>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            const newDisclaimerText = 'We may employ third-party tools to analyze usage data on our website, including your submission of this form. We make reasonable efforts to obscure or de-identify protected health information from our analytics providers whenever feasible.'
            const disclaimerContainer = document.querySelectorAll('.field-auto-capture')[0];
            const progressBar = document.querySelector('#fsSubmit5754402');

            progressBar.insertAdjacentElement('afterend', disclaimerContainer);
            disclaimerContainer.style.display = 'none';
            disclaimerContainer.style.padding = "0";
            disclaimerContainer.querySelector('.field-auto-capture__message p').innerHTML = newDisclaimerText;
            disclaimerContainer.querySelector('.field-auto-capture__message p').style.fontSize = "12px";
            disclaimerContainer.querySelector('.field-auto-capture__message p').style.lineHeight = 1.1;
            disclaimerContainer.querySelector('.field-auto-capture__message p').style.textAlign = "left";

            document.querySelector('.fsPagination').addEventListener('click', function() {
              setTimeout(() => {
                if (document.querySelector('#fsPage5754402-2').classList.contains('fsHidden')) {
                  setTimeout(() => {
                    disclaimerContainer.style.display = 'none';
                  }, 300);
                } else {
                  disclaimerContainer.style.display = 'none';
                }
              }, 300);
            })

            const originalElement = document.querySelector('.field-auto-capture');
            const clonedElement = originalElement.cloneNode(true);

            clonedElement.className = '';

            originalElement.parentNode.insertBefore(clonedElement, originalElement.nextSibling);

            const clonedChildElement = clonedElement.querySelector('.field-auto-capture__message__text');
            clonedChildElement.className = '';

            clonedChildElement.innerText = "By entering your phone number and email address in this form, you agree to receive automated text messages and emails from us. Standard message and data rates may apply.";

            document.querySelector('.fsPagination').addEventListener('click', function() {
              setTimeout(() => {
                if (document.querySelector('#fsPage5754402-3').classList.contains('fsHidden')) {
                  setTimeout(() => {
                    clonedElement.style.display = 'none';
                  }, 300);
                } else {
                  clonedElement.style.display = 'block';
                }
              }, 300);
            })

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
            // Add email from session storage
            function waitForElement(selector, callback) {
              var element = document.querySelector(selector);
              if (element && window.getComputedStyle(element).display !== 'none') {
                callback(element);
              } else {
                setTimeout(() => waitForElement(selector, callback), 500);
              }
            }

            const storedEmail = sessionStorage.getItem('introQuestionEmail');
            const textField = document.getElementById('field165061503');

            if (storedEmail) {
              waitForElement("#fsPage5754402-3", (element) => {

                textField.value = storedEmail;

                // Create and dispatch a 'change' event
                const changeEvent = new Event('change', {
                  bubbles: true,
                  cancelable: true,
                });
                textField.dispatchEvent(changeEvent);

                // Create and dispatch a 'blur' event
                const blurEvent = new Event('blur', {
                  bubbles: true,
                  cancelable: true,
                });
                textField.dispatchEvent(blurEvent);
              })
            }
          });
        </script>
        <p>If you’d prefer to speak with our team directly, please call <a href="tel:+19862060414">1 (986) 206-0414</a></p>
      </div>
      <div class="grid items-center">
        <img src="https://www.charliehealth.com/wp-content/uploads/2023/11/Device_Laptop.png.webp" alt="Illustration of Charlie Health client using laptop for Virtual IOP Therapy">
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>