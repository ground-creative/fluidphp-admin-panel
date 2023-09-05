<!DOCTYPE html>
<?=$_elements->_tpl_header?>
<body>
	<div id="loading-overlay" style="display: none"></div>
	<!-- Content -->
	<div class="container-xxl">
		<div class="authentication-wrapper authentication-basic container-p-y">
			<div class="authentication-inner">
				<!-- Register -->
				<div class="card">
					<div class="card-body">
						<!-- Logo -->
						<div class="app-brand justify-content-center">
							<a href="index.html" class="app-brand-link gap-2">
								<span class="app-brand-logo demo">
									<?=$_elements->_tpl_brand_logo?>
								</span>
								<span class="app-brand-text demo text-body fw-bolder"><?=$_lang->val('_tpl_login_headline')?></span>
							</a>
						</div>
						<!-- /Logo -->
						<!--<h4 class="mb-2"><?=ucfirst($_lang->val('_tpl_login_headline_1'))?></h4>-->
						<p class="mb-4"><?=ucfirst($_lang->val('_tpl_login_txt'))?></p>
						<form id="formAuthentication" class="mb-3" action="index.html" method="POST">
							<div class="mb-3">
								<label for="l_username" class="form-label"><?=ucfirst($_lang->val('_tpl_email'))?></label>
								<input type="text" class="form-control" id="l_username" name="l_username" placeholder="<?=ucfirst($_lang->val('_tpl_email_placeholder'))?>" autofocus />
							</div>
							<div class="mb-3 form-password-toggle">
								<div class="d-flex justify-content-between">
									<label class="form-label" for="l_pass"><?=ucfirst($_lang->val('_tpl_password'))?></label>
									<a href="<?=$_router->get('_tpl_forgot_password')?>">
										<small><?=$_lang->val('_tpl_forgot_password_headline')?></small>
									</a>
								</div>
								<div class="input-group input-group-merge">
									<input type="password" id="l_pass" class="form-control" name="l_pass" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
									<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
								</div>
							</div>
							<div class="mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="remember_me" name="remember_me" />
									<label class="form-check-label" for="remember_me"> <?=ucfirst($_lang->val('_tpl_remember_me'))?> </label>
								</div>
							</div>
							<div class="mb-3">
								<button class="btn btn-primary d-grid w-100" id="l_send"><?=ucfirst($_lang->val('_tpl_login_btn_txt'))?></button>
							</div>
							<div id="l_err_msg_div" class="mb-3" style="display: none;margin-top: 10px;">
								<!-- Error Alert -->
								<div class="alert alert-danger alert-dismissible fade show text-center">
									<span id="l_err_msg">
										<?=$_lang->val('_tpl_generic_error_block')?>
									</span>
								</div>
							</div>
						</form>
						<p class="text-center">
							<span><?=ucfirst($_lang->val('_tpl_login_new_platform_txt'))?></span>
							<a href="<?=$_router->get('_tpl_register')?>">
								<span><?=ucfirst($_lang->val('_tpl_login_new_create_account_txt'))?></span>
							</a>
						</p>
					</div>
				</div>
				<!-- /Register -->
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
