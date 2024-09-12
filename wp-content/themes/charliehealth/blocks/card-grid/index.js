import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  const cardWrappers = document.querySelectorAll('.card-wrapper');

  // Handles window resize and applies appropriate changes
  const handleResize = (cardWrapperInstance) => {
    window.innerWidth < 1024
      ? toggleDropdown(cardWrapperInstance)
      : resetStyles(cardWrapperInstance);
  };

  // Adds toggle functionality for dropdowns
  const toggleDropdown = (cardWrapperInstance) => {
    const toggleButton = cardWrapperInstance.querySelector('.toggle-button');

    if (!toggleButton) return;

    // Set initial padding for dropdown animation
    cardWrapperInstance.style.paddingBottom = `${
      toggleButton.clientHeight + 16
    }px`;

    toggleButton.addEventListener('click', (e) => {
      e.preventDefault();

      const isExpanded = !!cardWrapperInstance.style.maxHeight;
      cardWrapperInstance.style.maxHeight = isExpanded
        ? null
        : `${cardWrapperInstance.scrollHeight}px`;

      // Update button styles and text accordingly
      toggleButton.textContent = isExpanded ? 'Show more' : 'Show less';
      toggleButton.classList.toggle('button-primary', !isExpanded);
      toggleButton.classList.toggle('button-secondary', isExpanded);
    });
  };

  // Resets padding and maxHeight when window width is above 1024px
  const resetStyles = (cardWrapperInstance) => {
    cardWrapperInstance.style.paddingBottom = '';
    cardWrapperInstance.style.maxHeight = '';
  };

  // Initialize functionality for each card wrapper
  if (cardWrappers.length) {
    cardWrappers.forEach((cardWrapperInstance) =>
      handleResize(cardWrapperInstance)
    );
  }

  window.addEventListener('resize', () => {
    cardWrappers.forEach(handleResize);
  });
});
