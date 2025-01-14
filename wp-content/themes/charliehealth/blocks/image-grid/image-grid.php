<div class="grid grid-cols-2 lg:flex lg:gap-base5-10 gap-base5-4">
  <?php if (have_rows('images')) :
    while (have_rows('images')) : the_row(); ?>
    <?php 
    $imgUrl = get_sub_field('image')['sizes']['card-thumb'];
    $width = '';
    if(str_contains($imgUrl, 'bcbs') || (str_contains($imgUrl, 'anthem'))) {
      $width = 'width="80%"';
    }
    ?>
      <div class="relative transition-all flex-1 flex justify-center<?= get_sub_field('link') ? ' hover:opacity-70' : ''; ?>">
        <img src="<?= get_sub_field('image')['sizes']['card-thumb']; ?>" alt="<?= get_sub_field('image')['alt'] ?>" <?= $width; ?>>
        <?php if (get_sub_field('link')) : ?>
          <a href="<?= get_sub_field('link')['url']; ?>" target="<?= get_sub_field('link')['target']; ?>" class="stretched-link"></a>
        <?php endif; ?>
      </div>
  <?php endwhile;
  endif; ?>
</div>