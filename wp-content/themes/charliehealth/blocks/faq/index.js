import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  const accordionItems = document.querySelectorAll('.accordion-item');

  function toggleAccordion() {
    this.classList.toggle('active');
    const accordionContent = this.nextElementSibling;
    if (accordionContent.style.maxHeight) {
      accordionContent.style.maxHeight = null;
    } else {
      accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
    }
  }

  accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector('.accordion-header');
    accordionHeader.addEventListener('click', toggleAccordion);
  });
});
