<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php
	unset($_SESSION['wronginfo']);
	unset($_SESSION['wronginfo1']);

	if(isset($_POST['Request'])) {
		
		$UName = $_POST['User_Name'];
		$Email = $_POST['Email'];
		$pwreset_code = md5($_POST['User_Name'] + microtime());
		$subject = 'Password reset for your NFINIT-Gaming account';
		$txt = 'Hello " . $UName . ".\n\nTo reset the password for this account please click link below:\n\nhttp://localhost/NFINIT-Gaming/passwordresetcon.php?email=" .$Email . "&email_code=" . $pwreset_code . " \n\n- NFINIT-Gaming.';
		$headers = 'NFINIT-Gaming.com';
		
		$query = $sql = $con->query("SELECT * FROM user WHERE UName='$UName'");
		$query2 = $sql = $con->query("SELECT * FROM user WHERE Email='$Email'");
		if(mysqli_num_rows($query) > 0) {
			$usernameex = "Yes";
			}else{
			$_SESSION["wronginfo"] = "Yes";
			session_destroy(); 
		}
		if(isset($usernameex) == "Yes"){
		if(mysqli_num_rows($query2) > 0) {
			$con->query("UPDATE user SET pwreset_code = '$pwreset_code' WHERE Email = '$Email' AND UName = '$UName'");
			mail( $Email, $subject, $txt, $headers);
			header('Location: passwordreset.php?success');			
		}else{ 
			$_SESSION["wronginfo1"] = "Yes";
			session_destroy();  
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
         <?php if (isset($_GET['success'])) {  ?>
         <form name="form1" method="post" action="">
                <div class="FormElement">Password reset requested...<br><br>Please check your email for more info</div>
         </form>
		<?php }else{ ?>
        	<form name="form1" method="post" action="">
         			<?php if(isset($_SESSION["wronginfo"])) { ?>
         				<div class="FormElement">Username not found.</div>
         			<?php } ?>            
         			<?php if(isset($_SESSION["wronginfo1"])) { ?>
         				<div class="FormElement">Email not found.</div>
         			<?php } ?> 
                <div class="FormElement"> 
           		 	<input name="User_Name" type="text" required="required" class="TField" id="User_Name" placeholder="Username">
           		</div>
                <div class="FormElement">
               	  <input name="Email" type="Email" required="required" class="TField" id="Email" placeholder="Email">
                </div>
          		<div class="FormElement">
       			  <input name="Request" type="submit" class="button" id="Update" value="Request">
                </div>
        	</form>
        <?php } ?>
         </div>
 
         <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>