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
    <div class="grid lg:block">
      <h2>FAQs for <?= get_the_title(); ?></h2>
      <a href="<?= site_url('/faqs'); ?>" class="ch-button button-secondary">See All FAQs</a>
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
              <div class="border-b-2 border-primary accordion-item mb-sp-6">
                <div class="flex items-center justify-between cursor-pointer accordion-header pb-sp-6">
                  <h3 class="mb-0"><?= $headline; ?></h3>
                  <span class="ml-sp-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M1 10.9999H22.9984V12.9999H1V10.9999Z" fill="#161A3D" />
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.999 22.9999V1.00146H12.999V22.9999H10.999Z" fill="#161A3D" class="vertical" />
                    </svg>
                  </span>
                </div>
                <div class="overflow-hidden transition-all duration-500 ease-in-out accordion-content max-h-0">
                  <div class="lg:pr-sp-14 pr-sp-6"><?= $content; ?></div>
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
      <?php if ($columnCount === 'one') : ?>
    </div>
  <?php endif; ?>
  <?php if ($columnCount === 'two') : ?>
  <?php endif; ?>
  <?php if ($faqButton && $columnCount === 'one') : ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($faqButton && $columnCount === 'two') : ?>
  </div>
  </div>
<?php endif; ?>