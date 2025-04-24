<section class="relative w-screen h-screen overflow-hidden section hero-bg-vid">
  <video autoplay muted loop playsinline poster="/wp-content/themes/charliehealth/resources/videos/background/poster.png" class="absolute top-0 left-0 z-0 object-cover w-full h-full">
    <source src="/wp-content/themes/charliehealth/resources/videos/background/charlie-health-iop.mp4" type="video/mp4" />
  </video>
  <div class="relative z-10 flex flex-col items-center justify-center h-full text-center container-md">
    <h1 class="text-white font-heading-serif mb-base5-2">Connecting the world to life-saving</h1>
    <span class=" text-h1-base font-heading-serif mb-base5-10 value-props-js inline-block min-h-[1em]"></span>
    <div class="flex flex-col lg:flex-wrap lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
      <a href="/form" class="ch-button button-primary-ch inverted">Get Started</a>
      <a href="tel:+19862060414" class="ch-button button-secondary-ch inverted">1 (986) 206-0414</a>
    </div>
  </div>
</section>

<script>
  function adjustHeroHeight() {
  const header = document.querySelector('header');
  const section = document.querySelector('.hero-bg-vid');

  if (header && section) {
    const headerHeight = header.offsetHeight;
    section.style.height = `calc(100vh - ${headerHeight}px)`;
    section.style.marginTop = `${headerHeight}px`;
  }
}

// Run on DOM ready
document.addEventListener('DOMContentLoaded', adjustHeroHeight);
// Run again on full page load (fallback for any layout shifts)
window.addEventListener('load', adjustHeroHeight);
// Recalculate on resize
window.addEventListener('resize', adjustHeroHeight);
</script>