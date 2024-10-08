export default function userPagesTracker() {
  const trackPages = () => {
    let user_journey = JSON.parse(localStorage.getItem('user_journey')) || [];
    user_journey.push(window.location.href);
    localStorage.setItem('user_journey', JSON.stringify(user_journey));
  };

  trackPages();
}
