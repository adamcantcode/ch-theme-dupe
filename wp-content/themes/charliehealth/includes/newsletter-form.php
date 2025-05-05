<?php
$rand = random_int(1, 10000);
$buttonColor = $buttonColor ?? 'button-primary-ch';
?>
<form id="iterable_optin_<?= $rand; ?>" action="///links.iterable.com/lists/publicAddSubscriberForm?publicIdString=7c60cf0b-e283-4dee-95c4-b4e88518b178" method="POST" class="flex flex-col w-full lg:flex-row gap-base5-2 email">
  <input type="email" name="email" onfocus="if(this.value===this.defaultValue){this.value='';}" onblur="if(this.value===''){this.value=this.defaultValue;}" placeholder="Email" class="w-full bg-white rounded-md px-base5-3 py-base5-2 text-primary placeholder:text-grey-deactivated">
  <input type="submit" value="Sign Up" class="cursor-pointer ch-button <?= $buttonColor; ?> px-base5-3 py-base5-2 text-[16px]">
</form>
<h4 id="responseMessage_<?= $rand; ?>" class="text-white noshow">Thank you for signing up!</h4>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('iterable_optin_<?= $rand; ?>');
    var responseMessage = document.getElementById('responseMessage_<?= $rand; ?>');

    form.addEventListener('submit', function(event) {
      event.preventDefault();

      var formData = new FormData(form);
      var xhr = new XMLHttpRequest();

      xhr.open('POST', form.action, true);
      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
          form.remove();
          responseMessage.classList.remove('noshow');
          form.reset();
        } else {
          console.error('Submission failed:', xhr.statusText);
        }
      };

      xhr.onerror = function() {
        console.error('Request failed');
      };

      xhr.send(formData);
    });
    var submitButton = form.querySelector('input[type="submit"]');

    submitButton.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default form submission
      form.dispatchEvent(new Event('submit', {
        'bubbles': true,
        'cancelable': true
      }));
    });
  });
</script>