<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('open-bg.jpg');
            background-size: cover;
            background-position: center;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        .dropdown {
            position: relative;
            margin: 10px;
            display: inline-block;
        }

        .dropbtn {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            min-width: 160px;
            border-radius: 4px;
        }

        .dropdown-content button {
            background-color: transparent;
            border: none;
            padding: 10px;
            width: 100%;
            text-align: left;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dropdown-content button:hover {
            background-color: #3498db;
            color: #fff;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .add-post-btn {
            background-color: #27ae60;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            margin: 10px;
            transition: background-color 0.3s;
        }

        .add-post-btn:hover {
            background-color: #2ecc71;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            position: absolute;
            top: 10px;
            right: 10px;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<div class="container">
    <div class="dropdown">
    <a href="priCM.php"><button class="dropbtn">Make Memorial</button></a>
        
    </div>

    <div class="dropdown">
        <a href="pubCM.php"><button class="dropbtn">Visit Memorial</button></a>
       
    </div>

    <a class="logout-btn" href="logout.php">Logout</a>
</div>

<?php 
}else{
    header("Location: index.php");
    exit();
}
?>

</body>
</html>
