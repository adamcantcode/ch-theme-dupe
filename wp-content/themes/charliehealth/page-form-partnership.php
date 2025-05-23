<?php
/*
Template Name: Formstack - Partnership Form
Template Post Type: page
*/
?>

<?php get_header(); ?>

<div class="section-top">
  <div class="container">
    <h1 class="text-center">Partnership Referral Portal</h1>
  </div>
</div>
<div class="section">
  <div class="container-sm">
    <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/ch_professional_referral_form_copy_2"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/ch_professional_referral_form_copy_2" title="Online Form">Online Form - Partnerships Form v3</a></noscript>
    <script>
      // Helper function to get query parameters by name
      function getQueryParam(param) {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
      }

      // Get the Formstack form instance
      var form = window.fsApi().getForm('6000504');

      form.registerFormEventListener({
        type: 'ready',
        onFormEvent: function(event) {
          console.log('Form is ready');

          // Get query parameter values
          var organization = getQueryParam('What_is_your_organization');
          var accountID = getQueryParam('RS_Account_ID');

          // Get form fields
          const organizationField = form.getField('176386366'); // Field for What_is_your_organization
          const accountIDField = form.getField('176386367'); // Field for RS_Account_ID
          const userJourney = form.getField('176386382')

          // If the 'What_is_your_organization' parameter exists, set its value in the form field
          if (organization && organizationField) {
            organizationField.setValue(organization);
          }

          // If the 'RS_Account_ID' parameter exists, set its value in the form field
          if (accountID && accountIDField) {
            accountIDField.setValue(accountID);
          }

          if(userJourney) {
            userJourney.setValue(sessionStorage.getItem('user_journey_'));
          }

          console.log('Updated');

          return Promise.resolve(event);
        }
      });
    </script>
  </div>
</div>

<?php get_footer(); ?>