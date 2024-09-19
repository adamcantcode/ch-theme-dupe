<?php
$background = 'bg-lavender-300';
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
  if ($background === 'bg-darker-blue') {
    $background .= ' [&_*]:text-white ';
  }
}
$pdfLink = get_field('pdf_link') ?: null;
if ($pdfLink) {
  // Remove part of link so that it can't be copied at least
  $stripped = strstr($pdfLink, '/wp-content/uploads/');
  $pdfLink  = substr($stripped, strlen('/wp-content/uploads/'));
};
?>
<div class="gated-guide-container-js">
  <div class="grid lg:grid-cols-[1fr_2fr] rounded-md p-sp-6 lg:gap-sp-8 <?= $background; ?>">
    <div>
      <h2 class="mb-0">Download the guide</h2>
    </div>
    <div>
      <div id="gatedFormInContent" class="newsletter-revamp">
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/all_gated"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/all_gated" title="Online Form">Online Form - [TEST] ALL GATED</a></noscript>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            // Reference the gated content directly by its ID or class
            const gatedContent = document.getElementById('gatedFormInContent');

            if (!gatedContent) {
              console.error("Gated content not found.");
              return;
            }

            const submitButton = gatedContent.querySelector("#fsSubmitButton5683263"); // Submit button
            const emailContainer = gatedContent.querySelector("#fsCell161791549"); // Email container
            const gatedForm = document.getElementById('fsForm5683263');
            const pdfLink = new URLSearchParams(window.location.search).get('pdf_link') || '<?= $pdfLink; ?>';
            const encodedPdfLink = encodeURIComponent(pdfLink);

            // Move submit button to email container
            if (submitButton && emailContainer) {
              const clonedSubmitButton = submitButton.cloneNode(true);
              submitButton.remove();
              emailContainer.appendChild(clonedSubmitButton);
            }

            // Handle enter key for submission
            const emailField = gatedContent.querySelector('#field161791549');
            emailField?.addEventListener('keydown', function(event) {
              if (event.key === 'Enter') {
                gatedContent.querySelector('#fsSubmitButton5683263').click();
              }
            });

            // Update form action with the encoded PDF link
            gatedForm.action = `${gatedForm.action}?pdf_link=${window.location.origin}/wp-content/uploads/${encodedPdfLink}`;

            // Handle form submission
            gatedForm.addEventListener('submit', handleFormSubmit);

            function handleFormSubmit(event) {
              setCookie('gatedSubmission', 'true', 365);
              window.addEventListener('unload', () => window.location.reload(true));
            }

            // Redirect if cookie exists
            if (window.location.href.includes('/gated')) {
              if (getCookie('gatedSubmission')) {
                window.location = `${window.location.origin}/activities`;
              }
            } else {
              if (getCookie('gatedSubmission')) {
                document.querySelector('.gated-guide-container-js').innerHTML = `
          <object data="<?= get_field('pdf_link'); ?>" style="width:100%;height:600px" type="application/pdf"></object>`;
              }
            }

            // Set cookie
            function setCookie(name, value, days) {
              const date = new Date();
              date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
              const expires = `; expires=${date.toUTCString()}`;
              document.cookie = `${name}=${value}${expires}; path=/`;
            }

            // Get cookie by name
            function getCookie(name) {
              const cookies = document.cookie.split(';');
              for (let cookie of cookies) {
                cookie = cookie.trim();
                if (cookie.startsWith(name + '=')) {
                  return true;
                }
              }
              return false;
            }
          });
        </script>
      </div>
      <h6 class="text-mini">By entering your email you agree to receive marketing communications from Charlie Health. You can unsubscribe anytime.</h6>
    </div>
  </div>
</div>