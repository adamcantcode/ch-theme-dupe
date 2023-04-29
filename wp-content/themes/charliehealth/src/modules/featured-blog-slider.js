// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

export default function featuredBlogSlider() {
  console.log('test');
  window.addEventListener('DOMContentLoaded', () => {
    var blogSlider = new Swiper('.swiper.swiper-featued-blog', {
      slidesPerView: 2,
      spaceBetween: 20,
      speed: 1000,
      loop: true,
      autoplay: true,
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
