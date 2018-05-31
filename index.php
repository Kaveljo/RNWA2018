<?php

require_once('gauth/settings.php');

?>

<html>
<head>

	<title>esports Rezultati</title>
	<meta charset="UTF-8">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="remake.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
			
</head>

<body>	
	
	<div class="centered">
	<h1 id="headline">Dobrodošli na e-sports rezultate</h1>
	<button type="submit" class="loginBtn loginBtn--google" onclick="window.location.href='<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>'">
	Login with Google account
	</button>
	</div>
	
	<!--
	<a href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>">Login with Google</a>
	-->
	
</body>
</html>