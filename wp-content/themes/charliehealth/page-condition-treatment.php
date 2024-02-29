<?php
/*
Template Name: Condition Treatment
Template Post Type: treatment-modalities, areas-of-care, page
*/
?>

<?php get_header(); ?>

<?php
$protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
$domain   = $_SERVER['HTTP_HOST'];
$path     = $_SERVER['REQUEST_URI'];
$fullUrl  = $protocol . $domain . $path;

if (has_post_thumbnail()) {
  $featuredImageID      = get_post_thumbnail_id();
  $featuredImage        = wp_get_attachment_image_src($featuredImageID, 'featured-large');
  $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

  $featuredImageUrl     = $featuredImage[0];
  $featuredImageAltText = $featuredImageAltText ?: '';
} else {
  $featuredImageUrl     = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
  $featuredImageAltText = 'Charlie Health Logo';
}
?>

<div id="progressBar" class="fixed z-20 transition-all duration-700 rounded-r-sm bg-purple-gradient-end h-[5px] left-0"></div>
<div id="mainArticleContent" class="relative z-10 main-article-content">
  <section class="section">
    <div class="container">
      <div class="grid items-center lg:grid-cols-[4.25fr_5fr] lg:gap-[10rem] gap-sp-8">
        <div>
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full aspect-square nolazy">
        </div>
        <div>
          <h1 class="font-heading-serif text-h2 lg:text-h2-lg"><?= get_the_title(); ?></h1>
          <p><?= get_the_excerpt(); ?></p>
          <div class="flex items-start">
            <p class="font-heading-serif">Share:</p>
            <a role="button" class="js-share-button ml-sp-4"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/share.svg'); ?>" alt="share icon"></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $fullUrl; ?>" onclick="window.open(this.href,'targetWindow','resizable=yes,width=600,height=300'); return false;" class="ml-sp-4"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'); ?>" alt="Facebook logo">
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $fullUrl; ?>" class="ml-sp-4"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'); ?>" alt="LinkedIn logo"></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="invisible opacity-0 noshow back-to-top top-[150px] left-sp-10 mb-sp-16 w-fit translate-y-base5-3">
    <a href="#mainArticleContent" class="no-underline text-h3-base font-heading-serif">Back to top</a>
  </div>
  <section class="section-horizontal">
    <div class="container">
      <div class="divider"></div>
    </div>
  </section>
  <article id="articleContent" class="section">
    <div class="container-sm">
      <?php the_content(); ?>
    </div>
  </article>
</div>
<?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
<?= do_blocks('<!-- wp:block {"ref":7353} /-->'); ?>

<?php get_footer(); ?>