<div class="grid justify-between gap-base5-4">
  <?php if (have_rows('links')) : ?>
    <?php while (have_rows('links')) : the_row(); ?>
    <?php 
    $link    = get_sub_field('headline'); 
    $subhead = get_sub_field('subhead'); 
    ?>
      <div class="relative flex flex-col justify-between transition-all bg-white rounded-sm group lg:p-base5-5 p-base5-3 hover:bg-pale-blue-100">
        <div class="flex justify-between gap-base5-4">
          <h3 class="flex-1 text-h2-base font-heading"><?= $link['title']; ?></h3>
          <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-all group-hover:translate-x-sp-2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4065 0.281473L19.8429 6.39729C20.2993 6.77258 20.2993 7.38106 19.8429 7.75636L12.4065 13.8722C11.9502 14.2475 11.2103 14.2475 10.754 13.8722C10.2976 13.4969 10.2976 12.8884 10.754 12.5131L16.1956 8.03783H0.320312V6.11582H16.1956L10.754 1.64054C10.2976 1.26525 10.2976 0.65677 10.754 0.281473C11.2103 -0.0938243 11.9502 -0.0938243 12.4065 0.281473Z" fill="#161A3D" />
          </svg>
        </div>
        <p class="mb-0 text-h4-base"><?= $subhead; ?></p>
        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="stretched-link contents"></a>
      </div>
  <?php endwhile;
  endif; ?>
</div>