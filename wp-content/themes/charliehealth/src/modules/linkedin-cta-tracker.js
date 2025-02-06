export default function linkedInCTATracker() {
  if (window.location.hostname.includes('referrals.charliehealth')) {
    document.addEventListener('click', (event) => {
      const link = event.target.closest('a');
      if (!link || !link.href) return;

      const { pathname, href } = new URL(link.href);

      if (
        pathname.includes('/referrals') ||
        pathname.includes('/referral-form')
      ) {
        window.lintrk('track', { conversion_id: 21227033 }); // for CTA clicks to form
      } else if (href.startsWith('tel:')) {
        window.lintrk('track', { conversion_id: 21227041 }); // For phone number clicks
      }
    });
  }
}
