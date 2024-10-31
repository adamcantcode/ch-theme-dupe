import './index.css';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { MotionPathPlugin } from 'gsap/MotionPathPlugin';

gsap.registerPlugin(ScrollTrigger, MotionPathPlugin);

// Step 1: Fade in and scale up #cO and #cM
gsap.from(['#cO', '#cM'], {
  duration: 1.5,
  opacity: 0,
  scale: 0,
  stagger: 0.2,
  transformOrigin: 'center',
  ease: 'power2.out',
  onComplete: startOrbit, // Start orbiting after fade-in
});

// Step 2: Start orbiting the smaller circles along #cO
function startOrbit() {
  const circles = ['#cTL', '#cTR', '#cBR', '#cBL'];

  // Evenly distribute start positions along the path
  const startPositions = [0, 0.25, .5, .749]; // Adjusted positions for better spacing

  circles.forEach((circle, index) => {
    // Set each circle's initial position off-screen
    gsap.set(circle, { x: 0, y: 0, opacity: 0 });

    // Start orbiting the circle and fade it in at its position
    gsap.to(circle, {
      duration: 30,
      ease: 'none',
      repeat: -1,
      motionPath: {
        path: '#cO',
        align: '#cO',
        alignOrigin: [0.5, 0.5],
        autoRotate: false,
        start: startPositions[index], // Use the adjusted start positions
        end: startPositions[index] + 1, // Complete a full orbit
      },
      onStart: () => {
        // Fade in the circle when it starts orbiting
        gsap.to(circle, {
          duration: 1.5,
          opacity: 1,
        });
      },
    });
  });
}
