<?php
get_header();

$regionImage       = get_field('region_image');
$regionInformation = get_field('region_information');
$statesServed      = get_field('states_served');
$pageSubregions    = get_field('subregion');


$statesServedList = implode(", ", $statesServed);
$lastComma = strrpos($statesServedList, ',');
if ($lastComma !== false) {
  $statesServedList = substr_replace($statesServedList, ' and', $lastComma, 1);
}

$directorArgs = array(
  'post_type' => 'outreach-team-member',
  'numberposts' => -1,
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => array(
    'director_check' => 'DESC',
    'title_check' => 'ASC'
  ),
  'meta_query' => array(
    'relation' => 'AND',
    'director_check' => array(
      array(
        'key' => 'is_director',
        'value' => '1',
        'compare' => '=',
        'order' => 'DESC',
      ),
    ),
    'title_check' => array(
      array(
        'key' => 'title',
        'order' => 'ASC',
      ),
    ),
    array(
      'key' => 'region',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  ),
);
$nonDirectorArgs = array(
  'post_type' => 'outreach-team-member',
  'numberposts' => -1,
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => array(
    'director_check' => 'DESC',
    'title_check' => 'ASC'
  ),
  'meta_query' => array(
    'relation' => 'AND',
    'director_check' => array(
      array(
        'key' => 'is_director',
        'value' => '0',
        'compare' => '=',
        'order' => 'DESC',
      ),
    ),
    'title_check' => array(
      array(
        'key' => 'title',
        'order' => 'ASC',
      ),
    ),
    array(
      'key' => 'region', // name of custom field
      'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
      'compare' => 'LIKE'
    )
  ),
);

?>

<section class="section-top">
  <div class="container">
    <h1><?= get_the_title(); ?></h1>
    <?php if (count($statesServed) > 1) : ?>
      <h4>Serving: <?= $statesServedList; ?></h4>
    <?php endif; ?>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="rounded-md border-gradient">
      <div class="grid items-center lg:grid-cols-2">
        <div class="flex items-center h-full bg-light-purple lg:rounded-l-md lg:rounded-tr-none rounded-t-md">
          <img src="<?= $regionImage['url']; ?>" alt="Illustration of <?= get_the_title(); ?>" class="object-cover w-full h-full lg:rounded-l-md lg:rounded-tr-none rounded-t-md">
        </div>
        <div class="p-sp-8">
          <?= $regionInformation; ?>
          <div class="flex gap-x-sp-4 items-center md:w-[unset] w-full">
            <a href="#refForm" class="ch-button button-primary-ch">Refer a Client</a>
            <a href="#team" class="ch-button button-secondary-ch">View Team</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="refForm" class="section-bottom">
  <div class="container">
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
</section>
<section class="section-sm">
  <div class="container">
    <div class="divider"></div>
  </div>
</section>
<section id="team" class="section">
  <div class="container">
    <h2>Meet our team</h2>
    <?php
    if ($pageSubregions) :
      foreach ($pageSubregions as $pageSubregion) : ?>
        <h3><?= $pageSubregion; ?></h3>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16 mb-sp-16">
          <?php
          $custom_query = new WP_Query($directorArgs);

          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
              $title = get_field('title');
              $state = get_field('state');
              $state = implode(", ", $state);
              $lastComma = strrpos($state, ',');
              if ($lastComma !== false) {
                $state = substr_replace($state, ' and', $lastComma, 1);
              }
              $phone = get_field('phone');
              $email = get_field('email');
              $headshot = get_field('headshot');
              if ($headshot) {
                $altText = $headshot['alt'];
              } else {
                $altText = 'Headshot of ' . get_the_title();
              }
              $subregion = get_field('subregion_subregion');
          ?>
              <?php if ($subregion[0] === $pageSubregion) : ?>
                <div class="grid justify-items-start gap-sp-1">
                  <div class="cursor-pointer" data-modal-id="<?= get_the_ID(); ?>">
                    <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png'); ?>" alt="<?= $altText; ?>" class="rounded-circle mb-sp-4 w-[240px] hover:shadow-lg duration-300">
                    <h4 class="underline"><?= get_the_title(); ?></h4>
                  </div>
                  <h5 class="mb-0"><?= $title; ?></h5>
                  <h5 class="mb-0"><?= $state; ?></h5>
                  <?php if ($phone) : ?>
                    <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
                      <h5 class="mb-0"><?= $phone; ?></h5>
                    </a>
                  <?php endif; ?>
                  <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
                    <h5 class="mb-0"><?= $email; ?></h5>
                  </a>
                </div>
              <?php endif; ?>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
          <?php
          $custom_query = new WP_Query($nonDirectorArgs);

          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
              $title = get_field('title');
              $state = get_field('state');
              $state = implode(", ", $state);
              $lastComma = strrpos($state, ',');
              if ($lastComma !== false) {
                $state = substr_replace($state, ' and', $lastComma, 1);
              }
              $phone = get_field('phone');
              $email = get_field('email');
              $headshot = get_field('headshot');
              if ($headshot) {
                $altText = $headshot['alt'];
              } else {
                $altText = 'Headshot of ' . get_the_title();
              }
              $subregion = get_field('subregion_subregion');
          ?>
              <?php if ($subregion[0] === $pageSubregion) : ?>
                <div class="grid justify-items-start gap-sp-1">
                  <div class="cursor-pointer" data-modal-id="<?= get_the_ID(); ?>">
                    <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png'); ?>" alt="<?= $altText; ?>" class="rounded-circle mb-sp-4 w-[240px] hover:shadow-lg duration-300">
                    <h4 class="underline"><?= get_the_title(); ?></h4>
                  </div>
                  <h5 class="mb-0"><?= $title; ?></h5>
                  <h5 class="mb-0"><?= $state; ?></h5>
                  <?php if ($phone) : ?>
                    <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
                      <h5 class="mb-0"><?= $phone; ?></h5>
                    </a>
                  <?php endif; ?>
                  <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
                    <h5 class="mb-0"><?= $email; ?></h5>
                  </a>
                </div>
              <?php endif; ?>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16">
        <?php
        $custom_query = new WP_Query($directorArgs);

        if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
            $title = get_field('title');
            $state = get_field('state');
            $state = implode(", ", $state);
            $lastComma = strrpos($state, ',');
            if ($lastComma !== false) {
              $state = substr_replace($state, ' and', $lastComma, 1);
            }
            $phone = get_field('phone');
            $email = get_field('email');
            $headshot = get_field('headshot');
            if ($headshot) {
              $altText = $headshot['alt'];
            } else {
              $altText = 'Headshot of ' . get_the_title();
            }
        ?>
            <?php if ($subregion === $subregion) : ?>
              <div class="grid justify-items-start gap-sp-1">
                <div class="cursor-pointer" data-modal-id="<?= get_the_ID(); ?>">
                  <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png'); ?>" alt="<?= $altText; ?>" class="rounded-circle mb-sp-4 w-[240px] hover:shadow-lg duration-300">
                  <h4 class="underline"><?= get_the_title(); ?></h4>
                </div>
                <h5 class="mb-0"><?= $title; ?></h5>
                <h5 class="mb-0"><?= $state; ?></h5>
                <?php if ($phone) : ?>
                  <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
                    <h5 class="mb-0"><?= $phone; ?></h5>
                  </a>
                <?php endif; ?>
                <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
                  <h5 class="mb-0"><?= $email; ?></h5>
                </a>
              </div>
            <?php endif; ?>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
        <?php
        $custom_query = new WP_Query($nonDirectorArgs);

        if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
            $title = get_field('title');
            $state = get_field('state');
            $state = implode(", ", $state);
            $lastComma = strrpos($state, ',');
            if ($lastComma !== false) {
              $state = substr_replace($state, ' and', $lastComma, 1);
            }
            $phone = get_field('phone');
            $email = get_field('email');
            $headshot = get_field('headshot');
            if ($headshot) {
              $altText = $headshot['alt'];
            } else {
              $altText = 'Headshot of ' . get_the_title();
            }
        ?>
            <?php if ($subregion === $subregion) : ?>
              <div class="grid justify-items-start gap-sp-1">
                <div class="cursor-pointer" data-modal-id="<?= get_the_ID(); ?>">
                  <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png'); ?>" alt="<?= $altText; ?>" class="rounded-circle mb-sp-4 w-[240px] hover:shadow-lg duration-300">
                  <h4 class="underline"><?= get_the_title(); ?></h4>
                </div>
                <h5 class="mb-0"><?= $title; ?></h5>
                <h5 class="mb-0"><?= $state; ?></h5>
                <?php if ($phone) : ?>
                  <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
                    <h5 class="mb-0"><?= $phone; ?></h5>
                  </a>
                <?php endif; ?>
                <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
                  <h5 class="mb-0"><?= $email; ?></h5>
                </a>
              </div>
            <?php endif; ?>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<!-- MODALS -->
<?php
$custom_query = new WP_Query($directorArgs);

if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
    $title     = get_field('title');
    $state     = get_field('state');
    $state     = implode(", ", $state);
    $lastComma = strrpos($state, ',');
    if ($lastComma !== false) {
      $state = substr_replace($state, ' and', $lastComma, 1);
    }
    $phone    = get_field('phone');
    $email    = get_field('email');
    $calendly = get_field('calendly_link');
    $why      = get_field('why_statement');
    $fact     = get_field('fun_fact');
    $headshot = get_field('headshot');
    if ($headshot) {
      $altText = $headshot['alt'];
    } else {
      $altText = 'Headshot of ' . get_the_title();
    }
?>
    <div class="bg-[rgba(0,0,0,.5)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade" data-modal="<?= get_the_ID(); ?>">
      <div class="transition-all duration-300 m-sp-4">
        <div class="grid lg:grid-cols-[1.5fr,1fr] gap-sp-8 section-xs bg-cream container max-h-[80vh] overflow-auto rounded-md items-center relative">
          <div class="absolute top-0 right-0 cursor-pointer">
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/close-x.svg'); ?>" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0">
          </div>
          <div class="grid order-2 gap-sp-8 lg:order-1">
            <div class="grid justify-items-start gap-sp-1">
              <h4 class="mb-0"><?= get_the_title(); ?></h4>
              <h5 class="mb-0"><?= $title; ?></h5>
              <h5 class="mb-0"><?= $state; ?></h5>
              <?php if ($phone) : ?>
                <a href="tel:+<?= $phone; ?>" class="no-underline break-all">
                  <h5 class="mb-0"><?= $phone; ?></h5>
                </a>
              <?php endif; ?>
              <a href="mailto:<?= $email; ?>" class="no-underline break-all">
                <h5 class="mb-0"><?= $email; ?></h5>
              </a>
              <?php if ($calendly) : ?>
                <a href="<?= $calendly; ?>" target="_blank" class="">
                  <h5 class="mb-0">Let's chat</h5>
                </a>
              <?php endif; ?>
            </div>
            <?php if ($fact) : ?>
              <h3 class="mb-0">“<?= $why; ?>”</h3>
            <?php endif; ?>
            <?php if ($fact) : ?>
              <div>
                <h5>Fun Fact</h5>
                <p class="mb-0 text-h5"><?= $fact; ?></p>
              </div>
            <?php endif; ?>
          </div>
          <div class="grid items-center justify-center order-1 lg:order-2">
            <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png');; ?>" alt="<?= $altText ?>" class="rounded-circle">
          </div>
        </div>
      </div>
    </div>
<?php
  endwhile;
  wp_reset_postdata();
endif;
?>
<?php
$custom_query = new WP_Query($nonDirectorArgs);

if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
    $title     = get_field('title');
    $state     = get_field('state');
    $state     = implode(", ", $state);
    $lastComma = strrpos($state, ',');
    if ($lastComma !== false) {
      $state = substr_replace($state, ' and', $lastComma, 1);
    }
    $phone    = get_field('phone');
    $email    = get_field('email');
    $calendly = get_field('calendly_link');
    $why      = get_field('why_statement');
    $fact     = get_field('fun_fact');
    $headshot = get_field('headshot');
    if ($headshot) {
      $altText = $headshot['alt'];
    } else {
      $altText = 'Headshot of ' . get_the_title();
    }
?>
    <div class="bg-[rgba(0,0,0,.5)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade" data-modal="<?= get_the_ID(); ?>">
      <div class="transition-all duration-300 m-sp-4">
        <div class="grid lg:grid-cols-[1.5fr,1fr] gap-sp-8 section-xs bg-cream container max-h-[80vh] overflow-auto rounded-md items-center relative">
          <div class="absolute top-0 right-0 cursor-pointer">
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/close-x.svg'); ?>" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0">
          </div>
          <div class="grid order-2 gap-sp-8 lg:order-1">
            <div class="grid justify-items-start gap-sp-1">
              <h4 class="mb-0"><?= get_the_title(); ?></h4>
              <h5 class="mb-0"><?= $title; ?></h5>
              <h5 class="mb-0"><?= $state; ?></h5>
              <?php if ($phone) : ?>
                <a href="tel:+<?= $phone; ?>" class="no-underline break-all">
                  <h5 class="mb-0"><?= $phone; ?></h5>
                </a>
              <?php endif; ?>
              <a href="mailto:<?= $email; ?>" class="no-underline break-all">
                <h5 class="mb-0"><?= $email; ?></h5>
              </a>
              <?php if ($calendly) : ?>
                <a href="<?= $calendly; ?>" target="_blank" class="">
                  <h5 class="mb-0">Let's chat</h5>
                </a>
              <?php endif; ?>
            </div>
            <?php if ($fact) : ?>
              <h3 class="mb-0">“<?= $why; ?>”</h3>
            <?php endif; ?>
            <?php if ($fact) : ?>
              <div>
                <h5>Fun Fact</h5>
                <p class="mb-0 text-h5"><?= $fact; ?></p>
              </div>
            <?php endif; ?>
          </div>
          <div class="grid items-center justify-center order-1 lg:order-2">
            <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png');; ?>" alt="<?= $altText ?>" class="rounded-circle">
          </div>
        </div>
      </div>
    </div>
<?php
  endwhile;
  wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>