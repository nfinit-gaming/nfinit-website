<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php
if(isset($_SESSION["UserID"])){	
	header('Location: index.php');
}else{

}
?>
<?php
	unset($_SESSION['wronginfo']);
	unset($_SESSION['wronginfo1']);
	unset($_SESSION['wronginfo2']);
	
	if(isset($_POST['Register'])) {
		
		$UName = $_POST['User_Name'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$Password2 = $_POST['Password2'];
		$Active = '0';
		$Email_code = md5($_POST['User_Name'] + microtime());
		$pwreset_code = md5(microtime());
		$subject = 'Activate your NFINIT-Gaming account';
		$txt = '"Hello " . $UName . ".\n\nTo activate your account please click link below:\n\nhttp://localhost/NFINIT-Gaming/activate.php?email=" .$Email . "&email_code=" . $Email_code . " \n\n- NFINIT-Gaming"';
		$headers = 'NFINIT-Gaming.com';
		
		$StorePassword = password_hash($Password, PASSWORD_BCRYPT, array('cost' => 12));
		
		$query = $sql = $con->query("SELECT * FROM user WHERE UName='$UName'");
		$query2 = $sql = $con->query("SELECT * FROM user WHERE Email='$Email'");
		if($Password == $Password2) {
			if(mysqli_num_rows($query) > 0) {
				$_SESSION["wronginfo"] = "Yes";
				}else{
					if(mysqli_num_rows($query2) > 0) {
						$_SESSION["wronginfo1"] = "Yes";
						}else{
							$sql = $con->query("INSERT INTO user (UName, Email, Password, Active, Email_code, pwreset_code)Values('{$UName}', '{$Email}', '{$StorePassword}', '{$Active}', '{$Email_code}', '{$pwreset_code}')");
							mail( $Email, $subject, $txt, $headers);
							header('Location: register.php?success');
						}
					}
		}else{
			$_SESSION["wronginfo2"] = "Yes";
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
         <div class="RegisterBody">
        <?php if (isset($_GET['success'])) {  ?>
         <form name="form1" action="">
                <div class="FormElement"<h1>Please see your email to activate your account.</h1></div>
         </form>
		<?php }else{ ?>
        <form action="" id="RegisterForm" name="RegisterForm" method="post">
            <?php if(isset($_SESSION["wronginfo"])){ ?>
         		<div class="FormElement">Username already in use.</div>
         	<?php } ?> 
            <?php if(isset($_SESSION["wronginfo1"])){ ?>
         		<div class="FormElement">Email already in use.</div>
         	<?php } ?> 
            <?php if(isset($_SESSION["wronginfo2"])){ ?>
         		<div class="FormElement">Passwords doesn't match.</div>
         	<?php } ?>  
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
                	<input name="Password2" type="password" required="required" class="TField" id="Password2" placeholder="Confirm password">
                </div>
                <div class="FormElement">
                  <input name="Register" type="submit" class="button" id="Register" value="Button">
                </div>
           </form>
         <?php } ?>  
</div> 
         <div class="Footer">
           Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com
         </div>  
    </div>
</body>
</html>