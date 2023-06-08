<?php
$heading = get_field('heading');
$subhead = get_field('subhead');
$link = get_field('link');
$style = get_field('style');

if (empty($link)) {
  $link = [
    'url' => site_url('/form'),
    'title' => 'Get started',
    'target' => '_blank',
  ];
}

// For BG color
$blockClasses = '';
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
  $blockClasses .= $background . ' ';
} ?>

<?php if ($style === 'value') : ?>
  <div class="flex justify-center rounded-sm lg:p-sp-14 p-sp-6 mb-sp-6 <?= $blockClasses; ?>">
    <div class="flex flex-col items-center justify-center text-center max-w-[37.5rem]">
      <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
      <h2 class="text-darkest-blue lg:text-[2.5rem] text-h2-lg lg:leading-tight mb-sp-5 font-heading-serif"><?= $heading; ?></h2>
      <p class="text-darkest-blue"><?= $subhead; ?></p>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'full') : ?>
  <div class="grid lg:grid-flow-col justify-between rounded-md p-sp-6 items-center gap-sp-8 <?= $blockClasses; ?>">
    <div>
      <h2 class="lg:mb-0"><?= $heading; ?></h2>
      <?php if ($subhead) : ?>
        <p class="mb-0 mt-sp-4"><?= $subhead; ?></p>
      <?php endif; ?>
    </div>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
<?php endif; ?>
<?php if ($style === 'newsletter') : ?>
  <div class="grid lg:grid-cols-[1fr_2fr] rounded-md p-sp-6 lg:gap-sp-8 <?= $blockClasses; ?>">
    <div>
      <h2 class="mb-0"><?= $heading; ?></h2>
    </div>
    <div>
      <?php if ($subhead) : ?>
        <p class="mb-0 noshow lg:block"><?= $subhead; ?></p>
      <?php endif; ?>
      <div class="newsletter-revamp">
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/newsletter_blog_revamp"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/newsletter_blog_revamp" title="Online Form">Online Form - Newsletter - Blog Revamp</a></noscript>
        <script>
          var container = document.currentScript.parentNode;
          var elementToCut = container.querySelector("#fsSubmitButton5194985");
          var destinationElement = container.querySelector("#fsCell140490700");

          if (elementToCut && destinationElement) {
            var clonedElement = elementToCut.cloneNode(true);
            elementToCut.parentNode.removeChild(elementToCut);
            destinationElement.appendChild(clonedElement);
          }
        </script>
      </div>
      <h5>You can unsubscribe anytime.</h5>
    </div>
  </div>
<?php endif; ?>