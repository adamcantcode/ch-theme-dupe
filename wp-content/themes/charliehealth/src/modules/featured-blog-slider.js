// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

export default function featuredBlogSlider() {
  window.addEventListener('DOMContentLoaded', () => {
    var blogSlider = new Swiper('.swiper.swiper-featured-blog', {
      slidesPerView: 1,
      spaceBetween: 20,
      speed: 1000,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      loop: true,
      autoplay: false,
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next-arrow',
        prevEl: '.swiper-button-prev-arrow',
      },
      // on: {
      //   reachEnd: function () {
      //     this.snapGrid = [...this.slidesGrid];
      //     setTimeout(() => {
      //       document.querySelector('.swiper-button-next-arrow').click();
      //       clearTimeout();
      //     }, 1);
      //   },
      // },
    });
  });
}
