<div class="grid grid-cols-2 lg:flex gap-base5-2">
  <?php if (have_rows('images')) :
    while (have_rows('images')) : the_row(); ?>
    <?php 
    $imgUrl = get_sub_field('image')['sizes']['card-thumb'];
    $width = '';
    if(strpos($imgUrl, 'bcbs') || (strpos($imgUrl, 'anthem'))) {
      $width = 'width="70%"';
    }
    ?>
      <div class="relative transition-all flex-1 flex justify-center<?= get_sub_field('link') ? ' hover:opacity-70' : ''; ?>">
        <img src="<?= get_sub_field('image')['sizes']['card-thumb']; ?>" alt="<?= get_sub_field('image')['alt'] ?>"<?= $width; ?>>
        <?php if (get_sub_field('link')) : ?>
          <a href="<?= get_sub_field('link')['url']; ?>" target="<?= get_sub_field('link')['target']; ?>" class="stretched-link"></a>
        <?php endif; ?>
      </div>
  <?php endwhile;
  endif; ?>
</div>