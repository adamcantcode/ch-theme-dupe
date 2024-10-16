export default function careersTracking() {
  // Update urls function
  function updateUrls(ghCode) {
    if (!location.href.includes('gh_src')) {
      // Get links
      const anchors = document.querySelectorAll('a');

      anchors.forEach((anchor) => {
        // if link is openings
        if (anchor.href.endsWith('openings')) {
          anchor.href += `?gh_src=${ghCode}`;
        }
        if (anchor.href.includes('gh_jid')) {
          anchor.href += `&gh_src=${ghCode}`;
        }
      });
    }
  }

  // get params
  setTimeout(() => {
    console.log(JSON.parse(sessionStorage.getItem('user_journey_'))[0]);
    // Create a URL object to easily manipulate query parameters
    const url = new URL(JSON.parse(sessionStorage.getItem('user_journey_'))[0]);

    // Get the value of 'gh_src' if it exists
    const ghSrcValue = url.searchParams.get('gh_src');

    if (ghSrcValue) {
      updateUrls(ghSrcValue);
    } else {
      console.log('gh_src query parameter not found.');
    }
  }, 500);
}
