export default function progressBar() {
  // Get the article content element
  const articleContent = document.querySelector(
    '#articleContent .container-sm'
  );
  // Get the header height (adjust as needed)
  let headerHeight = document.querySelector('header').clientHeight;
  const wpadmin = document.querySelector('#wpadminbar');
  if (wpadmin) {
    headerHeight += wpadmin.clientHeight;
  }

  // Create a progress bar element
  const progressBar = document.querySelector('#progressBar');
  progressBar.style.top = headerHeight + 'px';
  progressBar.style.left = '0';
  progressBar.style.width = '0';
  progressBar.style.height = '4px';
  progressBar.style.zIndex = '9999';
  document.body.appendChild(progressBar);

  // Update the progress bar as the page is scrolled
  window.addEventListener('scroll', updateProgressBar);

  function updateProgressBar() {
    // Get the height of the content element
    const contentHeight = articleContent.scrollHeight + headerHeight;

    const scrollTop =
      document.documentElement.scrollTop || document.body.scrollTop;

    // Calculate the scrollable height of the content
    const scrollableHeight = contentHeight - headerHeight;

    // Calculate the scroll position within the scrollable height
    const scrollPosition = Math.max(0, scrollTop - headerHeight);

    // Calculate the scroll percentage
    const scrollPercent = Math.min(
      (scrollPosition / scrollableHeight) * 100,
      100
    );
    if (scrollPercent === 100) {
      progressBar.style.opacity = '0';
    } else {
      progressBar.style.opacity = '100';
    }

    progressBar.style.width = `${scrollPercent}%`;
  }
}
