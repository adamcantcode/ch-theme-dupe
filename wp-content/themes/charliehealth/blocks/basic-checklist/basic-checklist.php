<div class="grid grid-cols-1 gap-base5-4 [&_*]:text-white">
  <?php if (have_rows('list')) : ?>
    <?php while (have_rows('list')) : the_row(); ?>
      <?php
      $headline = get_sub_field('headline');
      $subhead  = get_sub_field('subhead');
      ?>
      <div class="flex items-start gap-base5-4">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M29.4697 15.1385L27.6243 13.293L17.5262 23.3911L13.1385 19.0034L11.293 20.8489L17.5284 27.0843L19.3739 25.2388L19.3717 25.2366L29.4697 15.1385Z" fill="white" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M38 19.5C38 29.165 30.165 37 20.5 37C10.835 37 3 29.165 3 19.5C3 9.83502 10.835 2 20.5 2C30.165 2 38 9.83502 38 19.5ZM35.5 19.5C35.5 27.7843 28.7843 34.5 20.5 34.5C12.2157 34.5 5.5 27.7843 5.5 19.5C5.5 11.2157 12.2157 4.5 20.5 4.5C28.7843 4.5 35.5 11.2157 35.5 19.5Z" fill="white" />
        </svg>
        <div>
          <h3 class="mt-base5-1 mb-base5-1"><?= $headline; ?></h3>
          <?= $subhead; ?>
        </div>
      </div>
  <?php endwhile;
  endif;  ?>
</div>