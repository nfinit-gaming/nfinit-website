<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php
if ((!isset($_SESSION['UserID'])) || ($_GET['cid'] == "")) {
	header("Location: forum.php");
	exit();
}else{

}
$cid = $_GET['cid'];
?>
<!doctype html>
<html>
<head>
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/master.css" rel="stylesheet" type="text/css">
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/menu.css" rel="stylesheet" type="text/css">
<link href="webfonts/ArchitectsDaughter/stylesheet.css" rel="stylesheet" type="text/css">
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/forum.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Forum</title>
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
         <div class="ForumBody">
             <div id="forum_create_topic">
               <form action="create_topic_parse.php" method="post">
                <label class="label">Topic Title:</label>
                <br>
                <input name="topic_title" type="text" required placeholder="Required" maxlength="150" class="topictitle"/>
                <br>
                <label class="label">Topic Content:</label>
                <br>
                <textarea name="topic_content" cols="85" rows="30" required placeholder="&lt;br&gt; to do line change." class="textarea"></textarea>
                <br /><br />
                <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
                <input name="topic_submit" type="submit" class="fbutton" value="Create Your Topic" align="middle"/>
                </form>
             </div>
         </div>
                  <div class="Footer">Site created by Kaspar Sunekaer . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>