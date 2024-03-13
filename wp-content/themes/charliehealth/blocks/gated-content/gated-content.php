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
        var elementToCutGated = gatedContent.querySelector("#fsSubmitButton5683263"); // Submit button
        var destinationElementGated = gatedContent.querySelector("#fsCell161791549"); // Email container
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

        const gatedForm = document.getElementById('fsForm5683263'); // Gated form ID

        function handleFormSubmission(event) {
          setTimeout(() => {
            const urlParams = new URLSearchParams(window.location.search);
            const pdfLink = urlParams.get('pdf_link'); // PDF query param from previous page

            // Redirect to the URL specified by the pdf_link query parameter
            if (pdfLink) {
              window.location.href = pdfLink;
            } else {
              return;
            }
          }, 100);
        }
        // Add form submission event listener
        gatedForm.addEventListener('submit', handleFormSubmission);
      </script>
    </div>
    <h6>By entering your email you agree to receive marketing communications from Charlie Health. You can unsubscribe anytime.</h6>
  </div>
</div>