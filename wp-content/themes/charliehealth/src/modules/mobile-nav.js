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
}
