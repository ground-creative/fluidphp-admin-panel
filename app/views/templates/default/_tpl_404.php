<!DOCTYPE html>
<?=$_elements->_tpl_header?>
<body>
	<!-- Content -->
	<!-- Error -->
	<div class="container-xxl container-p-y">
		<div class="misc-wrapper">
			<h2 class="mb-2 mx-2"><?=ucwords($_lang->val('_tpl_404_headline'))?></h2>
			<p class="mb-4 mx-2"><?=ucfirst($_lang->val('_tpl_404_txt'))?></p>
			<a href="<?=$_router->get('_tpl_index')?>" class="btn btn-primary"><?=ucfirst($_lang->val('_tpl_404_btn'))?></a>
			<div class="mt-3">
				<img src="<?=$_router->path()?>/templates/default/assets/img/illustrations/page-misc-error-light.png" alt="page-misc-error-light" width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png" />
			</div>
		</div>
	</div>
	<!-- /Error -->
	<!-- / Content -->
	<?=$_resources->js()?>
	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
