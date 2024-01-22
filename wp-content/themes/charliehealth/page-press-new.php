<?php
/*
Template Name: Press page new
*/
?>
<?php get_header(); ?>

<section class="section">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-[4fr_8fr] relative">
      <div class="bg-gradient-to-r from-white from-85% to-transparent z-20">
        <h1 class="mb-sp-2 text-[64px] leading-[1.1]"><?= get_the_title(); ?></h1>
        <p class="text-[14px] leading-[1.1] mb-0">Contact us at <a href="mailto:press@charliehealth.com?subject=Press%20inquiry">press@charliehealth.com</a></p>
      </div>
      <div id="marquee" class="absolute z-10 w-full overflow-hidden lg:flex lg:gap-sp-16 gap-sp-4 noshow mt-sp-4">
        <div class="flex items-center justify-around flex-none min-w-full scroll lg:gap-sp-16 gap-sp-4">
          <?php if (have_rows('publications')) :  while (have_rows('publications')) : the_row();  ?>
              <?php
              $image = get_sub_field('image');
              $link = get_sub_field('link');
              ?>
              <div><img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="opacity-30 max-h-[30px] max-w-[200px] w-full"></div>
          <?php endwhile;
          endif; ?>
        </div>
        <div class="flex items-center justify-around flex-none min-w-full scroll lg:gap-sp-16 gap-sp-4">
          <?php if (have_rows('publications')) :  while (have_rows('publications')) : the_row();  ?>
              <?php
              $image = get_sub_field('image');
              $link = get_sub_field('link');
              ?>
              <div><img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="opacity-30 max-h-[30px] max-w-[200px] w-full"></div>
          <?php endwhile;
          endif; ?>
        </div>
      </div>
    </div>
    <style>
      @keyframes scroll {
        from {
          transform: translateX(0);
        }

        to {
          transform: translateX(calc(-100% - 1rem));
        }
      }

      .scroll {
        animation: scroll 60s linear infinite;
        animation-direction: normal;
      }

      /* #marquee:hover * {
        animation-play-state: paused;
      } */
    </style>
  </div>
</section>
<section class="section-top bg-grey-warm">
  <div class="container">
    <h2 class="lg:mb-12 text-[20px] leading-[1.1]">Charlie Health in the News</h2>
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
          $bgImage = get_field('bg_image');
      ?>
          <div class="relative rounded-[6px] overflow-hidden bg-white group">
            <div class="lg:h-[260px] h-[170px] relative overflow-hidden">
              <div class="absolute inset-0 w-full h-full transition-all duration-300 bg-primary opacity-[.75] group-hover:opacity-0 z-[2]"></div>
              <img src="<?= $bgImage['url'] ?: placeHolderImage(); ?>" alt="<?= $bgImage['alt']; ?>" class="object-cover object-top w-full h-full transition-all duration-300 group-hover:scale-105">
              <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="absolute inset-0 m-auto max-w-[200px] max-h-[50px] group-hover:opacity-0 transition-all duration-300 z-[3]">
            </div>
            <div class="p-sp-4">
              <p class="mb-sp-5 text-[14px] leading-[1.5]"><?= $date; ?></p>
              <h3 class="mb-0 text-[24px] font-heading leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary line-clamp-3" target="_blank"><?= get_the_title(); ?></a></h3>
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
        // 'meta_query'     => array(
        //   array(
        //     'key'     => 'featured',
        //     'value'   => false,
        //     'compare' => '=',
        //   )
        // ),
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
          $bgImage = get_field('bg_image');
      ?>
          <div class="relative rounded-[6px] overflow-hidden bg-white group not-loaded noshow opacity-0 press-posts-js transition-all duration-500">
            <div class="h-[170px] relative overflow-hidden">
              <div class="absolute inset-0 w-full h-full transition-all duration-300 bg-primary opacity-[.75] group-hover:opacity-0 z-[2]"></div>
              <img src="<?= $bgImage['url'] ?: placeHolderImage(); ?>" alt="<?= $bgImage['alt']; ?>" class="object-cover object-top w-full h-full transition-all duration-300 bg-cover group-hover:scale-105">
              <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="absolute inset-0 m-auto max-w-[200px] max-h-[50px] group-hover:opacity-0 transition-all duration-300 z-[3]">
            </div>
            <div class="p-sp-4">
              <p class="mb-sp-5 text-[14px] leading-[1.5]"><?= $date; ?></p>
              <h3 class="mb-0 text-[24px] font-heading leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary line-clamp-3" target="_blank"><?= get_the_title(); ?></a></h3>
            </div>
          </div>
      <?php wp_reset_postdata();
        endwhile;
      endif;
      ?>
    </div>
    <div class="flex">
      <a role="button" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto press-load-more-js lg:mt-sp-10 mt-sp-5">Load more</a>
    </div>
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
      if (document.querySelectorAll('.press-posts-js.not-loaded').length === 0) {
        loadMorePress.remove()
      }
    })
  })
