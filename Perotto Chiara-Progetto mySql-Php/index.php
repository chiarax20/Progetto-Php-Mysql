<?php 

require_once ('init.php');

?>

<html>
    <head>
        <meta charset="UTF-8">
		<title>To do</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">		
		<link href=<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/main.css">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	
        <title> LOGIN FORM </title>
    </head>

    <body>
    <div class="Page">
        <div class="Header-Bar">
		    <img  src="css/puntina.jpg" width="15%" height="15%" class="img1">
 				<div class="Menu">
						<h1>Log in</h1>
                </div>
        </div>
        <div class="List">
            <form name="login" method="post" action="">
                <p>Username</p><input type="text" name="username" autocomplete="off" >
                <p>Password</p> <input name="password" autocomplete="off"><br/>
                <button type="submit" name="login" class="Button" >Signin</button>
                <button type="submit" name="register" class="Button" >Register</button>
            </form>
            <?php


            if(isset($_POST['login'])){
                require ('login.php');
            }

            if(isset($_POST['register'])){
               require ('register.php');
            }
        ?>
        </div>
</div>
    </body>
</html>
