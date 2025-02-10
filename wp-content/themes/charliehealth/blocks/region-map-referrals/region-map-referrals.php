<?php switch_to_blog(1); ?>
<?php if (!is_admin()) : ?>
  <div id="map"></div>
  <script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map-referrals/mapdata.js'); ?>"></script>
  <script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map-referrals/usmap.js'); ?>"></script>
  <div id="outreachReps" class="my-base5-10">
    <div id="repsContent" class="noshow mb-base5-10">
      <h2></h2>
    </div>
    <div id="repsForm" class="noshow">
      <h4 class="mb-0">Submit your email to be notified when someone becomes available.</h4>
      <script type="text/javascript" src="https://form.jotform.com/jsform/241994594430061"></script>
    </div>
    <div id="outreachRepsList" class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16">
      <?php
      $args = array(
        'post_type'      => 'outreach-team-member',
        'numberposts'    => -1,
        'posts_per_page' => -1,
        'order'          => 'ASC',
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) :
        while ($query->have_posts()) :
          $query->the_post();
          $id = get_the_ID();
          $title = get_field('title', $id);
          $state = get_field('state', $id);
          if (!is_array($state)) {
            $state = [$state]; // Convert to array if it's a string or not an array
          }
          $state = implode(' ', $state);
          $phone = get_field('phone', $id);
          $email = get_field('email', $id);
          $headshot = get_field('headshot', $id);
          $director = get_field('is_director', $id);
          if ($headshot) {
            $altText = $headshot['alt'];
          } else {
            $altText = 'Headshot of ' . get_the_title($id);
          } ?>
          <div class="border-2 border-primary rounded-md justify-items-start gap-sp-1 p-base5-2 outreach-member-js<?= $director ? ' is-director-js' : ''; ?> hover:shadow-lg duration-300 noshow" data-state="<?= $state; ?>">
            <div data-modal-id="<?= $id; ?>">
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
      <?php
        endwhile;
        wp_reset_postdata();
      endif; ?>
    </div>
  </div>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Order all
      const list = document.getElementById('outreachRepsList');
      const allMembers = Array.from(list.getElementsByClassName('outreach-member-js'));
      const regionalDirectors = list.querySelectorAll('.outreach-member-js.is-director-js');

      const getLastName = (element) => {
        const repName = element.querySelector('#repName').textContent;
        const nameParts = repName.split(' ');
        return nameParts[nameParts.length - 1];
      };

      allMembers.sort((a, b) => {
        const lastNameA = getLastName(a).toLowerCase();
        const lastNameB = getLastName(b).toLowerCase();
        if (lastNameA < lastNameB) return -1;
        if (lastNameA > lastNameB) return 1;
        return 0;
      });

      allMembers.forEach(element => list.appendChild(element));

      // Cut/paste RDs to top so they are always listed first
      regionalDirectors.forEach(element => {
        list.insertBefore(element, list.firstChild);
      });

      simplemaps_usmap.hooks.click_state = id => {
        const selected = simplemaps_usmap_mapdata.state_specific[id].name;
        const outreachMembers = document.querySelectorAll('.outreach-member-js');
        const repsContent = document.querySelector('#repsContent');
        const repsForm = document.querySelector('#repsForm');
        const targetElement = document.getElementById('outreachReps');
        const yOffset = -200;
        const yPosition = targetElement.getBoundingClientRect().top + window.pageYOffset + yOffset;
        let hasVisibleMembers = false;

        outreachMembers.forEach(member => {
          const state = member.getAttribute('data-state');

          // Hide all
          member.classList.add('noshow');

          if (state && state.includes(selected)) {
            // Show if selected
            repsContent.classList.remove('noshow');
            repsForm.classList.add('noshow');
            repsContent.querySelector('h2').textContent = `${selected} Outreach Representatives`;
            member.classList.remove('noshow');

            hasVisibleMembers = true;
          }
        });

        // If none, display text and form
        if (!hasVisibleMembers) {
          repsContent.querySelector('h2').textContent = `There are currently no representatives in ${selected}`;
          repsForm.classList.remove('noshow');
        }

        window.scrollTo({
          top: yPosition,
          behavior: 'smooth'
        });
      };
    });
  </script>
<?php else : ?>
  <div class="w-full h-[66vh] flex items-center justify-center bg-grey-deactivated">
    <p class="text-center text-white">MAP NOT VISIBLE IN EDITOR</p>
  </div>
<?php endif; ?>
<?php restore_current_blog(); ?>