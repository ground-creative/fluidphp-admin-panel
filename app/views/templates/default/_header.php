<html lang="<?=$_lang->val('prefix')?>" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?=$_router->path()?>/templates/default/assets/" data-template="vertical-menu-template-free">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
	<title><?=ucwords($_lang->val($_router->page() . '_page_title'))?></title>
	<meta name="description" content="" />
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?=$_data->_manual_resources->icon?>" />
	<!-- Fonts -->
	<link rel="preconnect" href="<?=$_data->_manual_resources->fonts_googleapis?>" />
	<link rel="preconnect" href="<?=$_data->_manual_resources->fonts_gstatic?>" crossorigin />
	<link href="<?=$_data->_manual_resources->fonts_googleapis_2?>" rel="stylesheet"/>
	<?=$_resources->css()?>
	<!-- Helpers -->
	<script src="<?=$_data->_manual_resources->helpers_js?>"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="<?=$_data->_manual_resources->config_js?>"></script>
</head>