<?php
	include_once("functions.inc.php");
	
	// get user and password from POST
	if( !empty($_POST) ) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		// check if user can login (use function)
		if( canILogin($email, $password) ) {
			session_start();
			$_SESSION['email'] = $email;

			// if ok -> redirect to index.php
			header('Location: index.php');
		}
		else {
			$error = "Login failed";
		}
	} 
	
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To do app - Log in</title>
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet"></head>
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="todologin">
		<div class="form form--login">
			<form action="" method="post">
			<h2 class="form__title">To do app —— Log in </h2>

				<?php if( isset($error) ): ?>
				<div class="form__error">
					<p>
						You can't log in, maybe you made a typo, please try again. 
					</p>
				</div>
				<?php endif; ?>

				<div class="form__field">
					<input type="text" id="email" name="email" placeholder="Username" class="inputField">
				</div>
				<div class="form__field">
					<input type="password" id="password" name="password" placeholder="Password" class="inputField">
				</div>

				<div class="form__field">
					<input type="submit" value="Let's log in!" class="btn btn--primary">	
					<p id ="getAccount">New here? <a href="register.php">Create an account!</a></p>

				
				</div>

			</form>
		</div>
	</div>
</body>
</html>