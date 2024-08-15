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
<div id="chatBubbleWrapper" class="noshow">
	<div id="chatBubbleContainer" class="fixed lg:bottom-[100px] lg:right-[100px] bottom-base5-2 right-base5-2 z-50 grid justify-items-end gap-base5-5">
		<div id="chatBubbleContent" class="grid invisible transition-all border-2 border-white rounded-md opacity-0 translate-y-base5-4">
			<div class="bg-primary-100 py-base5-3 px-base5-5 rounded-t-md">
				<h3 class="text-white">How can we help?</h3>
			</div>
			<div class="grid bg-primary p-base5-5 gap-base5-2 rounded-b-md">
				<a href="https://www.charliehealth.com/insurance" class="ch-button button-secondary inverted !rounded-[6px]">Learn more about insurance</a>
				<a href="https://www.charliehealth.com/faqs" class="ch-button button-secondary inverted !rounded-[6px]">FAQs</a>
				<a href="https://www.charliehealth.com/form" class="ch-button button-primary inverted !rounded-[6px]">I'm ready to get started</a>
			</div>
		</div>
		<div id="chatBubbleButton" class="rounded-[100%] p-base5-3 bg-lavender-300 inline-block text-right cursor-pointer transition-all opacity-0 translate-y-base5-4">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#161A3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lg:w-[30px] lg:h-[30px] w-[25px] h-[25px] open">
				<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="lg:w-[30px] lg:h-[30px] w-[25px] h-[25px] close noshow">
				<path fill="#161A3D" fill-rule="evenodd" d="M5.293 5.293a1 1 0 0 1 1.414 0L12 10.586l5.293-5.293a1 1 0 1 1 1.414 1.414L13.414 12l5.293 5.293a1 1 0 0 1-1.414 1.414L12 13.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L10.586 12 5.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
			</svg>
		</div>
	</div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			setTimeout(() => {
				const chatBubbleContent = document.querySelector('#chatBubbleContent');
				const chatBubbleButton = document.querySelector('#chatBubbleButton');

				chatBubbleButton.classList.toggle('opacity-0')
				chatBubbleButton.classList.toggle('translate-y-base5-4')

				chatBubbleButton.addEventListener('click', function() {
					chatBubbleContent.classList.toggle('invisible')
					chatBubbleContent.classList.toggle('opacity-0')
					chatBubbleContent.classList.toggle('translate-y-base5-4')
					chatBubbleButton.querySelector('.open').classList.toggle('noshow')
					chatBubbleButton.querySelector('.close').classList.toggle('noshow')
				})
			}, 1000);
		});
	</script>
</div>
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
						<div class="flex flex-col lg:mb-0 mb-sp-6 <?= get_row_index() === 4 ? 'mt-[-124px] lg:mt-0' : ''; ?> ">
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