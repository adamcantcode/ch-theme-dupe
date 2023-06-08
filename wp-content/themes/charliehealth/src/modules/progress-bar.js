export default function progressBar() {
  function calculateHeaderHeight() {
    var articleContent = document.querySelector(
      '#articleContent .container-sm'
    );
    let headerHeight = document.querySelector('header').clientHeight;
    var wpadmin = document.querySelector('#wpadminbar');

    if (wpadmin) {
      headerHeight += wpadmin.clientHeight;
    }

    var progressBar = document.querySelector('#progressBar');
    progressBar.style.top = headerHeight + 'px';
    progressBar.style.left = '0';
    document.body.appendChild(progressBar);

    updateProgressBar(articleContent, headerHeight, progressBar);
  }

  function updateProgressBar(articleContent, headerHeight, progressBar) {
    var contentHeight = articleContent.scrollHeight + headerHeight;

    var scrollTop =
      document.documentElement.scrollTop || document.body.scrollTop;
    var scrollableHeight = contentHeight - headerHeight;
    var scrollPosition = Math.max(0, scrollTop - headerHeight);
    var scrollPercent = Math.min(
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

  // window.addEventListener('scroll', updateProgressBar);
  window.addEventListener('scroll', () => {
    clearTimeout(window.scrollEndTimer);
    window.scrollEndTimer = setTimeout(calculateHeaderHeight, 100);
  });
  window.addEventListener('resize', calculateHeaderHeight);
}
