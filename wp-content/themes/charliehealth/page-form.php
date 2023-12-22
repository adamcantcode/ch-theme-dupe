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
            const newDisclaimerText = 'We may employ third-party tools to analyze usage data on our website, including your submission of this form. We make reasonable efforts to obscure or de-identify protected health information from our analytics providers whenever feasible.'
            const disclaimerContainer = document.querySelector('.field-auto-capture');
            const progressBar = document.querySelector('#fsSubmit4865954');

            progressBar.insertAdjacentElement('afterend', disclaimerContainer);
            disclaimerContainer.style.display = 'none';
            disclaimerContainer.style.padding = "0";
            disclaimerContainer.querySelector('.field-auto-capture__message p').innerHTML = newDisclaimerText;
            disclaimerContainer.querySelector('.field-auto-capture__message p').style.lineHeight = 1.1;
            disclaimerContainer.querySelector('.field-auto-capture__message p').style.textAlign = "left";

            document.querySelector('.fsPagination').addEventListener('click', function() {
              console.log(document.querySelector('#fsPage4865954-2').classList.contains('fsHiddenPage'));
              if (document.querySelector('#fsPage4865954-2').classList.contains('fsHiddenPage')) {
                setTimeout(() => {
                  disclaimerContainer.style.display = 'block';
                }, 300);
              } else {
                disclaimerContainer.style.display = 'none';
              }
            })

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