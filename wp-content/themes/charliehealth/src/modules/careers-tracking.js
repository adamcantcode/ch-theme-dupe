export default function careersTracking() {
  // Create a URLSearchParams object from the query string
  const careersParams = new URLSearchParams(window.location.search);

  // Get the values of utm_source and utm_medium
  const utmSource = careersParams.get('utm_source');
  const utmMedium = careersParams.get('utm_medium');

  const ghMap = {
    linkedinOrganic: 'a0a8b3ae4us',
    instagramOrganic: '35ddfa714us',
    facebookOrganic: '052412f84us',
    metaPaid: '98215cc84us',
    email: '837aa8f74us',
  };

  // Update urls function
  function updateUrls(ghCode) {
    // Get all anchor elements on the page
    const anchors = document.querySelectorAll('a');

    // Iterate over each anchor element
    anchors.forEach((anchor) => {
      // Check if the href attribute ends with 'openings'
      if (anchor.href.endsWith('openings')) {
        // Update the href attribute to append '?gh_src=ghCode'
        anchor.href += `?gh_src=${ghCode}`;
      }
    });
  }

  // Check if the values match the desired criteria
  if (utmSource === 'linkedin' && utmMedium === 'organic') {
    updateUrls(ghMap.linkedinOrganic);
  }
  if (utmSource === 'instagram' && utmMedium === 'organic') {
    updateUrls(ghMap.instagramOrganic);
  }
  if (utmSource === 'facebook' && utmMedium === 'organic') {
    updateUrls(ghMap.facebookOrganic);
  }
  if (utmSource === 'meta' && utmMedium === 'paid') {
    updateUrls(ghMap.metaPaid);
  }
  if (utmSource === 'email') {
    updateUrls(ghMap.email);
  }
}
