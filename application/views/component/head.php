<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Effion | <?= $title ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

	<link href="<?= base_url() ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">

	<?php
	if (isset($page_css)) {
		$this->load->view($page_css);
	} else {
		echo '';
	}
	?>
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/loaders/blockui.min.js"></script>

	<!-- /core JS files -->

	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/forms/selects/select2.min.js"></script>

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/app.js"></script>
	<?php
	if (isset($page_js)) {
		$this->load->view($page_js);
	} else {
		echo '';
	}
	?>
	<!-- /theme JS files -->


</head>