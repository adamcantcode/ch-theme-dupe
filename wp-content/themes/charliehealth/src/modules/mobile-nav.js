/**
 * Main nav hover actions
 */
export default function mobileNav() {
  var menu = document.querySelector('.open-close');
  var slideOut = document.querySelector('.slide-out');
  var mainContent = document.querySelector('.site-main');
  var topLevelLinks = document.querySelectorAll('.nav-parent-menu > .nav-link:not(.static)');

  /**
   * On click, toggle active.
   */
  menu.addEventListener('click', () => {
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
