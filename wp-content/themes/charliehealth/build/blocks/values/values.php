<?php
$heading = get_field('heading');
$calloutCopy = get_field('callout_copy');
$features = get_field('features');
?>

<div class="grid grid-cols-1 gap-sp-5 lg:grid-cols-4">
  <h2 class="font-heading-serif lg:text-[40px] text-[32px] leading-[1.1] text-white self-center mb-0">Our values</h2>
  <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  <div class="bg-lavender-300 rounded-[6px] p-sp-5 flex flex-col justify-between">
    <h3 class="font-heading lg:text-[40px] text-[32px] leading-[1.1]">Connection</h3>
    <div>
      <h4 class="font-heading lg:text-[28px] text-[20px] leading-[1.1] mb-sp-3">Care deeply</h4>
      <p class="text-[14px] leading-[1.4] mb-sp-8">We care personally about every single person in the Charlie Health ecosystem: our clients, providers, and team members alike.</p>
      <h4 class="font-heading lg:text-[28px] text-[20px] leading-[1.1] mb-sp-3">Inspire hope</h4>
      <p class="mb-0 text-[14px] leading-[1.4]">We inspire hope with every interaction, reminding our clients that we truly and unconditionally believe in them.</p>
    </div>
  </div>
  <div class="bg-pale-blue-200 rounded-[6px] p-sp-5 flex flex-col justify-between">
    <h3 class="font-heading lg:text-[40px] text-[32px] leading-[1.1]">Congruence</h3>
    <div>
      <h4 class="font-heading lg:text-[28px] text-[20px] leading-[1.1] mb-sp-3">Stay curious</h4>
      <p class="text-[14px] leading-[1.4] mb-sp-8">We ask “why” five times before we’re satisfied with the answer. We don’t stick to the status quo; we challenge our assumptions and remain humble.</p>
      <h4 class="font-heading lg:text-[28px] text-[20px] leading-[1.1] mb-sp-3">Heed the evidence</h4>
      <p class="mb-0 text-[14px] leading-[1.4]">Above all, we’re results-oriented. When we find data that calls our original plan into question, we modify or pivot.</p>
    </div>
  </div>
  <div class="bg-yellow-300 rounded-[6px] p-sp-5 flex flex-col justify-between">
    <h3 class="font-heading lg:text-[40px] text-[32px] leading-[1.1]">Commitment</h3>
    <div>
      <h4 class="font-heading lg:text-[28px] text-[20px] leading-[1.1] mb-sp-3">Act with urgency</h4>
      <p class="text-[14px] leading-[1.4] mb-sp-8">We work as swiftly as possible. The mental health crisis is relentless, and so are we.</p>
      <h4 class="font-heading lg:text-[28px] text-[20px] leading-[1.1] mb-sp-3">Don’t give up</h4>
      <p class="mb-0 text-[14px] leading-[1.4]">Our clients don’t give up and neither do we. Persistence is our superpower.</p>
    </div>
  </div>
</div>