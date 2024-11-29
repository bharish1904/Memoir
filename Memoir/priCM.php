<!DOCTYPE html>
<html>
<head>
    <title>Create Memorial</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="priCM-check.php" method="post">
        <h2>Create Memorial</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
            
            <button><a href="post.php" style="text-decoration: none; color: white;">Add Post</a></button>
        <?php } else { ?>
          <label for="" style="font-size: small;">Memorial ID</label>
            <?php if (isset($_GET['memid'])) { ?>
                <input type="text" 
                       name="memid" 
                       
                       value="<?php echo $_GET['memid']; ?>"><br>
            <?php } else { ?>
                <input type="text" 
                       name="memid" 
                       placeholder=""><br>
            <?php } ?>
            <label for="" style="font-size: small;">Memorial Name</label>
            <?php if (isset($_GET['memname'])) { ?>
                <input type="text" 
                       name="memname" 
                       
                       value="<?php echo $_GET['memname']; ?>"><br>
            <?php } else { ?>
                <input type="text" 
                       name="memname" 
                       placeholder=""><br>
            <?php } ?>
            <label for="date_of_death" style="font-size: small;">Date of Death</label>

            <?php if (isset($_GET['date'])) { ?>
                <input type="date" 
                       name="date" 
                       placeholder="Issue Date"
                       value="<?php echo $_GET['date']; ?>"><br>
            <?php } else { ?>
                <input type="date" 
                       name="date" 
                       placeholder="Issue Date"><br>
            <?php } ?>
            <label for="date_of_death" style="font-size: small;">Password</label>
            <input type="password" 
                   name="password" 
                   placeholder=""><br>
                   <label for="date_of_death" style="font-size: small;">Re-Password</label>
            <input type="password" 
                   name="re_password" 
                   placeholder=""><br>

            <button type="submit">Create</button>
            <button><a href="home.php" style="text-decoration: none; color: white;">Cancel</a></button>
        <?php } ?>
     </form>
</body>
</html>
