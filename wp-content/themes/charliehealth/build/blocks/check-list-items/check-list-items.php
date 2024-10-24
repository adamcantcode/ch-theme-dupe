<?php if (get_field('style') !== 'Button'): ?>
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