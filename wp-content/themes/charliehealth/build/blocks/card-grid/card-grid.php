<?php
$posts = get_field('posts');

if ($horizontalScroll === true) {
  $scrollClasses = 'overflow-auto w-full max-w-[80rem] custom-scroll';
  $gridClasses = 'grid items-center grid-flow-col gap-sp-3 lg:gap-sp-6 lg:grid-cols-3';
  $borderClasses = 'grid items-center grid-flow-col gap-sp-3 lg:gap-sp-6 lg:grid-cols-3';
} else {
  $scrollClasses = '';
  $gridClasses = 'grid items-center grid-cols-1 gap-sp-8 lg:gap-sp-6 lg:grid-cols-3';
  $borderClasses = 'grid items-center grid-cols-1 gap-sp-8 lg:gap-sp-6 lg:grid-cols-3';
}
$parent_posts = new WP_Query(array(
  'post_type' => 'treatment-modalities',
  'post_parent' => 0,  // Get only top-level (parent) posts
  'posts_per_page' => -1, // Retrieve all posts
  'orderby' => 'title',
  'order' => 'ASC'
));
?>

<div id="<?= $block['id']; ?>">
  <div class="grid lg:grid-cols-4 gap-base5-4 card-wrapper relative lg:overflow-visible overflow-hidden transition-all duration-1000 lg:max-h-full max-h-[70vh]">
    <?php if ($parent_posts->have_posts()) : while ($parent_posts->have_posts()) : $parent_posts->the_post(); ?>
        <div class="hover:bg-primary bg-primary-100 [&_*]:text-white [&_*]:hover:text-white rounded-md relative transition-all hover:-translate-y-base5-1">
          <div class="flex flex-col h-full p-base5-4">
            <h3><a href="<?= get_the_permalink(); ?>" class="stretched-link"><?= get_the_title(); ?></a></h3>
            <?php if (get_field('short_description', get_the_ID())) : ?>
              <p><?= get_field('short_description', get_the_ID()); ?></p>
            <?php endif; ?>
            <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-auto ml-auto">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30093 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928057 9.95262 -0.0928057 10.3431 0.278417Z" fill="white" />
            </svg>

          </div>
        </div>
    <?php endwhile;
      wp_reset_postdata();
    endif;; ?>
    <div class="absolute bottom-0 flex justify-center w-full bg-white lg:noshow">
      <a role="button" class="z-10 ch-button button-secondary toggle-button">Show More</a>
    </div>
  </div>
</div>