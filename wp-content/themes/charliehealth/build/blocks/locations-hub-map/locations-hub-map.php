<div id="map-wrapper" class="relative min-h-screen">
  <div id="map-loader" class="absolute inset-0 z-10 flex flex-col items-center justify-center">
    <!-- Your custom SVG loader -->
     <img src="/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg" class="">
    <!-- Styled text -->
    <div class="text-h3-base text-primary">Map loading…</div>
  </div>

  <div id="map" class="transition-all opacity-0"></div>
</div>

<script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/locations-hub-map/mapdata.js'); ?>"></script>
<script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/locations-hub-map/usmap.js'); ?>"></script>