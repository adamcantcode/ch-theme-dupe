import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  const accordionItems = document.querySelectorAll('.accordion-item-iop');
  let openAccordionItem = null;

  function closeAccordion() {
    if (openAccordionItem) {
      openAccordionItem.classList.remove('active');
      const accordionContent = openAccordionItem.nextElementSibling;
      accordionContent.style.maxHeight = null;
      openAccordionItem = null;
    }
  }

  function toggleAccordion() {
    if (this === openAccordionItem) {
      closeAccordion();
    } else {
      closeAccordion();
      this.classList.add('active');
      const accordionContent = this.nextElementSibling;
      accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
      openAccordionItem = this;
    }
  }

  accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector('.accordion-header-iop');
    accordionHeader.addEventListener('click', toggleAccordion);
  });
});
