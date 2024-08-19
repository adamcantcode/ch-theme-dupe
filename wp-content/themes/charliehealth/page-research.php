<?php
/*
Template Name: Research Page
*/

?>

<?php get_header(); ?>

<section class="section">
  <div class="container">
    <div class="grid lg:grid-cols-2">
      <div>
        <h1>Research</h1>
        <div class="flex items-start gap-sp-4 mb-sp-12 mobile-hero-sub">
          <img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg" alt="Charlie Health Shield" class="w-10 noshow lg:block mt-base5-1" />
          <p class="mb-0 text-h4-base font-heading-serif">Innovative research on client outcomes and analysis of emerging mental health trends</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section bg-primary">
  <div class="container">
    <h2 class="text-center text-white">Learn more about</h2>
    <div class="flex flex-wrap justify-center gap-base5-4">
      <?php
      $terms = get_terms(array(
        'taxonomy' => 'research-tag',
        'hide_empty' => true,
      ));

      if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
          $term_link = get_term_link($term);
          $term_name = $term->name;
      ?>
          <div class="lg:inline-block flex w-full lg:w-[unset]">
            <a href="<?= $term_link; ?>" class="flex text-white no-underline transition-all bg-transparent border-2 border-white rounded-pill p-base5-3 check-list-item text-h4-base hover:!text-primary hover:bg-white"><?= $term_name; ?></a>
          </div>
      <?php
        }
      }
      ?>
    </div>

  </div>
