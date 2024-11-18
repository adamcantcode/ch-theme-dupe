import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  const viewAllButton = document.querySelector('.view-all-button-js');
  const aocContent = document.querySelector('.view-all-js');

  let revealedContent = null;

  const setMaxHeight = () => {
    if(!revealedContent) {
      const listItems = aocContent.querySelectorAll('.list-item-height-js');
      const first5ListItems = Array.from(listItems).slice(0, 5);
      const combinedHeight = first5ListItems.reduce((totalHeight, listItem) => {
        return totalHeight + listItem.offsetHeight + 27;
      }, 0);
      aocContent.style.maxHeight = combinedHeight + 'px';
    }
  };

  function closeAccordion() {
    if (revealedContent) {
      aocContent.style.maxHeight = setMaxHeight();
      revealedContent = null;
      viewAllButton.innerText = 'View All';
    }
  }

  function toggleAccordion() {
    if (this === revealedContent) {
      closeAccordion();
    } else {
      closeAccordion();
      aocContent.style.maxHeight = aocContent.scrollHeight + 'px';
      revealedContent = this;
      viewAllButton.remove();
    }
  }

  viewAllButton.addEventListener('click', toggleAccordion);

  setMaxHeight();
  window.addEventListener('resize', () => {
    setMaxHeight();
  });

  const viewAllButtonTMod = document.querySelector('.view-all-button-tmod-js');
  const tmodContent = document.querySelector('.view-all-tmod-js');

  let revealedContentTMod = null;

  const setMaxHeightTMod = () => {
    if(!revealedContentTMod) {
      const listItems = tmodContent.querySelectorAll('.list-item-height-js');
      const first5ListItems = Array.from(listItems).slice(0, 5);
      const combinedHeight = first5ListItems.reduce((totalHeight, listItem) => {
        return totalHeight + listItem.offsetHeight + 27;
      }, 0);
      tmodContent.style.maxHeight = combinedHeight + 'px';
    }
  };

  function closeAccordionTMod() {
    if (revealedContentTMod) {
      tmodContent.style.maxHeight = setMaxHeightTMod();
      revealedContentTMod = null;
      viewAllButtonTMod.innerText = 'View All';
    }
  }

  function toggleAccordionTMod() {
    if (this === revealedContentTMod) {
      closeAccordionTMod();
    } else {
      closeAccordionTMod();
      tmodContent.style.maxHeight = tmodContent.scrollHeight + 'px';
      revealedContentTMod = this;
      viewAllButtonTMod.remove();
    }
  }

  viewAllButtonTMod.addEventListener('click', toggleAccordionTMod);

  setMaxHeightTMod();
  window.addEventListener('resize', () => {
    setMaxHeightTMod();
  });
});
