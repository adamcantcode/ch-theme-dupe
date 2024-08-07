import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

// GSAP
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('load', () => {
  var swiper = new Swiper('.swiper.swiper-careers-testimonial', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    slideToClickedSlide: true,
    speed: 1000,
    loop: false,
    observer: true,
    observeParents: true,
    breakpoints: {
      1024: {
        slidesPerView: 'auto',
        spaceBetween: 20,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next-testimonial',
      prevEl: '.swiper-button-prev-testimonial',
    },
    on: {
      reachEnd: function () {
        this.snapGrid = [...this.slidesGrid];
        setTimeout(() => {
          document.querySelector('.swiper-button-next-testimonial').click();
          clearTimeout();
        }, 1);
      },
      click: function (swiper, event) {
        // Check if the active slide is the last one
        if (swiper.activeIndex === swiper.slides.length - 1) {
          // Recalculate the position
          swiper.slidePrev(0, false);
          setTimeout(() => {
            swiper.slideNext(0, false);
          }, 20);
        }
      },
    },
  });

  // Get each set of cards
  const contentWrappper = document.querySelectorAll(
    '.collapsible-content-wrapper'
  );

  // Check window size
  const handleResize = (contentWrappperInstance) => {
    toggleDropdown(contentWrappperInstance);
  };

  // Dropdown animation
  const toggleDropdown = (contentWrappperInstance) => {
    const toggleButton = contentWrappperInstance.querySelector(
      '.toggle-button-testimonial'
    );

    contentWrappperInstance.style.paddingBottom =
      toggleButton.clientHeight + 20 + 'px';

    toggleButton.addEventListener('click', (e) => {
      e.preventDefault();
      if (contentWrappperInstance.style.height) {
        contentWrappperInstance.style.height = 250 + 'px';
        toggleButton.textContent = 'View full quote';
        toggleButton.classList.remove('button-primary');
        toggleButton.classList.add('button-secondary');
      } else {
        contentWrappperInstance.style.height =
          contentWrappperInstance.scrollHeight + 'px';
        toggleButton.remove();
      }
    });
  };

  // Remove padding just in case
  const removePadding = (contentWrappperInstance) => {
    if (contentWrappperInstance.style) {
      contentWrappperInstance.style.paddingBottom = 'unset';
    }
  };

  // Only run if card wrapper exist ($style === 'feed')
  if (contentWrappper) {
    contentWrappper.forEach((contentWrappperInstance) => {
      handleResize(contentWrappperInstance);
    });
  }

  window.addEventListener('resize', function () {
    const contentWrappper = document.querySelectorAll(
      '.collapsible-content-wrapper'
    );
    contentWrappper.forEach((contentWrappperInstance) => {
      handleResize(contentWrappperInstance);
    });
  });
});
