<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="container">
     <form class="login-form"action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <button><a href="signup.php" class="ca" style="color: white; text-decoration: none;">Create an account</a>

 </button>
		    </form>
	 </div>
</body>
</html>