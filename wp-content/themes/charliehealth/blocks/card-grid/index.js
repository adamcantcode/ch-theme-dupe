import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  // Get each set of cards
  const cardWrapper = document.querySelectorAll('.card-wrapper');

  // Check window size
  const handleResize = (cardWrapperInstance) => {
    if (window.innerWidth < 1024) {
      toggleDropdown(cardWrapperInstance);
    } else {
      removePadding(cardWrapperInstance);
    }
  };

  // Dropdown animation
  const toggleDropdown = (cardWrapperInstance) => {
    console.log(cardWrapperInstance);
    const toggleButton = cardWrapperInstance.querySelector('.toggle-button');

    cardWrapperInstance.style.paddingBottom =
      toggleButton.clientHeight + 16 + 'px';

    toggleButton.addEventListener('click', (e) => {
      e.preventDefault();
      if (cardWrapperInstance.style.maxHeight) {
        cardWrapperInstance.style.maxHeight = null;
        toggleButton.textContent = 'Show more';
        toggleButton.classList.remove('button-primary');
        toggleButton.classList.add('button-secondary');
      } else {
        cardWrapperInstance.style.maxHeight =
          cardWrapperInstance.scrollHeight + 'px';
        toggleButton.textContent = 'Show less';
        toggleButton.classList.add('button-primary');
        toggleButton.classList.remove('button-secondary');
      }
    });
  };

  // Remove padding just in case
  const removePadding = (cardWrapperInstance) => {
    if (cardWrapperInstance.style) {
      cardWrapperInstance.style.paddingBottom = 'unset';
    }
  };

  // Only run if card wrapper exist ($style === 'feed')
  if (cardWrapper) {
    cardWrapper.forEach((cardWrapperInstance) => {
      handleResize(cardWrapperInstance);
    });
  }

  window.addEventListener('resize', handleResize);
});
