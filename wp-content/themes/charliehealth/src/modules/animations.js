/**
 * Man nav hover actions
 */
import { gsap } from 'gsap';

export default function animations() {
  var topLevelLinks = document.querySelectorAll('.nav-parent-menu');

  // Get all top level links
  topLevelLinks.forEach((link) => {
    // Create a new timeline for the sub-links of the current top level link
    const linksTimeLine = gsap.timeline();

    // Add an animation to the timeline to animate the opacity and x position of the sub-links
    if (
      link.lastElementChild.querySelectorAll('.nav-link.sub-link').length > 0
    ) {
      linksTimeLine.to(
        link.lastElementChild.querySelectorAll('.nav-link.sub-link'),
        {
          opacity: 1,
          y: 0,
          stagger: 0.025,
        }
      );
    }
    // Add a mouseenter event listener to the current top level link
    link.addEventListener('mouseenter', () => {
      // If the timeline is not already active, play it from the beginning
      if (!linksTimeLine.isActive()) {
        linksTimeLine.play(0);
      } else {
      }
    });
  });
}
