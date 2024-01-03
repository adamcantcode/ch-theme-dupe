<?php
/*
Template Name: Job Board
Template Post Type: page
*/
?>

<?php get_header();  ?>

<section class="section-top">
  <div class="container">
    <div class="text-center">
      <h1 class="mb-0">Charlie Cares</h1>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">

    <div>
      <label for="locationFilter">Filter by State:</label>
      <select id="locationFilter">
        <option value="">All States</option>
        <!-- Populate the dropdown with unique state names -->
      </select>
    </div>

    <div id="jobListings">
      <!-- Job listings will be dynamically added here -->
    </div>

    <script>
      var requestOptions = {
        method: 'GET',
        redirect: 'follow'
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
          'WY': 'Wyoming',
        };

        const upperCaseAbbreviation = abbreviation.toUpperCase();

        return stateMap[upperCaseAbbreviation] || 'Remote';
      }

      fetch("https://boards-api.greenhouse.io/v1/boards/charliehealth/departments", requestOptions)
        .then(response => response.json())
        .then(data => {
          // Save the fetched data for later use
          var departmentsData = data;

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

            console.log(states);

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
                var departmentContainer = document.createElement('div');
                departmentContainer.className = 'department-container'
                departmentContainer.innerHTML = `<h2>${department.name}</h2>`;

                department.jobs.forEach(job => {
                  var jobElement = document.createElement('div');
                  jobElement.innerHTML = `<a href="${job.absolute_url}" target="_blank">${job.title}</a><p>${job.location.name}</p>`;


                  departmentContainer.appendChild(jobElement);
                });

                jobListingsContainer.appendChild(departmentContainer);
              }
            });
          }

          // Function to filter job listings based on selected state
          function filterJobListingsByState() {
            var selectedState = document.getElementById('locationFilter').value;
            var jobListings = document.getElementById('jobListings').querySelectorAll('.department-container');

            jobListings.forEach(departmentContainer => {
              var jobsInDepartment = departmentContainer.querySelectorAll('div');
              var allHidden = true;

              jobsInDepartment.forEach(jobElement => {
                var jobState = jobElement.querySelector('p').textContent.split(', ')[1];

                if (jobState === 'United States') {
                  jobState = 'Remote';
                }

                if (selectedState === '' || jobState === selectedState) {
                  jobElement.style.display = 'block';
                  allHidden = false
                } else {
                  jobElement.style.display = 'none';
                }
              });

              
              if (allHidden) {
                console.log(departmentContainer, 'hide');
                departmentContainer.style.display = 'none';
              } else {
                console.log(departmentContainer, 'show');
                departmentContainer.style.display = '';
                // Reset display property if at least one jobElement is visible
              }
            });
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

<?php get_footer(); ?>