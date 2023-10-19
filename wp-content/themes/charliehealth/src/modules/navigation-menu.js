/**
 * Man nav hover actions
 */
// import { gsap } from 'gsap';

export default function navigationMenu() {
  if (document.querySelector('.mobile-menu-js')) {
    const topLevelNavItems = document.querySelectorAll('.topLevelNavItem');

    topLevelNavItems.forEach((topLevelNavItem) => {
      topLevelNavItem.addEventListener('mouseover', (e) => {
        const secondLevelNav = topLevelNavItem.querySelector('.secondLevelNav');
        if (secondLevelNav) {
          secondLevelNav.classList.remove('opacity-0');
          secondLevelNav.classList.remove('invisible');
          secondLevelNav.classList.remove('translate-x-1');
        }
      });
      topLevelNavItem.addEventListener('mouseout', (e) => {
        const secondLevelNav = topLevelNavItem.querySelector('.secondLevelNav');
        if (secondLevelNav) {
          secondLevelNav.classList.add('opacity-0');
          secondLevelNav.classList.add('invisible');
          secondLevelNav.classList.add('translate-x-1');
        }
      });
    });

    const mobileMenu = document.querySelector('.mobile-menu-js');
    const mobileMenuX = Array.from(mobileMenu.children);
    const panel = document.querySelector('.panel-js');

    mobileMenu.addEventListener('click', () => {
      if (!mobileMenu.classList.contains('open')) {
        mobileMenu.classList.add('open');
        openAnimation();
        openPanel();
      } else {
        mobileMenu.classList.remove('open');
        closeAnimation();
        closePanel();
      }
    });
    const openAnimation = () => {
      mobileMenuX[0].classList.add('top-1/2', '-translate-y-1/2', '!w-[18px]');
      mobileMenuX[0].classList.remove('top-0');
      mobileMenuX[1].classList.add('scale-0');
      mobileMenuX[2].classList.add('-top-1/2', '-translate-y-1/2', '!w-[18px]');
      mobileMenuX[2].classList.remove('top-0');
      setTimeout(() => {
        mobileMenuX[0].classList.add('rotate-45');
        mobileMenuX[2].classList.add('-rotate-45');
      }, 50);
    };
    const closeAnimation = () => {
      mobileMenuX[0].classList.remove(
        'top-1/2',
        '-translate-y-1/2',
        'rotate-45',
        '!w-[18px]'
      );
      mobileMenuX[1].classList.remove('scale-0', 'origin-center');
      mobileMenuX[2].classList.remove(
        '-top-1/2',
        '-translate-y-1/2',
        '-rotate-45',
        '!w-[18px]'
      );
      mobileMenuX[0].classList.add('top-0');
      mobileMenuX[2].classList.add('top-0');
      setTimeout(() => {
        mobileMenuX[0].classList.remove('rotate-45');
        mobileMenuX[2].classList.remove('-rotate-45');
      }, 50);
    };
    const openPanel = () => {
      panel.classList.remove('opacity-0', 'pointer-events-none', 'invisible');
    };
    const closePanel = () => {
      panel.classList.add('opacity-0', 'pointer-events-none', 'invisible');
    };

    const dropdownItems = document.querySelectorAll('.dropdown-item-js');

    dropdownItems.forEach((item) => {
      const accordionContent = item.nextElementSibling;
      item.addEventListener('click', () => {
        // Close all other dropdowns before opening the clicked one
        dropdownItems.forEach((otherItem) => {
          if (otherItem !== item) {
            const otherAccordionContent = otherItem.nextElementSibling;
            if (otherAccordionContent) {
              otherAccordionContent.style.maxHeight = null;
              otherItem.querySelector('.rotate-90').classList.remove('scale-0');
            }
          }
        });

        if (accordionContent.style.maxHeight) {
          accordionContent.style.maxHeight = null;
          item.querySelector('.rotate-90').classList.remove('scale-0');
        } else {
          accordionContent.style.maxHeight =
            accordionContent.scrollHeight + 'px';
          item.querySelector('.rotate-90').classList.add('scale-0');
        }
      });
    });
  }
}
