export default function progressBar() {
  const articleContent = document.querySelector(
    '#articleContent .container-sm'
  );
  let headerHeight = document.querySelector('header').clientHeight;
  const wpadmin = document.querySelector('#wpadminbar');
  if (wpadmin) {
    headerHeight += wpadmin.clientHeight;
  }

  const progressBar = document.querySelector('#progressBar');
  progressBar.style.top = headerHeight + 'px';
  progressBar.style.left = '0';
  progressBar.style.width = '0';
  progressBar.style.height = '4px';
  progressBar.style.zIndex = '9999';
  document.body.appendChild(progressBar);

  window.addEventListener('scroll', updateProgressBar);

  function updateProgressBar() {
    const contentHeight = articleContent.scrollHeight + headerHeight;

    const scrollTop =
      document.documentElement.scrollTop || document.body.scrollTop;
    const scrollableHeight = contentHeight - headerHeight;
    const scrollPosition = Math.max(0, scrollTop - headerHeight);
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
