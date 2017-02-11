<?php
// like i said, we must never forget to start the session
session_start();

// is the one accessing this page logged in or not?
if (!isset($_SESSION['basic_is_logged_in']) || $_SESSION['basic_is_logged_in'] !== true) {
    // not logged in, move to login page
    header('Location: login.php');
    exit;
}

?>
<html>
<head>
<title>Main User Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p>This is the main application page. You are free to play around here since you 
 are an autenthicated user :-) </p>
<p>&nbsp;</p>
<p><a href="logout.php">Logout</a> </p>
</body>
</html> 