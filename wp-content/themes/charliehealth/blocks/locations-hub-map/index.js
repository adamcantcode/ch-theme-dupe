import './index.css';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// 1. Static data map moved out of function scope
const STATE_ABBREVIATIONS = {
  Alabama: 'AL',
  Alaska: 'AK',
  Arizona: 'AZ',
  Arkansas: 'AR',
  California: 'CA',
  Colorado: 'CO',
  Connecticut: 'CT',
  Delaware: 'DE',
  Florida: 'FL',
  Georgia: 'GA',
  Hawaii: 'HI',
  Idaho: 'ID',
  Illinois: 'IL',
  Indiana: 'IN',
  Iowa: 'IA',
  Kansas: 'KS',
  Kentucky: 'KY',
  Louisiana: 'LA',
  Maine: 'ME',
  Maryland: 'MD',
  Massachusetts: 'MA',
  Michigan: 'MI',
  Minnesota: 'MN',
  Mississippi: 'MS',
  Missouri: 'MO',
  Montana: 'MT',
  Nebraska: 'NE',
  Nevada: 'NV',
  'New Hampshire': 'NH',
  'New Jersey': 'NJ',
  'New Mexico': 'NM',
  'New York': 'NY',
  'North Carolina': 'NC',
  'North Dakota': 'ND',
  Ohio: 'OH',
  Oklahoma: 'OK',
  Oregon: 'OR',
  Pennsylvania: 'PA',
  'Rhode Island': 'RI',
  'South Carolina': 'SC',
  'South Dakota': 'SD',
  Tennessee: 'TN',
  Texas: 'TX',
  Utah: 'UT',
  Vermont: 'VT',
  Virginia: 'VA',
  Washington: 'WA',
  'West Virginia': 'WV',
  Wisconsin: 'WI',
  Wyoming: 'WY',
};

const getAbbrev = (name) => STATE_ABBREVIATIONS[name] || null;

window.addEventListener('DOMContentLoaded', () => {
  const site = document.location.hostname;
  fetch(
    `${window.location.origin}/wp-json/wp/v2/locations?parent=0&per_page=100&status=publish`
  )
    .then((res) => res.json())
    .then((posts) => {
      const activeStates = new Set();
      const stateLinks = {};

      for (const post of posts) {
        const title = post.title.rendered.trim();
        const abbrev = getAbbrev(title);
        if (abbrev && simplemaps_usmap_mapdata.state_specific[abbrev]) {
          activeStates.add(abbrev);
          stateLinks[abbrev] = post.link;
        }
      }

      for (const [abbrev, state] of Object.entries(
        simplemaps_usmap_mapdata.state_specific
      )) {
        if (activeStates.has(abbrev)) {
          state.url = stateLinks[abbrev];
        } else {
          state.inactive = 1;
          state.opacity = 0.5;
        }
      }

      if (typeof simplemaps_usmap.refresh === 'function') {
        simplemaps_usmap.refresh();

        const mapLoader = document.getElementById('map-loader');
        const map = document.getElementById('map');
        if (mapLoader) mapLoader.style.display = 'none';
        if (map) map.classList.remove('opacity-0');

        const statePaths = Array.from(document.querySelectorAll('.sm_state'));
        for (const path of statePaths) {
          const match = path.className.baseVal.match(/sm_state_([A-Z]{2})/);
          if (match) {
            const abbrev = match[1];
            path.classList.add(
              activeStates.has(abbrev) ? 'active-state' : 'inactive-state'
            );
          }
        }

        gsap.set('.sm_state', { opacity: 0 });

        gsap.to('.sm_state', {
          opacity: (_, el) => (el.classList.contains('active-state') ? 1 : 0.5),
          duration: 1,
          stagger: { amount: 0.5, from: 'start' },
          ease: 'power2.out',
          scrollTrigger: {
            trigger: '#map-wrapper',
            start: 'top 80%',
            once: true,
          },
        });
      }
    })
    .catch(console.error);

  // Hide the SimpleMaps link
  const selector = 'a[href="https://simplemaps.com"]';

  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      mutation.addedNodes.forEach((node) => {
        if (node.nodeType === Node.ELEMENT_NODE && node.matches(selector)) {
          node.remove();
        }
      });
    });
  });

  observer.observe(document.body, {
    childList: true,
    subtree: true,
  });
});
