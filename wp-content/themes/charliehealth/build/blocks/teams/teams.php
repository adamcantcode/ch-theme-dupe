<?php
$entireDivision = get_field('entire_division');
$division = get_field('division')['division'];

$posts = get_field('team_member');
// var_dump($posts);
?>

<div id="<?= $block['id']; ?>">
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16">
    <?php
    if ($entireDivision) {
      $args = array(
        'post_type'   => 'team-members',
        'numberposts' => -1,
        'meta_key'    => 'division',
        'meta_value'  => $division
      );
      $query = new WP_Query($args);

      $queryPosts = $query->have_posts();
      $getPosts = $query->get_posts();
      $queryThePosts = $query->the_post();
    } else {
      $queryPosts = $posts;
      $getPosts = $posts;
      $queryThePosts = null;
    }

    if ($queryPosts) : foreach ($getPosts as $post) : $queryThePosts;
        if ($entireDivision) {
          $postID = get_the_id();
        } else {
          $postID = $post;
        }
        $title = get_field('job_title', $postID);
    ?>
        <div class="grid justify-items-start gap-sp-1">
          <div class="cursor-pointer" data-modal-id="<?= get_the_id($postID); ?>">
            <img src="<?= get_the_post_thumbnail_url($postID); ?>" alt="" class="rounded-[50%] mb-5">
            <h4><?= get_the_title($postID); ?></h4>
          </div>
          <h5><?= $title; ?></h5>
          <h5><?= $state; ?></h5>
          <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
            <h5><?= $phone; ?></h5>
          </a>
          <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
            <h5><?= $email; ?></h5>
          </a>
        </div>
    <?php
      endforeach;
      wp_reset_postdata();
    else :
      echo 'No posts found';
    endif;
    ?>
  </div>
</div>