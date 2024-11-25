<?php if (get_field('style') !== 'Button' && get_field('style') !== 'Checks'): ?>
  <?php if (have_rows('services')) : ?>
    <div class="flex flex-wrap justify-center gap-base5-4 mb-base5-10 check-list-item-js">
      <?php while (have_rows('services')) : the_row(); ?>
        <?php
        $link = get_sub_field('link');
        $title = get_sub_field('service');
        ?>
        <div class="flex rounded-pill bg-primary-100 p-base5-3 relative check-list-item <?= !is_admin() ? 'opacity-0 scale-90' : ''; ?>">
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-base5-2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3627 18.9406L10.368 18.9459L8.95379 20.3602L2.08594 13.4923L3.50015 12.0781L8.94847 17.5264L21.4964 4.97852L22.9106 6.39273L10.3627 18.9406Z" fill="white" />
          </svg>
          <?php if ($link) :  ?>
            <a class="mb-0 text-white no-underline stretched-link text-h4-base" href="<?= $link['url']; ?>"><?= $link['title']; ?></a>
          <?php else:  ?>
            <p class="text-white text-h4-base"><?= $title; ?></p>
          <?php endif;  ?>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
<?php elseif (get_field('style') === 'Checks'):  ?>
  <?php if (have_rows('services')) : ?>
    <div class="flex flex-wrap justify-center gap-base5-4 mb-base5-10 check-list-item-js">
      <?php while (have_rows('services')) : the_row(); ?>
        <?php
        $link = get_sub_field('link');
        $title = get_sub_field('service');
        ?>
        <div class="flex items-center gap-base5-2 relative check-list-item <?= !is_admin() ? 'opacity-0 scale-90' : ''; ?>">
          <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M29.9697 15.1385L28.1243 13.293L18.0262 23.3911L13.6385 19.0034L11.793 20.8489L18.0284 27.0843L19.8739 25.2388L19.8717 25.2366L29.9697 15.1385Z" fill="#7E87E4" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M38.5 19.5C38.5 29.165 30.665 37 21 37C11.335 37 3.5 29.165 3.5 19.5C3.5 9.83502 11.335 2 21 2C30.665 2 38.5 9.83502 38.5 19.5ZM36 19.5C36 27.7843 29.2843 34.5 21 34.5C12.7157 34.5 6 27.7843 6 19.5C6 11.2157 12.7157 4.5 21 4.5C29.2843 4.5 36 11.2157 36 19.5Z" fill="#7E87E4" />
          </svg>
          <?php if ($link) :  ?>
            <a class="mb-0 text-white no-underline stretched-link text-h4-base" href="<?= $link['url']; ?>"><?= $link['title']; ?></a>
          <?php else:  ?>
            <p class="text-white text-h4-base"><?= $title; ?></p>
          <?php endif;  ?>
        </div>
      <?php endwhile; ?>
    </div>
    <a href="#" class="flex items-center justify-center no-underline text-referrals-blue-300 gap-base5-2 hover:text-referrals-blue-300">Explore all<svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#7E87E4"/>
</svg>
</a>
  <?php endif; ?>
<?php else:  ?>
  <?php if (have_rows('services')) : ?>
    <div class="flex flex-wrap justify-center gap-base5-4 mb-base5-10 check-list-item-js">
      <?php while (have_rows('services')) : the_row(); ?>
        <?php
        $link = get_sub_field('link');
        $title = get_sub_field('service');
        ?>
        <?php if ($link): ?>
          <div class="lg:inline-block flex w-full lg:w-[unset] check-list-item <?= !is_admin() ? 'opacity-0 scale-90' : ''; ?>">
            <a href="<?= $link['url']; ?>" class="ch-button button-secondary inverted target=" <?= $link['target'] ?>"><?= $link['title']; ?></a>
          </div>
        <?php else : ?>
          <div class="lg:inline-block flex w-full lg:w-[unset] check-list-item <?= !is_admin() ? 'opacity-0 scale-90' : ''; ?>">
            <a class="ch-button button-secondary inverted target="><?= $title; ?></a>
          </div>
        <?php endif ?>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
<?php endif; ?>