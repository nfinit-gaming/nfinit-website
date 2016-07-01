<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php
if(isset($_SESSION["UserID"])){	
	header('Location: index.php');
}
?>
<?php	
	unset($_SESSION['error']);
 
	$_GET['email'];
	$_GET['email_code'];
	$email		 = trim($_GET['email']);
	$pwreset_code	 = trim($_GET['email_code']);
	$pwreset = md5(microtime());
	
	if (isset($_GET['email']) == false) {
		header('Location: index.php');
	}
	if(isset($_POST['Submit'])) {
		
	$Password = $_POST['Password'];
	$Password2 = $_POST['Password2'];
	
	if($Password == $Password2) {
	$StorePassword = password_hash($Password, PASSWORD_BCRYPT, array('cost' => 12));
	
	if ($con->query("SELECT COUNT('UserID') FROM user WHERE Email = '$email' AND pwreset_code = '$pwreset_code'")) {
	$con->query("UPDATE user SET Password = '$StorePassword' WHERE Email = '$email'");
	$con->query("UPDATE user SET pwreset_code = '$pwreset' WHERE Email = '$email'");
	header('Location: index.php');
		}
	}else{
	$_SESSION["error"] = "Yes";
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
<title>Password reset</title>
</head>

<body>
	<div class="Container">
    	 <div class="Header"><span style="color:rgb(108, 17, 248);">NFINIT</span> <span style="color:rgb(178, 33, 203);">Gaming</span></div>
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
			<div class="passwordresetBody">
      	  	<form name="form1" method="post" action="">
            <?php if(isset($_SESSION["error"])){ ?>
         		<div class="FormElement">Passwords doesn't match.</div>
         	<?php } ?> 
                <div class="FormElement">
               	  <input name="Password" type="password" required="required" class="TField" id="Password" placeholder="Password">
                </div>
                <div class="FormElement">
                	<input name="Password2" type="password" required="required" class="TField" id="Password2" placeholder="Confirm password">
                </div>
          		<div class="FormElement">
       			  <input name="Submit" type="submit" class="button" id="Update" value="Submit">
                </div>
        	</form>
         </div> 
         <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>