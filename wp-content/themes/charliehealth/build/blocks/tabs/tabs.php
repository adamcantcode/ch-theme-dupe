<?php if (have_rows('tabs')) : ?>
  <div id="<?= $block['id']; ?>" class="mb-sp-6 last:mb-0">
    <div class="grid lg:grid-cols-[1fr_2fr] grid-cols-1">
      <div class="overflow-hidden lg:rounded-l-md lg:rounded-r-none rounded-t-md tab bg-lightest-purple">
        <?php while (have_rows('tabs')) : the_row();
          $title = get_sub_field('tab_title');
          $index = get_row_index();
          $active = $index == 1 ? 'active' : '';
          $rowCount = count(get_field('tabs'));
        ?>
          <div class="tabs <?= $active; ?>" data-tab="<?= $index; ?>">
            <h3 class="mb-0 pointer-events-none"><?= $title; ?></h3>
          </div>
          <?php if ($index < $rowCount) : ?>
            <div class="divider mx-sp-4"></div>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
      <div class="lg:rounded-r-md lg:rounded-l-none rounded-b-md tab-content bg-tag-gray">
        <?php while (have_rows('tabs')) : the_row();
          $content = get_sub_field('tab_content');
          $index = get_row_index();
          $active = $index == 1 ? 'active' : ''
        ?>
          <div class="tab-contents p-sp-4 <?= $active; ?>" data-tab-content="<?= $index; ?>"><?= $content; ?></div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
<?php else : ?>
  <div class="min-h-[300px] bg-tag-gray flex items-center justify-center">
    <code>TABS</code>
  </div>
<?php endif; ?>