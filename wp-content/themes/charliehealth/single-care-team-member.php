<?php
get_header();

$name    = get_the_title();
$title   = get_field('title');
$creds   = get_field('certifications');
$states  = get_field('states');
$bio     = get_field('bio');
$image   = get_field('headshot');

// Process certifications
$creds = is_array($creds) ? implode(', ', $creds) : '';

// Process states
$state_links = '';
if (is_array($states)) {
  $state_links = implode(', ', array_column($states, 'label'));
}

// Process image
$imageUrl = $image['sizes']['card-thumb'] ?? site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
$imageAlt = $image['alt'] ?? 'Charlie Health Logo';
?>

<section class="section">
  <div class="container">
    <div class="inline-block mb-base5-4">
      <h2 class="text-h1-base font-heading">Charlie Health Care Team</h2>
    </div>
    <div class="grid lg:grid-cols-[3fr_9fr] gap-base5-8 mb-base5-8 mt-base5-10">
      <div>
        <img src="<?= esc_url($imageUrl); ?>" alt="<?= esc_attr($imageAlt); ?>" class="object-cover w-full rounded-circle aspect-square">
      </div>
      <div>
        <h1 class="text-h2-base font-heading-serif">
          <?= esc_html($name); ?>, <?= esc_html($creds); ?>
        </h1>
        <h3><?= esc_html($title); ?></h3>
        <div><?= $bio; ?></div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-grey-cool">
  <div class="container">
    <div class="grid lg:grid-cols-[4fr_8fr] gap-x-base5-4 gap-y-base5-6">
      <div>
        <h4>Charlie Health Locations</h4>
        <h2>View More Locations with This Care Team Member</h2>
        <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
          <a href="/locations" class="ch-button button-secondary-ch">All Locations</a>
        </div>
      </div>
      <div>
        <h4><?= $name; ?> is licensed in the following states:</h4>
        <ul>
          <?php if (!empty($states)) : ?>
            <?php foreach ($states as $state) : ?>
              <li>
                <a href="/locations/<?= esc_attr(strtolower($state['label'])); ?>">
                  <?= sanitize_title($state['label']); ?>
                </a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>