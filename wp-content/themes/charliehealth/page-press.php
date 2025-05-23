<?php
/*
Template Name: Press page
*/
?>
<?php get_header(); ?>

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
      <div class="grid lg:grid-cols-3 gap-x-sp-8 gap-y-sp-10 mb-sp-10">
        <?php
        $args = array(
          'post_type'      => 'press',
          'posts_per_page' => 3,
          'meta_key'       => 'date',
          'orderby'        => 'meta_value',
          'order'          => 'DESC',
          'meta_query'     => array(
            array(
              'key'     => 'featured',
              'value'   => true,
              'compare' => '=',
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
            $link = get_field('link');
            $date = get_field('date');
            ?>
            <div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
              <div class="grid items-center justify-center w-full border-b border-card-border lg:h-[220px] h-[150px]">
                <div class="lg:h-[220px] h-[150px]">
                  <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-contain w-full h-full p-sp-4 ">
                </div>
              </div>
              <div class="grid p-sp-4">
                <p class="mb-sp-4 text-h5 lg:text-h5-lg"><?= $date; ?></p>
                <h3 class="mb-0"><a href="<?= $link; ?>" class="stretched-link" target="_blank"><?= get_the_title(); ?></a></h3>
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
      <div class="absolute invisible opacity-0 no-posts-js">
        <div class="grid items-center grid-cols-1 duration-300 rounded-md justify-items-center bg-cream lg:grid-cols-2 p-sp-4">
          <h4 class="mb-0">There aren't any posts that match this tag. Try again with another tag</h4>
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/not-found.svg'); ?>" alt="not found icon">
        </div>
      </div>
      <div class="grid posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
        <!-- <div class="relative grid lg:grid-cols-[1fr_4fr] grid-cols-[1fr_2fr] overflow-hidden border rounded-sm border-card-border">
          <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-contain h-[125px] w-full">
          <div class="grid p-sp-4">
           <p class="mb-sp-4 text-h5 lg:text-h5-lg"><?php // $date; 
                                ?></p>
            <h3 class="mb-0"><a href="<?php // get_the_ID(); 
                                      ?>" class="stretched-link"><?php // get_the_title(); 
                                                                  ?></a></h3>
          </div>
        </div> -->
      </div>
      <div class="pagination-container"></div>
    </div>
  </section>
</article>

<?php
get_footer();
