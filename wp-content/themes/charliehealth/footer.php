<div class="sticky-cta-js bg-white px-sp-5 py-[10px] fixed bottom-0 w-full opacity-0 invisible transition-all duration-300 z-50 md:noshow">
	<a href="/form" class="w-full ch-button button-primary" target="_self">Get Started</a>
</div>
<footer id="footer" class="grid bg-secondary-soft relatve">
	<div class="section">
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
		<div class="container">
			<div class="grid grid-cols-2 lg:grid-flow-col lg:grid-cols-6 py-sp-12 gap-y-sp-6 lg:gap-y-0">
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
									<a href="<?= $sublinkUrl; ?>" class="text-white no-underline font-heading text-nav-normal mb-[14px] last:mb-0 hover:text-lavender-200"><?= $sublinkTitle; ?></a>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="container">
			<?php if (!is_page('newsletter-thank-you')) : ?>
				<div class="rounded-sm lg:flex bg-primary p-sp-8">
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
					<?php if (!0 == true) : ?>
						<div class="flex-grow">
							<h3 class="text-white font-heading mb-sp-2 text-[28px]">Stay connected</h3>
							<p class="text-white text-[14px] leading-[130%]">Get mental health updates, research, insights, and resources directly to your inbox.</p>
							<div id="newsletterFooter" class="w-full lg:w-2/5 newsletter-revamp footer-newsletter">
								<script type="text/javascript" src="https://charliehealth-nrkok.formstack.com/forms/js.php/newsletter_blog_revamp"></script><noscript><a href="https://charliehealth-nrkok.formstack.com/forms/newsletter_blog_revamp" title="Online Form">Online Form - Newsletter - Blog Revamp</a></noscript>
								<script>
									var container = document.currentScript.parentNode; // Newsletter container
									var elementToCut = container.querySelector("#fsSubmitButton5194985"); // Submit button
									var destinationElement = container.querySelector("#fsCell140490700"); // Email container
									var newsletterID = container.id; // Newlsetter identifier
									var newsletterLPField = container.querySelector('#field142799721'); // LP URL field
									var newsletterIDField = container.querySelector('#field146376375'); // Type field
									if (elementToCut && destinationElement) {
										var clonedElement = elementToCut.cloneNode(true);
										elementToCut.parentNode.removeChild(elementToCut);
										destinationElement.appendChild(clonedElement);
									}
									newsletterIDField.value = newsletterID;
									newsletterLPField.value = window.location.href;
									// Remove duplicate default formstack stlyes styles
									const styles = document.querySelectorAll('footer style');
									styles.forEach(style => {
										const clonedStyle = style.cloneNode(true);
										document.head.appendChild(clonedStyle);
										style.parentNode.removeChild(style);
									});
								</script>
							</div>
						</div>
					<?php endif; ?>
					<div>
						<div class="flex gap-sp-1">
							<a href="https://www.facebook.com/charliehealth" target="_blank">
								<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'); ?>" alt="Facebook logo" class="w-[42px] h-[42px] p-[10px] filter-white" />
							</a>
							<a href="https://www.linkedin.com/company/charlie-health/" target="_blank">
								<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'); ?>" alt="LinkedIn logo" class="w-[42px] h-[42px] p-[10px] filter-white" />
							</a>
							<a href="https://twitter.com/charliehealth" target="_blank">
								<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/x.svg'); ?>" alt="Twitter (X) logo" class="w-[42px] h-[42px] p-[10px] filter-white" />
							</a>
							<a href="https://www.instagram.com/charliehealth/" target="_blank">
								<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/instagram.svg'); ?>" alt="Instagram logo" class="w-[42px] h-[42px] p-[10px] filter-white" />
							</a>
							<a href="https://www.tiktok.com/@charliehealth" target="_blank">
								<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/tik-tok.svg'); ?>" alt="TikTok logo" class="w-[42px] h-[42px] p-[10px] filter-white" />
							</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
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
						<a href="<?= $link['url']; ?>" class="text-white no-underline font-heading text-nav-normal mb-sp-3 last:mb-0 hover:text-lavender-200"><?= $link['title']; ?></a>
				<?php endwhile;
				endif; ?>
				<a role="button" onclick="Osano.cm.showDrawer('osano-cm-dom-info-dialog-open')" class="text-white no-underline font-heading text-nav-normal mb-sp-3 last:mb-0 hover:text-lavender-200">Cookie Preferences</a>
			</div>
		</div>
		<div class="container mb-sp-8">
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]">All professional medical services are provided by licensed physicians and clinicians affiliated with independently owned and operated professional practices. For patients in California, this is known as “CH Medical CA, P.C.” For patients in North Carolina or New Jersey, this is known as “CH Medical NC NJ, P.C.” For patients in New York, this is known as “CH Medical NY”. For patients in all other states, this is known as “Charlie Health Medical, P.A.” Charlie Health, Inc. provides administrative and technology services to the CH Medical practices it supports, and does not provide any professional medical services itself.</p>
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]">If you are located in California, the below applies to you, subject to applicable law:</p>
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]"><em>Your health plan’s contracted network providers may also offer in-office appointments. Health plan’s telehealth and in-person services are subject to the same timely access to care standards. If you have out-of-network benefits, and utilize out-of-network services, you are subject to the plan’s cost-sharing obligation and balance billing protections. Contact your health plan to learn more.</em></p>
			<p class="text-[#87889A] text-[12px] leading-snug mb-sp-[12px]"><em>You have a right to access your medical records. Records of the care you receive from Charlie Health will be shared with your primary care provider (PCP) via an electronic patient record system or provided in a different manner unless you opt out.</em></p>
		</div>
		<div class="container">
			<div class="grid lg:grid-cols-2 grid-cols-[2fr_1fr]">
				<div class="flex items-center">
					<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield.svg'); ?>" alt="Charlie health shield logo" class="w-sp-8" />
					<span class="text-white text-[12px] ml-sp-4">© <?= date('Y'); ?> Charlie Health, Inc. All rights reserved.</span>
				</div>
				<a href="https://www.jointcommission.org/" target="_blank">
					<img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/gold-seal.webp'); ?>" alt="The Joint Commission logo that links to the Joint Commission homepage" class="ml-auto w-[56px]">
				</a>
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