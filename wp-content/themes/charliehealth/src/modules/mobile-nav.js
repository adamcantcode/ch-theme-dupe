/**
 * Man nav hover actions
 */
export default function mobileNav() {
  var menu = document.querySelector('.open-close');
  var slideOut = document.querySelector('.slide-out');
  var mainContent = document.querySelector('.site-main');
  var topLevelLinks = document.querySelectorAll('.nav-parent-menu > .nav-link');

  menu.addEventListener('click', () => {
    menu.classList.toggle('active');
    slideOut.classList.toggle('active');
    mainContent.classList.toggle('active');
  });

  topLevelLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
      console.log(link);
      e.preventDefault();
      link.nextElementSibling.classList.toggle('active');
    });
  });

  // TODO adjust on mobile
  // Get all top level links
  topLevelLinks.forEach((link) => {
    // Create a new timeline for the sub-links of the current top level link
    const linksTimeLine = gsap.timeline();

    // Add an animation to the timeline to animate the opacity and x position of the sub-links
    linksTimeLine.to(
      link.nextElementSibling.querySelectorAll('.nav-link.sub-link'),
      {
        opacity: 1,
        x: 0,
        stagger: 0.025,
      }
    );
    // Add a mouseenter event listener to the current top level link
    link.addEventListener('mouseenter', () => {
      // If the timeline is not already active, play it from the beginning
      if (!linksTimeLine.isActive()) {
        linksTimeLine.play(0);
      }
    });
  });
}
