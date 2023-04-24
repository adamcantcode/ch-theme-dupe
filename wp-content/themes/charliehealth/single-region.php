<?php
get_header();

$regionImage = get_field('region_image');
$regionInformation = get_field('region_information');
$statesServed = get_field('states_served');

$statesServedList = implode(", ", $statesServed);
$lastComma = strrpos($statesServedList, ',');
if ($lastComma !== false) {
  $statesServedList = substr_replace($statesServedList, ' and', $lastComma, 1);
}
?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section-top">
    <div class="container">
      <h1><?= get_the_title(); ?></h1>
      <h4>Serving: <?= $statesServedList; ?></h4>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="rounded-md border-gradient">
        <div class="grid items-center lg:grid-cols-2">
          <div class="bg-light-purple lg:p-sp-12 p-sp-4 lg:rounded-l-md lg:rounded-tr-none rounded-t-md">
            <img src="<?= $regionImage['url']; ?>" alt="illustration of region" class="object-cover w-full lg:rounded-l-md lg:rounded-tr-none rounded-t-md">
          </div>
          <div class="p-sp-8">
            <?= $regionInformation; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      [form]
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="divider"></div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <h2>Meet our team</h2>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-sp-8 lg:gap-y-sp-16">
        <div>
          <img src="<?= placeHolderImage(240, 240); ?>" alt="" class="rounded-[50%] mb-5">
          <h4>Name</h4>
          <h5>Director of Clinical Outreach</h5>
          <h5>State</h5>
          <a href="tel:+#" class="inline-block break-all">
            <h5>814-325-1739</h5>
          </a>
          <a href="mailto:" class="inline-block break-all">
            <h5>elizabeth.mclister@charliehealth.com</h5>
          </a>
        </div>
        <div>
          <img src="<?= placeHolderImage(240, 240); ?>" alt="" class="rounded-[50%] mb-5">
          <h4>Name</h4>
          <h5>Director of Clinical Outreach</h5>
          <h5>State</h5>
          <a href="tel:+#" class="inline-block break-all">
            <h5>814-325-1739</h5>
          </a>
          <a href="mailto:" class="inline-block break-all">
            <h5>elizabeth.mclister@charliehealth.com</h5>
          </a>
        </div>
        <div>
          <img src="<?= placeHolderImage(240, 240); ?>" alt="" class="rounded-[50%] mb-5">
          <h4>Name</h4>
          <h5>Director of Clinical Outreach</h5>
          <h5>State</h5>
          <a href="tel:+#" class="inline-block break-all">
            <h5>814-325-1739</h5>
          </a>
          <a href="mailto:" class="inline-block break-all">
            <h5>elizabeth.mclister@charliehealth.com</h5>
          </a>
        </div>
        <div>
          <img src="<?= placeHolderImage(240, 240); ?>" alt="" class="rounded-[50%] mb-5">
          <h4>Name</h4>
          <h5>Director of Clinical Outreach</h5>
          <h5>State</h5>
          <a href="tel:+#" class="inline-block break-all">
            <h5>814-325-1739</h5>
          </a>
          <a href="mailto:" class="inline-block break-all">
            <h5>elizabeth.mclister@charliehealth.com</h5>
          </a>
        </div>
        <div>
          <img src="<?= placeHolderImage(240, 240); ?>" alt="" class="rounded-[50%] mb-5">
          <h4>Name</h4>
          <h5>Director of Clinical Outreach</h5>
          <h5>State</h5>
          <a href="tel:+#" class="inline-block break-all">
            <h5>814-325-1739</h5>
          </a>
          <a href="mailto:" class="inline-block break-all">
            <h5>elizabeth.mclister@charliehealth.com</h5>
          </a>
        </div>
        <div>
          <img src="<?= placeHolderImage(240, 240); ?>" alt="" class="rounded-[50%] mb-5">
          <h4>Name</h4>
          <h5>Director of Clinical Outreach</h5>
          <h5>State</h5>
          <a href="tel:+#" class="inline-block break-all">
            <h5>814-325-1739</h5>
          </a>
          <a href="mailto:" class="inline-block break-all">
            <h5>elizabeth.mclister@charliehealth.com</h5>
          </a>
        </div>
        <div>
          <img src="<?= placeHolderImage(240, 240); ?>" alt="" class="rounded-[50%] mb-5">
          <h4>Name</h4>
          <h5>Director of Clinical Outreach</h5>
          <h5>State</h5>
          <a href="tel:+#" class="inline-block break-all">
            <h5>814-325-1739</h5>
          </a>
          <a href="mailto:" class="inline-block break-all">
            <h5>elizabeth.mclister@charliehealth.com</h5>
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>