<div id="jobListings" class="min-h-[100vh]">
  <div class="grid grid-cols-1 gap-x-sp-8 lg:grid-cols-[3fr_9fr] mt-sp-16 first:mt-0 job-departments-section-js transition-all duration-300">
    <div class="job-departments-js">
      <h6>Clinical</h6>
      <h3 class="text-[40px] leading-[1.1] font-heading my-sp-4">Open roles at Charlie Health</h3>
    </div>
    <div class="job-list-js">
      <div class="relative flex flex-col justify-between transition-all duration-300 border-b lg:flex-row lg:items-center border-primary first:border-t py-sp-6 gap-x-sp-5 job-list-job-js">
        <a href="https://www.charliehealth.com/careers/clinical/current-clinical-openings?gh_jid=5022688004" class="no-underline stretched-link text-[20px] leading-[1.1] mb-sp-2 lg:mb-0">Care Coach (Part-Time) - Spanish Speaking </a>
        <p class="mb-0 text-[14px] leading-[1.1] location-js lg:text-right">Remote, United States</p>
      </div>
    </div>
  </div>
</div>

<?php $boardCode = 'charliehealth'; ?>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    var requestOptions = {
      method: 'GET',
      redirect: 'follow'
    };

    fetch("https://boards-api.greenhouse.io/v1/boards/<?= $boardCode; ?>/departments", requestOptions)
      .then(response => response.json())
      .then(data => {
        // Save the fetched data for later use
        var departmentsData = data;
        var jobsContainer = document.querySelector('.job-list-job-js');

        // Build markup
        departmentsData.departments.forEach(department => {
          // Check if the department has jobs
          if (department.jobs.length > 0) {
            const jobMarkup = department.jobs.map(job => `
                  <div class="relative flex flex-col justify-between transition-all duration-300 border-b lg:flex-row lg:items-center border-primary first:border-t py-sp-6 gap-x-sp-5 job-list-job-js">
                    <a href="${job.absolute_url}" class="no-underline stretched-link text-[20px] leading-[1.1] mb-sp-2 lg:mb-0">${job.title}</a>
                    <p class="mb-0 text-[14px] leading-[1.1] location-js lg:text-right">${job.location.name}</p>
                  </div>
                `).join('');

            jobsContainer.innerHTML = markup;

            setTimeout(() => {
              jobsContainer.classList.remove('opacity-0');
            }, 300);
          }
        });
      })
      .catch(error => console.log('Error fetching data:', error));
  })
</script>