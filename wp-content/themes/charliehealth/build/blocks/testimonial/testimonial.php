<?php

/**
 * Testimonial Block Template.
 *
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial-block';
if (!empty($block['className'])) {
  $className .= ' ' . esc_attr($block['className']);
}
if (!empty($block['align'])) {
  $className .= ' align' . esc_attr($block['align']);
}
?>

<section <?= $anchor ?: ''; ?>class="<?= $className; ?> testimonial-padding bg-cream">
  <div class="section-horizontal">
    <div class="container">
      <h2 class="">Hear from the Charlie Health Community</h2>
    </div>
  </div>
  <div class="swiper swiper-testimonial">
    <div class="container lg:px-sp-10 swiper-wrapper">
      <div class="swiper-slide">
        <div class="grid lg:grid-cols-[1fr,_2fr] px-sp-5 lg:px-0">
          <div class="lg:order-2">
            <p>The Charlie Health team ensures that our clients and families feel heard, affirmed, and confident. It's critical that adolescents and young adults have a safe place to heal and grow. We are here to offer our support to young people, families, and community leaders by filling the gap in the continuum of mental healthcare. </p>
          </div>
          <div class="lg:order-1">
            <img src="https://placehold.it/130x130" alt="social" class="rounded-md mb-sp-8">
            <p class="mb-sp-1">Laura Sebulsky, MBSR</p>
            <h5 class="mb-sp-1">Regional Director of Clinical Outreach</h5>
            <h5 class="mb-sp-1">Pacific Northwest</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="grid lg:grid-cols-[1fr,_2fr] px-sp-5 lg:px-0">
          <div class="lg:order-2">
            <p>As a therapist, I work to foster understanding, growth, and confidence in the clients I work with. Charlie Health continues to allow me to be inspired and thrive in the quality of service I deliver each day.</p>
          </div>
          <div class="lg:order-1">
            <img src="https://placehold.it/130x130" alt="social" class="rounded-md mb-sp-8">
            <p class="mb-sp-1">Laura Sebulsky, MBSR</p>
            <h5 class="mb-sp-1">Regional Director of Clinical Outreach</h5>
            <h5 class="mb-sp-1">Pacific Northwest</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="grid lg:grid-cols-[1fr,_2fr] px-sp-5 lg:px-0">
          <div class="lg:order-2">
            <p>Excellence in clinical programming and personalized treatment is at the core of what we do at Charlie Health. Every client who comes to us has needs that are specific to them, and our clinical team works diligently to ensure that their treatment is tailored to those needs. Our goal is to reach as many families as we can and to be a part of their journeys toward hope and healing.</p>
          </div>
          <div class="lg:order-1">
            <img src="https://placehold.it/130x130" alt="social" class="rounded-md mb-sp-8">
            <p class="mb-sp-1">Laura Sebulsky, MBSR</p>
            <h5 class="mb-sp-1">Regional Director of Clinical Outreach</h5>
            <h5 class="mb-sp-1">Pacific Northwest</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="container relative h-[50px] my-sp-8 noshow lg:block">
      <div class="absolute left-0 swiper-button-prev-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
          <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
          <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
        </svg>
      </div>
      <div class="absolute right-0 swiper-button-next-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
          <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" />
          <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
        </svg>
      </div>
    </div>
    <div class="max-w-[1280px] lg:mx-auto mx-sp-5 relative h-[2px]">
      <div class="relative swiper-pagination"></div>
    </div>
  </div>
</section>
<!-- Slider main container -->