<?php

require_once('gauth/settings.php');

?>
<html>
<head>
<title>esports Rezultati</title>
<meta charset="UTF-8">
</head>

<body>
		
	<a href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>">Login with Google</a>

</body>
</html>