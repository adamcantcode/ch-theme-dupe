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
      ScrollTrigger.refresh();
    }
  }

  function toggleAccordion() {
    if (this === openAccordionItem) {
      closeAccordion();
      ScrollTrigger.refresh();
    } else {
      closeAccordion();
      this.classList.add('active');
      const accordionContent = this.nextElementSibling;
      accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
      openAccordionItem = this;
      ScrollTrigger.refresh();
    }
  }

  accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector('.accordion-header-iop');
    accordionHeader.addEventListener('click', toggleAccordion);
  });

  const triggerAccordion = () => {
    if (window.innerWidth > 1024) {
      document.querySelector('.accordion-header-iop').click();
    }
  };

  window.addEventListener('resize', function () {
    if (!openAccordionItem) {
      triggerAccordion();
    } else {
      closeAccordion();
    }
  });

  triggerAccordion();
});
