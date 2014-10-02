

<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$api = $root . '/api.php';
include_once($api);
$root = 'http://localhost:8888';

$data = 0;

$url = 'https://api-gw.it.umich.edu/Curriculum/SOC/v1/Terms/2010/Schools';
$class = new UMapis;
$json = $class->call_api($url);
$data = json_decode($json);

?>

<!DOCTYPE html>

<html lang="en-US">

<head>

	<title>MLink</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="<?php echo $root; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $root; ?>/css/foundation.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $root; ?>/css/normalize.css">

	<script type="text/javascript" src="<?php echo $root; ?>/js/vendor/modernizr.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>

	<script src="//www.parsecdn.com/js/parse-1.3.0.min.js"></script>

</head>

<body>
