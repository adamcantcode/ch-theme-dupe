import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  if (window.innerWidth < 1024) {
    toggleDropdown();
  }

  function toggleDropdown() {
    const toggleButton = document.querySelector('.toggle-button');
    const cardWrapper = document.querySelector('.card-wrapper');

    cardWrapper.style.paddingBottom = toggleButton.clientHeight + 16 + 'px';

    toggleButton.addEventListener('click', (e) => {
      e.preventDefault();
      if (cardWrapper.style.maxHeight) {
        cardWrapper.style.maxHeight = null;
        toggleButton.textContent = 'Show more';
        toggleButton.classList.remove('button-primary');
        toggleButton.classList.add('button-secondary');
      } else {
        cardWrapper.style.maxHeight = cardWrapper.scrollHeight + 'px';
        toggleButton.textContent = 'Show less';
        toggleButton.classList.add('button-primary');
        toggleButton.classList.remove('button-secondary');
      }
    });
  }
  window.addEventListener('resize', toggleDropdown);
});
