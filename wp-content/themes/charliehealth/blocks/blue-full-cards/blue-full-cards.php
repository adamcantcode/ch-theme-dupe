<div class="grid grid-cols-1 lg:grid-cols-3 gap-base5-4">
  <?php if (have_rows('cards')) : ?>
    <?php while (have_rows('cards')) : the_row(); ?>
      <?php
      $headline = get_sub_field('headline');
      $link = get_sub_field('link');
      $subhead = get_sub_field('subhead');
      ?>
      <div class="hover:bg-primary-black-blue bg-primary-100 [&_*]:text-white [&_*]:hover:text-white rounded-md relative transition-all hover:-translate-y-base5-1">
        <div class="flex flex-col h-full p-base5-4">
          <?php if ($link) : ?>
            <h3><a href="<?= $link['url'] ?>" class="stretched-link"><?= $link['title'] ?></a></h3>
          <?php else : ?>
            <h3><?= $headline; ?></h3>
          <?php endif; ?>
          <?php if ($subhead) : ?>
            <p><?= $subhead; ?></p>
          <?php endif; ?>
          <?php if ($link) : ?>
            <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-auto ml-auto">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30093 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928057 9.95262 -0.0928057 10.3431 0.278417Z" fill="white" />
            </svg>
          <?php endif; ?>
        </div>
      </div>
  <?php endwhile;
  endif;  ?>
</div>