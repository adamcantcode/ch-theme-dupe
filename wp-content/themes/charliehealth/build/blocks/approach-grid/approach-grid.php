<?php
$lightDark = get_field('light_or_dark');
$border = $lightDark ? 'border-primary' : 'border-white';
$text = $lightDark ? '[&_*]:text-primary' : '[&_*]:text-white';
$fill = $lightDark ? '#161A3D' : '#ffffff';
?>

<div class="border-2 <?= $border; ?> rounded-[1rem] lg:p-sp-12 p-sp-4 grid lg:grid-cols-[4fr_8fr] gap-x-sp-5 approach-grid-js">
  <div class="grid content-between">
    <div class="order-2 lg:order-1 <?= $text; ?>">
      <h2 class="font-heading-serif mb-sp-8"><?= get_field('heading'); ?></h2>
      <?php if (get_field('heading')) : ?>
        <div>
          <?= get_field('details'); ?>
          <?php if (get_field('image')) : ?>
            <img src="<?= get_field('image')['url']; ?>" alt="<?= get_field('image')['alt']; ?>">
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="order-1 lg:order-2 mb-sp-10 lg:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 150 148" class="w-[28px]">
        <path fill="<?= $fill; ?>" d="M148.973 17.9582c-.87-9.46171-8.614-16.95421-18.014-17.456668-12.551-.668709-99.3651-.668709-111.9271 0C9.64303 1.00399 1.89866 8.49649 1.0257 17.9656-3.01673 62.4033 4.90151 96.6959 24.5703 119.883c21.1503 24.945 48.1759 27.269 49.7516 27.384l.5904.048.7245-.034c.9961-.07 21.6393-1.692 41.0142-18.506l1.276-1.13c2.661-2.416 5.165-5.008 7.494-7.759 19.68-23.1642 27.598-57.4494 23.552-101.9278ZM10.5595 46.5501c-.2973-9.2086-.0118-18.4271.8548-27.5981.2105-2.1534 1.2152-4.1449 2.8109-5.5714l51.7003 35.7815-24.9283 17.3643-30.4377-19.9763Zm21.0887 26.4897L16.5651 83.5434c-2.4288-7.7039-4.1044-15.6341-5.0023-23.6745l20.0854 13.1709Zm43.5611-17.4566L99.645 72.4931 74.8 88.6677 50.531 72.7591l24.6783-17.1759Zm9.2621-6.4469 51.3196-35.7446c1.585 1.4214 2.583 3.4009 2.797 5.5418.872 9.1769 1.162 18.4016.869 27.6166l-30.228 19.6955-24.7576-17.1093Zm53.9716 10.7141c-.883 7.9005-2.513 15.6953-4.868 23.2755l-14.967-10.3447 19.835-12.9308Zm-17.546-48.9673L75.1912 42.7115l-46.0025-31.832c10.8848-.1663 28.3441-.2513 45.8069-.2513 17.4629 0 35.0204.085 45.9014.2549ZM20.4627 93.7144l20.7156-14.4086 23.9467 15.698-30.7891 20.0612c-.6303-.687-1.2569-1.393-1.8763-2.124-4.8725-5.796-8.9119-12.27-11.9969-19.2266Zm54.6199 42.9416h-.029c-.8078-.056-16.7928-1.315-32.7814-14.154l32.5097-21.181 32.6651 21.429c-15.3507 12.181-30.6185 13.762-32.3644 13.906Zm42.4604-23.723c-.698.825-1.402 1.62-2.112 2.383L84.4569 94.9964l24.5731-16.001 20.691 14.3163c-3.111 7.1053-7.213 13.7143-12.178 19.6213Z" />
      </svg>
    </div>
  </div>
  <?php if (have_rows('grid')) :  ?>
    <?php
    if (!get_field('grid_bg')) {
      $bgColors = [
        1 => 'bg-lavender-300',
        2 => 'bg-orange-300',
        3 => 'bg-pale-blue-200',
        4 => 'bg-yellow-300',
        5 => 'bg-pale-blue-300',
        6 => 'bg-white'
      ];
    } else {
      $bgColors = [
        1 => 'bg-primary-100',
        2 => 'bg-primary-100',
        3 => 'bg-primary-100',
        4 => 'bg-primary-100',
        5 => 'bg-primary-100',
        6 => 'bg-primary-100'
      ];
    }
    ?>
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-sp-2 grid-approach-items-js auto-rows-fr <?= get_field('grid_bg') ? '[&_*]:!text-white' : ''; ?>">
      <?php while (have_rows('grid')) : the_row(); ?>
        <?php if (get_sub_field('title')) : ?>
          <div class="text-center <?= $bgColors[get_row_index()]; ?> rounded-[6px] py-sp-10 px-sp-7 flex flex-col items-center justify-center opacity-0">
            <p class="text-h4-base"><?= get_sub_field('title'); ?></h5>
          </div>
        <?php endif; ?>
        <?php if (get_sub_field('link')) : ?>
          <div class="text-center <?= get_field('grid_bg') ? '[&_*]:!text-white bg-primary-100' : 'bg-white'; ?> rounded-[6px] py-sp-10 px-sp-7 flex flex-col items-center justify-center relative group opacity-0">
            <svg width="27" height="22" viewBox="0 0 27 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-all mb-sp-2 group-hover:translate-x-[5px] duration-300">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M22.054 9.3431L14.3818 1.67092L16.0527 0L26.6686 10.6159L16.0527 21.2319L14.3818 19.561L22.2366 11.7061L2.08616e-07 11.7061L0 9.34311L22.054 9.3431Z" fill="<?= get_field('grid_bg') ? '#FFFFFF' : '#161A3D'; ?>" />
            </svg><a href="<?= get_sub_field('link')['url']; ?>" target="<?= get_sub_field('link')['target']; ?>" class="no-underline stretched-link text-h4-base"><?= get_sub_field('link')['title']; ?></a>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</div>