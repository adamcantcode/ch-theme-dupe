export default function userPagesTracker() {
  const trackPages = () => {
    let visitedPages = JSON.parse(localStorage.getItem('visitedPages')) || [];
    visitedPages.push(window.location.href);
    localStorage.setItem('visitedPages', JSON.stringify(visitedPages));

    console.log('Visited Pages:', visitedPages);

  };

  trackPages();
}
