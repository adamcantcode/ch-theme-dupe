<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section">
    <div class="container">
      <?php
      // Set the query to get 'query', otherwise it's looking for 's'
      $search_query = $_GET['query'];

      // Set the arguments for the query
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        's' => $search_query
      );

      // Run the query
      $search_results = new WP_Query($args);

      // Check if any posts were found
      if ($search_results->have_posts()) :

        // Loop through the posts and display them
        while ($search_results->have_posts()) : $search_results->the_post(); ?>
          <div class="flex">
            <a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
          </div>
      <?php endwhile;

      else :

        // If no posts were found, display a message here
        echo 'No search results found.';

      endif;

      // Reset the query
      wp_reset_query();
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>