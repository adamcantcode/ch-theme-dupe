<?php
$heading     = get_field('heading');
$steps       = get_field('steps');
$ctaHeadline = get_field('cta_heading');
$image = get_field('image')
?>
<section class="section-bg-js bg-grey-warm">
  <div class="section-top pin-section">
    <div class="container pin-container">
      <h4 class="text-center"><?= $heading; ?></h4>
      <div>
        <div class="lg:grid-cols-[3fr_6fr_3fr] step-items-container noshow lg:grid">
          <div class="lg:mt-[50vh]">
            <div class="step-item lg:mb-[33vh] mb-sp-8 flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M15.8209 21.3914H14.0569V12.1394H11.5909V11.7434C13.2289 11.1674 14.4349 10.3754 15.2449 9.04336H15.8209V21.3914Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <div>
                  <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[0]['title']; ?></h3>
                  <?= $steps[0]['description']; ?>
                </div>
              </div>
            </div>
            <div class="step-item lg:mb-[33vh] mb-sp-8 lg:mt-[33vh] flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M14.1949 21.6074C12.2689 21.6074 10.9009 20.4914 10.1269 19.0154L10.4689 18.7454C11.1889 19.6994 12.1249 20.3294 13.4929 20.3294C15.2209 20.3294 16.4269 19.2314 16.4269 17.5754C16.4269 15.9194 15.1669 15.0914 13.2589 15.0914V14.6594L16.6069 10.9154V10.8254H10.7929V9.15136H18.6409V9.58336L14.3029 14.4434V14.5154C16.9129 14.6054 18.3529 16.0274 18.3529 17.8994C18.3529 20.2934 16.2289 21.6074 14.1949 21.6074Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[2]['title']; ?></h3>
                <?= $steps[2]['description']; ?>
              </div>
            </div>
            <div class="step-item lg:mb-[33vh] mb-sp-8 lg:mt-[33vh] flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M14.2008 21.6074C12.3108 21.6074 10.9248 20.5094 10.1328 19.0154L10.4568 18.7454C11.2488 19.7894 12.2208 20.3294 13.5168 20.3294C15.2088 20.3294 16.4508 19.2674 16.4508 17.5394C16.4508 16.0634 15.4248 15.0374 13.8588 15.0374C12.7608 15.0374 11.9688 15.4154 11.2488 15.9374H11.1948L12.2028 9.15136H18.1968V10.8254H12.5808L11.9508 15.0374H12.0228C12.5808 14.4974 13.4628 13.9394 14.7048 13.9394C16.5948 13.9394 18.3588 15.3434 18.3588 17.5034C18.3588 19.7894 16.6668 21.6074 14.2008 21.6074Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[4]['title']; ?></h3>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][0]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][0]['attribution']; ?>, Charlie Health Alum</p>
                </div>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][1]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][1]['attribution']; ?>, Charlie Health Alum</p>
                </div>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][2]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][2]['attribution']; ?>, Charlie Health Alum</p>
                </div>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][3]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][3]['attribution']; ?>, Charlie Health Alum</p>
                </div>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][4]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][4]['attribution']; ?>, Charlie Health Alum</p>
                </div>
              </div>
            </div>
          </div>
          <div class="relative pin-image-end-js justify-self-center noshow lg:block">
            <img src="<?= $image['url']; ?>" alt="<?= $alt; ?>" class="pin-image-js">
          </div>
          <div class="lg:mt-[50vh]">
            <div class="step-item lg:mb-[33vh] mb-sp-8 lg:mt-[33vh] flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M18.2671 19.7174V21.3914H10.3831V20.9594L13.2271 18.1694C15.1171 16.3514 16.1971 14.9834 16.1971 13.0934C16.1971 11.3474 15.0631 10.2134 13.4251 10.2134C12.1291 10.2134 11.3371 10.8254 10.7431 11.5454L10.4191 11.2574C11.2471 9.81736 12.5611 8.93536 14.2891 8.93536C16.4491 8.93536 18.1411 10.3574 18.1411 12.4634C18.1411 14.4794 16.6291 16.0094 14.5051 17.9714L12.7051 19.6274V19.7174H18.2671Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <div>
                  <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[1]['title']; ?></h3>
                  <?= $steps[1]['description']; ?>
                </div>
              </div>
            </div>
            <div class="step-item lg:mb-[33vh] mb-sp-8 flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M16.8184 21.3914H15.1444V18.1694H9.22241V17.7374L16.3504 9.04336H16.8184V16.6034H19.5364V18.1694H16.8184V21.3914ZM15.0724 11.5634L11.0044 16.5314V16.6034H15.1444V11.5634H15.0724Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <div>
                  <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[3]['title']; ?></h3>
                  <?= $steps[3]['description']; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="lg:grid-cols-[3fr_6fr_3fr] step-items-container grid lg:noshow">
          <div class="relative pin-image-end-js justify-self-center">
            <img src="<?= $image['url']; ?>" alt="<?= $alt; ?>" class="pin-image-js">
          </div>
          <div class="lg:mt-[50vh]">
            <div class="step-item lg:mb-[33vh] mb-sp-8 flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M15.8209 21.3914H14.0569V12.1394H11.5909V11.7434C13.2289 11.1674 14.4349 10.3754 15.2449 9.04336H15.8209V21.3914Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <div>
                  <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[0]['title']; ?></h3>
                  <?= $steps[0]['description']; ?>
                </div>
              </div>
            </div>
            <div class="step-item lg:mb-[33vh] mb-sp-8 lg:mt-[33vh] flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M18.2671 19.7174V21.3914H10.3831V20.9594L13.2271 18.1694C15.1171 16.3514 16.1971 14.9834 16.1971 13.0934C16.1971 11.3474 15.0631 10.2134 13.4251 10.2134C12.1291 10.2134 11.3371 10.8254 10.7431 11.5454L10.4191 11.2574C11.2471 9.81736 12.5611 8.93536 14.2891 8.93536C16.4491 8.93536 18.1411 10.3574 18.1411 12.4634C18.1411 14.4794 16.6291 16.0094 14.5051 17.9714L12.7051 19.6274V19.7174H18.2671Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[1]['title']; ?></h3>
                <?= $steps[1]['description']; ?>
              </div>
            </div>
            <div class="step-item lg:mb-[33vh] mb-sp-8 flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M14.1949 21.6074C12.2689 21.6074 10.9009 20.4914 10.1269 19.0154L10.4689 18.7454C11.1889 19.6994 12.1249 20.3294 13.4929 20.3294C15.2209 20.3294 16.4269 19.2314 16.4269 17.5754C16.4269 15.9194 15.1669 15.0914 13.2589 15.0914V14.6594L16.6069 10.9154V10.8254H10.7929V9.15136H18.6409V9.58336L14.3029 14.4434V14.5154C16.9129 14.6054 18.3529 16.0274 18.3529 17.8994C18.3529 20.2934 16.2289 21.6074 14.1949 21.6074Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <div>
                  <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[2]['title']; ?></h3>
                  <?= $steps[2]['description']; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="lg:mt-[50vh]">
            <div class="step-item lg:mb-[33vh] mb-sp-8 lg:mt-[33vh] flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M16.8184 21.3914H15.1444V18.1694H9.22241V17.7374L16.3504 9.04336H16.8184V16.6034H19.5364V18.1694H16.8184V21.3914ZM15.0724 11.5634L11.0044 16.5314V16.6034H15.1444V11.5634H15.0724Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <div>
                  <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[3]['title']; ?></h3>
                  <?= $steps[3]['description']; ?>
                </div>
              </div>
            </div>
            <div class="step-item lg:mb-[33vh] mb-sp-8 lg:mt-[33vh] flex">
              <div class="mt-sp-1 mr-[10px]">
                <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="14.5" cy="14.8914" r="13.75" stroke="#161A3D" stroke-width="1.5" />
                  <path d="M14.2008 21.6074C12.3108 21.6074 10.9248 20.5094 10.1328 19.0154L10.4568 18.7454C11.2488 19.7894 12.2208 20.3294 13.5168 20.3294C15.2088 20.3294 16.4508 19.2674 16.4508 17.5394C16.4508 16.0634 15.4248 15.0374 13.8588 15.0374C12.7608 15.0374 11.9688 15.4154 11.2488 15.9374H11.1948L12.2028 9.15136H18.1968V10.8254H12.5808L11.9508 15.0374H12.0228C12.5808 14.4974 13.4628 13.9394 14.7048 13.9394C16.5948 13.9394 18.3588 15.3434 18.3588 17.5034C18.3588 19.7894 16.6668 21.6074 14.2008 21.6074Z" fill="#161A3D" />
                </svg>
              </div>
              <div>
                <h3 class="font-heading text-[28px] leading-[140%] mb-[10px]"><?= $steps[4]['title']; ?></h3>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][0]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][0]['attribution']; ?>, Charlie Health Alum</p>
                </div>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][1]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][1]['attribution']; ?>, Charlie Health Alum</p>
                </div>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][2]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][2]['attribution']; ?>, Charlie Health Alum</p>
                </div>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][3]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][3]['attribution']; ?>, Charlie Health Alum</p>
                </div>
                <div class="absolute opacity-0 get-started-quote-js">
                  <div class="bg-white py-sp-4 px-sp-5 mb-sp-4 rounded-[6px]">
                    <h4 class="mb-sp-0">"<?= $steps[4]['quotes'][4]['quote']; ?>"</h4>
                  </div>
                  <p>—<?= $steps[4]['quotes'][4]['attribution']; ?>, Charlie Health Alum</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-horizontal section-bg-js-cta">
    <div class="container-sm">
      <div class="pin-cta-js flex flex-col justify-center h-[100vh]">
        <div class="pin-cta-js-motion">
          <div class="flex justify-center rounded-sm lg:px-sp-14 lg:pt-sp-14 pb-sp-6 px-sp-6">
            <div class="flex flex-col items-center justify-center text-center max-w-[37.5rem]">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
              <h2 class="text-darkest-blue lg:text-[2.5rem] text-h2-lg lg:leading-tight mb-sp-5 font-heading-serif"><?= $ctaHeadline; ?></h2>
              <?php include(get_template_directory() . '/includes/button-group.php'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>