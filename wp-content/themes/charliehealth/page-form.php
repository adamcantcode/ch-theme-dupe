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
          'use strict';

          // Constants
          const FORM_ID = 5700521;
          const DISCLAIMER_TEXT = 'We may employ third-party tools to analyze usage data on our website, including your submission of this form. We make reasonable efforts to obscure or de-identify protected health information from our analytics providers whenever feasible.';
          const CONSENT_TEXT = 'By entering your phone number and email address in this form, you agree to receive automated text messages and emails from us. Standard message and data rates may apply.';

          // Initialize form using Formstack API
          const form = window.fsApi().getForm(FORM_ID);

          // Helper function to update disclaimer styles
          function updateDisclaimerStyles(element) {
            if (!element) return;

            const paragraph = element.querySelector('.field-auto-capture__message p');
            if (paragraph) {
              paragraph.innerHTML = DISCLAIMER_TEXT;
              paragraph.style.fontSize = '12px';
              paragraph.style.lineHeight = '1.1';
              paragraph.style.textAlign = 'left';
            }

            element.style.display = 'none';
            element.style.padding = '0';
          }

          // Helper function to create consent text element
          function createConsentElement(originalElement) {
            if (!originalElement) return null;

            const clonedElement = originalElement.cloneNode(true);
            clonedElement.className = '';

            const messageText = clonedElement.querySelector('.field-auto-capture__message__text');
            if (messageText) {
              messageText.className = '';
              messageText.innerText = CONSENT_TEXT;
            }

            return clonedElement;
          }

          // Helper function to handle visibility of an element based on page
          function handlePageVisibility(element, pageId, shouldShow) {
            if (!element) return;

            const page = document.querySelector(pageId);
            if (!page) return;

            setTimeout(() => {
              element.style.display = page.classList.contains('fsHidden') ? 'none' : (shouldShow ? 'block' : 'none');
            }, 300);
          }

          // Prevent first page validation trigger
          form.registerFormEventListener({
            type: 'error',
            onFormEvent: function(event) {
              console.log(event);
              if (event.data.page === 1) {
                if (event.preventDefault) {
                  event.preventDefault();
                }
              }


              return Promise.resolve(event);
            }
          });

          // Register event listener for form ready event
          form.registerFormEventListener({
            type: 'ready',
            onFormEvent: function(event) {

              // Select elements
              const disclaimerContainer = document.querySelector('.field-auto-capture');
              const progressBar = document.querySelector('#fsSubmit' + FORM_ID);
              const originalElement = disclaimerContainer;

              // Insert disclaimer after the progress bar
              if (progressBar && disclaimerContainer) {
                progressBar.insertAdjacentElement('afterend', disclaimerContainer);
                updateDisclaimerStyles(disclaimerContainer);
              }

              // Create and insert consent text element
              const consentElement = createConsentElement(originalElement);
              if (consentElement && originalElement) {
                originalElement.parentNode.insertBefore(consentElement, originalElement.nextSibling);
              }

              // Add page navigation listeners for visibility control
              const pagination = document.querySelector('.fsPagination');
              if (pagination) {
                pagination.addEventListener('click', function() {
                  handlePageVisibility(disclaimerContainer, '#fsPage' + FORM_ID + '-2', true);
                  handlePageVisibility(consentElement, '#fsPage' + FORM_ID + '-3', true);
                });
              }

              return Promise.resolve(event);
            }
          });

          // Register event listener for page change event
          form.registerFormEventListener({
            type: 'change-page',
            onFormEvent: function(event) {

              // Scroll to top on page change
              window.scrollTo({
                top: 0,
                behavior: 'smooth'
              });

              return Promise.resolve(event);
            }
          });

          form.registerFormEventListener({
            type: 'submit',
            onFormEvent: function(event) {
              window.VWO = window.VWO || [];
              VWO.event = VWO.event || function() {
                VWO.push(["event"].concat([].slice.call(arguments)))
              };

              VWO.event("formstackFormSubmission");

              return Promise.resolve(event);
            }
          });
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