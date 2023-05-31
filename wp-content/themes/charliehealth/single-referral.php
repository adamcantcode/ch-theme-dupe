<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section">
    <div class="container-md">
      <div class="text-center">
        <h1>Professional Referrals</h1>
        <h2><?= get_the_title(); ?></h2>
      </div>
      <h4>Refer a Patient</h4>
      <p>Charlie Health welcomes the opportunity to partner with you to provide excellent care to your patients.</p>
      <p>Need help or additional information? Please contact our outreach and admissions teams below for any questions about referring patients to our programs or about the admissions process.</p>
      <p><i>CH MH Services (CA) LLC is certified by the State Department of Health Care Services (Lic. #300414AP expiring 06/30/2023).</i></p>
      <p><i>For detailed information on our California Facility Licensure, please visit the <a href="https://geohub-cadhcs.hub.arcgis.com/datasets/CADHCS::sud-recovery-treatment-facilities-1/explore?location=33.650768%2C-117.838283%2C21.00" target="_blank">California Health and Human Services Department's website.</a></i></p>
    </div>
  </section>
  <section class="section-horizontal">
    <div class="container-md">
      <div class="divider"></div>
    </div>
  </section>
  <section class="section-top">
    <div class="container-md">
      <div>
        <iframe id="JotFormIFrame-220244525122139" title="Charlie Health Professional Referral Form" onload="window.parent.scrollTo(0,0)" allowtransparency="true" allowfullscreen="true" allow="geolocation; microphone; camera" src="https://hipaa.jotform.com/220244525122139" frameborder="0" style="
      min-width: 100%;
      height:539px;
      border:none;" scrolling="no">
        </iframe>
        <script type="text/javascript">
          var ifr = document.getElementById("JotFormIFrame-220244525122139");
          if (ifr) {
            var src = ifr.src;
            var iframeParams = [];
            if (window.location.href && window.location.href.indexOf("?") > -1) {
              iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
            }
            if (src && src.indexOf("?") > -1) {
              iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
              src = src.substr(0, src.indexOf("?"))
            }
            iframeParams.push("isIframeEmbed=1");
            ifr.src = src + "?" + iframeParams.join('&');
          }
          window.handleIFrameMessage = function(e) {
            if (typeof e.data === 'object') {
              return;
            }
            var args = e.data.split(":");
            if (args.length > 2) {
              iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]);
            } else {
              iframe = document.getElementById("JotFormIFrame");
            }
            if (!iframe) {
              return;
            }
            switch (args[0]) {
              case "scrollIntoView":
                iframe.scrollIntoView();
                break;
              case "setHeight":
                iframe.style.height = args[1] + "px";
                break;
              case "collapseErrorPage":
                if (iframe.clientHeight > window.innerHeight) {
                  iframe.style.height = window.innerHeight + "px";
                }
                break;
              case "reloadPage":
                window.location.reload();
                break;
              case "loadScript":
                if (!window.isPermitted(e.origin, ['jotform.com', 'jotform.pro'])) {
                  break;
                }
                var src = args[1];
                if (args.length > 3) {
                  src = args[1] + ':' + args[2];
                }
                var script = document.createElement('script');
                script.src = src;
                script.type = 'text/javascript';
                document.body.appendChild(script);
                break;
              case "exitFullscreen":
                if (window.document.exitFullscreen) window.document.exitFullscreen();
                else if (window.document.mozCancelFullScreen) window.document.mozCancelFullScreen();
                else if (window.document.mozCancelFullscreen) window.document.mozCancelFullScreen();
                else if (window.document.webkitExitFullscreen) window.document.webkitExitFullscreen();
                else if (window.document.msExitFullscreen) window.document.msExitFullscreen();
                break;
            }
            var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
            if (isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
              var urls = {
                "docurl": encodeURIComponent(document.URL),
                "referrer": encodeURIComponent(document.referrer)
              };
              iframe.contentWindow.postMessage(JSON.stringify({
                "type": "urls",
                "value": urls
              }), "*");
            }
          };
          window.isPermitted = function(originUrl, whitelisted_domains) {
            var url = document.createElement('a');
            url.href = originUrl;
            var hostname = url.hostname;
            var result = false;
            if (typeof hostname !== 'undefined') {
              whitelisted_domains.forEach(function(element) {
                if (hostname.slice((-1 * element.length - 1)) === '.'.concat(element) || hostname === element) {
                  result = true;
                }
              });
              return result;
            }
          };
          if (window.addEventListener) {
            window.addEventListener("message", handleIFrameMessage, false);
          } else if (window.attachEvent) {
            window.attachEvent("onmessage", handleIFrameMessage);
          }
        </script>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container-md">
      <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-sp-16 gap-sp-8">
        <div>
          <h4>For general questions about Charlie Health's services and programs, please contact:</h4>
          <?= get_field('contact') ?: ''; ?>
        </div>
        <div>
          <h4>For specific questions about Charlie Health's admissions process, please contact:</h4>
          <p>Admissions Team (<a href="mailto:admissions@charliehealth.com?subject=Inquiry%20about%20Charlie%20Health%20Admissions">admissions@charliehealth.com</a>)</p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>