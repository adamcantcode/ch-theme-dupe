<div class="iop-overview-accordion">
  <div class="accordion">
    <div class="wrapper">
      <?php if (have_rows('accordion_items')) : while (have_rows('accordion_items')) : the_row();
          $title       = get_sub_field('title');
          $description = get_sub_field('description');
      ?>
          <div class="accordion-item-iop bg-white rounded-[6px] mb-sp-2 lg:mb-sp-4">
            <div class="flex justify-between cursor-pointer accordion-header-iop py-[11px] px-sp-6">
              <h3 class="mb-0"><?= $title; ?></h3>
              <div class="flex items-center ml-sp-5 toggle">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1 11.0001H22.9984V13.0001H1V11.0001Z" fill="white" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.999 23.0001V1.00171H12.999V23.0001H10.999Z" fill="white" class="vertical" />
                </svg>
              </div>
            </div>
            <div class="overflow-hidden transition-all duration-500 ease-in-out accordion-content max-h-0">
              <div class="px-base5-5 pb-base5-2">
                <?= $description; ?>
              </div>
            </div>
          </div>
      <?php endwhile;
      endif;
      ?>
    </div>
  </div>
</div>