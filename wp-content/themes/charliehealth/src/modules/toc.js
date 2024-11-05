export default function toc() {
  const tocContainers = [
    document.querySelector('#toc'),
    document.querySelector('#tocMobile'),
  ];

  if (tocContainers.some((container) => container)) {
    const headings = document.querySelectorAll('#theContent > h2');

    headings.forEach((heading) => {
      const headingText = sanitizeForId(heading.innerText);
      heading.id = headingText;

      tocContainers.forEach((tocContainer) => {
        if (tocContainer) {
          const tocLink = document.createElement('a');
          const linkText = document.createTextNode(heading.innerText);
          tocLink.appendChild(linkText);
          tocLink.setAttribute('href', `#${heading.id}`);
          tocLink.classList.add('toc-underline');

          const divWrapper = document.createElement('div');
          divWrapper.appendChild(tocLink);

          tocContainer.appendChild(divWrapper);
        }
      });
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

    const tocHeadings = document.querySelectorAll('.toc-heading');
    tocHeadings.forEach((tocHeading) => {
      tocHeading.addEventListener('click', toggleAccordion);
    });
  }
}
