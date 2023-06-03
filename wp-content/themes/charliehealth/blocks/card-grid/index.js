import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  const handleResize = () => {
    console.log('resize');
    const cardWrapper = document.querySelector('.card-wrapper');
    const toggleButton = document.querySelector('.toggle-button');

    if (cardWrapper) {
      if (window.innerWidth < 1024) {
        toggleDropdown(cardWrapper, toggleButton);
      } else {
        removePadding(cardWrapper);
      }
    }
  };

  const toggleDropdown = (cardWrapper, toggleButton) => {
    if (cardWrapper) {
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
  };

  const removePadding = (cardWrapper) => {
    cardWrapper.style.paddingBottom = 'unset';
  };

  handleResize();
  window.addEventListener('resize', handleResize);
});
