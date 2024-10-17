export default function userPagesTracker() {
  const trackPages = () => {
    let user_journey =
      JSON.parse(sessionStorage.getItem('user_journey_')) || [];
    let prior_count = parseInt(sessionStorage.getItem('prior_count')) || 1;

    // Get the current URL
    let currentUrl = new URL(window.location.href);

    // Check if "user_journey" is a URL parameter
    if (currentUrl.searchParams.has('user_journey')) {
      // Strip all search params
      currentUrl.search = '';
    }

    // Check if user_journey has more than 10 pages
    if (user_journey.length >= 10) {
      user_journey.shift(); // Remove the first page
      user_journey[0] = `${prior_count} prior pages`; // Add the "x prior pages"
      prior_count++; // Increment the counter for next time
      sessionStorage.setItem('prior_count', prior_count); // Save the new count
    }

    // Add the stripped URL (without search params) to user_journey
    user_journey.push(currentUrl.href);
    sessionStorage.setItem('user_journey_', JSON.stringify(user_journey)); // Save the updated user_journey
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
