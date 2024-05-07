<?php
/*
Template Name: Testing fetch
Template Post Type: page
*/
?>

<?php get_header(); ?>
<section class="section bg-primary">
  <div class="container">
    <div class="flex justify-center gap-base5-4">
      <div class="relative custom-dropdown" id="stateDropdown">
        <div class="dropdown-header" onclick="toggleDropdown('stateDropdown')">
          <input type="text" placeholder="State" id="stateInput" class="dropdown-input" readonly>
          <span class="arrow-down"></span>
        </div>
        <div class="dropdown-content noshow">
          <input type="text" class="search-input" id="stateSearchInput" placeholder="Search...">
          <ul class="dropdown-options"></ul>
        </div>
      </div>
      <div class="relative custom-dropdown" id="insuranceProviderDropdown">
        <div class="dropdown-header" onclick="toggleDropdown('insuranceProviderDropdown')">
          <input type="text" placeholder="Insurance Provider" id="insuranceProviderInput" class="dropdown-input" readonly>
          <span class="arrow-down"></span>
        </div>
        <div class="dropdown-content noshow">
          <input type="text" class="search-input" id="insuranceProviderSearchInput" placeholder="Search...">
          <ul class="dropdown-options"></ul>
        </div>
      </div>
      <div class="relative custom-dropdown" id="insuranceTypeDropdown">
        <div class="dropdown-header" onclick="toggleDropdown('insuranceTypeDropdown')">
          <input type="text" placeholder="Insurance Type" id="insuranceTypeInput" class="dropdown-input" readonly>
          <span class="arrow-down"></span>
        </div>
        <div class="dropdown-content noshow">
          <ul class="dropdown-options">
            <li value="Commercial">Commercial</li>
            <li value="Medicaid">Medicaid</li>
          </ul>
        </div>
      </div>
    </div>

    <p id="coverageStatus" class="text-white"></p>
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
      const optionElement = document.createElement('li');
      optionElement.textContent = option;
      optionElement.addEventListener('click', () => {
        dropdown.querySelector('input').value = option;
        toggleDropdown(dropdown.id);
        if (dropdown.id === 'stateDropdown') {
          const insuranceProviders = filterInsuranceProviders(option);
          populateDropdown(document.getElementById('insuranceProviderDropdown'), insuranceProviders);
          document.getElementById('insuranceProviderDropdown').querySelector('input').value = '';
          document.getElementById('insuranceTypeDropdown').querySelector('input').value = '';
        }
        if (dropdown.id === 'insuranceProviderDropdown') {
          document.getElementById('insuranceTypeDropdown').querySelector('input').value = '';
        }
        // updateCoverage();
      });
      dropdownOptions.appendChild(optionElement);
    });

    // Add event listener to search input
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

  // Function to filter unique values
  function getUniqueValues(arr, key) {
    return [...new Set(arr.map(item => item[key]))];
  }

  // Function to filter insurance providers based on selected state
  function filterInsuranceProviders(state) {
    const insuranceProviders = data.filter(item => item.State === state).map(item => item['Insurance Provider']);
    return [...new Set(insuranceProviders)].sort();
  }

  // Function to check coverage status based on selected options
  function updateCoverage() {
    const selectedState = document.getElementById('stateDropdown').querySelector('input').value;
    const selectedInsuranceProvider = document.getElementById('insuranceProviderDropdown').querySelector('input').value;
    const selectedInsuranceType = document.getElementById('insuranceTypeDropdown').querySelector('input').value;
    const selectedInsurance = data.find(item => item.State === selectedState && item['Insurance Provider'] === selectedInsuranceProvider && item['Insurance Type'] === selectedInsuranceType);
    if (selectedInsurance) {
      const coverageStatus = selectedInsurance['Network Status'] === 'INN' ? 'Covered' : 'Not Covered';
      document.getElementById('coverageStatus').textContent = `Coverage Status: ${coverageStatus}`;
    } else {
      document.getElementById('coverageStatus').textContent = 'Coverage Status: Not available';
    }
  }

  // Populate state dropdown with unique values
  const states = getUniqueValues(data, 'State');
  populateDropdown(document.getElementById('stateDropdown'), states);

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
      dropdownOptions.style.display = 'block';
      dropdownContent.style.display = 'block';
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

  // Add event listeners for insurance type dropdown
  document.querySelectorAll('#insuranceTypeDropdown .dropdown-options li').forEach(option => {
    option.addEventListener('click', () => {
      const insuranceTypeInput = document.getElementById('insuranceTypeDropdown').querySelector('input');
      insuranceTypeInput.value = option.textContent;
      updateCoverage();
      hideDropdownContent();
    });
  });

  // Hide dropdowns when anything outside of them is clicked
  document.addEventListener('click', function(event) {
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    dropdowns.forEach(dropdown => {
      if (!dropdown.contains(event.target)) {
        dropdown.querySelector('.dropdown-options').style.display = 'none';
      }
    });
  });
</script>

<?php get_footer(); ?>