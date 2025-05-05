<?php
/*
Template Name: Form Page - Adol
Template Post Type: page
*/
?>

<?php get_header(); ?>

<div class="section">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-sp-8">
      <div>
        <?php
        if (wp_get_environment_type() === 'production') {
          $formID = 6125398;

          echo '<script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/self_serve_admissions_copy_10"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/self_serve_admissions_copy_10" title="Online Form">Online Form - [PROD] Charlie Health Intake Form - ADOL Expansion</a></noscript>';
        } else if (wp_get_environment_type() === 'staging' || wp_get_environment_type() === 'local') {
          $formID = 6127780;

          echo '<script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/self_serve_admissions_copy_10_copy"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/self_serve_admissions_copy_10_copy" title="Online Form">Online Form - [STAGING] Charlie Health Intake Form - ADOL Expansion</a></noscript>';
        }
        ?>
        <script>
          function waitForElements(selectors, callback, attempt = 0) {
            const elements = selectors.map(sel => document.querySelector(sel));
            if (elements.every(Boolean)) {
              callback(...elements);
            } else if (attempt < 20) {
              setTimeout(() => waitForElements(selectors, callback, attempt + 1), 150);
            } else {
              console.warn('Elements not found:', selectors);
            }
          }
        </script>

        <script>
          'use strict';

          // Constants
          const FORM_ID = <?= $formID; ?>;
          const DISCLAIMER_TEXT = 'We may employ third-party tools to analyze usage data on our website, including your submission of this form. We make reasonable efforts to obscure or de-identify protected health information from our analytics providers whenever feasible.';
          const CONSENT_TEXT = 'By providing an email address and telephone number and submitting this form you are consenting to be contacted by email and SMS text message. Message & data rates may apply. You can reply STOP to opt-out of further messaging.';

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
            clonedElement.className = 'custom-consent-text';

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

          // Retry until the disclaimerContainer and progressBar are found
          function waitForElements(selectors, callback, timeout = 3000, interval = 100) {
            const start = Date.now();
            const check = () => {
              console.log('Checking for elements:', selectors);
              const elements = selectors.map(sel => document.querySelector(sel));
              if (elements.every(el => el)) {
                console.log('Elements found:', elements);
                callback(...elements);
              } else if (Date.now() - start < timeout) {
                console.log('Elements not found, retrying...');
                setTimeout(check, interval);
              } else {
                console.warn('Timed out waiting for elements:', selectors);
              }
            };
            check();
          }

          form.registerFormEventListener({
            type: 'ready',
            onFormEvent: function(event) {
              console.log('Form is ready');

              waitForElements(
                ['.field-auto-capture', '#fsSubmit' + FORM_ID, '.fsPagination'],
                (disclaimerContainer, progressBar, pagination) => {
                  const originalElement = disclaimerContainer;

                  if (progressBar && disclaimerContainer) {
                    progressBar.insertAdjacentElement('afterend', disclaimerContainer);
                    updateDisclaimerStyles(disclaimerContainer);
                  }

                  if (!document.querySelector('.custom-consent-text')) {
                    const consentElement = createConsentElement(originalElement);
                    if (consentElement && originalElement) {
                      originalElement.parentNode.insertBefore(consentElement, originalElement.nextSibling);
                    }
                  }

                  if (pagination) {
                    handlePageVisibility(disclaimerContainer, '#fsPage' + FORM_ID + '-1', true);
                    handlePageVisibility(consentElement, '#fsPage' + FORM_ID + '-2', true);
                    pagination.addEventListener('click', function() {
                      handlePageVisibility(disclaimerContainer, '#fsPage' + FORM_ID + '-1', true);
                      handlePageVisibility(consentElement, '#fsPage' + FORM_ID + '-2', true);
                    });
                  }
                }
              );

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
              // Former form submission metric
              window.VWO = window.VWO || [];
              VWO.event = VWO.event || function() {
                VWO.push(["event"].concat([].slice.call(arguments)))
              };

              VWO.event("formstackFormSubmission");

              // Native Testing event
              window.VWO = window.VWO || [];
              VWO.event = VWO.event || function() {
                VWO.push(["event"].concat([].slice.call(arguments)))
              };

              VWO.event("intakeFormSubmission");

              return Promise.resolve(event);
            }
          });
        </script>
        <script>
          (function() {
            const REQUIRED_SELECTORS = [
              '.field-auto-capture',
              '#fsSubmit' + <?= $formID; ?>,
              '.fsPagination',
              '#fsPage' + <?= $formID; ?> + '-1',
              '#fsPage' + <?= $formID; ?> + '-2'
            ];

            function allExist() {
              return REQUIRED_SELECTORS.every(sel => document.querySelector(sel));
            }

            function runOnceWhenReady(callback) {
              if (allExist()) {
                callback();
                return;
              }

              const observer = new MutationObserver(() => {
                if (allExist()) {
                  observer.disconnect();
                  callback();
                }
              });

              observer.observe(document.body, {
                childList: true,
                subtree: true
              });
            }

            runOnceWhenReady(() => {
              const disclaimerContainer = document.querySelector('.field-auto-capture');
              const progressBar = document.querySelector('#fsSubmit' + <?= $formID; ?>);
              const pagination = document.querySelector('.fsPagination');
              const originalElement = disclaimerContainer;

              progressBar.insertAdjacentElement('afterend', disclaimerContainer);
              updateDisclaimerStyles(disclaimerContainer);

              if (!document.querySelector('.custom-consent-text')) {
                const consentElement = createConsentElement(originalElement);
                if (consentElement && originalElement) {
                  originalElement.parentNode.insertBefore(consentElement, originalElement.nextSibling);
                }
              }

              handlePageVisibility(disclaimerContainer, '#fsPage' + <?= $formID; ?> + '-1', true);
              handlePageVisibility(consentElement, '#fsPage' + <?= $formID; ?> + '-2', true);

              pagination.addEventListener('click', function() {
                handlePageVisibility(disclaimerContainer, '#fsPage' + <?= $formID; ?> + '-1', true);
                handlePageVisibility(consentElement, '#fsPage' + <?= $formID; ?> + '-2', true);
              });

              console.log('Injected disclaimer/consent successfully after DOM observed.');
            });
          })();
        </script>
        <p class="mt-base5-4">If you’d prefer to speak with our team directly, please call <a href="tel:+19862060414">1 (986) 206-0414</a></p>
      </div>
      <div class="grid items-center">
        <img src="https://www.charliehealth.com/wp-content/uploads/2023/11/Device_Laptop.png.webp" alt="Illustration of Charlie Health client using laptop for Virtual IOP Therapy">
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>