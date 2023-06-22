<?php
if (is_singular('post') || is_singular('research') || is_singular('areas-of-care') || is_singular('treatment-modalities')) {
  $id = get_the_ID();
  $postLink = get_the_permalink($id);
  $medicalReviewer = get_field('medical_reviewer', $id);
  $medicalReviewerName = $medicalReviewer->post_title;
  $medicalReviewerLink = site_url('/medical-reviewer/' . $medicalReviewer->post_name);
  $author = get_field('by_author', $id);
  $authorName = $author->post_title;
  $authorLink = site_url('/medical-reviewer/' . $author->post_name);
  $headline = get_the_title($id);
  $description = get_the_excerpt($id);
  if (has_post_thumbnail($id)) {
    $featuredImageID = get_post_thumbnail_id($id);
    $featuredImage = wp_get_attachment_image_src($featuredImageID, 'featured-large');
    $featuredImageUrl = $featuredImage[0];
  } else {
    $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png');
  }
  $publisherLogo = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png');
  $date = get_field('date', $id) ?: get_the_date($id);
  $modifiedDate = get_the_modified_date('F j, Y', $id) ?: $date;

  if (is_singular('post') || is_singular('research')) : ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "<?= $postLink; ?>",
          "reviewedBy": [{
            "@type": "Person",
            "name": "<?= $medicalReviewerName; ?>",
            "url": "<?= $medicalReviewerLink; ?>"
          }]
        },
        "headline": "<?= $headline; ?>",
        "description": "<?= $description; ?>",
        "image": "<?= $featuredImageUrl; ?>",
        "author": {
          "@type": "Person",
          "name": "<?= $authorName; ?>",
          "url": "<?= $authorLink; ?>"
        },
        "publisher": {
          "@type": "Organization",
          "name": "Charlie Health",
          "logo": {
            "@type": "ImageObject",
            "url": "<?= $publisherLogo; ?>"
          }
        },
        "datePublished": "<?= $date; ?>",
        "dateModified": "<?= $modifiedDate; ?>"
      }
    </script>
  <?php elseif (is_singular('areas-of-care') || is_singular('treatment-modalities')) : ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://www.charliehealth.com/"
        }, {
          "@type": "ListItem",
          "position": 2,
          "name": "Areas of Care",
          "item": "https://www.charliehealth.com/<?= get_post_type($id); ?>"
        }, {
          "@type": "ListItem",
          "position": 3,
          "name": "<?= $headline; ?>",
          "item": "<?= $postLink; ?>"
        }]
      }
    </script>
<?php endif;
}
