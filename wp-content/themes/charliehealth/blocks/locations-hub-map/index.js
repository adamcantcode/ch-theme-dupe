import './index.css';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  // 1. Define the state name → abbreviation map
  function getStateAbbreviationByName(name) {
    const states = {
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

    return states[name] || null;
  }

  // 2. Fetch and update the map data
  fetch(
    'https://wpch.local/wp-json/wp/v2/locations?parent=0&per_page=100&status=publish'
  )
    .then((response) => response.json())
    .then((posts) => {
      const activeStates = new Set();
      const stateLinks = {};

      posts.forEach((post) => {
        const title = post.title.rendered.trim();
        const abbrev = getStateAbbreviationByName(title);
        if (abbrev && simplemaps_usmap_mapdata.state_specific[abbrev]) {
          activeStates.add(abbrev);
          stateLinks[abbrev] = post.link;
        }
      });

      Object.keys(simplemaps_usmap_mapdata.state_specific).forEach((abbrev) => {
        const state = simplemaps_usmap_mapdata.state_specific[abbrev];
        if (activeStates.has(abbrev)) {
          state.url = stateLinks[abbrev];
        } else {
          state.inactive = 1;
          state.opacity = 0.5;
        }
      });

      if (typeof simplemaps_usmap.refresh === 'function') {
        simplemaps_usmap.refresh();
        document.getElementById('map-loader').style.display = 'none';
        document.getElementById('map').classList.remove('opacity-0');

        const statePaths = document.querySelectorAll('.sm_state');

        statePaths.forEach((path) => {
          const classMatch =
            path.className.baseVal.match(/sm_state_([A-Z]{2})/);
          if (classMatch) {
            const abbrev = classMatch[1];
            if (activeStates.has(abbrev)) {
              path.classList.add('active-state');
            } else {
              path.classList.add('inactive-state');
            }
          }
        });

        gsap.set('.sm_state', { opacity: 0 }); // start hidden

        gsap.to('.sm_state', {
          opacity: (i, target) =>
            target.classList.contains('active-state') ? 1 : 0.3,
          duration: 1,
          stagger: {
            amount: 0.5,
            from: 'start',
          },
          ease: 'power2.out',
          scrollTrigger: {
            trigger: '#map-wrapper',
            start: 'top 80%',
            once: true,
          },
        });
      }
    })
    .catch((err) => console.error('Error fetching locations:', err));

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
