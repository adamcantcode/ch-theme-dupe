<?php
$style = get_field('style');

if ($style !== 'feed') :
  $listItems = get_field('check_list');
  $itemsCount = count($listItems);
  $itemsHalf = ceil($itemsCount / 2);
  $listItemsChunks = array_chunk($listItems, $itemsHalf);
  if (have_rows('check_list')) : ?>
    <div id="<?= $block['id']; ?>">
      <div class="grid items-start grid-cols-1 lg:grid-cols-2 lg:gap-sp-8 checklist">
        <?php foreach ($listItemsChunks as $items) : ?>
          <div class="lg:rounded-md bg-lightest-purple">
            <?php foreach ($items as $key => $value) : ?>
              <div class="flex items-start lg:p-sp-6 p-sp-4 gap-sp-4">
                <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/check.svg'); ?>" alt="Check mark" class="mt-sp-1">
                <div class="[&_*]:mb-0">
                  <?= $value['list_item']; ?>
                </div>
              </div>
              <?php if ($key !== array_key_last($items)) : ?>
                <div class="divider mx-sp-4 lg:mx-sp-6"></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php else : ?>
    <div class="min-h-[300px] bg-tag-gray flex items-center justify-center">
      <code>Check List</code>
    </div>
  <?php endif;
elseif ($style === 'feed') :
  $postType = get_field('post_type');
  $args = array(
    'post_type' => $postType,
    'numberposts' => -1,
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'title',
  );
  $query = new WP_Query($args);
  $listItems = $query->posts;
  $itemsCount = count($listItems);
  $itemsHalf = ceil($itemsCount / 2);
  $listItemsChunks = array_chunk($listItems, $itemsHalf);
  if ($query->have_posts()) :
  ?>
    <div id="<?= $block['id']; ?>">
      <div class="grid items-start grid-cols-1 lg:grid-cols-2 lg:gap-sp-8 checklist">
        <?php foreach ($listItemsChunks as $items) : ?>
          <div class="lg:rounded-md bg-lightest-purple">
            <?php foreach ($items as $value) : ?>
              <div class="flex items-start lg:p-sp-6 p-sp-4 gap-sp-4">
                <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/check.svg'); ?>" alt="Check mark" class="mt-sp-1">
                <div>
                  <a href="<?= get_the_permalink($value->ID); ?>"><?= $value->post_title; ?></a>
                </div>
              </div>
              <?php if ($value !== end($items)) : ?>
                <div class="divider mx-sp-4 lg:mx-sp-6"></div>
              <?php else :  ?>
                <div class="divider mx-sp-4 lg:mx-sp-6 lg:noshow"></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
<?php
  endif;
  wp_reset_postdata();
endif; ?>