<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Multipress - Responsive Multipurpose HTML5 Template">
	<meta name="author" content="">

	<title><?php
			if ($title) {
				echo $title;
			}
			?></title>

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicons -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">

	<!-- Web Fonts  -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Bitter:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
	<script src="javascript/libs/respond.min.js"></script>
	<![endif]-->

	<!-- CSS -->
	<link href="<?= base_url() ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/bootstrap.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/fontselect.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/animations.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/date/css/datepicker.css" />

	<!--[if lt IE 9]>
		<script src="javascript/libs/html5.js"></script>
	<![endif]-->

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/javascript/libs/flexslider/flexslider.css" media="screen" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/javascript/libs/rs-plugin/css/settings.css" media="screen" />

	<!-- Style Switch -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/front/css/colors/light-blue-black.css" title="light-blue" media="screen" />

	<style>
		ul {
			margin: 0;
			padding: 0;
		}

		li {
			cursor: pointer;
			list-style-type: none;
			display: inline-block;
			color: #F0F0F0;
			text-shadow: 0 0 1px #666666;
			font-size: 20px;
		}

		.highlight,
		.selected {
			color: #F4B30A;
		}
	</style>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/core/libraries/jquery.min.js"></script>
	<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></!-->
	<!-- <script>tinymce.init({selector:'textarea'});</script> -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/tinymce/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea#addComment',
			plugins: [
				'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
				'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
				'save table contextmenu directionality emoticons template paste textcolor'
			],
			height: '150'
		});
	</script>

	<script>
		tinymce.init({
			selector: 'textarea#desc_karya',
			plugins: [
				'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
				'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
				'save table contextmenu directionality emoticons template paste textcolor'
			],
			height: '150'
		});
	</script>



	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script id="domain" data-name="6145876" type="text/javascript" src="<?= base_url() ?>sitespy/js/analytics_js/client.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/front/css/update.css" />
</head>