<?php
$heading = get_field('heading');
$style = get_field('style');
$customPosts = get_field('areas_of_care');
?>

<div class="grid lg:grid-cols-[3fr_1fr_8fr] gap-x-sp-5">
  <div>
    <div class="mb-base5-5">
      <h2><?= $heading; ?></h2>
    </div>
  </div>
  <div></div>
  <div>
    <div class="overflow-hidden transition-all duration-500 ease-in-out view-all-js">
      <?php if ($style === 'feed' || $style === null) : ?>
        <?php
        $args = array(
          'post_type'      => 'areas-of-care',
          'posts_per_page' => -1,
          'order'          => 'ASC',
          'orderby'        => 'title',
          'post_status'    => 'publish'
        );

        $query = new WP_Query($args);
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <div class="relative first:border-t-2 first:border-primary first:pt-sp-6">
              <a href="<?= get_the_permalink(); ?>" class="stretched-link no-underline pb-sp-6 border-b-2 border-primary grid lg:grid-cols-[3fr_3.5fr] mb-sp-6 gap-x-sp-5 items-center list-item-height-js group">
                <div class="flex items-center mb-sp-2 lg:mb-0">
                  <h3 class="inline-block text-h4-base"><?= ucfirst(strtolower(get_the_title())); ?><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="group-hover:translate-x-[5px] transition-all duration-300 ml-sp-4 inline-block align-baseline flex-none">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
                    </svg></h3>
                </div>
                <p><?= the_field('short_description', get_the_ID()); ?></p>
              </a>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      <?php elseif ($style === 'custom') : global $post; ?>
        <?php foreach ($customPosts as $post) : setup_postdata($post); ?>
          <div class="relative first:border-t-2 first:border-primary first:pt-sp-6">
            <a href="<?= get_the_permalink(); ?>" class="stretched-link no-underline pb-sp-6 border-b-2 border-primary grid lg:grid-cols-[3fr_3.5fr] mb-sp-6 gap-x-sp-5 items-center list-item-height-js group">
              <div class="flex items-center mb-sp-2 lg:mb-0">
                <h3 class="inline-block text-h4-base"><?= ucfirst(strtolower(get_the_title())); ?><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="group-hover:translate-x-[5px] transition-all duration-300 ml-sp-4 inline-block align-baseline flex-none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
                  </svg>
                </h3>
              </div>
              <p><?= the_field('short_description', get_the_ID()); ?></p>
            </a>
          </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
    <a role="button" class="float-right ch-button button-secondary-ch view-all-button-js mt-sp-8 w-full lg:w-[unset]">View All</a>
  </div>
</div>