// window.addEventListener('DOMContentLoaded', () => {
//   const containers = document.querySelectorAll(
//     'section .acf-innerblocks-container .fade-up-in'
//   );

//   if (containers.length > 0) {
//     import('gsap')
//       .then((gsapModule) => {
//         const gsap = gsapModule.gsap;
//         import('gsap/ScrollTrigger').then((ScrollTriggerModule) => {
//           gsapModule.ScrollTrigger = ScrollTriggerModule.ScrollTrigger;
//           gsap.registerPlugin(ScrollTriggerModule.ScrollTrigger);

//           containers.forEach((container, index) => {
//             container.classList.add(`animate-container-${index}`);
//             gsap.from(`.animate-container-${index}`, {
//               scrollTrigger: {
//                 trigger: `.animate-container-${index}`,
//                 start: 'top 80%',
//                 toggleActions: 'play reverse play reverse',
//               },
//               yPercent: 10,
//               scaleX: 0.95,
//               opacity: 0,
//               duration: 1,
//               ease: 'power4.out',
//             });
//           });
//         });
//       })
//       .catch((error) => {
//         console.error('Error importing gsap:', error);
//       });
//   }
// });
