<!DOCTYPE html>
<?=$_elements->_header?>
<body>
	<!-- Content -->
	<div class="container-xxl">
		<div class="authentication-wrapper authentication-basic container-p-y">
			<div class="authentication-inner">
				<!-- Register Card -->
				<div class="card">
					<div class="card-body">
						<!-- Logo -->
						<div class="app-brand justify-content-center">
							<a href="#" class="app-brand-link gap-2">
								<span class="app-brand-logo demo">
									<?=$_elements->_brand_logo?>
								</span>
								<span class="app-brand-text demo text-body fw-bolder"><?=$_lang->val('_tpl_check_email_headline')?></span>
							</a>
						</div>
						<!-- /Logo -->
						<div class="app-brand justify-content-center" style="min-height: 150px;">
							<?=ucfirst($_lang->val('_tpl_check_email_txt'))?>
						</div>
					</div>
				</div>
				<!-- Register Card -->
			</div>
		</div>
	</div>
    <!-- / Content -->
	<?=$_resources->js()?>
    <!-- Page JS -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
