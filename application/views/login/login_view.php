<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>tes</h1>

	<?php echo validation_errors(); ?>
	<?php echo form_open('verifylogin'); ?>
		<label for="username">Username</label>
		<input type="text" size="20" id="username" name="username"></input>
		</br>
		<label for="password">Password</label>
		<input type="password" id="password" name="password"></input>
		<br>
		<input type="submit" value="login"></input>
	</form>
</body>
</html>