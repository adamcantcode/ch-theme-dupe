export default function userPagesTracker() {
  const trackPages = () => {
    let user_journey = JSON.parse(sessionStorage.getItem('user_journey_')) || [];
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

  trackPages();
}
