import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  // Get each set of cards
  const contentWrappper = document.querySelectorAll(
    '.collapsible-content-wrapper'
  );

  // Check window size
  const handleResize = (contentWrappperInstance) => {
    toggleDropdown(contentWrappperInstance);
  };

  // Dropdown animation
  const toggleDropdown = (contentWrappperInstance) => {
    const toggleButton =
      contentWrappperInstance.querySelector('.toggle-button');

    contentWrappperInstance.style.paddingBottom =
      toggleButton.clientHeight + 16 + 'px';

    toggleButton.addEventListener('click', (e) => {
      e.preventDefault();
      if (contentWrappperInstance.style.maxHeight) {
        contentWrappperInstance.style.maxHeight = null;
        toggleButton.textContent = 'Show more';
        toggleButton.classList.remove('button-primary');
        toggleButton.classList.add('button-secondary');
      } else {
        contentWrappperInstance.style.maxHeight =
          contentWrappperInstance.scrollHeight + 'px';
        toggleButton.textContent = 'Show less';
        toggleButton.classList.add('button-primary');
        toggleButton.classList.remove('button-secondary');
      }
    });
  };

  // Remove padding just in case
  const removePadding = (contentWrappperInstance) => {
    if (contentWrappperInstance.style) {
      contentWrappperInstance.style.paddingBottom = 'unset';
    }
  };

  // Only run if card wrapper exist ($style === 'feed')
  if (contentWrappper) {
    contentWrappper.forEach((contentWrappperInstance) => {
      handleResize(contentWrappperInstance);
    });
  }
});