</script>
<section class="section bg-grey-warm">
  <div class="container">
    <h2 class="lg:mb-12 text-[20px] leading-[1.1]">Our Expert Opinion</h2>
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
          $bgImage = get_field('bg_image');
      ?>
          <div class="relative rounded-[6px] bg-white group not-loaded noshow opacity-0 expert-posts-js transition-all duration-500 overflow-hidden">
            <div class="h-[170px] relative overflow-hidden">
              <div class="absolute inset-0 w-full h-full transition-all duration-300 bg-primary opacity-[.75] group-hover:opacity-0 z-[2]"></div>
              <img src="<?= $bgImage['url'] ?: placeHolderImage(); ?>" alt="<?= $bgImage['alt']; ?>" class="object-cover object-top w-full h-full transition-all duration-300 bg-cover group-hover:scale-105">
              <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="absolute inset-0 m-auto max-w-[200px] group-hover:opacity-0 transition-all duration-300 z-[3]">
            </div>
            <div class="p-sp-4">
              <p class="mb-sp-5 text-[14px] leading-[1.5]"><?= $date; ?></p>
              <h3 class="mb-0 text-[24px] font-heading leading-[1.3]"><a href="<?= $link; ?>" class="stretched-link hover:text-primary line-clamp-3" target="_blank"><?= get_the_title(); ?></a></h3>
            </div>
          </div>
      <?php wp_reset_postdata();
        endwhile;
      endif;
      ?>
    </div>
    <div class="flex"><a role="button" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto expert-load-more-js lg:mt-sp-10 mt-sp-5">Load more</a></div>
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
      if (document.querySelectorAll('.expert-posts-js.not-loaded').length === 0) {
        loadMoreExpert.remove()
      }
    })
  })
</script>
<section class="section">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-[3fr_9fr] gap-sp-5">
      <h2 class="lg:mb-12 text-[20px] leading-[1.1]">Press Releases & Published Research</h2>
      <div class="">
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
              'terms'    => 'press-release',
            ),
          ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
            $link = get_field('link');
        ?>
            <a href="<?= $link; ?>" target="_blank" class="grid no-underline border-b opacity-0 first:border-t py-sp-6 border-primary group press-release-js noshow not-loaded">
              <div class="flex items-center mb-sp-2 lg:mb-0">
                <h3 class="inline-block mb-0 text-[20px] leading-[1.4] font-heading"><?= ucfirst(strtolower(get_the_title())); ?><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="group-hover:translate-x-[5px] transition-all duration-300 ml-sp-4 inline-block align-baseline flex-none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
                  </svg></h3>
              </div>
            </a>
        <?php wp_reset_postdata();
          endwhile;
        endif;
        ?>
      </div>
    </div>
    <div class="flex"><a role="button" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto press-release-load-more-js lg:mt-sp-10 mt-sp-5">Load more</a></div>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const loadMorePressRelease = document.querySelector('.press-release-load-more-js');
    const posts = document.querySelectorAll('.press-release-js.not-loaded');
    const firstFourPosts = Array.from(posts).slice(0, 6);

    firstFourPosts.forEach(post => {
      post.classList.remove('noshow', 'not-loaded', 'opacity-0');
    });

    loadMorePressRelease.addEventListener('click', function() {
      let posts = document.querySelectorAll('.press-release-js.not-loaded');
      let firstFourPosts = Array.from(posts).slice(0, 4);
      firstFourPosts.forEach(post => {
        post.classList.remove('noshow', 'not-loaded');
        setTimeout(() => {
          post.classList.remove('opacity-0');
        }, 10);
      });
      if (document.querySelectorAll('.press-release-js.not-loaded').length === 0) {
        loadMorePressRelease.remove()
      }
    })
  })
</script>

<section class="bg-primary-black-blue section ">
  <div class="container">
    <div class="rounded-sm">
      <div class="text-white lg:text-[56px] text-h2-lg lg:leading-[1.2] lg:mb-sp-16 mb-sp-12 font-heading-serif max-w-[850px] antialiased">Download our Press Kit</div>
      <div class="flex justify-between">
        <div class="flex lg:flex-row flex-col gap-sp-4 items-center md:w-[unset] w-full ">
          <a href="https://drive.google.com/drive/folders/1Fpq2ITetBNm8_xj7e-9Qtyz7CMsF3Vdy?usp=drive_link" class="ch-button button-primary inverted" target="_self">Download .zip</a>
          <p class="mb-0 text-[20px] leading-[1.5] text-white">Logos, photography, and more</p>
        </div>
        <img width="150" height="148" decoding="async" src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/logos/shield.svg" alt="Charlie Health shield logo" class="w-[3rem] lg:block noshow" data-uw-rm-alt-original="Charlie Health shield logo" role="img" data-uw-rm-alt="ALT">
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
