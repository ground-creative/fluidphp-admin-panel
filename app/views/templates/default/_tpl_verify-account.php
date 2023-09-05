<!DOCTYPE html>
<?=$_elements->_tpl_header?>
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
									<?=$_elements->_tpl_brand_logo?>
								</span>
								<span class="app-brand-text demo text-body fw-bolder"><?=$_lang->val('_tpl_verify_account_headline')?></span>
							</a>
						</div>
						<!-- /Logo -->
						<div class="app-brand justify-content-center" style="color: red;min-height: 150px;">
							<?php if ($_data->verification_call_data_success && $_data->verification_call_data->success == true): ?>
								<?=ucfirst($_lang->val('_tpl_verify_account_success_txt'))?>
							<?php elseif ($_data->verification_call_data->code == 104): ?>
								<?=ucfirst($_lang->val('_tpl_verify_account_already_verified_txt'))?>
							<?php elseif ($_data->verification_call_data->code == 105): ?>
								<?=ucfirst($_lang->val('_tpl_verify_account_ver_code_not_found_txt'))?>
							<?php else: ?>
								<?=ucfirst($_lang->val('_tpl_generic_error_block'))?>
							<?php endif; ?>
						</div>
						<div style="text-align: center;">
							<a href="<?=$_router->get('_tpl_login')?>"><?=ucfirst($_lang->val('_tpl_go_to_login_txt'))?></a>
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
	<script async defer src="<?=$_data->_manual_resources->buttons_js?>"></script>
  </body>
</html>
