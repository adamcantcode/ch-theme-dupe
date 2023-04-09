<div>
  <h3>Jump to:</h3>
</div>
<div class="flex overflow-auto gap-sp-5 no-scrollbar">
  <?php if (have_rows('jump_buttons')) : ?>
    <?php while (have_rows('jump_buttons')) : the_row(); 
    $label = get_sub_field('label');
    $sectionID  = get_sub_field('section_id');
    ?>
      <a href="#<?= $sectionID; ?>" class="ch-button button-secondary whitespace-nowrap"><?= $label; ?></a>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
<div class="h-[1px] bg-gradient-to-r from-purple-gradient-start to-purple-gradient-end mt-sp-16"></div>