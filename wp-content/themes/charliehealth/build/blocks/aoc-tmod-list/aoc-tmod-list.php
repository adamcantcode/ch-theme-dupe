<?php $rand = rand(); ?>
<div>
  <InnerBlocks />
  <div class="lg:mt-base5-8 mt-base5-6 overflow-hidden transition-all duration-500 ease-in-out view-all-js-<?= $rand ?>">
    <?php if (have_rows('content')) : while (have_rows('content')): the_row() ?>
        <?php
        $link = '';
        ?>
        <div class="relative first:border-t-2 first:border-primary first:pt-sp-6">
          <a role="button" class="stretched-link no-underline pb-sp-6 border-b-2 border-primary grid lg:grid-cols-[3fr_3.5fr] mb-sp-6 gap-x-sp-5 items-center list-item-height-js-<?= $rand; ?>  group cursor-default">
            <div class="flex items-center mb-sp-2 lg:mb-0">
              <h3 class="inline-block text-h4-base"><?= get_sub_field('headline') ?>
                <!-- <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="group-hover:translate-x-[5px] transition-all duration-300 ml-sp-4 inline-block align-baseline flex-none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
                  </svg> -->
              </h3>
            </div>
            <p><?= get_sub_field('details') ?></p>
          </a>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
  <a role="button" class="float-right ch-button button-secondary view-all-button-js-<?= $rand ?> mt-sp-8 w-full lg:w-[unset]">View All</a>
</div>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    const viewAllButton = document.querySelector('.view-all-button-js-<?= $rand ?>');
    const aocContent = document.querySelector('.view-all-js-<?= $rand ?>');

    let revealedContent = null;

    const setMaxHeight = () => {
      if (!revealedContent) {
        const listItems = aocContent.querySelectorAll('.list-item-height-js-<?= $rand; ?> ');
        const first5ListItems = Array.from(listItems).slice(0, 5);
        const combinedHeight = first5ListItems.reduce((totalHeight, listItem) => {
          return totalHeight + listItem.offsetHeight + 27;
        }, 0);
        aocContent.style.maxHeight = combinedHeight + 'px';
      }
    };

    function closeAccordion() {
      if (revealedContent) {
        aocContent.style.maxHeight = setMaxHeight();
        revealedContent = null;
        viewAllButton.innerText = 'View All';
      }
    }

    function toggleAccordion() {
      if (this === revealedContent) {
        closeAccordion();
      } else {
        closeAccordion();
        aocContent.style.maxHeight = aocContent.scrollHeight + 'px';
        revealedContent = this;
        viewAllButton.remove();
      }
    }

    viewAllButton.addEventListener('click', toggleAccordion);

    setMaxHeight();
    window.addEventListener('resize', () => {
      setMaxHeight();
    });
  });
</script>