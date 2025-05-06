<?php
/*
Template Name: Job Board
Template Post Type: page
*/
?>

<?php $boardCode = get_field('board_code'); ?>

<?php get_header();  ?>
<?php if (isset($_GET['gh_jid'])) : ?>
  <section class="section-top">
    <div class="container">
      <h1>Apply</h1>
    </div>
  </section>
  <section class="section-horizontal">
    <div class="container">
      <div class="grid grid-cols-1 lg:grid-cols-[3fr_9fr]">
        <div></div>
        <div id="grnhse_app"></div>
        <script src="https://boards.greenhouse.io/embed/job_board/js?for=<?= $boardCode; ?>"></script>
      </div>
    </div>
  </section>
<?php else : ?>
  <section class="section section-bg-js">
    <div class="container mb-sp-16">
      <?php include('wp-content/themes/charliehealth/includes/breadcrumbs.php'); ?>
      <div class="flex flex-col justify-between lg:items-center lg:mb-sp-16 mb-sp-8 lg:flex-row">
        <h2 class="text-h1-base">Open Roles</h2>
        <div>
          <select id="locationFilter" class="cursor-pointer ch-button button-secondary-ch custom-select">
            <option value="">All Locations</option>
          </select>
        </div>
      </div>
      <div id="jobListings" class="min-h-[100vh]"></div>
    </div>
    <?php $link = get_field('link'); ?>
    <div class="section-horizontal section-bg-js-cta">
      <div class="container-sm">
        <div class="flex flex-col justify-center pin-cta-js lg:h-[50vh] lg:mt-0 mt-sp-16 pb-sp-14 lg:pb-0">
          <div class="pin-cta-js-motion">
            <div class="flex justify-center rounded-sm lg:px-sp-14 lg:pt-sp-14 pb-sp-6 px-sp-6">
              <div class="flex flex-col items-center justify-center text-center max-w-[700px]">
                <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
                <h2>Mission-driven work. Human-centered care. Bold innovation. Join the Charlie Health team today.</h2>
                <div class="flex gap-x-sp-4 items-center md:w-[unset] w-full">
                  <a href="<?= $link['url']; ?>" class="ch-button button-primary-ch"><?= $link['title']; ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/ScrollTrigger.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const boardCode = '<?= $boardCode; ?>';
      const ghSrcValue = new URLSearchParams(window.location.search).get('gh_src');
      let departmentsData = null;

      const fetchDepartments = async () => {
        try {
          const response = await fetch(`https://boards-api.greenhouse.io/v1/boards/${boardCode}/departments`);
          const data = await response.json();
          departmentsData = data;
          populateStateDropdown();
          applyStateFilterFromHash(); // Apply the filter if hash exists
          createJobListings();
          initializeAnimation();
        } catch (error) {
          console.error('Error fetching data:', error);
        }
      };

      function stateAbbreviationToFullName(abbreviation) {
        const stateMap = {
          'AL': 'Alabama',
          'AK': 'Alaska',
          'AZ': 'Arizona',
          'AR': 'Arkansas',
          'CA': 'California',
          'CO': 'Colorado',
          'CT': 'Connecticut',
          'DE': 'Delaware',
          'FL': 'Florida',
          'GA': 'Georgia',
          'HI': 'Hawaii',
          'ID': 'Idaho',
          'IL': 'Illinois',
          'IN': 'Indiana',
          'IA': 'Iowa',
          'KS': 'Kansas',
          'KY': 'Kentucky',
          'LA': 'Louisiana',
          'ME': 'Maine',
          'MD': 'Maryland',
          'MA': 'Massachusetts',
          'MI': 'Michigan',
          'MN': 'Minnesota',
          'MS': 'Mississippi',
          'MO': 'Missouri',
          'MT': 'Montana',
          'NE': 'Nebraska',
          'NV': 'Nevada',
          'NH': 'New Hampshire',
          'NJ': 'New Jersey',
          'NM': 'New Mexico',
          'NY': 'New York',
          'NC': 'North Carolina',
          'ND': 'North Dakota',
          'OH': 'Ohio',
          'OK': 'Oklahoma',
          'OR': 'Oregon',
          'PA': 'Pennsylvania',
          'RI': 'Rhode Island',
          'SC': 'South Carolina',
          'SD': 'South Dakota',
          'TN': 'Tennessee',
          'TX': 'Texas',
          'UT': 'Utah',
          'VT': 'Vermont',
          'VA': 'Virginia',
          'WA': 'Washington',
          'WV': 'West Virginia',
          'WI': 'Wisconsin',
          'WY': 'Wyoming'
        };

        return stateMap[abbreviation.toUpperCase()] || 'Remote';
      }

      function stateFullNameToAbbreviation(fullName) {
        const stateMap = {
          'Alabama': 'AL',
          'Alaska': 'AK',
          'Arizona': 'AZ',
          'Arkansas': 'AR',
          'California': 'CA',
          'Colorado': 'CO',
          'Connecticut': 'CT',
          'Delaware': 'DE',
          'Florida': 'FL',
          'Georgia': 'GA',
          'Hawaii': 'HI',
          'Idaho': 'ID',
          'Illinois': 'IL',
          'Indiana': 'IN',
          'Iowa': 'IA',
          'Kansas': 'KS',
          'Kentucky': 'KY',
          'Louisiana': 'LA',
          'Maine': 'ME',
          'Maryland': 'MD',
          'Massachusetts': 'MA',
          'Michigan': 'MI',
          'Minnesota': 'MN',
          'Mississippi': 'MS',
          'Missouri': 'MO',
          'Montana': 'MT',
          'Nebraska': 'NE',
          'Nevada': 'NV',
          'New Hampshire': 'NH',
          'New Jersey': 'NJ',
          'New Mexico': 'NM',
          'New York': 'NY',
          'North Carolina': 'NC',
          'North Dakota': 'ND',
          'Ohio': 'OH',
          'Oklahoma': 'OK',
          'Oregon': 'OR',
          'Pennsylvania': 'PA',
          'Rhode Island': 'RI',
          'South Carolina': 'SC',
          'South Dakota': 'SD',
          'Tennessee': 'TN',
          'Texas': 'TX',
          'Utah': 'UT',
          'Vermont': 'VT',
          'Virginia': 'VA',
          'Washington': 'WA',
          'West Virginia': 'WV',
          'Wisconsin': 'WI',
          'Wyoming': 'WY'
        };

        return stateMap[fullName] || fullName;
      }

      function populateStateDropdown() {
        // Collect all unique states
        let statesSet = new Set(departmentsData.departments.flatMap(dep => dep.jobs.flatMap(job => {
          let location = job.location.name.trim();
          if (location.includes('Remote')) {
            return 'Remote';
          } else if (location.includes('United States')) {
            return location.split(' / ').map(part => stateFullNameToAbbreviation(part.split(', ')[0].trim()));
          } else {
            let locationParts = location.split(', ');
            if (locationParts.length === 2) {
              return stateFullNameToAbbreviation(locationParts[1].trim());
            } else {
              return locationParts[0].trim();
            }
          }
        })));

        // Convert the set to an array and sort it alphabetically
        let states = Array.from(statesSet).sort((a, b) => a.localeCompare(b));

        // Clean up state names and remove any duplicates
        let cleanedStates = [...new Set(states.map(state => state.trim()))];

        // Remove any duplicates and ensure "Remote" is placed correctly
        let dropdown = document.getElementById('locationFilter');
        dropdown.innerHTML = ''; // Clear existing options

        // Add 'All Locations' as the first option
        let allLocationsOption = document.createElement('option');
        allLocationsOption.value = '';
        allLocationsOption.textContent = 'All Locations';
        dropdown.appendChild(allLocationsOption);

        // Add 'Remote' as the second option if it exists
        let remoteIndex = cleanedStates.indexOf('Remote');
        if (remoteIndex !== -1) {
          cleanedStates.splice(remoteIndex, 1);
          let remoteOption = document.createElement('option');
          remoteOption.value = 'Remote';
          remoteOption.textContent = 'Remote';
          dropdown.appendChild(remoteOption);
        }

        // Add the remaining sorted states
        cleanedStates.forEach(state => {
          if (state !== null && state !== undefined && !state.includes('or')) {
            let option = document.createElement('option');
            let fullState = state.length === 2 ? stateAbbreviationToFullName(state) : state;
            option.value = state;
            option.textContent = fullState;
            dropdown.appendChild(option);
          }
        });
      }

      const createJobListings = () => {
        const jobListingsContainer = document.getElementById('jobListings');
        jobListingsContainer.innerHTML = '';

        departmentsData.departments.forEach(department => {
          if (department.jobs.length > 0) {
            const jobMarkup = department.jobs.map(job => `
          <div class="relative flex flex-col justify-between transition-all duration-300 border-b lg:flex-row lg:items-center border-primary first:border-t py-sp-6 gap-x-sp-5 job-list-job-js">
            <a href="${job.absolute_url}${ghSrcValue ? '&gh_src=' + ghSrcValue : ''}" class="no-underline stretched-link text-h4-base mb-sp-2 lg:mb-0">${job.title}</a>
            <p class="location-js lg:text-right">${job.location.name}</p>
          </div>
        `).join('');
            const markup = `
          <div class="job-departments-js">
            <h3 class="text-h2-base font-heading">${department.name == 'Clinical Outreach' ? 'Outreach' : department.name}</h3>
          </div>
          <div class="job-list-js mt-sp-5 lg:mt-0">
            ${jobMarkup}
          </div>
        `;

            const jobsContainer = document.createElement('div');
            jobsContainer.className = 'grid grid-cols-1 gap-x-sp-8 lg:grid-cols-[3fr_9fr] mt-sp-16 first:mt-0 job-departments-section-js transition-all duration-300 opacity-0';
            jobsContainer.innerHTML = markup;

            jobListingsContainer.appendChild(jobsContainer);
            setTimeout(() => {
              jobsContainer.classList.remove('opacity-0');
            }, 300);
          }
        });
      };

      function filterJobListingsByState() {
        createJobListings();
        let selectedState = document.getElementById('locationFilter').value;
        let jobListings = document.getElementById('jobListings').querySelectorAll('.job-departments-section-js');

        jobListings.forEach(departmentContainer => {
          let jobsInDepartment = departmentContainer.querySelectorAll('.job-list-js');
          let allHidden = true;

          jobsInDepartment.forEach(jobElement => {
            let jobs = jobElement.querySelectorAll('.job-list-job-js');

            jobs.forEach(job => {
              let jobState = job.querySelector('.location-js').textContent.trim();

              if (jobState === 'Remote' || jobState === 'Remote, United States') {
                jobState = 'Remote';
              }

              let stateMatches = [];
              if (jobState.includes('United States')) {
                stateMatches = jobState.split(' / ').map(part => part.split(', ')[0].trim());
              } else {
                let locationParts = jobState.split(', ');
                if (locationParts.length === 2) {
                  stateMatches.push(stateFullNameToAbbreviation(locationParts[1].trim()));
                } else {
                  stateMatches.push(locationParts[0].trim());
                }
              }

              stateMatches = stateMatches.map(state => {
                if (state.length === 2) {
                  return stateAbbreviationToFullName(state);
                } else {
                  return state;
                }
              });

              let matchFound = stateMatches.some(state => state === selectedState || stateFullNameToAbbreviation(state) === selectedState);

              if (!selectedState || matchFound) {
                job.classList.remove('noshow');
                allHidden = false;
              } else {
                job.classList.add('noshow');
              }
            });

            if (allHidden) {
              departmentContainer.classList.add('noshow');
            } else {
              departmentContainer.classList.remove('noshow');
            }
          });

          departmentContainer.classList.add('opacity-0');
          setTimeout(() => {
            departmentContainer.classList.remove('opacity-0');
          }, 300);
        });

        ScrollTrigger.refresh();
      }

      const initializeAnimation = () => {
        const sectionBg = gsap.timeline({
          scrollTrigger: {
            trigger: '.section-bg-js-cta',
            start: 'top 70%',
            endTrigger: '.pin-cta-js-motion',
            end: 'top 30%',
            scrub: true,
          },
        });

        sectionBg.fromTo(
          '.section-bg-js', {
            background: 'linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(143,146,205,0) 100%)'
          }, {
            background: 'linear-gradient(180deg,rgba(255,255,255,1) 0%, rgba(143,146,205,1) 100%)'
          }
        );
      };

      const applyStateFilterFromHash = () => {
        const hash = window.location.hash.substring(1); // Remove the '#'
        if (hash) {
          // Extract only the state part before any '?' which might be UTM parameters
          const stateHash = hash.split('?')[0]; // Get the part before '?'
          const stateName = decodeURIComponent(stateHash);

          const dropdown = document.getElementById('locationFilter');

          // Set the dropdown value to the state name or abbreviation
          if (dropdown.querySelector(`option[value="${stateName}"]`)) {
            let option = dropdown.querySelector(`option[value="${stateName}"]`);

            dropdown.value = stateName;
            dropdown.selectedIndex = Array.prototype.indexOf.call(dropdown.options, option);

            setTimeout(() => {
              dropdown.focus();
              dropdown.blur();
              filterJobListingsByState();
            }, 300);
          }
        }
      };

      fetchDepartments();
      document.getElementById('locationFilter').addEventListener('change', filterJobListingsByState);
    });
  </script>
<?php endif; ?>
<?php get_footer(); ?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const checkIframe = () => {
      const iframe = document.querySelector("#grnhse_iframe");
      if (!iframe) {
        requestAnimationFrame(checkIframe);

        return;
      }

      const observer = new MutationObserver((mutationsList) => {
        for (let mutation of mutationsList) {
          if (mutation.attributeName === "height") {
            const newHeight = parseFloat(mutation.target.getAttribute("height"));
            if (newHeight && newHeight < 1500) {
              window.location.href = "https://www.charliehealth.com/job-application-thank-you";
            }
          }
        }
      });

      observer.observe(iframe, {
        attributes: true,
        attributeFilter: ["height"]
      });
    };

    requestAnimationFrame(checkIframe);
  });
</script>