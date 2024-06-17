import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

const firstVideo = document.querySelector('.careers-video-js');
if (firstVideo) {
  var player = new Vimeo.Player(firstVideo);

  player.play();
}

// on load, init swiper
window.addEventListener('load', () => {
  var unmuted = false;
  var swiper = new Swiper('.swiper.swiper-videos-testimonial', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    slideToClickedSlide: true,
    speed: 1000,
    loop: false,
    breakpoints: {
      1024: {
        slidesPerView: 'auto',
        spaceBetween: 40,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next-testimonial',
      prevEl: '.swiper-button-prev-testimonial',
    },
    on: {
      // fix for slider end glitch
      reachEnd: function () {
        this.snapGrid = [...this.slidesGrid];
        setTimeout(() => {
          document.querySelector('.swiper-button-next-testimonial').click();
          clearTimeout();
        }, 1000);
      },
      slideChange: function () {
        if (firstVideo) {
          const currentSlide =
            swiper.slides[swiper.activeIndex].querySelector(
              '.careers-video-js'
            );
          const currentPlayer = new Vimeo.Player(currentSlide);

          // Pause all videos
          swiper.slides.forEach((slide) => {
            slide = slide.querySelector('.careers-video-js');
            if (slide) {
              const player = new Vimeo.Player(slide);
              player.pause();
            }
          });

          // Play current slide video, unmute
          currentPlayer.play();
          if (unmuted) {
            currentPlayer.setVolume(1);
          }
        }
      },
    },
  });

  // Handle first interaction/unmute
  swiper.slides.forEach((slide) => {
    slide = slide.querySelector('.careers-video-js');
    if (slide) {
      const player = new Vimeo.Player(slide);
      player.on('volumechange', function (data) {
        if (data.volume !== 0) {
          if (!unmuted) {
            player.setCurrentTime(0);
          }
          unmuted = true;
        }
      });
    }
  });
});
