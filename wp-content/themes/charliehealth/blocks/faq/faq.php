<?php

/**
 * FAQ Block Template.
 *
 */

// Support custom "anchor" values.
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'faq-block';
if (!empty($block['className'])) {
  $className .= ' ' . esc_attr($block['className']);
}
if (!empty($block['align'])) {
  $className .= ' align' . esc_attr($block['align']);
}

$columnCount = get_field('faq_column_count');

?>
<div <?= $anchor ?: ''; ?>class="<?= $className; ?> ">
  <div class="accordion<?= $columnCount !== 'one' ? ' grid grid-cols-2' : '';  ?>">
    <div class="wrapper">
      <?php if (have_rows('faq_items')) : ?>
        <?php while (have_rows('faq_items')) : the_row(); ?>
          <?php
          $headline = get_sub_field('faq_headline');
          $content = get_sub_field('faq_content');
          ?>
          <div class="border-b accordion-item border-b-card-border">
            <div class="flex cursor-pointer accordion-header py-sp-5">
              <h3 class="mb-0"><?= $headline; ?></h3>
              <div class="ml-auto toggle">x</div>
            </div>
            <div class="overflow-hidden transition-all duration-500 ease-in-out accordion-content max-h-0">
              <div class="py-sp-5 pr-sp-14"><?= $content; ?></div>
            </div>
          </div>
          <?php
          if ($columnCount !== 'one') {
            $rows = count(get_field('faq_items'));
            $middle = ceil($rows / 2);
            if (get_row_index() == $middle) {
              echo '</div><!-- END WRAPPER -->';
              echo '<div class="wrapper"><!-- OPEN WRAPPER -->';
            }
          }
          ?>
        <?php endwhile; ?>
        <?php
        if ($columnCount !== 'one') {
          $last = end(get_field('faq_items'));
          if ($last) {
            echo '</div><!-- END WRAPPER -->';
          }
        }
        ?>
      <?php endif; ?>
    </div>
  </div>
</div>