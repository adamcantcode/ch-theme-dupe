<div class="container-md">
  <div id="map"></div>
  <script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map/mapdata.js'); ?>"></script>
  <script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map/usmap.js'); ?>"></script>
  <script>
    simplemaps_usmap.hooks.click_state = function(id) {
      alert(simplemaps_usmap_mapdata.state_specific[id].name);
    }
  </script>
  <div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16">
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
          $phone = get_field('phone', $id);
          $email = get_field('email', $id);
          $headshot = get_field('headshot', $id);
          if ($headshot) {
            $altText = $headshot['alt'];
          } else {
            $altText = 'Headshot of ' . get_the_title($id);
          } ?>
          <div class="grid justify-items-start gap-sp-1">
            <div class="cursor-pointer" data-modal-id="<?= $id; ?>">
              <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png'); ?>" alt="<?= $altText; ?>" class="rounded-circle mb-sp-4 w-[240px] hover:shadow-lg duration-300">
              <h4 class="underline"><?= get_the_title(); ?></h4>
            </div>
            <h5 class="mb-0"><?= $title; ?></h5>
            <h5 class="mb-0"></h5>
            <?php if ($phone) : ?>
              <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
                <h5 class="mb-0"><?= $phone; ?></h5>
              </a>
            <?php endif; ?>
            <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
              <h5 class="mb-0"><?= $email; ?></h5>
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
        <div class="grid lg:grid-cols-[1.5fr,1fr] gap-sp-8 section-xs bg-cream container max-h-[80vh] overflow-auto rounded-md items-center relative">
          <div class="absolute top-0 right-0 cursor-pointer">
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/close-x.svg'); ?>" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0">
          </div>
          <div class="grid order-2 gap-sp-8 lg:order-1">
            <div class="grid justify-items-start gap-sp-1">
              <h4 class="mb-0"><?= get_the_title($id); ?></h4>
              <h5 class="mb-0"><?= $title; ?></h5>
              <h5 class="mb-0"></h5>
              <?php if ($phone) : ?>
                <a href="tel:+<?= $phone; ?>" class="no-underline break-all">
                  <h5 class="mb-0"><?= $phone; ?></h5>
                </a>
              <?php endif; ?>
              <a href="mailto:<?= $email; ?>" class="no-underline break-all">
                <h5 class="mb-0"><?= $email; ?></h5>
              </a>
              <?php if ($calendly) : ?>
                <a href="<?= $calendly; ?>" target="_blank" class="">
                  <h5 class="mb-0">Let's chat</h5>
                </a>
              <?php endif; ?>
            </div>
            <?php if ($fact) : ?>
              <h3 class="mb-0">“<?= $why; ?>”</h3>
            <?php endif; ?>
            <?php if ($fact) : ?>
              <div>
                <h5>Fun Fact</h5>
                <p class="mb-0 text-h5"><?= $fact; ?></p>
              </div>
            <?php endif; ?>
          </div>
          <div class="grid items-center justify-center order-1 lg:order-2">
            <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png');; ?>" alt="<?= $altText ?>" class="rounded-circle">
          </div>
        </div>
      </div>
    </div>
<?php
  endwhile;
  wp_reset_postdata();
endif;
?>
<script>
  const members = document.querySelectorAll('div[data-modal-id]');
  const modals = document.querySelectorAll('div[data-modal]');

  members.forEach((member) => {
    const id = member.getAttribute('data-modal-id');
    member.addEventListener('click', () => {
      let modal = document.querySelector(`div[data-modal="${id}"]`);
      modal.classList.toggle('modal-fade');
    });
  });

  modals.forEach((modal) => {
    modal.addEventListener('click', (event) => {
      if (event.target.getAttribute('data-modal')) {
        modal.classList.toggle('modal-fade');
      }
    });

    const closeButton = modal.querySelector('.modal-close');

    closeButton.addEventListener('click', () => {
      modal.classList.toggle('modal-fade');
    });
  });
</script>