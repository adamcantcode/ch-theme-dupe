<?php
/*
Template Name: Press page
*/
?>
<?php get_header(); ?>

<main class="site-main lg:mt-[68px] mt-0">
  <article>
    <section class="section">
      <div class="container">
        <div class="grid lg:grid-cols-2">
          <h1><?= get_the_title(); ?></h1>
          <p>For all media inquiries, please contact us at <a href="mailto:press@charliehealth.com?subject=Press%20inquiry">press@charliehealth.com</a></p>
        </div>
      </div>
    </section>
    <section class="section-horizontal">
      <div class="container">
        <h2>Featured Coverage</h2>
        <div class="divider"></div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="grid lg:grid-cols-3 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
          <?php
          $args = array(
            'post_type' => 'press',
            'posts_per_page' => 3,
            'meta_query' => array(
              array(
                'key' => 'featured',
                'value' => true,
                'compare' => '=',
              )
            )
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <?php
              $link = get_field('link');
              $image = get_field('logo');
              $date = get_field('date');
              ?>
              <div class="relative grid overflow-hidden border rounded-sm border-card-border">
                <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
                <div class="grid p-sp-4">
                  <h5 class="mb-sp-4"><?= $date; ?></h5>
                  <h3 class="mb-0"><a href="<?= get_the_ID(); ?>" class="stretched-link"><?= get_the_title(); ?></a></h3>
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
        <h2>Latest Announcements</h2>
        <div class="divider"></div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="grid posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
          <!-- <div class="relative grid lg:grid-cols-[1fr_4fr] grid-cols-[1fr_2fr] overflow-hidden border rounded-sm border-card-border">
            <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-contain h-[125px] w-full">
            <div class="grid p-sp-4">
              <h5 class="mb-sp-4"><?php // $date; ?></h5>
              <h3 class="mb-0"><a href="<?php // get_the_ID(); ?>" class="stretched-link"><?php // get_the_title(); ?></a></h3>
            </div>
          </div> -->
        </div>
        <div class="pagination-container"></div>
      </div>
    </section>
  </article>
</main>

<?php
get_footer();
