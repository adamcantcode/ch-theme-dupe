<!-- GTM Consent Mode <> Osano -->
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('consent', 'default', {
    'ad_storage': 'denied',
    'analytics_storage': 'denied',
    'ad_user_data': 'denied',
    'ad_personalization': 'denied',
    'personalization_storage': 'denied',
    'functionality_storage': 'granted',
    'security_storage': 'granted',
    'wait_for_update': 500
  });
  gtag("set", "ads_data_redaction", true);
</script>
<!-- Osano -->
<script src="https://cmp.osano.com/Azyo1TTVrDWfT1g27/506c8e15-9e60-46ac-882d-af2b5f842576/osano.js"></script>

<!-- Start Freshpaint -->
<script type="text/javascript">
  (function(c, a) {
    if (!a.__SV) {
      var b = window;
      try {
        var d, m, j, k = b.location,
          f = k.hash;
        d = function(a, b) {
          return (m = a.match(RegExp(b + "=([^&]*)"))) ? m[1] : null
        };
        f && d(f, "fpState") && (j = JSON.parse(decodeURIComponent(d(f, "fpState"))), "fpeditor" === j.action && (b.sessionStorage.setItem("_fpcehash", f), history.replaceState(j.desiredHash || "", c.title, k.pathname + k.search)))
      } catch (n) {}
      var l, h;
      window.freshpaint = a;
      a._i = [];
      a.init = function(b, d, g) {
        function c(b, i) {
          var a = i.split(".");
          2 == a.length && (b = b[a[0]], i = a[1]);
          b[i] = function() {
            b.push([i].concat(Array.prototype.slice.call(arguments,
              0)))
          }
        }
        var e = a;
        "undefined" !== typeof g ? e = a[g] = [] : g = "freshpaint";
        e.people = e.people || [];
        e.toString = function(b) {
          var a = "freshpaint";
          "freshpaint" !== g && (a += "." + g);
          b || (a += " (stub)");
          return a
        };
        e.people.toString = function() {
          return e.toString(1) + ".people (stub)"
        };
        l = "disable time_event track track_pageview track_links track_forms track_with_groups add_group set_group remove_group register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user people.remove people group page alias ready addEventProperties addInitialEventProperties removeEventProperty addPageviewProperties registerCallConversion".split(" ");
        for (h = 0; h < l.length; h++) c(e, l[h]);
        var f = "set set_once union unset remove delete".split(" ");
        e.get_group = function() {
          function a(c) {
            b[c] = function() {
              call2_args = arguments;
              call2 = [c].concat(Array.prototype.slice.call(call2_args, 0));
              e.push([d, call2])
            }
          }
          for (var b = {}, d = ["get_group"].concat(Array.prototype.slice.call(arguments, 0)), c = 0; c < f.length; c++) a(f[c]);
          return b
        };
        a._i.push([b, d, g])
      };
      a.__SV = 1.4;
      b = c.createElement("script");
      b.type = "text/javascript";
      b.async = !0;
      b.src = "undefined" !== typeof FRESHPAINT_CUSTOM_LIB_URL ?
        FRESHPAINT_CUSTOM_LIB_URL : "//perfalytics.com/static/js/freshpaint.js";
      (d = c.getElementsByTagName("script")[0]) ? d.parentNode.insertBefore(b, d): c.head.appendChild(b)
    }
  })(document, window.freshpaint || []);
  freshpaint.init("16542b5f-ea29-493d-9d25-d062679c7e98", {
    "consent_management": {
      "osano": {
        "category_mapping": {
          "ANALYTICS": ["Google Analytics 4 Proxy", "Facebook Conversions API", "Google Ads Conversion API"],
        }
      },
      "consent_model": "opt-out"
    }
  });
  freshpaint.page();
