<?php if (have_rows('team_member_contact_info')): ?>
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16">
    <?php while (have_rows('team_member_contact_info')): the_row();
      $name     = get_sub_field('name');
      $title    = get_sub_field('title');
      $email    = get_sub_field('email');
      $phone    = get_sub_field('phone');
      $headshot = get_sub_field('headshot'); ?>
      <div class="border-2 rounded-md border-primary justify-items-start gap-sp-1 p-base5-3">
        <div>
          <img src="<?= $headshot['url'] ?? site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png'); ?>" alt="<?= $headshot['alt']; ?>" class="w-full mx-auto rounded-circle mb-sp-4">
          <h4 id="repName"><?= $name; ?></h4>
        </div>
        <p class="mb-0"><?= $title; ?></p>
        <?php if ($phone) : ?>
          <a href="tel:+<?= $phone; ?>" class="block no-underline break-all">
            <p class="mb-0 underline"><?= $phone; ?></p>
          </a>
        <?php endif; ?>
        <a href="mailto:<?= $email; ?>" class="block no-underline break-all">
          <p class="mb-0 underline"><?= $email; ?></p>
        </a>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>