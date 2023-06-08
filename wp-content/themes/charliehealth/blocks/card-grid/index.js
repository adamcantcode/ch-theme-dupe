import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  // Get each set of cards
  const cardWrapper = document.querySelectorAll('.card-wrapper');

  // Check window size
  const handleResize = (cardWrapper) => {
    if (window.innerWidth < 1024) {
      toggleDropdown(cardWrapper);
    } else {
      removePadding(cardWrapper);
    }
  };

  // Dropdown animation
  const toggleDropdown = (cardWrapper) => {
    const toggleButton = cardWrapper.querySelector('.toggle-button');

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
  };

  // Remove padding just in case
  const removePadding = (cardWrapper) => {
    cardWrapper.style.paddingBottom = 'unset';
  };

  // Only run if card wrapper exist ($style === 'feed')
  if (cardWrapper) {
    cardWrapper.forEach((cardWrapper) => {
      handleResize(cardWrapper);
    });
  }

  window.addEventListener('resize', handleResize);
});
