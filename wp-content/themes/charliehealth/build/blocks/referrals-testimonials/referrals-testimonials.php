<div class="lg:ml-[300px] mb-base5-10">
  <h2>Real stories of hope & healing</h2>
</div>
<div class="h-[1px] bg-primary relative left-1/2 w-screen -ml-[50vw]">
</div>
<div class="absolute -left-[155px] top-base5-10 z-10 noshow lg:block">
  <div class="video-mask-container">
    <div class="video-mask-overlay">
      <iframe src="https://player.vimeo.com/video/1031203133?background=1&autoplay=1&loop=1" allowfullscreen frameborder="0" class="video-iframe"></iframe>
    </div>

    <svg width="384" height="376" viewBox="0 0 384 376">
      <defs>
        <clipPath id="clip-path-mask" clipPathUnits="objectBoundingBox">
          <path d="M0.87,0.003C0.93,0.003,0.985,0.057,0.99,0.12C1,0.423,0.964,0.655,0.835,0.812C0.819,0.831,0.801,0.849,0.785,0.866C0.647,0.987,0.51,0.998,0.504,0.999L0.5,1L0.495,0.999C0.486,0.997,0.306,0.983,0.164,0.812C0.033,0.654,-0.019,0.423,0.006,0.12C0.011,0.057,0.068,0.003,0.13,0.003C0.215,0,0.788,0,0.87,0.003Z" />
        </clipPath>
      </defs>
    </svg>
  </div>

  <style>
    .video-mask-container {
      position: relative;
      width: 384px;
      height: 376px;
      overflow: hidden;
    }

    /* Video Mask Overlay with Clipping */
    .video-mask-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      clip-path: url(#clip-path-mask);
      -webkit-clip-path: url(#clip-path-mask);
    }

    /* Video iframe styling */
    .video-iframe {
      width: 100vw;
      height: 100vh;
      max-width: unset;
      object-fit: cover;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
  <script>
    // Select the element whose parent you want to modify
    const element = document.querySelector('.video-mask-container').parentElement;

    // Set the parent element to position relative
    if (element.parentElement) {
      element.parentElement.style.position = 'relative';
    }
  </script>
</div>
<div class="relative lg:ml-[300px] lg:mb-[130px] mb-base5-10">
  <?php // if (have_rows('testimonials')) : 
  ?>
  <div class="!overflow-visible swiper swiper-referrals-testimonial">
    <div class="swiper-wrapper">
      <?php // while (have_rows('testimonials')) : the_row(); 
      ?>
      <div class="!h-auto swiper-slide pt-base5-6">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 -translate-y-1/2">
          <circle cx="7.5" cy="7.5" r="7.5" fill="#FDDD7C" />
        </svg>
        <h3 class="font-heading-serif">“My daughter was acting like herself again.”</h3>
        <p>I really didn’t know what to do for my daughter before Charlie Health. I’ve always felt I’ve been alone in this. I felt so helpless. Within the first week, my daughter was acting like herself again. Charlie Health has given my daughter and me lifelong tools to navigate her anxiety and panic attacks. I’ve been blown away. I’m very impressed and very happy.</p>
        <p>—Tasia C.</p>
      </div>
      <div class="!h-auto swiper-slide pt-base5-6">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 -translate-y-1/2">
          <circle cx="7.5" cy="7.5" r="7.5" fill="#7E87E4" />
        </svg>
        <h3 class="font-heading-serif">“Charlie Health saved my life.”</h3>
        <p>Before Charlie Health, I was struggling very much with my anxiety. My therapist told me that she couldn’t help me anymore, so she suggested Charlie Health. I'm really glad I chose to call. I have a new lease on life. My anxiety is at an all-time low and I can function day-to-day in ways I never thought possible. Charlie Health saved my life.</p>
        <p>—Jessica B.</p>
      </div>
      <div class="!h-auto swiper-slide pt-base5-6">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 -translate-y-1/2">
          <circle cx="7.5" cy="7.5" r="7.5" fill="#8AB682" />
        </svg>
        <h3 class="font-heading-serif">“It helped me feel like I was not alone in this world.”</h3>
        <p>I was very angry and depressed when I first came to Charlie Health, but with help, guidance, listening, and reassurance, it helped me feel like I was not alone in this world. I got the help that I wanted and needed to change my mindset.</p>
        <p>Kairey M.</p>
      </div>
      <div class="!h-auto swiper-slide pt-base5-6">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 -translate-y-1/2">
          <circle cx="7.5" cy="7.5" r="7.5" fill="#FDDD7C" />
        </svg>
        <h3 class="font-heading-serif">“My daughter was acting like herself again.”</h3>
        <p>I really didn’t know what to do for my daughter before Charlie Health. I’ve always felt I’ve been alone in this. I felt so helpless. Within the first week, my daughter was acting like herself again. Charlie Health has given my daughter and me lifelong tools to navigate her anxiety and panic attacks. I’ve been blown away. I’m very impressed and very happy.</p>
        <p>—Tasia C.</p>
      </div>
      <div class="!h-auto swiper-slide pt-base5-6">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 -translate-y-1/2">
          <circle cx="7.5" cy="7.5" r="7.5" fill="#7E87E4" />
        </svg>
        <h3 class="font-heading-serif">“Charlie Health saved my life.”</h3>
        <p>Before Charlie Health, I was struggling very much with my anxiety. My therapist told me that she couldn’t help me anymore, so she suggested Charlie Health. I'm really glad I chose to call. I have a new lease on life. My anxiety is at an all-time low and I can function day-to-day in ways I never thought possible. Charlie Health saved my life.</p>
        <p>—Jessica B.</p>
      </div>
      <div class="!h-auto swiper-slide pt-base5-6">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 -translate-y-1/2">
          <circle cx="7.5" cy="7.5" r="7.5" fill="#8AB682" />
        </svg>
        <h3 class="font-heading-serif">“It helped me feel like I was not alone in this world.”</h3>
        <p>I was very angry and depressed when I first came to Charlie Health, but with help, guidance, listening, and reassurance, it helped me feel like I was not alone in this world. I got the help that I wanted and needed to change my mindset.</p>
        <p>Kairey M.</p>
      </div>
      <?php // endwhile; 
      ?>
    </div>
  </div>
  <?php // endif; 
  ?>
</div>