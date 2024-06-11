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
          <select id="locationFilter" class="cursor-pointer ch-button button-secondary custom-select">
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
                <h2>Let’s build the solution to the youth mental health crisis together</h2>
                <div class="flex gap-x-sp-4 items-center md:w-[unset] w-full">
                  <a href="<?= $link['url']; ?>" class="ch-button button-primary"><?= $link['title']; ?></a>
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
        'WY': 'Wyoming',
      };

      const boardCode = '<?= $boardCode; ?>';
      const ghSrcValue = new URLSearchParams(window.location.search).get('gh_src');
      let departmentsData = null;

      const fetchDepartments = async () => {
        try {
          const response = await fetch(`https://boards-api.greenhouse.io/v1/boards/${boardCode}/departments`);
          const data = await response.json();
          departmentsData = data;
          populateStateDropdown();
          createJobListings();
          initializeAnimation();
        } catch (error) {
          console.error('Error fetching data:', error);
        }
      };

      const stateAbbreviationToFullName = (abbreviation) => stateMap[abbreviation.toUpperCase()] || 'Remote';

      const stateFullNameToAbbreviation = (fullName) => {
        const entries = Object.entries(stateMap);
        for (const [abbr, name] of entries) {
          if (name === fullName) {
            return abbr;
          }
        }
        return fullName;
      };

      function populateStateDropdown() {
        let states = Array.from(new Set(departmentsData.departments.flatMap(dep => dep.jobs.flatMap(job => {
          if (job.location.name.endsWith("United States") || job.location.name.endsWith("USA")) {
            // Handle 'City, United States' and 'Remote, United States'
            if (job.location.name.split(', ')[0] === 'Remote') {
              return job.location.name.split(', ')[1];
            } else {
              return stateFullNameToAbbreviation(job.location.name.split(', ')[0]);
            }
          } else {
            return job.location.name.split(', ')[1];
          }
        }))));

        var dropdown = document.getElementById('locationFilter');

        // Update 'United States' to 'Remote' if found
        const indexOfUS = states.indexOf('United States');
        if (indexOfUS !== -1) {
          states[indexOfUS] = 'Remote';
        }

        // Remove undefined from the array
        states = states.filter(location => location !== undefined);

        // Sort the array and place 'Remote' first
        states.sort((a, b) => (a === 'Remote' ? -1 : b === 'Remote' ? 1 : 0));

        states.forEach(state => {
          if (state !== null && state !== undefined && !state.includes('or')) {
            var option = document.createElement('option');
            var fullState = state.length == 2 ? stateAbbreviationToFullName(state) : state;
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
                <h3 class="text-h2-base font-heading">${department.name}</h3>
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

      const filterJobListingsByState = () => {
        createJobListings();
        const selectedState = document.getElementById('locationFilter').value;
        const jobListings = document.querySelectorAll('.job-departments-section-js');

        jobListings.forEach(departmentContainer => {
          const jobsInDepartment = departmentContainer.querySelectorAll('.job-list-js');
          let allHidden = true;

          jobsInDepartment.forEach(jobElement => {
            const jobs = jobElement.querySelectorAll('.job-list-job-js');

            jobs.forEach(job => {
              let jobState = job.querySelector('.location-js').textContent;

              if (jobState === 'Remote ' || jobState === 'Remote') {
                jobState = 'Remote, United States';
              }

              if (jobState.split(', ')[1]?.length === 2) {
                jobState = jobState.split(', ')[1];
              } else {
                jobState = jobState.split(', ')[0];
              }

              switch (jobState) {
                case 'United States':
                  jobState = 'Remote';
                  break;
                case undefined:
                  jobState = job.querySelector('.location-js').textContent.split(', ')[0];
                  break;
                default:
                  break;
              }

              if (!selectedState || jobState === selectedState || stateFullNameToAbbreviation(jobState) === selectedState) {
                job.classList.remove('noshow');
                allHidden = false;
              } else {
                job.classList.add('noshow');
                job.remove();
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
      };

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

      fetchDepartments();
      document.getElementById('locationFilter').addEventListener('change', filterJobListingsByState);
    });
  </script>
<?php endif; ?>
<?php get_footer(); ?>