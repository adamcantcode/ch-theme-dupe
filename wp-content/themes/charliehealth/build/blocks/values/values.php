<?php
$heading = get_field('heading');
$calloutCopy = get_field('callout_copy');
$features = get_field('features');
?>

<div class="grid grid-cols-1 gap-sp-5 lg:grid-cols-4">
  <h2 class="self-center text-white">Our values</h2>
  <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  <div class="bg-lavender-300 rounded-[6px] p-sp-5 flex flex-col">
    <h3 class="text-h2-base font-heading">Connection</h3>
    <div>
      <p class="text-h3-base">Care deeply</p>
      <p class="mb-base5-6">We care personally about every single person in the Charlie Health ecosystem: our clients, providers, and team members alike.</p>
      <p class="text-h3-base">Inspire hope</p>
      <p>We inspire hope with every interaction, reminding our clients that we truly and unconditionally believe in them.</p>
    </div>
  </div>
  <div class="bg-pale-blue-200 rounded-[6px] p-sp-5 flex flex-col">
    <h3 class="text-h2-base font-heading">Congruence</h3>
    <div>
      <p class="text-h3-base">Stay curious</p>
      <p class="mb-base5-6">We ask “why” five times before we’re satisfied with the answer. We don’t stick to the status quo; we challenge our assumptions and remain humble.</p>
      <p class="text-h3-base">Heed the evidence</p>
      <p>Above all, we’re results-oriented. When we find data that calls our original plan into question, we modify or pivot.</p>
    </div>
  </div>
  <div class="bg-yellow-300 rounded-[6px] p-sp-5 flex flex-col">
    <h3 class="text-h2-base font-heading">Commitment</h3>
    <div>
      <p class="text-h3-base">Act with urgency</p>
      <p class="mb-base5-6">We work as swiftly as possible. The mental health crisis is relentless, and so are we.</p>
      <p class="text-h3-base">Don’t give up</p>
      <p>Our clients don’t give up and neither do we. Persistence is our superpower.</p>
    </div>
  </div>
</div>