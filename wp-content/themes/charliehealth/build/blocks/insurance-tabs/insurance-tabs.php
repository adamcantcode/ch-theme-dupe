<?php $insurers = get_field('insurance_carrier'); ?>
<?php if ($insurers) :  ?>
  <div class="flex items-center overflow-auto mb-base5-6 gap-base5-3">
    <?php foreach ($insurers as $index => $insurer) : ?>
      <?php
      $name = $insurer->post_title;
      $active = false;
      if (get_the_ID() === $insurer->ID) {
        $active = 'active';
      }
      ?>
      <a role="button" data-insurer-option="<?= strtolower($name); ?>" class="insurance-tabs <?= $active; ?>"><?= $name; ?></a>
    <?php endforeach; ?>
    <div>
      <p>& more</p>
    </div>
  </div>
<?php endif; ?>
<?php if ($insurers) :  ?>
  <div class="grid">
    <?php foreach ($insurers as $index => $insurer) : ?>
      <?php
      $lowCopay    = get_field('low_copay', $insurer->ID);
      $avgCopay    = get_field('average_copay', $insurer->ID);
      $description = get_field('description', $insurer->ID);
      $name        = $insurer->post_title;
      $active = false;
      if (get_the_ID() === $insurer->ID) {
        $active = 'active';
      }
      ?>
      <div data-insurer-panel="<?= strtolower($name); ?>" class="insurance-panel <?= $active; ?>">
        <div class="grid items-center lg:grid-cols-[1.5fr_2fr] gap-base5-4">
          <div class="flex flex-col bg-white rounded-md md:max-w-[300px] p-base5-6 gap-base5-2">
            <div class="flex items-center gap-base5-4">
              <p class="flex-1 text-h4-base">Your out-of-pocket costs could be as low as</p>
              <p class="text-h2-base"><span class="text-[50%] align-super">$</span><?= $lowCopay; ?></p>
            </div>
            <div class="flex items-center gap-base5-4">
              <p class="flex-1 text-h4-base"><?= $name; ?> average cost per session</p>
              <p class="text-h2-base"><span class="text-[50%] align-super">$</span><?= $avgCopay; ?></p>
            </div>
            <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
              <a href="/form" class="ch-button button-secondary-ch">Get started</a>
            </div>
            <p class="text-mini">Reach out to our team to verify your coverage today</p>
          </div>
          <div>
            <h2>Charlie Health partners with <?= $name; ?></h2>
            <?= $description; ?>
            <a href="<?= get_the_permalink($insurer->ID); ?>" class="ch-button button-primary-ch">Explore <?= $name; ?></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<script>
  const tabs = document.querySelectorAll('[data-insurer-option]');
  
  if (!document.querySelectorAll('[data-insurer-option].active').length) {
    document.querySelector('[data-insurer-option]').classList.add('active')
    document.querySelector('[data-insurer-panel]').classList.add('active')
  }

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