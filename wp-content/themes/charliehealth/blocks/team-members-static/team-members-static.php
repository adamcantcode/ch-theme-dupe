<div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16">
  <?php if (have_rows('team_member_contact_info')): ?>
    <div class="team-members">
      <?php while (have_rows('team_member_contact_info')): the_row();
        // Get subfields for each team member
        $name = get_sub_field('name');
        $title = get_sub_field('title');
        $email = get_sub_field('email');
        $phone = get_sub_field('phone');
        $headshot = get_sub_field('headshot'); ?>

        <div class="team-member">
          <?php if ($headshot): ?>
            <div class="headshot">
              <img src="<?php echo esc_url($headshot['url']); ?>" alt="<?php echo esc_attr($headshot['alt']); ?>">
            </div>
          <?php endif; ?>
          <h3 class="team-member-name"><?php echo esc_html($name); ?></h3>
          <p class="team-member-title"><?php echo esc_html($title); ?></p>
          <p class="team-member-email"><?php echo esc_html($email); ?></p>
          <p class="team-member-phone"><?php echo esc_html($phone); ?></p>
        </div>
        <div class="border-2 border-primary rounded-md justify-items-start gap-sp-1 p-base5-2 outreach-member-js<?= $director ? ' is-director-js' : ''; ?> hover:shadow-lg duration-300 noshow" data-state="<?= $state; ?>">
          <div class="cursor-pointer" data-modal-id="<?= $id; ?>">
            <img src="<?= $headshot['url'] ?? site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png'); ?>" alt="<?= $altText; ?>" class="w-full mx-auto rounded-circle mb-sp-4">
            <h4 id="repName" class="underline"><?= get_the_title($id); ?></h4>
          </div>
          <p class="mb-0"><?= $title; ?></p>
          <?php if ($phone) : ?>
            <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
              <p class="mb-0"><?= $phone; ?></p>
            </a>
          <?php endif; ?>
          <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
            <p class="mb-0"><?= $email; ?></p>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <p>No team members found.</p>
  <?php endif; ?>
</div>