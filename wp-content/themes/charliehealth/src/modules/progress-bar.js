export default function progressBar() {
  const progressBar = document.querySelector('#progressBar');
  const articleContent = document.querySelector('#theContent');
  const header = document.querySelector('header');
  const wpadmin = document.querySelector('#wpadminbar');

  function calculateHeaderHeight() {
    let headerHeight = header.clientHeight;

    if (wpadmin) {
      headerHeight += wpadmin.clientHeight;
    }

    progressBar.style.top = `${headerHeight}px`;
    updateProgressBar(headerHeight);
  }

  function updateProgressBar(headerHeight) {
    const contentHeight = articleContent.scrollHeight + headerHeight;
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    const scrollableHeight = contentHeight - headerHeight;
    const scrollPosition = Math.max(0, scrollTop - headerHeight);
    const scrollPercent = Math.min(
      (scrollPosition / scrollableHeight) * 100,
      100
    );

    progressBar.style.width = `${scrollPercent}%`;
    progressBar.style.opacity = scrollPercent === 100 ? '0' : '1';
  }

  function handleScroll() {
    clearTimeout(window.scrollEndTimer);
    window.scrollEndTimer = setTimeout(
      () => updateProgressBar(header.clientHeight),
      100
    );
  }

  window.addEventListener('scroll', handleScroll);
  window.addEventListener('resize', calculateHeaderHeight);

  // Initial calculation
  calculateHeaderHeight();
}
