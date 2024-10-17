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
    // Get the 'gh_src' cookie value
    function getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
    }

    // Get the gh_src cookie value
    const gh_srcValue = getCookie('gh_src');

    if (gh_srcValue) {
      updateUrls(gh_srcValue); // Use gh_src cookie value to update URLs
    } else {
      console.log('gh_src cookie not found.');
    }
  }, 500);
}