</script>
<!-- END Freshpaint -->

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
  window._vwo_code || (function() {
    var account_id = 775354,
      version = 2.0,
      settings_tolerance = 2000,
      hide_element = 'body',
      hide_element_style = 'opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important',
      /* DO NOT EDIT BELOW THIS LINE */
      f = false,
      w = window,
      d = document,
      v = d.querySelector('#vwoCode'),
      cK = '_vwo_' + account_id + '_settings',
      cc = {};
    try {
      var c = JSON.parse(localStorage.getItem('_vwo_' + account_id + '_config'));
      cc = c && typeof c === 'object' ? c : {}
    } catch (e) {}
    var stT = cc.stT === 'session' ? w.sessionStorage : w.localStorage;
    code = {
      use_existing_jquery: function() {
        return typeof use_existing_jquery !== 'undefined' ? use_existing_jquery : undefined
      },
      library_tolerance: function() {
        return typeof library_tolerance !== 'undefined' ? library_tolerance : undefined
      },
      settings_tolerance: function() {
        return cc.sT || settings_tolerance
      },
      hide_element_style: function() {
        return '{' + (cc.hES || hide_element_style) + '}'
      },
      hide_element: function() {
        return typeof cc.hE === 'string' ? cc.hE : hide_element
      },
      getVersion: function() {
        return version
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
        var t = this.getSettings(),
          n = d.createElement('script'),
          i = this;
        if (t) {
          n.textContent = t;
          d.getElementsByTagName('head')[0].appendChild(n);
          if (!w.VWO || VWO.caE) {
            stT.removeItem(cK);
            i.load(e)
          }
        } else {
          n.fetchPriority = 'high';
          n.src = e;
          n.type = 'text/javascript';
          n.onerror = function() {
            _vwo_code.finish()
          };
          d.getElementsByTagName('head')[0].appendChild(n)
        }
      },
      getSettings: function() {
        try {
          var e = stT.getItem(cK);
          if (!e) {
            return
          }
          e = JSON.parse(e);
          if (Date.now() > e.e) {
            stT.removeItem(cK);
            return
          }
          return e.s
        } catch (e) {
          return
        }
      },
      init: function() {
        if (d.URL.indexOf('__vwo_disable__') > -1) return;
        var e = this.settings_tolerance();
        w._vwo_settings_timer = setTimeout(function() {
          _vwo_code.finish();
          stT.removeItem(cK)
        }, e);
        var t = d.currentScript,
          n = d.createElement('style'),
          i = this.hide_element(),
          r = t && !t.async && i ? i + this.hide_element_style() : '',
          c = d.getElementsByTagName('head')[0];
        n.setAttribute('id', '_vis_opt_path_hides');
        v && n.setAttribute('nonce', v.nonce);
        n.setAttribute('type', 'text/css');
        if (n.styleSheet) n.styleSheet.cssText = r;
        else n.appendChild(d.createTextNode(r));
        c.appendChild(n);
        this.load('https://dev.visualwebsiteoptimizer.com/j.php?a=' + account_id + '&u=' + encodeURIComponent(d.URL) + '&vn=' + version)
      }
    };
    w._vwo_code = code;
    code.init();
  })();
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
  })(document, window, "https://www.formstack.com/js/fsa.js", "script", "FSATracker");

  FSATracker.init({
    "account": "1047166",
    "endpoint": "https://www.formstack.com"
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
  assignTrackingParameterToCookie('ttclid');
  assignTrackingParameterToCookie('utm_campaign');
  assignTrackingParameterToCookie('keyword');
  assignTrackingParameterToCookie('msclkid');
</script>
<!-- Formstack Cookie END -->


<!-- FS + Off-label -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    
    const existingCookies = ['gclid', 'fbclid', 'utm_campaign', 'keyword', 'msclkid', 'ttclid'];
    const searchEngines = ['google.com', 'bing.com', 'yahoo.com', 'duckduckgo.com', 'ecosia.org'];

    let cookies = existingCookies.some(cookie => document.cookie.indexOf(cookie + '=') > -1);
    let params = window.location.search !== '';

    function waitForCookie(name, callback) {
      const intervalId = setInterval(() => {
        const cookieValue = getCookie(name);
        if (cookieValue) {
          clearInterval(intervalId);
          callback(cookieValue);
        }
      }, 1000);
    }

    function getCookie(name) {
      const cookieValue = document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)');
      return cookieValue ? cookieValue.pop() : '';
    }

    waitForCookie('FSAC', cookieValue => {
      if (!cookies && !params) {
        const referrerEngine = searchEngines.find(engine => document.referrer.includes(engine));
        if (referrerEngine) {
          var niceName = referrerEngine.split('.');
          var myCookieValue = getCookie('FSAC');
          var values = myCookieValue.split('utm');
          document.cookie = `FSAC=${values[0]}utmcsr%3D${niceName[0]} organic%7Cutmccn%3D(not set)%7Cutmcmd%3Dorganic; path=/; domain=charliehealth.com`;
          document.cookie = `organicLP=${window.location}; path=/; domain=charliehealth.com`;
        } else if (document.referrer && !document.referrer.includes('charliehealth.com')) {
          var source = document.referrer;
          var myCookieValue = getCookie('FSAC');
          var values = myCookieValue.split('utm');
          document.cookie = `FSAC=${values[0]}utmcsr%3D${source}%7Cutmccn%3D(not set)%7Cutmcmd%3Dreferral; path=/; domain=charliehealth.com`;
        }
      }
    });

    function setHiddenFields(form, fieldIds) {
      const cookiesToSet = [{
          name: 'organicLP',
          cookieName: 'organicLP'
        },
        {
          name: 'fbclid',
          cookieName: 'fbclid'
        },
        {
          name: 'msclkid',
          cookieName: 'msclkid'
        },
        {
          name: 'ttclid',
          cookieName: 'ttclid'
        },
        {
          name: 'fbp',
          cookieName: '_fbp'
        }
      ];

      cookiesToSet.forEach(({
        name,
        cookieName
      }) => {
        if (document.cookie.indexOf(cookieName + '=') > -1) {
          form.getField(fieldIds[name]).setValue(getCookie(cookieName));
        }
      });

      fetch('https://api.ipify.org/?format=json')
        .then(results => results.json())
        .then(data => form.getField(fieldIds.userIP).setValue(data.ip));

      form.getField(fieldIds.userAgent).setValue(window.navigator.userAgent);
      form.getField(fieldIds.userJourney).setValue(sessionStorage.getItem('user_journey_'));

      // VWO Test Version
      waitForCookie('_vis_opt_test_cookie', cookieValue => {
        const experimentDetails = getExperimentDetailsFromCookies();
        form.getField(fieldIds.vwoTestVersion).setValue(experimentDetails.join(' & '));
      });
    }

    function getExperimentDetailsFromCookies() {
      const cookies = document.cookie.split('; ');
      return cookies
        .map(cookie => {
          const match = cookie.match(/_vis_opt_exp_(\d+)_combi=([^;]+)/);
          if (match) {
            const experimentNumber = match[1];
            const experimentValue = parseInt(match[2], 10);
            const label = experimentValue === 1 ? 'Control' : `Variation ${experimentValue - 1}`;
            return `${experimentNumber} - ${label}`;
          }
        })
        .filter(Boolean);
    }

    function initializeForm(formId, fieldIds) {
      const form = window.fsApi().getForm(formId);
      form.registerFormEventListener({
        type: 'change-page',
        onFormEvent: function(event) {
          setHiddenFields(form, fieldIds);
          return Promise.resolve(event);
        }
      });
    }

    <?php
    // Get the current page template
    $template = get_page_template_slug();
    // Get the environment type (staging or production)
    $env_type = wp_get_environment_type();
    $formID = '6125398';
    $form_values = [
      'organicLP' => '181222004',
      'fbclid' => '181222006',
      'ttclid' => '181222007',
      'msclkid' => '181222008',
      'userIP' => '181222005',
      'fbp' => '181222009',
      'userAgent' => '181222010',
      'vwoTestVersion' => '181222011',
      'userJourney' => '181222012'
    ];

    if ($template == 'page-form-adol.php' && $env_type == 'staging') {
      $formID = '6127780';
      $form_values = [
        'organicLP' => '181302855',
        'fbclid' => '181302857',
        'ttclid' => '181302858',
        'msclkid' => '181302859',
        'userIP' => '181302856',
        'fbp' => '181302860',
        'userAgent' => '181302861',
        'vwoTestVersion' => '181302862',
        'userJourney' => '181302863'
      ];
    }
    ?>

    if (window.location.href.indexOf('/form') > -1) {
      initializeForm(<?= $formID; ?>, <?php echo json_encode($form_values); ?>);
    }
  });
