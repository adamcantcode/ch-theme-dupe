<form id="iterable_optin" action="//links.iterable.com/lists/publicAddSubscriberForm?publicIdString=f399c731-e9b4-4208-9766-75bbca297d9a" method="POST" class="flex flex-col w-full lg:flex-row gap-base5-2 email">
  <input type="text" name="email" onfocus="if(this.value===this.defaultValue){this.value='';}" onblur="if(this.value===''){this.value=this.defaultValue;}" placeholder="Email" class="w-full bg-white rounded-md px-base5-3 py-base5-2 text-primary placeholder:text-grey-deactivated">
  <input type="submit" value="Sign Up" class="cursor-pointer ch-button button-primary px-base5-3 py-base5-2 text-[16px]">
</form>
<div id="response-message" style="display: none; color: green;">Thank you for signing up!</div>
<div id="error-message" style="display: none; color: red;">Submission failed. Please try again.</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('iterable_optin');
    var responseMessage = document.getElementById('response-message');
    var errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function(event) {
      event.preventDefault();

      var formData = new FormData(form);
      var xhr = new XMLHttpRequest();

      xhr.open('POST', form.action, true);
      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
          responseMessage.style.display = 'block';
          errorMessage.style.display = 'none';
          form.reset();
        } else {
          errorMessage.style.display = 'block';
          responseMessage.style.display = 'none';
          console.error('Submission failed:', xhr.statusText);
        }
      };

      xhr.onerror = function() {
        errorMessage.style.display = 'block';
        responseMessage.style.display = 'none';
        console.error('Request failed');
      };

      xhr.send(formData);
    });
  });
</script>