<?php

/**
 * FAQ Block Template.
 *
 */

$className = 'faq-block';
if (!empty($block['className'])) {
  $className .= ' ' . esc_attr($block['className']);
}

$columnCount = get_field('faq_column_count');
$faqItems = get_field('faq_items');
$faqButton = get_field('faq_button');

?>
<?php if ($faqButton) : ?>
  <div class="grid grid-cols-1 lg:grid-cols-[1fr_2fr] lg:gap-sp-16 gap-sp-8">
    <div>
      <h2>FAQs</h2>
      <a href="#" class="ch-button button-secondary">See all faqs</a>
    </div>
    <div>
    <?php endif; ?>
    <div class="<?= $className; ?> ">
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
                  <div class="flex items-center justify-between lg:mx-sp-5 toggle">
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
                $rows = count($faqItems);
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
              $last = end($faqItems);
              if ($last) {
                echo '</div><!-- END WRAPPER -->';
              }
            }
            ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    </div>
    <?php if ($faqButton) : ?>
  </div>
<?php endif; ?>