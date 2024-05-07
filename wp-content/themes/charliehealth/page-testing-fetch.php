<?php
/*
Template Name: Testing fetch
Template Post Type: page
*/
?>

<?php get_header(); ?>
<section class="section bg-primary">
  <div class="container">
    <div class="flex gap-base5-4">
      <div class="relative custom-dropdown" id="stateDropdown">
        <input type="text" placeholder="Select State" id="stateInput" class="dropdown-input">
        <ul class="dropdown-options"></ul>
      </div>
      <div class="relative custom-dropdown" id="insuranceProviderDropdown">
        <input type="text" placeholder="Select Insurance Provider" id="insuranceProviderInput" class="dropdown-input">
        <ul class="dropdown-options"></ul>
      </div>
      <div class="relative custom-dropdown" id="insuranceTypeDropdown">
        <input type="text" placeholder="Select Insurance Type" id="insuranceProviderInput" class="dropdown-input">
        <ul class="dropdown-options">
          <li value="Commercial">Commercial</li>
          <li value="Medicaid">Medicaid</li>
        </ul>
      </div>
    </div>

    <p id="coverageStatus" class="text-white"></p>
  </div>
</section>

<script>
  const data = <?= get_option('my_api_data'); ?>;

  console.log(data);

  // Function to populate dropdown options
  function populateDropdown(dropdown, options) {
    const dropdownOptions = dropdown.querySelector('.dropdown-options');
    dropdownOptions.innerHTML = '';
    options.sort(); // Sort the options alphabetically
    options.forEach(option => {
      const optionElement = document.createElement('li');
      optionElement.textContent = option;
      optionElement.value = option;
      optionElement.addEventListener('click', () => {
        dropdown.querySelector('input').value = option;
        dropdownOptions.style.display = 'none';
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
    console.log(selectedState);
    console.log(selectedInsuranceProvider);
    console.log(selectedInsuranceType);
    console.log(selectedInsurance);
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
  function hideDropdownOptions() {
    document.querySelectorAll('.dropdown-options').forEach(dropdownOptions => {
      dropdownOptions.style.display = 'none';
    });
  }

  // Add event listeners for input focus and blur to show/hide dropdown options
  document.querySelectorAll('.custom-dropdown input[type="text"]').forEach(input => {
    input.addEventListener('focus', function() {
      const dropdownOptions = this.parentNode.querySelector('.dropdown-options');
      const options = Array.from(dropdownOptions.children);
      options.forEach(option => {
        option.style.display = 'block';
      });
      dropdownOptions.style.display = 'block';
    });
    input.addEventListener('input', function() {
      const dropdownOptions = this.parentNode.querySelector('.dropdown-options');
      const searchText = this.value.toLowerCase();
      const options = Array.from(dropdownOptions.children);
      options.forEach(option => {
        if (option.textContent.toLowerCase().includes(searchText)) {
          option.style.display = 'block';
        } else {
          option.style.display = 'none';
        }
      });
      dropdownOptions.style.display = 'block';
    });
  });

  // Add event listeners for insurance type dropdown
  document.querySelectorAll('#insuranceTypeDropdown .dropdown-options li').forEach(option => {
    option.addEventListener('click', () => {
      const insuranceTypeInput = document.getElementById('insuranceTypeDropdown').querySelector('input');
      insuranceTypeInput.value = option.textContent;
      updateCoverage();
      hideDropdownOptions();
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