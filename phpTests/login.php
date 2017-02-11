<?php
// we must never forget to start the session
session_start();

$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {
    // check if the username and password combination is correct
    if ($_POST['txtUserId'] === 'theadmin' && $_POST['txtPassword'] === 'chumbawamba') {
        // the username and password match, 
        // set the session
        $_SESSION['basic_is_logged_in'] = true;
        
        // after login we move to the main page
        header('Location: main.php');
        exit;
    } else {
        $errorMessage = 'Sorry, wrong username / password';
    }
}
?>
<html>
<head>
<title>Basic Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
if ($errorMessage != '') {
?>
<p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
<?php
}
?>
<form action="" method="post" name="frmLogin" id="frmLogin">
 <table width="400" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
   <td width="150">User Id</td>
   <td><input name="txtUserId" type="text" id="txtUserId"></td>
  </tr>
  <tr>
   <td width="150">Password</td>
   <td><input name="txtPassword" type="password" id="txtPassword"></td>
  </tr>
  <tr>
   <td width="150">&nbsp;</td>
   <td><input name="btnLogin" type="submit" id="btnLogin" value="Login"></td>
  </tr>
 </table>
</form>
</body>
</html> 
