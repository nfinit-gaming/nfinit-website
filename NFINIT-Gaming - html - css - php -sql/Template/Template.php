<?php require '../NFINIT-Gaming/Connections/Connections.php'; ?>

<!doctype html>
<html>
<head>
<link href="../NFINIT-Gaming/NFINIT-Gaming-CSS/master.css" rel="stylesheet" type="text/css">
<link href="../NFINIT-Gaming/NFINIT-Gaming-CSS/menu.css" rel="stylesheet" type="text/css">
<link href="../webfonts/ArchitectsDaughter/stylesheet.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Register</title>
</head>

<body>
	<div class="Container">
    	 <div class="Header"><span style="color:rgb(108, 17, 248);">NFINIT</span> <span style="color:rgb(178, 33, 203);">Gaming</span></div>
			<?php if(isset($_SESSION["UserID"])){ ?>	
         	<div class="Menu">
                <div id="nav"> 
					<a href="../index.php">HOME</a> 
           			<a href="../discord.php">DISCORD</a>
                    <a href="../forum.php">FORUM</a>
            			<div id="navright">  
                			<a href="../logout.php">Logout</a>
                            <a href="../updateaccount.php">Update Account</a>
            			</div>
				</div>
        	</div>
			<?php }else{ ?>
         	<div class="Menu">
                <div id="nav"> 
					<a href="../index.php">HOME</a> 
           			<a href="../discord.php">DISCORD</a>
                    <a href="../forum.php">FORUM</a>
            			<div id="navright"> 
                			<a href="../register.php">Register</a> 
                			<a href="../login.php">Login</a>
            			</div>
				</div>
        	</div>
            <?php } ?>   
         <div class="LeftBody"></div>
         <div class="RightBody"></div> 
         <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>