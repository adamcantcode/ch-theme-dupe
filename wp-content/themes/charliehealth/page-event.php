<?php
/*
Template Name: Event Page
*/
?>
<?php get_header(); ?>

<main class="site-main mt-[68px]">
  <article>
    <section class="section">
      <div class="container">
        <div class="grid lg:grid-cols-2">
          <h1><?= get_the_title(); ?></h1>
          <p>Experience a transformative mental health journey through continuing education events, nurturing workshops, and supportive discussions for youth, young adults, and families with Charlie Health.</p>
        </div>
      </div>
    </section>
    <section class="section-horizontal">
      <div class="container">
        <h2>Upcoming Events</h2>
        <div class="divider"></div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="grid lg:grid-cols-3 gap-x-sp-8 gap-y-sp-10 mb-sp-10">
          <?php
          $current_date = date('Ymd');
          $args = array(
            'post_type'      => 'event',
            'posts_per_page' => -1,
            'meta_key'       => 'date',
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'date',
                'value' => $current_date,
                'compare' => '>=',
                'type' => 'DATE'
              )
            )
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <?php
              if (has_post_thumbnail()) {
                $featuredImageID = get_post_thumbnail_id();
                $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
                $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                $featuredImageUrl = $featuredImage[0];
                $featuredImageAltText = $featuredImageAltText ?: '';
              } else {
                $featuredImageUrl = placeHolderImage(600, 800);
                $featuredImageAltText = 'place holder image';
              }
              $link = get_field('registration_link');
              $date = get_field('date');
              ?>
              <div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
                <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover lg:h-[220px] h-[150px] w-full">
                <div class="grid p-sp-4">
                  <h5 class="mb-sp-4"><?= $date; ?></h5>
                  <h3><?= get_the_title(); ?></h3>
                  <h5 class="flex items-center mb-0 gap-sp-4"><a href="<?= $link; ?>" class="stretched-link" target="_blank">Register Now</a><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-left-blue.svg'); ?>" alt="arrow" class="rotate-180 h-sp-4"></h5>
                </div>
              </div>
          <?php wp_reset_postdata();
            endwhile;
          endif
          ?>
        </div>
      </div>
    </section>
    <section class="section-horizontal">
      <div class="container">
        <h2>Past Events</h2>
        <div class="divider"></div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="grid gap-x-sp-8 gap-y-sp-10 mb-sp-10">
          <?php
          $current_date = date('Ymd');
          $args = array(
            'post_type'      => 'event',
            'posts_per_page' => -1,
            'meta_key'       => 'date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'meta_query' => array(
              array(
                'key' => 'date',
                'value' => $current_date,
                'compare' => '<',
                'type' => 'DATE'
              )
            )
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <?php
              if (has_post_thumbnail()) {
                $featuredImageID = get_post_thumbnail_id();
                $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
                $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                $featuredImageUrl = $featuredImage[0];
                $featuredImageAltText = $featuredImageAltText ?: '';
              } else {
                $featuredImageUrl = placeHolderImage(600, 800);
                $featuredImageAltText = 'place holder image';
              }
              $link = get_field('registration_link');
              $date = get_field('date');
              ?>
              <div class="relative grid lg:grid-cols-[1fr_4fr] grid-cols-[1fr_2fr] overflow-hidden border rounded-sm border-card-border">
                <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover lg:h-[220px] h-[150px] w-full">
                <div class="grid p-sp-4">
                  <h5 class="mb-sp-4"><?= $date; ?></h5>
                  <h3><a href="<?= get_the_permalink(); ?>" class="stretched-link"><?= get_the_title(); ?></a></h3>
                  <p class="mb-0"><?= get_the_excerpt(); ?></p>
                </div>
              </div>
          <?php wp_reset_postdata();
            endwhile;
          endif
          ?>
        </div>
        <div class="pagination-container"></div>
      </div>
    </section>
  </article>
</main>

<?php
get_footer();
