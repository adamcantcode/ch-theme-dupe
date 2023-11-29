import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  const viewAllButton = document.querySelector('.view-all-button-js');
  let revealedContent = null;

  function closeAccordion() {
    if (revealedContent) {
      const aocContent = document.querySelector('.view-all-js');
      aocContent.style.maxHeight = null;
      revealedContent = null;
      viewAllButton.innerText = 'View All';
    }
  }

  function toggleAccordion() {
    if (this === revealedContent) {
      closeAccordion();
    } else {
      closeAccordion();
      const aocContent = document.querySelector('.view-all-js');
      aocContent.style.maxHeight = aocContent.scrollHeight + 'px';
      revealedContent = this;
      viewAllButton.innerText = 'Close';
    }
  }

  viewAllButton.addEventListener('click', toggleAccordion);
});
