<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php
if ($_SESSION['UserID']) {
	if (isset($_POST['reply_submit'])) {
		$creator = $_SESSION['UserID'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		
		$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
		$res = $con->query($sql) or die(mysql_error());
		
		$sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res2 = $con->query($sql2) or die(mysql_error());
		
		$sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		$res3 = $con->query($sql3) or die(mysql_error());
		
		// Select query that will select the post_creators associated with the topic you are replying to
		$sql4 = "SELECT post_creator FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."' GROUP BY post_creator";
		$res4 = $con->query($sql4) or die(mysql_error());
		
		while ($row4 = $res4->fetch_array(MYSQLI_ASSOC)) {
			$userids[] .= $row4['post_creator'];
		}
		foreach ($userids as $key) {
			$sql5 = "SELECT UserID, Email FROM user WHERE UserID='".$key."' AND forum_notification='1' LIMIT 1";
			$res5 = $con->query($sql5) or die(mysql_error());
			if (mysqli_num_rows($res5) > 0) {
				$row5 = $res5->fetch_array(MYSQLI_ASSOC);
				if ($row5['UserID'] != $creator) {
					$email .= $row5['Email'].", ";
				}
			}
		}

		$email = substr($email, 0, (strlen($email) - 2));
		$to = "noreply@somewhere.com";
		$from = "noreply@nfinit-gaming.com";
		$bcc = $email;
		$subject = "Forum Reply";
		$message = "Some one has replied to a topic you were apart of.";
		$headers = "From: $from\r\nReply-To: $from";
		$headers .= "\r\nBcc: {$bcc}";
		
		mail($to, $subject, $message, $headers);

		if (($res) && ($res2) && ($res3)) {
			$loc = "view_topic.php?cid=".$cid."&tid=".$tid."";
			header('Location: ' . $loc);
		} else {
			echo "<p>There was a problem posting your reply. Try again later.</p>";
		}
		
	} else {
		exit();
	}
} else {
	exit();
}
?>
