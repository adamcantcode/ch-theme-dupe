import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swiper = new Swiper('.swiper.swiper-testimonial-carousel', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: false,
    autoplay: false,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
    navigation: {
      nextEl: '.swiper-button-next-arrow-carousel',
      prevEl: '.swiper-button-prev-arrow-carousel',
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 32,
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
      if (contentWrappperInstance.style.maxHeight) {
        contentWrappperInstance.style.maxHeight = null;
        toggleButton.textContent = 'View full quote';
        toggleButton.classList.remove('button-primary');
        toggleButton.classList.add('button-secondary');
      } else {
        contentWrappperInstance.style.maxHeight =
          contentWrappperInstance.scrollHeight + 'px';
        toggleButton.textContent = 'Show less';
        toggleButton.classList.add('button-primary');
        toggleButton.classList.remove('button-secondary');
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
