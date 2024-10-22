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
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/self_serve_admissions"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/self_serve_admissions" title="Online Form">Online Form - [PROD] Charlie Health Intake Form</a></noscript>
        <script>
          // document.addEventListener("DOMContentLoaded", function() {
          const formID = 5700521;
          const form = window.fsApi().getForm(formID);
          form.registerFormEventListener({
            type: 'ready',
            onFormEvent: function(event) {
              console.log('test');

              const newDisclaimerText = 'We may employ third-party tools to analyze usage data on our website, including your submission of this form. We make reasonable efforts to obscure or de-identify protected health information from our analytics providers whenever feasible.'
              const disclaimerContainer = document.querySelectorAll('.field-auto-capture')[0];
              const progressBar = document.querySelector('#fsSubmit5700521');

              progressBar.insertAdjacentElement('afterend', disclaimerContainer);
              disclaimerContainer.style.display = 'none';
              disclaimerContainer.style.padding = "0";
              disclaimerContainer.querySelector('.field-auto-capture__message p').innerHTML = newDisclaimerText;
              disclaimerContainer.querySelector('.field-auto-capture__message p').style.fontSize = "12px";
              disclaimerContainer.querySelector('.field-auto-capture__message p').style.lineHeight = 1.1;
              disclaimerContainer.querySelector('.field-auto-capture__message p').style.textAlign = "left";

              document.querySelector('.fsPagination').addEventListener('click', function() {
                setTimeout(() => {
                  if (document.querySelector('#fsPage5700521-2').classList.contains('fsHidden')) {
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
                  if (document.querySelector('#fsPage5700521-3').classList.contains('fsHidden')) {
                    setTimeout(() => {
                      clonedElement.style.display = 'none';
                    }, 300);
                  } else {
                    clonedElement.style.display = 'block';
                  }
                }, 300);
              })

              return Promise.resolve(event);
            }
          });

          form.registerFormEventListener({
            tpye: 'change-page',
            onFormEvent: function(event) {
              console.log('scroll');

              window.scrollTo({
                top: 0,
                behavior: 'smooth'
              });

              return Promise.resolve(event);
            }
          })

          // Add email from session storage

          // function waitForElement(selector, callback) {
          //   var element = document.querySelector(selector);
          //   if (element && window.getComputedStyle(element).display !== 'none') {
          //     callback(element);
          //   } else {
          //     setTimeout(() => waitForElement(selector, callback), 500);
          //   }
          // }

          // const storedEmail = sessionStorage.getItem('introQuestionEmail');
          // const textField = document.getElementById('field162592077');

          // if (storedEmail && textField) {
          //   waitForElement("#fsPage5700521-3", (element) => {

          //     // Set the value directly
          //     textField.value = storedEmail;

          //     // Dispatch 'input' event to simulate user input
          //     textField.dispatchEvent(new Event('input', {
          //       bubbles: true,
          //       cancelable: true
          //     }));

          //     // Dispatch 'change' event to simulate value change
          //     textField.dispatchEvent(new Event('change', {
          //       bubbles: true,
          //       cancelable: true
          //     }));

          //     // Dispatch 'blur' event to simulate losing focus
          //     textField.dispatchEvent(new Event('blur', {
          //       bubbles: true,
          //       cancelable: true
          //     }));

          //     // Optionally, you can trigger a 'focusout' event if necessary
          //     textField.dispatchEvent(new Event('focusout', {
          //       bubbles: true,
          //       cancelable: true
          //     }));
          //   });
          // }
          // });
        </script>
        <p class="mt-base5-4">If you’d prefer to speak with our team directly, please call <a href="tel:+18664848218">1 (866) 484-8218</a></p>
      </div>
      <div class="grid items-center">
        <img src="https://www.charliehealth.com/wp-content/uploads/2023/11/Device_Laptop.png.webp" alt="Illustration of Charlie Health client using laptop for Virtual IOP Therapy">
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>