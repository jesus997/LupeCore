<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-8" />
	<title><?= $page_name ?> | <?= $config->get('site.name') ?></title>
	<link rel="stylesheet" href="/assets/css/login.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body> <?php
	if( file_exists(__DIR__."/".$file_name.".php") ) {
		include_once(__DIR__."/".$file_name.".php");
	} else {
		echo "$file_name no existe.";
	}

	?>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="/assets/js/login.js"></script>
</body>
</html>