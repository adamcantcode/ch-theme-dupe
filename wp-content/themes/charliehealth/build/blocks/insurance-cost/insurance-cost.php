<div class="flex flex-col bg-white rounded-md md:max-w-[300px] p-base5-6 gap-base5-2 mx-auto">
  <div class="flex items-center gap-base5-4">
    <p class="flex-1 text-h4-base">Your copay could be as low as</p>
    <p class="text-h2-base"><span class="text-[50%] align-super">$</span><?= get_field('low_copay'); ?></p>
  </div>
  <div class="flex items-center gap-base5-4">
    <p class="flex-1 text-h4-base">Average <?= get_field('company'); ?> member copay</p>
    <p class="text-h2-base"><span class="text-[50%] align-super">$</span><?= get_field('average_copay'); ?></p>
  </div>
  <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full">
    <a href="/form" class="ch-button button-primary">Get started</a>
  </div>
  <p class="text-mini">Reach out to our team to verify your coverage today</p>
</div>