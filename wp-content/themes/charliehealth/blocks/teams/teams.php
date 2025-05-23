<?php
$entireDivision = get_field('entire_division');
$division = get_field('division')['division'];

$posts = get_field('team_member');
$heading = get_field('heading');

switch ($division) {
  case 'Founding Members':
    $divisionRewrite = 'Co-Founders';
    break;
  case 'Leadership':
    $divisionRewrite = 'Clinical Leadership';
    break;
  default:
    $divisionRewrite = $division;
    break;
}
?>

<div id="<?= $block['id']; ?>">
  <h2><?= $heading ?: $divisionRewrite; ?></h2>
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-x-sp-16 lg:gap-y-sp-16">
    <?php
    if ($entireDivision) {
      $args = array(
        'post_type'      => 'team-members',
        'numberposts'    => -1,
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'orderby'        => 'title',
        'meta_key'       => 'division',
        'meta_value'     => $division,
        'meta_query'     => array(
          array(
            'key'     => '_thumbnail_id',
            'compare' => 'EXISTS', // Checks if the featured image exists
          ),
        ),
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