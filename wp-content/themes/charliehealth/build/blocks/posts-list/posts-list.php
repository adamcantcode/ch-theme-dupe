<?php


// var_dump(get_intermediate_image_sizes());
?>
<div id="<?= $block['id']; ?>" class="<?= $scrollClasses; ?>">
  <div class="grid lg:grid-cols-3 transition-all duration-300 scale-[0.99] opacity-0 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 6,
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

        $tags = get_the_terms(get_the_ID(), 'post_tag');
    ?>
        <div class="relative grid overflow-hidden border rounded-sm border-card-border">
          <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="<?= get_the_permalink(); ?>" class="stretched-link"><?= get_the_title(); ?></a></h3>
            <h5><?= get_field('author'); ?></h5>
            <div class="grid justify-start grid-flow-col gap-sp-4">
              <?php foreach ($tags as $tag) : ?>
                <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray"><?= $tag->name; ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
    <?php endwhile;
      wp_reset_postdata();
    endif; ?>
  </div>
</div>