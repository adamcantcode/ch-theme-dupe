import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  const containers = document.querySelectorAll('.acf-innerblocks-container');
  containers.forEach((container, index) => {
    container.classList.add(`animate-container-${index}`);

    if (index > 0) {
      gsap.from(`.animate-container-${index}`, {
        scrollTrigger: {
          trigger: `.animate-container-${index}`,
          start: 'top 98%',
          // markers: true,
          // onEnter: ({progress, direction, isActive}) => console.log('onEnter ' + progress, direction, isActive),
          // onLeave: ({progress, direction, isActive}) => console.log('onLeave ' + progress, direction, isActive),
          // onEnterBack: ({progress, direction, isActive}) => console.log('onEnterBack ' + progress, direction, isActive),
          // onLeaveBack: ({progress, direction, isActive}) => console.log('onLeaveBack ' + progress, direction, isActive),

          toggleActions: 'play reverse play reverse',
        },
        yPercent: 2,
        scaleX: 0.99,
        opacity: 0,
        duration: 0.5,
      });
    }
  });
  // TODO make sure this is not too taxing
  document.addEventListener('click', () => {
    setTimeout(() => {
      ScrollTrigger.refresh(true);
    }, 500);
  });
  document.addEventListener('resize', () => {
    setTimeout(() => {
      ScrollTrigger.refresh(true);
    }, 500);
  });
});