</script>

</script>
<!-- FS + Off-label END -->
<!-- CH Attribution-->
<script>
  (() => {
    // Configuration of parameters we want to track
    const TRACKING_CONFIG = {
      cookieName: '_ch_trkr',
      expirationDays: 365,
      parameters: ['gclid', 'fbclid', 'ttclid', 'msclkid', 'keyword', 'vwo_test_version', 'user_journey'],
      dynamicPrefix: 'utm_', // Match any parameter starting with this prefix
    };

    // Helper function to get URL parameter value
    const getUrlParameter = (name) => {
      const match = RegExp(`[?&]${name}=([^&]*)`).exec(window.location.search);
      return match ? decodeURIComponent(match[1].replace(/\+/g, ' ')) : null;
    };

    // Helper function to set a cookie
    const setCookie = (name, data, expirationDays) => {
      const expires = new Date();
      expires.setTime(expires.getTime() + expirationDays * 24 * 60 * 60 * 1000);

      try {
        const encodedData = encodeURIComponent(JSON.stringify(data));
        document.cookie = `${name}=${encodedData}; expires=${expires.toUTCString()}; path=/; domain=.charliehealth.com; SameSite=Lax`;
      } catch (error) {
        console.error('Error setting cookie:', error);
      }
    };

    // Helper function to get a cookie's value
    const getCookie = (name) => {
      const cookieMatch = document.cookie
        .split('; ')
        .find(row => row.startsWith(`${name}=`));

      if (cookieMatch) {
        try {
          const cookieValue = cookieMatch.split('=')[1];
          return JSON.parse(decodeURIComponent(cookieValue));
        } catch (error) {
          console.error('Error parsing cookie:', error);
          return null;
        }
      }
      return null;
    };

    // Helper function to collect all URL parameters
    const getAllUrlParameters = () => {
      return Object.fromEntries(new URLSearchParams(window.location.search));
    };

    // Function to get VWO experiment details
    const getVWOCookieDetails = () => {
      const experimentDetails = [];
      const cookies = document.cookie.split('; ');

      cookies.forEach(cookie => {
        const match = cookie.match(/_vis_opt_exp_(\d+)_combi=([^;]+)/);

        if (match && match[1] && match[2]) {
          const experimentNumber = match[1];
          const experimentValue = parseInt(match[2], 10);
          const label = experimentValue === 1 ? 'Control' : `Variation ${experimentValue - 1}`;
          experimentDetails.push(`${experimentNumber} - ${label}`);
        }
      });

      return experimentDetails.join(' & '); // Format as "123 - Variation 1 & 456 - Control"
    };

    // Collect tracking data and update the cookie
    const collectTrackingData = (config) => {
      const existingData = getCookie(config.cookieName) || {};
      const allUrlParams = getAllUrlParameters();
      let dataUpdated = false;

      // Update data with explicitly defined parameters
      config.parameters.forEach((param) => {
        const value = allUrlParams[param];
        if (value && existingData[param] !== value) {
          existingData[param] = value;
          dataUpdated = true;
        }
      });

      // Dynamically include all parameters starting with the configured prefix
      Object.keys(allUrlParams).forEach((param) => {
        if (
          param.startsWith(config.dynamicPrefix) &&
          existingData[param] !== allUrlParams[param]
        ) {
          existingData[param] = allUrlParams[param];
          dataUpdated = true;
        }
      });

      // Add referrer if not already present
      if (!existingData.referrer && document.referrer) {
        existingData.referrer = document.referrer;
        dataUpdated = true;
      }

      // Track user journey (array of visited URLs)
      if (!Array.isArray(existingData.user_journey)) {
        existingData.user_journey = [];
      }

      let currentUrl = window.location.href;
      if (existingData.user_journey[existingData.user_journey.length - 1] !== currentUrl) {
        existingData.user_journey.push(currentUrl);
        dataUpdated = true;
      }

      // Track VWO test version
      const vwoTestVersion = getVWOCookieDetails();
      if (vwoTestVersion && existingData.vwo_test_version !== vwoTestVersion) {
        existingData.vwo_test_version = vwoTestVersion;
        dataUpdated = true;
      }

      // Only set cookie if data has been updated
      if (dataUpdated) {
        setCookie(config.cookieName, existingData, config.expirationDays);
      }

      return existingData;
    };

    // Function to initialize tracking
    const initTracking = (config) => {
      // Collect and log tracking data
      const trackingData = collectTrackingData(config);
      // console.log('Tracking Data:', trackingData);

      // Optional: Return tracking data for further use
      return trackingData;
    };

    // Immediately initialize tracking when script loads
    const initialTrackingData = initTracking(TRACKING_CONFIG);

  })();
</script>
<!-- CH Attribution END -->