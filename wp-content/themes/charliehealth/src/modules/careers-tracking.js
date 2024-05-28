export default function careersTracking() {
  // Update urls function
  function updateUrls(ghCode) {
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
  setTimeout(() => {
    const cookieParams = decodeURIComponent(getCookie('urlWithParams'));
    const careersParams = new URLSearchParams(cookieParams.split('?')[1]);
    var utmSource = careersParams.get('utm_source');
    var utmMedium = careersParams.get('utm_medium');

    if (utmSource) {
      utmSource = utmSource.toLowerCase();
    }
    if (utmMedium) {
      utmMedium = utmMedium.toLowerCase();
    }

    if (utmSource === 'linkedin' && utmMedium === 'organic') {
      updateUrls(ghMap.linkedinOrganic);
    } else if (utmSource === 'instagram' && utmMedium === 'organic') {
      updateUrls(ghMap.instagramOrganic);
    } else if (utmSource === 'facebook' && utmMedium === 'organic') {
      updateUrls(ghMap.facebookOrganic);
    }
    if (utmSource === 'meta' && utmMedium === 'paidsocial') {
      updateUrls(ghMap.metaPaid);
    }
    if (utmMedium === 'email') {
      updateUrls(ghMap.email);
    }
  }, 500);
}
