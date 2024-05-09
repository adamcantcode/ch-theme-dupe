<div id="jobListings">
  <div class="grid grid-cols-1 gap-x-sp-8 lg:grid-cols-[3fr_9fr] mt-sp-16 first:mt-0 job-departments-section-js transition-all duration-300">
    <div class="job-departments-js">
      <h6><?= get_the_title(); ?></h6>
      <h2 class="my-sp-4">Open roles at Charlie Health</h3>
    </div>
    <div>
      <div class="job-list-js"></div>
      <div class="grid lg:justify-end mt-sp-8">
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
    </div>
  </div>
</div>

<?php $boardCode = get_field('board_code'); ?>
<script>
  window.addEventListener('DOMContentLoaded', () => {

    // Get src
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('gh_src')) {
      var ghSrcValue = urlParams.get('gh_src');
    }

    var requestOptions = {
      method: 'GET',
      redirect: 'follow'
    };

    fetch("https://boards-api.greenhouse.io/v1/boards/<?= $boardCode; ?>/jobs", requestOptions)
      .then(response => response.json())
      .then(data => {
        var jobsContainer = document.querySelector('.job-list-js');

        // Build markup
        data.jobs.forEach(department => {
          if (data.jobs.length > 0) {
            const jobMarkup = data.jobs.slice(0, 5).map(job => `
                  <div class="relative flex flex-col justify-between transition-all duration-300 border-b lg:flex-row lg:items-center border-primary first:border-t py-sp-6 gap-x-sp-5 job-list-job-js">
                    <a href="${job.absolute_url}${ghSrcValue ? '&gh_src=' + ghSrcValue : ''}" class="no-underline stretched-link text-[20px] leading-[1.1] mb-sp-2 lg:mb-0">${job.title}</a>
                    <p class="mb-0 text-[14px] leading-[1.1] location-js lg:text-right">${job.location.name}</p>
                  </div>
                `).join('');

            jobsContainer.innerHTML = jobMarkup;

            setTimeout(() => {
              jobsContainer.classList.remove('opacity-0');
            }, 300);
          }
        });
      })
      .catch(error => console.log('Error fetching data:', error));
  })
</script>