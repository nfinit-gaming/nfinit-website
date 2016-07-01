<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>

<!doctype html>
<html>
<head>
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/master.css" rel="stylesheet" type="text/css">
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/menu.css" rel="stylesheet" type="text/css">
<link href="webfonts/ArchitectsDaughter/stylesheet.css" rel="stylesheet" type="text/css">
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/forum.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Forum</title>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/anonymous-pro:n4:default.js" type="text/javascript"></script>

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
         <div id="forum_content">
         <?php
         $sql = "SELECT * FROM categories ORDER BY category_title ASC";
		 $res = $con->query($sql) or die(mysqli_error());
		 $categories = "";
		 
		 if (mysqli_num_rows($res) > 0) {
			while ($row = $res->fetch_array(MYSQLI_ASSOC)){
		 		$id = $row['id'];
		 		$title = $row['category_title'];
		 		$description = $row['category_description'];
		 		$categories .= "<a href='view_category.php?cid=".$id."' class='cat_links'>".$title." - <font size='-0'>".$description."</font></a>";
	 		}
			echo $categories;
		 }else{
		 	echo "<p>There are no categories available yet.</p>";
		 }
		 
		 ?>
         </div>
         </div>
                  <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>