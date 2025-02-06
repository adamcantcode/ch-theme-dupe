export default function linkedInCTATracker() {
  document.addEventListener('click', (event) => {
    const link = event.target.closest('a');
    if (!link || !link.href) return;

    const { hostname, pathname } = new URL(link.href);

    if (
      hostname.includes('referrals.charliehealth') &&
      (pathname.includes('/referrals') || pathname.includes('/referral-form'))
    ) {
      window.lintrk('track', { conversion_id: 21227033 });
    }
  });
}
