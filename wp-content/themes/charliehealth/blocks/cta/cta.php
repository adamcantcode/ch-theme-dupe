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
/** Default Background */
if ($style === 'value') {
  $background = 'bg-cream';
} elseif ($style === 'full') {
  $background = 'bg-lightest-purple';
} elseif ($style === 'newsletter') {
  $background = 'bg-cream';
} elseif ($style === 'large') {
  $background = '';
} else {
  $background = 'bg-cream';
}
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
}
$blockClasses .= $background . ' ';
?>

<?php if ($style === 'value') : ?>
  <div class="flex justify-center rounded-sm lg:p-sp-14 p-sp-6 mb-sp-6 <?= $blockClasses; ?>">
    <div class="flex flex-col items-center justify-center text-center max-w-[640px]">
      <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
      <p class="text-h2-base"><?= $heading; ?></p>
      <p class="mb-base5-6"><?= $subhead; ?></p>
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'value_image') : ?>
  <div class="grid gap-sp-5 grid-cols-1 lg:grid-cols-[4fr_8fr]">
    <img src="<?= get_field('image')['url']; ?>" alt="<?= get_field('image')['alt']; ?>" class="order-2 lg:order-1">
    <div class="flex justify-center rounded-sm lg:p-sp-14 p-sp-6 mb-sp-6 order-1 lg:order-2 <?= $blockClasses; ?>">
      <div class="flex flex-col items-center justify-center text-center">
        <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
        <p class="text-darkest-blue lg:text-[2.5rem] text-h2-lg lg:leading-tight mb-sp-5 font-heading-serif"><?= $heading; ?></p>
        <p class="text-darkest-blue"><?= $subhead; ?></p>
        <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'large') : ?>
  <div class="rounded-sm <?= $blockClasses; ?>">
    <p class="text-white lg:text-h1-lg text-h2-lg lg:mb-sp-16 mb-sp-12 font-heading-serif max-w-[850px]"><?= $heading; ?></p>
    <?php if ($subhead) : ?>
      <p class="text-white"><?= $subhead; ?></p>
    <?php endif; ?>
    <div class="flex justify-between">
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
      <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] lg:block noshow">
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'full') : ?>
  <div class="lg:grid lg:grid-cols-2 justify-between rounded-md lg:p-sp-6 p-sp-4 items-center gap-sp-8 flex flex-col lg:flex-row <?= $blockClasses; ?>">
    <div>
      <p class="text-h2 font-heading"><?= $heading; ?></p>
      <?php if ($subhead) : ?>
        <p class="mb-0 mt-sp-4"><?= $subhead; ?></p>
      <?php endif; ?>
    </div>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
