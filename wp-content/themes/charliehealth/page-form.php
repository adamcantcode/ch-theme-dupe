<?php
/*
Template Name: Form Page
Template Post Type: page
*/
?>

<?php get_header(); ?>

<div class="section">
  <div class="container">
    <div class="grid grid-cols-1">
      <div>
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/self_serve_admissions"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/self_serve_admissions" title="Online Form">Online Form - [PROD] Charlie Health Intake Form</a></noscript>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            const newDisclaimerText = 'We may employ third-party tools to analyze usage data on our website, including your submission of this form. We make reasonable efforts to obscure or de-identify protected health information from our analytics providers whenever feasible.'
            const disclaimerContainer = document.querySelectorAll('.field-auto-capture')[0];
            const progressBar = document.querySelector('#fsSubmit5700521');

            progressBar.insertAdjacentElement('afterend', disclaimerContainer);
            disclaimerContainer.style.display = 'none';
            disclaimerContainer.style.padding = "0";
            disclaimerContainer.querySelector('.field-auto-capture__message p').innerHTML = newDisclaimerText;
            disclaimerContainer.querySelector('.field-auto-capture__message p').style.lineHeight = 1.1;
            disclaimerContainer.querySelector('.field-auto-capture__message p').style.textAlign = "left";

            document.querySelector('.fsPagination').addEventListener('click', function() {
              setTimeout(() => {
                if (document.querySelector('#fsPage5700521-2').classList.contains('fsHiddenPage')) {
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

            clonedElement.classList.remove(clonedElement.classList);

            originalElement.parentNode.insertBefore(clonedElement, originalElement.nextSibling);

            const clonedChildElement = clonedElement.querySelector('.field-auto-capture__message__text');
            clonedChildElement.classList.remove(clonedChildElement.classList);

            clonedChildElement.innerText = "By entering your phone number and email address in this form, you agree to receive text messages and emails from us. Standard message and data rates may apply.";

            document.querySelector('.fsPagination').addEventListener('click', function() {
              setTimeout(() => {
                if (document.querySelector('#fsPage5700521-3').classList.contains('fsHiddenPage')) {
                  setTimeout(() => {
                    clonedElement.style.display = 'none';
                  }, 300);
                } else {
                  clonedElement.style.display = 'block';
                }
              }, 300);
            })

          });
        </script>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>