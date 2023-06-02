/**
 * Main nav hover actions
 */
export default function mobileNav() {
  const menu = document.querySelector('.open-close');
  const slideOut = document.querySelector('.slide-out');
  const mainContent = document.querySelector('.site-main');
  const topLevelLinks = document.querySelectorAll(
    '.nav-parent-menu > .nav-link:not(.static)'
  );

  /** Fix for back button bug */
  window.addEventListener('pageshow', () => {
    slideOut.classList.remove('active');
  });

  /**
   * On click, toggle active.
   */
  menu.addEventListener('click', () => {
    var menuText = menu.firstChild.nextElementSibling;
    menuText.innerHTML === 'Menu'
      ? (menuText.innerHTML = 'Close')
      : (menuText.innerHTML = 'Menu');
    menu.classList.toggle('active');
    slideOut.classList.toggle('active');
    mainContent.classList.toggle('active');
  });

  /**
   * On click, add active to submenu item.
   */
  topLevelLinks.forEach((link) => {
    link.addEventListener('click', () => {
      removeActive(link.nextElementSibling);
      link.nextElementSibling.classList.toggle('active');
    });
  });

  /**
   * Remove active from all submenus except the current.
   * @param {string} activeLink
   */
  const removeActive = (activeLink) => {
    topLevelLinks.forEach((link) => {
      if (activeLink !== link.nextElementSibling) {
        link.nextElementSibling.classList.remove('active');
      }
    });
  };
}