<?php endif; ?>
<?php if ($style === 'newsletter') : ?>
  <div class="grid lg:grid-cols-[1.25fr_2fr] rounded-md p-sp-6 gap-base5-4 <?= $blockClasses; ?>">
    <div>
      <h2 class="font-heading"><?= $heading; ?></h2>
    </div>
    <div>
      <?php if ($subhead) : ?>
        <p class="noshow lg:block"><?= $subhead; ?></p>
      <?php endif; ?>
      <div id="newsletterInContent" class="newsletter-revamp">
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/newsletter_blog_revamp"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/newsletter_blog_revamp" title="Online Form">Online Form - Newsletter - Blog Revamp</a></noscript>
        <script>
          var container = document.currentScript.parentNode; // Newsletter container
          var elementToCut = container.querySelector("#fsSubmitButton5194985"); // Submit button
          var destinationElement = container.querySelector("#fsCell140490700"); // Email container
          var newsletterID = container.id; // Newlsetter identifier
          var newsletterLPField = container.querySelector('#field142799721'); // LP URL field
          var newsletterIDField = container.querySelector('#field146376375'); // Type field

          if (elementToCut && destinationElement) {
            var clonedElement = elementToCut.cloneNode(true);
            elementToCut.parentNode.removeChild(elementToCut);
            destinationElement.appendChild(clonedElement);
          }

          newsletterIDField.value = newsletterID;
          newsletterLPField.value = window.location.href;
        </script>
      </div>
      <h5>You can unsubscribe anytime.</h5>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'dbt') : ?>
  <div class="grid lg:grid-cols-[1fr_2fr] rounded-md p-sp-6 lg:gap-sp-8 <?= $blockClasses; ?>">
    <div>
      <h2 class="mb-0"><?= $heading; ?></h2>
    </div>
    <div>
      <?php if ($subhead) : ?>
        <p class="noshow lg:block"><?= $subhead; ?></p>
      <?php endif; ?>
      <div id="newsletterInContent" class="newsletter-revamp">
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/dbt_skills_book"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/dbt_skills_book" title="Online Form">Online Form - DBT [gated]</a></noscript>
        <script>
          var containerDBT = document.currentScript.parentNode; // DBT Guide container
          var elementToCutDBT = containerDBT.querySelector("#fsSubmitButton5462843"); // Submit button
          var destinationElementDBT = containerDBT.querySelector("#fsCell152041959"); // Email container
          var newsletterIDDBT = containerDBT.id; // DBT Guide identifier
          var newsletterLPFieldDBT = containerDBT.querySelector('#field152041960'); // LP URL field
          var newsletterIDFieldDBT = containerDBT.querySelector('#field152041961'); // Type field

          if (elementToCutDBT && destinationElementDBT) {
            var clonedElementDBT = elementToCutDBT.cloneNode(true);
            elementToCutDBT.parentNode.removeChild(elementToCutDBT);
            destinationElementDBT.appendChild(clonedElementDBT);
          }

          newsletterIDFieldDBT.value = newsletterIDDBT;
          newsletterLPFieldDBT.value = window.location.href;
        </script>
      </div>
      <h6>By entering your email you agree to receive marketing communications from Charlie Health. You can unsubscribe anytime.</h6>
    </div>
  </div>
<?php endif; ?>
<?php if ($style === 'sad') : ?>
  <div class="grid lg:grid-cols-[1fr_2fr] rounded-md p-sp-6 lg:gap-sp-8 <?= $blockClasses; ?>">
    <div>
      <h2 class="mb-0"><?= $heading; ?></h2>
    </div>
    <div>
      <?php if ($subhead) : ?>
        <p class="noshow lg:block"><?= $subhead; ?></p>
      <?php endif; ?>
      <div id="newsletterInContent" class="newsletter-revamp">
        <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/dbt_skills_book_copy"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/dbt_skills_book_copy" title="Online Form">Online Form - DBT [gated] - COPY</a></noscript>
        <script>
          var containerSAD = document.currentScript.parentNode; // DBT Guide container
          var elementToCutDBT = containerSAD.querySelector("#fsSubmitButton5552306"); // Submit button
          var destinationElementDBT = containerSAD.querySelector("#fsCell155914871"); // Email container
          var newsletterIDDBT = containerSAD.id; // DBT Guide identifier
          var newsletterLPFieldDBT = containerSAD.querySelector('#field155914872'); // LP URL field
          var newsletterIDFieldDBT = containerSAD.querySelector('#field155914873'); // Type field

          if (elementToCutDBT && destinationElementDBT) {
            var clonedElementDBT = elementToCutDBT.cloneNode(true);
            elementToCutDBT.parentNode.removeChild(elementToCutDBT);
            destinationElementDBT.appendChild(clonedElementDBT);
          }

          newsletterIDFieldDBT.value = newsletterIDDBT;
          newsletterLPFieldDBT.value = window.location.href;
        </script>
      </div>
      <h6>By entering your email you agree to receive marketing communications from Charlie Health. You can unsubscribe anytime.</h6>
    </div>
  </div>
<?php endif; ?>