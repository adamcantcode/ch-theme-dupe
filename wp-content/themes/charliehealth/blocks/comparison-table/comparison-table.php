<div class="grid grid-cols-1 lg:grid-cols-2 rounded-[12px] overflow-hidden">
  <?php if (have_rows('tables')) : while (have_rows('tables')) : the_row(); ?>
      <div class="bg-primary-200 lg:pl-sp-12 pl-sp-4 lg:[&:nth-child(-n+2)]:pt-sp-6 [&:nth-child(-n+2)]:pt-sp-4 lg:[&:nth-last-child(-n+2)]:pb-sp-6 [&:nth-last-child(-n+2)]:pb-sp-4 group">
        <div class="[&_*]:text-white h-full lg:border-b lg:border-pale-blue-300 lg:pr-sp-12 pr-sp-4 lg:py-sp-6 py-sp-4 lg:group-[&:nth-last-child(-n+2)]:border-none">
          <?php if (get_row_index() === 1) : ?>
            <h3 class="mb-sp-8 lg:text-[28px] text-[25px] noshow lg:block"><?= get_field('left_title'); ?></h3>
          <?php endif; ?>
          <h4 class="text-[20px] leading-[1.1] mb-sp-3"><?= get_sub_field('left_headline'); ?></h4>
          <div class="[&_*]:text-[14px] [&_*]:leading-[1.6] [&_p]:mb-sp-3">
            <?= get_sub_field('left_details'); ?>
          </div>
        </div>
      </div>
      <div class="bg-white lg:pr-sp-12 pr-sp-4 lg:[&:nth-child(-n+2)]:pt-sp-6 [&:nth-child(-n+2)]:pt-sp-4 lg:[&:nth-last-child(-n+2)]:pb-sp-6 [&:nth-last-child(-n+2)]:pb-sp-4 group">
        <div class="h-full lg:border-b lg:border-pale-blue-300 lg:pl-sp-12 pl-sp-4 lg:py-sp-6 py-sp-4 lg:group-[&:nth-last-child(-n+2)]:border-none">
          <?php if (get_row_index() === 1) : ?>
            <div class="flex-row items-center lg:flex gap-sp-4 mb-sp-8 noshow">
              <svg width="44" height="43" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M43.6987 5.24185C43.4437 2.48006 41.172 0.293056 38.4147 0.146393C34.7331 -0.0487978 9.26753 -0.0487978 5.58269 0.146393C2.82862 0.293056 0.556941 2.48006 0.300873 5.24401C-0.884906 18.215 1.43778 28.2248 7.20729 34.9929C13.4114 42.2742 21.3389 42.9525 21.8011 42.986L21.9743 43L22.1868 42.9903C22.479 42.9698 28.5343 42.4964 34.2178 37.5886L34.5918 37.2586C35.3726 36.5534 36.107 35.7968 36.7901 34.9939C42.5629 28.2323 44.8855 18.2248 43.6987 5.24185ZM3.09744 13.5876C3.01024 10.8997 3.094 8.2089 3.3482 5.53194C3.40994 4.90337 3.70467 4.32208 4.17272 3.90571L19.3382 14.3501L12.0258 19.4185L3.09744 13.5876ZM9.28347 21.3198L4.85911 24.3857C4.14664 22.137 3.65513 19.8222 3.39176 17.4753L9.28347 21.3198ZM22.0614 16.2243L29.2292 21.1602L21.9413 25.8814L14.8224 21.2378L22.0614 16.2243ZM24.7783 14.3425L39.8322 3.90894C40.2968 4.32384 40.5898 4.90164 40.6524 5.52655C40.9082 8.20521 40.9934 10.8978 40.9074 13.5876L32.0407 19.3366L24.7783 14.3425ZM40.6099 17.4699C40.3509 19.776 39.8727 22.0512 39.1819 24.2638L34.7915 21.2443L40.6099 17.4699ZM35.4631 3.17671L22.0561 12.4672L8.56201 3.17563C11.7549 3.1271 16.8763 3.1023 21.9987 3.1023C27.1212 3.1023 32.2712 3.1271 35.4631 3.17671ZM6.00239 27.3545L12.079 23.1487L19.1033 27.7309L10.0719 33.5866C9.88698 33.386 9.70317 33.1801 9.52147 32.9665C8.09221 31.2747 6.90731 29.3851 6.00239 27.3545ZM22.0242 39.8888H22.0157C21.7788 39.8726 17.0898 39.5049 12.3999 35.7574L21.936 29.575L31.5179 35.8297C27.0149 39.3852 22.5364 39.8468 22.0242 39.8888ZM34.4792 32.9644C34.2744 33.2052 34.068 33.4371 33.8597 33.6599L24.774 27.7287L31.9822 23.0582L38.0514 27.237C37.1389 29.3109 35.9357 31.24 34.4792 32.9644Z" fill="#161A3D" />
              </svg>
              <h3 class="mb-0 lg:text-[28px] text-[25px]"><?= get_field('right_title'); ?></h3>
            </div>
          <?php endif; ?>
          <div class="flex flex-row items-start gap-sp-2">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.92662 19.7297L9.93197 19.735L8.50917 21.1492L1.59961 14.2814L3.02241 12.8671L8.50382 18.3155L21.1279 5.76758L22.5507 7.18179L9.92662 19.7297Z" fill="#161A3D" />
            </svg>
            <h4 class="text-[20px] leading-[1.1] mb-sp-3"><?= get_sub_field('right_headline'); ?></h4>
          </div>
          <div class="[&_*]:text-[14px] [&_*]:leading-[1.6] [&_p]:mb-sp-3 ml-sp-8">
            <?= get_sub_field('right_details'); ?>
          </div>
        </div>
      </div>
  <?php endwhile;
  endif; ?>
</div>