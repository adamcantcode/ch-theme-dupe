export default function toc() {
  const toc = document.querySelector('#toc');
  if(toc) {
    const content = document.querySelector('#articleContent');
    const headings = content.querySelectorAll('h2');
  
    headings.forEach((heading) => {
      heading.id = heading.innerText.replace(/[^a-zA-Z0-9-]/g, '');
  
      const tocHeading = document.createElement('a');
      const headingText = document.createTextNode(heading.innerText);
  
      tocHeading.appendChild(headingText);
      tocHeading.setAttribute('href', `#${heading.id}`);
  
      toc.appendChild(tocHeading);
    });
  
    function toggleAccordion() {
      this.classList.toggle('active');
      const accordionContent = this.nextElementSibling;
      if (accordionContent.style.maxHeight) {
        accordionContent.style.maxHeight = null;
      } else {
        accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
      }
    }
  
    const tocHeading = document.querySelector('.toc-heading');
    tocHeading.addEventListener('click', toggleAccordion);
  }
}
