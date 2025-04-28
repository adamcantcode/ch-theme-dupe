<?php
// Retrieve ACF fields
$buttons = get_field('button_group_buttons');
$invert = get_field('button_group_invert');
$linkOne = get_field('button_group_link');
$linkTwo = get_field('button_group_link_two');
$blogId = get_current_blog_id();

// Centralized defaults per blog
$defaults = [
  1 => [
    'primary' => ['url' => '/form', 'label' => 'Get Started', 'target' => '_self'],
    'secondary' => ['url' => 'tel:+19862060414', 'label' => '1 (986) 206-0414', 'target' => '_self'],
  ],
  3 => [
    'primary' => ['url' => '/referral-form', 'label' => 'Refer now', 'target' => '_self'],
    'secondary' => ['url' => 'tel:+19862060414', 'label' => '1 (986) 206-0414', 'target' => '_self'],
  ],
  4 => [
    'primary' => ['url' => 'https://identity.app.charliehealth.com/u/login', 'label' => 'Register now', 'target' => '_self'],
    'secondary' => ['url' => 'tel:+9862042446', 'label' => '(640) 206-0799', 'target' => '_self'],
  ],
];

// Fetch primary button details with fallback
$primary = [
  'url' => $linkOne['url'] ?? $defaults[$blogId]['primary']['url'] ?? '#',
  'label' => $linkOne['title'] ?? $defaults[$blogId]['primary']['label'] ?? 'Primary',
  'target' => $linkOne['target'] ?? $defaults[$blogId]['primary']['target'] ?? '_self',
];

// Fetch secondary button details with fallback
$secondary = [
  'url' => $linkTwo['url'] ?? $defaults[$blogId]['secondary']['url'] ?? '',
  'label' => $linkTwo['title'] ?? $defaults[$blogId]['secondary']['label'] ?? '',
  'target' => $linkTwo['target'] ?? $defaults[$blogId]['secondary']['target'] ?? '_self',
];

// Determine alignment class
$alignClass = 'justify-start';
if (!empty($block['align'])) {
  $alignmentMap = ['left' => 'justify-start', 'center' => 'justify-center', 'right' => 'justify-end'];
  $alignClass = $alignmentMap[$block['align']] ?? 'justify-start';
}
if (isset($style) && $style === 'full') {
  $alignClass = 'justify-end';
}

// Determine button styling
$primaryClass = 'ch-button button-primary-ch' . ($invert ? ' inverted' : '');
$secondaryClass = 'ch-button button-secondary-ch' . ($invert ? ' inverted' : '');
?>

<?php if (in_array($blogId, [1, 3, 4], true) && $buttons !== 'none') : ?>
  <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full <?= esc_attr($alignClass); ?>">
    <?php if ($buttons === 'double') : ?>
      <?php if (!empty($primary['url'])) : ?>
        <a href="<?= esc_url($primary['url']); ?>" class="<?= esc_attr($primaryClass); ?>" target="<?= esc_attr($primary['target']); ?>">
          <?= esc_html($primary['label']); ?>
        </a>
      <?php endif; ?>
      <?php if (!empty($secondary['url'])) : ?>
        <a href="<?= esc_url($secondary['url']); ?>" class="<?= esc_attr($secondaryClass); ?>" target="<?= esc_attr($secondary['target']); ?>">
          <?= esc_html($secondary['label']); ?>
        </a>
      <?php endif; ?>
    <?php elseif ($buttons === 'primary') : ?>
      <?php if (!empty($primary['url'])) : ?>
        <a href="<?= esc_url($primary['url']); ?>" class="<?= esc_attr($primaryClass); ?>" target="<?= esc_attr($primary['target']); ?>">
          <?= esc_html($primary['label']); ?>
        </a>
      <?php endif; ?>
    <?php elseif ($buttons === 'secondary') : ?>
      <?php if (!empty($primary['url'])) : ?>
        <a href="<?= esc_url($primary['url']); ?>" class="<?= esc_attr($secondaryClass); ?>" target="<?= esc_attr($primary['target']); ?>">
          <?= esc_html($primary['label']); ?>
        </a>
      <?php endif; ?>
    <?php endif; ?>
  </div>
<?php endif; ?>