<?php if (get_field('show_mobile_sticky_button')) : ?>
	<div id="stickyCTA">
		<div class="sticky-cta-js bg-white px-sp-5 py-[10px] fixed bottom-[-100%] w-full opacity-0 invisible transition-all duration-500 z-50 md:noshow">
			<a href="tel:+18664848218" class="w-full ch-button button-primary" target="_self">1 (866) 484-8218</a>
		</div>
	</div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var stickyCTA = document.querySelector('.sticky-cta-js');
			var footer = document.querySelector('footer');
			var triggerOffset = window.innerHeight;

			window.addEventListener('scroll', function() {
				var scrollPosition = window.scrollY;
				var footerOffset = footer.offsetTop - triggerOffset;

				if (scrollPosition > triggerOffset && scrollPosition < footerOffset) {
					stickyCTA.classList.remove('opacity-0', 'invisible', 'bottom-[-100%]');
					stickyCTA.classList.add('bottom-0');
				} else if (scrollPosition >= footerOffset) {
					stickyCTA.classList.add('opacity-0', 'invisible', 'bottom-[-100%]');
					stickyCTA.classList.remove('bottom-0');
				} else {
					stickyCTA.classList.add('opacity-0', 'invisible', 'bottom-[-100%]');
					stickyCTA.classList.remove('bottom-0');
				}
			});
		});
	</script>
