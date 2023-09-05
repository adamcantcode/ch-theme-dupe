/**
 * Man nav hover actions
 */
// import { gsap } from 'gsap';

export default function navigationMenu() {
  const topLevelNavItems = document.querySelectorAll('.topLevelNavItem');

  topLevelNavItems.forEach((topLevelNavItem) => {
    topLevelNavItem.addEventListener('mouseover', (e) => {
      const secondLevelNav = topLevelNavItem.querySelector('.secondLevelNav');
      if(secondLevelNav) {
        secondLevelNav.classList.remove('opacity-0');
        secondLevelNav.classList.remove('invisible');
      }
    });
    topLevelNavItem.addEventListener('mouseout', (e) => {
      const secondLevelNav = topLevelNavItem.querySelector('.secondLevelNav');
      if(secondLevelNav) {
        secondLevelNav.classList.add('opacity-0');
        secondLevelNav.classList.add('invisible');
      }
    });
  });
}
