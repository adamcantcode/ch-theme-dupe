<script src="https://cmp.osano.com/Azyo1TTVrDWfT1g27/506c8e15-9e60-46ac-882d-af2b5f842576/osano.js"></script>

<!-- Google Tag Manager PROD-->
<script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-P8BB2ZV');
</script>
<!-- End Google Tag Manager PROD -->

<!-- Google Search Console Verification -->
<!--http(s)//www-->
<meta name="google-site-verification" content="_GbQR1oO4QpXoIhpOxY_kJfw49FoeqJ4sUgE_wCcxgA" />
<!--http(s)//-->
<meta name="google-site-verification" content="9XC0j6PxX-mSZxPrb3tnitAn_LcyZzUnBbank6v39m8" />
<!-- End Google Search Console Verification -->

<!-- Formstack -->
<script>
  (function(t, e, n, r, a) {
    var c, i = e[a] = e[a] || {
        init: function(t) {
          function e(t) {
            i[t] = function() {
              i.q.push([t, [].slice.call(arguments, 0)])
            }
          }
          var n, r;
          i.q = [],
            n = "addListener track".split(" ");
          for (r in n) e(n[r]);
          i.q.push(["init", [t || {}]])
        }
      },
      s = t.createElement(r);
    s.async = 1, s.src = n,
      c = t.getElementsByTagName(r)[0], c.parentNode.insertBefore(s, c)
  })(document, window, "https://analytics.formstack.com/js/fsa.js", "script", "FSATracker");

  FSATracker.init({
    "account": "1047166",
    "endpoint": "https://analytics.formstack.com"
  });
</script>
<!-- Formstack END -->

<!-- Formstack Cookie -->
<script>
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  function getParam(p) {
    var match = RegExp('[?&]' + p + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
  }

  function assignTrackingParameterToCookie(fieldParam) {
    var field = getParam(fieldParam),
      inputs;
    if (field) {
      setCookie(fieldParam, field, 365);
    }
  }
  assignTrackingParameterToCookie('gclid');
  assignTrackingParameterToCookie('fbclid');
  assignTrackingParameterToCookie('utm_campaign');
  assignTrackingParameterToCookie('keyword');
  assignTrackingParameterToCookie('msclkid');
</script>
<!-- Formstack Cookie END -->

<!-- Formstack attribution fix -->
<script>
  // List of coockies generated when link has UTM Params
  const existingCookies = [
    'gclid',
    'fbclid',
    'utm_campaign',
    'keyword',
    'msclkid',
  ];
  // List of search engines to check for
  const searchEngines = [
    'google.com',
    'bing.com',
    'yahoo.com',
    'duckduckgo.com',
    'ecosia.org',
  ];
  // Set variable for existing cookies to false
  var cookies = false;
  var params = false;

  if (window.location.search !== '') {
    params = true;
  }

  // Check for existing cookies
  existingCookies.forEach((cookie) => {
    if (document.cookie.indexOf(cookie + '=') > -1) {
      // If any exist set to true
      cookies = true;
    } else {
      return;
    }
  });

  // Wait for formtack cookie to exist--does not exist on page laod
  function waitForCookie(name, callback) {
    const intervalId = setInterval(() => {
      const cookieValue = getCookie(name);
      if (cookieValue) {
        clearInterval(intervalId);
        callback(cookieValue);
      }
    }, 1000);
  }

  // Get cookie by name
  function getCookie(name) {
    const cookieValue = document.cookie.match(
      '(^|;)\\s*' + name + '\\s*=\\s*([^;]+)'
    );
    return cookieValue ? cookieValue.pop() : '';
  }

  // Wait for FS feilds to exist
  function waitForElement(id, callback) {
    const targetNode = document.getElementById(id);

    if (targetNode) {
      callback(targetNode);
      return;
    }
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.addedNodes) {
          const node = Array.from(mutation.addedNodes).find((n) => n.id === id);
          if (node) {
            observer.disconnect();
            callback(node);
          }
        }
      });
    });

    observer.observe(document.documentElement, {
      childList: true,
      subtree: true,
    });
  }

  waitForCookie('FSAC', (cookieValue) => {
    // If no FS UTM param cookies, and no PARAMS at all
    if (!cookies && !params) {
      // If no UTM params AND no FS UTM cookie AND last page is search engine
      // Will not be paid, will not be direct, will not be organic with params
      searchEngines.forEach((engine) => {
        if (document.referrer.includes(engine)) {
          var niceName = engine.split('.');
          var myCookieValue = getCookie('FSAC');
          var values = myCookieValue.split('utm');
          document.cookie =
            'FSAC=' +
            values[0] +
            'utmcsr%3D' +
            niceName[0] +
            ' organic' +
            '%7Cutmccn%3D(not set)%7Cutmcmd%3Dorganic;' +
            'path=/;domain=charliehealth.com';
          document.cookie =
            'organicLP=' + window.location + ';path=/;domain=charliehealth.com';
          return;
        }
      });
      if (!searchEngines.some(searchEngine => document.referrer.includes(searchEngine))) {
        if (document.referrer !== '' && !document.referrer.includes(window.location)) {
          var source = document.referrer;
          var myCookieValue = getCookie('FSAC');
          var values = myCookieValue.split('utm');
          document.cookie =
            'FSAC=' +
            values[0] +
            'utmcsr%3D' +
            source +
            '%7Cutmccn%3D(not set)%7Cutmcmd%3Dreferral;' +
            'path=/;domain=charliehealth.com';
        }
      }
    }
  });

  if (window.location.href.indexOf('form') > -1) {
    if (document.cookie.indexOf('organicLP' + '=') > -1) {
      if (!params) {
        waitForElement('field139624275', (element) => {
          element.value = getCookie('organicLP');
        });
      }
    }
  }
</script>
<!-- Attribution Fix END -->