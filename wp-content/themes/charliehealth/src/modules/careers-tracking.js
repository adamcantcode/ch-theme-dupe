export default function careersTracking() {
  // gh codes
  const ghMap = {
    linkedinOrganic: 'a0a8b3ae4us',
    instagramOrganic: '35ddfa714us',
    facebookOrganic: '052412f84us',
    metaPaid: '98215cc84us',
    email: '837aa8f74us',
  };
  // get params
  const careersParams = new URLSearchParams(window.location.search);
  const utmSource = careersParams.get('utm_source');
  const utmMedium = careersParams.get('utm_medium');

  // Update urls function
  function updateUrls(ghCode) {
    // Get links
    const anchors = document.querySelectorAll('a');

    anchors.forEach((anchor) => {
      // if link is openings
      if (anchor.href.endsWith('openings')) {
        anchor.href += `?gh_src=${ghCode}`;
      }
    });
  }

  // Update urls if params are present
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
