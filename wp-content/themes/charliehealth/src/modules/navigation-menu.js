/**
 * Man nav hover actions
 */
// import { gsap } from 'gsap';

export default function navigationMenu() {
  const topLevelNavItems = document.querySelectorAll('.topLevelNavItem');

  topLevelNavItems.forEach((topLevelNavItem) => {
    topLevelNavItem.addEventListener('mouseover', (e) => {
      const element = e.target;
      console.log('Hovered over topLevelNavItem:', element);
      console.log(e.target.querySelector('.secondLevelNav'));

      const secondLevelNav = element.querySelector('.secondLevelNav');
      console.log('Found secondLevelNav:', secondLevelNav);
    });
  });
}
