<?php
$statOne = get_field('stat_one');
$statTwo = get_field('stat_two');
$detailsOne = get_field('details_one');
$detailsTwo = get_field('details_two');
?>

<div class="grid items-center grid-cols-1 gap-sp-14 md:gap-sp-4 md:grid-cols-2">
  <div class="md:max-w-[430px]">
    <InnerBlocks />
  </div>
  <div class="flex-grow">
    <div class="grid md:grid-cols-[1fr_2fr_2fr_1fr] gap-sp-5 items-end stats-block-grid-graph-container grid-cols-2">
      <div class="lg:block noshow"></div>
      <div class="text-center stats-block-grid-graph">
        <p class="text-white counter text-h1-base font-heading-serif"><?= $statOne; ?>%</p>
        <div class="flex flex-col items-center justify-center w-full graph bg-lavender-300 p-sp-4">
          <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-sp-3">
            <path d="M32.774 3.90091C32.5828 1.84563 30.879 0.218088 28.8111 0.108944C26.0498 -0.0363146 6.95065 -0.0363146 4.18702 0.108944C2.12147 0.218088 0.417706 1.84563 0.225654 3.90252C-0.66368 13.5554 1.07833 21.0045 5.40547 26.0412C10.0585 31.4599 16.0042 31.9647 16.3508 31.9896L16.4807 32L16.6401 31.9928C16.8592 31.9775 21.4007 31.6252 25.6633 27.9729L25.9438 27.7273C26.5295 27.2025 27.0802 26.6395 27.5926 26.042C31.9221 21.0101 33.6642 13.5626 32.774 3.90091ZM2.32308 10.1117C2.25768 8.11141 2.3205 6.10895 2.51115 4.11679C2.55746 3.64902 2.7785 3.21643 3.12954 2.90657L14.5036 10.6791L9.01939 14.451L2.32308 10.1117ZM6.9626 15.8659L3.64433 18.1475C3.10998 16.474 2.74135 14.7514 2.54382 13.0048L6.9626 15.8659ZM16.5461 12.0739L21.9219 15.7471L16.456 19.2606L11.1168 15.8049L16.5461 12.0739ZM18.5837 10.6735L29.8741 2.90898C30.2226 3.21774 30.4424 3.64773 30.4893 4.11278C30.6812 6.1062 30.7451 8.11001 30.6806 10.1117L24.0305 14.39L18.5837 10.6735ZM30.4574 13.0008C30.2632 14.717 29.9045 16.4102 29.3864 18.0568L26.0937 15.8097L30.4574 13.0008ZM26.5973 2.36406L16.5421 9.27788L6.42151 2.36326C8.81618 2.32715 12.6572 2.30869 16.499 2.30869C20.3409 2.30869 24.2034 2.32715 26.5973 2.36406ZM4.50179 20.3569L9.05923 17.227L14.3275 20.6369L7.5539 24.9947C7.41524 24.8454 7.27737 24.6921 7.14111 24.5332C6.06916 23.2742 5.18049 21.868 4.50179 20.3569ZM16.5182 29.6847H16.5118C16.3341 29.6727 12.8174 29.399 9.29989 26.6102L16.452 22.0093L23.6384 26.664C20.2612 29.3099 16.9023 29.6534 16.5182 29.6847ZM25.8594 24.5316C25.7058 24.7109 25.551 24.8834 25.3948 25.0493L18.5805 20.6353L23.9867 17.1596L28.5385 20.2694C27.8542 21.8128 26.9518 23.2484 25.8594 24.5316Z" fill="#161A3D" />
          </svg>
          <p class="text-center"><?= $detailsOne; ?></p>
        </div>
      </div>
      <div class="text-center stats-block-grid-graph">
        <p class="text-white counter text-h1-base font-heading-serif"><?= $statTwo; ?>%</p>
        <div class="flex flex-col items-center justify-center w-full graph bg-lavender-100 p-sp-4">
          <p class="text-center"><?= $detailsTwo; ?></p>
        </div>
      </div>
      <div class="lg:block noshow"></div>
    </div>
  </div>
</div>