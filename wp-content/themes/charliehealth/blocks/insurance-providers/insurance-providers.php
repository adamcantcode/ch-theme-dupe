<section class="section bg-primary <?= $block['className']; ?>">
  <div class="container">
    <h2 class="text-center text-white">Verify your insurance coverage with Charlie Health now</h2>
    <div class="flex flex-col justify-center lg:flex-row gap-base5-4">
      <div class="relative custom-dropdown" id="stateDropdown">
        <div class="flex items-center dropdown-header" onclick="toggleDropdown('stateDropdown')">
          <input type="text" placeholder="State of residence" id="stateInput" class="dropdown-input" readonly>
          <svg width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-[25px]">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.50015 0.585938L8.50015 7.58594L15.5002 0.585938L16.9144 2.00015L8.50015 10.4144L0.0859375 2.00015L1.50015 0.585938Z" fill="white" />
          </svg>
        </div>
        <div class="dropdown-content noshow">
          <input type="text" class="search-input" id="stateSearchInput" placeholder="Search...">
          <ul class="dropdown-options"></ul>
        </div>
      </div>
      <div class="relative custom-dropdown" id="insuranceTypeDropdown">
        <div class="flex items-center dropdown-header" onclick="toggleDropdown('insuranceTypeDropdown')">
          <input type="text" placeholder="Insurance Type" id="insuranceTypeInput" class="dropdown-input" readonly disabled>
          <svg width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-[25px]">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.50015 0.585938L8.50015 7.58594L15.5002 0.585938L16.9144 2.00015L8.50015 10.4144L0.0859375 2.00015L1.50015 0.585938Z" fill="white" />
          </svg>
        </div>
        <div class="dropdown-content noshow">
          <ul class="dropdown-options">
            <li value="Commercial">Commercial/private</li>
            <li value="Medicaid">Medicaid</li>
          </ul>
        </div>
      </div>
      <div class="relative custom-dropdown" id="insuranceProviderDropdown">
        <div class="flex items-center dropdown-header" onclick="toggleDropdown('insuranceProviderDropdown')">
          <input type="text" placeholder="Insurance Provider" id="insuranceProviderInput" class="dropdown-input" readonly disabled>
          <svg width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-[25px]">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.50015 0.585938L8.50015 7.58594L15.5002 0.585938L16.9144 2.00015L8.50015 10.4144L0.0859375 2.00015L1.50015 0.585938Z" fill="white" />
          </svg>
        </div>
        <div class="dropdown-content noshow">
          <input type="text" class="search-input" id="insuranceProviderSearchInput" placeholder="Search...">
          <ul class="dropdown-options"></ul>
        </div>
      </div>
    </div>
    <div id="coverageStatusCTA" class="transition-all duration-500 opacity-0 mt-base5-10 noshow">
      <h3 id="covered" class="text-center text-white mb-base5-10">We are in network with your insurance provider.* <br>Get started today.</h3>
      <h3 id="notCovered" class="text-center text-white mb-base5-10">Contact us directly to further verify your insurance coverage.</h3>
      <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full justify-center">
        <a href="/form" class="ch-button button-primary inverted">Get started</a>
        <a href="tel:+18664848218" class="ch-button button-secondary inverted">1 (866) 484-8218</a>
      </div>
    </div>
    <h5 class="text-mini"></h5>
  </div>
</section>

