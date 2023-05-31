<?php 
$type = get_field('type');
$count = get_field('count');
?>

<div id="<?= $block['id']; ?>">
  <div class="grid lg:grid-cols-3 gap-x-sp-8 gap-y-sp-10 mb-sp-10">
    <?php
    $args = array(
      'post_type' => $type,
      'posts_per_page' => $count,
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $author = get_field('by_author', get_the_ID());
    if(!empty($author)) {
      $author = $author->post_title;
    } else {
      $author = 'Charlie Health Editorial Team';
    }
    ?>
        <div class="relative grid overflow-hidden border rounded-sm border-card-border">
          <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="<?= get_the_permalink(); ?>" class="stretched-link"><?= get_the_title(); ?></a></h3>
            <h5 class="mb-sp-4"><?= $author; ?></h5>
            <div class="grid items-end justify-start grid-flow-col gap-sp-4">
              <?php
              $tags = get_the_terms(get_the_ID(), 'post_tag');
              ?>
              <?php // var_dump($tags);; ?>
              <?php if ($tags) :  ?>
                <?php foreach ($tags as $tag) : ?>
                  <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal"><?= $tag->name; ?></a>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
    <?php endwhile;
      wp_reset_postdata();
    endif; ?>
  </div>
</div>