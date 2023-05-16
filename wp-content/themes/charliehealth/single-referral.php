<?php get_header(); ?>

<?php
$author = get_field('author') ?: 'The Charlile Health Team';
$medicalReviewer = get_field('medical_reviewer') ?: '';
$date = get_field('date') ?: '';
$relatedPosts = get_field('related_posts') ?: '';
$toc = get_field('toc') ?: '';
$references = get_field('references') ?: '';
?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section">
    <div class="container-md">
      <div class="text-center">
        <h1>Professional Referrals</h1>
        <h2><?= get_the_title(); ?></h2>
      </div>
      <h4>Refer a Patient</h4>
      <p>Charlie Health welcomes the opportunity to partner with you to provide excellent care to your patients.</p>
      <p>Need help or additional information? Please contact our outreach and admissions teams below for any questions about referring patients to our programs or about the admissions process.</p>
      <p><i>CH MH Services (CA) LLC is certified by the State Department of Health Care Services (Lic. #300414AP expiring 06/30/2023).</i></p>
      <p><i>For detailed information on our California Facility Licensure, please visit the <a href="https://geohub-cadhcs.hub.arcgis.com/datasets/CADHCS::sud-recovery-treatment-facilities-1/explore?location=33.650768%2C-117.838283%2C21.00" target="_blank">California Health and Human Services Department's website.</a></i></p>
    </div>
  </section>
  <section class="section-horizontal">
    <div class="container-md">
      <div class="divider"></div>
    </div>
  </section>
  <section class="section-top">
    <div class="container-md">
      <div class="formmm">
        [FORM]
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container-md">
      <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-sp-16 gap-sp-8">
        <div>
          <h4>For general questions about Charlie Health's services and programs, please contact:</h4>
          <?= $test; ?>
        </div>
        <div>
          <h4>For specific questions about Charlie Health's admissions process, please contact:</h4>
          <p>Admissions Team (<a href="mailto:admissions@charliehealth.com?subject=Inquiry%20about%20Charlie%20Health%20Admissions">admissions@charliehealth.com</a>)</p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>