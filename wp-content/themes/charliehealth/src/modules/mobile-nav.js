/**
 * Man nav hover actions
 */
export default function mobileNav() {
  var menu = document.querySelector('.open-close');
  var slideOut = document.querySelector('.slide-out');
  var mainContent = document.querySelector('.site-main');
  var navItemSub = document.querySelectorAll('.nav-main-item > .nav-sub-menu');

  menu.addEventListener('click', () => {
    menu.classList.toggle('active');
    slideOut.classList.toggle('active');
    mainContent.classList.toggle('active');
  });

  // Set active state for top level nav link on hover
  // navItem.forEach((item) => {
  //   item.addEventListener('mouseenter', () => {
  //     item.classList.toggle('active');
  //   });
  //   item.addEventListener('mouseleave', () => {
  //     item.classList.toggle('active');
  //   });
  // });
  // // Set active state for top level nav link on hover of sub menu
  // navItemSub.forEach((sub) => {
  //   sub.addEventListener('mouseenter', () => {
  //     sub.previousElementSibling.classList.toggle('active');
  //   });
  //   sub.addEventListener('mouseleave', () => {
  //     sub.previousElementSibling.classList.toggle('active');
  //   });
  // });
}
