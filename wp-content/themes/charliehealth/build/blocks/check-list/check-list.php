<?php
$listItems = get_field('check_list');
$itemsCount = count($listItems);
$itemsHalf = ceil($itemsCount / 2);
$listItemsChunks = array_chunk($listItems, $itemsHalf);
?>
<?php if (have_rows('check_list')) : ?>
  <div id="<?= $block['id']; ?>">
    <div class="grid items-start grid-cols-1 lg:grid-cols-2 lg:gap-sp-8">
      <?php foreach ($listItemsChunks as $items) : ?>
        <div class="lg:rounded-md <?= $items[1] === current($items) ? 'rounded-t-md' : 'rounded-b-md'; ?> bg-lightest-purple">
          <?php foreach ($items as $key => $value) : ?>
            <div class="flex items-start lg:p-sp-6 p-sp-4 gap-sp-4">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/check.svg'); ?>" alt="Check mark" class="mt-sp-1">
              <div class="-mb-sp-6">
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
<?php endif; ?>