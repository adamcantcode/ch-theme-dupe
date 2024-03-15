<?php
$pdfLink = get_field('pdf_link') ?: null;
if ($pdfLink) {
  // Remove part of link so that it can't be copied at least
  $stripped = strstr($pdfLink, '/wp-content/uploads/');
  $pdfLink  = substr($stripped, strlen('/wp-content/uploads/'));
};
?>
<div class="gated-guide-container-js">
  <div class="grid lg:grid-cols-[1fr_2fr] rounded-md p-sp-6 lg:gap-sp-8 bg-grey-cool">
    <div>
      <h2 class="mb-0">Download the guide</h2>
    </div>
    <div>
      <p class="noshow lg:block">Submit the form here to receive our guide</p>
      <div id="gatedFormInContent" class="newsletter-revamp">
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/all_gated"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/all_gated" title="Online Form">Online Form - [TEST] ALL GATED</a></noscript>
        <script>
          var gatedContent = document.currentScript.parentNode; // Gated container
          var elementToCutGated = gatedContent.querySelector("#gatedFormInContent #fsSubmitButton5683263"); // Submit button
          var destinationElementGated = gatedContent.querySelector("#gatedFormInContent #fsCell161791549"); // Email container
          var newsletterIDGated = gatedContent.id; // Gated identifier

          if (elementToCutGated && destinationElementGated) {
            var clonedElementDBT = elementToCutGated.cloneNode(true);
            elementToCutGated.parentNode.removeChild(elementToCutGated);
            destinationElementGated.appendChild(clonedElementDBT);
          }

          document.querySelector('#gatedFormInContent #field161791549').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
              document.querySelector('#gatedFormInContent #fsSubmitButton5683263').click();
            }
          });

          const gatedForm = document.getElementById('fsForm5683263');
          const urlParams = new URLSearchParams(window.location.search);
          const pdfLink = urlParams.get('pdf_link') ? urlParams.get('pdf_link') : '<?= $pdfLink; ?>';
          var encodedPdfLink = encodeURIComponent(pdfLink);

          // Append the pdf_link query parameter to the form action URL
          var formAction = gatedForm.action;
          var updatedFormAction = formAction + '?pdf_link=' + window.location.origin + '/wp-content/uploads/' + encodedPdfLink;

          // Update the form action attribute with the new URL
          gatedForm.action = updatedFormAction;

          gatedForm.addEventListener('submit', (event) => {
            var expires = "";
            var date = new Date();
            date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
            document.cookie = "gatedSubmission=true" + expires + "; path=/";
            window.addEventListener('unload', function() {
              window.location.reload(true);
            });
          });

          // If cookie, redirect to /activites
          function checkCookie(name) {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
              var cookie = cookies[i].trim();
              if (cookie.indexOf(name + "=") === 0) {
                return true;
              }
            }
            return false;
          }

          if (window.location.href.includes('/gated')) {
            if (checkCookie("gatedSubmission")) {
              window.location = window.location.origin + '/activities'
            }
          } else {
            if (checkCookie("gatedSubmission")) {
              document.querySelector('.gated-guide-container-js').innerHTML = `<object data="<?= get_field('pdf_link'); ?>" style="width:100%;height:600px" type="application/pdf"></object>`
            }
          }
        </script>
      </div>
      <h6>By entering your email you agree to receive marketing communications from Charlie Health. You can unsubscribe anytime.</h6>
    </div>
  </div>
</div>