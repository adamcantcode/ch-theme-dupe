<?php
get_header();

$regionImage = get_field('region_image');
$regionInformation = get_field('region_information');
$statesServed = get_field('states_served');

$statesServedList = implode(", ", $statesServed);
$lastComma = strrpos($statesServedList, ',');
if ($lastComma !== false) {
  $statesServedList = substr_replace($statesServedList, ' and', $lastComma, 1);
}

// var_dump(get_post_types());

$args = array(
  'post_type' => 'outreach-team-member',
  'numberposts' => -1, // number of posts to display
  // 'meta_key'      => 'region',
  // 'meta_value'    => 'mid-atlantic'
);

?>

<main id="primary" class="site-main lg:mt-[68px] mt-0 relative">
  <section class="section-top">
    <div class="container">
      <h1><?= get_the_title(); ?></h1>
      <h4>Serving: <?= $statesServedList; ?></h4>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="rounded-md border-gradient">
        <div class="grid items-center lg:grid-cols-2">
          <div class="bg-light-purple lg:p-sp-12 p-sp-4 lg:rounded-l-md lg:rounded-tr-none rounded-t-md">
            <img src="<?= $regionImage['url']; ?>" alt="illustration of region" class="object-cover w-full lg:rounded-l-md lg:rounded-tr-none rounded-t-md">
          </div>
          <div class="p-sp-8">
            <?= $regionInformation; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      [form]
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="divider"></div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <h2>Meet our team</h2>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16">
        <?php
        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
            $title = get_field('title');
            $state = get_field('state');
            $state = implode(", ", $state);
            $lastComma = strrpos($state, ',');
            if ($lastComma !== false) {
              $state = substr_replace($state, ' and', $lastComma, 1);
            }
            $phone = get_field('phone');
            $email = get_field('email');
        ?>
            <div>
              <div class="cursor-pointer" data-modal-id="<?= get_the_ID(); ?>">
                <img src="<?= placeHolderImage(240, 240); ?>" alt="" class="rounded-[50%] mb-5">
                <h4><?= get_the_title(); ?></h4>
              </div>
              <h5><?= $title; ?></h5>
              <h5><?= $state; ?></h5>
              <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
                <h5><?= $phone; ?></h5>
              </a>
              <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
                <h5><?= $email; ?></h5>
              </a>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        else :
          echo 'No posts found';
        endif;
        ?>
      </div>
    </div>
  </section>

  <?php
  $custom_query = new WP_Query($args);

  if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
      $title     = get_field('title');
      $state     = get_field('state');
      $state     = implode(", ", $state);
      $lastComma = strrpos($state, ',');
      if ($lastComma !== false) {
        $state = substr_replace($state, ' and', $lastComma, 1);
      }
      $phone    = get_field('phone');
      $email    = get_field('email');
      $calendly = get_field('calendly_link');
      $why      = get_field('why_statement');
      $fact     = get_field('fun_fact');
  ?>
      <div class="bg-[rgba(0,0,0,.5)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center hidden" data-modal="<?= get_the_ID(); ?>">
        <div class="section-xs">
          <div class="grid lg:grid-cols-[1.5fr,1fr] section-xs bg-cream container max-h-[80vh] overflow-auto rounded-md items-center relative">
            <div class="absolute top-0 right-0 cursor-pointer">
              <img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/close-x.svg'; ?>" alt="close button" class="modal-close p-sp-10">
            </div>
            <div class="grid order-2 gap-sp-8 lg:order-1">
              <div>
                <h4 class="mb-0"><?= get_the_title(); ?></h4>
                <h5><?= $title; ?></h5>
                <h5><?= $state; ?></h5>
                <a href="tel:+<?= $phone; ?>" class="no-underline break-all">
                  <h5><?= $phone; ?></h5>
                </a>
                <a href="mailto:<?= $email; ?>" class="no-underline break-all">
                  <h5><?= $email; ?></h5>
                </a>
                <a href="<?= $calendly; ?>" target="_blank" class="">
                  <h5>Let's chat</h5>
                </a>
              </div>
              <h3 class="mb-0"><?= $why; ?></h3>
              <div>
                <h5>Fun Fact</h5>
                <p class="mb-0 text-h5"><?= $fact; ?></p>
              </div>
            </div>
            <div>
              <img src="<?= placeHolderImage(400, 400); ?>" alt="" class="rounded-[50%] mb-5">
            </div>
          </div>
        </div>
      </div>
  <?php
    endwhile;
    wp_reset_postdata();
  else :
    echo 'No posts found';
  endif;
  ?>

  <script>
    const members = document.querySelectorAll('div[data-modal-id]');
    const modals = document.querySelectorAll('div[data-modal]');

    members.forEach(member => {
      const id = member.getAttribute('data-modal-id');
      member.addEventListener('click', () => {
        let modal = document.querySelector(`div[data-modal="${id}"]`);
        modal.classList.toggle('hidden');
      });
    });

    modals.forEach(modal => {
      modal.addEventListener('click', (event) => {
        if (event.target.getAttribute("data-modal")) {
          modal.classList.toggle('hidden');
        }
      });

      const closeButton = modal.querySelector('.modal-close');

      closeButton.addEventListener('click', (event) => {
        modal.classList.toggle('hidden');
      });
    });
  </script>

</main>

<?php get_footer(); ?>