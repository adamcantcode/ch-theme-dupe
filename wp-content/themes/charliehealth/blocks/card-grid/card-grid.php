<?php
$style = get_field('style');
$numbers = get_field('card_grid_numbers');
$borderStyle = get_field('card_grid_border_style');
$horizontalScroll = get_field('card_grid_horizontal_scroll');
$posts = get_field('posts');

if ($horizontalScroll === true) {
  $scrollClasses = 'overflow-auto w-full max-w-[80rem]';
  $gridClasses = 'grid items-center grid-flow-col gap-3 lg:gap-6 lg:grid-cols-3';
  $borderClasses = 'grid items-center grid-flow-col gap-3 lg:gap-6 lg:grid-cols-3';
} else {
  $scrollClasses = '';
  $gridClasses = 'grid items-center grid-cols-1 gap-4 lg:gap-6 lg:grid-cols-3';
  $borderClasses = 'grid items-center grid-cols-1 gap-4 lg:gap-6 lg:grid-cols-3';
}

// var_dump(get_intermediate_image_sizes());
?>
<?php if ($style !== 'feed') : ?>
  <?php if (have_rows('card_grid_cards')) : ?>
    <div id="<?= $block['id']; ?>" class="<?= $scrollClasses; ?>">
      <div class="<?= $gridClasses; ?>">
        <?php while (have_rows('card_grid_cards')) : the_row();
          $title = get_sub_field('card_grid_title');
          $details = get_sub_field('card_grid_details');
          $image = get_sub_field('image');
          $link = get_sub_field('card_link');
        ?>
          <div class="w-[calc(100vw-2.5rem)] lg:w-full h-full<?= $link ? ' hover:shadow-lg duration-300 rounded-md' : ''; ?>">
            <div class="<?= $borderStyle === 'gradient' ? 'border-gradient' : ' border rounded-md'; ?> h-full">
              <?php if ($image) : ?>
                <img src="<?= $image['sizes']['card-thumb'] ?>" alt="<?= $image['aklt']; ?>" class="object-cover w-full rounded-t-md lg:h-[250px] h-[200px]">
              <?php endif; ?>
              <div class="p-sp-4 md:p-sp-6 lg:p-sp-8">
                <?php if ($numbers) : ?>
                  <h2 class="text-h2-lg mb-sp-5"><?= get_row_index(); ?></h2>
                <?php endif; ?>
                <?php if ($title) : ?>
                  <h3 class="mb-sp-5 last:mb-0">
                    <?php if ($link) : ?>
                      <a href="<?= $link['url']; ?>" class="stretched-link">
                      <?php endif; ?>
                      <?= $title; ?>
                      <?php if ($link) : ?>
                      </a>
                    <?php endif; ?>
                  </h3>
                <?php endif; ?>
                <?php if ($details) : ?>
                  <p class="last:mb-0"><?= $details; ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
<?php if ($style === 'feed') : ?>
  <div id="<?= $block['id']; ?>" class="<?= $scrollClasses; ?>">
    <div class="<?= $gridClasses; ?> card-wrapper relative lg:overflow-visible overflow-hidden transition-all duration-1000 lg:max-h-full max-h-[70vh]">
      <?php foreach ($posts as $post) : ?>
        <div class="w-[calc(100vw-2.5rem)] lg:w-full hover:-translate-y-sp-1 transition-transform duration-200 h-full">
          <div class="<?= $borderStyle === 'gradient' ? 'border-gradient' : ' border rounded-md'; ?> h-full">
            <div class="p-sp-4 md:p-sp-6 lg:p-sp-8">
              <?php if ($numbers) : ?>
                <h2 class="text-h2-lg mb-sp-5"><?= get_row_index(); ?></h2>
              <?php endif; ?>
              <h3 class="mb-sp-5 last:mb-0"><a href="<?= get_the_permalink($post); ?>" class="stretched-link"><?= get_the_title($post); ?></a></h3>
              <?php if (get_field('short_description', $post)) : ?>
                <p class="last:mb-0"><?= get_field('short_description', $post); ?></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="absolute bottom-0 flex justify-center w-full bg-white lg:noshow">
        <a role="button" class="z-10 ch-button button-secondary toggle-button">Show More</a>
      </div>
    </div>
  </div>
<?php endif; ?>