<script>
  const data = <?= get_option('my_api_data'); ?>;
  console.log(data);
  // Function to toggle dropdown visibility
  function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const dropdownOptions = dropdown.querySelector('.dropdown-options');
    const dropdownContent = dropdown.querySelector('.dropdown-content');
    dropdownOptions.style.display = dropdownOptions.style.display === 'block' ? 'none' : 'block';
    dropdownContent.style.display = dropdownOptions.style.display;
  }

  // Function to populate dropdown options
  function populateDropdown(dropdown, options) {
    const dropdownOptions = dropdown.querySelector('.dropdown-options');
    const searchInput = dropdown.querySelector('.search-input');
    dropdownOptions.innerHTML = '';
    options.sort(); // Sort the options alphabetically
    options.forEach(option => {
      if (option !== 'Foreign') {
        const optionElement = document.createElement('li');
        optionElement.textContent = option;
        optionElement.addEventListener('click', () => {
          dropdown.querySelector('input').value = option;
          toggleDropdown(dropdown.id);
          if (dropdown.id === 'stateDropdown') {
            const selectedState = option;
            const LOBs = getUniqueValues(data.filter(item => item.State === selectedState), 'LOB');
            populateDropdown(document.getElementById('insuranceTypeDropdown'), LOBs);

            document.getElementById('insuranceTypeDropdown').querySelector('input').value = '';
            document.getElementById('insuranceTypeDropdown').querySelector('input').removeAttribute('disabled');
            document.getElementById('insuranceProviderDropdown').querySelector('input').setAttribute('disabled', 'disabled');
            document.getElementById('insuranceProviderDropdown').querySelector('input').value = '';
            document.querySelector('#coverageStatusCTA').classList.add('noshow');
            document.querySelector('#coverageStatusCTA').classList.add('opacity-0');
          }
          if (dropdown.id === 'insuranceTypeDropdown') {
            const selectedState = document.getElementById('stateDropdown').querySelector('input').value;
            const selectedInsuranceType = option;
            const insuranceProviders = filterInsuranceProviders(selectedState, selectedInsuranceType);
            populateDropdown(document.getElementById('insuranceProviderDropdown'), insuranceProviders);

            document.getElementById('insuranceProviderDropdown').querySelector('input').value = '';
            document.getElementById('insuranceProviderDropdown').querySelector('input').removeAttribute('disabled');
            document.querySelector('#coverageStatusCTA').classList.add('noshow');
            document.querySelector('#coverageStatusCTA').classList.add('opacity-0');
            document.getElementById('insuranceProviderDropdown').focus();
          }
          if (dropdown.id === 'insuranceProviderDropdown') {
            updateCoverage();
          }
        });
        dropdownOptions.appendChild(optionElement);
      }
    });

    // Add event listener to search input
    if (searchInput) {
      searchInput.addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        const optionElements = dropdownOptions.querySelectorAll('li');
        optionElements.forEach(optionElement => {
          const optionText = optionElement.textContent.toLowerCase();
          if (optionText.includes(searchText)) {
            optionElement.style.display = 'block';
          } else {
            optionElement.style.display = 'none';
          }
        });
      });
    }
  }

  // Function to filter unique values
  function getUniqueValues(arr, key) {
    return [...new Set(arr.map(item => item[key]))];
  }

  // Function to filter insurance providers based on selected state and LOB
  function filterInsuranceProviders(state, insuranceType) {
    const insuranceProviders = data.filter(item => item.State === state && item.LOB === insuranceType).map(item => item['Insurance Provider']);
    return [...new Set(insuranceProviders)].sort();
  }

  // Function to check coverage status based on selected options
  function updateCoverage() {
    const selectedState = document.getElementById('stateDropdown').querySelector('input').value;
    const selectedInsuranceProvider = document.getElementById('insuranceProviderDropdown').querySelector('input').value;
    const selectedInsuranceType = document.getElementById('insuranceTypeDropdown').querySelector('input').value;
    const selectedInsurance = data.find(item => item.State === selectedState && item['Insurance Provider'] === selectedInsuranceProvider && item['LOB'] === selectedInsuranceType);
    if (selectedInsurance) {
      document.querySelector('#coverageStatusCTA').classList.remove('noshow');
      setTimeout(function() {
        document.querySelector('#coverageStatusCTA').classList.remove('opacity-0');
      }, 10);
      const coverageStatus = selectedInsurance['Network Status'] === 'INN' ? true : false;
      if (coverageStatus) {
        document.querySelector('#covered').classList.remove('noshow');
        document.querySelector('#notCovered').classList.add('noshow');
      } else {
        document.querySelector('#covered').classList.add('noshow');
        document.querySelector('#notCovered').classList.remove('noshow');
      }
    }
  }

  // Function to hide dropdown options
  function hideDropdownContent() {
    document.querySelectorAll('.dropdown-content').forEach(dropdownContent => {
      dropdownContent.style.display = 'none';
    });
  }

  // Add event listeners for input focus and blur to show/hide dropdown options
  document.querySelectorAll('.custom-dropdown .dropdown-header').forEach(header => {
    header.addEventListener('click', function() {
      const dropdown = this.parentNode;
      const dropdownOptions = dropdown.querySelector('.dropdown-options');
      const dropdownContent = dropdown.querySelector('.dropdown-content');

      if (dropdown.querySelector('.search-input')) {
        dropdown.querySelector('.search-input').focus();
        dropdownOptions.style.display = 'block';
        dropdownContent.style.display = 'block';
      }
    });
  });

  // Add event listeners for insurance provider dropdown
  document.querySelectorAll('#insuranceProviderDropdown .dropdown-options li').forEach(option => {
    option.addEventListener('click', () => {
      const insuranceProviderInput = document.getElementById('insuranceProviderDropdown').querySelector('input');
      insuranceProviderInput.value = option.textContent;
      updateCoverage(); // Call updateCoverage after insurance provider is selected
      hideDropdownContent();
    });
  });


  document.addEventListener('click', function(event) {
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    dropdowns.forEach(dropdown => {
      if (!dropdown.contains(event.target)) {
        dropdown.querySelector('.dropdown-options').style.display = 'none';
        dropdown.querySelector('.dropdown-content').style.display = 'none';
      }
    });
  });

  // Populate state dropdown with unique values
  const states = getUniqueValues(data, 'State');
  populateDropdown(document.getElementById('stateDropdown'), states);
</script>