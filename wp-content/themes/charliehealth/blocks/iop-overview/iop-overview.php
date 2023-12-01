<?php
$heading = get_field('heading');
$highlight = get_field('heading_highlight');
$details = get_field('details');
?>

<div class="grid grid-cols-[4fr_1fr_7fr] gap-x-sp-5 iop-overview">
  <div>
    <h2 class="font-heading-serif"><?= $heading; ?> <span class="rounded-md bg-primary-100 px-sp-4 pt-sp-2"><?= $highlight; ?></span></h2>
    <?= $details; ?>
  </div>
  <div></div>
  <div>
    <div class="iop-overview-accordion">
      <div class="accordion">
        <div class="wrapper">
          <?php
          if (have_rows('accordion_items')) : while (have_rows('accordion_items')) : the_row(); ?>
              <?php
              $title = get_sub_field('title');
              $description = get_sub_field('description');
              $link = get_sub_field('link');
              ?>
              <div class="accordion-item-iop bg-primary-100 rounded-[6px] mb-sp-4">
                <div class="flex justify-between cursor-pointer accordion-header-iop py-sp-6 px-sp-6">
                  <h3 class="mb-0"><?= $title; ?></h3>
                  <div class="flex items-center ml-sp-5 toggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M1 11.0001H22.9984V13.0001H1V11.0001Z" fill="white" />
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.999 23.0001V1.00171H12.999V23.0001H10.999Z" fill="white" class="vertical" />
                    </svg>
                  </div>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out accordion-content max-h-0">
                  <div class="px-sp-6">
                    <?= $description; ?>
                    <p>
                      <a href="<?= $link['url']; ?>" class="no-underline">Learn More<span class="inline-block align-middle ml-sp-2">
                          <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="white" />
                          </svg>
                        </span></a>
                    </p>
                  </div>
                </div>
              </div>
          <?php endwhile;
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>