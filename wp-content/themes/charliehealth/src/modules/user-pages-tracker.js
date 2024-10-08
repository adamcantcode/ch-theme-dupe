export default function userPagesTracker() {
  const trackPages = () => {
    // Get the previously visited pages or initialize an empty array
    let visitedPages = JSON.parse(localStorage.getItem('visitedPages')) || [];

    // Capture the current page and the time when the user lands
    let currentPage = {
      url: window.location.href,
      landedAt: new Date().getTime(), // Use timestamp in milliseconds for calculation
      timeSpent: null, // Will be calculated when the user leaves the page
    };

    // Add the current page to the visitedPages array
    visitedPages.push(currentPage);
    localStorage.setItem('visitedPages', JSON.stringify(visitedPages));

    // Update the timeSpent when the user leaves the page
    window.addEventListener('beforeunload', () => {
      let updatedPages = JSON.parse(localStorage.getItem('visitedPages')) || [];
      let lastPage = updatedPages[updatedPages.length - 1];

      // Calculate the time spent in milliseconds
      let leaveTime = new Date().getTime();
      let timeSpentMs = leaveTime - lastPage.landedAt;

      // Convert time spent to minutes, seconds, and milliseconds
      let minutes = Math.floor(timeSpentMs / 60000);
      let seconds = Math.floor((timeSpentMs % 60000) / 1000);
      let milliseconds = timeSpentMs % 1000;

      lastPage.timeSpent = `${minutes}m ${seconds}s ${milliseconds}ms`;

      localStorage.setItem('visitedPages', JSON.stringify(updatedPages));

      console.log('Updated Pages with Time Spent:', updatedPages);
    });
  };

  trackPages();
}
