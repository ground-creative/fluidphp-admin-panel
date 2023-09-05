<!DOCTYPE html>
<?=$_elements->_tpl_header?>
<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<?=$_elements->_tpl_left_menu;?>	
			<!-- Layout container -->
			<div class="layout-page">
				<?=$_elements->_tpl_top_bar;?>
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->
					<div class="container-xxl flex-grow-1 container-p-y">
						<div class="row">
							<?=$_content?>
						</div>
					</div>
					<!-- / Content -->
					<?=$_elements->_tpl_footer?>
				</div>
				<!-- Content wrapper -->
			</div>
			<!-- / Layout page -->
		</div>
		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>
	<!-- / Layout wrapper -->
	<?=$_resources->js()?>
	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
