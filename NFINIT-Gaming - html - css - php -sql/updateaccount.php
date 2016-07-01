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
	unset($_SESSION['wronginfo']);
	unset($_SESSION['wronginfo1']);
?>
<?php
	if(isset($_POST['Update'])){	
		$UpdatePassword = $_POST['Password'];
		$UpdatePassword2 = $_POST['Password2'];
		$CPassword = $_POST['CPassword'];
		
		
		if(password_verify($CPassword, $row['Password'])){
			if($UpdatePassword == $UpdatePassword2){
				$StorePassword = password_hash($UpdatePassword, PASSWORD_BCRYPT, array('cost' => 12));
				$con->query("UPDATE user SET Password = '{$StorePassword}' WHERE UserID = '$User'");
				header('Location: updateaccount.php?success');
				header( "refresh:20;url=index.php" );
			}else{
				$_SESSION["wronginfo1"] = "Yes";
			}
		}else{
		$_SESSION["wronginfo"] = "Yes";	
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
<title>Update account</title>
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
                			<a href="logout.php">Logout</a>
                            <a href="updateaccount.php">Update Account</a>
            			</div>
				</div>
        	</div>
         <div class="UpdateAccountBody">
         <?php if (isset($_GET['success'])) {  ?>
         <form name="form1" method="post" action="">
                <div class="FormElement">Information has been updated...<br><br><a href="index.php">Click here to get back to home page...</a></div>
         </form>         
         <?php }else{ ?>
         <form name="form1" method="post" action="">
         	<?php if(isset($_SESSION["wronginfo"])){ ?>
         		<div class="FormElement">Oops...<br>Wrong password...</div>
         	<?php } ?> 
			 <?php if(isset($_SESSION["wronginfo1"])){ ?>
         		<div class="FormElement">Oops...<br>The new passwords didn't match...</div>
         	<?php } ?> 
            	<div class="FormElement">
                	<input name="CPassword" type="password" required="required" class="TField" id="CPassword" placeholder="Current password">
                </div>
          		<div class="FormElement">
                	<input name="Password" type="password" class="TField" id="Password" placeholder="New password">
                </div>
                <div class="FormElement">
               	 	<input name="Password2" type="password" class="TField" id="Password2" placeholder="Confirm new password">
                </div>
           		<div class="FormElement">
           			<input name="Update" type="submit" class="button" id="Update" value="Update">
                </div>
         </form>
         <?php } ?>
         </div>
         <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>