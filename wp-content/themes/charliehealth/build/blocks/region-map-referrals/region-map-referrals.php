<?php switch_to_blog(1); ?>

<div id="map"></div>
<script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map/mapdata.js'); ?>"></script>
<script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map/usmap.js'); ?>"></script>
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
        <div class="border-2 border-[#EFEFFD] rounded-md justify-items-start gap-sp-1 p-base5-2 outreach-member-js<?= $director ? ' is-director-js' : ''; ?> hover:shadow-lg duration-300 noshow" data-state="<?= $state; ?>">
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
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo 'No posts found.';
    endif; ?>
  </div>
</div>
<?php
$modalQuery = new WP_Query($args);

if ($modalQuery->have_posts()) : while ($modalQuery->have_posts()) : $modalQuery->the_post();
    $id       = get_the_ID();
    $title    = get_field('title', $id);
    $state    = get_field('state', $id);
    $phone    = get_field('phone', $id);
    $email    = get_field('email', $id);
    $calendly = get_field('calendly_link', $id);
    $why      = get_field('why_statement', $id);
    $fact     = get_field('fun_fact', $id);
    $headshot = get_field('headshot', $id);
    if ($headshot) {
      $altText = $headshot['alt'];
    } else {
      $altText = 'Headshot of ' . get_the_title($id);
    }
?>
    <div class="bg-[rgba(0,0,0,.5)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade" data-modal="<?= $id; ?>">
      <div class="transition-all duration-300 m-sp-4">
        <div class="grid lg:grid-cols-[1.5fr,1fr] gap-sp-8 section-xs bg-cream container max-h-[66vh] overflow-auto rounded-md items-center relative">
          <div class="absolute top-0 right-0 cursor-pointer">
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/close-x.svg'); ?>" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0">
          </div>
          <div class="grid order-2 gap-sp-8 lg:order-1">
            <div class="grid justify-items-start gap-sp-1">
              <h4 class="mb-0"><?= get_the_title($id); ?></h4>
              <passthru class="mb-0"><?= $title; ?></passthru>
              <?php if ($phone) : ?>
                <a href="tel:+<?= $phone; ?>" class="no-underline break-all">
                  <passthru class="mb-0"><?= $phone; ?></passthru>
                </a>
              <?php endif; ?>
              <a href="mailto:<?= $email; ?>" class="no-underline break-all">
                <passthru class="mb-0"><?= $email; ?></passthru>
              </a>
              <?php if ($calendly) : ?>
                <a href="<?= $calendly; ?>" target="_blank" class="">
                  <passthru class="mb-0">Let's chat</passthru>
                </a>
              <?php endif; ?>
            </div>
            <?php if ($fact) : ?>
              <h3 class="mb-0">“<?= $why; ?>”</h3>
            <?php endif; ?>
            <?php if ($fact) : ?>
              <div>
                <passthru>Fun Fact</passthru>
                <p class="mb-0 text-h5"><?= $fact; ?></p>
              </div>
            <?php endif; ?>
          </div>
          <div class="grid items-center justify-center order-1 lg:order-2">
            <img src="<?= $headshot['url'] ?? site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png');; ?>" alt="<?= $altText ?>" class="rounded-circle">
          </div>
        </div>
      </div>
    </div>
<?php
  endwhile;
  wp_reset_postdata();
endif;
?>
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

    // Modal logic
    const members = document.querySelectorAll('div[data-modal-id]');
    const modals = document.querySelectorAll('div[data-modal]');

    members.forEach(member => {
      const id = member.getAttribute('data-modal-id');
      member.addEventListener('click', () => {
        const modal = document.querySelector(`div[data-modal="${id}"]`);
        modal.classList.toggle('modal-fade');
      });
    });

    modals.forEach(modal => {
      modal.addEventListener('click', event => {
        if (event.target.getAttribute('data-modal')) {
          modal.classList.toggle('modal-fade');
        }
      });

      const closeButton = modal.querySelector('.modal-close');
      closeButton.addEventListener('click', () => {
        modal.classList.toggle('modal-fade');
      });
    });
  });
</script>

<?php switch_to_blog(1); ?>