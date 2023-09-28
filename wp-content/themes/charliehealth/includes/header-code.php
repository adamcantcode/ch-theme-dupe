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

<!-- Start VWO Async SmartCode -->
<link rel="preconnect" href="https://dev.visualwebsiteoptimizer.com" />
<script type='text/javascript' id='vwoCode'>
  window._vwo_code = window._vwo_code || (function() {
    var account_id = 775354,
      version = 1.5,
      settings_tolerance = 2000,
      library_tolerance = 2500,
      use_existing_jquery = false,
      is_spa = 1,
      hide_element = 'body',
      hide_element_style = 'opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important',
      /* DO NOT EDIT BELOW THIS LINE */
      f = false,
      w = window,
      d = document,
      vwoCodeEl = d.querySelector('#vwoCode'),
      code = {
        use_existing_jquery: function() {
          return use_existing_jquery
        },
        library_tolerance: function() {
          return library_tolerance
        },
        hide_element_style: function() {
          return '{' + hide_element_style + '}'
        },
        finish: function() {
          if (!f) {
            f = true;
            var e = d.getElementById('_vis_opt_path_hides');
            if (e) e.parentNode.removeChild(e)
          }
        },
        finished: function() {
          return f
        },
        load: function(e) {
          var t = d.createElement('script');
          t.fetchPriority = 'high';
          t.src = e;
          t.type = 'text/javascript';
          t.onerror = function() {
            _vwo_code.finish()
          };
          d.getElementsByTagName('head')[0].appendChild(t)
        },
        getVersion: function() {
          return version
        },
        getMatchedCookies: function(e) {
          var t = [];
          if (document.cookie) {
            t = document.cookie.match(e) || []
          }
          return t
        },
        getCombinationCookie: function() {
          var e = code.getMatchedCookies(/(?:^|;)\s?(_vis_opt_exp_\d+_combi=[^;$]*)/gi);
          e = e.map(function(e) {
            try {
              var t = decodeURIComponent(e);
              if (!/_vis_opt_exp_\d+_combi=(?:\d+,?)+\s*$/.test(t)) {
                return ''
              }
              return t
            } catch (e) {
              return ''
            }
          });
          var i = [];
          e.forEach(function(e) {
            var t = e.match(/([\d,]+)/g);
            t && i.push(t.join('-'))
          });
          return i.join('|')
        },
        init: function() {
          if (d.URL.indexOf('__vwo_disable__') > -1) return;
          w.settings_timer = setTimeout(function() {
            _vwo_code.finish()
          }, settings_tolerance);
          var e = d.currentScript,
            t = d.createElement('style'),
            i = e && !e.async ? hide_element ? hide_element + '{' + hide_element_style + '}' : '' : code.lA = 1,
            n = d.getElementsByTagName('head')[0];
          t.setAttribute('id', '_vis_opt_path_hides');
          vwoCodeEl && t.setAttribute('nonce', vwoCodeEl.nonce);
          t.setAttribute('type', 'text/css');
          if (t.styleSheet) t.styleSheet.cssText = i;
          else t.appendChild(d.createTextNode(i));
          n.appendChild(t);
          var o = this.getCombinationCookie();
          this.load('https://dev.visualwebsiteoptimizer.com/j.php?a=' + account_id + '&u=' + encodeURIComponent(d.URL) + '&f=' + +is_spa + '&vn=' + version + (o ? '&c=' + o : ''));
          return settings_timer
        }
      };
    w._vwo_settings_timer = code.init();
    return code;
  }());
</script>
<!-- End VWO Async SmartCode -->

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
      // Is not any of the search engines
      if (!searchEngines.some(searchEngine => document.referrer.includes(searchEngine))) {
        // Is not direct and referrer is not same site
        if (document.referrer !== '' && !document.referrer.includes('charliehealth.com')) {
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