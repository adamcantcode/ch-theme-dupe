/**
 * Man nav hover actions
 */
export default function animations() {
  var topLevelLinks = document.querySelectorAll('.nav-parent-menu');

  // TODO adjust on mobile
  // Get all top level links
  topLevelLinks.forEach((link) => {
    // Create a new timeline for the sub-links of the current top level link
    const linksTimeLine = gsap.timeline();

    // Add an animation to the timeline to animate the opacity and x position of the sub-links
    linksTimeLine.to(
      link.lastElementChild.querySelectorAll('.nav-link.sub-link'),
      {
        opacity: 1,
        y: 0,
        stagger: 0.025,
      }
    );
    // Add a mouseenter event listener to the current top level link
    link.addEventListener('mouseenter', () => {
      // If the timeline is not already active, play it from the beginning
      if (!linksTimeLine.isActive()) {
        console.log('not active');
        linksTimeLine.play(0);
      } else {
        console.log('active');
      }
    });
  });
}
