<div class="grid grid-cols-[4fr_8fr] gap-base5-4">
  <div>
    <h2><?= get_field('headline'); ?></h2>
  </div>
  <div>
    <?php if (have_rows('contact_info')) : ?>
      <?php while (have_rows('contact_info')) : the_row(); ?>
        <h3><?= get_field('heading'); ?></h3>
        <?php if (get_field('phone')) : ?>
          <p>Phone: </p>
        <?php endif; ?>
        <?php if (get_field('email')) : ?>
          <p>Email: </p>
        <?php endif; ?>
        <?php if (get_field('fax')) : ?>
          <p>Fax: </p>
        <?php endif; ?>
        <?php if (get_field('link')) : ?>
          <p>[BUTTON]</p>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>