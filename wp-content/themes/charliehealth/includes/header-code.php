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

<script>
  // Configuration of parameters we want to track
  const TRACKING_CONFIG = {
    cookieName: 'tracking_data',
    expirationDays: 365,
    parameters: ['gclid', 'fbclid', 'ttclid', 'keyword', 'msclkid', 'organicLP'],
    dynamicPrefix: 'utm_', // Match any parameter starting with this prefix
  };

  // Helper function to get URL parameter value
  const getUrlParameter = (name) => {
    const match = RegExp(`[?&]${name}=([^&]*)`).exec(window.location.search);
    console.log(match);
    return match ? decodeURIComponent(match[1].replace(/\+/g, ' ')) : null;
  };

  // Helper function to set a cookie
  const setCookie = (name, data, expirationDays) => {
    const expires = new Date();
    expires.setTime(expires.getTime() + expirationDays * 24 * 60 * 60 * 1000);

    const encodedData = btoa(JSON.stringify(data));
    document.cookie = `${name}=${encodedData}; expires=${expires.toUTCString()}; path=/`;
  };

  // Helper function to get a cookie's value
  const getCookie = (name) => {
    const match = document.cookie.match(new RegExp(`${name}=([^;]+)`));
    if (match) {
      try {
        return JSON.parse(atob(match[1]));
      } catch (e) {
        console.error('Error decoding cookie:', e);
        return null;
      }
    }
    return null;
  };

  // Helper function to collect all URL parameters
  const getAllUrlParameters = () => {
    return Object.fromEntries(new URLSearchParams(window.location.search));
  };

  // Collect tracking data and update the cookie
  const collectTrackingData = (config) => {
    const existingData = getCookie(config.cookieName) || {};
    const allUrlParams = getAllUrlParameters();
    let hasNewData = false;

    // Update data with explicitly defined parameters
    config.parameters.forEach((param) => {
      const value = allUrlParams[param];
      if (value && existingData[param] !== value) {
        existingData[param] = value;
        hasNewData = true;
      }
    });

    // Dynamically include all parameters starting with the configured prefix
    Object.keys(allUrlParams).forEach((param) => {
      if (
        param.startsWith(config.dynamicPrefix) &&
        existingData[param] !== allUrlParams[param]
      ) {
        existingData[param] = allUrlParams[param];
        hasNewData = true;
      }
    });

    // Add referrer if not already present
    if (!existingData.referrer && document.referrer) {
      existingData.referrer = document.referrer;
      hasNewData = true;
    }

    // Add last updated timestamp if there's new data
    if (hasNewData) {
      existingData.lastUpdated = new Date().toISOString();
      setCookie(config.cookieName, existingData, config.expirationDays);
    }

    return existingData;
  };

  // Get tracking data (decoded object)
  const getTrackingData = (config) => getCookie(config.cookieName) || {};

  // Initialize tracking on page load
  document.addEventListener('DOMContentLoaded', () => {
    collectTrackingData(TRACKING_CONFIG);
  });

  // Example usage:
  const trackingData = getTrackingData(TRACKING_CONFIG);
  console.log(trackingData);
</script>