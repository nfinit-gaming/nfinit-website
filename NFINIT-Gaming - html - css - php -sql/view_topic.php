<?php require 'NFINIT-Gaming/Connections/Connections.php';
$topics = '';
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
         	<?php
			include('function.php');
				$cid = $_GET['cid'];
				$tid = $_GET['tid'];
				
				$sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
				$res = $con->query($sql) or die(mysql_error());
				if (mysqli_num_rows($res) == 1) {
					echo "<table width='100%'>";
					
					if (isset($_SESSION['UserID'])) { echo "<tr><td colspan='2'><input type='submit' value='Add Reply' onClick=\"window.location = 'post_reply.php?cid=".$cid."&tid=".$tid."'\" /><hr />"; } else { echo "<tr><td colspan='2'><div class='link'><p>Please log in to add your reply.</p><hr /></div></td></tr>"; }
					
					while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
						$ttitle = $row['topic_title'];
						
						$sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
						$res2 = $con->query($sql2) or die(mysql_error());
						while ($row2 = $res2->fetch_array(MYSQLI_ASSOC)) {
							$creator = $row2['post_creator'];
							$date = $row2['post_date'];
							$content = $row2['post_content'];
						
							echo "<tr><td valign='top' style='border: 1px solid #000000;'><div class='topic'><span style='color:#B227F8'>".$ttitle."</span><br><span style='color: rgb(102, 102, 102);'>by ".getusername($creator)." - ".convertdate($date)."</span><hr color='#bfbfbf'><span style='color:#fff'>".$content."</span></div></td></tr>";						
							
						}
						
						$old_views = $row['topic_views'];
						$new_views = $old_views + 1;
						$sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
						$res3 = $con->query($sql3) or die(mysql_error());
						echo "</table>";
						}
				} else {
					echo "<p>This topic does not exist.</p>";
				}
            ?>
       </div>
       <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>
    </div>
</body>
</html>