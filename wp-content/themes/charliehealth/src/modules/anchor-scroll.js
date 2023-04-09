export default function anchorScroll() {
  jQuery(document).ready(function () {
    // Add smooth scrolling to all links with hash anchors
    jQuery('a[href^="#"]').on('click', function (event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== '') {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        // Using jQuery's animate() method to add smooth page scroll
        jQuery('html, body').animate(
          {
            scrollTop: jQuery(hash).offset().top - 96,
          },
          800
        );
      }
    });
  });
}
