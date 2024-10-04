<div class="macy-container">
  <?php
  // Get all top-level locations
  $locations = new WP_Query([
    'post_type' => 'locations',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'post_parent' => 0, // Get only top-level locations
    'orderby' => 'title',
    'order' => 'ASC',
  ]);

  if ($locations->have_posts()) {
    while ($locations->have_posts()) {
      $locations->the_post();
      echo '<div>';

      // Output the top-level location
      echo '<h2 class="text-h3-base font-heading"><a href="' . esc_url(get_permalink()) . '" class="underline">' . esc_html(get_the_title()) . '</a><h2>';

      // Get subpages (children)
      $subpages = new WP_Query([
        'post_type' => 'locations',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'post_parent' => get_the_ID(),
        'orderby' => 'title',
        'order' => 'ASC',
      ]);

      if ($subpages->have_posts()) {
        echo '<div>';
        while ($subpages->have_posts()) {
          $subpages->the_post();
          if (get_post_meta(get_the_ID(), '_wp_page_template', true) !== 'single-locations-insurance.php') {
            echo '<h3 class="text-p-base mb-base5-2"><a href="' . esc_url(get_permalink()) . '" class="underline">' . esc_html(get_the_title()) . '</h3></a>';
          }
        }
        echo '</div>';
      }
      echo '</div>';
      // Reset post data after each child query
      wp_reset_postdata();
    }

    // Reset post data after the main query
    wp_reset_postdata();
  }
  ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/macy@2"></script>
<script>
  var macy = Macy({
    container: '.macy-container',
    trueOrder: false,
    waitForImages: false,
    margin: {
      x: 20,
      y: 125
    },
    columns: 3,
    breakAt: {
      1024: 1,
    }
  });
</script>