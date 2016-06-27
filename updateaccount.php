<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php
if(isset($_SESSION["UserID"])){	
}else{
	header('Location: login.php');
}
?>
<?php
	$User = $_SESSION["UserID"];
	$result = $con->query("SELECT * FROM user WHERE UserID='$User'");
	$row = $result->fetch_array(MYSQLI_BOTH);
	$_SESSION["UserName"] = $row['UName'];
	$_SESSION["Email"] = $row['Email'];
	$_SESSION["Password"] = $row['Password'];
?>
<?php
	if(isset($_POST['Update'])){
		
		$UpdateUName = $_POST['User_Name'];
		$UpdateEmail = $_POST['Email'];
		$UpdatePassword = $_POST['Password'];
		
		$StorePassword = password_hash($UpdatePassword, PASSWORD_BCRYPT, array('cost' => 12));
		
		$sql = $con->query("UPDATE user SET 
			UName = '{$UpdateUName}', 
			Email = '{$UpdateEmail}', 
			Password = '{$StorePassword}' 
		
		WHERE UserID = $User");
		
		header('Location: updateaccount.php');

}
?>
<!doctype html>
<html>
<head>
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/master.css" rel="stylesheet" type="text/css">
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/menu.css" rel="stylesheet" type="text/css">
<link href="webfonts/ArchitectsDaughter/stylesheet.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Update account</title>
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
                			<a href="logout.php">Logout</a>
                            <a href="updateaccount.php">Update Account</a>
            			</div>
				</div>
        	</div>
         <div class="UpdateAccountBody">
         <form name="form1" method="post" action="">
                 <div class="FormElement"> 
           		 	<input name="User_Name" type="text" required="required" class="TField" id="User_Name" value="<?php echo $_SESSION["UserName"]; ?>">
           		</div>
                <div class="FormElement">
                	<input name="Email" type="Email" required="required" class="TField" id="Email" value="<?php echo $_SESSION["Email"]; ?>">
                </div>
          		<div class="FormElement">
                	<input name="Password" type="password" required="required" class="TField" id="Password" value="<?php echo $_SESSION["Password"]; ?>">
                </div>
                <div class="FormElement">
           			<input name="Update" type="submit" class="button" id="Update" value="Update">
                </div>
         </form>
         </div>
         <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>