export default function references() {
  const refHeading = document.querySelector('.references-heading');
  
  if (refHeading) {
    function toggleAccordion() {
      this.classList.toggle('active');
      const accordionContent = this.nextElementSibling;
      if (accordionContent.style.maxHeight) {
        accordionContent.style.maxHeight = null;
      } else {
        accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
      }
    }

    refHeading.addEventListener('click', toggleAccordion);
  }
}
