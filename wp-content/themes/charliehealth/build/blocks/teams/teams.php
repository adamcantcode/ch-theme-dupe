<?php
$entireDivision = get_field('entire_division');
$division = get_field('division')['division'];

$posts = get_field('team_member');
$heading = get_field('heading');
// var_dump($posts);
?>

<div id="<?= $block['id']; ?>">
  <h2><?= $heading ?: $division; ?></h2>
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-x-sp-16 lg:gap-y-sp-16">
    <?php
    if ($entireDivision) {
      $args = array(
        'post_type'   => 'team-members',
        'numberposts' => -1,
        'meta_key'    => 'division',
        'meta_value'  => $division
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) :
        while ($query->have_posts()) :
          $query->the_post();
          include('includes/wp-query.php');
        endwhile;
      endif;
    } else {
      if ($posts) :
        foreach ($posts as $post) :
          include('includes/wp-query.php');
        endforeach;
      endif;
    }
    ?>
  </div>
</div>