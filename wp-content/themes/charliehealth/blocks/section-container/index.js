import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { CSSRulePlugin } from 'gsap/CSSRulePlugin';

gsap.registerPlugin(ScrollTrigger, CSSRulePlugin);

window.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('.bg-circle')) {
    // Target the :before pseudo-element
    const beforeRule = CSSRulePlugin.getRule('section.bg-circle::before');
    const bgVideo = document.querySelector('.video-mask-container').parentElement;

    // Create the animation timeline
    let bgElem = gsap.timeline({
      scrollTrigger: {
        trigger: 'section.bg-circle',
        start: 'top center', // Adjust start position
        // markers: true, // Debug markers
        scrub: true, // Smooth animation tied to scroll
        duration: 1,
      },
    });
    let video = gsap.timeline({
      scrollTrigger: {
        trigger: 'section.bg-circle',
        start: 'top center', // Adjust start position
        // markers: true, // Debug markers
        scrub: true, // Smooth animation tied to scroll
        duration: 1,
      },
    });

    // Animate the `top` property
    bgElem.to(beforeRule, {
      top: '55%', // Target value (adjust as needed)
      duration: 1, // Animation duration
      ease: 'power1.out', // Smooth easing
    });
    video.to(bgVideo, {
      top: '-=100px', // Target value (adjust as needed)
      duration: 1, // Animation duration
      ease: 'power1.out', // Smooth easing
    });
  }
});
