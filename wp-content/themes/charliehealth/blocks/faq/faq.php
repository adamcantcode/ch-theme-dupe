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
  <div class="accordion<?= $columnCount !== 'one' ? ' lg:grid lg:grid-cols-2 lg:gap-sp-14' : '';  ?>">
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
              <div class="flex items-center ml-auto lg:mr-sp-5 toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="none" viewBox="8 8 8 8" height="12px" width="12px">
                  <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </div>
            </div>
            <div class="overflow-hidden transition-all duration-500 ease-in-out accordion-content max-h-0">
              <div class="py-sp-5 lg:pr-sp-14 pr-sp-6"><?= $content; ?></div>
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