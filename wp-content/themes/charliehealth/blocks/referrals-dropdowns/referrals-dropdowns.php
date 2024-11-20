<?php
$heading = get_field('heading');
$highlight = get_field('heading_highlight');
$details = get_field('details');
?>

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
          <div class="accordion-item-iop rounded-[6px] mb-sp-2 lg:mb-sp-4 border border-white [&_*]:text-white">
            <div class="flex justify-between cursor-pointer accordion-header-iop py-base5-5 px-sp-6">
              <h3 class="mb-0 font-heading-serif"><?= $title; ?></h3>
              <div class="flex items-center ml-sp-5 toggle">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1 11.0001H22.9984V13.0001H1V11.0001Z" fill="white" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.999 23.0001V1.00171H12.999V23.0001H10.999Z" fill="white" class="vertical" />
                </svg>
              </div>
            </div>
            <div class="overflow-hidden transition-all duration-500 ease-in-out accordion-content max-h-0">
              <div class="px-base5-5 pb-base5-5">
                <?= $description; ?>
                <?php if ($link) : ?>
                  <p>
                    <a href="<?= $link['url']; ?>" class="no-underline !text-referrals-blue-300">Learn More</a>
                  </p>
                <?php endif; ?>
              </div>
            </div>
          </div>
      <?php endwhile;
      endif;
      ?>
    </div>
  </div>
</div>