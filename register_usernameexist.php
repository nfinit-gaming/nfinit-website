<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php

	if(isset($_POST['Register'])) {
		
		session_start();
		$UName = $_POST['User_Name'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		
		$query = $sql = $con->query("SELECT * FROM user WHERE UName='$UName'");
		$query2 = $sql = $con->query("SELECT * FROM user WHERE Email='$Email'");
		if(mysqli_num_rows($query) > 0) {
			Header('Location: register_usernameexist.php');
			}else{
				if(mysqli_num_rows($query2) > 0) {
				Header('Location: register_emailexist.php');
					}else{
						$sql = $con->query("INSERT INTO user (UName, Email, Password)Values('{$UName}', '{$Email}', '{$Password}')");
						header('Location: login.php');
			}
		}
	}
?>
<!doctype html>
<html>
<head>
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/master.css" rel="stylesheet" type="text/css">
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/menu.css" rel="stylesheet" type="text/css">
<link href="webfonts/ArchitectsDaughter/stylesheet.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Register</title>
</head>

<body>
	<div class="Container">
    	 <div class="Header"><span style="color:#f7a27b;">NFINIT</span> <span style="color:#d17c22">Gaming</span></div>
         	<div class="Menu">
                <div id="nav"> 
					<a href="index.php">HOME</a> 
           			<a href="discord.php">DISCORD</a>
                    <a href="forum.php">FORUM</a>
            			<div id="navright"> 
                			<a href="register.php">Register</a> 
                			<a href="login.php">Login</a>
            			</div>
				</div>
        	</div>
         <div class="RegisterBody">
         <div class="Exist"><h1>Username is already in use.</h1></div>
           <form action="" id="RegisterForm" name="RegisterForm" method="post">
           		<div class="FormElement">
           		 	<input name="User_Name" type="text" required="required" class="TField" id="User_Name" placeholder="Username">
           		</div>
                <div class="FormElement">
                	<input name="Email" type="Email" required="required" class="TField" id="Email" placeholder="Email">
                </div>
                <div class="FormElement">
                	<input name="Password" type="password" required="required" class="TField" id="Password" placeholder="Password">
                </div>
                <div class="FormElement">
                  <input name="Register" type="submit" class="button" id="Register" value="Button">
                </div>
           </form>
         </div> 
         <div class="Footer">
           Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com
         </div>  
    </div>
</body>
</html>