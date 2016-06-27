<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>

<!doctype html>
<html>
<head>
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/master.css" rel="stylesheet" type="text/css">
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/menu.css" rel="stylesheet" type="text/css">
<link href="webfonts/ArchitectsDaughter/stylesheet.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Index</title>
</head>

<body>
	<div class="Container">
    	 <div class="Header"><span style="color:#f7a27b;">NFINIT</span> <span style="color:#d17c22">Gaming</span></div>
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
            <div id="content_background">
				<div id="content_news_header">
    				News
    			</div>
        		<div class="content_container">
            		<div class="content_header">
            			<span style="color:#D5AC00;">FTB Inventions</span>
            		</div>
        			<div class="content">
            			<div style="font-size:11px; font-family:Verdana, Geneva, sans-serif; margin-top:-13px;margin-bottom:10px"><span style="color: rgb(102, 102, 102);"> <b>Jun. 19, 2016, 10:14pm</b> by </span><span style="color: rgb(50, 50, 255);"> Kasparsu </span> <br> <br>
 <span style="color:white;">              
				With most of our other 1.7.10 content, balance and extended progression are focus points when designing unique packs; however, these core concepts have been throw out the window with FTB Inventions. <br> This modpack is designed for the creative styled builder, designer and ultimate factory builder. <br> For the first time ever resource gathering is eased by equivalent exchange and the main focal point is building and large technology based mods. <br> Want to make a spawn city come to life with friends or an over complicated factory mass producing most items in the pack? <br> <br> If so then FTB Inventions is for you! --Inventors, dust off your wrenchs and prepare to dive into a world where the sky is the limit!<br><br><br>

The Modpack can be downloaded from the FTB Launcher or Curse.<br><br>

Curent Version: 1.0.1 <br>
Status:<span style="color: rgb(0, 255, 50);"> Online </span><br>
IP Address:  inventions.nfinit-gaming.com
</span>

                    	</div>
                	</div>
            	</div>
         	</div>
         <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
 	</div>
</body>
</html>