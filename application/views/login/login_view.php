<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>tes</h1>
	<form action="<?php echo base_url(); ?>auth/cek_login" method="post">
		<label for="username">Username</label>
		<input type="text" id="username" name="username"></input>
		</br>
		<label for="password">Password</label>
		<input type="password" id="password" name="password"></input>
		<br>
		<input type="submit" value="login"></input>
	</form>
</body>
</html>