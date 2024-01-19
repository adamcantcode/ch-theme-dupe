<?php
/*
Template Name: Press page new
*/
?>
<?php get_header(); ?>

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
          $bgImage = get_field('bg_image') ?: placeHolderImage();
      ?>
          <div class="relative rounded-[6px] overflow-hidden bg-white group">
            <div class="h-[260px] relative overflow-hidden">
              <div class="absolute inset-0 w-full h-full transition-all duration-300 bg-primary opacity-70 group-hover:opacity-0"></div>
              <div class="h-full">
                <img src="<?= $bgImage; ?>" alt="" class="transition-all duration-300 bg-cover group-hover:scale-105">
                <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="absolute inset-0 m-auto max-h-[50px] max-w-[200px] group-hover:opacity-0 transition-all duration-300">
              </div>
            </div>
            <div class="p-sp-4">
              <p class="mb-sp-2 text-[14px] leading-[1.5]"><?= $date; ?></p>
              <h3 class="mb-0 text-[24px] font-heading leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary featured-title-js" target="_blank"><?= get_the_title(); ?></a></h3>
            </div>
          </div>
      <?php wp_reset_postdata();
        endforeach;
      endif; ?>
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
        'tax_query'      => array(
          array(
            'taxonomy' => 'press-type',
            'field'    => 'slug',
            'terms'    => 'news',
          ),
        ),
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
          <div class="relative rounded-[6px] overflow-hidden bg-white group not-loaded noshow opacity-0 press-posts-js transition-all duration-500">
            <div class="h-[170px] relative overflow-hidden">
              <div class="absolute inset-0 w-full h-full transition-all duration-300 bg-primary opacity-70 group-hover:opacity-0"></div>
              <div class="h-full">
                <img src="<?= $bgImage; ?>" alt="" class="transition-all duration-300 bg-cover group-hover:scale-105">
                <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="absolute inset-0 m-auto max-h-[50px] max-w-[200px] group-hover:opacity-0 transition-all duration-300">
              </div>
            </div>
            <div class="p-sp-4">
              <p class="mb-sp-2 text-[14px] leading-[1.5]"><?= $date; ?></p>
              <h3 class="mb-0 text-[24px] font-heading leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary featured-title-js" target="_blank"><?= get_the_title(); ?></a></h3>
            </div>
          </div>
      <?php wp_reset_postdata();
        endwhile;
      endif;
      ?>
    </div>
    <a role="button" class="w-full ch-button button-primary justify-self-center lg:w-auto press-load-more-js mt-sp-10">Load more</a>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const loadMorePress = document.querySelector('.press-load-more-js');

    loadMorePress.addEventListener('click', function() {
      let posts = document.querySelectorAll('.press-posts-js.not-loaded');
      let firstFourPosts = Array.from(posts).slice(0, 4);
      firstFourPosts.forEach(post => {
        post.classList.remove('noshow', 'not-loaded');
        setTimeout(() => {
          post.classList.remove('opacity-0');
        }, 10);
      });
    })
  })
</script>
<section class="section bg-grey-warm">
  <div class="container">
    <h2 class="mb-12 text-[20px] leading-[1.1]">Our Expert Opinion</h2>
    <div class="grid lg:grid-cols-4 gap-sp-5">
      <?php
      $args = array(
        'post_type'      => 'press',
        'posts_per_page' => -1,
        'numberposts'    => -1,
        'meta_key'       => 'date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'tax_query'      => array(
          array(
            'taxonomy' => 'press-type',
            'field'    => 'slug',
            'terms'    => 'expert-opinion',
          ),
        ),
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
          <div class="relative rounded-[6px] overflow-hidden bg-white group not-loaded noshow opacity-0 expert-posts-js transition-all duration-500">
            <div class="h-[170px] relative">
              <div class="absolute inset-0 w-full h-full transition-all duration-300 bg-primary opacity-70 group-hover:opacity-0"></div>
              <div class="h-full transition-all duration-300 [background-size:100%] bg-top group-hover:[background-size:105%]" style="background-image: url(<?= $bgImage; ?>)">
                <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="absolute inset-0 m-auto max-h-[50px] max-w-[200px] group-hover:opacity-0 transition-all duration-300">
              </div>
            </div>
            <div class="p-sp-4">
              <p class="mb-sp-2 text-[14px] leading-[1.5]"><?= $date; ?></p>
              <h3 class="mb-0 text-[24px] font-heading leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary featured-title-js" target="_blank"><?= get_the_title(); ?></a></h3>
            </div>
          </div>
      <?php wp_reset_postdata();
        endwhile;
      endif;
      ?>
    </div>
    <a role="button" class="w-full ch-button button-primary justify-self-center lg:w-auto expert-load-more-js mt-sp-10">Load more</a>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const loadMoreExpert = document.querySelector('.expert-load-more-js');
    const posts = document.querySelectorAll('.expert-posts-js.not-loaded');
    const firstFourPosts = Array.from(posts).slice(0, 4);

    firstFourPosts.forEach(post => {
      post.classList.remove('noshow', 'not-loaded', 'opacity-0');
    });

    loadMoreExpert.addEventListener('click', function() {
      let posts = document.querySelectorAll('.expert-posts-js.not-loaded');
      let firstFourPosts = Array.from(posts).slice(0, 4);
      firstFourPosts.forEach(post => {
        post.classList.remove('noshow', 'not-loaded');
        setTimeout(() => {
          post.classList.remove('opacity-0');
        }, 10);
      });
    })
  })
</script>

<?php
get_footer();
