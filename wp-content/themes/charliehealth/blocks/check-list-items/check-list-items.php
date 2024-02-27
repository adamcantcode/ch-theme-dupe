<?php if (have_rows('services')) : ?>
  <div class="flex flex-wrap gap-base5-4 mb-base5-10">
    <?php while (have_rows('services')) : the_row(); ?>
      <div class="flex rounded-pill bg-primary-100 p-base5-3">
        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-base5-2">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3627 18.9406L10.368 18.9459L8.95379 20.3602L2.08594 13.4923L3.50015 12.0781L8.94847 17.5264L21.4964 4.97852L22.9106 6.39273L10.3627 18.9406Z" fill="white" />
        </svg>
        <p class="text-white text-h4-base"><?= get_sub_field('service'); ?></p>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>