</section>
<section class="section bg-grey-cool">
  <div class="container">
    <div class="grid lg:grid-cols-[3fr_9fr] gap-base5-4">
      <h2 class="min-w-0">Latest mental health research & clinical outcomes</h2>
      <div class="min-w-0">
        <?php
        $featured_args = array(
          'post_type'      => 'research',
          'meta_key'       => 'main_featured',
          'meta_value'     => true,
          'posts_per_page' => 3
        );

        $featured_query = new WP_Query($featured_args);

        $posts = $featured_query->posts;

        // If there are fewer than 3 featured posts, supplement with the most recent posts
        if ($featured_query->found_posts < 3) {
          $remaining_posts_count = 3 - $featured_query->found_posts;

          $recent_args = array(
            'post_type'      => 'research',
            'posts_per_page' => $remaining_posts_count,
            'post__not_in'   => wp_list_pluck($posts, 'ID') // Exclude the already fetched posts
          );

          $recent_query = new WP_Query($recent_args);

          $posts = array_merge($posts, $recent_query->posts);
        }

        // $query = new WP_Query($args);
        ?>
        <div class="relative swiper swiper-featured-blog lg:h-[400px]">
          <div class="swiper-wrapper">
            <?php if ($posts) : foreach ($posts as $post) : ?>
                <?php
                setup_postdata($post);
                $tags = get_the_terms($post->id, 'research-tag');
                if ($tags) {
                  $tagName = $tags[0]->name;
                  $tagLink = get_term_link($tags[0]->term_id, 'research-tag');
                }

                if (has_post_thumbnail()) {
                  $featuredImageID = get_post_thumbnail_id();
                  $featuredImage = wp_get_attachment_image_src($featuredImageID, 'featured-large');
                  $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                  $featuredImageUrl = $featuredImage[0];
                  $featuredImageAltText = $featuredImageAltText ?: '';
                } else {
                  $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
                  $featuredImageAltText = 'Charlie Health Logo';
                }
                ?>
                <div class="swiper-slide">
                  <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                    <div class="grid content-between order-2 lg:p-sp-8 p-sp-4 lg:order-1 gap-base5-4 bg-lavender-200">
                      <div>
                        <?php if ($tagLink) : ?>
                          <a href="<?= $tagLink; ?>" class="relative z-20 inline-block leading-none no-underline transition-all duration-300 bg-white border-2 border-white !text-primary rounded-pill p-sp-3 mb-sp-4 mr-sp-1"><?= $tagName; ?></a>
                        <?php endif; ?>
                        <h3 class="text-h2-base"><?= get_the_title(); ?></h3>
                      </div>
                      <a href="<?= get_the_permalink(); ?>" class="no-underline stretched-link">Read more <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-right-blue.svg'); ?>" alt="arrow" class="inline-block h-sp-4 ml-sp-2"></a>
                    </div>
                    <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="order-1 object-cover lg:order-2 lg:h-[400px] w-full nolazy">
                  </div>
                </div>
            <?php endforeach;
              wp_reset_postdata();
            endif; ?>
          </div>
          <div class="bottom-0 right-0 z-10 grid items-center grid-cols-3 lg:absolute justify-items-center gap-sp-4 lg:p-sp-8 mt-sp-8">
            <div class="swiper-button-prev-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
                <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#fff" class="arrow-slider-arrow" />
              </svg>
            </div>
            <div class="!relative swiper-pagination !inset-auto"></div>
            <div class="swiper-button-next-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
                <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#fff" class="arrow-slider-arrow" />
              </svg>
            </div>
          </div>
        </div>
        <div class="grid lg:grid-cols-3 gap-sp-5 mt-base5-10">
          <?php
          $args = array(
            'post_type' => 'research',
            'posts_per_page' => -1,
            'meta_key'       => 'date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'meta_type'      => 'DATE',
          );

          $query = new WP_Query($args);
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
              $author = get_field('by_author', get_the_ID());
              if (has_post_thumbnail()) {
                $featuredImageID = get_post_thumbnail_id();
                $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
                $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                $featuredImageUrl = $featuredImage[0];
                $featuredImageAltText = $featuredImageAltText ?: '';
              } else {
                $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
                $featuredImageAltText = 'Charlie Health Logo';
              }
          ?>
              <div class="relative transition-all bg-white rounded-lg opacity-0 group research-posts-js not-loaded noshow">
                <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
                  <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
                </div>
                <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
                  <?php $tags = get_the_terms(get_the_ID(), 'research-tag');  ?>
                  <?php if ($tags) :  ?>
                    <?php foreach ($tags as $tag) : ?>
                      <a href="<?= get_term_link($tag->slug, 'research-tag'); ?>" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-primary bg-white group-hover:bg-white-hover border border-white z-[6] text-h5-base"><?= $tag->name; ?></a>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <div class="grid bg-white rounded-b-lg p-sp-4">
                  <h3 class="text-h4-base"><a href="<?= get_the_permalink(); ?>" class="block stretched-link"><?= get_the_title(); ?></a></h3>
                  <p><?= $author->post_title; ?></p>
                </div>
              </div>
          <?php endwhile;
            wp_reset_postdata();
          endif; ?>
        </div>
        <div class="flex">
          <a role="button" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto research-load-more-js lg:mt-sp-10 mt-sp-5 mb-sp-5 lg:mb-0">Load more</a>
        </div>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const loadMoreResearch = document.querySelector('.research-load-more-js');
            const posts = document.querySelectorAll('.research-posts-js.not-loaded');
            const firstFourPosts = Array.from(posts).slice(0, 6);

            firstFourPosts.forEach(post => {
              post.classList.remove('noshow', 'not-loaded', 'opacity-0');
            });

            loadMoreResearch.addEventListener('click', function() {
              let posts = document.querySelectorAll('.research-posts-js.not-loaded');
              let firstFourPosts = Array.from(posts).slice(0, 6);
              firstFourPosts.forEach(post => {
                post.classList.remove('noshow', 'not-loaded');
                setTimeout(() => {
                  post.classList.remove('opacity-0');
                }, 10);
              });
              if (document.querySelectorAll('.research-posts-js.not-loaded').length === 0) {
                loadMoreResearch.remove()
              }
            })
          })
        </script>
      </div>
    </div>
  </div>
</section>
<section class="section">
  <div class="container-sm">
    <?= do_blocks('<!-- wp:block {"ref":1709} /-->'); ?>
  </div>
</section>
<?= do_blocks('<!-- wp:block {"ref":12135} /-->'); ?>

<?php get_footer(); ?>