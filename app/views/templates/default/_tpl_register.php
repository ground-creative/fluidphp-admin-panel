<!DOCTYPE html>
<?=$_elements->_tpl_header?>
<body>
	<div id="loading-overlay" style="display: none"></div>
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
								<span class="app-brand-text demo text-body fw-bolder"><?=$_lang->val('_tpl_register_page_title')?></span>
							</a>
						</div>
						<!-- /Logo -->
						<h4 class="mb-2"><?=ucfirst($_lang->val('_tpl_register_headline'))?></h4>
						<!--<p class="mb-4">Make your app management easy and fun!</p>-->
						<form id="formAuthentication" class="mb-3" method="POST">
							<div class="mb-3">
								<label for="reg_firstname" class="form-label"><?=$_lang->val('_tpl_firstname')?></label>
								<input type="text" class="form-control" id="reg_firstname" name="reg_firstname" placeholder="<?=ucfirst($_lang->val('_tpl_firstname_placeholder'))?>" />
							</div>
							<div class="mb-3">
								<label for="reg_email" class="form-label"><?=$_lang->val('_tpl_lastname')?></label>
								<input type="text" class="form-control" id="reg_lastname" name="reg_lastname" placeholder="<?=ucfirst($_lang->val('_tpl_lastname_placeholder'))?>" />
							</div>
							<div class="mb-3">
								<label for="reg_email" class="form-label"><?=$_lang->val('_tpl_email')?></label>
								<input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="<?=ucfirst($_lang->val('_tpl_email_placeholder'))?>" />
							</div>
							<div class="mb-3 form-password-toggle">
								<label class="form-label" for="reg_pass"><?=$_lang->val('_tpl_password')?></label>
								<div class="input-group input-group-merge">
									<input type="password" id="reg_pass" class="form-control" name="reg_pass" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
									<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
								</div>
							</div>
							<div class="mb-3 form-password-toggle">
								<label class="form-label" for="reg_pass_again"><?=$_lang->val('_tpl_password_repeat')?></label>
								<div class="input-group input-group-merge">
									<input type="password" id="reg_pass_again" class="form-control" name="reg_pass_again" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
									<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
								</div>
							</div>
							<div class="mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="terms_conditions" name="terms_conditions" />
									<label class="form-check-label" for="terms_conditions">
										<?=$_lang->val('_tpl_privacy_block', ['__PRIVACY_POLICY__' => $_router->get('_tpl_privacy_policy')])?>
									</label>
								</div>
							</div>
							<button class="btn btn-primary d-grid w-100" id="reg_send"><?=$_lang->val('_tpl_register_btn_txt')?></button>
							<div id="l_err_msg_div" class="mb-3" style="display: none;margin-top: 10px;">
								<!-- Error Alert -->
								<div class="alert alert-danger alert-dismissible fade show">
									<span id="l_err_msg">
										<?=$_lang->val('_tpl_generic_error_block')?>
									</span>
								</div>
							</div>
						</form>
						<p class="text-center">
							<span><?=ucfirst($_lang->val('_tpl_already_have_account'))?></span>
							<a href="<?=$_router->get('_tpl_login')?>">
								<span><?=ucfirst($_lang->val('_tpl_sign_instead'))?></span>
							</a>
						</p>
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
