<?php
/*
Template Name: Job Board
Template Post Type: page
*/
?>

<?php
$jobCode = get_field('board_code');
?>

<?php get_header();  ?>
<?php if (isset($_GET['gh_jid'])) : ?>
  <section class="section">
    <div class="container">
      <div id="grnhse_app"></div>
      <script src="https://boards.greenhouse.io/embed/job_board/js?for=<?= $jobCode; ?>"></script>
    </div>
  </section>
<?php else : ?>
  <section class="section">
    <div class="container">
      <h1 class="text-[14px] leading-[1.6] mb-sp-4"><?= get_the_title(); ?></h1>
      <div class="flex items-center justify-between mb-sp-16">
        <h2 class="text-[64] leading-[1.1] mb-0">Open Roles</h2>
        <div>
          <select id="locationFilter" class="cursor-pointer ch-button button-secondary custom-select">
            <option value="">All Locations</option>
            <!-- Populate the dropdown with unique state names -->
          </select>
        </div>
      </div>
      <div id="jobListings"></div>
      <script>
        var requestOptions = {
          method: 'GET',
          redirect: 'follow'
        };

        fetch("https://boards-api.greenhouse.io/v1/boards/<?= $jobCode; ?>/departments", requestOptions)
          .then(response => response.json())
          .then(data => {
            // Save the fetched data for later use
            var departmentsData = data;

            // Format location text
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
                'WY': 'Wyoming',
              };

              return stateMap[abbreviation.toUpperCase()] || 'Remote';
            }

            // Function to create option elements for the state dropdown
            function populateStateDropdown() {
              var states = Array.from(new Set(departmentsData.departments.flatMap(dep => dep.jobs.flatMap(job => job.location.name.split(', ')[1]))));
              var dropdown = document.getElementById('locationFilter');

              // Find the index of 'United States'
              const indexOfUS = states.indexOf('United States');

              // Update 'United States' to 'Remote' if found
              if (indexOfUS !== -1) {
                states[indexOfUS] = 'Remote';
              }

              // Remove undefined from the array
              states = states.filter(location => location !== undefined);

              // Sort the array and place 'Remote' first
              states.sort((a, b) => (a === 'Remote' ? -1 : b === 'Remote' ? 1 : 0));

              states.forEach(state => {
                if (state !== null && state !== undefined) {
                  var option = document.createElement('option');
                  var fullState = stateAbbreviationToFullName(state);
                  option.value = state;
                  option.textContent = fullState;
                  dropdown.appendChild(option);
                }
              });
            }

            // Function to create HTML structure for job listings
            function createJobListings() {
              var jobListingsContainer = document.getElementById('jobListings');

              departmentsData.departments.forEach(department => {
                // Check if the department has jobs
                if (department.jobs.length > 0) {
                  const jobMarkup = department.jobs.map(job => `
                  <div class="relative flex items-center justify-between transition-all duration-300 border-b border-primary last:border-none only:border-y only:border-solid py-sp-6 job-list-job-js">
                    <a href="${job.absolute_url}" class="no-underline stretched-link">${job.title}</a>
                    <p class="mb-0 location-js">${job.location.name}</p>
                  </div>
                `).join('');
                  const markup = `
                  <div class="job-departments-js">
                      <p class="text-h2">${department.name}</p>
                  </div>
                  <div class="job-list-js">
                      ${jobMarkup}
                  </div>
                `;

                  var jobsContainer = document.createElement('div');
                  jobsContainer.className = 'grid grid-cols-1 lg:grid-cols-[5fr_7fr] mt-sp-12 first:mt-0 job-departments-section-js transition-all duration-300';
                  jobsContainer.innerHTML = markup;

                  jobListingsContainer.appendChild(jobsContainer);
                }
              });
            }

            // Function to filter job listings based on selected state
            function filterJobListingsByState() {
              // Get value, not title of selection
              var selectedState = document.getElementById('locationFilter').value;
              // Get all departments
              var jobListings = document.getElementById('jobListings').querySelectorAll('.job-departments-section-js');

              jobListings.forEach(departmentContainer => {
                var jobsInDepartment = departmentContainer.querySelectorAll('.job-list-js');
                var allHidden = true;

                // Loop through all job containers within department container
                jobsInDepartment.forEach(jobElement => {
                  var jobs = jobElement.querySelectorAll('.job-list-job-js');

                  // Loop through all jobs within jobs container
                  jobs.forEach((job, i) => {
                    var jobState = job.querySelector('.location-js').textContent.split(', ')[1];

                    // Handle improper location naming
                    switch (jobState) {
                      case 'United States':
                        jobState = 'Remote';
                        break;
                      case undefined:
                        jobState = job.querySelector('.location-js').textContent.split(', ')[0];
                        break
                      default:
                        break;
                    }

                    // Hide jobs if not selected location
                    if (selectedState === '' || jobState === selectedState) {
                      job.classList.remove('noshow');
                      setTimeout(() => {
                        job.classList.remove('opacity-0', 'translate-x-sp-4');
                      }, 300);
                      allHidden = false
                    } else {
                      job.classList.add('opacity-0', 'translate-x-sp-4');
                      setTimeout(() => {
                        job.classList.add('noshow');
                      }, 300);
                    }
                  });

                  // Hide container/department if no jobs
                  if (allHidden) {
                    departmentContainer.classList.add('opacity-0')
                    setTimeout(() => {
                      departmentContainer.classList.add('noshow')
                    }, 300);
                  } else {
                    departmentContainer.classList.remove('noshow')
                    setTimeout(() => {
                      departmentContainer.classList.remove('opacity-0')
                    }, 300);
                  }
                });
              });

              const height = document.getElementById('jobListings').clientHeight;
              document.getElementById('jobListings').style.height = height + 'px';
            }

            // Initial setup
            populateStateDropdown();
            createJobListings();

            // Event listener for state dropdown change
            document.getElementById('locationFilter').addEventListener('change', filterJobListingsByState);
          })
          .catch(error => console.log('Error fetching data:', error));
      </script>
    </div>
  </section>
<?php endif; ?>
<?php get_footer(); ?>