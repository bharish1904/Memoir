<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="container">
     <form class="login-form"action="pubCM-check.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<input type="text" name="memid" placeholder="Memorial ID"><br>

     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <button><a href="priCM.php" class="ca">Create a Memorial</a>
 </button>
		    </form>
	 </div>
</body>
</html>