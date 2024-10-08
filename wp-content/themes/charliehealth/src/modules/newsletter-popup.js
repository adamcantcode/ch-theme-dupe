export default function newsletterPopup() {
  // Function to create a cookie
  function createCookie(name, value, days) {
    var expires = '';
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = '; expires=' + date.toUTCString();
    }
    document.cookie = name + '=' + value + expires + '; path=/';
  }

  // Function to check if the cookie exists
  function getCookie(name) {
    var nameEQ = name + '=';
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i];
      while (cookie.charAt(0) === ' ') {
        cookie = cookie.substring(1, cookie.length);
      }
      if (cookie.indexOf(nameEQ) === 0) {
        return cookie.substring(nameEQ.length, cookie.length);
      }
    }
    return null;
  }

  // Function to handle the scroll event
  function handleScroll() {
    var scrollPosition =
      window.pageYOffset || document.documentElement.scrollTop;
    var windowHeight = window.innerHeight;
    var scrollThreshold = windowHeight * 1.5; // Adjust this value as needed

    // Check if the user has scrolled past the threshold and the cookie doesn't exist
    if (scrollPosition > scrollThreshold && !getCookie('newsletter_popup')) {
      // Change the class of an element
      var modal = document.getElementById('newsletterPopup');
      modal.classList.toggle('modal-fade');

      // Create the cookie to prevent further pop-ups
      createCookie('newsletter_popup', 'true', 1);

      modal.addEventListener('click', (event) => {
        if (event.target.id === 'newsletterPopup') {
          modal.classList.toggle('modal-fade');
        }
      });

      const closeButton = modal.querySelector('.modal-close');

      closeButton.addEventListener('click', () => {
        modal.classList.toggle('modal-fade');
      });

      // Remove the scroll event listener
      window.removeEventListener('scroll', handleScroll);
    }
  }

  // Attach the scroll event listener
  window.addEventListener('scroll', handleScroll);
}
