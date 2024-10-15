<?php get_header(); ?>

<?php
$tags = get_terms(array(
  'taxonomy' => 'post_tag',
  'hide_empty' => true,
));

if (!empty($tags) && !is_wp_error($tags)): ?>
  <div class="fixed z-20 w-full -translate-x-1/2 bg-white left-1/2 tags-list-js scrollbar-hide -mt-[49px]">
    <div class="container">
      <div class="overflow-x-auto px-base5-4">
        <div class="flex items-start gap-base5-2">
          <?php foreach ($tags as $tag): ?>
            <a href="<?= esc_url(get_term_link($tag->slug, 'post_tag')); ?>"
              class="flex-shrink-0 no-underline border bg-lavender-300 border-lavender-300 rounded-pill px-base5-2 py-base5-1 text-primary hover:bg-transparent text-h5-base my-base5-2 text-mini">
              <?= esc_html($tag->name); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php
$posts_page_id = get_option('page_for_posts');

if ($posts_page_id) {
  $posts_page = get_post($posts_page_id);
  if ($posts_page) {
    echo apply_filters('the_content', $posts_page->post_content);
  }
}
?>

<?php
$newsletterImage = get_field('image', 'option');
$headline = get_field('headline', 'option');
$subhead = get_field('subhead', 'option');
?>
<div id="newsletterPopup" class="bg-[rgba(0,0,0,.5)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade">
  <div class="transition-all duration-300 section-xs">
    <div class="grid lg:grid-cols-[1fr_2fr] bg-cream container max-h-[80vh] overflow-auto rounded-md items-center relative">
      <div class="absolute top-0 right-0 cursor-pointer">
        <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/close-x.svg'); ?>" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0">
      </div>
      <img src="<?= $newsletterImage['sizes']['featured-large']; ?>" alt="<?= $newsletterImage['alt']; ?>" class="object-cover w-full h-full noshow lg:block">
      <div class="p-sp-8">
        <h2 class="text-h1-base font-heading"><?= $headline; ?></h2>
        <p class="h-full lg:block"><?= $subhead; ?></p>
        <div id="newsletterPopup">
          <?php include('wp-content/themes/charliehealth/includes/newsletter-form.php'); ?>
        </div>
        <h5 class="mt-base5-2">You can unsubscribe anytime.</h5>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>