<?php require 'NFINIT-Gaming/Connections/Connections.php'; ?>
<?php
session_start();
unset($_SESSION["UserID"]);
session_destroy();

header('Location: index.php')
?>
<!doctype html>
<html>
<head>
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/master.css" rel="stylesheet" type="text/css">
<link href="NFINIT-Gaming/NFINIT-Gaming-CSS/menu.css" rel="stylesheet" type="text/css">
<link href="webfonts/ArchitectsDaughter/stylesheet.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>logout</title>
</head>

<body>
</body>
</html>