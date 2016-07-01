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
         <div id="forum_content">
         	<?php
			    include('function.php');
				$cid = $_GET['cid'];
				
				if (isset($_SESSION['UserID'])) {
				$logged = " | <a href='create_topic.php?cid=".$cid."' class='link'>Click Here To Create A Topic</a>";
				} else {
				$logged = " | Please log in to create topics in this forum.";
				}	
				
				$sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
			    $res = $con->query($sql) or die(mysql_error());
				
				if (mysqli_num_rows($res) == 1) {
					$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
					$res2 = $con->query($sql2) or die(mysql_error());
					if (mysqli_num_rows($res2) > 0) {
						$topics .= "<table width='100%'>";
						$topics .= "<tr><td colspan='4'><div class='link'><a href='forum.php' class='link'>Return To Forum Index</a>".$logged."</div><hr color='#bfbfbf'></td></tr>";
						$topics .= "<tr style='background-color: #bfbfbf;'><td>Topic Title</td><td width='65' align='center'>Last User</td><td width='65' align='center'>Replies</td><td width='65' align='center'>Views</td></tr>";
						$topics .= "<tr><td colspan='4'><hr color='#bfbfbf'></td><tr>";
						
						while ($row = $res2->fetch_array(MYSQLI_ASSOC)){
							$tid = $row['id'];
							$title = $row['topic_title'];
							$views = $row['topic_views'];
							$date = $row['topic_date'];
							$creator = $row['topic_creator'];
							
							if ($row['topic_last_user'] == "0") { $last_user = "N/A"; } else { $last_user = getusername($row['topic_last_user']); }
																												
							$topics .= "<tr><td><a href='view_topic.php?cid=".$cid."&tid=".$tid."' class='top_links' >".$title."</a><br /><span class='post_info'>Posted by: ".getusername($creator)." on ".convertdate($date)."</td><td align='center' class='post_info'>".$last_user."</td><td align='center' class='post_info'>".topic_replies($cid, $tid)."</td><td align='center' class='post_info'>".$views."</span></td></tr>";
							$topics .= "<tr><td colspan='4'><hr color='#bfbfbf'></td></tr>";
						}
						$topics .= "</table>";
						
						echo $topics;
					}else{
					echo "<a href='forum.php' class='link'>Return To Forum Index</a><hr color='black'>";
					echo "<p><span class='link'>There are not no topics in this category yet.".$logged."</span></p>";	
					}
				}else{
					echo "<a href='forum.php' class='link'>Return To Forum Index</a><hr color='black'>";
					echo "<span class='link'><p>You are trying to view a category that does not exist yet.</p>/span>";
				}
			?>
         </div>
         </div>
                  <div class="Footer">Site created by Kaspar Sunekær . . . Email: Kasparsunekaer@gmail.com</div>  
    </div>
</body>
</html>