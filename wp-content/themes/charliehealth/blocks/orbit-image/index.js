import './index.css';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { MotionPathPlugin } from 'gsap/MotionPathPlugin';

gsap.registerPlugin(ScrollTrigger, MotionPathPlugin);

const circles = ['#cTL', '#cTR', '#cBR', '#cBL'];

circles.forEach((circle, index) => {
  gsap.to(circle, {
    duration: 20, // Adjust for orbit speed
    ease: 'none', // Linear motion for smooth orbit
    repeat: -1, // Infinite loop
    motionPath: {
      path: '#cO', // Uses #cO rectangle as motion path
      align: '#cO', // Align each circle to the path
      alignOrigin: [0.5, 0.5], // Center on the path
      autoRotate: false, // Keep circles upright
    },
    delay:0, // Stagger start times
  });
});
