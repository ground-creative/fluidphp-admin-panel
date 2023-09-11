<html lang="<?=$_lang->val('prefix')?>" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?=$_router->path()?>/templates/default/assets/" data-template="vertical-menu-template-free">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
	<title><?=ucwords($_lang->val($_router->page() . '_page_title'))?></title>
	<meta name="description" content="" />
	<meta name='robots' content='noindex,follow' />
	<?=$_resources->links()?>
	<?=$_resources->raw('_tpl_helpers-js', 'js', 'Helpers')?>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<?=$_resources->raw('_tpl_config-js', 'js')?>
</head>
