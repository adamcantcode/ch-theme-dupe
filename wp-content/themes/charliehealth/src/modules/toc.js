export default function toc() {
  const toc = document.querySelector('#toc');
  if (toc) {
    // const content = document.querySelector('#articleContent > div');
    const headings = document.querySelectorAll('#articleContent > div > h2');

    headings.forEach((heading) => {
      var headoingText = sanitizeForId(heading.innerText);
      heading.id = headoingText;

      const tocHeading = document.createElement('a');

      const headingText = document.createTextNode(heading.innerText);

      tocHeading.appendChild(headingText);
      tocHeading.setAttribute('href', `#${heading.id}`);
      tocHeading.classList.add('toc-underline');

      const divWrapper = document.createElement('div');
      divWrapper.appendChild(tocHeading);

      toc.appendChild(divWrapper);
    });

    function sanitizeForId(text) {
      let sanitizedText = text.trim();
      sanitizedText = sanitizedText.replace(/\s+/g, '_');
      sanitizedText = sanitizedText.replace(/[^\p{L}\p{M}]/gu, '');
      sanitizedText = sanitizedText.toLowerCase();

      if (sanitizedText.length === 0) {
        sanitizedText = 'default_id';
      }

      return sanitizedText;
    }

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
