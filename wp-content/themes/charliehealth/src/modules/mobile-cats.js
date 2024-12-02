export default function mobileCats() {
  // Check window size
  const handleResize = () => {
    const catsWrapper = document.querySelector('.cat-mobile-js');
    if (window.innerWidth < 1024) {
      toggleDropdown(catsWrapper);
    } else {
      removePadding(catsWrapper);
    }
  };

  // Dropdown animation
  const toggleDropdown = (catsWrapper) => {
    const toggleButton = catsWrapper.querySelector('.toggle-button');

    catsWrapper.style.paddingBottom = toggleButton.clientHeight + 16 + 'px';

    toggleButton.addEventListener('click', (toggleEvent) => {
      toggleEvent.preventDefault();
      if (catsWrapper.style.maxHeight) {
        catsWrapper.style.maxHeight = null;
        toggleEvent.target.textContent = 'Show more';
        toggleEvent.target.classList.remove('button-primary-ch');
        toggleEvent.target.classList.add('button-secondary-ch');
      } else {
        catsWrapper.style.maxHeight = catsWrapper.scrollHeight + 'px';
        toggleEvent.target.textContent = 'Show less';
        toggleEvent.target.classList.add('button-primary-ch');
        toggleEvent.target.classList.remove('button-secondary-ch');
      }
    });
  };

  // Remove padding just in case
  const removePadding = (catsWrapper) => {
    const toggleButton = catsWrapper.querySelector('.toggle-button');
    toggleButton.removeEventListener('click', () => {});
    if (catsWrapper.style) {
      catsWrapper.style.paddingBottom = 'unset';
      catsWrapper.style.maxHeight = null;
      toggleButton.textContent = 'Show more';
      toggleButton.classList.remove('button-primary-ch');
      toggleButton.classList.add('button-secondary-ch');
    }
  };

  handleResize();

  window.addEventListener('resize', handleResize);
}
