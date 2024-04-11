<div class="grid grid-cols-1 gap-sp-5 lg:grid-cols-4">
  <h2 class="self-center text-white">Our values</h2>
  <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  <?php if (have_rows('value_block')) : while (have_rows('value_block')) : the_row(); ?>
      <?php
      switch (get_row_index()) {
        case 1:
          $bg = 'bg-lavender-300';
          break;
        case 2:
          $bg = 'bg-pale-blue-200';
          break;
        case 3:
          $bg = 'bg-yellow-300';
          break;
        default:
          $bg = 'bg-lavender-300';
          break;
      }
      ?>
      <div class="<?= $bg; ?> rounded-[6px] p-sp-5 flex flex-col">
        <h3 class="text-h2-base font-heading"><?= get_sub_field('headline') ?></h3>
        <div>
          <?= get_sub_field('details'); ?>
        </div>
      </div>
  <?php endwhile;
  endif ?>
</div>