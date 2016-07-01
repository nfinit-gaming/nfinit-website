<?php require 'NFINIT-Gaming/Connections/Connections.php'; 

if(isset($_SESSION["UserID"])){	
	header('Location: index.php');
}else{

}

	unset($_SESSION['LogInFail']);
	unset($_SESSION['LogInFail2']);
	
	if(isset($_POST['Login'])){
		
		$Email = $_POST['email'];
		$Password = $_POST['password'];
		$date = new DateTime();
		$lastlogin = $date->format('y-m-d H:i:s') . "\n";

		$result = $con->query("SELECT * FROM user WHERE Email='$Email'");
		$result2 = $con->query("SELECT * FROM user WHERE Email='$Email' AND Active='1'");
		$row = $result->fetch_array(MYSQLI_BOTH);
		
		if(password_verify($Password, $row['Password'])){
			$pw = "Yes";
			}else{
			$_SESSION["LogInFail"] = "Yes";
		}
		if(isset($pw) == "Yes"){
		if($result2->num_rows) {
			$_SESSION["UserID"] = $row['UserID'];
			$con->query("UPDATE user SET Last_login = '{$lastlogin}' WHERE Email = '$Email'");
			header('Location: index.php');
		}else{
			$_SESSION["LogInFail2"] = "Yes";	
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
<title>Login</title>
</head>

<body>
	<div class="Container">
    	 <div class="Header"><span style="color:rgb(108, 17, 248);">NFINIT</span> <span style="color:rgb(178, 33, 203);">Gaming</span></div>
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
			<div class="LoginBody">
         <form name="form1" method="post" action="">
         <?php if(isset($_SESSION["LogInFail"])){ ?>
         	<div class="FormElement">Login failed! Please try again.</div>
         <?php } ?>   
         <?php if(isset($_SESSION["LogInFail2"])){ ?>
         	<div class="FormElement">Account not activated.</div>
         <?php } ?>  
         	<div class="FormElement">
       		  <input name="email" type="email" required="required" class="TField" id="email" placeholder="Email">
         	</div>
            <div class="FormElement">
              <input name="password" type="password" required="required" class="TField" id="password" placeholder="Password">
            </div>
            <div class="FormElement">
              <input name="Login" type="submit" class="button" id="Login" value="Login">
            </div>
         </form>
         </div> 
         <div class="passwordresetlink"><a href="passwordreset.php">Reset password</a></div>
      <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>