<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section id="postsContainer" class="section">
    <div class="container">
      <h2>Latest</h2>
      <div class="grid lg:grid-cols-3 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
        <!-- <div class="relative grid overflow-hidden border rounded-sm border-card-border">
          <img src="https://images.placeholders.dev/? width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="${post.link}" class="stretched-link">${post.title.rendered}</a></h3>
            <h5>author</h5>
            <div>tags tags</div>
          </div>
        </div> -->
      </div>
      <div class="pagination-container"></div>
    </div>
  </section>
</main>

<?php get_footer(); ?>