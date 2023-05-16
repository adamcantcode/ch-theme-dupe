export default function references() {
  function toggleAccordion() {
    this.classList.toggle('active');
    const accordionContent = this.nextElementSibling;
    if (accordionContent.style.maxHeight) {
      accordionContent.style.maxHeight = null;
    } else {
      accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
    }
  }

  const refHeading = document.querySelector('.references-heading');
  refHeading.addEventListener('click', toggleAccordion);
}
