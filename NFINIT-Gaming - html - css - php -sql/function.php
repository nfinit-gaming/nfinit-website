<?php 

			function topic_replies($cid, $tid) {
				$con = mysqli_connect("localhost", "root", "", "database");
				$sql = "SELECT count(*) AS topic_replies FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
				$res = $con->query($sql) or die(mysql_error());
				$row = $res->fetch_array(MYSQLI_ASSOC);
				return $row['topic_replies'];
			}
			
			function getusername($user) {
				$con = mysqli_connect("localhost", "root", "", "database");	
				$sql = "SELECT UName FROM user WHERE UserID='".$user."'";
				$res = $con->query($sql) or die(mysql_error());
				$row = $res->fetch_array(MYSQLI_BOTH);
				return $row['UName'];
			}
		
			function convertdate($date) {
				$date = strtotime($date);
				return date("M j, Y g:ia", $date);
			}
?>