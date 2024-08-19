<?php
/*
Template Name: Research Tag Page
*/

?>

<?php get_header(); ?>

<?php
$current_term = get_queried_object();
?>

<section class="section bg-grey-cool">
  <div class="container">
    <div class="grid lg:grid-cols-[3fr_9fr] gap-base5-4">
      <h1 class="min-w-0 text-h2-base">Latest mental <?= $current_term->name; ?> posts</h2>
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
          <div class="grid lg:grid-cols-3 gap-sp-5">
            <?php
            $args = array(
              'post_type'      => 'research',
              'posts_per_page' => -1,
              'meta_key'       => 'date',
              'orderby'        => 'meta_value',
              'order'          => 'DESC',
              'meta_type'      => 'DATE',
              'tax_query'      => array(
                array(
                  'taxonomy' => 'research-tag',
                  'field'    => 'slug',
                  'terms'    => $current_term->slug, // Use the current term's slug
                ),
              ),
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

<?php get_footer(); ?>