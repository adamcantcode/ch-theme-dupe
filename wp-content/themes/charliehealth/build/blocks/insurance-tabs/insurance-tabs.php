<div class="flex">
  <div data-insurer-option="aetna" class="active">Aetna</div>
  <div data-insurer-option="insurer" class="">insurer</div>
  <div data-insurer-option="insurer" class="">insurer</div>
  <div data-insurer-option="insurer" class="">insurer</div>
  <div>& more</div>
</div>
<div>
  <div data-insurer-tab="aetna">
    <div class="grid lg:grid-cols-2">
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
      <div>
        <h2>How we work with Cigna</h2>
        <p>Cigna provides comprehensive mental health benefits with many of their plans, encompassing therapy services tailored to individual needs. With coverage extending to virtual behavioral healthcare, including Charlie Health's virtual Intensive Outpatient Program, individuals receive the treatment necessary for their mental well-being. Cigna's commitment to mental health ensures that therapy is not only accessible but also an integral part of their healthcare experience. Through their insurance policies, Cigna prioritizes coverage for therapy, recognizing its significance in fostering mental wellness.</p>
        <a href="#" class="ch-button button-primary">Explore Cigna</a>
      </div>
    </div>
  </div>
</div>