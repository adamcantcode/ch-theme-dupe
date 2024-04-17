<?php if (have_rows('insurer')) :  ?>
  <div class="flex items-center overflow-auto mb-base5-6 gap-base5-3">
    <?php while (have_rows('insurer')) : the_row(); ?>
      <?php
      $carrier = get_sub_field('insurance_carrier');
      $name = $carrier->post_title;
      $active = '';
      if (get_row_index() === 1) {
        $active = 'active';
      }
      ?>
      <a role="button" data-insurer-option="<?= strtolower($name); ?>" class="insurance-tabs <?= $active; ?>"><?= $name; ?></a>
    <?php endwhile; ?>
    <div>
      <p>& more</p>
    </div>
  </div>
<?php endif; ?>
<?php if (have_rows('insurer')) :  ?>
  <div class="grid">
    <?php while (have_rows('insurer')) : the_row(); ?>
      <?php
      $carrier  = get_sub_field('insurance_carrier');
      $lowCopay = get_sub_field('low_copay');
      $avgCopay = get_sub_field('average_copay');
      $name     = $carrier->post_title;
      $active   = '';
      if (get_row_index() === 1) {
        $active = 'active';
      }
      ?>
      <div data-insurer-panel="<?= strtolower($name); ?>" class="insurance-panel <?= $active; ?>">
        <div class="grid items-center lg:grid-cols-2 gap-base5-4">
          <div class="flex flex-col bg-white rounded-md md:max-w-[300px] p-base5-6 gap-base5-2 mx-auto">
            <div class="flex items-center gap-base5-4">
              <p class="flex-1 text-h4-base">Your copay could be as low as</p>
              <p class="text-h2-base"><span class="text-[50%] align-super">$</span><?= $lowCopay; ?></p>
            </div>
            <div class="flex items-center gap-base5-4">
              <p class="flex-1 text-h4-base">Average <?= $name; ?> member copay</p>
              <p class="text-h2-base"><span class="text-[50%] align-super">$</span><?= $avgCopay; ?></p>
            </div>
            <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
              <a href="/form" class="ch-button button-primary">Get started</a>
            </div>
            <p class="text-mini">Reach out to our team to verify your coverage today</p>
          </div>
          <div>
            <h2>Charlie Health partners with <?= $name; ?></h2>
            <?= get_sub_field('details'); ?>
            <a href="<?= get_the_permalink($carrier->ID); ?>" class="ch-button button-primary">Explore <?= $name; ?></a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
<script>
  const tabs = document.querySelectorAll('[data-insurer-option]');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const activePane = document.querySelector('[data-insurer-panel].active');
      const selected = tab.getAttribute('data-insurer-option');
      const revealPane = document.querySelector(`[data-insurer-panel="${selected}"]`);

      tabs.forEach(tab => {
        tab.classList.remove('active');
      });
      tab.classList.add('active');

      activePane.classList.remove('active');
      revealPane.classList.add('active');
    })
  });
</script>