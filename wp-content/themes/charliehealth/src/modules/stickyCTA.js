export default function stickyCTA() {
  document.addEventListener('DOMContentLoaded', function () {
    var stickyCTA = document.querySelector('.sticky-cta-js');
    var footer = document.querySelector('footer');
    var triggerOffset = window.innerHeight;

    window.addEventListener('scroll', function () {
      var scrollPosition = window.scrollY;
      var footerOffset = footer.offsetTop - triggerOffset;

      if (scrollPosition > triggerOffset && scrollPosition < footerOffset) {
        stickyCTA.classList.remove('opacity-0', 'invisible');
      } else if (scrollPosition >= footerOffset) {
        stickyCTA.classList.add('opacity-0', 'invisible');
      } else {
        stickyCTA.classList.add('opacity-0', 'invisible');
      }
    });
  });
}
