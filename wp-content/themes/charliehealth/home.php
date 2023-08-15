<?php get_header(); ?>

<main id="primary" class="site-main mt-[68px]">
  <section class="section bg-cream">
    <div class="container">
      <div class="grid lg:grid-cols-[2fr,1fr] mb-sp-12">
        <div>
          <h1 class="text-h1-display-lg">The Library</h1>
          <p>Stay up to date on mental health research, wellness techniques, treatment services, and more.</p>
        </div>
        <div>
          <form role="search" method="get" class="relative search-form" action="<?= esc_url(site_url('/search')); ?>">
            <label>
              <span class="screen-reader-text"><?= _x('Search for:', 'label'); ?></span>
              <input type="search" class="w-full border-none rounded-sm outline-none search-field h-sp-12 lg:h-sp-14 text-h3 lg:text-h3-lg py-sp-4 px-sp-6 focus-visible:border-none" placeholder="Search..." value="" name="query" />
            </label>
            <button type="submit" class="absolute top-0 right-0 flex items-center justify-center h-full transition-colors duration-300 bg-white rounded-sm search-submit aspect-square hover:bg-lightest-purple"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/search.svg'); ?>" alt="icon for search" srcset=""></button>
          </form>
        </div>
      </div>
      <div class="grid lg:grid-cols-3 gap-sp-4">
        <?php
        $terms = get_terms(array(
          'taxonomy' => 'category',
          'hide_empty' => false,
        ));
        foreach ($terms as $term) : ?>
          <?php
          if ($term->slug === 'families-and-caregivers') {
            $bgColor = 'bg-noise-orange';
            $icon = 'families';
          } elseif ($term->slug === 'teens-and-young-adults') {
            $bgColor = 'bg-noise-purple';
            $icon = 'person';
          } elseif ($term->slug === 'providers') {
            $bgColor = 'bg-noise-blue';
            $icon = 'clipboard';
          }
          ?>
          <div class="relative flex flex-col rounded-md gap-sp-4 bg-purple-gradient-end p-sp-5  hover:-translate-y-sp-1 duration-200 <?= $bgColor; ?>">
            <div>
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/' . $icon . '.svg'); ?>" alt="icon of person" class="nolazy">
            </div>
            <div class="flex items-center justify-between">
              <h3 class="mb-0"><a href="<?= get_term_link($term->term_id); ?>" class="text-white stretched-link"><?= $term->name; ?></a></h3>
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-left.svg'); ?>" alt="arrow icon" class="h-auto rotate-180 w-sp-6 nolazy">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <h2>Featured</h2>
      <div>
        <?php
        $args = array(
          'post_type' => 'post',
          'meta_key'      => 'main_featured',
          'meta_value'    => true
        );

        $query = new WP_Query($args);
        ?>
        <div class="relative swiper swiper-featured-blog lg:h-[400px]">
          <div class="swiper-wrapper">
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $featureAs = get_field('feature_as');
                switch ($featureAs->slug) {
                  case 'teens-and-young-adults':
                    $audienceClass = 'teens-and-young-adults-slider';
                    break;
                  case 'families-and-caregivers':
                    $audienceClass = 'families-and-caregivers-slider';
                    break;
                  case 'providers':
                    $audienceClass = 'providers-slider';
                    break;
                  default:
                    $audienceClass = '';
                    break;
                }

                if (has_post_thumbnail()) {
                  $featuredImageID = get_post_thumbnail_id();
                  $featuredImage = wp_get_attachment_image_src($featuredImageID, 'featured-large');
                  $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                  $featuredImageUrl = $featuredImage[0];
                  $featuredImageAltText = $featuredImageAltText ?: '';
                } else {
                  $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
                  $featuredImageAltText = 'Charlie Health Logo';
                }
                ?>
                <div class="swiper-slide">
                  <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                    <div class="grid content-between order-2 lg:p-sp-8 p-sp-4 lg:order-1 <?= $audienceClass; ?>">
                      <div>
                        <a href="<?= get_category_link($featureAs->term_id); ?>" class="relative z-20 inline-block leading-none text-white no-underline transition-all duration-300 bg-transparent border-2 border-white rounded-lg p-sp-3 hover:bg-white hover:!text-dark-blue mb-sp-4 mr-sp-1"><?= $featureAs->name; ?></a>
                        <h3 class="text-white text-h2 lg:text-h2-lg"><?= get_the_title(); ?></h3>
                      </div>
                      <a href="<?= get_the_permalink(); ?>" class="text-white no-underline stretched-link">Read more <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-left.svg'); ?>" alt="arrow" class="inline-block rotate-180 h-sp-4 ml-sp-2"></a>
                    </div>
                    <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="order-1 object-cover lg:order-2 lg:h-[400px] w-full nolazy">
                  </div>
                </div>
            <?php endwhile;
              wp_reset_postdata();
            endif; ?>
          </div>
          <div class="bottom-0 right-0 z-10 grid items-center grid-cols-3 lg:absolute justify-items-center gap-sp-4 lg:p-sp-8 mt-sp-8">
            <div class="swiper-button-prev-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
                <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
                <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
                <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
              </svg>
            </div>
            <div class="!relative swiper-pagination !inset-auto"></div>
            <div class="swiper-button-next-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
                <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
                <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
                <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-horizontal">
    <div class="container">
      <h2>Tag Spotlight</h2>
      <div class="grid items-center overflow-auto gap-sp-3 lg:gap-sp-6 lg:flex lg:items-stretch custom-scroll">
        <?php
        $tags = get_tags();
        if ($tags) :  ?>
          <?php foreach ($tags as $tag) :
            $spotlight = get_field('spotlight_tag', $tag);
            if ($spotlight) :
          ?>
              <div class="lg:w-[calc(25%-18px)] flex-[0_0_auto] relative hover:shadow-lg duration-300 rounded-md overflow-hidden">
                <div class="h-full p-sp-4 bg-cream">
                  <h3><a href="<?= get_term_link($tag->term_id); ?>" class="stretched-link"><?= $tag->name; ?></a></h3>
                  <p class="m-0"><?= $tag->description; ?></p>
                </div>
              </div>
        <?php
            endif;
          endforeach;
        endif;
        ?>
      </div>
    </div>
  </section>
  <section id="postsContainer" class="section">
    <div class="container">
      <h2>Latest</h2>
      <div class="absolute invisible opacity-0 no-posts-js">
        <div class="grid items-center grid-cols-1 duration-300 rounded-md justify-items-center bg-cream lg:grid-cols-2 p-sp-4">
          <h4 class="mb-0">We couldn’t find what you’re looking for.</h4>
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/not-found.svg'); ?>" alt="not found icon">
        </div>
      </div>
      <div class="grid transition-all duration-300 lg:grid-cols-3 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
          'post_type'      => 'post',
          'posts_per_page' => 6,
          'meta_key'       => 'date',
          'orderby'        => 'meta_value',
          'order'          => 'DESC',
          'meta_type'      => 'DATE',
          'paged'          => $paged,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            $author = get_field('by_author', get_the_ID());
            if (has_post_thumbnail()) {
              $featuredImageID = get_post_thumbnail_id();
              $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
              $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

              $featuredImageUrl = $featuredImage[0];
              $featuredImageAltText = $featuredImageAltText ?: '';
            } else {
              $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
              $featuredImageAltText = 'Charlie Health Logo';
            }
        ?>
            <div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
              <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover lg:h-[220px] h-[150px] w-full">
              <div class="grid p-sp-4">
                <h3><a href="<?= get_the_permalink(); ?>" class="stretched-link"><?= get_the_title(); ?></a></h3>
                <h5 class="mb-sp-4"><?= $author->post_title; ?></h5>
                <?php
                $tags = get_the_terms(get_the_ID(), 'post_tag');
                ?>
                <?php if ($tags) :  ?>
                  <?php foreach ($tags as $tag) : ?>
                    <div class="grid items-end justify-start grid-flow-col gap-sp-4"><a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal"><?= $tag->name; ?></a></div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
        <?php
          }
        }
        wp_reset_postdata();
        ?>
        <!-- `<div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
          <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="${post.link}" class="stretched-link">${post.title.rendered}</a></h3>
            <h5>author</h5>
            <div class="grid items-end justify-start grid-flow-col gap-sp-4">
              ${tags.map((tag) => `<a href="${tag.link}" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal">${tag.name}</a>`).join('')}
            </div>
          </div>
        </div>` -->
      </div>
      <div class="pagination-container"></div>
    </div>
  </section>
  <section class="section-horizontal">
    <div class="container-sm">
      <?= do_blocks('<!-- wp:block {"ref":1709} /-->'); ?>
    </div>
  </section>
  <section id="researchContainer" class="section">
    <div class="container">
      <h2>Research</h2>
      <div class="grid lg:grid-cols-3 transition-all duration-300 scale-[0.99] opacity-0 posts-container-research gap-x-sp-8 gap-y-sp-10 mb-sp-10">
        <!-- `<div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
          <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="${post.link}" class="stretched-link">${post.title.rendered}</a></h3>
            <h5>author</h5>
            <div class="grid items-end justify-start grid-flow-col gap-sp-4">
              ${tags.map((tag) => `<a href="${tag.link}" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal">${tag.name}</a>`).join('')}
            </div>
          </div>
        </div>` -->
      </div>
      <div class="pagination-container-research"></div>
    </div>
  </section>
  <section class="section-bottom">
    <div class="container">
      <?= do_blocks('<!-- wp:acf/divider-block {"name":"acf/divider-block"} /-->'); ?>
    </div>
  </section>
  <?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
  <?php
  $newsletterImage = get_field('image', 'option');
  $headline = get_field('headline', 'option');
  $subhead = get_field('subhead', 'option');
  ?>
  <div id="newsletterPopup" class="bg-[rgba(0,0,0,.5)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade">
    <div class="transition-all duration-300 section-xs">
      <div class="grid lg:grid-cols-[1fr,2fr] bg-cream container max-h-[80vh] overflow-auto rounded-md items-center relative">
        <div class="absolute top-0 right-0 cursor-pointer">
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/close-x.svg'); ?>" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0">
        </div>
        <img src="<?= $newsletterImage['sizes']['featured-large']; ?>" alt="<?= $newsletterImage['alt']; ?>" class="object-cover w-full h-full noshow lg:block">
        <div class="p-sp-8">
          <h2 class="lg:text-h1-display-lg text-h1-display"><?= $headline; ?></h2>
          <p class="h-full lg:block"><?= $subhead; ?></p>
          <div id="newsletterPopup" class="newsletter-revamp">
            <script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/newsletter_blog_revamp"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/newsletter_blog_revamp" title="Online Form">Online Form - Newsletter - Blog Revamp</a></noscript>
            <script>
              var container = document.currentScript.parentNode; // Newsletter container
              var elementToCut = container.querySelector("#fsSubmitButton5194985"); // Submit button
              var destinationElement = container.querySelector("#fsCell140490700"); // Email container
              var newsletterID = container.id; // Newlsetter identifier
              var newsletterLPField = container.querySelector('#field142799721'); // LP URL field
              var newsletterIDField = container.querySelector('#field146376375'); // Type field

              if (elementToCut && destinationElement) {
                var clonedElement = elementToCut.cloneNode(true);
                elementToCut.parentNode.removeChild(elementToCut);
                destinationElement.appendChild(clonedElement);
              }

              newsletterIDField.value = newsletterID;
              newsletterLPField.value = window.location.href;

            </script>
          </div>
          <h5>You can unsubscribe anytime.</h5>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>