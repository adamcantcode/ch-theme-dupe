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
  // Reference cookie function
  function getCookie(name) {
    var value = '; ' + document.cookie;
    var parts = value.split('; ' + name + '=');
    if (parts.length === 2) return parts.pop().split(';').shift();
  }
  // gh sources
  const ghMap = {
    linkedinProfile: '9a77be284us',
    linkedinOrganic: 'a0a8b3ae4us',
    linkedinPaid: 'bf069a914us',
    instagramOrganic: '35ddfa714us',
    facebookOrganic: '052412f84us',
    metaPaid: '98215cc84us',
    email: '837aa8f74us',
    emailOutreach: '5c46ab874us',
    handshake: '960a9c544us',
  };
  // get params
  setTimeout(() => {
    const cookieParams = decodeURIComponent(getCookie('urlWithParams'));
    const careersParams = new URLSearchParams(cookieParams.split('?')[1]);
    var utmSource = careersParams.get('utm_source');
    var utmMedium = careersParams.get('utm_medium');
    var utmCampaign = careersParams.get('utm_campaign');

    if (utmSource) {
      utmSource = utmSource.toLowerCase();
    }
    if (utmMedium) {
      utmMedium = utmMedium.toLowerCase();
    }
    if (utmCampaign) {
      utmCampaign = utmCampaign.toLowerCase();
    }
    if (
      utmSource === 'linkedin' &&
      utmMedium === 'organic' &&
      utmCampaign === 'cta-button'
    ) {
      updateUrls(ghMap.linkedinProfile);
    } else if (utmSource === 'linkedin' && utmMedium === 'organic') {
      updateUrls(ghMap.linkedinOrganic);
    } else if (utmSource === 'linkedin' && utmMedium === 'paidsocial') {
      updateUrls(ghMap.linkedinPaid);
    } else if (utmSource === 'instagram' && utmMedium === 'organic') {
      updateUrls(ghMap.instagramOrganic);
    } else if (utmSource === 'facebook' && utmMedium === 'organic') {
      updateUrls(ghMap.facebookOrganic);
    } else if (utmSource === 'meta' && utmMedium === 'paidsocial') {
      updateUrls(ghMap.metaPaid);
    } else if (utmMedium === 'email') {
      updateUrls(ghMap.email);
    } else if (utmSource === 'universityrecruiting' && utmMedium === 'emailoutreach') {
      updateUrls(ghMap.emailOutreach);
    } else if (utmSource === 'job_board' && utmMedium === 'handshake') {
      updateUrls(ghMap.handshake);
    }
  }, 500);
}