<?php endif; ?>
<?php if (get_field('enable_page_popup')) : ?>
	<?php
	$image['url'] = 'https://www.charliehealth.com/wp-content/uploads/2024/08/Clinician_07-1.png.webp';
	$image['alt'] = 'A young adult on a couch contemplating virtual therapy for depression at Charlie Health';
	if (!empty(get_field('image'))) {
		$image['url'] = get_field('image')['url'];
		$image['alt'] = get_field('image')['alt'];
	}
	?>
	<div class="page-modal-popup noshow">
		<div id="pageModalPopup" class="bg-[rgba(0,0,0,.7)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade">
			<div class="transition-all duration-300 section-xs">
				<div class="relative rounded-md container-sm bg-cream !max-w-[950px]">
					<div class="absolute top-0 right-0 z-10 cursor-pointer">
						<img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/close-x.svg" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0 invert lg:invert-0">
					</div>
					<div class="grid lg:grid-cols-[1fr_2fr] items-center lg:h-[500px]">
						<div class="relative h-full rounded-bl-none bg-primary rounded-tl-md lg:rounded-bl-md rounded-tr-md lg:rounded-tr-none">
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="object-contain w-full h-full lg:rounded-tl-md lg:rounded-tr-none lg:rounded-bl-md rounded-t-md max-h-[20vh] lg:max-h-none">
							<img src="https://www.charliehealth.com/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg" alt="Charlie Health shield logo" class="w-[2rem] absolute lg:bottom-base5-5 lg:left-base5-5 bottom-base5-3 left-base5-3">
						</div>
						<div class="lg:p-base5-10 p-base5-3">
							<div class="flex flex-col justify-center">
								<p class="text-h1-base lg:text-h1-lg text-h2"><?= get_field('heading'); ?></p>
								<p class="text-h4-base lg:mb-base5-10 mb-base5-5"><?= get_field('subhead'); ?></p>
								<?php include(get_template_directory() . '/includes/button-group.php'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="popupScripts">
			<script>
				window.addEventListener('DOMContentLoaded', () => {
					// Function to create a cookie
					function createCookie(name, value, days) {
						var expires = '';
						if (days) {
							var date = new Date();
							date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
							expires = '; expires=' + date.toUTCString();
						}
						document.cookie = name + '=' + value + expires + '; path=/';
					}

					// Function to check if the cookie exists
					function getCookie(name) {
						var nameEQ = name + '=';
						var cookies = document.cookie.split(';');
						for (var i = 0; i < cookies.length; i++) {
							var cookie = cookies[i];
							while (cookie.charAt(0) === ' ') {
								cookie = cookie.substring(1, cookie.length);
							}
							if (cookie.indexOf(nameEQ) === 0) {
								return cookie.substring(nameEQ.length, cookie.length);
							}
						}
						return null;
					}

					function handleOpen() {
						if (!getCookie('page_modal_popup')) {
							var modal = document.getElementById('pageModalPopup');

							modal.classList.toggle('modal-fade');

							// Trigger VWO Event for Modal Open
							window.VWO = window.VWO || [];
							VWO.event = VWO.event || function() {
								VWO.push(["event"].concat([].slice.call(arguments)))
							};
							VWO.event("modalOpen");

							createCookie('page_modal_popup', 'true', 1);
							modal.addEventListener('click', (event) => {
								if (event.target.id === 'pageModalPopup') {
									modal.classList.toggle('modal-fade');

									// Trigger close event
									if (event.target.classList.contains('modal-fade')) {
										window.VWO = window.VWO || [];
										VWO.event = VWO.event || function() {
											VWO.push(['event'].concat([].slice.call(arguments)))
										};
										VWO.event('modalCLose')
									}
								}
							});
							const closeButton = modal.querySelector('.modal-close');
							closeButton.addEventListener('click', () => {
								modal.classList.toggle('modal-fade');

								// Trigger close event
								window.VWO = window.VWO || [];
								VWO.event = VWO.event || function() {
									VWO.push(['event'].concat([].slice.call(arguments)))
								};
								VWO.event('modalCLose')
							});
						}
					}
					setTimeout(() => {
						if(!document.querySelector('.page-modal-popup').classList.contains('noshow')) {
							handleOpen();
						}
					}, 8000);
				});
			</script>
		</div>
	</div>
<?php endif; ?>
<footer id="footer" class="grid bg-secondary-soft relatve">
	<div class="section-sm-top section-lg-bottom ">
		<div class="container">
			<div class="rounded-sm lg:flex bg-lavender-300 p-sp-8 mb-sp-12">
				<?php
				$removeNewsletterPages = get_field('footer_removal_pages', 'options');
				$removeNewsletter = false;
				if (!empty($removeNewsletterPages)) {
					$currentPage = get_queried_object_id();
					if (in_array($currentPage, $removeNewsletterPages)) {
						$removeNewsletter = true;
					}
				}
				?>
				<?php if (!$removeNewsletter) : ?>
					<div class="flex-grow">
						<p class="font-heading !text-[28px]">Sign up for our email newsletter</p>
						<p class="text-[14px] leading-[130%] noshow">Get mental health updates, research, insights, and resources directly to your inbox.</p>
						<div id="newsletterFooter" class="w-full lg:w-2/5">
							<?php include('wp-content/themes/charliehealth/includes/newsletter-form.php'); ?>
						</div>
					</div>
				<?php endif; ?>
				<div>
					<div class="flex gap-sp-1 mt-base5-2 lg:mt-0">
						<a href="https://www.facebook.com/charliehealth" target="_blank">
							<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'); ?>" alt="Facebook logo" class="w-[42px] h-[42px] p-[10px]" />
						</a>
						<a href="https://www.linkedin.com/company/charlie-health/" target="_blank">
							<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'); ?>" alt="LinkedIn logo" class="w-[42px] h-[42px] p-[10px]" />
						</a>
						<a href="https://twitter.com/charliehealth" target="_blank">
							<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/x-blue.svg'); ?>" alt="Twitter (X) logo" class="w-[42px] h-[42px] p-[10px]" />
						</a>
						<a href="https://www.instagram.com/charliehealth/" target="_blank">
							<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/instagram.svg'); ?>" alt="Instagram logo" class="w-[42px] h-[42px] p-[10px]" />
						</a>
						<a href="https://www.tiktok.com/@charliehealth" target="_blank">
							<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/tik-tok.svg'); ?>" alt="TikTok logo" class="w-[42px] h-[42px] p-[10px]" />
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="grid grid-cols-2 lg:grid-flow-col lg:grid-cols-6 py-sp-12 gap-sp-6">
				<?php
				if (have_rows('footer_navigation_item_new', 'option')) :
					while (have_rows('footer_navigation_item_new', 'option')) : the_row();
						$heading = get_sub_field('footer_column_heading')
				?>
						<div class="flex flex-col lg:mb-0 mb-sp-6">
							<p class="font-heading text-nav-normal mb-sp-4 last:mb-0 text-lavender-200"><?= $heading; ?></p>
							<?php
							if (have_rows('footer_submenu_items', 'option')) :
								while (have_rows('footer_submenu_items', 'option')) : the_row();
									$sublinkUrl = get_sub_field('footer_sublink')['url'];
									$sublinkTitle = get_sub_field('footer_sublink')['title'];
							?>
									<a href="<?= $sublinkUrl; ?>" class="text-white no-underline font-heading text-nav-small mb-[14px] last:mb-0 hover:text-lavender-200"><?= $sublinkTitle; ?></a>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="container ">
			<div class="flex flex-col justify-between lg:flex-row">
				<div class="w-full rounded-t-sm lg:rounded-l-sm lg:rounded-r-none py-sp-5 px-sp-6 bg-lavender-100">
					<p class="mb-0 text-[14px] leading-none">If this is a life-threatening emergency, please call 911 or the <a href="https://988lifeline.org/" target="_blank" class="text-darker-blue text-[14px]">National Suicide Prevention Lifeline</a></p>
				</div>
				<div class="rounded-b-sm bg-lavender-300 lg:rounded-r-sm lg:rounded-l-none py-sp-5 px-sp-6">
					<a href="tel:+988" class="flex items-center no-underline gap-sp-2 text-darker-blue">
						<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/phone.svg'); ?>" width="25" alt="phone call icon">
						<div class="text-[14px]">988</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section bg-primary">
		<div class="container mb-sp-8">
			<div class="flex flex-wrap lg:flex-nowrap gap-x-sp-6">
				<?php
				if (have_rows('secondary_navigation_items', 'option')) :
					while (have_rows('secondary_navigation_items', 'option')) : the_row();
						$link = get_sub_field('secondary_menu_item')
				?>
						<a href="<?= $link['url']; ?>" class="text-white no-underline font-heading text-mini mb-sp-3 last:mb-0 hover:!text-lavender-200"><?= $link['title']; ?></a>
				<?php endwhile;
				endif; ?>
				<a role="button" onclick="Osano.cm.showDrawer('osano-cm-dom-info-dialog-open')" class="text-white no-underline font-heading text-mini mb-sp-3 last:mb-0 hover:!text-lavender-200">Cookie Preferences</a>
			</div>
		</div>
		<div class="container mb-sp-8">
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]">CH MH Services (CA) LLC is certified by the State Department of Health Care Services (Lic. #300414AP expiring 06/30/2025). For detailed information on our California Facility Licensure, please visit <a href="https://geohub-cadhcs.hub.arcgis.com/" target="_blank" class="!text-white text-[12px] leading-snug underline">the California Health and Human Services Department’s website.</a></p>
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]">All professional medical services are provided by licensed physicians and clinicians affiliated with independently owned and operated professional practices. For patients in California, this is known as “CH Medical CA, P.C.” For patients in North Carolina or New Jersey, this is known as “CH Medical NC NJ, P.C.” For patients in New York, this is known as “CH Medical NY”. For patients in all other states, this is known as “Charlie Health Medical, P.A.” Charlie Health, Inc. provides administrative and technology services to the CH Medical practices it supports, and does not provide any professional medical services itself.</p>
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]">If you are located in California, the below applies to you, subject to applicable law:</p>
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]"><em>Your health plan’s contracted network providers may also offer in-office appointments. Health plan’s telehealth and in-person services are subject to the same timely access to care standards. If you have out-of-network benefits, and utilize out-of-network services, you are subject to the plan’s cost-sharing obligation and balance billing protections. Contact your health plan to learn more.</em></p>
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]"><em>You have a right to access your medical records. Records of the care you receive from Charlie Health will be shared with your primary care provider (PCP) via an electronic patient record system or provided in a different manner unless you opt out.</em></p>
		</div>
		<div class="container">
			<div class="grid lg:grid-cols-2 grid-cols-[2fr_1fr] gap-base5-4">
				<div class="flex items-center">
					<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield.svg'); ?>" alt="Charlie health shield logo" class="w-sp-8" />
					<span class="text-white text-[12px] ml-sp-4">© <?= date('Y'); ?> Charlie Health, Inc. All rights reserved.</span>
				</div>
				<div class="flex items-center justify-end legit-script-img gap-base5-2">
					<script src="https://static.legitscript.com/seals/7088078.js"></script>
					<a href="https://www.jointcommission.org/" target="_blank">
						<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/gold-seal.webp'); ?>" alt="The Joint Commission logo that links to the Joint Commission homepage" class="ml-auto">
					</a>
				</div>
				<style>
					.legit-script-img img {
						width: 50px
					}
				</style>
			</div>
		</div>
	</div>
</footer>
<?php
if (wp_get_environment_type() === 'production') {
	include('wp-content/themes/charliehealth/includes/footer-code.php');
}
?>
<?php if (is_user_logged_in()) : ?>
	<!-- NOTE Fix wpadmin like nav -->
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
			var adminBar = document.getElementById('wpadminbar');
			if (adminBar) {
				adminBar.style.position = 'fixed';
			}
		});
	</script>
<?php endif; ?>
<!-- Rocket Excludes Delay JS -->
<?php include('includes/rocket-skip-js.php'); ?>
<!-- END Rocket Excludes Delay JS -->
<?php wp_footer(); ?>
<!-- <pre class="fixed left-0 right-0 w-full text-xs text-center text-[#87889A] bottom-4 -z-50">Better care, from anywhere ❤️ Carter Barnhart</pre> -->
</body>

</html>