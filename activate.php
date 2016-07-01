<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php
if(isset($_SESSION["UserID"])){	
	header('Location: index.php');
}
?>
<?php	
	unset($_SESSION['error']);
	unset($_SESSION['done']);
	 
	$_GET['email'];
	$_GET['email_code'];
	$email		 = trim($_GET['email']);
	$email_code	 = trim($_GET['email_code']);
	
	if (isset($_GET['email']) == false) {
		header('Location: index.php');
	}
		$result = $con->query("SELECT * FROM user WHERE Email='$email' AND Active='1'");
		if($result->num_rows) {
			
			$_SESSION["error"] = "Yes";
			header( "refresh:20;url=login.php" );
		
		}else{
			
		$query = $sql = $con->query("SELECT * FROM user WHERE Email='$email'");
		if (mysqli_num_rows($query) > 0)  {	
			if ($con->query("SELECT COUNT('UserID') FROM user WHERE Email = '$email' AND Email_code = '$email_code' and Active = 0")) {
			$con->query("UPDATE user SET Active = 1 WHERE Email = '$email'");
			$_SESSION["done"] = "Yes";
			header( "refresh:20;url=login.php" );
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
<title>Activate</title>
</head>

<body>
	<div class="Container">
    	 <div class="Header"><span style="color:rgb(108, 17, 248);">NFINIT</span> <span style="color:rgb(178, 39, 248);">Gaming</span></div>
			<?php if(isset($_SESSION["UserID"])){ ?>	
         	<div class="Menu">
                <div id="nav"> 
					<a href="index.php">HOME</a> 
           			<a href="discord.php">DISCORD</a>
                    <a href="forum.php">FORUM</a>
            			<div id="navright">  
                			<a href="logout.php">Logout</a>
                            <a href="updateaccount.php">Update Account</a>
            			</div>
				</div>
        	</div>
			<?php }else{ ?>
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
            <?php } ?>   
         <div class="UpdateAccountBody">
         <form name="form1" method="post" action="">
            <?php if(isset($_SESSION["error"])){ ?>
         		<div class="FormElement">Account already activated.<br><br>You will be redirected to login page in 20 sec...</div>
         	<?php } ?> 
            <?php if(isset($_SESSION["done"])){ ?>
         		<div class="FormElement">Account it now activated.<br><br>You will be redirected to login page in 20 sec...</div>
         	<?php } ?>    
          </form>       
         </div>
         <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>