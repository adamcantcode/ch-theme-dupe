<?php
get_header();

$name   = get_the_title();
$title  = get_field('title');
$creds  = get_field('certifications');
$creds  = is_array($creds) ? implode(', ', $creds) : '';
$states = get_field('states');
$states = is_array($states) ? implode(', ', array_column($states, 'label')) : '';
$bio    = get_field('author_page_bio');
$image  = get_field('headshot');

if ($image) {
  $imageAlt = $image['alt'];
  $image = $image['sizes']['card-thumb'];
} else {
  $imageAlt = 'Charlie Health Logo';
  $image = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
}
?>

<section class="section">
  <div class="container">
    <div class="inline-block mb-base5-4">
      <!-- <h4><a href="/clinical-content-advisory-council" class="underline">Clinical Content Advisory Council</a></h4> -->
      <h2 class="text-h1-base font-heading">Charlie Health Care Team</h2>
    </div>
    <div class="grid lg:grid-cols-[3fr_9fr] gap-base5-8 mb-base5-8 mt-base5-10">
      <div>
        <img src="<?= $image; ?>" alt="<?= $imageAlt; ?>" class="object-cover w-full rounded-circle aspect-square">
      </div>
      <div>
        <h1 class="text-h2-base font-heading-serif"><?= $name; ?> (<?= $creds; ?>) <span class="text-h4-base"><?= $pronouns; ?></span></h1>
        <h3><?= $title; ?></h3>
        <h5>Licensed in in: <?= $states; ?></h5>
        <div>
          <?= $bio; ?>
        </div>
      </div>
    </div>
    <?php if ($expertise) : ?>
      <div class="rounded-md bg-grey-cool p-base5-4 lg:p-[80px]">
        <h3><?= $name; ?>'s clinical areas of expertise</h3>
        <?php $expertise = explode(",", $expertise);  ?>
        <div class="flex flex-wrap justify-start gap-base5-4">
          <?php foreach ($expertise as $item) : ?>
            <div class="flex bg-white rounded-pill p-base5-3 check-list-item">
              <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-base5-2">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3627 18.9406L10.368 18.9459L8.95379 20.3602L2.08594 13.4923L3.50015 12.0781L8.94847 17.5264L21.4964 4.97852L22.9106 6.39273L10.3627 18.9406Z" fill="#161a3d"></path>
              </svg>
              <p class="text-primary text-h4-base"><?= ucfirst(trim($item)); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<section class="section bg-grey-cool">
  <div class="container">
    <div>
      <div class="grid lg:grid-cols-[4fr_8fr] gap-x-base5-4 gap-y-base5-6">
        <div>
          <h4>Charlie Health locations</h4>
          <h2>View more locations with this Care Team member</h2>
          <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
            <a href="/locations" class="ch-button button-secondary-ch">All locations</a>
          </div>
        </div>
        <div>
          <ul>
            <?php
            $states = get_field('states');

            if ($states) {
              foreach ($states as $state) : ?>
                <li>
                  <a href="/locations/<?= esc_attr(strtolower($state['label'])); ?>">
                    <?= esc_html($state['label']); ?>
                  </a>
                </li>
            <?php endforeach;
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
