<?php
/*
Template Name: Press page new
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
  <section class="section bg-grey-warm">
    <div class="container">
      <h2 class="mb-12 text-[20px] leading-[1.1]">Charlie Health in the News</h2>
      <div class="grid lg:grid-cols-2 gap-sp-5 mb-sp-5">
        <?php
        $featured = get_field('featured_posts');
        $featured = array_slice($featured, 0, 2);

        if ($featured) :  foreach ($featured as $post) : setup_postdata($post);
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
            <div class="relative grid rounded-[6px] overflow-hidden bg-white">
              <div class="h-[260px] relative">
                <div>
                  <img src="https://placehold.co/600x400/EEE/31343C" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full before:contents">
                </div>
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/db/Forbes_logo.svg" alt="" class="absolute inset-0 m-auto max-h-[50px] max-w-[200px]">
              </div>
              <div class="grid p-sp-4">
                <h3 class="mb-sp-3 text-[24px] font-heading leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary featured-title-js" target="_blank"><?= get_the_title(); ?></a></h3>
                <p class="mb-0 text-[14px] leading-[1.5]">Publication — <?= $date; ?></p>
              </div>
            </div>
        <?php wp_reset_postdata();
          endforeach;
        endif; ?>
      </div>
      <div class="grid lg:grid-cols-4 gap-sp-5 mb-sp-5">
        <?php
        $featured = get_field('featured_posts');
        $featured = array_slice($featured, 2, 6);

        if ($featured) :  foreach ($featured as $post) : setup_postdata($post);
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
            <div class="relative flex flex-col rounded-[6px] overflow-hidden bg-white">
              <div class="flex items-center justify-center w-full h-[170px]">
                <div class="h-[170px]">
                  <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full">
                </div>
              </div>
              <div class="flex flex-col p-sp-5">
                <h3 class="mb-sp-3 text-[24px] font-heading  leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary featured-title-js" target="_blank"><?= get_the_title(); ?></a></h3>
                <p class="mb-0 text-[14px] leading-[1.5]">Publication — <?= $date; ?></p>
              </div>
            </div>
        <?php wp_reset_postdata();
          endforeach;
        endif;
        ?>
      </div>
      <div class="grid lg:grid-cols-4 gap-sp-5">
        <?php
        $args = array(
          'post_type'      => 'press',
          'posts_per_page' => -1,
          'numberposts'    => -1,
          'meta_key'       => 'date',
          'orderby'        => 'meta_value',
          'order'          => 'DESC',
          'meta_query'     => array(
            array(
              'key'     => 'featured',
              'value'   => true,
              'compare' => '!=',
            )
          )
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
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
            <div class="relative flex flex-col rounded-[6px] overflow-hidden bg-white">
              <div class="flex items-center justify-center w-full h-[170px]">
                <div class="h-[170px]">
                  <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full">
                </div>
              </div>
              <div class="flex flex-col p-sp-5">
                <h3 class="mb-sp-3 text-[24px] font-heading  leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary" target="_blank"><?= get_the_title(); ?></a></h3>
                <p class="mb-0 text-[14px] leading-[1.5]">Publication — <?= $date; ?></p>
              </div>
            </div>
        <?php wp_reset_postdata();
          endwhile;
        endif;
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
          <img srcsp-3"https://images.placeholders.dev /?width=800&height=600&text=FPO" alt="" class="object-contain h-[125px] w-full">
          <div class="grid p-sp-4">
           <p class="mb-0 text-[14px] leading-[1.5]"><?php // $date; 
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
