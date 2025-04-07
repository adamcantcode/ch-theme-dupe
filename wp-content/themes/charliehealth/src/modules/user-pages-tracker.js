export default function userPagesTracker() {
  const trackPages = () => {
    let user_journey =
      JSON.parse(sessionStorage.getItem('user_journey_')) || [];
    let prior_count = parseInt(sessionStorage.getItem('prior_count')) || 1;

    let currentUrl = new URL(window.location.href);

    // Remove 'user_journey' parameter from URL if it exists
    if (currentUrl.searchParams.has('user_journey')) {
      currentUrl.search = '';
    }

    // Add the current URL to the user_journey array if not already the last entry
    if (
      user_journey.length === 0 ||
      user_journey[user_journey.length - 1] !== currentUrl.href
    ) {
      user_journey.push(currentUrl.href);
    }

    // Check if user_journey length exceeds the limit (10 in this case)
    if (user_journey.length > 10) {
      let excessCount = user_journey.length - 10;

      // Remove excess pages
      user_journey = user_journey.slice(0, 10);

      // Add dynamic "X more pages" messages
      for (let i = 1; i <= excessCount; i++) {
        user_journey.push(`${i + prior_count} more page${i > 1 ? 's' : ''}`);
      }

      // Update the prior_count to reflect how many pages were added
      prior_count += excessCount;
      sessionStorage.setItem('prior_count', prior_count);
    }

    // Store the updated user_journey in sessionStorage
    sessionStorage.setItem('user_journey_', JSON.stringify(user_journey));
  };

  const gh_src = () => {
    // Function to get the value of a specific URL parameter
    function getUrlParameter(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
    }

    // Check if the 'gh_src' parameter exists in the URL
    var ghSrcValue = getUrlParameter('gh_src');
    if (ghSrcValue) {
      // Check if the cookie 'gh_src' exists
      var cookieExists = document.cookie
        .split('; ')
        .some((cookie) => cookie.startsWith('gh_src='));

      // Set the cookie if it does not exist or update if 'gh_src' is in the URL
      if (ghSrcValue || !cookieExists) {
        var expires = '';
        var date = new Date();
        date.setTime(date.getTime() + 30 * 24 * 60 * 60 * 1000);
        expires = '; expires=' + date.toUTCString();

        // Use the new value from the URL parameter or keep the existing one
        var newValue =
          ghSrcValue ||
          (cookieExists
            ? document.cookie
                .split('; ')
                .find((cookie) => cookie.startsWith('gh_src='))
                .split('=')[1]
            : '');

        // Set or update the cookie
        document.cookie = 'gh_src=' + newValue + expires + '; path=/';
      }
    }
  };

  gh_src();

  trackPages();
}
