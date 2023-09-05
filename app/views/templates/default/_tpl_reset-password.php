<!DOCTYPE html>
<?=$_elements->_tpl_header?>
<body>
	<div id="loading-overlay" style="display: none"></div>
	<!-- Content -->
	<div class="container-xxl">
		<div class="authentication-wrapper authentication-basic container-p-y">
			<div class="authentication-inner py-4">
				<!-- Forgot Password -->
				<div class="card">
					<div class="card-body">
						<!-- Logo -->
						<div class="app-brand justify-content-center">
							<a href="index.html" class="app-brand-link gap-2">
								<span class="app-brand-logo demo">
									<?=$_elements->_tpl_brand_logo?>
								</span>
								<span class="app-brand-text demo text-body fw-bolder"><?=$_lang->val('_tpl_change_pass_headline')?></span>
							</a>
						</div>
						<!-- /Logo -->
						<!--<h4 class="mb-2">Forgot Password?</h4>-->
						<p class="mb-4"><?=$_lang->val('_tpl_change_pass_text')?></p>
						<form id="formAuthentication" class="mb-3" method="POST">
							<div class="mb-3">
								<label for="reset_pass" class="form-label"><?=$_lang->val('_tpl_new_password')?></label>
								<input type="password" class="form-control" id="reset_pass" name="reset_pass" placeholder="<?=ucfirst($_lang->val('_tpl_enter_password_placeholder'))?>" autofocus />
							</div>
							<div class="mb-3">
								<label for="reset_pass_again" class="form-label"><?=$_lang->val('_tpl_repeat_password')?></label>
								<input type="password" class="form-control" id="reset_pass_again" name="reset_pass_again" placeholder="<?=ucfirst($_lang->val('_tpl_enter_password_placeholder'))?>" autofocus />
							</div>
							<button class="btn btn-primary d-grid w-100" id="reset_pass_send"><?=ucfirst($_lang->val('_tpl_change_password_btn_txt'))?></button>
						</form>
						<div id="l_err_msg_div" class="mb-3" style="display: none;margin-top: 10px;">
							<!-- Error Alert -->
							<div class="alert alert-danger alert-dismissible fade show text-center">
								<span id="l_err_msg">
									<?=$_lang->val('_tpl_generic_error_block')?>
								</span>
							</div>
						</div>
						<div id="l_success_msg_div" class="mb-3" style="display: none;margin-top: 10px;">
							<!-- Success Alert -->
							<div class="alert alert-primary alert-dismissible fade show text-center">
								<span id="l_success_msg">
									<?=ucfirst($_lang->val('_tpl_change_password_success_txt'))?>
								</span>
							</div>
						</div>
						<div class="text-center">
							<a href="<?=$_router->get('_tpl_login')?>" class="d-flex align-items-center justify-content-center">
								<i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
								<?=ucfirst($_lang->val('_tpl_go_to_login_txt'))?>
							</a>
						</div>
					</div>
				</div>
				<!-- /Forgot Password -->
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