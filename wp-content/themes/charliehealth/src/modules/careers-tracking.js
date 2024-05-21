export default function careersTracking() {
  // Update urls function
  function updateUrls(ghCode) {
    // Get links
    setTimeout(() => {
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
    }, 300);
  }
  // Reference cookie function
  function getCookie(name) {
    var value = '; ' + document.cookie;
    var parts = value.split('; ' + name + '=');
    if (parts.length === 2) return parts.pop().split(';').shift();
  }
  // gh sources
  const ghMap = {
    linkedinOrganic: 'a0a8b3ae4us',
    instagramOrganic: '35ddfa714us',
    facebookOrganic: '052412f84us',
    metaPaid: '98215cc84us',
    email: '837aa8f74us',
  };
  // get params
  const cookieParams = decodeURIComponent(getCookie('urlWithParams'));
  const careersParams = new URLSearchParams(cookieParams.split('?')[1]);
  const utmSource = careersParams.get('utm_source');
  const utmMedium = careersParams.get('utm_medium');

  if (utmSource === 'linkedin' && utmMedium === 'organic') {
    updateUrls(ghMap.linkedinOrganic);
  } else if (utmSource === 'instagram' && utmMedium === 'organic') {
    updateUrls(ghMap.instagramOrganic);
  } else if (utmSource === 'facebook' && utmMedium === 'organic') {
    updateUrls(ghMap.facebookOrganic);
  }
  if (utmSource === 'meta' && utmMedium === 'paid') {
    updateUrls(ghMap.metaPaid);
  }
  if (utmSource === 'email') {
    updateUrls(ghMap.email);
  }
}
