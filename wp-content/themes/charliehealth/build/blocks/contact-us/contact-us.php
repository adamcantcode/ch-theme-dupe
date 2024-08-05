<div class="grid lg:grid-cols-[4fr_8fr] gap-base5-4">
  <div>
    <h2><?= get_field('headline'); ?></h2>
  </div>
  <div class="border-y-2 border-primary py-base5-5">
    <?php if (have_rows('contact_info')) : ?>
      <?php while (have_rows('contact_info')) : the_row(); ?>
        <h3><?= get_sub_field('heading'); ?></h3>
        <?php if (get_sub_field('description')) : ?>
          <?= get_sub_field('description'); ?>
        <?php endif; ?>
        <?php if (get_sub_field('phone')) : ?>
          <p>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block mr-base5-2">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 3.75002V6.00003C3.75 13.8701 10.1299 20.25 18 20.25H20.25V15.5406L15.3799 13.9172L14.1543 16.3684C13.9743 16.7285 13.5422 16.8822 13.1752 16.7167C10.5638 15.5393 8.46071 13.4363 7.28329 10.8248C7.11784 10.4578 7.27157 10.0257 7.63159 9.84571L10.0828 8.62008L8.45943 3.75L3.75 3.75002ZM3 2.25003L9 2.25C9.32282 2.25 9.60943 2.45657 9.71151 2.76283L11.7115 8.76283C11.8295 9.11691 11.6692 9.5039 11.3354 9.67082L8.96962 10.8537C9.92192 12.6215 11.3785 14.0781 13.1463 15.0304L14.3292 12.6646C14.4961 12.3308 14.8831 12.1705 15.2372 12.2885L21.2372 14.2885C21.5434 14.3906 21.75 14.6772 21.75 15V21C21.75 21.4142 21.4142 21.75 21 21.75H18C9.30152 21.75 2.25 14.6985 2.25 6.00003V3.00003C2.25 2.58582 2.58578 2.25003 3 2.25003Z" fill="#161A3D" />
            </svg>
            Phone: <a href="<?= get_sub_field('phone')['url']; ?>"><?= get_sub_field('phone')['title']; ?></a>
          </p>
        <?php endif; ?>
        <?php if (get_sub_field('email')) : ?>
          <p>Email: </p>
        <?php endif; ?>
        <?php if (get_sub_field('fax')) : ?>
          <p>Fax: </p>
        <?php endif; ?>
        <?php if (get_sub_field('link')) : ?>
          <p>[BUTTON]</p>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>